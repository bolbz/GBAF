<?php
require_once("models/Connection.php");

class CommentManager extends Connection {

    public function addComment($author, $comment, $user_id, $partner_id)
    {
        try{
            $db = $this->dbConnect();
            $req = $db->prepare('INSERT INTO comments(author, comment, date_comment, user_id, partner_id) VALUE(?,?,NOW(),?,?)');
            $comments= $req->execute(array($author,$comment,$user_id,$partner_id));
            
            return $comments;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}