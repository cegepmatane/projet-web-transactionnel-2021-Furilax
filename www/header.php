<html>
<header>
		<div class="parallax">
			<center><b>Pick Your Logo</b></center>
		</div>
		
			
		<ul id="nav">
			<li><a class="active" href="index.html">Accueil</a></li>
			<li><a href="#mission">Notre Mission</a></li>
			<li><a href="#produits">Nos Produits</a></li>
			<li><a href="#connexion">Connexion</a></li>
		</ul>

		<script src="/www/script/menu-sticky.js"></script>
		  
        <?php
            if($_SESSION["authentifie"]){
                echo $_SESSION["pseudonyme"];
            }
        ?>
</header>