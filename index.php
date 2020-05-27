<?php

require('controllers/Controller.php');

try {
    listPartners();
}
catch(Exception $e) 
{
    echo 'Erreur : ' . $e->getMessage();
}