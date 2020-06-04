<?php
require_once('models/UserManager.php');

function newUser( $name, $lastname, $username, $password, $question, $answer) 
{
    $error = 'le nom utilisateur existe déjà';
    $userManager= new UserManager();

    $addUser = $userManager->registerUser($name, $lastname, $username, $password, $question, $answer);
    $user = $userManager->findUserUsername($username);

    if($addUser === false || $addUser == $user ) {
       session_start();
       $_SESSION['error']= $error;
       Header('Location: index.php?action=register');
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

function connect()
{
    require('views/connection.php');
}

function register() 
{
    require('views/register.php');
}