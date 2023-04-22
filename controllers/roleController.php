<?php

namespace App;

require_once 'controllers/DAO.php';
class RoleController{
    public function findAll(){
        $dao= new DAO();
    // Renvoie la liste des roles
    $sql = "SELECT id_role , nom_role FROM  role";
    $requete = $dao->executerRequete($sql);
    require "views/vues/roles/vueRole.php";
    }
    public function ajouterRoleFormulaire(){
        $dao= new DAO();
        $sql1 = "SELECT distinct id_role, nom_role FROM role";
        $listRoles= $dao->executerRequete($sql1);
        require "views/vues/roles/ajouterroleFormulaire.php";
      }
      
      public function ajouterRole($array){
    
        $dao= new DAO(); 
    
        $sql1 = "INSERT INTO role(nom_role) values (:nom_role)";
    
        $nom_role= filter_var($array['nom_role'], FILTER_SANITIZE_STRING);
    
        $ajouterActeur=  $dao->executerRequete($sql1, [':nom_role'=>$nom_role]);
        header("Location: index.php?action=listRoles ");
      }  
  
      public function supprimerRole($id){
        $dao= new DAO();
    
        $sql1 = "DELETE FROM role WHERE id_role=:id";
    
        $supprimerRoleCasting = $this->supprimerRoleCasting($id);
        $supprimerRole = $dao->executerRequete($sql1, [':id'=>$id]);
    
        header("Location: index.php?action=listRoles ");
        
      }
      public function supprimerRoleCasting($id){
        $dao= new DAO();
    
        $sql2= "DELETE FROM casting  WHERE id_role= :id";
        $supprimerRoleCasting = $dao->executerRequete($sql2, [':id'=>$id]);
        return $supprimerRoleCasting;
      }       
      public function modifierRoleFormulaire($id){
        $dao= new DAO();
        $sql= "SELECT id_role, nom_role from role where id_role= :id";
        $param=[':id'=>$id];
        $role= $dao->executerRequete($sql, $param);
        require "views/vues/roles/modifierRoleFormulaire.php";
      }   
      public function modifierrole($array){
        $dao= new DAO();
        $sql= "UPDATE role SET nom_role = :nom_role where id_role = :id_role";
        $nom_role= filter_var($array['nom_role'], FILTER_SANITIZE_STRING);
        $param= [':nom_role'=>$array['nom_role'],':id_role'=>$array['id_role']];
        $modifierrole= $dao->executerRequete($sql,$param);
        header("Location: index.php?action=listRoles ");
    }
}