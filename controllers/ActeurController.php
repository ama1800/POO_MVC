<?php

namespace App;

require_once 'controllers/DAO.php';
class ActeurController{
    public function findAll(){
        $dao= new DAO();
    // Renvoie la liste des auteurs
    $sql = "SELECT id_acteur, nom_acteur , prenom_acteur , date_naissance FROM  acteur";
     //$sql= ('SELECT * From acteur');
    $requete = $dao->executerRequete($sql);
    require "views/vues/acteurs/vueActeur.php";
  }
  public function findById($id){
    $dao= new DAO();
    // Renvoie la liste des acteurs
    $sql2 = "SELECT c.id_film, c.id_role, concat(nom_acteur,' ',prenom_acteur) as nom, titre, nom_role, annee FROM acteur a, film f, role r, casting c
    WHERE c.id_role=r.id_role AND c.id_film=f.id_film AND c.id_acteur= a.id_acteur AND a.id_acteur=:id
    ORDER BY annee DESC";
    $findActeur = $dao->executerRequete($sql2, [':id'=>$id ]);
    require "views/vues/acteurs/detailActeur.php";
  }

  public function ajouteracteurformulaire(){
    $dao= new DAO();
    $sql1 = "SELECT distinct id_role, nom_role FROM role";
    $sql2 = "SELECT id_film, titre FROM film";
    $listRoles= $dao->executerRequete($sql1);
    $listFilms=  $dao->executerRequete($sql2);
    require "views/vues/acteurs/ajouteracteurFormulaire.php";
  }
  
  public function ajouterActeur($array){

    $dao= new DAO(); 

    $sql1 = "INSERT INTO acteur(nom_acteur, prenom_acteur ,sexe, date_naissance) values (:nom_acteur, :prenom_acteur ,:sexe, :date_naissance)";

    $nom= filter_var($array['nom_acteur'], FILTER_SANITIZE_STRING);
    $prenom= filter_var($array['prenom_acteur'], FILTER_SANITIZE_STRING);
    $sexe= filter_var($array['sexe'], FILTER_SANITIZE_STRING);
    $date_naissance= filter_var($array['date_naissance'], FILTER_SANITIZE_STRING);

    $ajouterActeur=  $dao->executerRequete($sql1, [':nom_acteur'=>$nom, ':prenom_acteur'=>$prenom ,':sexe'=>$sexe, ':date_naissance'=>$date_naissance]);
    header("Location: index.php?action=listActeurs ");
  }  
  public function supprimerActeur($id){
    $dao= new DAO();

    $sql1 = "DELETE FROM acteur WHERE id_acteur=:id";

    $supprimerActeurCasting = $this->supprimerActeurCasting($id);
    $supprimerActeur = $dao->executerRequete($sql1, [':id'=>$id]);

    header("Location: index.php?action=listActeurs ");
    
  }
  public function supprimerActeurCasting($id){
    $dao= new DAO();

    $sql2= "DELETE FROM casting  WHERE id_acteur= :id";
    $supprimerActeurCasting = $dao->executerRequete($sql2, [':id'=>$id]);
    return $supprimerActeurCasting;
  }
  
  public function ajouterActeurFilmFormulaire($id){
    $dao= new DAO();
    $sql1 = "SELECT distinct id_film, titre FROM film";
    $sql2 = "SELECT distinct id_acteur, concat(nom_acteur,' ',prenom_acteur) as nom FROM acteur";
    $sql3 = "SELECT distinct id_role, nom_role FROM role";
    $listFilms=  $dao->executerRequete($sql1);
    $listActeurs= $dao->executerRequete($sql2,[$id]);
    $listRoles= $dao->executerRequete($sql3);
    require "views/vues/acteurs/ajouterActeurFilmFormulaire.php";
  }
  
  public function ajouterActeurFilm($array1){

    $dao= new DAO(); 

    $sql1 = "INSERT INTO casting c (id_film,id_acteur, id_role) values (:id_film,:id_acteur, :id_role)";

    $film= filter_var($array1['film'], FILTER_SANITIZE_STRING);
    $acteur= filter_var($array1['acteur'], FILTER_SANITIZE_STRING);
    $role= filter_var($array1['role'], FILTER_SANITIZE_STRING);

    $ajouterActeurFilm=  $dao->executerRequete($sql1, [':id_film'=>$film, ':id_acteur'=>$acteur ,':id_role'=>$role]);
    require "views/vues/acteurs/ajouterActeurFilm.php";
  }    
    public function modifierActeurFormulaire($id){
    $dao= new DAO();
    $sql= "SELECT id_acteur, nom_acteur, prenom_acteur, sexe, date_naissance from acteur where id_acteur= :id";
    $param=[':id'=>$id];
    $acteur= $dao->executerRequete($sql, $param);
    require "views/vues/acteurs/modifieracteurFormulaire.php";
  }   
  public function modifierActeur($array){
    $dao= new DAO();
    $sql= "UPDATE acteur SET nom_acteur = :nom_acteur, prenom_acteur = :prenom_acteur, sexe = :sexe, date_naissance = :date_naissance  where id_acteur = :id_acteur";
    $nom_acteur = filter_var($array['nom_acteur'], FILTER_SANITIZE_STRING);
    $prenom_acteur = filter_var($array['prenom_acteur'], FILTER_SANITIZE_STRING);
    $sexe = filter_var($array['sexe'], FILTER_SANITIZE_STRING);
    $date_naissance = filter_var($array['date_naissance'], FILTER_SANITIZE_STRING);
    $param= [':id_acteur'=>$array['id_acteur'], ':nom_acteur'=>$array['nom_acteur'],':prenom_acteur'=>$array['prenom_acteur'],':sexe'=>$array['sexe'],':date_naissance'=>$array['date_naissance']];
    $modifieracteur= $dao->executerRequete($sql,$param);
    header("Location: index.php?action=listActeurs ");
}   
}
    

