
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="style/compte.css">
</head>
    
    <?php include "header.php"?>
    <div class="conteneur-connexion">
        <div class="connexion-html">
            <input id="tab-1" type="radio" name="tab" class="connexion" checked><label for="tab-1" class="tab"><?php echo _("Connexion")?></label>
            <input id="tab-2" type="radio" name="tab" class="inscription"><label for="tab-2" class="tab"><?php echo _("Inscription")?></label>
            <div class="connexion-form">
                <form action="membre.php" method="post">
                    <div class="connexion-htm">
                        <div class="groupe">
                            <label for="identifiant" class="label"><?php echo _("Identifiant")?></label>
                            <input id="identifiant" name="identifiant" type="text" class="input">
                        </div>
                        <div class="groupe">
                            <label for="motDePasse" class="label"><?php echo _("Mot de passe")?></label>
                            <input id="motDePasse" name="motDePasse" type="password" class="input" data-type="password">
                        </div>
                        <div class="groupe">
                            <input type="submit" name="action-connexion" class="button" value="Connexion">
                        </div>
                        <div class="hr"></div>
                        <div class="mdpOublier">
                            <a href="#oublier"><?php echo _("Mot de passe oublier?")?></a>
                        </div>
                    </div>
                </form>
                <form action="membre.php" method="post">
                    <div class="inscription-htm">
                        <div class="groupe">
                            <label for="identifiantInscription" class="label"><?php echo _("Identifiant")?></label>
                            <input id="identifiantInscription" name="identifiant" type="text" class="input">
                        </div>
                        <div class="groupe">
                            <label for="mdpInscription" class="label"><?php echo _("Mot de passe")?></label>
                            <input id="mdpInscription" name="motDePasse" type="password" class="input" data-type="password">
                        </div>
                        <div class="groupe">
                            <label for="mdpConfirmation" class="label"><?php echo _("Confirmer Mot de passe")?></label>
                            <input id="mdpConfirmation" name="motDePasseConfirmation" type="password" class="input" data-type="password">
                        </div>
                        <div class="groupe">
                            <label for="courriel" class="label"><?php echo _("Adresse courriel")?></label>
                            <input id="courriel" name="courriel" type="text" class="input">
                        </div>
                        <div class="groupe">
                            <input type="submit" name="action-inscription" class="button" value="Inscription">
                        </div>
                        <div class="hr"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>


<?php include "footer.php"?>