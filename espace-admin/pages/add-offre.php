<?php
if (empty($_SESSION['id_user'])) {
    echo 'erreur - votre n\'êtes pas connecté';
} else { ?>

    <?php
    if (!empty($_GET['id_o'])) {
        include("../config/db.php");

        $id_o = trim(strip_tags($_GET['id_o']));

        $q = $db->prepare("select * from offre where id_offre = ?");
        $q->execute([$id_o]);
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $item = $data;
        }
        // var_export($item);
    }
    ?>
    <div class="container">
        <form method="post" action="" id="form" class="m-5" enctype="multipart/form-data">
            <?php
            if (!empty($item['id_offre'])) {
                $id = $item['id_offre'];
                $lienold = $item['lien_offre'];
                echo '<input hidden type="text" name="update" value="update">';
                echo '<input hidden type="text" name="id_offre" value="' . $id . '">';
                echo '<input hidden type="text" name="lienold" value="' . $lienold . '">';
            }


            if (!empty($item['id_offre'])) {
                echo '<h3 class="text-center">Modification d\'offre</h3>';
            } else {
                echo '<h3 class="text-center">Ajout d\'offre</h3>';
            }
            ?>
            <div class="alert" id="msg">
            </div>

            <?php
            $Offre = ['formation', 'community management', 'creation de site web', "creation d'application mobile", 'conception de carte de visite', 'conception de flyers'];
            ?>
            <div class="form-group mt-3">
                <label for="lib_offre">Type d'offre</label>
                <select id="lib_offre" class="form-control" name="lib_offre">
                    <option value="<?= !empty($item['lib_offre']) ? $item['lib_offre'] : '' ?>"><?= !empty($item['lib_offre']) ? $item['lib_offre'] : '' ?></option>';
                    <?php
                    foreach ($Offre as $key => $value) {
                        echo '<option value="' . $value . '">' . $value . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="type_offre">Choix du type de format</label>
                <select id="type_offre" class="form-control" name="type_offre">
                    <option value="<?= !empty($item['type_offre']) ? $item['type_offre'] : '' ?>"><?= !empty($item['type_offre']) ? $item['type_offre'] : '' ?></option>';
                    <option value="image">Image</option>';
                    <option value="video">Vidéo</option>';
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="fichier">Charger un format</label>
                <input id="fichier" accept=".mp4, .jpg, .png, jpeg" class="form-control-file" type="file" name="fichier" value="">
            </div>

            <?php
            if (!empty($item['id_offre'])) {
                echo '<label class="custom-control m-2 custom-checkbox">
              <input type="checkbox" name="no-change-img" id="no-change-img" value="checked" class="custom-control-input">
              <span class="custom-control-indicator">Ne pas changer l\'image ou la vidéo</span>
              <span class="custom-control-description"></span>
            </label>';
            }
            ?>

            <div class="form-group mt-3">
                <label for="descrip">Description</label>
                <textarea id="descrip" class="form-control" type="text" name="descrip"><?= !empty($item['description_offre']) ? $item['description_offre'] : '' ?></textarea>
            </div>


            <?php
            if (!empty($item['id_offre'])) {

                switch ($item['action_offre']) {
                    case "Je m'inscris":
                        $choix1 = 'checked';
                        break;

                    case "je profite de l'offre":
                        $choix2 = 'checked';
                        break;

                    case "je profite de mon code promo":
                        $choix3 = 'checked';
                        break;

                    case "je trouve mon community manager":
                        $choix4 = 'checked';
                        break;

                    default:
                        # code...
                        break;
                }
            }

            ?>
            <div class="mt-3">
                <div class="form-check form-check-inline">
                    <label class="form-check-label btn">
                        <input <?= !empty($choix1) ? $choix1 : '' ?> class="form-check-input" type="radio" name="action" id="" value="Je m'inscris"> Je m'inscris
                    </label>
                    <label class="form-check-label btn">
                        <input <?= !empty($choix2) ? $choix2 : '' ?> class="form-check-input" type="radio" name="action" id="" value="je profite de l'offre"> je profite de l'offre
                    </label>
                    <label class="form-check-label btn">
                        <input <?= !empty($choix3) ? $choix3 : '' ?> class="form-check-input" type="radio" name="action" id="" value="je profite de mon code promo"> je profite de mon code promo
                    </label>
                    <label class="form-check-label btn">
                        <input <?= !empty($choix4) ? $choix4 : '' ?> class="form-check-input" type="radio" name="action" id="" value="je trouve mon community manager"> je trouve mon community manager
                    </label>
                </div>
            </div>
            <button type="submit" class="btn mt-2 btn-success">Validez</button>
        </form>
    </div>

<?php }
?>