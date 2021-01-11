-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 08 Mai 2020 à 13:24
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `reservation`
--

-- --------------------------------------------------------

--
-- Structure de la table `aeroport`
--

CREATE TABLE `aeroport` (
  `Id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `pays` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `aeroport`
--

INSERT INTO `aeroport` (`Id`, `nom`, `pays`) VALUES
(1, 'Charles de Gaulle', 'France'),
(2, 'Dubai', 'Dubai'),
(3, 'Porto', 'Portugal');

-- --------------------------------------------------------

--
-- Structure de la table `avion`
--

CREATE TABLE `avion` (
  `Id` int(11) NOT NULL,
  `modele` varchar(100) NOT NULL,
  `nombre_de_places` int(11) NOT NULL,
  `Id_compagnies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `avion`
--

INSERT INTO `avion` (`Id`, `modele`, `nombre_de_places`, `Id_compagnies`) VALUES
(1, 'A380', 500, 1),
(2, 'A737', 120, 2);

-- --------------------------------------------------------

--
-- Structure de la table `bagage_soute`
--

CREATE TABLE `bagage_soute` (
  `Id` int(11) NOT NULL,
  `Id_utilisateur` int(11) NOT NULL,
  `Id_vol` int(11) NOT NULL,
  `nombre_bagage` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

CREATE TABLE `billet` (
  `Id` int(11) NOT NULL,
  `Id_reservation_vol` int(11) NOT NULL,
  `numero_billet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `compagnies`
--

CREATE TABLE `compagnies` (
  `Id` int(11) NOT NULL,
  `nom_compagnies` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `compagnies`
--

INSERT INTO `compagnies` (`Id`, `nom_compagnies`, `image`) VALUES
(1, 'Air france', 'images/airFrance.png'),
(2, 'Emirates', 'images/emirates.png'),
(3, 'Jet airways', '');

-- --------------------------------------------------------

--
-- Structure de la table `embarquement`
--

CREATE TABLE `embarquement` (
  `Id` int(11) NOT NULL,
  `Id_billet` int(11) NOT NULL,
  `numero_place` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `Id_paiement` int(11) NOT NULL,
  `Id_vol` int(11) NOT NULL,
  `Id_utilisateur` int(11) NOT NULL,
  `paiement_effectuer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reservation_vol`
--

CREATE TABLE `reservation_vol` (
  `Id` int(11) NOT NULL,
  `Id_utilisateur` int(11) NOT NULL,
  `Id_vol` int(11) NOT NULL,
  `Id_bagage_soute` int(11) NOT NULL,
  `numero_reservation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `sexe` varchar(100) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `adresse_mail` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` int(6) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_client`, `nom`, `prenom`, `sexe`, `date_de_naissance`, `adresse_mail`, `adresse`, `ville`, `code_postal`, `telephone`, `password`) VALUES
(1, 'jean', 'monnet', 'M', '1997-03-12', 'sala@gmail.com', 'place victor hugo 89500', '', 0, '06111111111', '123456'),
(3, 'dfuhdj', 'cdsijndcs', 'M.', '2020-05-19', 'CDSH@gmail.com', 'cdjzjicd', 'cdjbihcds', 95400, '0139905453', 'dzjhsuidcsusd'),
(4, 'dfuhdj', 'cdsijndcs', 'M.', '2020-05-19', 'CDSH@gmail.com', 'cdjzjicd', 'cdjbihcds', 95400, '0139905453', 'dzjhsuidcsusd'),
(5, 'vcbcb', 'azzaz', 'M.', '2020-05-27', 'JJIJJI@gmail.com', 'cdshdosnk', 'dosxqjsoijsqoiq', 23456, '0139905453', 'dhsqjhjsqnsq'),
(7, 'sala', 'haj', 'M.', '1997-04-27', 'salah@gmail.com', 'vfdijvfk', 'oncdokvnvdoj', 23400, '0139905435', '123456'),
(8, 'hadji', 'salavudeen', 'M.', '2020-05-13', 'salav@gmail.com', 'dcjkjbdij', 'ijcdijkc', 23400, '0605922071', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

CREATE TABLE `vol` (
  `Id_vol` int(11) NOT NULL,
  `Id_avion` int(11) NOT NULL,
  `date_depart` date NOT NULL,
  `date_arrivee` date NOT NULL,
  `heure_depart` time NOT NULL,
  `heure_arrivee` time NOT NULL,
  `Id_depart` varchar(100) NOT NULL,
  `Id_arrivee` varchar(100) NOT NULL,
  `duree_vol` time NOT NULL,
  `numero_vol` varchar(5) NOT NULL,
  `prix` int(11) NOT NULL,
  `prix_bagage` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vol`
--

INSERT INTO `vol` (`Id_vol`, `Id_avion`, `date_depart`, `date_arrivee`, `heure_depart`, `heure_arrivee`, `Id_depart`, `Id_arrivee`, `duree_vol`, `numero_vol`, `prix`, `prix_bagage`) VALUES
(1, 1, '2020-03-14', '2020-03-20', '10:00:00', '15:00:00', 'Charles de Gaulle', 'Dubai', '04:00:00', 'ek098', 450, '45'),
(2, 2, '2020-04-01', '2020-03-01', '09:00:00', '11:00:00', 'Charles de Gaulle', 'Porto', '02:00:00', 'AF413', 300, '33'),
(3, 2, '2020-05-01', '2020-04-01', '17:22:00', '10:00:00', 'Charles de Gaulle', 'Dubai', '04:00:00', 'ek076', 400, '22'),
(5, 2, '2020-05-02', '2020-05-02', '11:00:00', '16:00:00', 'Dubai', 'Charles de Gaulle', '10:00:00', 'AF232', 230, '10'),
(6, 1, '2020-05-02', '2020-05-02', '05:30:00', '13:00:00', 'Dubai', 'Charles de Gaulle', '06:00:00', 'EK056', 700, '12'),
(7, 2, '2020-05-01', '2020-05-01', '09:00:00', '16:00:00', 'Charles de Gaulle', 'Dubai', '10:00:00', 'EK065', 230, '11'),
(8, 2, '2020-05-15', '2020-05-16', '06:00:00', '13:00:00', 'Charles de Gaulle', 'Dubai', '05:00:00', 'EK054', 520, '35'),
(9, 1, '2020-05-16', '2020-05-16', '16:00:00', '23:00:00', 'Dubai', 'Charles de Gaulle', '13:00:00', 'EK078', 400, '30');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `aeroport`
--
ALTER TABLE `aeroport`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `nom` (`nom`);

--
-- Index pour la table `avion`
--
ALTER TABLE `avion`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_compagnies` (`Id_compagnies`);

--
-- Index pour la table `bagage_soute`
--
ALTER TABLE `bagage_soute`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_utilisateur` (`Id_utilisateur`),
  ADD KEY `Id_vol` (`Id_vol`);

--
-- Index pour la table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_reservation_vol` (`Id_reservation_vol`);

--
-- Index pour la table `compagnies`
--
ALTER TABLE `compagnies`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `embarquement`
--
ALTER TABLE `embarquement`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_reservation_vol` (`Id_billet`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`Id_paiement`),
  ADD KEY `id_vol` (`Id_vol`,`Id_utilisateur`),
  ADD KEY `Id_utilisateur` (`Id_utilisateur`);

--
-- Index pour la table `reservation_vol`
--
ALTER TABLE `reservation_vol`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_utlisateur` (`Id_utilisateur`,`Id_vol`),
  ADD KEY `Id_vol` (`Id_vol`),
  ADD KEY `Id_bagage_soute` (`Id_bagage_soute`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `vol`
--
ALTER TABLE `vol`
  ADD PRIMARY KEY (`Id_vol`),
  ADD KEY `Id_depart` (`Id_depart`),
  ADD KEY `Id_arrivee` (`Id_arrivee`),
  ADD KEY `Id_avion` (`Id_avion`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `aeroport`
--
ALTER TABLE `aeroport`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `avion`
--
ALTER TABLE `avion`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `bagage_soute`
--
ALTER TABLE `bagage_soute`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;
--
-- AUTO_INCREMENT pour la table `billet`
--
ALTER TABLE `billet`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `compagnies`
--
ALTER TABLE `compagnies`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `embarquement`
--
ALTER TABLE `embarquement`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `Id_paiement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `reservation_vol`
--
ALTER TABLE `reservation_vol`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `vol`
--
ALTER TABLE `vol`
  MODIFY `Id_vol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `avion`
--
ALTER TABLE `avion`
  ADD CONSTRAINT `avion_ibfk_1` FOREIGN KEY (`Id_compagnies`) REFERENCES `compagnies` (`Id`);

--
-- Contraintes pour la table `bagage_soute`
--
ALTER TABLE `bagage_soute`
  ADD CONSTRAINT `bagage_soute_ibfk_1` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`id_client`),
  ADD CONSTRAINT `bagage_soute_ibfk_2` FOREIGN KEY (`Id_vol`) REFERENCES `vol` (`Id_vol`);

--
-- Contraintes pour la table `billet`
--
ALTER TABLE `billet`
  ADD CONSTRAINT `billet_ibfk_1` FOREIGN KEY (`Id_reservation_vol`) REFERENCES `reservation_vol` (`Id`);

--
-- Contraintes pour la table `embarquement`
--
ALTER TABLE `embarquement`
  ADD CONSTRAINT `embarquement_ibfk_1` FOREIGN KEY (`Id_billet`) REFERENCES `billet` (`Id`);

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_ibfk_1` FOREIGN KEY (`Id_vol`) REFERENCES `vol` (`Id_vol`),
  ADD CONSTRAINT `paiement_ibfk_2` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`id_client`);

--
-- Contraintes pour la table `reservation_vol`
--
ALTER TABLE `reservation_vol`
  ADD CONSTRAINT `reservation_vol_ibfk_1` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`id_client`),
  ADD CONSTRAINT `reservation_vol_ibfk_2` FOREIGN KEY (`Id_vol`) REFERENCES `vol` (`Id_vol`),
  ADD CONSTRAINT `reservation_vol_ibfk_3` FOREIGN KEY (`Id_bagage_soute`) REFERENCES `bagage_soute` (`Id`);

--
-- Contraintes pour la table `vol`
--
ALTER TABLE `vol`
  ADD CONSTRAINT `vol_ibfk_1` FOREIGN KEY (`Id_depart`) REFERENCES `aeroport` (`nom`),
  ADD CONSTRAINT `vol_ibfk_2` FOREIGN KEY (`Id_arrivee`) REFERENCES `aeroport` (`nom`),
  ADD CONSTRAINT `vol_ibfk_3` FOREIGN KEY (`Id_avion`) REFERENCES `avion` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
