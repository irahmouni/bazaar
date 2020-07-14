
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
  `quantite` varchar(30) NOT NULL,
  ` prix HT` int(100) NOT NULL,
  `descriptionCourte` varchar(100) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

-- Structure de la table `Operation`


CREATE TABLE `Operation` (
  `operationID` int(100) NOT NULL,
  `quantite` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

-- Structure de la table `Utilisateur`

CREATE TABLE `Utilisateur` (
  `utilisateurID` int(100) NOT NULL,
  `passwordHash` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `administrateur` boolean DEFAULT false
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

-- Structure de la table `Adresse`


CREATE TABLE `Adresse` (
  `numero` varchar(50) NOT NULL,
  `rue` varchar(50) NOT NULL,
  `comp1` varchar(50) NOT NULL,
  `codePostal` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `adresseID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Structure de la table `Commande`

CREATE TABLE `Commande` (
  `commandeID` int(100) NOT NULL,
  `reglee` boolean default false,
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


-- Index pour la table `Adresse`

ALTER TABLE `Adresse`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `AdresseAdresseID` (`adresseID`);


-- Index pour la table `Utilisateur`

ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`utilisateurID`);



-- Index pour la table `Operation`

ALTER TABLE `Operation`
  ADD PRIMARY KEY (`operationID`);


-- Index pour la table `Commande`

ALTER TABLE `Commande`
  ADD PRIMARY KEY (`commandeID`),
  ADD KEY `CommandeAdresseID` (`adresseID`);


-- insertion pour les tables déchargées
-- insertion la table IllustrationArticle

insert into IllustrationArticle (ImageID, title, alt, articleID) values 
(1, 'Baskette', 'Baskette-adidas_predator.jpg',  1 ),
(2, 'Baskette', 'Baskette-adidas_pure.jpg',  2 ),
(3, 'Baskette', 'Baskette-adidas_purechaos.jpg',  3 ),
(4, 'Baskette', 'Baskette-nike_hyperv.jpg',  4 ),
(5, 'Baskette', 'Baskette-nike_mercu.jpg',  5 ),
(6, 'Baskette', 'Baskette-Nike.jpg',  6 )


-- insertion la table Article

insert into Article (ArticleID, quantite, prix HT, nom, descriptionCourte)
values
(1,'min,max', 199.99, 'adidas predator', 'Avec la nouvelle adidas Predator. La tige en textile tricoté de cette chaussure de foot sans lacets s enroule autour de ton pied pour un vrai ajustement à 360 degrés.'),
(2, 'min,max', 139.99, 'adidas pure', 'Basket adidas Originals Pure. La basket adidas Originals Pure Boost réactualise le look d un modèle de course emblématique des années 80.'),
(3, 'min,max', 49.99, 'adidas purechaos', 'adidas Homme Baskets. Superstar Boost de qualité original adidas'),
(4, 'min,max', 79.99, 'nike hyperv', 'nike_hyperv remplace une partie de la semelle intermédiaire par de l air visible. Elle revient aujourd hui dans sa version originale. '),
(5, 'min,max', 249.99,'nike mercu',  'Le modèle Revolution 5 est un produit phare de la marque Nike.'),
(6, 'min,max', 129.99, 'Nike JR', 'offre confort et design légendaire. Détails en cuir de haute qualité.')
COMMIT;
