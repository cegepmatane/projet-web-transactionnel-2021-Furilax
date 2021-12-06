<?php
require_once "chemins.php";
require CHEMIN_ACCESSEUR . "LogoDAO.php";
$listeLogos = LogoDAO::listerLogos();
//print_r($listeProduits);
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style/logos.css?=21">

	<style>
		ul {
			margin: 0px;
			padding: 10px 0px 0px 0px;
		}

		li.star {
			list-style: none;
			display: inline-block;
			margin-right: 5px;
			cursor: pointer;
			color: #9E9E9E;
		}

		li.star.selected {
			color: #ff6e00;
		}

		.row-title {
			font-size: 20px;
			color: #00BCD4;
		}

		.review-note {
			font-size: 12px;
			color: #999;
			font-style: italic;
		}
		.row-item {
			margin-bottom: 20px;
			border-bottom: #F0F0F0 1px solid;
		}
		p.text-address {
			font-size: 12px;
		}
	</style>
</head>

<?php include "header.php"?>

<body onload="montrerDonneesLogo('obtenirDonneesLogo.php')">

	<section id="conteneurListe">

	<h1>Nos Produits</h1>

	<?php
				foreach($listeLogos as $logo){       
	?>
				<div class="logo">
					<a href="logo.php?logo=<?=$logo->id?>">
						<img class="imageLogo" src="illustration/<?=formater($logo->image)?>" alt="">
					</a>
					<h2><?=formater($logo->nom)?></h2>
					<p class = "descriptionLogo"><?=formater($logo->description)?></p>
					<span id="listeLogo"></span>
				</div>
		</section>
	<?php
		}
	?>

	<script type="text/javascript">
		function montrerDonneesLogo(url) {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200)
				{
					document.getElementById("listeLogo").innerHTML = this.responseText;
				}
			};
			xhttp.open("GET", url, true);
			xhttp.send();
    	} 

		function ajouterEvaluation(idLogo, evaluation) {
			var xhttp = new XMLHttpRequest();

			xhttp.onreadystatechange = function() {
				if(this.readyState == 4 && this.status == 200) {
					montrerDonneesLogo('obtenirDonneesLogo.php');

					if(this.responseText != "success") {
						alert(this.responseText);
					}
				}
			};

			xhttp.open("POST", "ajoutEvaluation.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			var parametres = "index=" + evaluation + "&idLogo=" + idLogo;
			xhttp.send(parametres);
		}

		function evalUtilisateur($idUtilisateur, $idLogo, $conn)
		{
			$average = 0;
			$avgQuery = "SELECT evaluation FROM evaluation WHERE idUtilisateur = '" . $idUtilisateur . "' and idLogo = '" . $idLogo . "'";
			$total_row = 0;
			
			if ($resultat = mysqli_query($conn, $avgQuery)) {
				$total_row = mysqli_num_rows($resultat);
			} 

			if ($total_row > 0) {
				foreach ($resultat as $row) {
					$average = round($row["evaluation"]);
				} 
			} 
			return $average;
		}
    
		function evalTotal($idLogo, $conn)
		{
			$totalVotesQuery = "SELECT * FROM evaluation WHERE idLogo = '" . $idLogo . "'";
			
			if ($resultat = mysqli_query($conn, $totalVotesQuery)) {
				$rowCount = mysqli_num_rows($resultat);
				mysqli_free_result($resultat);
			}
			
			return $rowCount;
		}
	</script>

</body>

<?php include "footer.php"?>