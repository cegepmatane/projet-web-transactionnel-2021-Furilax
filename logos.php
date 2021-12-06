<?php
session_start();
require_once "chemins.php";
require CHEMIN_ACCESSEUR . "LogoDAO.php";

require "avisClient.php";
$uid = session_id();

$listeLogos = LogoDAO::listerLogos();
//print_r($listeProduits);
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
    <script src="script/evaluationEtoile.js"></script>
	<link rel="stylesheet" href="style/logos.css?=23">
</head>

<?php include "header.php"?>

	<section id="conteneurListe">

	<h1>Nos Produits</h1>

	<?php
	if (isset($_POST["pid"]) && isset($_POST["stars"])) {
		if ($_STARS->save($_POST["pid"], $uid, $_POST["stars"])) {
		  echo "<div class='note' style='display: none;'>Évaluation remise</div>";
		} else { echo "<div class='note'>$_STARS->error</div>"; }
	  }
	  
	  $average = $_STARS->avg(); // La moyenne des avis
	  $ratings = $_STARS->get($uid); // Les avis pour l'utilisateur

				foreach($listeLogos as $pid=>$logo){       
	?>
				<div class="logo">
					<a href="logo.php?logo=<?=$logo->id?>">
						<img class="imageLogo" src="illustration/<?=formater($logo->image)?>" alt="">
					</a>
					<h2><?=formater($logo->nom)?></h2>
					<p class = "descriptionLogo"><?=formater($logo->description)?></p>
  					<div class="pReview">Avis Clients</div>
					<div class="pStar" data-pid="<?=$pid?>"><?php
						$rate = isset($ratings[$pid]) ? $ratings[$pid] : 0 ;
						for ($i=1; $i<=5; $i++) {
						$css = $i<=$rate ? "star" : "star blank" ;
						echo "<div class='$css' data-i='$i'></div>";
						}
					?></div>
					<div class="pStat">
						<?=$average[$pid]["avg"]?> sur 5 étoiles.
					</div>
					<div class="pStat">
						<?=$average[$pid]["num"]?> avis clients.
					</div>
				</div>
		</section>
	<?php
		}
	?>

	<form id="ninForm" method="post" target="_self">
		<input id="ninPdt" type="hidden" name="pid"/>
		<input id="ninStar" type="hidden" name="stars"/>
	</form>
	
</body>

<?php include "footer.php"?>
