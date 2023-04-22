<?php

namespace App;

require_once "controllers/DAO.php";

class AccueilController{
    public function pageAccueil(){
        $dao = new DAO();
        $sql = "SELECT id_film, affiche FROM  film";
        $requete = $dao->executerRequete($sql);
      require 'views/vues/Accueil.php';
    }
}