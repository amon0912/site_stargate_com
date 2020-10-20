<?php session_start();
include('../../config/db.php');
var_export($_FILES);
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
                $lien = time() . '-' . $_FILES['fichier']['name'];
                move_uploaded_file($_FILES['fichier']['tmp_name'], 'uploads/' . basename($lien));
                // $msg = "L'envoi a bien été effectué !";
                
                $id_offre = md5(uniqid(time()));
                $q = $db->prepare("INSERT INTO offre (id_offre, lib_offre, lien_offre, type_offre, description_offre, id_user, action_offre) VALUES (?,?,?,?,?,?,?)");
                $q->execute([$id_offre, $lib_offre, $lien, $type_offre, $descrip, $_SESSION['id'], $action]);
            } else {
            }
        } else if ($type_offre == 'video') {
            $infosfichier = pathinfo($_FILES['fichier']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees =  ['mp4'];
            if (in_array($extension_upload, $extensions_autorisees)) {
                // On peut valider le fichier et le stocker définitivement
                $lien = time() . '-' . $_FILES['fichier']['name'];
                move_uploaded_file($_FILES['fichier']['tmp_name'], 'uploads/' . basename($lien));
                // $msg = "L'envoi a bien été effectué !";
                
                $id_offre = md5(uniqid(time()));
                $q1 = $db->prepare("INSERT INTO offre (id_offre, lib_offre, lien_offre, type_offre, description_offre, id_user, action_offre) VALUES (?,?,?,?,?,?,?)");
                $q1->execute([$id_offre, $lib_offre, $lien, $type_offre, $descrip, $_SESSION['id'], $action]);
            }
        }
    }
} else {
    $err = 0;
    $msg = 'Veuillez remplir tous les champs ';
}
