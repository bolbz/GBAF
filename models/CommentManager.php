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

    public function getCommentByPartnerId($partner_id)
    {
        try{
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin\') AS comment_date FROM comments WHERE partner_id=? ORDER BY date_comment DESC');
            $req->execute(array($partner_id));

            $commentUsers = $req->fetchAll();

            return $commentUsers;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    } 
}