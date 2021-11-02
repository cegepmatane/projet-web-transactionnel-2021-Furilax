<?php

require_once "chemins.php";
require CHEMIN_ACCESSEUR . "MembreDAO.php";

$estConnecter = false;
$confirmationMdp = false;

if(isset($_SESSION["identifiant"]))
{
    $estConnecter = true;
}

$membre = [];



if(!$estConnecter && isset($_POST["action-inscription"])){
    if($_POST["motDePasse"] !== $_POST["motDePasseConfirmation"]){
        include "compte.php";
        echo "Les deux mots de passe ne sont pas semblables";
    }

    $reussite = MembreDAO::inscrireUnMembre($_POST);

    if($reussite){
        echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='compte.php'>connecter</a></p>
       </div>";
    }
}

if(!$estConnecter && isset($_POST["action-connexion"])){

  $membre = MembreDAO::validerConnexion($_POST);
  $estConnecter = isset($membre["id"]);
  if($estConnecter){
        $_SESSION["estConnecter"] = true;
        $_SESSION["identifiant"] = $membre["identifiant"];
  }
}

  if(!$estConnecter){ 
        header("Location: compte.php");    
    }else{ 
        $membre = MembreDAO::lireMembreParIdentifiant($_SESSION["identifiant"]);
        $id = $membre["id"];
        header("Location: edition-profil.php?membre='.$id.'");
    } 
     
?>