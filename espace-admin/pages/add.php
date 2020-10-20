<?php
if (empty($_SESSION['id'])) {
    echo 'err';
} else { ?>
    <div class="container">
        <form method="post" action="traitement/test.php" id="form" class="m-5" enctype="multipart/form-data">
            <h3 class="text-center">Ajout d'offre</h3>
            <div class="alert" id="msg">
            </div>

            <?php
            $typeOffre = ['formation', 'community management', 'creation de site web', "creation d'application mobole", 'conception de carte de visite', 'conception de flyers'];
            ?>
            <div class="form-group mt-3">
                <label for="lib_offre">Type d'offre</label>
                <select id="lib_offre" class="form-control" name="lib_offre">
                    <option value=""></option>';
                    <?php
                    foreach ($typeOffre as $key => $value) {
                        echo '<option value="' . $value . '">' . $value . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="type_offre">Choix du type de format</label>
                <select id="type_offre" class="form-control" name="type_offre">
                    <option value=""></option>';
                    <option value="image">Image</option>';
                    <option value="video">Vidéo</option>';
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="fichier">Charger un format</label>
                <input id="fichier" accept=".mp4, .jpg, .png, jpeg" class="form-control-file" type="file" name="fichier" value="">
            </div>

            <div class="form-group mt-3">
                <label for="descrip">Description</label>
                <textarea id="descrip" class="form-control" type="text" name="descrip"></textarea>
            </div>

            <div class="mt-3">
                <div class="form-check form-check-inline">
                    <label class="form-check-label btn">
                        <input class="form-check-input" type="radio" name="action" id="" value="Je m'inscris"> Je m'inscris
                    </label>
                    <label class="form-check-label btn">
                        <input class="form-check-input" type="radio" name="action" id="" value="je Pofite de l'offre"> je profite de l'offre
                    </label>
                    <label class="form-check-label btn">
                        <input class="form-check-input" type="radio" name="action" id="" value="je profite de mon code promo"> je profite de mon code promo
                    </label>
                    <label class="form-check-label btn">
                        <input class="form-check-input" type="radio" name="action" id="" value="je profite de mon code promo"> je trouve mon community manager
                    </label>
                </div>
            </div>
            <button type="submit" class="btn mt-2 btn-success">Validez</button>
        </form>
    </div>

<?php }
?>