<?php
$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : 'Desconocido';
$buttonBool = true;
if (isset($_GET['token'])) {
  $token = $_GET['token'];
  include("../../src/db/db.php"); // Asegúrate de incluir la conexión a la BD
  if (!$conn->connect_error) {
    // Iniciar transacción
    $conn->begin_transaction();
    try {
      // Obtener los participantes y los precios de los roles
      $stmt = $conn->prepare("
          UPDATE `Orders` 
          SET paid = 1 
          WHERE activation_token = ? AND paid = 0;
      ");
      $stmt->bind_param("s", $token);
      $stmt->execute();

      // Verificar si se actualizó alguna fila
      if ($stmt->affected_rows > 0) {
        // La actualización fue exitosa (se cambió al menos una fila)
        $stmt->close();

        // Segunda consulta: obtener participantes
        $stmt = $conn->prepare("
          SELECT P.first_name, P.last_name, P.email 
          FROM Participants P
          JOIN Participants_Order PO ON P.participant_id = PO.participant_id
          WHERE PO.order_id = ?
        ");
        $stmt->bind_param("s", $order_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Procesar los resultados de los participantes
        $participants = []; // array principal

        while ($row = $result->fetch_assoc()) {
          $participants[] = [
            'name' => $row['first_name'] . ' ' . $row['last_name'],
            'email' => $row['email']
          ];
        }

        $stmt->close();
        // $conn->close();
        $conn->commit();
        $conn->close();
        $buttonBool = false;

        // Ahora puedes iterar así:
        foreach ($participants as $participant) {
          // Mensaje HTML sin el boton de confirmación
          $messageUser = '
            <html>
              <head>
                <title>ICAIMH 2025 Confirmation</title>
                <style>
                  .button {
                    background-color: #4caf50;
                    border: none;
                    color: white;
                    padding: 15px 32px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    margin: 20px 0;
                    cursor: pointer;
                    border-radius: 5px;
                  }
                  .pdf-button {
                    display: inline-block;
                    background-color: #106eea;
                    color: white;
                    padding: 12px 25px;
                    border-radius: 5px;
                    text-decoration: none;
                    font-weight: 600;
                    transition: all 0.3s ease;
                    margin-top: 20px;
                  }

                  .pdf-button:hover {
                    background-color: #0e5ec7;
                    transform: translateY(-2px);
                    box-shadow: 0 4px 10px rgba(16, 110, 234, 0.3);
                  }
                </style>
              </head>
              <body>
              
                <p>' . htmlspecialchars($participant['name']) . ',</p>
                <p>Congratulations! You have successfully completed your registration for ICAIMH 2025.</p>
                <p>Find attached the confirmation document, it is necessary to present it when entering the ICAIMH 2025 conference.</p>

                <hr>

                <p>
                  Felicidades! Has completado con exito tu registro para ICAIMH 2025.
                </p>

                <p>
                  Encuentre adjunto el documento de confirmación, es necesario presentarlo al entrar al congreso ICAIMH 2025.
                </p>


                <a
                  href="https://2025.icaimh.org/join/generarPDFEntrada.php?order_id=' . htmlspecialchars($order_id) . '"
                  target="_blank"
                  class="button"
                  >See Confirmation</a
                >

                <p>Order ID: ' . htmlspecialchars($order_id) . '</p>
              </body>
            </html>
          ';
          $subject = 'ICAIMH 2025 Registration Invoice';
          // Cabeceras para correo HTML
          $headers = "From: icaimh2025@icaimh.org\r\n";
          $headers .= "MIME-Version: 1.0\r\n";
          $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
          $mailUser = mail($participant['email'], $subject, $messageUser, $headers);
        }


        // header("Location: confirmationPage/?order_id=" . urlencode($order_id) . "&button_bool=false");
        // exit();
      } else {
        // No se actualizó ninguna fila (token no encontrado o ya estaba pagado)
        $stmt->close();
        $conn->rollback(); // Es mejor hacer rollback si no hubo cambios
        $conn->close();
        // Mensaje genérico para otros errores
        $errorMesage = "Token not found or already paid.";
        $suggestion = "Please contact the administrator.";
        header("Location: ../error/?error_message=" . urlencode($errorMesage) . "&suggestion=" . urlencode($suggestion));
        exit();
      }
    } catch (Exception $e) {
      $conn->rollback();
      // Mensaje genérico para otros errores
      $errorMesage = "An error occurred while processing your request.";
      $suggestion = "Please try again later.";
      header("Location: ../error/?error_message=" . urlencode($errorMesage) . "&suggestion=" . urlencode($suggestion));
      exit();
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>ICAIMH 2025</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="../../public/img/logo/logo_icaimh.png" rel="icon" />
  <link href="../../public/img/logo/logo_icaimh.png" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet" />

  <!-- Google Dosc -->
  <!-- <link rel="stylesheet" href="../../src/css/googledocs.css"> -->

  <!-- Vendor CSS Files -->

  <link href="../../src/vendor/animate.css/animate.min.css" rel="stylesheet" />
  <link href="../../src/vendor/bootstrap/css/bootstrap.css" rel="stylesheet" />
  <link
    href="../../src/vendor/bootstrap-icons/bootstrap-icons.css"
    rel="stylesheet" />
  <link href="../../src/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link
    href="../../src/vendor/glightbox/css/glightbox.min.css"
    rel="stylesheet" />
  <link href="../../src/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <link
    rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
    crossorigin="anonymous" />
  <link href="../../src/css/board-of-trustees.css" rel="stylesheet" />
  <link href="../../src/css/footer.css" rel="stylesheet" />
  <link href="../../src/css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../src/css/extraStyles.css" />
  <script
    type="text/javascript"
    src="https://kit.fontawesome.com/45786511e1.js"
    crossorigin="anonymous"></script>
  <style>
    html,
    body {
      height: 100%;
      margin: 0;
      display: flex;
      flex-direction: column;
    }

    main {
      flex-grow: 1;
    }

    .registration-card {
      background-color: #f8f9fa;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 10px 30px 30px 30px;
      margin-top: 20px;
      margin-bottom: 30px;
    }

    .pdf-button {
      display: inline-block;
      background-color: #106eea;
      color: white;
      padding: 12px 25px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
      margin-top: 20px;
    }

    .pdf-button:hover {
      background-color: #0e5ec7;
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(16, 110, 234, 0.3);
    }

    .confirmation-icon {
      font-size: 60px;
      color: #28a745;
      margin-bottom: 20px;
    }

    .next-steps {
      margin-top: 25px;
      padding: 15px;
      background-color: #e9f6fd;
      border-radius: 8px;
      border-left: 4px solid #106eea;
    }
  </style>
</head>

<body>
  <?php
  include("../../src/sections/navBar.php");
  ?>

  <main id="main">
    <!-- Sección de registro con confirmación mejorada -->
    <section id="registration" class="px-2 text-center" style="max-width: 800px; margin: auto">
      <h1 class="mb-2">ICAIMH 2025 REGISTRATION</h1>
      <p>Your registration ID: <?php echo htmlspecialchars($order_id, ENT_QUOTES, 'UTF-8'); ?></p>
      <div class="registration-card animate__animated animate__fadeIn">
        <?php
        if ($buttonBool === true) {
        ?>
          <i class="bi bi-check-circle-fill confirmation-icon  "></i>
          <h2 class="mb-3">Thank you for registering!</h2>
          <p class="lead mb-4">Your registration for the International Conference on Artificial Intelligence in Mental Health 2025 has been successfully completed.</p>
          <div class="next-steps text-start">
            <h4 class="d-flex align-items-center mb-3 ">
              <i class="bi bi-list-task me-2"></i>Next Steps:
            </h4>
            <ul class="list-group list-group-flush">
              <li class="list-group-item bg-transparent d-flex align-items-start py-2">
                <i class="bi bi-download  me-3 mt-1"></i>
                <span>Download your registration details using the button below, or check your email (including the spam folder).</span>
              </li>
              <li class="list-group-item bg-transparent d-flex align-items-start py-2">
                <i class="bi bi-envelope-check  me-3 mt-1"></i>
                <span>Complete your payment and send the receipt to <a href="mailto:icaimh2025@icaimh.org" class="text-decoration-none">icaimh2025@icaimh.org</a>.</span>
              </li>
              <li class="list-group-item bg-transparent d-flex align-items-start py-2">
                <i class="bi bi-hourglass-split  me-3 mt-1"></i>
                <span>After paying and sending your receipt, await a payment confirmation email.</span>
              </li>
              <li class="list-group-item bg-transparent d-flex align-items-start py-2">
                <i class="bi bi-calendar-check  me-3 mt-1"></i>
                <span>Mark July 2-3, 2025 on your calendar</span>
              </li>
              <li class="list-group-item bg-transparent d-flex align-items-start py-2">
                <i class="bi bi-megaphone  me-3 mt-1"></i>
                <span>Follow us on social media for updates about the conference</span>
              </li>
              <li class="list-group-item bg-transparent d-flex align-items-start py-2">
                <!-- <i class="bi bi-megaphone  me-3 mt-1"></i> -->
                <i class="fas fa-id-card me-3 mt-1"></i>
                <span>If you registered as a student, don't forget to bring your student ID—otherwise, the general rate may apply.</span>
              </li>
            </ul>

            <div class="alert alert-warning rounded-3 mt-4">
              <div class="d-flex">
                <i class="bi bi-exclamation-triangle-fill text-warning me-3 fs-4"></i>
                <div>
                  <p class="mb-0 text-danger fw-semibold">Si requiere factura fiscal mexicana, por favor envíe un correo electrónico a <a href="mailto:hola@brainhouse.mx" class="text-decoration-none">hola@brainhouse.mx</a> después de completar su registro. Es indispensable adjuntar su Constancia de Situación Fiscal actualizada para poder emitir la factura correctamente.</p>
                </div>
              </div>
            </div>
          </div>
          <a href="../generarPDF.php?order_id=<?php echo htmlspecialchars($order_id, ENT_QUOTES, 'UTF-8'); ?>" class="pdf-button" target="_blank">
            <i class="bi bi-file-earmark-pdf me-2"></i> View/Download Registration PDF
          </a>
        <?php
        } else {
        ?>
          <i class="bi bi-check-circle-fill confirmation-icon"></i>
          <h2 class="mb-3">Registration successfull!</h2>
          <p class="lead mb-4">You have successfully confirmed the registraroin with ID: <?php echo htmlspecialchars($order_id, ENT_QUOTES, 'UTF-8'); ?>.</p>

        <?php
        }
        ?>
      </div>

      <p>If you have any questions, please contact us at <a href="mailto:icaimh2025@icaimh.org">icaimh2025@icaimh.org</a></p>
    </section>
  </main>
  <!-- End #main -->

  <?php
  include("../../src/sections/footer.php")
  ?>

  <a
    href="./#"
    class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../src/vendor/purecounter/purecounter.js"></script>
  <script src="../../src/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../src/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../src/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../src/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../src/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../src/js/main.js"></script>
  <script src="../../src/js/main2.js"></script>
  <script src="../../src/js/main3.js"></script>

</body>

</html>