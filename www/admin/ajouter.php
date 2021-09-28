<!doctype html>
<html lang="fr">
<link rel="stylesheet" href="style/produits.css">
<link rel="stylesheet" href="style/footer.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../../../www/index.css">
<link rel="stylesheet" href="style/ajouter&modifier.css">

<head>
    <meta charset="utf-8">
    <title>PickYourLogo - Ajouter ou Modifier</title>
</head>

<body>

    <header>
        <div class="parallax"></div>


        <ul id="nav">
            <li><a class="active" href="#accueil">Accueil</a></li>
            <li><a href="#mission">Notre Mission</a></li>
            <li><a href="#produits">Nos Produits</a></li>
            <li><a href="#connexion">Connexion</a></li>
        </ul>

        <script src="script/menu-sticky.js"></script>

    </header>
    <h1>Ajouter</h1>
    <nav></nav>
    <!------------------------------------------------------------------------------------------------------------------------------>
    <form class="formulaire"
     action="traitement-ajouter.php"
     method="POST">
        <div class="form">
            <label for="nom" value>Nom du logo</label><br>
            <input type="text" id="nom" name="nom"require><br>
        </div>
        <div class="form">
            <label for="auteur">Nom de l'auteur</label><br>
            <input type="text" id="auteur" name="auteur" require><br>
        </div>
        <div class="form">
            <label for="description">Description du produit</label><br>
            <textarea name="description" id="description" cols="60" rows="5"require></textarea><br>
        </div>
        <div class="form">
            <label for="image">Image</label><br>
            <input type="file" id="image" name="image"require><br>
        </div>
        <div class="form">
            <label for="prix">Prix</label><br>
            <input type="text" id="prix" name="prix"require><br>
        </div>
        <div class="div-boutton-envoyer">
        <input class="boutton-envoyer" type="submit" value="Submit">
    </div>
    </form>
    <!------------------------------------------------------------------------------------------------------------------------------>

</body>
<?php include "footer.php"; ?>
</html>