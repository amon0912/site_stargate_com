<?php session_start();
include('../../config/db.php');


$err = 0;
$msg = 'Erreur de connexion au serveur';
if (!empty($_POST['lib_offre']) && !empty($_POST['type_offre']) && isset($_FILES['fichier']) && !empty($_POST['descrip']) && !empty($_POST['action'])) {

    $lib_offre = trim(strip_tags($_POST['lib_offre']));
    $type_offre = trim(strip_tags($_POST['type_offre']));
    $descrip = trim(strip_tags($_POST['descrip']));
    $action = trim(strip_tags($_POST['action']));

    if ($_FILES['fichier']['error'] != 0) {
        $err = 0;
        $msg = 'ERREUR sur le fichier chargé';
    } else {

        // Testons si l'extension est autorisée
        if ($type_offre == 'image') {

            $infosfichier = pathinfo($_FILES['fichier']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = ['jpg', 'jpeg', 'gif', 'png'];
            if (in_array($extension_upload, $extensions_autorisees)) {
                // On peut valider le fichier et le stocker définitivement
                move_uploaded_file($_FILES['fichier']['tmp_name'], 'uploads/' . basename($_FILES['fichier']['name']));
                // $msg = "L'envoi a bien été effectué !";
                $msg = $infosfichier;
                $err = 1;
            }
        } else if ($type_offre == 'video') {
            $infosfichier = pathinfo($_FILES['fichier']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees =  ['mp4'];
            if (in_array($extension_upload, $extensions_autorisees)) {
                // On peut valider le fichier et le stocker définitivement
                move_uploaded_file($_FILES['fichier']['tmp_name'], 'uploads/' . basename($_FILES['fichier']['name']));
                $msg = "L'envoi a bien été effectué !";
                $err = 1;
            }
        }



        if (false) {
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


        }
    }
} else {
    $err = 0;
    $msg = 'Veuillez remplir tous les champs ';
    // $msg =  var_export($_POST);
}

$tab = ['err' => $err, 'msg' => $msg];
echo json_encode($tab);
