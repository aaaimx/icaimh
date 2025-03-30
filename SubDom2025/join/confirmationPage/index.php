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
      padding: 30px;
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
  $order_id = isset($_GET['order_id']) ? $_GET['order_id'] : 'Desconocido';
  $buttonBool = true;
  if (isset($_GET['token'])) {
    $token = $_GET['token'];
    include("../src/db/db.php"); // Asegúrate de incluir la conexión a la BD
    if (!$conn->connect_error) {
      // Iniciar transacción
      $conn->begin_transaction();
      try {
        // Obtener los participantes y los precios de los roles
        $stmt = $conn->prepare("
          UPDATE orders 
          SET paid = 1 
          WHERE activation_token = ? AND paid = 0;
      ");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $stmt->close();
        $conn->commit();
        $conn->close();
        // header("Location: confirmationPage/?order_id=" . urlencode($order_id) . "&button_bool=false");
        // exit();
        $buttonBool = false;
      } catch (Exception $e) {
        $conn->rollback();
        // Mensaje genérico para otros errores
        $errorMesage = "Ocurrió un error al procesar tu solicitud.";
        $suggestion = "Inténtalo de nuevo más tarde.";
        header("Location: error/?error_message=" . urlencode($errorMesage) . "&suggestion=" . urlencode($suggestion));
        exit();
      }
    }
  }
  ?>

  <main id="main">
    <!-- Sección de registro con confirmación mejorada -->
    <section id="registration" class="px-2 text-center" style="max-width: 800px; margin: auto">
      <h1 class="mb-4">ICAIMH 2025 REGISTRATION</h1>
      <p>Your registration ID: <?php echo $order_id; ?></p>
      <div class="registration-card animate__animated animate__fadeIn">
        <?php
        if ($buttonBool === true) {
        ?>
          <i class="bi bi-check-circle-fill confirmation-icon"></i>
          <h2 class="mb-3">Thank you for registering!</h2>
          <p class="lead mb-4">Your registration for the International Conference on Artificial Intelligence in Mental Health 2025 has been successfully completed.</p>
          <div class="next-steps text-start">
            <h4><i class="bi bi-arrow-right-circle me-2"></i>Next Steps:</h4>
            <ul class="text-start">
              <li>Download your registration details using the button below</li>
              <li>Mark July 2-3, 2025 on your calendar</li>
              <li>Follow us on social media for updates about the conference</li>
            </ul>
          </div>
          <a href="../generarPDF.php?order_id=<?php echo $order_id; ?>" class="pdf-button" target="_blank">
            <i class="bi bi-file-earmark-pdf me-2"></i> View/Download Registration PDF
          </a>
        <?php
        } else {
        ?>
          <i class="bi bi-check-circle-fill confirmation-icon"></i>
          <h2 class="mb-3">Registration successfull!</h2>
          <p class="lead mb-4">You have successfully confirmed the registraroin with ID: <?php echo $order_id; ?>.</p>

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
    href="/#"
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