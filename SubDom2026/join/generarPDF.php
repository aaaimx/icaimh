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
//     $this->Cell(177, 10, 'for Mental Health 2025', 0, 1, 'R');
//     $this->Cell(30);
//     $this->Cell(148, 10, 'July 2nd - 3rd, 2025. Merida, Yucatan, Mexico', 0, 1, 'R');
//     $this->Ln(14);
//     $this->SetFont('Arial', 'I', 14);
//     $this->Cell(0, 8, 'Recibo de pago de registro por transferencia bancaria', 0, 1, 'L');
//     $this->Cell(0, 8, 'Bank payment order', 0, 1, 'L');
//     $this->SetFont('Arial', 'B', 14);
//     $order_id = isset($_GET['order_id']) ? $_GET['order_id'] : 'Desconocido';
//     $this->Cell(0, 8, 'Folio / Id: ' . htmlspecialchars($order_id), 0, 1, 'R');
//   }

//   function Footer()
//   {
//     $this->SetY(-15);
//     $this->SetFont('Arial', 'I', 8);
//     $this->Cell(0, 10, 'ICAIMH 2025 - https://2025.icaimh.org/ - Page ' . $this->PageNo(), 0, 0, 'C');
//   }

//   function AddStaticInfo()
//   {
//     $this->SetFont('Arial', 'B', 12);
//     $this->Cell(0, 10, 'Datos Bancarios Transferencias Nacionales (MXN)', 0, 1);
//     $this->SetFont('Arial', '', 10);
//     $this->Cell(0, 8, 'Banco: BANORTE', 0, 1);
//     $this->Cell(0, 8, 'No. de Cuenta: 1249593571', 0, 1);
//     $this->Cell(0, 8, 'CLABE: 072 910 012495935715', 0, 1);
//     $this->Cell(0, 8, 'Nombre de Cuenta: Estrategia los 7 Merengues S.A. DE C.V.', 0, 1);
//     $order_id = isset($_GET['order_id']) ? $_GET['order_id'] : 'Desconocido';
//     $this->Cell(0, 8, 'Concepto: Congreso ' . htmlspecialchars($order_id), 0, 1);
//   }

//   function AddProductTable($products)
//   {
//     $this->Ln(10);
//     $this->SetFont('Arial', 'B', 12);
//     $this->Cell(0, 8, 'Desglose de Pago', 0, 1, 'C');
//     $this->Ln(4);

//     // Encabezado de la tabla
//     $this->SetFont('Arial', 'B', 10);
//     $this->Cell(80, 8, 'Nombre', 1, 0, 'C');
//     // $this->Cell(30, 8, 'Cantidad', 1, 0, 'C');
//     // $this->Cell(40, 8, 'Precio Unitario', 1, 0, 'C');
//     $this->Cell(40, 8, 'Precio Unitario', 1, 1, 'C');

//     $this->SetFont('Arial', '', 10);
//     $total = 0;

//     // Datos de los productos
//     foreach ($products as $product) {
//       $subtotal = $product['cantidad'] * $product['precio'];
//       $total += $subtotal;

//       $this->Cell(80, 8, $product['nombre'], 1);
//       // $this->Cell(30, 8, $product['cantidad'], 1, 0, 'C');
//       // $this->Cell(40, 8, '$' . number_format($product['precio'], 2), 1, 0, 'C');
//       $this->Cell(40, 8, '$' . number_format($subtotal, 2), 1, 1, 'C');
//     }

//     // Total a pagar
//     $this->SetFont('Arial', 'B', 12);
//     $this->Cell(80, 8, 'Total a Pagar', 1, 0, 'R');
//     $this->Cell(40, 8, '$' . number_format($total, 2), 1, 1, 'C');
//   }
// }

class SimpleVoucherPDF extends FPDF
{
  function Header()
  {
    $this->Image('../public/img/logo/logo_icaimh.png', 10, 10, 32, 32);
    $this->SetFont('Arial', 'B', 16);
    $this->Cell(0, 10, 'International Conference on Artificial Intelligence', 0, 1, 'R');
    $this->Cell(0, 10, 'for Mental Health 2025', 0, 1, 'R');
    $this->SetFont('Arial', '', 12);
    $this->Cell(0, 8, 'July 2nd - 3rd, 2025. Merida, Yucatan, Mexico', 0, 1, 'R');

    $this->Ln(8);
    $this->SetFont('Arial', 'I', 12);
    $this->Cell(0, 8, utf8_decode('Recibo de pago de registro por transferencia bancaria'), 0, 1, 'L');
    $this->Cell(0, 8, 'Bank payment order', 0, 1, 'L');

    $this->Ln(4);
    $this->SetFont('Arial', 'B', 12);
    $order_id = isset($_GET['order_id']) ? $_GET['order_id'] : 'Desconocido';
    $this->Cell(0, 8, 'Folio / ID: ' . htmlspecialchars($order_id), 0, 1, 'R');
    $this->Ln(4);
    $this->Line(10, $this->GetY(), 200, $this->GetY());
    $this->Ln(5);
  }

