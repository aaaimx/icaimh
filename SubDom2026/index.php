<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>ICAIMH 2025</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="/public/img/logo/logo_icaimh.png" rel="icon" />
  <link href="/public/img/logo/logo_icaimh.png" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet" />

  <!-- Google Dosc -->
  <!-- <link rel="stylesheet" href="src/css/googledocs.css"> -->

  <!-- Vendor CSS Files -->

  <link href="src/vendor/animate.css/animate.min.css" rel="stylesheet" />
  <link href="src/vendor/bootstrap/css/bootstrap.css" rel="stylesheet" />
  <link
    href="src/vendor/bootstrap-icons/bootstrap-icons.css"
    rel="stylesheet" />
  <link href="src/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="src/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
  <link href="src/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <link
    rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
    crossorigin="anonymous" />
  <link href="src/css/board-of-trustees.css" rel="stylesheet" />
  <link href="src/css/footer.css" rel="stylesheet" />
  <link href="src/css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="src/css/extraStyles.css" />
  <script
    type="text/javascript"
    src="https://kit.fontawesome.com/45786511e1.js"
    crossorigin="anonymous"></script>
</head>

<body>

  <?php
  include('src/sections/navBar.php');
  ?>

  <?php
  include('src/sections/heroSection.php');
  ?>

  <main id="main">
    <?php
    include('src/sections/venueSection.php');
    ?>

    <?php
    include('src/sections/countDownSection.php');
    ?>

    <?php
    include('src/sections/cfpSection.php');
    ?>

    <?php
    include('src/sections/prelProgSection.php');
    ?>

    <?php
    // CardComponentPreparation for committees, program chairs and staff
    include('src/components/committeeCardComponent.php');
    ?>

    <?php
    include('src/sections/programChairsSection.php');
    ?>

    <?php
    include('src/sections/programCommitteeSection.php');
    ?>

    <?php
    include("src/sections/institutionsSection.php")
    ?>

    <?php
    include('src/sections/staffSection.php');
    ?>

    <?php
    include("src/sections/contactSection.php")
    ?>
  </main>
  <!-- End #main -->

  <?php
  include("src/sections/footer.php")
  ?>

  <a
    href="#"
    class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="src/vendor/purecounter/purecounter.js"></script>
  <script src="src/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="src/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="src/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="src/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="src/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="src/js/main.js"></script>
  <script src="src/js/main2.js"></script>
  <script src="src/js/main3.js"></script>
</body>

</html>