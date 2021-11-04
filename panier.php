<?php
session_start();
$id = filter_var($_GET['logo'],FILTER_VALIDATE_INT); 
require_once "chemins.php";
require CHEMIN_ACCESSEUR . "LogoDAO.php";

$logo = LogoDAO::detaillerLogo($id);

if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	//code for adding product in cart
	case "add":
		//$pid=$_GET["id"];
		$result=mysqli_query($con,"SELECT * FROM logo WHERE id= '$pid'");
		while($productByName=mysqli_fetch_array($result)){
		$itemArray = array($productByName["nom"]=>array('nom'=>$productByName -> nom, 'prix'=>$productByName -> prix, 'image'=>$productByName -> image));
		if(!empty($_SESSION["cart_item"])) {
			if(in_array($productByName["nom"],array_keys($_SESSION["cart_item"]))) {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($productByName["nom"] == $k) {
							if(empty($_SESSION["cart_item"][$k])) {
								$_SESSION["cart_item"][$k] = 0;
							}
							$_SESSION["cart_item"][$k];
						}
				}
			} else {
				$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
			}
		}  else {
			$_SESSION["cart_item"] = $itemArray;
		}
	}
	break;

	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["nom"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	// code for if cart is empty
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
 }
}
?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>PickYourLogo - Panier</title>
	<link rel="stylesheet" href="style/panier.css?=20">
</head>

<?php include "header.php"?>

   <!--<div class="conteneurPanier">
      <h1 class="font-effect-neon">Votre Panier !</h1>
      
    </div>-->

	<div id="shopping-cart">
		<div class="txt-heading">Panier d'achat</div>

		<a id="btnEmpty" href="panier.php?action=empty">Vider Panier</a>
		<?php
		if(isset($_SESSION["cart_item"])){
			$total_price = 0;
		?>	
		<table class="tbl-cart" cellpadding="10" cellspacing="1">
		<tbody>
		<tr>
		<th style="text-align:left;">Nom</th>
		<th style="text-align:right;" width="10%">Prix unitaire</th>
		<th style="text-align:right;" width="10%">Prix</th>
		<th style="text-align:center;" width="5%">Retirer</th>
		</tr>	
		<?php		
			foreach ($_SESSION["cart_item"] as $item){
				$item_price = $item["prix"];
				?>
						<tr>
						<td><img src="<?=formater($logo->image)?>" class="cart-item-image" /><?=formater($logo->nom)?></td>
						<td><?=formater($logo->nom)?></td>
						<td  style="text-align:right;"><?=formater($logo->prix)?></td>
						<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
						<td style="text-align:center;"><a href="panier.php?action=remove&id=<?=formater($logo->id)?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Enlever le produit" /></a></td>
						</tr>
						<?php
						$total_price += ($item["prix"]);
				}
				?>

		<tr>
		<td colspan="2" align="right">Total:</td>
		<td align="right"><?php echo $total_quantity; ?></td>
		<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
		<td></td>
		</tr>
		</tbody>
		</table>		
		<?php
		} else {
		?>
		<div class="no-records">Votre panier est vide</div>
		<?php 
		}
		?>
	</div>
		

		<!--<div class="entete">
			<h3 class="titre">Produits</h3>
			<h5 class="action">Supprimer tout</h5>
		</div>
        <div class="itemPanier">
			<div class="imageItem">
				<img src="illustration/baskangel.jpg" style= "height:120px;" />
			</div>
			<div class="item">
				<h1 class="titre">Maquette Logo</h1>
				<h3 class="description">12cm x 3.5cm x 8cm</h3>
			</div>
			<div class="compteur">
				<div class="btn">+</div>
				<div class="compte">2</div>
				<div class="btn">-</div>
			</div>
			<div class="prix">
				<div class="cout">$2.99</div>
				<div class="supprimer"><u>Supprimer</u></div>
			</div>
		</div>
		
        <div class="itemPanier">
			<div class="imageItem">
				<img src="illustration/lion.jpg" style= "height:120px;" />
			</div>
			<div class="item">
				<h1 class="titre">Maquette Logo 2</h1>
				<h3 class="description">12cm x 3.5cm x 8cm</h3>
			</div>
			<div class="compteur">
				<div class="btn">+</div>
				<div class="compte">1</div>
				<div class="btn">-</div>
			</div>
			<div class="prix">
				<div class="cout">$2.99</div>
				<div class="supprimer"><u>Supprimer</u></div>
			</div>
		</div>

		<hr> 
		<div class="validation">
			<div class="total">
				<div>
					<div class="sousTotal">Total</div>
					<div class="items">2 items</div>
				</div>
				<div class="prixTotal">$6.18</div>
			</div>
			<button class="bouton">Paiement</button>
		</div>

    </div>-->
	
</body>

</html>

<?php include "footer.php"?>