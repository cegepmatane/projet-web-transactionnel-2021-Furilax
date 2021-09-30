<?php
require_once "configuration.php";
require_once "accesseur/LogoDAO.php";
$id = filter_input(INPUT_GET, 'id' , FILTER_VALIDATE_INT);

$logo = LogoDAO::lireLogo($id);
?>

<!doctype html>
<html lang="fr">
<link rel="stylesheet" href="produits.css">
<link rel="stylesheet" href="../footer/footer.css">
<link rel="stylesheet" href="ajouter&modifier.css">

<head>
    <meta charset="utf-8">
    <title>PickYourLogo - Ajouter ou Modifier</title>
</head>

<body>
    <header>
    <?php include "../header.php"?>;

    </header>
    <h1>Modifier</h1>
    <nav></nav>
    <!------------------------------------------------------------------------------------------------------------------------------>
    <form class="formulaire" 
        action="traitement-modifier.php"
        method="POST">
        
        <input type="hidden" name="id" value="<?= $logo["id"]?>">
        <div class="form">
            <label for="nom" value>Nom du logo</label><br>
            <input type="text" id="nom" name="nom"
                value="<?= $logo["nom"]?>"><br>
        </div>
        <div class="form">
            <label for="auteur">Nom de l'auteur</label><br>
            <input type="text" id="auteur" name="auteur"
            value="<?= $logo["auteur"]?>"><br>
        </div>
        <div class="form">
            <label for="description">Description du produit</label><br>
            <textarea name="description" id="description" 
            value="<?= $logo["description"]?>" cols="60" rows="5"></textarea><br>
        </div>
        <div class="form">
            <label for="image">Image</label><br>
            <input type="file" id="image" name="image"
            value="<?= $logo["image"]?>"><br>
        </div>
        <div class="form">
            <label for="prix">Prix</label><br>
            <input type="text" id="prix" name="prix"
            value="<?= $logo["prix"]?>"><br>
        </div>
        <div class="div-boutton-envoyer">
        <input class="boutton-envoyer" type="submit" value="Submit">
    </div>
    </form>
    <!------------------------------------------------------------------------------------------------------------------------------>

</body>
<?php include "footer.php"; ?>
</html>