
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";




-- --------------------------------------------------------


-- Structure de la table `IllustrationArticlesse`


CREATE TABLE `IllustrationArticle` (
  `ImageID` int(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `alt` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `articleID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------


-- Structure de la table `Article`


CREATE TABLE `Article` (
  `ArticleID` int(100) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `descriptionCourte` varchar(50) NOT NULL,
  `descriptionLongue` varchar(50) NOT NULL,
  ` prix HT` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------


-- Structure de la table `Prix`


CREATE TABLE `Prix` (
  `articleID` int(100) NOT NULL,
  `dateDebut` Date,
  `dateFin` Date,
  `valeur` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------


-- Structure de la table `Adresse`


CREATE TABLE `Adresse` (
  `numero` varchar(50) NOT NULL,
  `rue` varchar(50) NOT NULL,
  `codePostal` varchar(50) NOT NULL,
  `Subdivision` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `comp1` varchar(50) NOT NULL,
  `comp2` varchar(50) NOT NULL,
  `adresseID` int(100) NOT NULL,
  `useID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------


-- Structure de la table `Utilisateur`


CREATE TABLE `Utilisateur` (
  `id` int(100) NOT NULL,
  `passwordHash` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `administrateur` boolean DEFAULT false
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------




-- Structure de la table `Operation`


CREATE TABLE `Operation` (
  `operationID` int(100) NOT NULL,
  `quantite` varchar(50) NOT NULL,
  `date` date
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------


-- Structure de la table `Commande`

CREATE TABLE `Commande` (
  `commandeID` int(100) NOT NULL,
  `reglee` boolean default false,
  `userID` int(100) NOT NULL,
  `adresseID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- --------------------------------------------------------


-- Index pour les tables déchargées


-- Index pour la table `IllustrationArticle`

ALTER TABLE `IllustrationArticle`
  ADD PRIMARY KEY (`ImageID`),
  ADD KEY `IllustrationArticleArticleID` (`articleID`);

-- Index pour la table `Article`

ALTER TABLE `Article`
  ADD PRIMARY KEY (`ArticleID`);


-- Index pour la table ` Prix`

ALTER TABLE `Prix`
  ADD PRIMARY KEY (`articleID`);

-- Index pour la table `Adresse`

ALTER TABLE `Adresse`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `AdresseUseID` (`useID`),
  ADD KEY `AdresseAdresseID` (`adresseID`);


-- Index pour la table `Utilisateur`

ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id`);



-- Index pour la table `Operation`

ALTER TABLE `Operation`
  ADD PRIMARY KEY (`operationID`);


-- Index pour la table `Commande`

ALTER TABLE `Commande`
  ADD PRIMARY KEY (`commandeID`),
  ADD KEY `CommandeUserID` (`userID`),
  ADD KEY `CommandeAdresseID` (`adresseID`);


-- AUTO_INCREMENT pour les tables déchargées


COMMIT;