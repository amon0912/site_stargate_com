<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Connexion</title>
</head>
<body>


    <!-- menu -->
    <?php include('../inc/menu.php') ?>


    <div class="container-fluid">
        <h3 class="text-center ">
            Enregistrement
        </h3>
        <div class="row">
            
            <div class="col-md-3">
                ok
            </div>    

            <div class="col-md-6">

                <form>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input id="nom" class="form-control" type="text" name="nom">
                    </div>
                    <div class="form-group">
                        <label for="prenoms">Prénoms</label>
                        <input id="prenoms" class="form-control" type="text" name="premons">
                    </div>
                </form>
            </div>    

            <div class="col-md-3">
            ok
            </div>    
        </div>
    </div>

    <!-- footer -->
    <?php include('../inc/footer.php') ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha2/js/bootstrap.min.js"></script>

  <script src="../js/footer.php"></script>  
</body>
</html>