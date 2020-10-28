<?php
include("../config/db.php");
if (!empty($_SESSION['id_user']) && !empty($_GET['id_o'])) {
    $id_o = trim(strip_tags($_GET['id_o']));

    $verify = $db->prepare("select * from offre where id_offre = ?");
    $verify->execute([$id_o]);
    $cpt = $verify->rowCount();
    if ($cpt) {
        while ($data = $verify->fetch(PDO::FETCH_ASSOC)) {
            $d = $data;
        }
    }
    // var_export($d);

    $q = $db->prepare("delete from offre where id_offre = ?");
    $q->execute([$d['id_offre']]);
    unlink("../assets/uploads/" .  $d['lien_offre']);

    echo '<script>window.location.href="?p=show-offre"</script>';
}
