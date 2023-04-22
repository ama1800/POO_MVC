<?php

namespace App;

use PDO;

class DAO{// c'est pattern qui gére l'acces et l'exploitation de la base de donnees.
    private $bdd;//variable qui fait reference a la base de donnees
    public function __construct(){// methode qui permet l'initialisation de l'objet PDO
        $this->bdd = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', ''); //objet qui permet d'acceder a la bdd 
    }
    function getBDD(){ //accesseur qui retourne l'instanciation de bdd 
        return $this->bdd;
    }
    // methode qui execute la requete
    public function executerRequete($sql, $params = NULL){ 
        if ($params == NULL){ // si y a pas de parametres 
            $resultat = $this->bdd->query($sql); //   appel a bdd
        }else{// si y a des parametres
            $resultat = $this->bdd->prepare($sql); //prepare requet
            $resultat->execute($params);
        }
        return $resultat;
    }
}