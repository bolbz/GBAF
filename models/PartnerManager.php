<?php
require_once("models/Connection.php");

class PartnerManager extends Connection 
{
    public function getPartners() 
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, name, content, extract, logo FROM partners' );

        return $req;
    }
}