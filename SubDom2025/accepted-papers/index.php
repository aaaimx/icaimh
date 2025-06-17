<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>ICAIMH 2025</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="../public/img/logo/logo_icaimh.png" rel="icon" />
  <link href="../public/img/logo/logo_icaimh.png" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet" />

  <!-- Google Dosc -->
  <!-- <link rel="stylesheet" href="../src/css/googledocs.css"> -->

  <!-- Vendor CSS Files -->

  <link href="../src/vendor/animate.css/animate.min.css" rel="stylesheet" />
  <link href="../src/vendor/bootstrap/css/bootstrap.css" rel="stylesheet" />
  <link
    href="../src/vendor/bootstrap-icons/bootstrap-icons.css"
    rel="stylesheet" />
  <link href="../src/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link
    href="../src/vendor/glightbox/css/glightbox.min.css"
    rel="stylesheet" />
  <link href="../src/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <link
    rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
    crossorigin="anonymous" />
  <link href="../src/css/board-of-trustees.css" rel="stylesheet" />
  <link href="../src/css/footer.css" rel="stylesheet" />
  <link href="../src/css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="../src/css/extraStyles.css" />
  <script
    type="text/javascript"
    src="https://kit.fontawesome.com/45786511e1.js"
    crossorigin="anonymous"></script>
  <!-- Estilos personalizados -->
  <link rel="stylesheet" href="../src/css/accepted-papers.css">
</head>

<body>
  <?php
  include("../src/sections/navBar.php");
  include('../src/objects/acceptedPapers.php');
  ?>
  <main>
    <!-- Sección de encabezado mejorada -->
    <div class="header-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12">
            <div class="badge-logo-container">
              <span class="accepted-papers-badge">ACCEPTED PAPERS</span>
              <img src="/public/img/logo/logo_icaimh.png" alt="ICAIMH Logo" class="img-logo" />
            </div>
            <h1 class="conference-title">ICAIMH 2025: International Conference on Artificial Intelligence for Mental Health 2025</h1>
            <p class="conference-details">
              <i class="fas fa-calendar-alt me-2"></i>July 2-3, 2025
              <span class="mx-2">•</span>
              <i class="fas fa-map-marker-alt me-2"></i>Mérida, Yucatán, México<br>
              <i class="fas fa-globe me-2"></i><a href="/" target="_blank">https://2025.icaimh.org/</a>
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Sección de tabla mejorada -->
    <div class="table-section">
      <div class="container">
        <div class="table-container">
          <div class="table-responsive">
            <table class="table" id="table">
              <thead>
                <tr>
                  <th><i class="fas fa-file-alt me-2"></i>Title</th>
                  <th><i class="fas fa-tag me-2"></i>Type of Paper</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($acceptedPapers as $paper) { ?>
                  <tr>
                    <td><?php echo htmlspecialchars($paper['title']) ?></td>
                    <td>
                      <span class="badge bg-light text-dark border">
                        <?php echo htmlspecialchars($paper['typeofpaper']) ?>
                      </span>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php
  include("../src/sections/footer.php")
  ?>

  <a
    href="./#"
    class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


</body>

</html>