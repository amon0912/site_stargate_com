<?php

$to      = 'gustavedev1@gmail.com';
$subject = 'le sujet';
$message = 'Bonjour ! cliquez sur le lien http://localhost/siteStargateCom';

// $headers  = 'MIME-Version: 1.0\r\n';
// $headers .= 'Content-type: text/html; charset=iso-8859-1\r\n';
$headers = 'From: "amon0912@gmail.com"<amon0912@gmail.com>\r\n';
// $headers .= 'Content-type:text/html, charset=utf-8'."\r\n";
// $headers .= 'Content-Transfert-Encoding: 8bit';


mail($to, $subject, $message, $headers);