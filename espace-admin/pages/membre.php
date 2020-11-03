<?php
include("../config/db.php");

if (empty($_SESSION['id_user'])) {
    echo 'erreur';
} else {
    $q = $db->prepare("select * from client order by id_client desc");
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
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $value) { ?>

                                    <tr>
                                        <td scope="row">
                                            <?= $value['nom_client'] ?>
                                        </td>
                                        <td>
                                            <?= $value['prenoms_client'] ?>
                                        </td>
                                        <td>
                                            <?= $value['tel_client'] ?>
                                        </td>
                                        <td>
                                            <?= $value['email_client'] ?>
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