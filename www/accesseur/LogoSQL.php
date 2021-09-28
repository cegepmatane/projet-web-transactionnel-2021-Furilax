<?php
interface LogoSQL
{
	
	public const SQL_LISTE_LOGOS = "SELECT * FROM logo";
	public const SQL_DETAIL_LOGO = "SELECT * FROM logo WHERE id = :id"; 
	public const SQL_NOUVEAUTES_LOGOS = "SELECT * FROM logo LIMIT 3";
	public const SQL_AJOUTER_LOGO = "INSERT INTO logos (nom, auteur, description, prix) VALUE (:nom, :auteur, :description, :prix)";
	public const SQL_MODIFIER_LOGO = "UPDATE logos SET nom=:nom, auteur=:auteur, description=:description, prix=:prix where id=:id";
	public const SQL_LIRE_LOGO = "SELECT nom, auteur, description, prix FROM logos WHERE id=:id";
}
?>