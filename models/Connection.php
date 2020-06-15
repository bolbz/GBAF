<?php 
class Connection 
    {
        protected function dbConnect()
        {
            try
            {
                $db = new PDO('mysql:host=localhost;dbname=projet-gbaf;charset=utf8', 'root', '');
                return $db;
             }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }
        }

    }