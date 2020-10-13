<?php
include('../config/db.php');
// global $db;
$err = 0;
$msg = 'Erreur de connexion au serveur';
if (!empty($_POST['nom']) && !empty($_POST['prenoms']) && !empty($_POST['tel']) && !empty($_POST['email']) && !empty($_POST['pass'])) {
    $nom = trim(strip_tags($_POST['nom']));
    $prenoms = trim(strip_tags($_POST['prenoms']));
    $email = trim(strip_tags($_POST['email']));
    $tel = trim(strip_tags($_POST['tel']));
    $pass = trim(strip_tags($_POST['pass']));
    if (strlen($nom) < 2) {
        $err = 0;
        $msg = 'Nom trop court';
    } elseif (strlen($prenoms) < 2) {
        $err = 0;
        $msg = 'Prenoms trop court';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err = 0;
        $msg = 'Email incorrecte';
    } elseif (is_numeric($tel) && strlen($tel) < 8) {
        $err = 0;
        $msg = 'Contact incorrecte';
    } elseif (strlen($pass) < 4) {
        $err = 0;
        $msg = 'Mot de passe au moins 8 caractères';
    } else {
        $id = uniqid(time());
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $err = 1;
        $msg = 'Inscription éffectuée avec succès <br><strong>Confirmez votre Inscrition sur votre boite email </strong>';
        $q = $db->prepare("INSERT INTO client (id_client, nom_client, prenoms_client, email_client, tel_client, pass) VALUES (?,?,?,?,?,?)");
        $q->execute([$id, $nom, $prenoms, $email, $tel, $hash]);

        ini_set("SMTP", "aspmx.l.google.com");
        ini_set("sendmail_from", "amon0912@gmail.com");
        $to      = $email;
        $subject = 'Cofirmation du compte';
        $message = 'Bonjour ! ok http://localhost/siteStargateCom/traitement/verify.php?verify=' . $id;



        $headers = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=iso-8859-1' . "\r\n" . 'From: amon0912@gmail.com' . "\r\n" .
            'Reply-To: amon0912@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
    }
} else {
    $err = 0;
    $msg = 'Veuillez remplir tous les champs ';
}

$tab = ['err' => $err, 'msg' => $msg];
echo json_encode($tab);
