<?php session_start();
include('../config/db.php');


$err = 0;
$msg = 'Erreur de connexion au serveur';
if (!empty($_POST['tel']) && !empty($_POST['pass'])) {

    $tel = trim(strip_tags($_POST['tel']));
    $pass = trim(strip_tags($_POST['pass']));

    if (!is_numeric($tel) || strlen($tel) < 8) {
        $err = 0;
        $msg = 'Contact incorrect';
    } elseif (strlen($pass) < 4) {
        $err = 0;
        $msg = 'Mot de passe incorrect';
    } else {
        $q = $db->prepare("SELECT * FROM client WHERE tel_client = ?");
        $q->execute([$tel]);
        $cpt = $q->rowCount();
        if ($cpt) {
            while ($data = $q->fetch()) {
                $tab['id'] = $data['id_client'];
                $tab['nom'] = $data['nom_client'];
                $tab['pass'] = $data['pass'];
            }
            $hash = password_verify($pass, $tab['pass']);
            if ($hash) {
                $err = 1;
                $msg = 'ok';
                $_SESSION['id'] = $tab['id'];
                $_SESSION['nom'] = $tab['nom'];
                // Ajout d'information apres la connexion
            } else {
                $err = 0;
                $msg = 'Mot de passe incorrect';
            }
        } else {
            $err = 0;
            $msg = "Le compte n'existe pas encore ou mot de passe incorrect";
        }
    }
} else {
    $err = 0;
    $msg = 'Veuillez remplir tous les champs ';
}

$tab = ['err' => $err, 'msg' => $msg];
echo json_encode($tab);
