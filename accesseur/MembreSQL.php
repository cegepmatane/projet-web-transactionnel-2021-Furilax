
<?php
interface MembreSQL
{
	public const SQL_DETAIL_MEMBRE = "SELECT * FROM membres WHERE id = :id"; 
	public const SQL_LIRE_MEMBRE_PAR_IDENTIFIANT = "SELECT * FROM membres WHERE identifiant = :identifiant";
	public const SQL_VALIDER_CONNEXION = "SELECT * FROM membres WHERE identifiant = :identifiant AND motDePasse = :motDePasse";
	public const SQL_MODIFIER_MEMBRE = "UPDATE membres SET identifiant = :identifiant where id = :id";
	public const SQL_INSCRIRE_MEMBRE = "INSERT INTO membres (identifiant, motDePasse, courriel) VALUE (:identifiant, :motDePasse, :courriel)";
}
?>