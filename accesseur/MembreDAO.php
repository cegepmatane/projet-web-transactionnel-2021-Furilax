<?php
require "MembreSQL.php";

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
			MembreDAO::$basededonnees = new PDO($dsn, $usager, $motdepasse,  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"));
			MembreDAO::$basededonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
}

class MembreDAO extends Accesseur implements MembreSQL{

    public static function validerConnexion($membre){

        MembreDAO::initialiser();

        $requeteValiderConnexion = MembreDAO::$basededonnees->prepare(MembreDAO::SQL_VALIDER_CONNEXION);
        $motDePasse = hash('sha256',$membre["motDePasse"]); 
        $requeteValiderConnexion->bindParam(':identifiant', $membre["identifiant"], PDO::PARAM_STR);
        $requeteValiderConnexion->bindParam(':motDePasse', $motDePasse, PDO::PARAM_STR);
        $requeteValiderConnexion->execute();
        $membre = $requeteValiderConnexion->fetch();

        return $membre;

    }
    
    public static function inscrireUnMembre($membre){

        MembreDAO::initialiser();

        /*$motDePasse = mysql_real_escape_string(htmlspecialchars($membre["motDePasse"]));
        $identifiant = mysql_real_escape_string(htmlspecialchars($membre["identifiant"]));
        $courriel= mysql_real_escape_string(htmlspecialchars($membre["courriel"]));*/
        
        $motDePasse = $membre["motDePasse"];
        $identifiant = $membre["identifiant"];
        $courriel = $membre["courriel"];
        $motDePasse = hash('sha256',$motDePasse);
        
        
        $requeteValiderConnexion = MembreDAO::$basededonnees->prepare(MembreDAO::SQL_INSCRIRE_MEMBRE);
        $requeteValiderConnexion->bindParam(':identifiant', $identifiant, PDO::PARAM_STR);
        $requeteValiderConnexion->bindParam(':motDePasse', $motDePasse, PDO::PARAM_STR);
        $requeteValiderConnexion->bindParam(':courriel', $courriel, PDO::PARAM_STR);

        $reussiteInscription = $requeteValiderConnexion -> execute();
        return $reussiteAjout;
    }

    public static function lireMembreParIdentifiant($identifiant){

        MembreDAO::initialiser();
        
        $requeteLireMembreParIdentifiant = MembreDAO::$basededonnees->prepare(MembreDAO::SQL_LIRE_MEMBRE_PAR_IDENTIFIANT);
        $requeteLireMembreParIdentifiant->bindParam(':identifiant', $identifiant, PDO::PARAM_STR);
        $requeteLireMembreParIdentifiant->execute();
        $membre = $requeteLireMembreParIdentifiant->fetch();

        return $membre;
    }

    public static function detaillerMembre($id)
    {
        MembreDAO::initialiser();

        $demandeMembre = MembreDAO::$basededonnees->prepare(MembreDAO::SQL_DETAIL_MEMBRE);
        $demandeMembre->bindParam(':id', $id, PDO::PARAM_INT);
        $demandeMembre->execute();
        $membre = $demandeMembre->fetch(PDO::FETCH_ASSOC);
        return $membre;
    }
    public static function modifierMembre($membre)
    {
        MembreDAO::initialiser();

        $requeteMembre = MembreDAO::$basededonnees->prepare(MembreDAO::SQL_MODIFIER_MEMBRE);

        $requeteMembre->bindParam(':nom', $membre['nom'], PDO::PARAM_STR);
        $requeteMembre->bindParam(':mail', $membre['mail'], PDO::PARAM_STR);
        $requeteMembre->bindParam(':motDePass', $membre['motDePass'], PDO::PARAM_STR);
        $requeteMembre->bindParam(':id', $membre['id'], PDO::PARAM_INT);
        
        $reussiteModification = $requeteMembre -> execute();
        return $reussiteModification;
    }
}