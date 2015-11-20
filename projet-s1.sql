
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE IF NOT EXISTS `Categorie` (
  `id_Categorie` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `intitule_Categorie` varchar(255) NOT NULL,
  `description_Categorie` text NOT NULL,
  PRIMARY KEY (`id_Categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Modification`
--

CREATE TABLE IF NOT EXISTS `Modification` (
  `id_Modification` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Date_Modification` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_Modification`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE IF NOT EXISTS `Utilisateur` (
  `id_Utilisateur` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Date_Utilisateur` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MDP_Utilisateur` varchar(132) NOT NULL,
  `Mail_Utilisateur` varchar(255) NOT NULL,
  PRIMARY KEY (`id_Utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
