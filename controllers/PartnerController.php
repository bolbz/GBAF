<?php

require_once('models/PartnerManager.php');

function listPartners() 
{
    $partnerManager = new PartnerManager();
    $partners = $partnerManager->getPartners();

    require('views/homeView.php');
}

function partner()
{
    $partnerManager = new PartnerManager();
    $partner = $partnerManager->getPartner($_GET['id']);

    require('views/partnerView.php');
}