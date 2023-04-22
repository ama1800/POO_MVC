<?php

namespace App;

require_once 'controllers/DAO.php';
class ConnexionController
{
  public function connexionFormulaire($array)
  {
    $dao = new DAO();
    $sql1 = "SELECT  psuedo, password FROM user";
    $connexion = $dao->executerRequete($sql1);
    require "connexion/connexionForm.php";
  }
  public function ajoutInscriptionForm($array)
  {
    $dao = new DAO();
    $sql1 = "SELECT  * FROM user";
    $connexion = $dao->executerRequete($sql1);
    require "connexion/inscriptionForm.php";
  }
  public function inscription($array)
  {
    $dao = new DAO();
    $email1 = $array['email1'];
    $email2 = $array['email2'];
    $password2 = $array['password2'];
    $password1 = $array['password1'];
    if (!empty($password1) && (strlen($password1) >= 8) && ($email1 === $email2) && ($password1 === $password2)) {
      $password = sha1($password1);
      $sql1 = "INSERT INTO user(nom, prenom ,email, psuedo, password) values (:nom, :prenom ,:email, :psuedo, :password)";
      $nom = filter_var($array['nom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $prenom = filter_var($array['prenom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $email = filter_var($array['email1'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $psuedo = filter_var($array['psuedo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $param = [':nom' => $nom, ':prenom' => $prenom, ':email' => $email, ':psuedo' => $psuedo, ':password' => $password];
      $inscription =  $dao->executerRequete($sql1, $param);
      $_SESSION['succes']?? ' <p style="color:red;text-align: center">Bienvenue connectez vous</p>';
      require "./connexion/connexionForm.php";
    }
  }
  public function login($array)
  {
    // require "./connexion/status.php";
    // var_dump();
    // die;
    $dao = new DAO();
    $sql1 = "SELECT  * FROM user where psuedo= ? and password = ?";
    $password = sha1($array['password']);
    $psuedo = filter_var($array['psuedo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (strlen($password) < 8 || empty($password) || empty($psuedo)) {
      $_SESSION['erreur']?? ' <p style="color:red; text-align: center">veuillez saisir le psuedo et le mot de passe valides</p>';
      header('location:http://localhost/cinePOO/index.php?action=connexion');
      exit();
    } else {
      $connexion = $dao->executerRequete($sql1);
      $userexist = $connexion->rowCount();
      if ($userexist === 1) {
        $userinfo = $connexion->fetch();
        $array['id_user'] = $userinfo['id_user'];
        $array['pseudo'] = $userinfo['pseudo'];
        $array[$password] = $userinfo[$password];
        header("Location: profil.php?id=" . $array['id']);
      } else {
        $_SESSION['erreur']?? "Mauvais email ou mot de passe!";
      }
    }
  }
  public function logout($array)
  {

    $dao = new DAO();

    $sql1 = "SELECT  psuedo,email, password, nom, prenom FROM user";
    require "connexion/logout.php";
  }
}
