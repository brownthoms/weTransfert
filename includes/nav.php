<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">

    <a class="navbar-brand" href="#">weTransfert</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto"></ul>
        <form class="form-inline mt-2 mt-md-0" action="" method="post">
            <button type="button" class="btn btn-success mr-sm-2" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Sign In</button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal1" data-whatever="@getbootstrap">Sign Up</button>
        </form>
    </div>
</nav>

<!-- Modal connexion -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="contact-form" class="" action="" method="post" role="form">
                    <div class="">
                        <div class="">
                            <label for="mail">Mail :</label>
                            <input type="text" id="mail" name="mail" value="" class="form-control" placeholder="Votre mail">
                            <p class="commantaire"></p>
                        </div>
                        <div class="">
                            <label for="password">Password :</label>
                            <input type="password" id="password" name="password" value="" class="form-control" placeholder="Votre mot de passe">
                            <p class="commantaire"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal inscription -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="contact-form" class="" action="controller/logintest.php" method="post" role="form">
                    <div class="">
                        <div class="">
                            <label for="mail">Mail :</label>
                            <input type="text" id="mail" name="mail" value="" class="form-control" placeholder="Votre mail" required>
                            <p class="commantaire"></p>
                        </div>
                        <div class="">
                            <label for="password">Password :</label>
                            <input type="password" id="password" name="password" value="" class="form-control" placeholder="Votre mot de passe" required>
                            <p class="commantaire"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger signUp">Sign Up</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
