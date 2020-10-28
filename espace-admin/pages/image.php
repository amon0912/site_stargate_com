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
            if ($value['type_offre'] == 'image') {
                $images[] = $value;
            }
        }

?>

        <div class="container-fluid">
            <div class="row mt-4">
                <h2>Liste des images</h2>
                <?php
                foreach ($images as $value) { ?>
                    <div class="col-md-4 mb-3">
                        <?php echo '<img class="img img-responsive" width="320px" height="300px" src="../assets/uploads/' . $value['lien_offre'] . '" alt="">' ?>
                    </div>
                <?php } ?>
            </div>

        </div>

<?php } else {
    }
    // var_export($item);
}
