<?php

require('controllers/PartnerController.php');

try
{
    if(isset($_GET['action'])) {
        if($_GET['action'] == 'listPartners') {
            listPartners();
        }
        elseif($_GET['action'] == 'partner') {
            if(isset($_GET['id']) && $_GET['id'] > 0) {
                partner();
            }
            else{
                throw new Exception('Aucun identifiant partenaire envoyé');
            }
        }
    }
    else{
        listPartners();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}