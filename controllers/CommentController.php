<?php

require_once('models/CommentManager.php');

function newComment($author, $comment, $user_id, $partner_id)
{
    $error='impossible d\'ajouter le commentaire';
    $success= 'commentaire ajouté';

    $commentManager = new CommentManager();
    $postComment = $commentManager->addComment($author, $comment, $user_id, $partner_id);

    if($postComment == false) {
        session_start();
        $_SESSION['error'] = $error;
        header('Location: index.php?action=partner&id='.$partner_id);
    } else{
        session_start();
        $_SESSION['success']= $success;
        header('Location: index.php?action=partner&id='.$partner_id);
    }
}