<?
require("src/vendor/fpdf186/fpdf.php");

class SimpleVoucherPDF extends FPDF
{
  function Header()
  {
    $this->Image('./public/img/logo/logo_icaimh.png', 10, 10, 32, 32);
    $this->SetFont('Arial', 'B', 16);
    $this->Cell(30);
    $this->Cell(160, 10, 'International Conference on Artificial Intelligence', 0, 1, 'C');
    $this->Cell(177, 10, 'for Mental Health 2025', 0, 1, 'R');
    $this->Cell(30);
    $this->Cell(148, 10, 'July 2nd - 3rd, 2025. Merida, Yucatan, Mexico', 0, 1, 'R');
    $this->Ln(14);
    $this->SetFont('Arial', 'I', 14);
    $this->Cell(0, 8, 'Recibo de pago de registro por transferencia bancaria', 0, 1, 'L');
    $this->Cell(0, 8, 'Bank payment order', 0, 1, 'L');
    $this->SetFont('Arial', 'B', 14);
    $this->Cell(0, 8, 'Folio / Id: 12345', 0, 1, 'R'); // Hardcoded ID
  }

  function Footer()
  {
    $this->SetY(-15);
    $this->SetFont('Arial', 'I', 8);
    $this->Cell(0, 10, 'ICAIMH 2025 - https://2025.icaimh.org/ - Page ' . $this->PageNo(), 0, 0, 'C');
  }

  function AddStaticInfo()
  {
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(0, 10, 'Datos Bancarios Transferencias Nacionales (MXN)', 0, 1);
    $this->SetFont('Arial', '', 10);
    $this->Cell(0, 8, 'Banco: CITIBANAMEX', 0, 1);
    $this->Cell(0, 8, 'No. de Cuenta: 8098363741', 0, 1);
    $this->Cell(0, 8, 'CLABE: 002790701123141039', 0, 1);
    $this->Cell(0, 8, 'Nombre de Cuenta: JARKOL TECHNOLOGIES S.A. DE C.V.', 0, 1);
    $this->Ln(10);
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(0, 10, 'International Wire Transfers in USD', 0, 1);
    $this->SetFont('Arial', '', 10);
    $this->Cell(0, 8, 'Bank: CITIBANAMEX', 0, 1);
    $this->Cell(0, 8, 'Account Number: 0640 9400254', 0, 1);
    $this->Cell(0, 8, 'SWIFT Code: BNMXMXMM', 0, 1);
  }

  function AddProductTable($products)
  {
    $this->Ln(10);
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(0, 8, 'Desglose de Pago', 0, 1, 'C');
    $this->Ln(4);

    // Encabezado de la tabla
    $this->SetFont('Arial', 'B', 10);
    $this->Cell(80, 8, 'Producto', 1, 0, 'C');
    $this->Cell(30, 8, 'Cantidad', 1, 0, 'C');
    $this->Cell(40, 8, 'Precio Unitario', 1, 0, 'C');
    $this->Cell(40, 8, 'Subtotal', 1, 1, 'C');

    $this->SetFont('Arial', '', 10);
    $total = 0;

    // Datos de los productos
    foreach ($products as $product) {
      $subtotal = $product['cantidad'] * $product['precio'];
      $total += $subtotal;

      $this->Cell(80, 8, $product['nombre'], 1);
      $this->Cell(30, 8, $product['cantidad'], 1, 0, 'C');
      $this->Cell(40, 8, '$' . number_format($product['precio'], 2), 1, 0, 'C');
      $this->Cell(40, 8, '$' . number_format($subtotal, 2), 1, 1, 'C');
    }

    // Total a pagar
    $this->SetFont('Arial', 'B', 12);
    $this->Cell(150, 8, 'Total a Pagar', 1, 0, 'R');
    $this->Cell(40, 8, '$' . number_format($total, 2), 1, 1, 'C');
  }
}

// Generar y descargar el PDF
$products = [
  ["nombre" => "Registro General", "cantidad" => 1, "precio" => 1500.00],
  ["nombre" => "Taller de IA en Psic", "cantidad" => 1, "precio" => 500.00],
  ["nombre" => "Cert. Especial", "cantidad" => 1, "precio" => 750.00],
];
$pdf = new SimpleVoucherPDF();
$pdf->AddPage();
$pdf->AddStaticInfo();
$pdf->AddProductTable($products);
$pdf->Output('D', 'voucher.pdf'); // 'D' fuerza la descarga del archivo
