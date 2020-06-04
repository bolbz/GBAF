<?php
require_once('models/Connection.php');

class UserManager extends Connection 
{
    public function registerUser($name, $lastname, $username, $password, $question, $answer )
    {
       try {

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
    
    }catch(PDOException $e){
        echo $e->getMessage();
    }

    }


    public function findUserUsername($username) 
    {
        try 
        {
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT COUNT (username) FROM users WHERE username = ?');
            $req->execute(array($username));
            $user= $req->fetch();

            return $user;
        
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function login($username, $password)
    {
        try 
        {
            $db=$this->dbConnect();
            $req= $db->prepare('SELECT * FROM users WHERE username=?');
            $req->execute(array($username));
            $login = $req->fetch(PDO::FETCH_ASSOC);

            if(password_verify($password, $login['password'])) {
                session_start();
                $_SESSION['user_id']=$login['id'];
                $_SESSION['user_name']=$login['name'];
                $_SESSION['user_lastname']=$login['lastname']; 
                $_SESSION['user_username']=$login['username'];
                return $login;
         } else {
             return false;
         }
        
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}