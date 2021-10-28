<?php

require "MembreDAO.php";

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

    MembreDAO::inscrireUnMembre($_POST);
}

if(!$estConnecter && isset($_POST["action-connexion"])){

  $membre = MembreDAO::validerConnexion($_POST);
  $estConnecter = isset($membre["id"]);
  if($estConnecter){
        $_SESSION["estConnecter"] = true;
        $_SESSION["identifiant"] = $membre["identifiant"];
  }
  else{
        $membre = MembreDAO::lireMembreParIdentifiant($_SESSION["identifiant"]);
    }
}

  if(!$estConnecter){ 
        header("Location: compte.php");    
    }else{ 
        header("Location: ../../index.php");
    } 
     
?>