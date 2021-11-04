<?php
require CHEMIN_MODELE . "Logo.php";
require CHEMIN_ACCESSEUR . "LogoSQL.php";

class Accesseur{
    public static $basededonnees = null;

		public static function initialiser()
		{
			$usager = 'root';
			$motdepasse = '6785';
			$hote = 'localhost';
			$base = 'logos';
            $charset = 'utf8mb4';
			$dsn = 'mysql:dbname='.$base.';host='.$hote.';charset='.$charset;
			LogoDAO::$basededonnees = new PDO($dsn, $usager, $motdepasse,  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"));
			LogoDAO::$basededonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
}

class LogoDAO extends Accesseur implements AchatSQL{

    

}

?>