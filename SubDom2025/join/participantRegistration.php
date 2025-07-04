<?php
include("../src/db/db.php");
include("../config.php");
// Verificar conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $registration_open) {

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
    try {
      // Iniciar transacción
      $conn->begin_transaction();

      $order_id = generateUuid();
      $total_price = 0;

      // 1. Calcular precio total
      foreach ($participantes as $participante) {
        $rol_id = $participante['rol'];
        $stmt = $conn->prepare("SELECT price FROM Roles WHERE rol_id = ?");
        if (!$stmt) throw new Exception("Falló la preparación de la consulta.");

        $stmt->bind_param("s", $rol_id);
        if (!$stmt->execute()) throw new Exception("Falló la ejecución de la consulta.");

        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
          $total_price += $row['price'];
        }
        $stmt->close();
      }

      // 2. Insertar la orden
      $stmt = $conn->prepare("INSERT INTO Orders (order_id, total, paid) VALUES (?, ?, 0)");
      if (!$stmt) throw new Exception("Falló la preparación de la consulta.");

      $stmt->bind_param("sd", $order_id, $total_price);
      if (!$stmt->execute()) throw new Exception("Falló la ejecución de la inserción.");
      $stmt->close();

      // 3. Insertar participantes y sus relaciones
      foreach ($participantes as $participante) {
        $participant_id = generateUuid();

        // Participante
        $stmt = $conn->prepare("INSERT INTO Participants (participant_id, first_name, last_name, email, phone, affiliation, rol_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) throw new Exception("Falló la preparación de la consulta.");

        $stmt->bind_param("sssssss", $participant_id, $participante['first_name'], $participante['last_name'], $participante['email'], $participante['phone'], $participante['affiliation'], $participante['rol']);
        if (!$stmt->execute()) {
          // Verificar error por campo duplicado
          if (strpos($stmt->error, 'Duplicate entry') !== false) {
            preg_match("/for key '(.+?)'/", $stmt->error, $matches);
            $campo = $matches[1] ?? 'algún campo único';
            $errorMesage = "The value you entered for $campo already exists in our system.";
            $suggestion = "Please use a different value.";
            $stmt->close();
            $conn->rollback();
            header("Location: error/?error_message=" . urlencode($errorMesage) . "&suggestion=" . urlencode($suggestion));
            exit();
          } else {
            $stmt->close();
            throw new Exception("Falló la ejecución de la inserción.");
          }
        }
        $stmt->close();

        // Relación
        $stmt = $conn->prepare("INSERT INTO Participants_Order (order_id, participant_id) VALUES (?, ?)");
        if (!$stmt) throw new Exception("Falló la preparación de la consulta.");

        $stmt->bind_param("ss", $order_id, $participant_id);
        if (!$stmt->execute()) throw new Exception("Falló la ejecución de la inserción.");
        $stmt->close();
      }

      // 4. Confirmar
      $conn->commit();
      header("Location: emailLogic.php?order_id=" . urlencode($order_id));
      exit();


      // ========== Manejo de errores genéricos ==========
      error:
      $conn->rollback();
      $errorMesage = "An error occurred while processing your request.";
      $suggestion = "Please try again later.";
      header("Location: error/?error_message=" . urlencode($errorMesage) . "&suggestion=" . urlencode($suggestion));
      exit();
    } catch (mysqli_sql_exception $e) {
      $conn->rollback();

      if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
        preg_match("/for key '(.+?)'/", $e->getMessage(), $matches);
        $campo = $matches[1] ?? 'un campo único';
        $errorMesage = "The value you entered for $campo already exists in our system.";
        $suggestion = "Please use a different value.";
      } else {
        $errorMesage = "An error occurred while processing your request.";
        $suggestion = "Please try again later.";
      }

      header("Location: error/?error_message=" . urlencode($errorMesage) . "&suggestion=" . urlencode($suggestion));
      exit();
    } catch (Exception $e) {
      $conn->rollback();

      $errorMesage = "Internal error: " . $e->getMessage();
      $suggestion = "Please double-check your information. Need help? Contact us if the issue remains.";

      header("Location: error/?error_message=" . urlencode($errorMesage) . "&suggestion=" . urlencode($suggestion));
      exit();
    }
  } else {
    $errorMesage = "Registration Failed.";
    $suggestion = "Complete all fields properly.";
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
// function generateUuid()
// {
//   return sprintf(
//     '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
//     mt_rand(0, 0xffff),
//     mt_rand(0, 0xffff),
//     mt_rand(0, 0xffff),
//     mt_rand(0, 0x0fff) | 0x4000,
//     mt_rand(0, 0x3fff) | 0x8000,
//     mt_rand(0, 0xffff),
//     mt_rand(0, 0xffff),
//     mt_rand(0, 0xffff)
//   );
// }
function generateUuid($length = 5)
{
  $max = pow(36, $length) - 1;
  $random = mt_rand(0, $max);
  return str_pad(base_convert($random, 10, 36), $length, '0', STR_PAD_LEFT);
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
