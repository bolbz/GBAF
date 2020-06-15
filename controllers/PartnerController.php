<?php

require_once('models/PartnerManager.php');
require_once('models/CommentManager.php');

function listPartners() 
{
    $partnerManager = new PartnerManager();
    $partners = $partnerManager->getPartners();

    require('views/homeView.php');
}

function partner()
{
    $commentManager = new CommentManager();
    $partnerManager = new PartnerManager();

    $partner = $partnerManager->getPartner($_GET['id']);
    $getComments= $commentManager->getCommentByPartnerId($_GET['id']);

    require('views/partnerView.php');
}

function liked($user_id, $partner_id, $value)
{
    $partnerManager = new PartnerManager;

    $like=$partnerManager->likes($user_id,$partner_id,$value);

    Header('Location: index.php?action=partner&id='.$partner_id);
}