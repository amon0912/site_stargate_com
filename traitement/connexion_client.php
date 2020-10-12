<?php
include('config/db.php');
global $db;
$err = 0;
$msg = 'Erreur de connexion au serveur';
if (!empty($_POST['nom']) && !empty($_POST['prenoms']) && !empty($_POST['tel']) && !empty($_POST['email'])) {
    $nom = trim(strip_tags($_POST['nom']));
    $prenoms = trim(strip_tags($_POST['prenoms']));
    $email = trim(strip_tags($_POST['email']));
    $tel = trim(strip_tags($_POST['tel']));
    if (strlen($nom) < 2) {
        $err = 0;
        $msg = 'Nom trop court';
    } elseif (strlen($prenoms) < 2) {
        $err = 0;
        $msg = 'Prenoms trop court';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err = 0;
        $msg = 'Email incorrecte';
    } elseif (!is_numeric($tel) && strlen($tel) < 8) {
        $err = 0;
        $msg = 'Contact incorrecte';
    } else {
        $err = 1;
        $msg = 'ok';
        $id = uniqid();
        $q = $db->prepare("INSERT INTO client (id_client, nom_client, prenoms_client, email_client, tel_client) VALUES (?,?,?,?,?)");
        $q->execute($id, $nom, $prenoms, $email, $tel);
    }
} else {
    $err = 0;
    $msg = 'Veuillez remplir tous les champs ';
}

$tab = ['err' => $err, 'msg' => $msg];
echo json_encode($tab);
