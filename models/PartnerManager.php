<?php
require_once("models/Connection.php");

class PartnerManager extends Connection 
{
    public function getPartners() 
    {
        try
        {
            $db = $this->dbConnect();
            $req = $db->query('SELECT id, name, content, extract, logo FROM partners' );

            return $req;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getPartner($partnerId) 
    {
        try
        {
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT * FROM partners WHERE id= ? ');
            $req->execute(array($partnerId));
            $partner = $req->fetch();

            return $partner;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function likes($user_id, $partner_id, $value)
    {
        try
        {
            $db= $this->dbConnect();
            $req = $db->prepare("SELECT * FROM votes WHERE partner_id='$partner_id' AND user_id='$user_id'");
            $req->execute(array($partner_id));
            $vote = $req->fetch();

            if(!$vote){
                $req1=$db->prepare('INSERT INTO votes(user_id, partner_id, value) VALUE(?,?,?)');
                $req1->execute(array($user_id, $partner_id,$value));
                $count=$this->countLikesAndDislikes($partner_id, $value);
            }
            elseif($vote && $vote['value'] != $value){
                $req2= $db->prepare("UPDATE votes SET value='$value' WHERE partner_id='$partner_id' AND user_id='$user_id'");
                $update=$req2->execute();
                $count=$this->addLikesOrDislikes($partner_id, $value);
                
            } else{
                return true;
            }
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function countLikesAndDislikes($partner_id, $value)
    {
        $db= $this->dbConnect();

        if($value == 1){
             $req= $db->prepare("UPDATE partners SET like_count = like_count + 1 WHERE id='$partner_id'");
             $count=$req->execute();
        }else{
            $req= $db->prepare("UPDATE partners SET dislike_count = dislike_count + 1 WHERE id='$partner_id'");
             $count=$req->execute();
        }
    }

    public function addLikesOrDislikes($partner_id, $value)
    {
        $db= $this->dbConnect();

        if($value == 1){
             $req= $db->prepare("UPDATE partners SET like_count = like_count + 1, dislike_count= dislike_count - 1 WHERE id='$partner_id'");
             $count=$req->execute();
        }else{
            $req= $db->prepare("UPDATE partners SET dislike_count = dislike_count + 1, like_count= like_count - 1 WHERE id='$partner_id'");
             $count=$req->execute();
        }
    }

    
}