<?php

use App\UserController;
use App\AccueilController;
use App\ConnexionController;
use App\RealisateurController;
use App\ActeurController;
use App\GenreController;
use App\FilmController;
use App\RoleController;

spl_autoload_register(function ($className) {

    $className = str_replace("App", "controllers", $className);
    $className = str_replace("\\", "/", $className);
    $className .= '.php';

    require_once $className;
});

// à faire : rajouter des sanitize partout (y compris sur les array)
$ctrlFilm = new FilmController();
$ctrlActeur = new ActeurController();
$ctrlRealisateur = new RealisateurController();
$ctrlRole = new RoleController();
$ctrlGenre = new GenreController();
$ctrlAccueil = new AccueilController();
$ctrlAffiches = new AccueilController();
$ctrlConnexion = new ConnexionController();
$ctrlUser = new UserController();

if(isset($_GET['action'])){
    
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS); // car possible d'injecter dans l'URL
$id_role = filter_input(INPUT_GET, "id_role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id_genre = filter_input(INPUT_GET, "id_genre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id_acteur = filter_input(INPUT_GET, "id_acteur", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 

    switch($_GET['action']){
        case "accueil" : $ctrlAccueil->pageAccueil($id); break;
        case "connexion" : $ctrlConnexion->connexionFormulaire($_POST); break;
        case "login" : $ctrlConnexion->login($_POST); break;
        case "ajoutInscriptionForm" : $ctrlConnexion->ajoutInscriptionForm($_POST); break;
        case "inscription" : $ctrlConnexion->inscription($_POST); break;
        case "logout" : $ctrlConnexion->logout($_SESSION); break;
        case "listActeurs" : $ctrlActeur->findAll(); break;
        case "listFilms" : $ctrlFilm->findAll(); break;
        case "listRealisateurs" : $ctrlRealisateur->findAll(); break;
        case "listRoles" : $ctrlRole->findAll(); break;
        case "listGenres" : $ctrlGenre->findAll(); break;
        case "detailfilm": $ctrlFilm->findById($id); break;
        case "detailacteur": $ctrlActeur->findById($id); break;
        case "detailrealisateur": $ctrlRealisateur->findById($id); break;
        case "ajouterfilmFormulaire": $ctrlFilm->ajouterfilmformulaire();break;
        case "ajouterFilm":  $ctrlFilm->ajouterFilm($_POST);break;
        case "ajouterActeur":  $ctrlActeur->ajouterActeur($_POST);break;
        case "ajouteracteurFormulaire": $ctrlActeur->ajouteracteurformulaire();break;
        case "ajouterActeurFilmFormulaire": $ctrlActeur->ajouterActeurFilmFormulaire($id);break;
        case "ajouterActeurFilm": $ctrlActeur->ajouterActeurFilm($_POST);break;
        case "ajouterroleFormulaire" : $ctrlRole->ajouterRoleFormulaire(); break;
        case "ajouterRole" : $ctrlRole->ajouterRole($_POST); break;
        case "ajoutergenreFormulaire" : $ctrlGenre->ajoutergenreFormulaire(); break;
        case "ajouterGenre" : $ctrlGenre->ajouterGenre($_POST); break;
        case "ajouterrealisateurFormulaire" : $ctrlRealisateur->ajouterrealisateurFormulaire(); break;
        case "ajouterRealisateur" : $ctrlRealisateur->ajouterRealisateur($_POST); break;
        case "suppressionacteur" : $ctrlActeur->supprimerActeur($id); break;
        case "suppressionfilm" : $ctrlFilm->supprimerFilm($id); break;
        case "suppressionrealisateur" : $ctrlRealisateur->supprimerRealisateur($id); break;
        case "suppressionrole" : $ctrlRole->supprimerRole($id); break;
        case "suppressiongenre" : $ctrlGenre->supprimerGenre($id); break;
        case "modifiergenreFormulaire" : $ctrlGenre->modifierGenreFormulaire($id); break;
        case "modifierGenre" :$ctrlGenre->modifierGenre($_POST); break;
        case "modifierroleFormulaire" : $ctrlRole->modifierRoleFormulaire($id); break;
        case "modifierRole" :$ctrlRole->modifierRole($_POST); break;
        case "modifieracteurFormulaire" : $ctrlActeur->modifierActeurFormulaire($id); break;
        case "modifieracteur" :$ctrlActeur->modifierActeur($_POST); break;
        case "modifierrealisateurFormulaire" : $ctrlRealisateur->modifierRealisateurFormulaire($id); break;
        case "modifierrealisateur" :$ctrlRealisateur->modifierRealisateur($_POST); break;
    }
}else{
    $ctrlAccueil->pageAccueil();
}