<?php

namespace App;

require_once 'controllers/DAO.php';
class RealisateurController{
    public function findAll(){
        $dao= new DAO();
    // Renvoie la liste des films
    $sql = "SELECT id_real ,nom_realisateur, prenom_realisateur FROM  realisateur";
    $requete = $dao->executerRequete($sql);
    require "views/vues/realisateurs/vueRealisateur.php";
  }
  public function findById($id){
    $dao= new DAO();
    // Renvoie la liste des films
    $sql2 = "SELECT r.id_real, id_film, CONCAT(nom_REALISATEUR,' ',prenom_realisateur) AS nom, titre, annee FROM realisateur r, film f
    WHERE r.id_real=f.id_real AND f.id_real=:id
    ORDER BY annee DESC";
    $realisateur = $dao->executerRequete($sql2, [':id'=>$id ]);

    require "views/vues/realisateurs/detailRealisateur.php";
  }
  public function ajouterrealisateurformulaire(){
    $dao= new DAO();
    $sql1 = "SELECT distinct id_role, nom_role FROM role";
    $sql2 = "SELECT id_film, titre FROM film";
    $listRoles= $dao->executerRequete($sql1);
    $listFilms=  $dao->executerRequete($sql2);
    require "views/vues/realisateurs/ajouterrealisateurFormulaire.php";
  }
  
  public function ajouterRealisateur($array){

    $dao= new DAO(); 

    $sql1 = "INSERT INTO realisateur(nom_realisateur, prenom_realisateur ) values (:nom_realisateur, :prenom_realisateur )";

    $nom= filter_var($array['nom_realisateur'], FILTER_SANITIZE_STRING);
    $prenom= filter_var($array['prenom_realisateur'], FILTER_SANITIZE_STRING);

    $ajouterrealisateur=  $dao->executerRequete($sql1, [':nom_realisateur'=>$nom, ':prenom_realisateur'=>$prenom]);

    header("Location: index.php?action=listRealisateurs ");
  }  
   
  public function supprimerRealisateur($id){
    $dao= new DAO();

    $sql1 = "DELETE FROM realisateur WHERE id_real=:id";

    $supprimerRealisateur = $dao->executerRequete($sql1, [':id'=>$id]);

    header("Location: index.php?action=listRealisateurs ");
    
  }    
  public function modifierRealisateurFormulaire($id){
  $dao= new DAO();
  $sql= "SELECT id_real, nom_realisateur, prenom_realisateur from realisateur where id_real= :id";
  $param=[':id'=>$id];
  $realisateur= $dao->executerRequete($sql, $param);
  require "views/vues/realisateurs/modifierrealisateurFormulaire.php";
}   
public function modifierRealisateur($array){
  $dao= new DAO();
  $sql= "UPDATE realisateur SET nom_realisateur = :nom_realisateur, prenom_realisateur = :prenom_realisateur  where id_real = :id_real";
  $nom_realisateur = filter_var($array['nom_realisateur'], FILTER_SANITIZE_STRING);
  $prenom_realisateur = filter_var($array['prenom_realisateur'], FILTER_SANITIZE_STRING);
  $param= [':id_real'=>$array['id_real'], ':nom_realisateur'=>$array['nom_realisateur'],':prenom_realisateur'=>$array['prenom_realisateur']];
  $modifierrealisateur= $dao->executerRequete($sql,$param);
  header("Location: index.php?action=listRealisateurs ");
}   
}
    

