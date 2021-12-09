<?php

require_once "../chemins.php";
require CHEMIN_ACCESSEUR . "LogoDAO.php";
require_once "configuration.php";


//https://www.w3schools.com/php/php_file_upload.asp
$dossier_cible = "../illustration/";
$ficher_cible = $dossier_cible . basename($_FILES["fichierAUpload"]["name"]);
$envoieOk = 1;
$typeImage = strtolower(pathinfo($ficher_cible, PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fichierAUpload"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $envoieOk = 1;
    } else {
      echo "File is not an image.";
      $envoieOk = 0;
    }
  }
  if (file_exists($ficher_cible)) {
    echo "Sorry, file already exists.";
    $envoieOk = 0;
  }
  if($typeImage != "jpg" && $typeImage != "png" && $typeImage != "jpeg"
   && $typeImage != "gif" ) {
     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. -----";
     $envoieOk = 0;
  }
  if ($_FILES["fichierAUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  if ($envoieOk == 0) {
    echo "Sorry, your file was not uploaded.";
  } 
  else {
    if (move_uploaded_file($_FILES["fichierAUpload"]["tmp_name"], $ficher_cible)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fichierAUpload"]["name"])). " has been uploaded.";
      $nom = $_POST['nom'];
      $auteur = $_POST['auteur'];
      $description = $_POST['description'];
      $prix = $_POST["prix"];
      $image = $_FILES["fichierAUpload"]["name"];
     
      print_r($_POST);
     
     
      $filtresLogo = [];
     
      $filtresLogo['nom'] = FILTER_SANITIZE_ENCODED;
      $filtresLogo['auteur'] = FILTER_SANITIZE_ENCODED;
      $filtresLogo['description'] = FILTER_SANITIZE_ENCODED;
      $filtresLogo['prix'] = FILTER_SANITIZE_ENCODED;
     
      $logo = filter_input_array(INPUT_POST, $filtresLogo);
     
      $logo['image'] = $image;
     
      $reussiteAjout = LogoDAO::ajouterLogo($logo);
     
      if ($reussiteAjout){
          ?>
          <a href='admin.php'>ca marche</a>
          <?php
      }
      else{
          echo "ça marche pas".$reussiteAjout;
     }
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

?>