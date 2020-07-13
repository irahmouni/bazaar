-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : Lundi 13 juil. 2020 à 15:13
-- Version du serveur :  5.7.30-0ubuntu0.18.04.1
-- Version de PHP : 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Base de données : `appKarim`
--

-- --------------------------------------------------------

--
-- Structure de la table `IllustrationArticlesse`
--

CREATE TABLE `IllustrationArticle` (
  `ImageID` int(100) NOT NULL,
  `title` varchar(50) NOT NULL
  `alt` varchar(50) NOT NULL
  `url` varchar(50) NOT NULL
  `articleID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Article`
--

CREATE TABLE `Article` (
  `ArticleID` int(100) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `descriptionCourte` varchar(50) NOT NULL,
  `descriptionLongue` varchar(50) NOT NULL,
  ` prix HT` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Prix`
--

CREATE TABLE `Prix` (
  `articleID` int(100) NOT NULL,
  `dateDebut` Date() NOT NULL,
  `dateFin` Date() NOT NULL,
  `valeur` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Adresse`
--

CREATE TABLE `Adresse` (
  `numero` varchar(50) NOT NULL,
  `rue` varchar(50) NOT NULL,
  `codePostal` varchar(50) NOT NULL,
  `Subdivision` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `comp1` varchar(50) NOT NULL,
  `comp2` varchar(50) NOT NULL,
  `adresseID` int(100) NOT NULL,
  `useID` int(100) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id` int(100) NOT NULL,
  `passwordHash` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL
  `nom` varchar(50) NOT NULL,
  `administrateur` boolean() NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------



--
-- Structure de la table `Operation`
--

CREATE TABLE `Operation` (
  `opperationID` int(100) NOT NULL,
  `quantite` varchar(50) NOT NULL
  `date` date() NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Commande`
--

CREATE TABLE `Commande` (
  `commandeID` int(100) NOT NULL,
  `reglee` boolean() NOT NULL,
  `userID` int(100) NOT NULL,
  `adresseID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `IllustrationArticle`
--
ALTER TABLE `IllustrationArticle`
  ADD PRIMARY KEY (`ImageID`);
  ADD KEY `IllustrationArticleArticleID` (`articleID`);
--
-- Index pour la table `ingredient`
--
ALTER TABLE `Article`
  ADD PRIMARY KEY (`ArticleID`),

--
-- Index pour la table ` Prix`
--
ALTER TABLE ` Prix`
  ADD PRIMARY KEY (`valeur`),
  ADD KEY `PrixArticleID` (`articleID`),
--
-- Index pour la table `Adresse`
--
ALTER TABLE `Adresse`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `AdresseUseID` (`useID`),
  ADD KEY `AdresseAdresseID` (`adresseID`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id`),


--
-- Index pour la table `Operation`
--
ALTER TABLE `unite`
  ADD PRIMARY KEY (`operationID`);

--
-- Index pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`commandeID`),
  ADD KEY `CommandeUserID` (`userID`),
  ADD KEY `CommandeAdresseID` (`adresseID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `familleRecette`
--
ALTER TABLE `familleRecette`
  MODIFY `idFamilleRecette` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `idIngredient` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `IngredientFamilleRecette`
--
ALTER TABLE `IngredientFamilleRecette`
  MODIFY `idIngredientFamilleRecette` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ingredientRecette`
--
ALTER TABLE `ingredientRecette`
  MODIFY `idIngredientRecette` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `idRecette` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `unite`
--
ALTER TABLE `unite`
  MODIFY `idUnite` int(100) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD CONSTRAINT `idUniteIngredient` FOREIGN KEY (`idUnite`) REFERENCES `unite` (`idUnite`);

--
-- Contraintes pour la table `IngredientFamilleRecette`
--
ALTER TABLE `IngredientFamilleRecette`
  ADD CONSTRAINT `ingredientFamilleRecetteFamilleRecette` FOREIGN KEY (`idFamilleRecette`) REFERENCES `familleRecette` (`idFamilleRecette`),
  ADD CONSTRAINT `ingredientFamilleRecetteIngredient` FOREIGN KEY (`idIngredient`) REFERENCES `ingredient` (`idIngredient`);

--
-- Contraintes pour la table `ingredientRecette`
--
ALTER TABLE `ingredientRecette`
  ADD CONSTRAINT `IngredientRecetteIdIgredient` FOREIGN KEY (`idIngredient`) REFERENCES `ingredient` (`idIngredient`),
  ADD CONSTRAINT `IngredientRecetteIdRecette` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`idRecette`);

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `recetteIdUnite` FOREIGN KEY (`idUnite`) REFERENCES `unite` (`idUnite`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
