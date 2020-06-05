<?php
ini_set('display_errors', 'On');
require('controllers/PartnerController.php');
require('controllers/UserController.php');
require('controllers/CommentController.php');


try
{
    if(isset($_GET['action'])) {
        if($_GET['action'] == 'listPartners') {  //Page des partenaires
            listPartners();
        }

        elseif($_GET['action'] == 'partner') {
            if(isset($_GET['id']) && $_GET['id'] > 0) { //Page d'un partenaire
                partner();
            }
            else{
                throw new Exception('Aucun identifiant partenaire envoyé');
            }
        }

        elseif($_GET['action'] == 'login') {
            if(!empty($_POST['username']) && !empty($_POST['password'])) { //Formulaire de connexion
                login($_POST['username'], $_POST['password']);
            }
            else{
                throw new Exception('Aucun compte correspondant');
            }
        }

        elseif($_GET['action'] == 'logout') { //Déconnexion de la session
            session_start();
            session_destroy();
            connect();
        }

        elseif($_GET['action'] == 'register') { //Page inscription
            register();
        }

        elseif($_GET['action'] == 'registerUser') {  //Formulaire d'inscription
            if(!empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['question']) && !empty($_POST['answer'])) {
                newUser($_POST['name'], $_POST['lastname'], $_POST['username'], $_POST['password'] ,$_POST['question'], $_POST['answer']);
            }
            else{
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }

        elseif($_GET['action'] == 'postComment') { // ajout du commentaire
            if(!empty($_POST['author']) && !empty($_POST['comment']) && !empty($_POST['user_id']) && !empty($_POST['partner_id'])) {
                newComment($_POST['author'], $_POST['comment'], $_POST['user_id'], $_POST['partner_id']);
                
            }
            else{
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
    }
    else{
      connect();

    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}