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

    .error-card {
      background-color: #f8f9fa;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 30px;
      margin-top: 20px;
      margin-bottom: 30px;
    }

    .return-button {
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

    .return-button:hover {
      background-color: #0e5ec7;
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(16, 110, 234, 0.3);
    }

    .error-icon {
      font-size: 60px;
      color: #dc3545;
      margin-bottom: 20px;
    }

    .error-code {
      font-size: 72px;
      font-weight: 700;
      color: #dc3545;
      opacity: 0.2;
      position: absolute;
      top: 10px;
      right: 20px;
      z-index: 0;
    }

    .troubleshooting {
      margin-top: 25px;
      padding: 15px;
      background-color: #f8d7da;
      border-radius: 8px;
      border-left: 4px solid #dc3545;
      text-align: left;
    }

    .error-details {
      background-color: #f2f2f2;
      border-radius: 5px;
      padding: 15px;
      margin-top: 20px;
      text-align: left;
      font-family: monospace;
      font-size: 14px;
      overflow-x: auto;
      max-height: 150px;
    }
  </style>
</head>

<body>
  <?php
  include("../../src/sections/navBar.php");
  ?>
  <?php
  $errorMessage = isset($_GET['error_message']) ? $_GET['error_message'] : 'Unknown error';
  $suggestion = isset($_GET['suggestion']) ? $_GET['suggestion'] : '';
  ?>

  <main id="main">
    <!-- Sección de error -->
    <section id="error" class="px-2 text-center" style="max-width: 800px; margin: auto; position: relative;">
      <h1 class="mb-4">ICAIMH 2025 REGISTRATION</h1>

      <div class="error-card animate__animated animate__fadeIn">
        <!-- <div class="error-code">404</div> -->
        <i class="bi bi-exclamation-triangle-fill error-icon"></i>
        <h2 class="mb-3">Oops! Something went wrong</h2>
        <p class="lead mb-4">We couldn't process your request.</p>

        <p><?php echo htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8'); ?></p>
        <div class="troubleshooting">
          <h4><i class="bi bi-tools me-2"></i>You might want to try:</h4>
          <ul>
            <li><?php echo htmlspecialchars($suggestion, ENT_QUOTES, 'UTF-8'); ?></li>
          </ul>
        </div>
        <?php
        if ($errorMessage == "Can't register more than 10 participants at once.") { ?>
          <a href="../index.php" class="return-button">
            <i class="bi bi-house-door me-2"></i> Return to Registration
          </a>
        <?php
        } else {
        ?>
          <a href="../index.php" onclick="event.preventDefault(); history.back();" class="return-button">
            <i class="bi bi-house-door me-2"></i> Return to Registration
          </a>
        <?php } ?>
      </div>

      <p>If you continue to experience issues, please contact us at <a href="mailto:icaimh2025@icaimh.org">icaimh2025@icaimh.org</a></p>
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