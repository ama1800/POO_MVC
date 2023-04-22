-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour cinema
CREATE DATABASE IF NOT EXISTS `cinema` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cinema`;

-- Listage de la structure de la table cinema. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_acteur` varchar(50) NOT NULL,
  `prenom_acteur` varchar(50) NOT NULL,
  `sexe` char(50) NOT NULL DEFAULT '',
  `date_naissance` date NOT NULL,
  PRIMARY KEY (`id_acteur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.acteur : ~11 rows (environ)
/*!40000 ALTER TABLE `acteur` DISABLE KEYS */;
INSERT INTO `acteur` (`id_acteur`, `nom_acteur`, `prenom_acteur`, `sexe`, `date_naissance`) VALUES
	(1, 'jolie', 'jaquline', 'femme', '1948-09-15'),
	(2, 'mourad', 'skirch', 'homme', '1999-12-15'),
	(3, 'mathieu', 'guirin', 'homme', '1975-10-02'),
	(4, 'nasser', 'belkebch', 'homme', '1960-10-28'),
	(5, 'nora', 'touzi', 'femme', '1978-05-11'),
	(6, 'tomo', 'lkrrak', 'femme', '1989-05-18'),
	(7, 'soho', 'kawazaki', 'homme', '2005-01-09'),
	(8, 'nouri', 'chourri', 'homme', '1955-01-01'),
	(9, 'tayfoun', 'bolabi', 'homme', '2003-09-12'),
	(10, 'kaloucha', 'bowalia', 'femme', '2000-09-12');
/*!40000 ALTER TABLE `acteur` ENABLE KEYS */;

-- Listage de la structure de la table cinema. appartient
CREATE TABLE IF NOT EXISTS `appartient` (
  `id_genre` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  PRIMARY KEY (`id_genre`,`id_film`),
  KEY `appartient_Film0_FK` (`id_film`),
  CONSTRAINT `appartient_Film0_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `appartient_Genre_FK` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.appartient : ~13 rows (environ)
/*!40000 ALTER TABLE `appartient` DISABLE KEYS */;
INSERT INTO `appartient` (`id_genre`, `id_film`) VALUES
	(2, 1),
	(8, 2),
	(2, 3),
	(1, 4),
	(6, 4),
	(1, 5),
	(4, 5),
	(2, 6),
	(7, 7),
	(8, 8),
	(3, 9),
	(4, 10);
/*!40000 ALTER TABLE `appartient` ENABLE KEYS */;

-- Listage de la structure de la table cinema. casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_film` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id_film`,`id_acteur`,`id_role`),
  KEY `casting_Acteur0_FK` (`id_acteur`),
  KEY `casting_Role1_FK` (`id_role`),
  CONSTRAINT `casting_Acteur0_FK` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `casting_Film_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `casting_Role1_FK` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.casting : ~19 rows (environ)
/*!40000 ALTER TABLE `casting` DISABLE KEYS */;
INSERT INTO `casting` (`id_film`, `id_acteur`, `id_role`) VALUES
	(1, 1, 4),
	(8, 1, 11),
	(1, 2, 3),
	(4, 2, 9),
	(2, 3, 1),
	(4, 3, 9),
	(3, 4, 1),
	(3, 4, 2),
	(1, 5, 5),
	(5, 5, 3),
	(1, 7, 13),
	(4, 7, 9),
	(7, 7, 14),
	(2, 8, 6),
	(5, 8, 13),
	(3, 9, 7),
	(4, 10, 5),
	(5, 10, 10);
/*!40000 ALTER TABLE `casting` ENABLE KEYS */;

-- Listage de la structure de la table cinema. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `annee` year(4) NOT NULL,
  `note` int(5) NOT NULL,
  `synopsis` text NOT NULL,
  `affiche` varchar(255) NOT NULL,
  `id_real` int(11) NOT NULL,
  `duree` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`id_film`),
  KEY `Film_Realisateur_FK` (`id_real`),
  CONSTRAINT `Film_Realisateur_FK` FOREIGN KEY (`id_real`) REFERENCES `realisateur` (`id_real`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.film : ~10 rows (environ)
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
INSERT INTO `film` (`id_film`, `titre`, `annee`, `note`, `synopsis`, `affiche`, `id_real`, `duree`) VALUES
	(1, 'couco', '2003', 3, 'matin ensolille des coucou qui saut par tout', 'https://www.premiere.fr/sites/default/files/styles/scale_crop_336x486/public/plurimedia_import/7_1324475.jpg', 5, '01:55:00'),
	(2, 'matuzami', '2015', 2, 'matuzami jeune partie en vacance il decide d\'y rester', 'https://media.senscritique.com/media/000019174841/325/L_Appel_de_la_foret.jpg', 5, '02:30:00'),
	(3, 'foot', '2020', 4, 'match de foot qui provoque une guerre mondile qui s\'achéve lorsque l\'arbitre l\'a decider', 'https://img-4.linternaute.com/nJJJieUhKc0YjlMSVWkAY8_nItU=/405x540/d7d61959cda54f8aa45d4ef495fc202e/ccmcms-linternaute/186953.jpg', 10, '02:20:00'),
	(4, 'jungle', '2018', 4, 'la vie mouvementer en jungle ou le plus fort devore le faible', 'https://fr.web.img5.acsta.net/pictures/19/12/04/15/26/0979818.jpg', 1, '01:50:00'),
	(5, 'samuel passe lui la sauce', '2012', 2, 'un pere de famille essaye d\'apprendre a ces enfants les bonnes maniere. mais ..', 'https://www.france.tv/image/vignette_3x4/346/461/7/m/i/d5f5fcfc-phpu5gim7.jpg', 1, '01:45:00'),
	(6, 'loli', '2019', 4, 'loli jeune femme qui se marie, et realise commen sa vie va mieux jusqu\'ou...', 'https://fr.web.img5.acsta.net/pictures/20/01/23/09/02/1428612.jpg', 2, '02:25:00'),
	(7, 'rue droite', '2001', 4, 'rue longue plein de monde et d\'evenements surpprises', 'https://media.senscritique.com/media/000018630904/source_big/Once_Upon_a_Time_in_Hollywood.jpg', 13, '02:25:00'),
	(8, 'un matin', '1955', 4, 'histoire d\'amour qui voit le jour un matin sombre', 'https://www.mariefrance.fr/wp-content/uploads/sites/5/2018/08/will-hunting-286x410.jpg', 12, '02:25:00'),
	(9, 'envoyer par php', '2012', 5, 'apres un combat achaarrné.. php a finalement ceder et le film et ajouter avec succe', 'https://kevinfolio.com/img/php.jpg', 4, '02:33:00'),
	(10, 'casser les oeufs', '2020', 4, 'deux œufs qui se battent. Du coup se termine en omelette.', 'https://www.cchobby.fr/media/catalog/product/cache/8/image/9df78eab33525d08d6e5fb8d27136e95/v/1/v15282.jpg', 13, '01:55:00');
/*!40000 ALTER TABLE `film` ENABLE KEYS */;

-- Listage de la structure de la table cinema. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int(11) NOT NULL AUTO_INCREMENT,
  `nom_genre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_genre`),
  UNIQUE KEY `nom_genre` (`nom_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.genre : ~10 rows (environ)
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` (`id_genre`, `nom_genre`) VALUES
	(1, 'Action'),
	(4, 'animation'),
	(8, 'aventure'),
	(12, 'Classic'),
	(7, 'comedie'),
	(2, 'Drame'),
	(3, 'famille'),
	(5, 'Fiction'),
	(9, 'histoire'),
	(6, 'Suspense');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;

-- Listage de la structure de la table cinema. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_real` int(11) NOT NULL AUTO_INCREMENT,
  `nom_realisateur` varchar(50) NOT NULL,
  `prenom_realisateur` varchar(50) NOT NULL,
  PRIMARY KEY (`id_real`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.realisateur : ~14 rows (environ)
/*!40000 ALTER TABLE `realisateur` DISABLE KEYS */;
INSERT INTO `realisateur` (`id_real`, `nom_realisateur`, `prenom_realisateur`) VALUES
	(1, 'kommi', 'jommi'),
	(2, 'mathias', 'zombiz'),
	(3, 'nattan', 'chorer'),
	(4, 'serio', 'serge'),
	(5, 'coustco', 'manuel'),
	(6, 'rico', 'lorent'),
	(7, 'myrie', 'renisse'),
	(9, 'passo', 'jarisse'),
	(10, 'toto', 'roland'),
	(11, 'mourad', 'skirch'),
	(12, 'nora', 'touzi'),
	(13, 'kaloucha', 'bowalia');
/*!40000 ALTER TABLE `realisateur` ENABLE KEYS */;

-- Listage de la structure de la table cinema. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.role : ~15 rows (environ)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id_role`, `nom_role`) VALUES
	(1, 'cowbow'),
	(2, 'policier'),
	(3, 'jean marque'),
	(4, 'jolie jannette'),
	(5, 'directrice'),
	(6, 'le voleur'),
	(7, 'mano killer'),
	(8, 'batman'),
	(9, 'superman'),
	(10, 'battwomen'),
	(11, 'tariq'),
	(13, 'fontome'),
	(14, 'boxeur');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Listage de la structure de la vue cinema. test
-- Création d'une table temporaire pour palier aux erreurs de dépendances de VIEW
CREATE TABLE `test` (
	`nom_role` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nom` VARCHAR(101) NOT NULL COLLATE 'latin1_swedish_ci',
	`titre` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Listage de la structure de la vue cinema. test
-- Suppression de la table temporaire et création finale de la structure d'une vue
DROP TABLE IF EXISTS `test`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `test` AS SELECT nom_role,CONCAT( nom_acteur," ",prenom_acteur) AS nom,titre FROM acteur a, role r, film f, casting c
WHERE c.id_film=f.id_film AND c.id_acteur=a.id_acteur AND c.id_role= r.id_role
ORDER BY nom_role ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
