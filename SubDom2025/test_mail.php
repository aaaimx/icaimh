<?php
$to = "angel.d.aldaz@gmail.com";
$subject = "Prueba de mail() en Hostinger";
$message = "Si recibes este correo, la función mail() está habilitada.";
$headers = "From: icaimh2025@icaimh.org";

if (mail($to, $subject, $message, $headers)) {
  echo "Correo enviado correctamente.";
} else {
  echo "Error al enviar el correo.";
}
