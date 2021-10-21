<?php
require CHEMIN_ACCESSEUR . "BaseDeDonnees.php";
require CHEMIN_MODELE . "Logo.php";
require CHEMIN_ACCESSEUR . "LogoSQL.php";

class MembreDAO implements LogoSQL{

    public static function validerConnexion($membre){

        
        $requeteValiderConnexion = BaseDeDonnees::getConnexion()->prepare(BaseDeDonnees::SQL_VALIDER_CONNEXION);
        $requeteValiderConnexion->bindParam(':identifiant', $membre["identifiant"], PDO::PARAM_STR);
        $requeteValiderConnexion->bindParam(':motDePasse', $membre["motDePasse"], PDO::PARAM_STR);
        $requeteValiderConnexion->execute();
        $membre = $requeteValiderConnexion->fetch();

        return $membre;

    }
    
    public static function inscrireUnMembre($membre){

        $motDePasse = mysql_real_escape_string(htmlspecialchars($membre["motDePasse"]));
        $identifiant = mysql_real_escape_string(htmlspecialchars($membre["identifiant"]));
        $courriel= mysql_real_escape_string(htmlspecialchars($membre["courriel"]));
           
        $motDePasse = sha1($motDePasse);
        
        $requeteValiderConnexion = BaseDeDonnees::getConnexion()->prepare(BaseDeDonnees::SQL_INSCRIRE_MEMBRE);
        $requeteValiderConnexion->bindParam(':identifiant', $identifiant, PDO::PARAM_STR);
        $requeteValiderConnexion->bindParam(':motDePasse', $motDePasse, PDO::PARAM_STR);
        $requeteValiderConnexion->bindParam(':courriel', $courriel, PDO::PARAM_STR);
        $requeteValiderConnexion->execute();
    }

    public static function lireMembreParIdentifiant($identifiant){

        $requeteLireMembreParIdentifiant = BaseDeDonnees::getConnexion()->prepare(BaseDeDonnees::SQL_LIRE_MEMBRE_PAR_IDENTIFIANT);
        $requeteLireMembreParIdentifiant->bindParam(':identifiant', $membre["identifiant"], PDO::PARAM_STR);
        $requeteLireMembreParIdentifiant->execute();
        $membre = $requeteLireMembreParIdentifiant->fetch();

        return $membre;
    }
}