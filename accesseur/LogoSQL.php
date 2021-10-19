<?php
interface LogoSQL
{
	
	public const SQL_LISTE_LOGOS = "SELECT * FROM logo";
	public const SQL_DETAIL_LOGO = "SELECT * FROM logo WHERE id = :id"; 
	public const SQL_NOUVEAUTES_LOGOS = "SELECT * FROM logo LIMIT 3";
	public const SQL_AJOUTER_LOGO = "INSERT INTO logo (nom, auteur, description, prix, publication, image) VALUE (:nom, :auteur, :description, :prix, CURDATE(), 'image')";
	public const SQL_MODIFIER_LOGO = "UPDATE logo SET nom = :nom, auteur = :auteur, description = :description, prix = :prix where id = :id";
	public const SQL_LIRE_LOGO = "SELECT nom, auteur, description, prix FROM logo WHERE id = :id";
	public const SQL_SUPPRIMER_LOGO = "DELETE from logo where id = :id";

}
?>