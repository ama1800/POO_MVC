<?php

namespace App;

require_once 'controllers/DAO.php';
class ConnexionController{
  public function connexionFormulaire($array){
      $dao= new DAO();
      
      $sql1 = "SELECT  psuedo, password FROM user";
      $connexion= $dao->executerRequete($sql1);
      
          require "connexion/connexionForm.php";
  }
  public function ajoutInscriptionForm($array){
    
    $dao= new DAO();
      
    $sql1 = "SELECT  * FROM user";
    $connexion= $dao->executerRequete($sql1);
    
        require "connexion/inscriptionForm.php";
    
  }
  public function inscription($array){
    
    $dao= new DAO();
    $email1=""; $email2=""; $password2="";
          if(!empty($password1) && (strlen($password1)>=8) && ($email1!==$email2) && ($password1===$password2) ){
            $pass=sha1($password1);
          }
          
          $pass= sha1($array['password']);
          $sql1 = "INSERT INTO user(nom, prenom ,email, psuedo, password) values (:nom, :prenom ,:email, :psuedo, :password)";
      
          $nom= filter_var($array['nom'], FILTER_SANITIZE_STRING);
          $prenom= filter_var($array['prenom'], FILTER_SANITIZE_STRING);
          $email= filter_var($array['email1'], FILTER_SANITIZE_STRING);
          $psuedo= filter_var($array['psuedo'], FILTER_SANITIZE_STRING);
          $password= filter_var($pass, FILTER_SANITIZE_STRING);
          $param=[':nom'=>$nom, ':prenom'=>$prenom ,':email'=>$email, ':psuedo'=>$psuedo, ':password'=>$password];
          $inscription=  $dao->executerRequete($sql1, $param);
          require "./connexion/connexionForm.php";
          $array['succes']= ' <p style="color:red;text-align: center">Bienvenue connectez vous</p>';


  }
  public function login($array){
    $dao= new DAO();
    
    $sql1 = "SELECT  * FROM user where psuedo= ? and password = ?";
    $pass= sha1($array['password']);
    $psuedo= filter_var($array['psuedo'], FILTER_SANITIZE_STRING);
    $password= filter_var($pass, FILTER_SANITIZE_STRING);
    if(strlen($password)<8 || empty($password) || empty($psuedo)){
      $array['erreur']= ' <p style="color:red; text-align: center">veuillez saisir le psuedo et le mot de passe valides</p>';
      header('location:http://localhost/cinePOO/index.php?action=connexion');
      exit();
    }else{
    $connexion= $dao->executerRequete($sql1);
    }
    $userexist = $connexion->rowCount();
    if($userexist == 1) {
       $userinfo = $connexion->fetch();
       $array['id_user'] = $userinfo['id_user'];
       $array['pseudo'] = $userinfo['pseudo'];
       $array[$pass] = $userinfo[$pass];
       header("Location: profil.php?id=".$array['id']);
    } else {
        $erreur = "Mauvais mail ou mot de passe !";
     }
  }
  public function logout($array){
    
    $dao= new DAO();
    
    $sql1 = "SELECT  psuedo,email, password, nom, prenom FROM user";
    require "connexion/logout.php";

  }
}