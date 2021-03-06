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
            $error='Mot de passe ou utilisateur incorrect';

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
                $_SESSION['user_password']=$password;
                $_SESSION['user_question']=$login['question'];
                $_SESSION['user_answer']=$login['answer'];
                return $login;
         } else {
             session_start();
             $_SESSION['error'] =  $error;
             
         }
        
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function findUserById($username)
    {
        $db=$this->dbConnect();
        $req= $db->prepare('SELECT * FROM users WHERE username=?');
        $req->execute(array($username));
        $user = $req->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    function forgotPassword($id, $password)
    {
        try
        {
            $new_password = password_hash($password, PASSWORD_DEFAULT);
            $db=$this->dbConnect();
            $req= $db->prepare("UPDATE users SET password='$new_password' WHERE id='$id' ");
            $update = $req->execute();

            return $update;
                   
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }

    function updateUser($id, $name, $lastname, $username, $password, $question, $answer)
    {
        try
        {
            $update_password= password_hash($password, PASSWORD_DEFAULT);
            $db = $this->dbConnect();
            $req = $db->prepare("UPDATE users SET name='$name', lastname='$lastname', username='$username', password = '$update_password', question='$question', answer='$answer' WHERE id='$id' ");
            $update= $req->execute();

            return $update;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function getLike($user_id)
    {
        try
        {
            $db=$this->dbConnect();
            $req=$db->prepare("SELECT * FROM votes WHERE user_id='$user_id' AND value = 1");
            $req->execute();
            $like = $req->fetchAll();
            return $like;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function getDislike($user_id)
    {
        try
        {
            $db=$this->dbConnect();
            $req=$db->prepare("SELECT * FROM votes WHERE user_id='$user_id' AND value = -1");
            $req->execute();
            $like = $req->fetchAll();
            return $like;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}