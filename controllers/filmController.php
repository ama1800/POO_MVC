<?php

namespace App;

require_once 'controllers/DAO.php';
class FilmController{
  public function findAll(){
        $dao= new DAO();
    // Renvoie la liste des films
    $sql = "SELECT id_film , titre ,annee , duree, note"
      . " FROM  film";
    $requete = $dao->executerRequete($sql);
    require "views/vues/films/vueFilm.php";
  }
  
  public function findById($id){
    $dao= new DAO();
    $sql2 = "SELECT titre, affiche, synopsis, note, annee, duree, f.id_real, nom_realisateur FROM film f, realisateur r WHERE id_film=:id AND f.id_real=r.id_real";
    $findFilm = $dao->executerRequete($sql2, [':id'=>$id ]);
    
    $sql3 = "SELECT CONCAT(prenom_acteur,' ',nom_acteur) AS nom, nom_role FROM acteur a, film f, casting c, role r WHERE f.id_film = c.id_film  AND c.id_role = r.id_role and a.id_acteur=c.id_acteur AND c.id_film = :id";
    $castingfilm = $dao->executerRequete($sql3, [':id'=>$id ]);
    require "views/vues/films/detailFilm.php";
  }


  public function ajouterfilmFormulaire(){
    $dao= new DAO();
    $sql1 = "SELECT distinct id_real, concat(nom_realisateur,' ',prenom_realisateur) as nom FROM realisateur";
    $sql2 = "SELECT id_genre, nom_genre FROM genre";
    $listRealisateurs= $dao->executerRequete($sql1);
    $listGenres=  $dao->executerRequete($sql2);
    require "views/vues/films/ajouterfilmFormulaire.php";
  }

  public function ajouterFilm($array){
    $dao= new DAO();
    $sql1 = "INSERT INTO film(titre,annee ,note,synopsis,affiche, id_real, duree) values (:titre,:annee ,:note,:synopsis,:affiche,:id_real, :duree)" ;
    $titre= filter_var($array['titre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $annee= filter_var($array['annee'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $note= filter_var($array['note'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $synopsis= filter_var($array['synopsis'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $affiche= filter_var($array['affiche'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $id_real= filter_var($array['realisateur'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $duree= filter_var($array['duree'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $ajouterFilm=  $dao->executerRequete($sql1, [':titre'=>$titre, ':annee'=>$annee, ':note'=>$note, ':synopsis'=>$synopsis, ':affiche'=>$affiche, ':duree'=>$duree, ':id_real'=>$id_real]);
    $dernierID= $dao->getBDD()->lastInsertId();
    $sql2= "INSERT INTO appartient(id_genre, id_film) value (:idGenre , :idFilm)";
    $appartient= filter_var_array($array['nom_genre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    foreach($appartient as $genreActuel){
     $dao->executerRequete($sql2, [':idGenre' => $genreActuel ,':idFilm'=>$dernierID]);
    }
    header("Location: index.php?action=listFilms ");
  }
   
  public function supprimerFilm($id){
    $dao= new DAO();

    $sql1 = "DELETE FROM film WHERE id_film=:id";

    $supprimerFilmCasting = $this->supprimerFilmCasting($id);
    $supprimerFilmAppartient = $this->supprimerFilmAppartient($id);
    $supprimerFilm = $dao->executerRequete($sql1, [':id'=>$id]);

    header("Location: index.php?action=listFilms ");
    
  }
    public function supprimerFilmCasting($id){
      $dao= new DAO();

      $sql2= "DELETE FROM casting  WHERE id_film= :id";
      $supprimerfilmCasting = $dao->executerRequete($sql2, [':id'=>$id]);
      return $supprimerfilmCasting;
    }
  
    public function supprimerFilmAppartient($id){
      $dao= new DAO();

      $sql2= "DELETE FROM appartient  WHERE id_film= :id";
      $supprimerFilmAppartient = $dao->executerRequete($sql2, [':id'=>$id]);
      return $supprimerFilmAppartient;
    }     
    public function modifierFilmFormulaire($id){
    $dao= new DAO();
    $sql= "SELECT f.id_film, titre, annee, note, synopsis, affiche, duree, id_real, GROUP_CONCAT(id_genre) as genre from film f, appartient a where f.id_film=a.id_film and id_film= :id";
    $param=[':id'=>$id];
    $modiFilm= $dao->executerRequete($sql, $param);
    $sql2= "SELECT id_genre, id_film from appartient a ";
    require "views/vues/films/modifierFilmFormulaire.php";
  } 

    public function modifierFilm($array){
    $dao= new DAO();
    $sql= "UPDATE film SET titre = :titre, annee = :annee, note = :note, synopsis= :synopsis, affiche= :affiche, id_real= :id_real, duree = :duree  where id_film = :id_film";

    $titre = filter_var($array['titre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $annee = filter_var($array['annee'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sexe = filter_var($array['sexe'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $note = filter_var($array['note'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $note = filter_var($array['synopsis'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $note = filter_var($array['affiche'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $note = filter_var($array['id_real'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $note = filter_var($array['duree'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $param= [':id_film'=>$array['id_film'], ':titre'=>$array['titre'],':annee'=>$array['annee'],':sexe'=>$array['sexe'],':note'=>$array['note']];
    $modifierfilm= $dao->executerRequete($sql,$param);
    header("Location: index.php?action=listFilms ");
}     
}

