<?php session_start(); 
var_dump($nbDislike);
?>
<?php $title='Paramètre du compte' ; ?>
<?php $style ='Home' ; ?>

<?php ob_start() ?>

<section>
  <?php include_once'header.php';?>
</section>
<div class="container bootstrap snippet mt-5">
        <div class="row">
            <div class="col-sm-10"><h1><?= $_SESSION['user_name'];?> <?=$_SESSION['user_lastname'];?></h1></div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="text-center">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                </div></hr>
 
                <ul class="list-group mt-3">
                    <li class="list-group-item active">Activités <i class="fas fa-chart-line"></i></li>
                    <li class="list-group-item list-group-item-info text-right"><span class="pull-left"><i class="far fa-comments"></i><strong> Commentaires: </strong></span><?=count($nbComment) ?></li>
                    <li class=" list-group-item list-group-item-success text-right"><span class="pull-left"><i class="far fa-thumbs-up"></i><strong> Likes: </strong></span><?= htmlspecialchars(count($nbLike))?></li>
                    <li class="list-group-item list-group-item-danger text-right"><span class="pull-left"><i class="far fa-thumbs-down"></i><strong> Dislike: </strong></span><?= htmlspecialchars(count($nbDislike))?></li>
                </ul>     
            </div>

            <div class="col-sm-9">
                <ul class="nav nav-tabs">
                    <li class="active mb-2"><h2>Paramètre du compte :</h2></li>
                </ul>
                  
                <div class="tab-content mt-3">
                    <div class="tab-pane active" id="home">

                    <?php
                        if(isset($_SESSION["error"])){
                            $error = $_SESSION["error"];
                            echo '<div class="alert alert-danger">';
                            echo "<strong>$error</strong>";
                            echo "</div>";
                        }
                    ?>
                    
                    <?php 
                        if(isset($_SESSION['success'])){
                            $success= $_SESSION['success'];
                            echo '<div class="alert alert-success">';
                             echo "<strong>$success</strong>";
                             echo  "</div>";
                        }
                    ?>
                        
                        <form class="form" action="index.php?action=updateUser" method="post" id="registrationForm">

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <input type="hidden" name="id" value="<?= $_SESSION['user_id']?>">
                                    <label for="inputName"><h4>Nom</h4></label>
                                    <input type="text" class="form-control" name="name" id="inputName" value="<?= $_SESSION['user_name'] ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="inputLastName"><h4>Prénom</h4></label>
                                    <input type="text" class="form-control" name="lastname" id="inputLastName" value="<?= $_SESSION['user_lastname'] ?>" required>
                                </div>
                            </div>
                
                            <div class="form-group">                              
                                <div class="col-xs-6">
                                    <label for="inputUsername"><h4>Nom d'utilisateur</h4></label>
                                    <input type="text" class="form-control" name="username" id="inputUsername" value="<?= $_SESSION['user_username'] ?>" readonly required>
                                </div>
                            </div>

                            <div class="form-group">                              
                                <div class="col-xs-6">
                                    <label for="inputPassword"><h4>Mot de passe</h4></label>
                                    <input type="password" class="form-control" name="password" id="inputPassword" value="<?= $_SESSION['user_password'] ?>" required>
                                </div>
                            </div>

                            <div class="form-group"> 
                                <div class="col-xs-6">
                                    <label for="inputQuestion"><h4>Question secrète</h4></label>
                                    <select class="form-control mb-2" id="inputQuestion" name="question">
                                        <option selected readonly><?= $_SESSION['user_question'] ?></option>
                                        <option>Votre club de foot préféré ?</option>
                                        <option>Votre première voiture ?</option>
                                        <option>Le nom de naissance de votre mère ?</option>
                                        <option>Le métier de votre grand-père ?</option>
                                        <option>Votre couleur préféré ?</option>
                                      </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="inputAnswer"><h4>Réponse</h4></label>
                                    <input type="text" class="form-control" name="answer" id="inputAnswer" value="<?= $_SESSION['user_answer'] ?>" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <button class="btn btn-lg btn-outline-danger" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>Enregister modifications</button>
                                    <a class="btn btn-lg" href='index.php?action=listPartners'><i class="glyphicon glyphicon-repeat"></i> Retour à l'accueil</button>
                                </div>
                            </div>
                        </form>
                    
                        <hr> 
                    </div>         
                </div> 
            </div>
        </div>


<?php
unset($_SESSION["error"]);
?>

<?php
unset($_SESSION["success"]);
?>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>