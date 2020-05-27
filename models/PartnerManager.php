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

    public function getPartner($partnerId) 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, name, content, logo FROM partners WHERE id= ? ');
        $req->execute(array($partnerId));
        $partner = $req->fetch();

        return $partner;
    }
}