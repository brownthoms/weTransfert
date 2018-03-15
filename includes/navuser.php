<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">

    <a class="navbar-brand" href="#">weTransfert</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="text-center offset-1">
            <span class="texte">Bienvenue </span><span class="name_session"><?php session_start(); echo $_SESSION['nom']; ?></span>
        </div>
        <ul class="navbar-nav mr-auto"></ul>
        <form class="form-inline mt-2 mt-md-0" action="" method="post">

            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal1" data-whatever="@getbootstrap">Disconnect</button>
        </form>
    </div>
</nav>
