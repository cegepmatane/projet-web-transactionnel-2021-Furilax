<?php

class Achat
{
    public static $filtres =
    array(
        'id' => FILTER_VALIDATE_INT,
		'nom' => FILTER_SANITIZE_ENCODED,
		'auteur' => FILTER_SANITIZE_ENCODED,
		'prix' => FILTER_VALIDATE_FLOAT,
		'image' => FILTER_SANITIZE_ENCODED,
        'idAcheteur' => FILTER_VALIDATE_INT,
        'dateAchat' => FILTER_SANITIZE_ENCODED
    );

    protected $nom;
	protected $auteur;
	protected $prix;
	protected $image;	
    protected $idAcheteur;
	protected $dateAchat;

    public function __construct($tableau)
	{
		$tableau = filter_var_array($tableau, Achat::$filtres);

		$this->id = $tableau['id'];
		$this->nom = $tableau['nom'];
		$this->auteur = $tableau['auteur'];
		$this->prix = $tableau['prix'];
		$this->image = $tableau['image'];
        $this->idAcheteur = $tableau['idAcheteur'];
		$this->dateAchat = $tableau['dateAchat'];
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
			
			case 'prix':
				$this->prix = $valeur;
			break;
			case 'image':
				$this->image = $valeur;
			break;
            case 'idAcheteur':
				$this->idAcheteur = $valeur;
			break;
			case 'dateAchat':
				$this->dateAchat = $valeur;
			break;
		}
	}

	public function __get($propriete)
	{
		$self = get_object_vars($this);
		return $self[$propriete];
	}	
}

?>