<?php
if (isset($_GET['numParticipants']) && $_GET['numParticipants'] > 0 && $_GET['numParticipants'] <= 10) {
  include("../src/db/db.php");
  // Verificar conexión
  if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
  }

  try {
    // Obtener todos los roles
    $stmt = $conn->prepare("SELECT rol_id, rol_name, price FROM Roles");
    $stmt->execute();
    $result = $stmt->get_result();
    $roles = [];
    while ($row = $result->fetch_assoc()) {
      $roles[] = $row;
    }
    $stmt->close();
  } catch (Exception $e) {
    echo "<h1>Error en la Consulta</h1>";
    error_log("Error al obtener roles: " . $e->getMessage());
  }


  // Obtener el número de participantes desde el parámetro GET
  if (isset($_GET['numParticipants']) && !empty($roles)) {
    $numParticipants = intval($_GET['numParticipants']);
    renderForm($numParticipants, $roles);
  } else {
    if (empty($roles)) {
      echo "<div class='alert alert-danger'>No hay roles disponibles. Contacte al administrador.</div>";
    } else {
      header("Location: .");
    }
    exit();
  }
  // Cerrar conexión
  $conn->close();
} else {
  // recargar la página
  // header("Location: .");
  // exit();
  echo "Error";
  // $errorMesage = "Can't register more than 10 participants at once.";
  // $suggestion = "Change the number of participants.";
  // header("Location: error/?error_message=" . urlencode($errorMesage) . "&suggestion=" . urlencode($suggestion));
  exit();
}

function renderForm($numParticipantes, $roles)
{
  for ($i = 1; $i <= $numParticipantes; $i++) {
?>
    <div class="card card-shadow border-0 mb-3 pt-3 px-2 mt-3" style="border-radius: 0.8rem;">
      <div class="card-body">
        <h4 class="card-title">Participant <?php echo $i ?></h4>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="first_name<?php echo $i ?>" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name<?php echo $i ?>" name="first_name<?php echo $i ?>" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="last_name<?php echo $i ?>" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name<?php echo $i ?>" name="last_name<?php echo $i ?>" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="email<?php echo $i ?>" class="form-label">Email</label>
            <input type="email" class="form-control" id="email<?php echo $i ?>" name="email<?php echo $i ?>" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="phone<?php echo $i ?>" class="form-label">Phone number</label>
            <input type="tel" class="form-control" id="phone<?php echo $i ?>" name="phone<?php echo $i ?>" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="affiliation<?php echo $i ?>" class="form-label">Affiliation (Institution)</label>
            <input type="text" class="form-control" id="affiliation<?php echo $i ?>" name="affiliation<?php echo $i ?>" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="rol<?php echo $i ?>" class="form-label">Rol</label>
            <select class="form-select" id="rol<?php echo $i; ?>" name="rol<?php echo $i; ?>" required>
              <option value="" selected disabled>Select an option</option>
              <?php foreach ($roles as $role) { ?>
                <option value="<?php echo htmlspecialchars($role['rol_id']); ?>">
                  <?php echo htmlspecialchars($role['rol_name'] . ' - $' . number_format($role['price'], 2) . ' MXN'); ?>
                </option>
              <?php } ?>
            </select>
          </div>

        </div>
      </div>
    </div>
<?php
  }
}
