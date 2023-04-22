<?php

namespace App;

require_once 'controllers/DAO.php';
class UserController{
    public function findAll(){
        $dao= new DAO();
    // Renvoie la liste des users
    $sql = "SELECT id_user, nom, prenom FROM  user";
    $requete = $dao->executerRequete($sql);
    require "views/vues/users/usersList.php";
    }
  
      public function supprimerUser($id){
        $dao= new DAO();
    
        $sql1 = "DELETE FROM user WHERE id_user=:id";
    
        $supprimerUserCommentaire = $this->supprimerFromCommentaire($id);
        $supprimerUser = $dao->executerRequete($sql1, [':id'=>$id]);
    
        header("Location: index.php?action=accueil ");
        
      }
      public function supprimerFromCommentaire($id){
        $dao= new DAO();
    
        $sql2= "UPDATE commentaire SET nom= 'deleted'  WHERE id_user= :id";
        $supprimeruserAppartient = $dao->executerRequete($sql2, [':id'=>$id]);
        return $supprimeruserAppartient;
      }   
    public function modifierProfilFormulaire($id){
      $dao= new DAO();
      $sql= "SELECT id_user, nom, prenom, email from user where id_user= :id";
      $param=[':id'=>$id];
      $user= $dao->executerRequete($sql, $param);
      require "views/vues/users/modifierProfilFormulaire.php";
    }   
    public function modifierProfil($array){
      $dao= new DAO();
      $sql= "UPDATE user SET nom = :nom, prenom =:prenom, email=:email where id_user = :id_user";
      $nom= filter_var($array['nom'], FILTER_SANITIZE_STRING);
      $prenom= filter_var($array['prenom'], FILTER_SANITIZE_STRING);
      $email= filter_var($array['email'], FILTER_SANITIZE_STRING);
      $param= [':nom'=>$array['nom'],':prenom'=>$array['prenom'],':email'=>$array['email'],':id_user'=>$array['id_user']];
      $modifieruser= $dao->executerRequete($sql,$param);
      header("Location: index.php?action=accueil ");
  }
}