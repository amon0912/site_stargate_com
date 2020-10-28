<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="?p=mon-espace" >Espace Admin</a>
    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="my-nav" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Item 1 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Item 2</a>
            </li>
        </ul>
        <?php
        if (!empty($_SESSION['id_user'])) { ?>

            <div class="">
                <a class="mr-3 btn btn-outline-danger" href="?p=logout">Se déconnecter</a>
            </div>

        <?php } ?>

    </div>
</nav>