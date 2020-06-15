<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>

<?php 
    $title = 'Mot de passe oublié';
    $style = "Connect" ;
?>

<?php ob_start(); ?>

<div class="container-fluid text-center">
    <form class="form-signin" method="post" action="index.php?action=forgotPassword">
        <img class="mb-4" src="public/images/logo.png" alt="logo-GBAF">
        <h1 class="h3 mb-3 font-weight-normal">Changer le mot de passe</h1>

            <?php
                if(isset($_SESSION["error"])){
                    $error = $_SESSION["error"];   // Message d'erreur
                    echo "<span>$error</span>";
                }
            ?>  

            <?php
                if(isset($_SESSION["success"])){
                    $success = $_SESSION["success"];   // Message de réussite
                    echo "<span>$success</span>";
                }
            ?>  

        <label for="inputUsername" class="sr-only">Nom d'utilisateur</label>
        <input type="text" id="inputUsername" class="form-control mb-2" name="username" placeholder="Nom d'utilisateur" required>

        <label for="inputPassword" class="sr-only">Nouveau mot de passe</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Nouveau mot de passe" required>

        <label for="inputQuestion" class="sr-only">Question secrète</label>
        <select class="form-control mb-2" id="inputQuestion" name="question">
            <option selected readonly>Choisissez votre question secrète</option>
            <option>Votre club de foot préféré ?</option>
            <option>Votre première voiture ?</option>
            <option>Le nom de naissance de votre mère ?</option>
            <option>Le métier de votre grand-père ?</option>
            <option>Votre couleur préféré ?</option>
            </select>

        <label for="inputAnswer" class="sr-only">Réponse</label>
        <input type="text" id="inputAnswer" class="form-control mb-2" name="answer" placeholder="Réponse" required>

        <input class="btn btn-lg btn-danger btn-block" type="submit" value="Valider">

        <p class="mt-2 mb-3">Retour à la page  <a href="index.php">Connexion</a></p>
    </form>
</div>

<?php
unset($_SESSION["error"]);
?>
<?php
unset($_SESSION["success"]);
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>