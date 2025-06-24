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
  </style>
</head>

<body>
  <?php
  include("../src/sections/navBar.php");
  include("../config.php");
  ?>

  <main id="main">
    <section id="registration" class="px-2 text-center" style="max-width: 1300px; margin: auto">
      <h1 class="d-inline-block mb-2">ICAIMH 2025 REGISTRATION</h1>
      <?php
      if ($registration_open) {
      ?>
        <div class="d-flex justify-content-center">
          <div class="testimonial3 py-2">
            <div class="container">
              <div class="testi3 row justify-content-center">
                <!-- Initial Number of Participants Selection -->
                <div class="col my-3" id="participantNumberSelection">
                  <div class="card card-shadow border-0 h-100 pt-3 px-2" style="border-radius: 0.8rem;">
                    <div class="card-body d-flex flex-column justify-content-evenly">
                      <h4 class="mb-4">How many people do you want to register?</h4>
                      <div class="form-group mb-4">
                        <div class="input-group">
                          <span class="input-group-text"><i class="fas fa-users"></i></span>
                          <input type="number" class="form-control" id="numPersonas" min="1" max="10" value="1" />
                        </div>
                        <p class="text-danger mt-2">Please select a number between 1 and 10</p>
                        <button class="btn btn-orange mt-2" id="continueButton" onclick="showParticipantForms()">
                          Continue to Registration
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Participant Forms Container -->
                <div class="col-12 mb-3" id="participantFormsContainer" style="display: none;">
                  <form id="registrationForm" method="POST" action="participantRegistration.php">
                    <div id="participantForms">
                    </div>
                    <input type="number" id="numPersonasPost" name="numPersonasPost" value="1" hidden />
                    <div id="errorMessages"></div>
                    <button type="submit" class="btn btn-success mt-3">Submit Registration</button>
                  </form>
                </div>

              </div>
              <!-- Important Notices Card - More Prominent -->
              <div style="max-width: 660px; padding: 1rem 0; display: flex; gap: 1rem">
                <div class="alert alert-danger  mb-0 p-3" style="flex: 1;">
                  <h5 class="alert-heading "><i class="fas fa-id-card fs-4 me-2"></i>Student ID Requirement</h5>
                  <p class="mb-0" style="text-align: justify;">Attendees selecting the Student rate will be required to present a valid student ID during the on-site registration process. Failure to do so may result in a fee adjustment to the general public rate.</p>
                </div>

                <div class="alert alert-warning  mb-0 p-3" style="flex: 1;">
                  <div>
                    <h5 class="alert-heading"><i class="fas fa-file-invoice-dollar fs-4 me-3"></i>Factura Fiscal (CFDI)</h5>
                    <p class="mb-0" style="text-align: justify;">Si requiere factura fiscal mexicana (CFDI), por favor contáctenos por correo electrónico después de haber completado su proceso de registro.</p>
                  </div>
                </div>
              </div>
              <!-- </div> -->
            </div>
          <?php
        } else {
          ?>
            <div class="alert alert-danger mt-3" role="alert">
              <h4 class="alert-heading">Registration is closed!</h4>
              <!-- <p>Please check back later.</p> -->

            </div>
          <?php
        }
          ?>


    </section>
  </main>
  <!-- End #main -->

  <?php
  include("../src/sections/footer.php")
  ?>

  <a
    href="./#"
    class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../src/vendor/purecounter/purecounter.js"></script>
  <script src="../src/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../src/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../src/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../src/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../src/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../src/js/main.js"></script>
  <script src="../src/js/main2.js"></script>
  <script src="../src/js/main3.js"></script>

  <script>
    function showParticipantForms() {
      const continueButton = document.getElementById('continueButton');
      const numPersonas = document.getElementById('numPersonas').value;
      const numPersonasPost = document.getElementById('numPersonasPost');
      numPersonasPost.value = numPersonas;

      // Deshabilitar el botón mientras se carga la solicitud
      continueButton.disabled = true;
      continueButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';
      // continueButton.textContent = '';

      // Enviar el número de participantes al servidor usando AJAX o directamente en PHP
      fetch(`/join/dataFormComponent.php?numParticipants=${numPersonas}`)
        .then(response => response.text())
        //   .then(html => {
        //     if (html === 'Error') {
        //       const errorMesage = "Can't register more than 10 participants at once.";
        //       const suggestion = "Change the number of participants.";
        //       window.location.href = '/error/?error_message=' + encodeURIComponent(errorMesage) + "&suggestion=" + encodeURIComponent(suggestion);
        //     } else {
        //       document.getElementById("participantForms").innerHTML = html;
        //     }
        //   })
        //   .finally(() => {
        //     // Hide number selection, show participant forms
        //     participantNumberSelection.style.display = 'none';
        //     participantFormsContainer.style.display = 'block';
        //   })
        //   .catch(error => console.error("Error:", error));
        .then(html => {
          if (html === 'Error') {
            const errorMessage = "Can't register more than 10 participants at once.";
            const suggestion = "Change the number of participants.";
            window.location.href = 'error/?error_message=' + encodeURIComponent(errorMessage) + "&suggestion=" + encodeURIComponent(suggestion);
            return; // <-- 🔴 DETIENE la ejecución de este then
          } else {
            document.getElementById("participantForms").innerHTML = html;
            participantNumberSelection.style.display = 'none';
            participantFormsContainer.style.display = 'block';
          }
        })
        .catch(error => console.error("Error:", error));
    }
  </script>
  <script>
    document.getElementById("registrationForm").addEventListener("submit", function(event) {
      let errors = [];
      let phones = new Set();
      let emails = new Set();
      let numPersonas = document.getElementById("numPersonasPost").value;

      for (let i = 1; i <= numPersonas; i++) {
        let firstName = document.getElementById("first_name" + i).value.trim();
        let lastName = document.getElementById("last_name" + i).value.trim();
        let email = document.getElementById("email" + i).value.trim();
        let phone = document.getElementById("phone" + i).value.trim();
        let affiliation = document.getElementById("affiliation" + i).value.trim();
        let rol = document.getElementById("rol" + i).value;

        if (!firstName || !lastName || !email || !phone || !affiliation || !rol) {
          errors.push("Todos los campos del participante " + i + " son obligatorios.");
        }

        if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
          errors.push("El correo del participante " + i + " no es válido.");
        } else if (email) {
          if (emails.has(email)) {
            errors.push(`El correo <b>${email}</b> del participante ${i} ya está en uso.`);
          } else {
            emails.add(email);
          }
        }


        if (phone && !/^\+?\d{10,15}$/.test(phone)) {
          errors.push("El teléfono del participante " + i + " no es válido.");
        } else if (phone) {
          if (phones.has(phone)) {
            errors.push(`El teléfono <b>${phone}</b> del participante ${i} ya está en uso.`);
          } else {
            phones.add(phone);
          }
        }
      }

      // if (errors.length > 0) {
      //   event.preventDefault(); // Detiene el envío del formulario
      //   let errorContainer = document.getElementById("errorMessages");
      //   errorContainer.innerHTML = "<div class='alert alert-danger'>";
      //   errors.forEach(error => {
      //     errorContainer.innerHTML += "<p>" + error + "</p>";
      //   });
      //   errorContainer.innerHTML += "</div>";
      // }

      if (errors.length > 0) {
        event.preventDefault(); // Detiene el envío del formulario

        // Obtener el contenedor de errores
        const errorContainer = document.getElementById("errorMessages");

        // Limpiar cualquier mensaje anterior
        errorContainer.innerHTML = "";

        // Crear el contenedor de alerta
        const alertDiv = document.createElement("div");
        alertDiv.className = "alert alert-danger animate__animated animate__fadeIn";
        alertDiv.role = "alert";

        // Agregar encabezado a la alerta
        const alertHeader = document.createElement("h5");
        alertHeader.className = "alert-heading";
        alertHeader.innerHTML = '<i class="bi bi-exclamation-triangle-fill me-2"></i>Please correct the following errors:';
        alertDiv.appendChild(alertHeader);

        // Agregar un divisor
        const divider = document.createElement("hr");
        alertDiv.appendChild(divider);

        // Crear una lista para los errores
        const errorList = document.createElement("div");
        errorList.className = "mb-0";

        // Agregar cada error como un elemento de lista
        errors.forEach(error => {
          const errorItem = document.createElement("p");
          errorItem.textContent = error;
          errorList.appendChild(errorItem);
        });

        // Agregar la lista a la alerta
        alertDiv.appendChild(errorList);

        // Agregar la alerta al contenedor
        errorContainer.appendChild(alertDiv);

        // Desplazarse hasta los mensajes de error
        errorContainer.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  </script>
</body>

</html>