<?php
include("../src/db/db.php"); // Asegúrate de incluir la conexión a la BD

$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : 'Desconocido';


if (!$conn->connect_error) {
	// Obtener los participantes y los precios de los roles
	$stmt = $conn->prepare("
      SELECT activation_token
      FROM `Orders`
      WHERE order_id = ?
  ");
	$stmt->bind_param("s", $order_id);
	$stmt->execute();
	$resultActivationToken = $stmt->get_result();
	$activation_token;

	while ($row = $resultActivationToken->fetch_assoc()) {
		$activation_token = $row["activation_token"];
	}

	$stmt->close();
	// $conn->close();

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
	$conn->close();
}
if ($resultActivationToken->num_rows === 0) {
	$errorMesage = "The order ID is not valid.";
	$suggestion = "Use a correct order ID";
	header("Location: error/?error_message=" . urlencode($errorMesage) . "&suggestion=" . urlencode($suggestion));
	exit();
} else {
	// Configuración del correo
	$to = "icaimh2025@icaimh.org";
	$subject = 'ICAIMH 2025 Registration Invoice';

	// Mensaje HTML con el boton de confirmación
	$messageAdmin = '
	<html>
		<head>
			<title>ICAIMH 2025 Registration</title>
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
			<p>Please, find attached your registration invoice for ICAIMH 2025.</p>

			<p>
				Registration will not be confirmed until we receive the bank transfer.
			</p>

			<p>
				To ease the confirmation process, please send the transfer references to:
				<a href="mailto:icaimh2025@icaimh.org">icaimh2025@icaimh.org</a>
			</p>

			<p>
				Encuentre adjunto la factura de registro para el congreso
				<a href="mailto:icaimh2025@icaimh.org">icaimh2025@icaimh.org</a>.
			</p>

			<p>
				El registro no estará completo hasta que se reciba la transferencia
				bancaria.
			</p>

			<p>
				Para agilizar el proceso de confirmación, le rogamos envíe los datos de la
				transferencia realizada a:
				<a href="mailto:icaimh2025@icaimh.org">icaimh2025@icaimh.org</a>
			</p>

			<a
				href="https://2025.icaimh.org/join/generarPDF.php?order_id=' . htmlspecialchars($order_id) . '"
				target="_blank"
				class="button"
				>See Order</a
			>
			<a
				href="https://2025.icaimh.org/join/confirmationPage/?token=' . htmlspecialchars($activation_token) . '&order_id=' . htmlspecialchars($order_id) . '"
				target="_blank"
				class="button"
				>Confirm Order</a
			>

			<p>Order ID: ' . htmlspecialchars($order_id) . '</p>
		</body>
	</html>
	';



	// Cabeceras para correo HTML
	$headers = "From: icaimh2025@icaimh.org\r\n";
	// $headers .= "CC: icaimh2025@icaimh.org\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	// Envía el correo
	$mailAdmin = mail($to, $subject, $messageAdmin, $headers);

	// Ahora puedes iterar así:
	foreach ($participants as $participant) {
		// Mensaje HTML sin el boton de confirmación
		$messageUser = '
	<html>
		<head>
			<title>ICAIMH 2025 Registration</title>
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
			<p>Please, find attached your registration invoice for ICAIMH 2025.</p>

			<p>
				Registration will not be confirmed until we receive the bank transfer.
			</p>

			<p>
				To ease the confirmation process, please send the transfer references to:
				<a href="mailto:icaimh2025@icaimh.org">icaimh2025@icaimh.org</a>
			</p>

			<p>
				Encuentre adjunto la factura de registro para el congreso
				<a href="mailto:icaimh2025@icaimh.org">icaimh2025@icaimh.org</a>.
			</p>

			<p>
				El registro no estará completo hasta que se reciba la transferencia
				bancaria.
			</p>

			<p>
				Para agilizar el proceso de confirmación, le rogamos envíe los datos de la
				transferencia realizada a:
				<a href="mailto:icaimh2025@icaimh.org">icaimh2025@icaimh.org</a>
			</p>

			<a
				href="https://2025.icaimh.org/join/generarPDF.php?order_id=' . htmlspecialchars($order_id) . '"
				target="_blank"
				class="button"
				>See Order</a
			>

			<p>Order ID: ' . htmlspecialchars($order_id) . '</p>
		</body>
	</html>
	';
		$mailUser = mail($participant['email'], $subject, $messageUser, $headers);
	}

	if ($mailAdmin) {
		header("Location: confirmationPage/?order_id=" . urlencode($order_id));
		exit();
	} else {
		echo "Error al enviar el correo.";
	}
}
