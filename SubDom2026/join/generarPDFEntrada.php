<?
require("../src/vendor/fpdf186/fpdf.php");


// class SimpleVoucherPDF extends FPDF
// {
//   function Header()
//   {
//     $this->Image('../public/img/logo/logo_icaimh.png', 10, 10, 32, 32);
//     $this->SetFont('Arial', 'B', 16);
//     $this->Cell(30);
//     $this->Cell(160, 10, 'International Conference on Artificial Intelligence', 0, 1, 'C');
//     $this->Cell(177, 10, 'for Mental Health 2026', 0, 1, 'R');
//     $this->Cell(30);
//     $this->Cell(148, 10, 'July 1st - 3rd, 2026. Merida, Yucatan, Mexico', 0, 1, 'R');
//     $this->Ln(10);
//     $this->SetFont('Arial', 'I', 14);
//     $this->Cell(0, 8, 'Ficha de confirmación de pago', 0, 1, 'L');
//     // $this->Ln(14);
//   }

//   function Footer()
//   {
//     $this->SetY(-15);
//     $this->SetFont('Arial', 'I', 8);
//     $this->Cell(0, 10, 'ICAIMH 2026 - https://2026.icaimh.org/ - Page ' . $this->PageNo(), 0, 0, 'C');
//   }

//   function AddStaticInfo($order_id, $participant_id, $participant_name)
//   {
//     $this->Ln(10);

//     $this->SetFont('Arial', 'B', 16);
//     $this->Cell(0, 10, 'Felicidades ' . htmlspecialchars($participant_name) . '! ', 0, 1, 'C');
//     $this->Cell(0, 10, 'Tu pago ha sido confirmado exitosamente.', 0, 1, 'C');
//     $this->Ln(10);
//     $this->Cell(0, 8, 'ID de la Orden: ' . htmlspecialchars($order_id), 0, 1, 'C');
//     $this->Cell(0, 8, 'ID del participante: ' . htmlspecialchars($participant_id), 0, 1, 'C');
//     $this->SetFont('Arial', '', 14);
//     $this->Cell(0, 10, 'Imprime esta ficha para permitirte la entrada al evento.', 0, 1, 'C');
//   }
// }

class SimpleVoucherPDF extends FPDF
{
  function Header()
  {
    // Logo
    $this->Image('../public/img/logo/logo_icaimh.png', 10, 10, 32, 32);

    // Título principal
    $this->SetFont('Arial', 'B', 16);
    $this->Cell(0, 10, 'International Conference on Artificial Intelligence', 0, 1, 'R');
    $this->Cell(0, 10, 'for Mental Health 2026', 0, 1, 'R');
    $this->SetFont('Arial', '', 12);
    $this->Cell(0, 8, 'July 1st - 3rd, 2026. Merida, Yucatan, Mexico', 0, 1, 'R');
    $this->Ln(8);

    // Línea decorativa
    $this->SetDrawColor(100, 100, 100);
    $this->SetLineWidth(0.4);
    $this->Line(10, $this->GetY() + 2, 200, $this->GetY() + 2);

    $this->Ln(8);

    // Subtítulo
    $this->SetFont('Arial', 'B', 14);
    $this->Cell(0, 8, utf8_decode('Ficha de confirmación de pago'), 0, 1, 'C');
    $this->Ln(4);
  }

  function Footer()
  {
    $this->SetY(-15);
    $this->SetFont('Arial', 'I', 8);
    $this->SetTextColor(120, 120, 120);
    $this->Cell(0, 10, 'ICAIMH 2026 - https://2026.icaimh.org/ - Page ' . $this->PageNo(), 0, 0, 'C');
  }

  function AddStaticInfo($order_id, $participant_id, $participant_name, $role, $price)
  {
    $this->Ln(10);

    // Mensaje principal
    $this->SetFont('Arial', 'B', 16);
    $this->SetTextColor(209, 99, 0); // Color naranja base
    $this->Cell(0, 12, utf8_decode('¡Felicidades ' . htmlspecialchars($participant_name) . '!'), 0, 1, 'C');

    $this->SetFont('Arial', '', 14);
    $this->SetTextColor(0);
    $this->Cell(0, 10, utf8_decode('Hemos confirmado exitosamente tu pago de $' . htmlspecialchars($price) . ' correspondiente al rol de ' . htmlspecialchars($role) . '.'), 0, 1, 'C');

    $this->Ln(8);

    // Cuadro de datos
    $this->SetFont('Arial', 'B', 14);

    $this->Cell(0, 8, 'ID de la Orden: ' . htmlspecialchars($order_id), 0, 1, 'C');
    $this->Cell(0, 8, 'ID del participante: ' . htmlspecialchars($participant_id), 0, 1, 'C');

    $this->Ln(10);

    $this->SetFont('Arial', 'I', 12);
    $this->MultiCell(0, 8, utf8_decode('Imprime esta ficha y preséntala en el área de registro para permitirte la entrada al evento.'), 0, 'C');

    $this->Ln(10);
  }
}


include("../src/db/db.php"); // Asegúrate de incluir la conexión a la BD

if (!$conn->connect_error) {
  // Obtener datos de la orden
  $order_id = isset($_GET['order_id']) ? $_GET['order_id'] : 'Desconocido';


  $stmt = $conn->prepare("
      SELECT P.participant_id, P.first_name, P.last_name, P.email, R.rol_name, R.price
      FROM Participants P
      JOIN Participants_Order PO ON P.participant_id = PO.participant_id
      JOIN Roles R ON P.rol_id = R.rol_id
      JOIN Orders O ON PO.order_id = O.order_id
      WHERE PO.order_id = ? AND O.paid = 1;
  ");
  $stmt->bind_param("s", $order_id);
  $stmt->execute();
  $result = $stmt->get_result();

  $participants = []; // array principal

  while ($row = $result->fetch_assoc()) {
    $participants[] = [
      'id' => $row['participant_id'],
      'name' => $row['first_name'] . ' ' . $row['last_name'],
      'email' => $row['email'],
      'rol' => $row['rol_name'],
      'price' => $row['price']
    ];
  }

  $stmt->close();
  $conn->close();
}
if ($result->num_rows === 0) {
  $errorMesage = "The order ID is not valid.";
  $suggestion = "Using a correct order ID";
  header("Location: error/?error_message=" . urlencode($errorMesage) . "&suggestion=" . urlencode($suggestion));
  exit();
} else {
  $pdf = new SimpleVoucherPDF();
  foreach ($participants as $participant) {
    $pdf->AddPage();
    $pdf->AddStaticInfo($order_id, $participant['id'], $participant['name'], $participant['rol'], $participant['price']);
  }
  // $pdf->AddPage();
  // $pdf->AddStaticInfo($order_id);
  // $pdf->AddContent($products);
  $pdf->Output('I', 'voucher_' . $order_id . '.pdf'); // Forzar descarga con un nombre personalizado
}
