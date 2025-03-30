<?php
include("../src/db/db.php");

// Verificar conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Recuperar el número de participantes
  $numPersonas = isset($_POST['numPersonasPost']) ? intval($_POST['numPersonasPost']) : 0;

  // Preparar array para datos de participantes
  $participantes = [];
  $emails = [];
  $phones = [];
  $valid = true;
  $errors = [];


  // Recolectar datos de participantes
  for ($i = 1; $i <= $numPersonas; $i++) {
    $participante = [
      'first_name' => $_POST["first_name$i"] ?? '',
      'last_name' => $_POST["last_name$i"] ?? '',
      'email' => $_POST["email$i"] ?? '',
      'phone' => $_POST["phone$i"] ?? '',
      'affiliation' => $_POST["affiliation$i"] ?? '',
      'rol' => $_POST["rol$i"] ?? ''
    ];

    // Verificar que ningún campo esté vacío
    foreach ($participante as $key => $value) {
      if (empty($value)) {
        $errors[] = "El campo <b>$key</b> del participante $i no puede estar vacío.";
        $valid = false;
      }
    }

    // Validar email solo si no está vacío
    if (!empty($participante['email'])) {
      if (!validateEmail($participante['email'])) {
        $errors[] = "El correo del participante $i no es válido.";
        $valid = false;
      } elseif (in_array($participante['email'], $emails)) {
        $errors[] = "El correo <b>{$participante['email']}</b> ya está siendo usado por otro participante.";
        $valid = false;
      } else {
        $emails[] = $participante['email'];
      }
    }

    // Validar teléfono solo si no está vacío
    if (!empty($participante['phone'])) {
      if (!validatePhone($participante['phone'])) {
        $errors[] = "El teléfono del participante $i no es válido.";
        $valid = false;
      } elseif (in_array($participante['phone'], $phones)) {
        $errors[] = "El teléfono <b>{$participante['phone']}</b> ya está siendo usado por otro participante.";
        $valid = false;
      } else {
        $phones[] = $participante['phone'];
      }
    }

    $participantes[] = $participante;
  }


  if ($valid) {
    // Iniciar transacción
    $conn->begin_transaction();

    try {
      // 1. Crear la orden
      $order_id = generateUuid();
      $total_price = 0;

      // Calcular precio total sumando los precios de los roles
      foreach ($participantes as $participante) {
        $rol_id = $participante['rol'];
        $stmt = $conn->prepare("SELECT price FROM Roles WHERE rol_id = ?");
        $stmt->bind_param("s", $rol_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
          $total_price += $row['price'];
        }
        $stmt->close();
      }

      // Insertar la orden
      $stmt = $conn->prepare("INSERT INTO Orders (order_id, total, paid) VALUES (?, ?, 0)");
      $stmt->bind_param("sd", $order_id, $total_price);
      $stmt->execute();
      $stmt->close();

      // 2. Insertar participantes y sus relaciones
      foreach ($participantes as $participante) {
        $participant_id = generateUuid();

        // Insertar participante
        $stmt = $conn->prepare("INSERT INTO Participants (participant_id, first_name, last_name, email, phone, affiliation, rol_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $participant_id, $participante['first_name'], $participante['last_name'], $participante['email'], $participante['phone'], $participante['affiliation'], $participante['rol']);
        $stmt->execute();
        $stmt->close();

        // Insertar relación en Participants_Order
        $stmt = $conn->prepare("INSERT INTO Participants_Order (order_id, participant_id) VALUES (?, ?)");
        $stmt->bind_param("ss", $order_id, $participant_id);
        $stmt->execute();
        $stmt->close();
      }

      // Confirmar transacción
      $conn->commit();

      // Redirigir al archivo generarPDF.php con el ID de la orden
      // header("Location: generarPDF.php?order_id=" . urlencode($order_id));
      header("Location: emailLogic.php?order_id=" . urlencode($order_id));
      // header("Location: confirmationPage/?order_id=" . urlencode($order_id));
      exit();
    } catch (Exception $e) {
      // Revertir transacción en caso de error
      $conn->rollback();
      // echo "<p>Ocurrió un error al procesar tu solicitud. Por favor, inténtalo de nuevo más tarde.</p>";
      // echo "<p>Detalles del error: " . $e->getMessage() . "</p>";

      // Verificar si es un error de violación de clave única/duplicada
      if (
        strpos($e->getMessage(), 'Duplicate entry') !== false ||
        strpos($e->getMessage(), '1062') !== false ||
        $e->getCode() == 23000
      ) {

        // Extraer el nombre del campo duplicado (esto puede variar según tu DBMS)
        preg_match("/for key '(.+?)'/", $e->getMessage(), $matches);
        $campo = $matches[1] ?? 'algún campo único';
        $errorMesage = "El valor que intentas registrar para <strong>$campo</strong> ya existe en nuestro sistema.";
        $suggestion = "Utiliza un valor diferente.";
        header("Location: error/?error_message=" . urlencode($errorMesage) . "&suggestion=" . urlencode($suggestion));
        exit();
      } else {
        // Mensaje genérico para otros errores
        $errorMesage = "Ocurrió un error al procesar tu solicitud.";
        $suggestion = "Inténtalo de nuevo más tarde.";
        header("Location: error/?error_message=" . urlencode($errorMesage) . "&suggestion=" . urlencode($suggestion));
        exit();
      }
    }
  } else {
    $errorMesage = "Error en el Registro.";
    $suggestion = "Complete todos los campos correctamente.";
    header("Location: error/?error_message=" . urlencode($errorMesage) . "&suggestion=" . urlencode($suggestion));
    exit();
  }
} else {
  // Redirigir si se accede directamente
  header("Location: .");
  exit();
}

// Cerrar conexión
$conn->close();

// Función para generar UUID (para MySQL)
function generateUuid()
{
  return sprintf(
    '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff),
    mt_rand(0, 0x0fff) | 0x4000,
    mt_rand(0, 0x3fff) | 0x8000,
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff),
    mt_rand(0, 0xffff)
  );
}


function validateEmail($email)
{
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validatePhone($phone)
{
  // Patrón para números de teléfono mexicanos e internacionales
  $pattern = '/^(?:\+52)?(1\d{10}|\d{10})$|^\+?\d{10,15}$/';
  return preg_match($pattern, $phone);
}
