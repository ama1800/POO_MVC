<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contenu/css/style.css">
    <title><?= $titre ?></title>
</head>
<body>
    <div id="global">
        <header>
            <img src="/cinePOO/contenu/img/logo.png" alt="logo">
            <div id="header">
                <nav>
                    <a href="index.php?action=accueil">Home</a>
                    <a href="index.php?action=listActeurs">Acteurs</a>
                    <a href="index.php?action=listRealisateurs">Réalisateurs</a>
                    <a href="index.php?action=listFilms">Films</a>
                    <a href="index.php?action=listRoles">Roles</a>
                    <a href="index.php?action=listGenres">Genres</a>
                </nav>
                <button><a href="index.php?action=connexion">Connexion</a></button>
            </div>
        </header>
        <div id="contenu">
            <?= $contenu ?>
        </div> <!-- #contenu -->
        <footer id="pied">
            CINEMA réalisé avec PHP_POO et PDO par le Stagiaire AIT M'HAMED.
        </footer>
    </div> <!-- #global -->
</body>
</html>
