<?php
ini_set('display_errors', 'On');
require('controllers/PartnerController.php');
require('controllers/UserController.php');
require('controllers/CommentController.php');


try
{
    if(isset($_GET['action'])) {
        if($_GET['action'] == 'listPartners') {
            listPartners();
        }
        elseif($_GET['action'] == 'partner') {
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                partner();
            }
            else{
                throw new Exception('Aucun identifiant partenaire envoyé');
            }
        }
        elseif($_GET['action'] == 'login') {
            if(!empty($_POST['username']) && !empty($_POST['password'])) {
                login($_POST['username'], $_POST['password']);
            }
            else{
                throw new Exception('Aucun compte correspondant');
            }
        }
        elseif($_GET['action'] == 'logout') {
            session_start();
            session_destroy();
            connect();
        }
        elseif($_GET['action'] == 'register') {
            register();
        }
        elseif($_GET['action'] == 'registerUser') {
            if(!empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['question']) && !empty($_POST['answer'])) {
                newUser($_POST['name'], $_POST['lastname'], $_POST['username'], $_POST['password'] ,$_POST['question'], $_POST['answer']);
            }
            else{
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        elseif($_GET['action'] == 'postComment') {
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