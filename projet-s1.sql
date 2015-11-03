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
  `id_Article` bigint(20) unsigned NOT NULL,
  `contenu_Article` text NOT NULL,
  `date_parution_Article` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom_Article` varchar(255) NOT NULL,
  PRIMARY KEY (`id_Article`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE IF NOT EXISTS `Categorie` (
  `id_Categorie` bigint(20) unsigned NOT NULL,
  `intitule_Categorie` varchar(255) NOT NULL,
  `description_Categorie` text NOT NULL,
  PRIMARY KEY (`id_Categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Connexion`
--

CREATE TABLE IF NOT EXISTS `Connexion` (
  `id_Connexion` bigint(20) unsigned NOT NULL,
  `Date_Connexion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `session_Connexion` varchar(255) NOT NULL,
  PRIMARY KEY (`id_Connexion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Modification`
--

CREATE TABLE IF NOT EXISTS `Modification` (
  `id_Modification` bigint(20) unsigned NOT NULL,
  `Date_Modification` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_Modification`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE IF NOT EXISTS `Utilisateur` (
  `id_Utilisateur` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Date_Utilisateur` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MDP_Utilisateur` varchar(132) NOT NULL,
  `Mail_Utilisateur` varchar(255) NOT NULL,
  PRIMARY KEY (`id_Utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

