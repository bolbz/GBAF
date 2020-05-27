<?php

require_once('models/PartnerManager.php');

function listPartners() 
{
    $partnerManager = new PartnerManager();
    $partners = $partnerManager->getPartners();

    require('views/homeView.php');
}