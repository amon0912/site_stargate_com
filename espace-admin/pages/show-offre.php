<?php
include("../config/db.php");

if (empty($_SESSION['id_user'])) {
    echo 'erreur';
} else {
    $q = $db->prepare("select * from offre order by id_offre desc");
    $q->execute();
    $cpt = $q->rowCount();

    while ($d = $q->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $d;
    }

    if ($cpt) { ?>
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped ">
                            <thead class="">
                                <tr>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Fonction</th>
                                    <th>Image/Vidéo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $value) { ?>

                                    <tr>
                                        <td scope="row"><?= $value['lib_offre'] ?></td>
                                        <td><?= $value['description_offre'] ?></td>
                                        <td><?= $value['action_offre'] ?></td>
                                        <td>
                                            <?php echo ($value['type_offre'] == 'image') ? '<img width="30" height="20" src="../assets/uploads/' . $value['lien_offre'] . '" alt="">' : '<i class="text-primary fas fa-play-circle fa-2x"></i>' ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="?p=add-offre&id_o=<?= $value['id_offre'] ?>" class="text-primary mr-2"><i class="fas fa-edit    "></i></a>
                                            <a href="?p=delete-offre&id_o=<?= $value['id_offre'] ?>" class="text-danger"><i class="fas fa-trash    "></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
<?php
    } else {
        echo '<div class="text-center my-5 mx-auto col-3 alert alert-primary"> nothing !</div>';
    }
}
?>