  function Footer()
  {
    $this->SetY(-15);
    $this->SetFont('Arial', 'I', 8);
    $this->SetTextColor(120, 120, 120);
    $this->Cell(0, 10, 'ICAIMH 2025 - https://2025.icaimh.org/ - Page ' . $this->PageNo(), 0, 0, 'C');
  }

  function AddStaticInfo()
  {
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(0, 10, utf8_decode('Datos Bancarios Transferencias Nacionales (MXN)'), 0, 1, 'L');
    $this->SetFont('Arial', '', 10);
    $this->Ln(2);
    $this->Cell(0, 8, 'Banco: BANORTE', 0, 1);
    $this->Cell(0, 8, 'No. de Cuenta: 1249593571', 0, 1);
    $this->Cell(0, 8, 'CLABE: 072 910 012495935715', 0, 1);
    $this->Cell(0, 8, utf8_decode('Nombre de Cuenta: Estrategia los 7 Merengues S.A. DE C.V.'), 0, 1);
    $order_id = isset($_GET['order_id']) ? $_GET['order_id'] : 'Desconocido';
    $this->Cell(0, 8, 'Concepto: Congreso ' . htmlspecialchars($order_id), 0, 1);
    $this->Ln(5);
    $this->Line(10, $this->GetY(), 200, $this->GetY());
    $this->Ln(5);
  }

  function AddProductTable($products)
  {
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(0, 8, 'Desglose de Pago', 0, 1, 'C');
    $this->Ln(4);

    $tableWidth = 100 + 40; // ancho total de las columnas
    $startX = ($this->GetPageWidth() - $tableWidth) / 2;

    // Encabezado de la tabla
    $this->SetFillColor(230, 230, 230); // gris claro
    $this->SetDrawColor(180, 180, 180); // gris oscuro
    $this->SetFont('Arial', 'B', 10);

    $this->SetX($startX);
    $this->Cell(100, 8, 'Participante', 1, 0, 'C', true);
    $this->Cell(40, 8, 'Precio Unitario', 1, 1, 'C', true);

    $this->SetFont('Arial', '', 10);
    $total = 0;

    foreach ($products as $product) {
      $subtotal = $product['cantidad'] * $product['precio'];
      $total += $subtotal;

      $this->SetX($startX);
      $this->Cell(100, 8, $product['nombre'], 1);
      $this->Cell(40, 8, '$' . number_format($subtotal, 2), 1, 1, 'C');
    }

    // Total
    $this->SetFont('Arial', 'B', 12);
    $this->SetX($startX);
    $this->Cell(100, 8, 'Total a Pagar', 1, 0, 'R');
    $this->Cell(40, 8, '$' . number_format($total, 2), 1, 1, 'C');
  }
}


include("../src/db/db.php"); // Asegúrate de incluir la conexión a la BD

if (!$conn->connect_error) {
  // Obtener datos de la orden
  $order_id = isset($_GET['order_id']) ? $_GET['order_id'] : 'Desconocido';

  // Obtener los participantes y los precios de los roles
  $stmt = $conn->prepare("
      SELECT P.first_name, P.last_name, R.price, R.rol_name AS rol_name
      FROM Participants P
      JOIN Participants_Order PO ON P.participant_id = PO.participant_id
      JOIN Roles R ON P.rol_id = R.rol_id
      WHERE PO.order_id = ?
  ");
  $stmt->bind_param("s", $order_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $products = [];

  while ($row = $result->fetch_assoc()) {
    $products[] = [
      "nombre" => $row["first_name"] . " " . $row["last_name"] . " - " . $row["rol_name"],
      "cantidad" => 1,
      "precio" => $row["price"]
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
  $pdf->AddPage();
  $pdf->AddStaticInfo();
  $pdf->AddProductTable($products);
  $pdf->Output('I', 'voucher_' . $order_id . '.pdf'); // Forzar descarga con un nombre personalizado
}
