<?php

include "../configuration.php";
class BaseDeDonnees{
    
    public static function getConnexion(){
        $usager = 'root';
        $motdepasse = '6785';
        $hote = 'localhost';
        $base = 'logos';
    
        $dsn = 'mysql:dbname='.$base.';host=' . $hote;
        $connexion = new PDO($dsn, $usager, $motdepasse);
        return $connexion;
    }
}
?>