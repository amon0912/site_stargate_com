<?php
ini_set("SMTP", "aspmx.l.google.com");
ini_set("sendmail_from", "amon0912@gmail.com");
$to      = 'amon0912@gmail.com';
$subject = 'le sujet';
$message = 'Bonjour ! ok http://localhost/siteStargateCom';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: amon0912@gmail.com' . "\r\n" .
    'Reply-To: amon0912@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
