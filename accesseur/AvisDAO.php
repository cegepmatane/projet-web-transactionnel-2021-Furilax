<?php
require CHEMIN_MODELE . "Avis.php";
require "AvisSQL.php";

class Accesseur {
    public static $basededonnees = null;

    public static function initialiser()
    {
        $usager = 'root';
        $motdepasse = '6785';
        $hote = 'localhost';
        $base = 'evaluation';
        $charset = 'utf8mb4';
        $dsn = 'mysql:dbname='.$base.';host='.$hote.';charset='.$charset;
        AvisDAO::$basededonnees = new PDO($dsn, $usager, $motdepasse,  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"));
        AvisDAO::$basededonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}

class AvisDAO extends Accesseur implements AvisSQL {

    public function listerAvisUtilisateur($idUtilisateur) {
        AvisDAO::initialiser();

        $demandeAvis = AvisDAO::$basededonnees->prepare(AvisDAO::SQL_LISTE_UTILISATEUR_AVIS);
        $demandeAvis->bindParam(':idUtilisateur',$idUtilisateur, PDO::PARAM_INT);
        $demandeAvis->bindParam(':idLogo',$idLogo, PDO::PARAM_INT);
        $demandeAvis->execute();
        return $demandeAvis->fetch();
    }

    public function listerAvis() {
        AvisDAO::initialiser();

        $demandeAvis = AvisDAO::$basededonnees->prepare(AvisDAO::SQL_LISTE_AVIS);
        $demandeAvis->execute();
        return $demandeAvis->fetchAll();
    }

    public function ajouterAvis($avis) {
        AvisDAO::initialiser();

        $demandeAvis = AvisDAO::$basededonnees->prepare(AvisDAO::SQL_AJOUT_AVIS);
        $demandeAvis->bindParam(':idUtilisateur',$avis['idUtilisateur'], PDO::PARAM_INT);
        $demandeAvis->bindParam(':idLogo',$avis['idLogo'], PDO::PARAM_INT);
        $demandeAvis->bindParam(':evaluation',$avis['evaluation'], PDO::PARAM_INT);
        $demandeAvis->execute();
        return $demandeAvis;
    }

    public function moyenneAvis($id) {
        AvisDAO::initialiser();

        $demandeAvis = AvisDAO::$basededonnees->prepare(AvisDAO::SQL_MOYENNE_AVIS);
        $demandeAvis->bindParam(':id',$id, PDO::PARAM_INT);
        $demandeAvis->execute();
        return $demandeAvis->fetch();
    }

}
?>