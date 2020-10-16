<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Stargate Communication</title>
</head>

<body>
    <?php
    require('../config/db.php');

    if (!empty($_POST['modify']) && !empty($_POST['pass'])) {
        $modify = strip_tags(trim($_POST['modify']));
        $pass = strip_tags(trim($_POST['pass']));

        $q = $db->prepare("SELECT * FROM client WHERE id_client = ?");
        $q->execute([$modify]);

        $cpt = $q->rowCount();
        if ($cpt) {
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $req = $db->prepare("UPDATE client set pass = ? WHERE id_client = ?");
            $req->execute([$pass, $modify]);

            echo '<script>
            alert("Effectuée");
            
            </script>';

            header('Location: ../?p=connexion');
        }
    } else {

    ?>
        <div class="container">
            <div class=" m-5 text-center">
                <h2 class="m-2">Modification du mot de passe</h2>
                <i class="far fa-user-circle fa-fw fa-9x "></i>
                <form method="post">
                    <div class="form-group">
                        <input hidden id="my-input" class="form-control" type="text" name="modify" value="<?= !empty($_GET['modify']) ? $_GET['modify'] : '' ?>">
                    </div>
                    <div class="form-group col-md-5 mx-auto">
                        <label for="pass">Veuillez saisir votre nous mot de passe </label>
                        <input id="pass" class="form-control" type="text" name="pass">
                    </div>
                    <div class="form-group col-md-5 mt-3 mx-auto">
                        <input type="submit" class="btn btn-success " value="Confirmer">
                    </div>
                </form>
            </div>
        </div>

    <?php
    }
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>