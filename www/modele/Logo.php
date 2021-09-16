<?php

class Logo
{
	public static $filtres = 
		array(
			'id' => FILTER_VALIDATE_INT,
			'nom' => FILTER_SANITIZE_ENCODED,
			'auteur' => FILTER_SANITIZE_ENCODED,
			'description' => FILTER_SANITIZE_ENCODED,
			'publication' => FILTER_SANITIZE_ENCODED,
			'prix' => FILTER_VALIDATE_FLOAT,
			'image' => FILTER_SANITIZE_ENCODED
		);
		
	protected $nom;
	protected $auteur;
	protected $description;
	protected $prix;
	protected $image;
	
	public function __construct($tableau)
	{
		$tableau = filter_var_array($tableau, Logo::$filtres);

		$this->id = $tableau['id'];
		$this->nom = $tableau['nom'];
		$this->auteur = $tableau['auteur'];
		$this->description = $tableau['description'];
		$this->publication = $tableau['publication'];
		$this->prix = $tableau['prix'];
		$this->image = $tableau['image'];
	}
	
	public function __set($propriete, $valeur)
	{
		switch($propriete)
		{
			case 'id':
				$this->id = $valeur;
			break;
			case 'nom':
				$this->nom = $valeur;
			break;
			case 'auteur':
				$this->auteur = $valeur;
			break;
			case 'description':
				$this->description = $valeur;
			break;
			case 'publication':
				$this->publication = $valeur;
			break;
			case 'prix':
				$this->prix = $valeur;
			break;
			case 'image':
				$this->image = $valeur;
			break;
		}
	}

	public function __get($propriete)
	{
		//$variable = '$this->'.$propriete;
		//return $$variable;
		$self = get_object_vars($this); // externaliser pour optimiser
		//print_r($self);
		return $self[$propriete];
	}	
}
//$contrat = new Contrat();
//$contrat->titre = "coucou";
//echo $contrat->titre;
?>