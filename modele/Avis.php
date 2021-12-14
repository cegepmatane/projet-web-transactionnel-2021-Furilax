<?php

    class Avis {
        public static $filtres = 
            array(
                'id' => FILTER_VALIDATE_INT,
                'idLogo' => FILTER_VALIDATE_INT,
                'idUtilisateur' => FILTER_VALIDATE_INT,
                'evaluation' => FILTER_VALIDATE_INT
            );
		
        protected $idLogo;
        protected $idUtilisateur;
        protected $evaluation;

        public function __construct($tableau) {
            $tableau = filter_var_array($tableau, Avis::$filtres);

            $this->id = $tableau['id'];
            $this->idLogo = $tableau['idLogo'];
            $this->idUtilisateur = $tableau['idUtilisateur'];
            $this->evaluation = $tableau['evaluation'];
        }

        public function __set($propriete, $valeur) {
            switch($propriete)
            {
                case 'id':
                    $this->id = $valeur;
                break;
                case 'idLogo':
                    $this->idLogo = $valeur;
                break;
                case 'idUtilisateur':
                    $this->idUtilisateur = $valeur;
                break;
                case 'evaluation':
                    $this->evaluation = $valeur;
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