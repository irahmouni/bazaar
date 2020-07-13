-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : Dim 05 juil. 2020 à 22:51
-- Version du serveur :  5.7.30-0ubuntu0.18.04.1
-- Version de PHP : 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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
  `articleID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Article`
--

CREATE TABLE `Article` (
  `ArticleID` int(100) NOT NULL,
  `nom` int(100) NOT NULL,
  `descriptionCourte` int(50) NOT NULL,
  `descriptionLongue` varchar(100) NOT NULL
  ` prix HT` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `IngredientFamilleRecette`
--

CREATE TABLE `IngredientFamilleRecette` (
  `idIngredientFamilleRecette` int(100) NOT NULL,
  `idFamilleRecette` int(100) NOT NULL,
  `idIngredient` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ingredientRecette`
--

CREATE TABLE `ingredientRecette` (
  `idIngredientRecette` int(100) NOT NULL,
  `idIngredient` int(100) NOT NULL,
  `idRecette` int(100) NOT NULL,
  `qte` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `idRecette` int(100) NOT NULL,
  `prixUniteProd` int(50) NOT NULL,
  `idUnite` int(100) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `unite`
--

CREATE TABLE `unite` (
  `idUnite` int(100) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `familleRecette`
--
ALTER TABLE `familleRecette`
  ADD PRIMARY KEY (`idFamilleRecette`);

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`idIngredient`),
  ADD KEY `idUniteIngredient` (`idUnite`);

--
-- Index pour la table `IngredientFamilleRecette`
--
ALTER TABLE `IngredientFamilleRecette`
  ADD PRIMARY KEY (`idIngredientFamilleRecette`),
  ADD KEY `ingredientFamilleRecetteFamilleRecette` (`idFamilleRecette`),
  ADD KEY `ingredientFamilleRecetteIngredient` (`idIngredient`);

--
-- Index pour la table `ingredientRecette`
--
ALTER TABLE `ingredientRecette`
  ADD PRIMARY KEY (`idIngredientRecette`),
  ADD KEY `IngredientRecetteIdIgredient` (`idIngredient`),
  ADD KEY `IngredientRecetteIdRecette` (`idRecette`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`idRecette`),
  ADD KEY `recetteIdUnite` (`idUnite`);

--
-- Index pour la table `unite`
--
ALTER TABLE `unite`
  ADD PRIMARY KEY (`idUnite`);

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
