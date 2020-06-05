<?php session_start(); ?>
<?php $title='Inscription' ; ?>
<?php $style ='Connect' ; ?>

<?php ob_start() ?>

<div class="container-fluid text-center">
        <form class="form-signin" method="post" action="index.php?action=registerUser">
            <img class="mb-4" src="public/images/logo.png" alt="logo-GBAF">
            <h1 class="h3 mb-3 font-weight-normal">Inscription</h1>

                <?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];   // Message d'erreur
                        echo "<span>$error</span>";
                    }
                ?>  

            <label for="inputName" class="sr-only">Nom</label>
            <input type="text" id="inputName" class="form-control mb-2" name="name" placeholder="Nom" required
                autofocus>

                <label for="inputLastName" class="sr-only">Prénom</label>
            <input type="text" id="inputLastName" class="form-control mb-2" name="lastname" placeholder="Prénom" required
                autofocus>

                <label for="inputUsername" class="sr-only">Nom d'utilisateur</label>
            <input type="text" id="inputUsername" class="form-control mb-2" name="username" placeholder="Nom d'utilisateur" required
                autofocus>

            <label for="inputPassword" class="sr-only">mot de passe</label>
            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Mot de passe" required>

            <label for="inputQuestion" class="sr-only">Question secrète</label>
            <select class="form-control mb-2" id="inputQuestion" name="question">
                <option selected disabled>Choisissez votre question secrète</option>
                <option>Votre club de foot préféré ?</option>
                <option>Votre première voiture ?</option>
                <option>Le nom de naissance de votre mère ?</option>
                <option>Le métier de votre grand-père ?</option>
                <option>Votre couleur préféré ?</option>
              </select>

            <label for="inputAnswer" class="sr-only">Réponse</label>
            <input type="text" id="inputAnswer" class="form-control mb-2" name="answer" placeholder="Réponse" required
                autofocus>

            <input class="btn btn-lg btn-danger btn-block" type="submit" value="S' inscrire">


            <p class="mt-2 mb-3">Déjà inscrit ? <a href="index.php">Connexion</a></p>
        </form>
    </div>

    <?php
    unset($_SESSION["error"]);
    ?>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>