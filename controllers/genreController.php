<?php

namespace App;

require_once 'controllers/DAO.php';
class GenreController{
    public function findAll(){
        $dao= new DAO();
    // Renvoie la liste des genres
    $sql = "SELECT id_genre, nom_genre FROM  genre";
    $requete = $dao->executerRequete($sql);
    require "views/vues/genres/vueGenre.php";
    }
    
    public function ajoutergenreFormulaire(){
      $dao= new DAO();
      $sql1 = "SELECT distinct id_genre, nom_genre FROM genre";
      $listgenres= $dao->executerRequete($sql1);
      require "views/vues/genres/ajoutergenreFormulaire.php";
      }
      
      public function ajouterGenre($array){
    
        $dao= new DAO(); 
    
        $sql1 = "INSERT INTO genre(nom_genre) values (:nom_genre)";
    
        $nom_genre= filter_var($array['nom_genre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
        $ajouterActeur=  $dao->executerRequete($sql1, [':nom_genre'=>$nom_genre]);
        header("Location: index.php?action=listGenres ");
      }  
  
      public function supprimerGenre($id){
        $dao= new DAO();
    
        $sql1 = "DELETE FROM genre WHERE id_genre=:id";
    
        $supprimerGenreAppartient = $this->supprimerGenreAppartient($id);
        $supprimerGenre = $dao->executerRequete($sql1, [':id'=>$id]);
    
        header("Location: index.php?action=listGenres ");
        
      }
      public function supprimerGenreAppartient($id){
        $dao= new DAO();
    
        $sql2= "DELETE FROM appartient  WHERE id_Genre= :id";
        $supprimerGenreAppartient = $dao->executerRequete($sql2, [':id'=>$id]);
        return $supprimerGenreAppartient;
      }   
    public function modifierGenreFormulaire($id){
      $dao= new DAO();
      $sql= "SELECT id_genre, nom_genre from genre where id_genre= :id";
      $param=[':id'=>$id];
      $genre= $dao->executerRequete($sql, $param);
      require "views/vues/genres/modifiergenreFormulaire.php";
    }   
    public function modifierGenre($array){
      $dao= new DAO();
      $sql= "UPDATE genre SET nom_genre = :nom_genre where id_genre = :id_genre";
      $nom_genre= filter_var($array['nom_genre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $param= [':nom_genre'=>$array['nom_genre'],':id_genre'=>$array['id_genre']];
      $modifierGenre= $dao->executerRequete($sql,$param);
      header("Location: index.php?action=listGenres ");
  }
}