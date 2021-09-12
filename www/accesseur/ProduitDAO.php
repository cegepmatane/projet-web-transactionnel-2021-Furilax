<?php
require "BaseDeDonnees.php";
class ProduitDAO{

    public static function lireProduitParId($id)
{
$SQL_PRODUIT = "SELECT * FROM logos WHERE id = :id"; 
$requeteProduit = BaseDeDonnees::getConnexion($id)->prepare($SQL_PRODUIT);
$requeteProduit->bindParam(':id', $id, PDO::PARAM_INT);
$requeteProduit->execute();
$produit = $requeteProduit->fetch();

return $produit;
}

public static function listerProduit(){
    $MESSAGE_SQL_LIST_PRODUIT = "SELECT id, nom, auteur, description, image, prix FROM logos;";
    $requeteListeProduit = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_LIST_PRODUIT);
    $requeteListeProduit->execute();
    $listeProduit = $requeteListeProduit->fetchAll();
    
    return $listeProduit;
}

}
?>