<?php $title='Connexion' ; ?>
<?php $style ='Connect' ; ?>

<?php ob_start() ?>

<div class="container-fluid text-center">
        <form class="form-signin" method="post" action="index.php?action=login">

            <img class="mb-4" src="./public/images/logo.png" alt="logo-GBAF">
            <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>

            <label for="inputUsername" class="sr-only">Nom d'utilisateur</label>
            <input type="text" id="inputUsername" class="form-control mb-2" name="username" placeholder="Nom d'utilisateur" required
                autofocus>

            <label for="inputPassword" class="sr-only">mot de passe</label>
            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Mot de passe" required>

            <input class="btn btn-lg btn-danger btn-block" type="submit" value="Se connecter">

            <p class="mt-4 mb-3">Mot de passe <a href="#">oublié ?</a></p>
            <p class="mt-2 mb-3">Pas encore de compte ? <a href="#">Inscription</a></p>
            
        </form>
    </div>

    <?php $content = ob_get_clean() ; ?>
    <?php require('template.php'); ?>