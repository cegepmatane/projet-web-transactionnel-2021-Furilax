<?php
interface AvisSQL {
    public const SQL_LISTE_AVIS = "SELECT * FROM evaluation ORDER BY id DESC";
    public const SQL_LISTE_UTILISATEUR_AVIS = "SELECT * FROM evaluation WHERE id = :idUtilisateur AND idLogo = :idLogo";
    public const SQL_AJOUT_AVIS = "INSERT INTO evaluation(idUtilisateur, idLogo, evaluation) VALUES (:idUtilisateur, :idLogo, :evaluation, NOW())";
    public const SQL_MOYENNE_AVIS = "SELECT evaluation FROM evaluation WHERE idUtilisateur = :idUtilisateur AND idLogo = :idLogo";
}
?>