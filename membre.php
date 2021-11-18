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
    if(isset($_POST["motDePasse"]) && empty($_POST["motDePasse"]) || $_POST["motDePasse"] !== $_POST["motDePasseConfirmation"] ){
        include "compte.php";
        echo "Le mot de passe est vide ou les deux mots de passe ne sont pas semblables";
    }
    else if(isset($_POST["identifiant"]) && empty($_POST["identifiant"]) || isset($_POST["courriel"]) && empty($_POST["courriel"]))
    {
        include "compte.php";
        echo "Identifiant ou courriel vide";
    }
    /*else if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $_POST["courriel"]))
    {
        // Return Error - Invalid Email
        include "compte.php";
        echo "Le courriel est invalide";
    }*/
    else{
        $reussite = MembreDAO::inscrireUnMembre($_POST);
        ini_set("SMTP", "pickyourlogo.org");//confirm smtp
        $to = $_POST["courriel"];
        $subject = "Confirmation d'inscription";
        $message = "Vous avez bien été inscrit sur Pick your logo";
        $from = "pickyourlogo@hotmail.com";
        $headers = "From: $from";
        $success = mail($to,$subject,$message);
        if (!$success) {
            $errorMessage = error_get_last()['message'];
        }
    }

        
}

if(!$estConnecter && isset($_POST["action-connexion"])){

    if(isset($_POST["motDePasse"]) && empty($_POST["motDePasse"])){
        include "compte.php";
        echo "Le mot de passe est vide ou les deux mots de passe ne sont pas semblables";
    }
    else if(isset($_POST["identifiant"]) && empty($_POST["identifiant"]))
    {
        include "compte.php";
        echo "Identifiant ou courriel vide";
    }

  $membre = MembreDAO::validerConnexion($_POST);
  
  $estConnecter = isset($membre->id);
  if($estConnecter){
        $_SESSION["estConnecter"] = true;
        $_SESSION["identifiant"] = $membre->identifiant;
        $_SESSION["courriel"] = $membre->courriel;
  }
}

  if(!$estConnecter){ 
        header("Location: compte.php");    
    }else{ 
            header("Location: edition-profil.php");
    } 
     
?>