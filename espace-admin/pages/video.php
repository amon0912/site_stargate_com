<?php
if (!empty($_SESSION['id_user'])) {
    include("../config/db.php");

    $q = $db->prepare("select * from offre");
    $q->execute();
    $cpt = $q->rowCount();
    if ($cpt) {
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $item[] = $data;
        }

        foreach ($item as  $value) {
            # code...
            if ($value['type_offre'] == 'video') {
                $videos[] = $value;
            }
        }

?>

        <div class="container-fluid">
            <div class="row mt-4">
                <h2>Liste des vidéos</h2>
                <?php
                foreach ($videos as $value) { ?>
                    <div class="col-md-4 mb-3">
                        <?php echo '<video class="" controls width="320px" height="300px" src="../assets/uploads/' . $value['lien_offre'] . '" alt=""></video>' ?>
                    </div>
                <?php } ?>
            </div>

        </div>

<?php } else {
    }
    // var_export($item);
}
