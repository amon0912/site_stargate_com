<?php session_start();
include('../../config/db.php');


$err = 0;
$msg = 'Erreur de connexion au serveur';
if (!empty($_POST['id_deco']) && !empty($_POST['no-change-img']) && !empty($_POST['update']) && !empty($_POST['lib_offre']) && !empty($_POST['type_offre']) && !empty($_POST['descrip']) && !empty($_POST['action'])) {

    // Section mise ajout sans modification de l'image ou de le video
    $lib_offre = trim(strip_tags($_POST['lib_offre']));
    $type_offre = trim(strip_tags($_POST['type_offre']));
    $descrip = trim(strip_tags($_POST['descrip']));
    $action = trim(strip_tags($_POST['action']));

    $id = $_POST['update'];
    $q = $db->prepare("update deco set lib_offre = ?, type_deco = ?, description_offre = ?, action = ? where id_offre = ? ");
    $q->execute([$lib_offre, $type_offre, $descrip, $action, $_POST['id_deco']]);
    $err = 1;
    $msg = 'Mise à jour éffectuée';
} else {
    # code...

    if (!empty($_POST['lib_offre']) && !empty($_POST['type_offre']) && !empty($_POST['descrip']) && !empty($_POST['action'])) {
        // if (true) {

        $lib_offre = trim(strip_tags($_POST['lib_offre']));
        $type_offre = trim(strip_tags($_POST['type_offre']));
        $descrip = trim(strip_tags($_POST['descrip']));
        $action = trim(strip_tags($_POST['action']));

        if ($_FILES['fichier']['error'] != 0) {
            $err = 0;
            $msg = 'ERREUR sur le fichier chargé';
        } else {
            // Section mise ajout avec modification de l'image ou de le video
            if (!empty($_POST['update']) && !empty($_POST['id_offre'])) {
                $infosfichier = pathinfo($_FILES['fichier']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = ['jpg', 'jpeg', 'gif', 'png', 'mp4'];
                $lienodl = time() . '_' . basename($_FILES['fichier']['name']);
                $lien = str_replace(' ', '_', $lienodl);
                if (in_array($extension_upload, $extensions_autorisees) && $type_offre == 'image') {
                    // On peut valider le fichier et le stocker définitivement
                    move_uploaded_file($_FILES['fichier']['tmp_name'], '../../assets/uploads/' . $lien);
                    // $msg = "L'envoi a bien été effectué !";
                    $msg = '';
                    $err = 1;
                    $id = $_POST['update'];
                    $q = $db->prepare("update offre set  titre_offre = ?, type_offre = ?, description_offre = ?, action_offre = ?, lien_offre = ?, id_user = ? where id_offre = ? ");
                    $q->execute([$lib_offre, $type_offre, $descrip, $action, $lien, $_SESSION['id_user'],  $_POST['id_offre']]);

                    unlink('../../assets/uploads/' . $_POST['lienold']);
                } else if (in_array($extension_upload, $extensions_autorisees) && $type_offre == 'video') {
                    // On peut valider le fichier et le stocker définitivement
                    move_uploaded_file($_FILES['fichier']['tmp_name'], '../../assets/uploads/' . $lien);
                    // $msg = "L'envoi a bien été effectué !";
                    $msg = '';
                    $err = 1;
                    $id = $_POST['update'];
                    $q = $db->prepare("update offre set  titre_offre = ?, type_offre = ?, description_offre = ?, action_offre = ?, lien_offre = ?, id_user = ? where id_offre = ? ");
                    $q->execute([$lib_offre, $type_offre, $descrip, $action, $lien, $_SESSION['id_user'],  $_POST['id_offre']]);

                    unlink('../../assets/uploads/' . $_POST['lienold']);
                } else {
                    $err = 0;
                    $msg = 'type de format incorrect';
                }
            } else {
                // section ajout des donnees dans la base de donnee
                // Testons si l'extension est autorisée
                if ($type_offre == 'image') {
                    # code...
                    $infosfichier = pathinfo($_FILES['fichier']['name']);
                    $extension_upload = $infosfichier['extension'];
                    $extensions_autorisees = ['jpg', 'jpeg', 'gif', 'png'];
                    $lienodl = time() . '_' . basename($_FILES['fichier']['name']);
                    $lien = str_replace(' ', '_', $lienodl);
                    if (in_array($extension_upload, $extensions_autorisees)) {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['fichier']['tmp_name'], '../../assets/uploads/' . $lien);

                        $id = uniqid(time());
                        $q = $db->prepare("insert into offre (id_offre,	lib_offre, lien_offre,	type_offre,	description_offre,id_user, action_offre) values (?,?,?,?,?,?,?)");
                        $q->execute([$id, $lib_offre, $lien, $type_offre, $descrip, $_SESSION['id_user'], $action]);

                        $msg = 'upload ok';
                        $err = 1;
                    } else {
                        $err = 0;
                        $msg = "Vous avez choisi un format video ";
                    }
                }

                if ($type_offre == 'video') {
                    # code...
                    $infosfichier = pathinfo($_FILES['fichier']['name']);
                    $extension_upload = $infosfichier['extension'];
                    $extensions_autorisees = ['mp4'];
                    $lienodl = time() . '_' . basename($_FILES['fichier']['name']);
                    $lien = str_replace(' ', '_', $lienodl);
                    if (in_array($extension_upload, $extensions_autorisees)) {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['fichier']['tmp_name'], '../../assets/uploads/' . $lien);

                        $id = uniqid(time());
                        $q = $db->prepare("insert into offre (id_offre,	lib_offre, lien_offre,	type_offre,	description_offre,id_user, action_offre) values (?,?,?,?,?,?,?)");
                        $q->execute([$id, $lib_offre, $lien, $type_offre, $descrip, $_SESSION['id_user'], $action]);

                        $msg = 'upload ok';
                        $err = 1;
                    } else {
                        $err = 0;
                        $msg = "Vous avez choisi un format image";
                    }
                }
            }
        }
    } else {
        $err = 0;
        $msg = 'Veuillez remplir tous les champs ... ';
    }
}

$tab = ['err' => $err, 'msg' => $msg];
echo json_encode($tab);
