
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projet_tut_S1`
--
CREATE DATABASE IF NOT EXISTS `projet_tut_S1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projet_tut_S1`;

-- --------------------------------------------------------

--
-- Structure de la table `Article`
--

CREATE TABLE IF NOT EXISTS `Article` (
  `id_Article` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contenu_Article` text NOT NULL,
  `date_parution_Article` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom_Article` varchar(255) NOT NULL,
  `Categorie_Article` int(10) unsigned NOT NULL,
  `last_modification_Article` int(10) unsigned NOT NULL,
  `Auteur_Article` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_Article`,`Categorie_Article`,`last_modification_Article`,`Auteur_Article`),
  KEY `article-categorie-link` (`Categorie_Article`),
  KEY `article-modification-link` (`last_modification_Article`),
  KEY `article-to-author-link` (`Auteur_Article`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Article`
--

INSERT INTO `Article` (`id_Article`, `contenu_Article`, `date_parution_Article`, `nom_Article`, `Categorie_Article`, `last_modification_Article`, `Auteur_Article`) VALUES
(1, 'Ceci est un test', '2015-11-23 19:47:42', 'Ceci est un nom', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE IF NOT EXISTS `Categorie` (
  `id_Categorie` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intitule_Categorie` varchar(255) NOT NULL,
  `description_Categorie` text NOT NULL,
  PRIMARY KEY (`id_Categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Categorie`
--

INSERT INTO `Categorie` (`id_Categorie`, `intitule_Categorie`, `description_Categorie`) VALUES
(1, 'Categorie par defaut', '');

-- --------------------------------------------------------

--
-- Structure de la table `Connexion`
--

CREATE TABLE IF NOT EXISTS `Connexion` (
  `id_Connexion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Date_Connexion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `User_Connexion` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_Connexion`,`User_Connexion`),
  KEY `link-to-user-connextion` (`User_Connexion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `Connexion`
--

INSERT INTO `Connexion` (`id_Connexion`, `Date_Connexion`, `User_Connexion`) VALUES
(1, '2015-11-21 17:44:03', 1),
(2, '2015-11-21 17:47:36', 1),
(3, '2015-11-21 18:00:28', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Modification`
--

CREATE TABLE IF NOT EXISTS `Modification` (
  `id_Modification` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Date_Modification` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_Modification`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Modification`
--

INSERT INTO `Modification` (`id_Modification`, `Date_Modification`) VALUES
(1, '2015-11-23 19:46:54');

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE IF NOT EXISTS `Utilisateur` (
  `id_Utilisateur` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Date_Utilisateur` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MDP_Utilisateur` varchar(132) NOT NULL,
  `Mail_Utilisateur` varchar(255) NOT NULL,
  `nom_Utilisateur` varchar(50) NOT NULL,
  PRIMARY KEY (`id_Utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id_Utilisateur`, `Date_Utilisateur`, `MDP_Utilisateur`, `Mail_Utilisateur`, `nom_Utilisateur`) VALUES
(1, '2015-11-21 17:22:08', '65829e542dd151f443cc997270c61e78c042a82d687cc13844bf2c1813714600', 'test@mail.tld', '');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Article`
--
ALTER TABLE `Article`
  ADD CONSTRAINT `article-categorie-link` FOREIGN KEY (`Categorie_Article`) REFERENCES `Categorie` (`id_Categorie`),
  ADD CONSTRAINT `article-modification-link` FOREIGN KEY (`last_modification_Article`) REFERENCES `Modification` (`id_Modification`),
  ADD CONSTRAINT `article-to-author-link` FOREIGN KEY (`Auteur_Article`) REFERENCES `Utilisateur` (`id_Utilisateur`);

--
-- Contraintes pour la table `Connexion`
--
ALTER TABLE `Connexion`
  ADD CONSTRAINT `link-to-user-connextion` FOREIGN KEY (`User_Connexion`) REFERENCES `Utilisateur` (`id_Utilisateur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
