<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
    <title>Espace Admin</title>
</head>
<?php
$pages = scandir('pages/');
// var_dump($_SESSION);
if (!empty($_GET['p'])) {
    if ($_GET['p'] != '.' || $_GET['p'] != '..' || $_GET['p'] != 'inc') {
        if (in_array($_GET['p'] . '.php', $pages)) {
            $p = $_GET['p'];
        } else {
            $p = 'erreur';
        }
    } else {
        $p = 'erreur';
    }
} else {
    $p = 'login';
}
?>

<body>
    <?php 
    if (!empty($_SESSION['id'])) {
        include_once('pages/inc/menu.php');    
    }
    ?>
    <?php
    include('pages/' . $p . '.php');
    ?>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha2/js/bootstrap.min.js"></script>

    <script src="js/k<?= !empty($_GET['p']) ? $p : $p ?>_user.js"></script>
</body>

</html>