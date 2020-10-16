<?php
include('../config/db.php');
include('../PHPMailer/envoiMail.php');

$err = 0;
$msg = 'Erreur de connexion au serveur';
if (!empty($_POST['nom']) && !empty($_POST['prenoms']) && !empty($_POST['tel']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['pass1'])) {
    $nom = trim(strip_tags($_POST['nom']));
    $prenoms = trim(strip_tags($_POST['prenoms']));
    $email = trim(strip_tags($_POST['email']));
    $tel = trim(strip_tags($_POST['tel']));
    $pass = trim(strip_tags($_POST['pass']));
    $pass1 = trim(strip_tags($_POST['pass1']));
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
    } elseif (strlen($pass) < 4 || strlen($pass1) < 4 || $pass != $pass1) {
        $err = 0;
        $msg = 'Mots de passe: au moins 8 caractères <br> et identique';
    } else {
        $id = md5(uniqid(time()));
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        $verifyCompte = $db->prepare("SELECT * FROM client WHERE tel_client = ?");
        $verifyCompte->execute([$tel]);
        $cpt = $verifyCompte->rowCount();
        if ($cpt) {
            $err = 0;
            $msg = 'Le compte existe déjà';
        } else {

            $err = 1;
            $msg = 'Inscription éffectuée avec succès <br><strong>Confirmez votre Inscrition sur votre boite mail </strong>';

            $q = $db->prepare("INSERT INTO client (id_client, nom_client, prenoms_client, email_client, tel_client, pass) VALUES (?,?,?,?,?,?)");
            $q->execute([$id, $nom, $prenoms, $email, $tel, $hash]);
            $lien =  'Veuillez cliquez sur le lien pour la confirmation de votre compte<br>' . "http://localhost/siteStargateCom/traitement/verify.php/?verify=" . $id;

            $objet = 'Confirmation de votre compte';
            envoiMail($lien, $objet, $nom, $email);
        }
    }
} else {
    $err = 0;
    $msg = 'Veuillez remplir tous les champs ';
}

$tab = ['err' => $err, 'msg' => $msg];
echo json_encode($tab);
