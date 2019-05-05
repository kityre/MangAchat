-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 31 Mai 2018 à 10:09
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `manga`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` char(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Shonen'),
(2, 'Shojo'),
(3, 'Seinen'),
(15, 'dragon');

-- --------------------------------------------------------

--
-- Structure de la table `manga`
--

CREATE TABLE IF NOT EXISTS `manga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` char(30) DEFAULT NULL,
  `description1` text,
  `realisateur` char(50) DEFAULT NULL,
  `maisonEdition` char(50) DEFAULT NULL,
  `anneeDebut` int(4) DEFAULT NULL,
  `anneeFin` int(4) DEFAULT NULL,
  `image` char(60) DEFAULT NULL,
  `id_Categorie` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_manga` (`id_Categorie`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `manga`
--

INSERT INTO `manga` (`id`, `nom`, `description1`, `realisateur`, `maisonEdition`, `anneeDebut`, `anneeFin`, `image`, `id_Categorie`) VALUES
(1, 'ATTAQUE DES TITANS', 'L''histoire se déroule 70 ans avant la chute de Shiganshina et est tenue totalement secrete a l''insu de tous. Un jeune garçon né des sécrétions d''un titans ,ayant envahi Shiganshina et dévoré sa mère, se voit tenir en esclave par une riche famille. La jeune fille de la famille aida ce garçon qu''elle nomma Kyklo et ont pris la fuite ensemble. On decouvre ainsi l''hisoire de "L''enfant Titans" qui bouleversa le futur du monde, en participant a la création du fameux "dispositifs" tri-dimentionnel.', 'Isayama Hajime', 'Pika', 2014, 2018, './Image/SNK_BTF/couverture.jpg', 1),
(2, 'MY HERO ACADEMIA', 'Dans un monde où 80 % de la population possède un pouvoir, les héros font partie de la vie quotidienne. Et les super-vilains aussi !\nFace à eux se dresse All Might, le plus puissant des héros ! Idole du jeune Midoriya qui n''a qu''un rêve : entrer à la Hero Academia pour suivre les traces de son heros.', 'Kohei Horikoshi', 'Ki-oon', 2014, 0, './Image/MHA/couverture.jpg', 1),
(3, 'JUDGE', 'Hiro se réveille un jour menotté dans un bâtiment obscur, coiffé d''un masque de lapin. Après quelques pas,il pénètre dans une salle de tribunal où l''attendent sept autres adolescents coiffés eux aussi de masques d''animaux, ainsi qu''un jeune garçon mort.Chaque masque d''animal représente\nun des sept péchés capitaux.Une vidéo leur explique les règles du jeu auquel ils vont être forcés de participer : toutes les douze heures aura lieu un vote,ils devront choisir de sacrifier l''un d''entre eux jusqu''à que ne reste que quatre survivants.', 'Yoshiki Tonogai', 'Ki-oon', 2010, 2012, './Image/JUDGE/couverture.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tome`
--

CREATE TABLE IF NOT EXISTS `tome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(3) DEFAULT NULL,
  `titre` char(50) DEFAULT NULL,
  `resume1` text,
  `prix` decimal(5,2) DEFAULT NULL,
  `image` char(60) DEFAULT NULL,
  `id_Manga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tome` (`id_Manga`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Contenu de la table `tome`
--

INSERT INTO `tome` (`id`, `numero`, `titre`, `resume1`, `prix`, `image`, `id_Manga`) VALUES
(1, 1, 'L''attaque des Titans - Before the Fall Vol1', 'Trente ans après la construction des murs, un monstre parvient à pénétrer dans le district de Shiganshina où il commet un massacre.', '6.60', './Image/SNK_BTF/tome1.jpg', 1),
(2, 2, 'L''attaque des Titans - Before the Fall Vol2', 'Après s’être échappé de la cellule, Kyklo se rend dans le district de Shiganshina. Là, le Bataillon d’exploration, reformé après une période d’inactivité', '6.60', './Image/SNK_BTF/tome2.jpg', 1),
(3, 3, 'L''attaque des Titans - Before the Fall Vol3', 'Kyklo profite d’une expédition du Bataillon d’exploration pour sortir de l’enceinte des murs. L’horreur à laquelle il se trouve confronté surpasse', '6.60', './Image/SNK_BTF/tome3.jpg', 1),
(4, 4, 'L''attaque des Titans - Before the Fall Vol4', 'Après une lutte acharnée, Kyklo est parvenu à échapper au Titan qui le poursuivait et à regagner Shiganshina indemne. Son répit est cependant de', '6.60', './Image/SNK_BTF/tome4.jpg', 1),
(5, 5, 'L''attaque des Titans - Before the Fall Vol5', 'À deux doigts d’être cueillis par un Titan, Kyklo et Cardina sont sauvés in extremis par Jorge Piquer, le grand héros,', '6.60', './Image/SNK_BTF/tome5.jpg', 1),
(6, 6, 'L''attaque des Titans - Before the Fall Vol6', 'L’expédition entreprise par le Bataillon d’exploration quinze ans plus tôt ne visait pas simplement à capturer un Titan, mais à déterminer', '6.60', './Image/SNK_BTF/tome6.jpg', 1),
(7, 7, 'L''attaque des Titans - Before the Fall Vol7', 'Toujours persuadé que Kyklo est le responsable de la mort de son père, Xavi fait son trou dans l''organisation militaire. Repéré par la commandante Gloria', '6.60', './Image/SNK_BTF/tome7.jpg', 1),
(8, 8, 'L''attaque des Titans - Before the Fall Vol8', 'Restée à Xenophon, Carla s’inquiète : Kyklo, parti expérimenter le nouveau “dispositif”, n’est pas encore revenu. Évidemment, ni elle ni personne ne', '6.60', './Image/SNK_BTF/tome8.jpg', 1),
(9, 9, 'L''attaque des Titans - Before the Fall Vol9', 'Afin de mater la tentative de rébellion menée par August, les Brigades spéciales de Shiganshina ont investi la Cité industrielle. Kyklo, inquiet pour Carla', '6.60', './Image/SNK_BTF/tome9.jpg', 1),
(10, 10, 'L''attaque des Titans - Before the Fall Vol10', 'Échappant à la surveillance de son frère, Carla va tenter de retrouver l’énigmatique Angel Aaltonen, ingénieux inventeur du dispositif de manœuvre', '6.60', './Image/SNK_BTF/tome10.jpg', 1),
(11, 11, 'L''attaque des Titans - Before the Fall Vol11', 'Quinze ans plus tôt, alors qu’il visite les toutes récentes installations de la Cité industrielle, Angel découvre de nouveaux matériaux grâce auxquels il', '6.60', './Image/SNK_BTF/tome11.jpg', 1),
(12, 12, 'L''attaque des Titans - Before the Fall Vol12', 'Tandis que Carla s’est rendue dans les Bas-Fonds dans l’objectif de retrouver Angel, le concepteur original du dispositif,', '6.60', './Image/SNK_BTF/tome12.jpg', 1),
(13, 13, 'L''attaque des Titans - Before the Fall Vol13', 'Kyklo est très impressionné par la version finale du dispositif de manœuvre tridimensionnelle que lui dévoilent Angel et Carla.', '6.60', './Image/SNK_BTF/tome13.jpg', 1),
(14, 1, 'Judge 1', 'Premier jugement.', '6.60', './image/JUDGE/tome1.jpg', 3),
(15, 2, 'Judge 2', 'Conspiration', '6.60', './image/JUDGE/tome2.jpg', 3),
(16, 3, 'Judge 3', 'Aveux', '6.60', './image/JUDGE/tome3.jpg', 3),
(17, 4, 'Judge 4', 'Un nouveau Proc', '6.60', './image/JUDGE/tome4.jpg', 3),
(18, 5, 'Judge 5', 'Dernier jugement.', '6.60', './image/JUDGE/tome5.jpg', 3),
(19, 6, 'Judge 6', 'Verdict', '6.60', './image/JUDGE/tome6.jpg', 3),
(20, 1, 'Izuku Midoriya: les origines', 'Esperant integrer l ecole de Yuei, academie formant de nouveaux heros , Izuku Midoriya , sans alter, pourra compter sur son idole All Might qui va lui etre d une grande aide pour realiser son reve.', '6.60', './image/MHA/tome1.jpg', 2),
(21, 2, 'Dechaine-toi, maudit nerd !', 'Avec sa classe, la seconde A, Izuku enchaine les netrainements. Mais de mysterieux ennemis attaquent.', '6.60', './image/MHA/tome2.jpg', 2),
(22, 3, 'All Might', 'Le Festival Sportif de Yuei commence ! Les apprentis heros devront tout donner pour etre au sommet et se faire remarquer par les recruteurs.', '6.60', './image/MHA/tome3.jpg', 2),
(23, 4, 'Celui qui avais tout', 'La deuxieme epreuve commence, La Grande Bataille. Izuku en equipe avec Ochako, Fumikage et Mei Hatsume devront combattre les autres equipes pour les voler leurs points. Izuku ayant remporter la premiere epreuve, se retrouve avec le bandeau qui vaut 1 mill', '6.60', './image/MHA/tome4.jpg', 2),
(24, 5, 'Shoto Todoroki : les origines', 'Le second tour de la troiseme epreuve commence. Les dernier candidats en lice donneront le maximum pour atteindre la finale.', '6.60', './image/MHA/tome5.jpg', 2),
(25, 6, 'Fremissement', 'Les eleves commencent ? choisir leur pseudonymes de Hero. Les stages chez les professionnels commencent. Mais qui est donc le mysterieux Heros qui a choisi d embaucher Izuku?', '6.60', './image/MHA/tome6.jpg', 2),
(26, 7, 'Katsuki Bakugo : les origines.', 'Tenya, Izuku et Shoto continuent leur batailles face ? Stain, le tueur de Heros.', '6.60', './image/MHA/tome7.jpg', 2),
(27, 8, 'Momo Yaoyorozu : l envol', 'La Seconde A passe un examen de fin de trimestre. Par binomes, les eleves devront traverser un parcours et affronter leurs professeurs. Les deux rivaux Izuku et Katsuki sont contraints de faire equipe et ils devront affronter... All Might !', '6.60', './image/MHA/tome8.jpg', 2),
(28, 9, 'My Hero', 'La Seconde A et la Seconde B sont en camp d ete avec leur professeur principal, Shota Aizawa et les Wild Wild Pussycats. Le but de cette excursion en for?t : s entra?ner pour mieux ma?triser son Alter. Mais l Alliance des Vilains sort de l ombre avec de n', '6.60', './image/MHA/tome9.jpg', 2),
(29, 10, 'All for One', 'Katsuki a ete enleve par l Alliance des Vilains. Eijiro, Izuku, Shoto, Momo et Tenya decident d aller le delivrer. Mais un ennemi puissant s appr?te ? sortir de l ombre.', '6.60', './image/MHA/tome10.jpg', 2),
(30, 11, 'La fin du commencement et le commencement de la fi', 'Eijiro et ses amis parviennent ? sauver Katsuki. Pendant ce temps, All Might affronte son ennemi jure, le chef de l Alliance des Vilains : All for One !', '6.60', './image/MHA/tome11.jpg', 2),
(31, 12, 'L examen', 'Le lycee Yuei est pointe du doigt par la population suite ? l enlevement de Katsuki. Les apprentis Heros doivent s entra?ner ? nouveau. Cependant, l heure d un examen un peu special : s ils le reussissent, ils obtiendront une licence provisoire de Heros.\r', '6.60', './image/MHA/tome12.jpg', 2),
(32, 13, 'On va causer de ton alter !', 'L examen est tres difficile et les candidats doivent tout donner pour le reussir, y compris s allier avec les eleves des autres lycees. Mais Shoto semble avoir un probleme avec un eleve du lycee Shiketsu, un genie qui utilise le vent.', '6.60', './image/MHA/tome13.jpg', 2),
(33, 14, 'Overhaul', 'Shoto et Katsuki sont les seuls de Yuei a ne pas avoir reussi l examen. Furieux, Katsuki provoque Izuku en duel et semble avoir perce le secret de son Alter. Pendant ce temps, un mysterieux gang entre en scene.', '6.60', './image/MHA/tome14.jpg', 2),
(34, 15, 'Funeste destin', 'Les equipes de Sir Nighteye, Ryuku, FatGum et EraserHead font tout pour sauver Eri, une petite fille des griffes du yakuza Overhaul. Vont-ils reussir ?', '6.60', './image/MHA/tome15.jpg', 2),
(35, 16, 'Red Riot', 'FatGum et son stagiaire Eijiro affronte le redoutable Rappa, subordonne d Overhaul. Le combat est sans pitie.', '6.60', './image/MHA/tome16.jpg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `administrateur` int(1) DEFAULT '0',
  `email` char(50) NOT NULL,
  `mdp` char(20) NOT NULL,
  `nom` char(20) DEFAULT NULL,
  `prenom` char(20) DEFAULT NULL,
  `adresse` char(70) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` char(50) DEFAULT NULL,
  `jour_naissance` int(2) DEFAULT NULL,
  `mois_naissance` int(2) DEFAULT NULL,
  `annee_naissance` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `administrateur`, `email`, `mdp`, `nom`, `prenom`, `adresse`, `cp`, `ville`, `jour_naissance`, `mois_naissance`, `annee_naissance`) VALUES
(13, 0, 'z', 'z', 'Z', 'Z', 'Z', 'z', 'Z', 14, 7, 2009),
(15, 1, 'email', 'mdp', 'NOM', 'Prenom', 'Adresse', 'cp', 'Ville', 12, 4, 2007),
(14, 0, 'q', 'q', 'Q', 'Q', 'Q', 'q', 'Q', 16, 8, 2002),
(10, 0, 'b', 'a', 'A', 'A', 'A', 'a', 'A', 0, 0, 0),
(9, 1, 'a', 'a', '', 'A', 'A', 'a', 'A', 12, 8, 2003),
(16, 0, 'h', 'h', 'A', 'A', 'Aa', '56565', 'A', 26, 7, 2003),
(17, 0, '', '', '', '', '', '', '', 0, 0, 0),
(18, 0, '', '', '', '', '', '', '', 0, 0, 0),
(19, 0, '', '', '', '', '', '', '', 0, 0, 0),
(20, 0, '', '', '', '', '', '', '', 0, 0, 0),
(21, 0, '', '', '', '', '', '', '', 0, 0, 0),
(22, 1, 'mathieu.facelli.sio@gmail.com', 'mathieu94', 'FACELLI', 'Mathieu', '30 Rue De Tame', '94400', 'Vitry Sur Seine', 29, 10, 1999);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
