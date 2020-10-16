<?php session_start()?>
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

    if (!empty($_POST['verify'])) {
        $verify = strip_tags(trim($_POST['verify']));
        $q = $db->prepare("SELECT * FROM client WHERE id_client = ?");
        $q->execute([$verify]);
        $cpt = $q->rowCount();
        if ($cpt) {
            $req = $db->prepare("UPDATE client set confirmation_client = ? WHERE id_client = ?");
            $req->execute([true, $verify]);
            
            while ($data = $q->fetch()) {
                $_SESSION['id'] = $data['id_client'];
                $_SESSION['nom'] = $data['nom_client'];
                $_SESSION['prenoms'] = $data['prenoms_client'];

            }
            echo '<script>
            alert("Effectuée");
            
            </script>';

            header('Location: ../..');
        }
    } else {
    
    ?>
    <div class="container">
        <div class="text-center m-5">
            <h2 class="m-2">Validation du compte</h2>
            <i class="fa fa-check-circle text-success m-5 fa-fw fa-9x" aria-hidden="true"></i>
            <form method="post" action="">
                <div class="form-group">
                    <input hidden id="my-input" class="form-control" type="text" name="verify" value="<?= !empty($_GET['verify']) ? $_GET['verify'] : '' ?>">
                </div>
                <input type="submit" class="btn btn-success" value="Confirmer">
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