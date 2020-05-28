<?php
require_once('models/Connection.php');

class UserManager extends Connection 
{
    public function registerUser($name, $lastname, $username, $password, $question, $answer )
    {
        $new_password = password_hash($password, PASSWORD_DEFAULT);
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO users( name, lastname, username, password, question, answer) VALUE( :name, :lastname, :username, :password, :question, :answer)');
        $req->bindParam(":name", $name);
        $req->bindParam(":lastname", $lastname);
        $req->bindParam(":username", $username);
        $req->bindParam(":password", $new_password);
        $req->bindParam(":question", $question);
        $req->bindParam(":answer", $answer);

        $register = $req->execute();

        return $register;
    }

    public function findUserUsername($username) 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT COUNT (username) FROM users WHERE username = ?');
        $req->execute(array($username));
        $user= $req->fetch();

        return $user;
    }

    public function login($username, $password)
    {
        $db=$this->dbConnect();
 
    }
}