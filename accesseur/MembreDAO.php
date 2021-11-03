<meta charset="utf-8">
<?php
require "MembreSQL.php";
require CHEMIN_MODELE . "Membre.php";

class Accesseur{
    public static $basededonnees = null;

		public static function initialiser()
		{
			$usager = 'root';
			$motdepasse = '6785';
			$hote = 'localhost';
			$base = 'logos';
            $charset = 'utf8mb4';
			$dsn = 'mysql:dbname='.$base.';host='.$hote.';charset='.$charset;
			MembreDAO::$basededonnees = new PDO($dsn, $usager, $motdepasse,  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"));
			MembreDAO::$basededonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
}

class MembreDAO extends Accesseur implements MembreSQL{ 
    
    /*public static function encrypter($motDePasse)
    {
        $plaintext = $motDePasse;
        $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
        $ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );
        
        return $ciphertext;
    }

    public static function decrypter($ciphertext)
    {
        $c = base64_decode($ciphertext);
        $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len=32);
        $ciphertext_raw = substr($c, $ivlen+$sha2len);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
        $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
        
        if (hash_equals($hmac, $calcmac)){
            echo $original_plaintext."\n";
        }

        return $original_plaintext;
    }*/

    public static function validerConnexion($membre){

        MembreDAO::initialiser();

        $requeteValiderConnexion = MembreDAO::$basededonnees->prepare(MembreDAO::SQL_VALIDER_CONNEXION);
        $motDePasse = hash('sha256',$membre["motDePasse"]); 
        $requeteValiderConnexion->bindParam(':identifiant', $membre["identifiant"], PDO::PARAM_STR);
        $requeteValiderConnexion->bindParam(':motDePasse', $motDePasse, PDO::PARAM_STR);
        $requeteValiderConnexion->execute();
        $membre = $requeteValiderConnexion->fetch();

        return new Membre($membre);
        //Tests avec password_verify
        /*$membreRecuperer = MembreDAO::lireMembreParIdentifiant($membre["identifiant"]);
        $mdp = $membre["motDePasse"];
        $hash = $membreRecuperer -> motDePasse;
        //$hash = utf8_decode($hash);
        $hash2 = '$2y$10$ylEPeLr90eH1F1CfXO/WG.YDTSBTTos5h8YyKr0Vba0o5bBEJ.o.6';
        substr($hash, 0, 60);

        if($hash !== $hash2){
            header("Location: ../index.php");
            die;
        }

        if(password_verify($mdp, $hash))
        {
            
            $requeteValiderConnexion = MembreDAO::$basededonnees->prepare(MembreDAO::SQL_VALIDER_CONNEXION);

            $requeteValiderConnexion->bindParam(':identifiant', $membreRecuperer -> identifiant, PDO::PARAM_STR);
            $requeteValiderConnexion->bindParam(':motDePasse', $hash, PDO::PARAM_STR);
            $requeteValiderConnexion->execute();
            $membreVerifier = $requeteValiderConnexion->fetch();
         
            return $membreRecuperer;
        }
        else
        {
            return null;
        }*/
    }
    
    public static function inscrireUnMembre($membre){

        MembreDAO::initialiser();

        /*$motDePasse = mysql_real_escape_string(htmlspecialchars($membre["motDePasse"]));
        $identifiant = mysql_real_escape_string(htmlspecialchars($membre["identifiant"]));
        $courriel= mysql_real_escape_string(htmlspecialchars($membre["courriel"]));*/
        
        $motDePasse = $membre["motDePasse"];
        $identifiant = $membre["identifiant"];
        $courriel = $membre["courriel"];
        //Test avec password_hash
        //$motDePasse = password_hash($motDePasse, PASSWORD_DEFAULT);
        //$motDePasse = MembreDAO::encrypter($motDePasse);
        
        $motDePasse = hash('sha256',$motDePasse);
        $requeteInscription = MembreDAO::$basededonnees->prepare(MembreDAO::SQL_INSCRIRE_MEMBRE);
        $requeteInscription->bindParam(':identifiant', $identifiant, PDO::PARAM_STR);
        $requeteInscription->bindParam(':motDePasse', $motDePasse, PDO::PARAM_STR);
        $requeteInscription->bindParam(':courriel', $courriel, PDO::PARAM_STR);

        $reussiteInscription = $requeteInscription -> execute();
        return $reussiteInscription;
    }

    public static function lireMembreParIdentifiant($identifiant){

        MembreDAO::initialiser();
        
        $requeteLireMembreParIdentifiant = MembreDAO::$basededonnees->prepare(MembreDAO::SQL_LIRE_MEMBRE_PAR_IDENTIFIANT);
        $requeteLireMembreParIdentifiant->bindParam(':identifiant', $identifiant, PDO::PARAM_STR);
        $requeteLireMembreParIdentifiant->execute();
        $membre = $requeteLireMembreParIdentifiant->fetch();

        return new Membre($membre);
    }

    public static function detaillerMembre($id)
    {
        MembreDAO::initialiser();

        $demandeMembre = MembreDAO::$basededonnees->prepare(MembreDAO::SQL_DETAIL_MEMBRE);
        $demandeMembre->bindParam(':id', $id, PDO::PARAM_INT);
        $demandeMembre->execute();
        $membre = $demandeMembre->fetch(PDO::FETCH_ASSOC);

        
        return new Membre($membre);
    }
    public static function modifierMembre($membre)
    {
        MembreDAO::initialiser();

        $requeteMembre = MembreDAO::$basededonnees->prepare(MembreDAO::SQL_MODIFIER_MEMBRE);

        $requeteMembre->bindParam(':identifiant', $membre->identifiant, PDO::PARAM_STR);
        $requeteMembre->bindParam(':courriel', $membre->courriel, PDO::PARAM_STR);
        $requeteMembre->bindParam(':motDePasse', $membre->motDePasse, PDO::PARAM_STR);
        $requeteMembre->bindParam(':id', $membre->id, PDO::PARAM_INT);
        
        $reussiteModification = $requeteMembre -> execute();
        return $reussiteModification;
    }

    public function formater($texte)
    {
        return $texte;
    }
}