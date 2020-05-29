<?php
ini_set('display_errors', 'On');
require('controllers/PartnerController.php');
require('controllers/UserController.php');


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
        elseif($_GET['action'] == 'register') {
            if(!empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['question']) && !empty($_POST['answer'])) {
                newUser($_POST['name'], $_POST['lastname'], $_POST['username'], $_POST['password'] ,$_POST['question'], $_POST['answer']);
            }
            else{
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
    }
    else{
      affichage();

    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}