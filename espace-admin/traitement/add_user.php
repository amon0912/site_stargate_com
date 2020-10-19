<?php session_start();
include('../../config/db.php');


$err = 0;
$msg = 'Erreur de connexion au serveur';
if (!empty($_POST['pass']) && !empty($_POST['pseudo'])) {

    $pseudo = trim(strip_tags($_POST['pseudo']));
    $pass = trim(strip_tags($_POST['pass']));

    if (strlen($pseudo) < 4) {
        $err = 0;
        $msg = 'ERREUR';
    } elseif (strlen($pass) < 4) {
        $err = 0;
        $msg = 'ERREUR';
    } else {
        $q = $db->prepare("SELECT * FROM user WHERE nom_user = ? AND pass_user = ?");
        $q->execute([$pseudo, $pass]);
        $cpt = $q->rowCount();
        if ($cpt) {
            // while ($data = $q->fetch()) {
            //     $tab['id'] = $data['id_client'];
            //     $tab['nom'] = $data['nom_client'];
            //     $tab['pass'] = $data['pass'];
            // }
            // $hash = password_verify($pass, $tab['pass']);
            // if ($hash) {
            //     $err = 1;
            //     $msg = '';
            //     $_SESSION['id'] = $tab['id'];
            //     $_SESSION['nom'] = $tab['nom'];
            //     // Ajout d'information apres la connexion
            // } else {
            //     $err = 0;
            //     $msg = 'Mot de passe incorrect';
            // }

            $err = 1;
            $msg = '';
            $_SESSION['id'] = '1234qwert'; 
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
