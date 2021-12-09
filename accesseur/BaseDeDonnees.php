<?php

include "../configuration.php";
class BaseDeDonnees{
    
    public static function getConnexion(){
        $usager = 'root';
        $motdepasse = '6785';
        $hote = 'localhost';
        $base = 'logos';
        $charset = 'utf8mb4';
    
        $dsn = 'mysql:dbname='.$base.';host=' . $hote.';charset='.$charset;
        $connexion = new PDO($dsn, $usager, $motdepasse);
        return $connexion;
    }
}
?>