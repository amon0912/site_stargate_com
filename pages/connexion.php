<div class="container-fluid">

    <div class="row mb-5">

        <div class="col-md-3">
            ok
        </div>

        <div class="col-md-6 arrondir-8 bg-body p-3">
            <h3 class="text-center ">
                Enregistrement
            </h3>
            <div class="alert" id="msg" role="alert">
            </div>
            <form id="form" method="post">
                <div class="form-group">
                    <label for="tel">Contact</label>
                    <input id="tel" class="form-control" placeholder="Entrez votre numéro" type="text" name="tel">
                </div>
                <div class="form-group">
                    <label for="pass">Mot de passe</label>
                    <input id="pass" class="form-control" placeholder="Entrez votre mot de passe" type="password" name="pass">
                </div>

                <input type="submit" class="form-control btn btn-success mt-2" style="width: 30%;" value='Enregistrez'>
                <a href="?p=inscription" class="btn ml-3">S'inscrire</a>
                <a href="?p=forget" class="btn ml-3">Mot de passe oublié</a>
            </form>
        </div>

        <div class="col-md-3">
            ok
        </div>
    </div>
</div>