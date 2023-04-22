<?php
require_once 'Models/DAO.php';
class Film extends DAO{
    // Renvoie la liste des auteurs
  public function getInfo($films) {
    $sql = 'select id_film as id, titre as titre,'
      . ' annee as anneeSortie, note as note, duree as duree from film';
    $listFilms = $this->executerRequete($sql, array($films));
    return $listFilms;

  }
}