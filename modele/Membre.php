<?php

class Membre
{
	public static $filtres = 
		array(
			'id' => FILTER_VALIDATE_INT,
			'identifiant' => FILTER_SANITIZE_ENCODED,
			'motDePasse' => FILTER_SANITIZE_ENCODED,
            'courriel' => FILTER_SANITIZE_ENCODED,
		);
		
	protected $identifiant;
	protected $motDePasse;
	protected $courriel;
	
	public function __construct($tableau)
	{
		$tableau = filter_var_array($tableau, Membre::$filtres);

		$this->id = $tableau['id'];
		$this->identifiant = $tableau['identifiant'];
		$this->motDePasse = $tableau['motDePasse'];
		$this->courriel = $tableau['courriel'];
	}
	
	public function __set($propriete, $valeur)
	{
		switch($propriete)
		{
			case 'id':
				$this->id = $valeur;
			break;
			case 'identifiant':
				$this->identifiant = $valeur;
			break;
			case 'motDePasse':
				$this->motDePasse = $valeur;
			break;
			case 'courriel':
				$this->courriel = $valeur;
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
?>