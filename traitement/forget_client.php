<?php
include('../config/db.php');
include('../PHPMailer/envoiMail.php');

$err = 0;
$msg = 'Erreur de connexion au serveur';
if (!empty($_POST['email'])) {

    $email = trim(strip_tags($_POST['email']));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err = 0;
        $msg = 'E-mail incorrect';
    } else {
        $q = $db->prepare("SELECT * FROM client WHERE email_client = ?");
        $q->execute([$email]);
        $cpt = $q->rowCount();
        if ($cpt) {
            while ($data = $q->fetch()) {
                $tab['id'] = $data['id_client'];
                $tab['nom'] = $data['nom_client'];
            }
            $err = 1;
            $msg = '';
            $objet = 'Modification du mot de passe';
            $lien = 'Veuillez cliquez sur le lien afin de modifiez votre mot de passe <br>' . 'http://localhost/siteStargateCom/traitement/modify.php?modify=' . $tab['id'];
            envoiMail($lien, $objet, $tab['nom'], $email);
        } else {
            $err = 0;
            $msg = "Veuillez saisir votre adresse email lors de la création de votre compte";
        }
    }
} else {
    $err = 0;
    $msg = 'Veuillez remplir tous les champs ';
}

$tab = ['err' => $err, 'msg' => $msg];
echo json_encode($tab);
