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

function login($username, $password)
{
    $userManager = new UserManager();
    
    $loginUser = $userManager->login($username, $password);

    if($loginUser == false) {
        Header('Location: index.php');
    }
    else{
        Header('Location: index.php?action=listPartners');
    }
}

function affichage()
{
    require('views/connection.php');
}