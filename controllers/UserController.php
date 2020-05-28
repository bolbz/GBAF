<?php
require_once('models/UserManager.php');

function newUser( $name, $lastname, $username, $password, $question, $answer) 
{
    $userManager= new UserManager();

    $addUser = $userManager->registerUser($name, $lastname, $username, $password, $question, $answer);
    $user = $userManager->findUserUsername($username);

    if($addUser === false || $addUser == $user ) {
        throw new Exception('Impossible de créer un compte');
    }
    else {
        require('views/connection.php');

    }

}
        function affichage(){

            require('views/register.php');
        }