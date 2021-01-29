<?php

class bdd
{
        //Function pour se connecter à la Db 
        public function connectDb()
        {
            $local = 'mysql:host=localhost;dbname=blog';
            $user = 'root';
            $pass = 'root';
            try {
                $db = new PDO($local, $user, $pass);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            return $db;
            // Important le return sinon la function ne marche pas
        }
}
?>