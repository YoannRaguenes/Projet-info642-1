-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 01 juin 2020 à 11:16
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestioncommande`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id_avis` int(11) NOT NULL,
  `satisfaction_web` varchar(255) NOT NULL,
  `satisfaction_commande` varchar(255) NOT NULL,
  `explication` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `demande_enseignant`
--

CREATE TABLE `demande_enseignant` (
  `id` int(11) NOT NULL,
  `UE` text,
  `nom` text,
  `description` text,
  `commentaire` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `demande_materiel`
--

CREATE TABLE `demande_materiel` (
  `id_demande` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `description` text,
  `ligne_budgetaire` int(11) DEFAULT NULL,
  `produit_concerne` text,
  `quantite` text,
  `fournisseur` text,
  `prix_unitaire` text,
  `lien_vers_site` text,
  `image` text,
  `jour` date DEFAULT NULL,
  `mail` text,
  `enseignant` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `id_enseignant` int(11) NOT NULL,
  `departement` varchar(255) NOT NULL,
  `id_pers` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`id_enseignant`, `departement`, `id_pers`) VALUES
(18, 'informatique', 43);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etudiant` int(11) NOT NULL,
  `classe` varchar(255) NOT NULL,
  `id_demande_equipement` int(11) DEFAULT NULL,
  `id_perso` int(11) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `classe`, `id_demande_equipement`, `id_perso`, `numero`) VALUES
(17, 'IDU', NULL, 44, 1234566);

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE `materiel` (
  `id_materiel` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `image` blob NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE `messagerie` (
  `ID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `destinataire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_personne` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `email`, `password`) VALUES
(44, 'RAGUENES', 'Yoann', 'yoann.raguenes.29@gmail.com', '$2y$10$CEpZPYl5hUfN3ZMPGlgJk.mbktqOrr7Rd4D6.2ktnVounzYpA/Tee'),
(42, 'SIMARD', 'Adrien', 'adriensimard05@gmail.com', '$2y$10$GD7pycpVGfbJgQ.8LS5C2.9fMzsFdk68w93MS2bvj3tFDk3Tbrqt2'),
(43, 'NEPAUL', 'Roshan', 'roshannep27@gmail.com', '$2y$10$gBVJtB8.MSSHTNu6j6O80.6HZ.759T5xeVj7wW94czzrkYm34sAcu');

-- --------------------------------------------------------

--
-- Structure de la table `recuperation`
--

CREATE TABLE `recuperation` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `confirme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `service_technique`
--

CREATE TABLE `service_technique` (
  `id_service_technique` int(11) NOT NULL,
  `departement` varchar(255) NOT NULL,
  `id_person` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `service_technique`
--

INSERT INTO `service_technique` (`id_service_technique`, `departement`, `id_person`) VALUES
(7, 'informatique', 42);

-- --------------------------------------------------------

--
-- Structure de la table `suivi_demande_materiel`
--

CREATE TABLE `suivi_demande_materiel` (
  `id_suivi` int(11) NOT NULL,
  `etat` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `toute_demandes`
--

CREATE TABLE `toute_demandes` (
  `id` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `description` text,
  `ligne_budgetaire` int(11) DEFAULT NULL,
  `produit_concerne` text,
  `quantite` text,
  `fournisseur` text,
  `prix_unitaire` text,
  `lien_vers_site` text,
  `image` text,
  `jour` date DEFAULT NULL,
  `mail` text,
  `UE` text,
  `nom` text,
  `description_e` text,
  `commentaire` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id_avis`);

--
-- Index pour la table `demande_enseignant`
--
ALTER TABLE `demande_enseignant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demande_materiel`
--
ALTER TABLE `demande_materiel`
  ADD PRIMARY KEY (`id_demande`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id_enseignant`),
  ADD KEY `id_pers` (`id_pers`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `id_perso` (`id_perso`);

--
-- Index pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`id_materiel`);

--
-- Index pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`);

--
-- Index pour la table `recuperation`
--
ALTER TABLE `recuperation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `service_technique`
--
ALTER TABLE `service_technique`
  ADD PRIMARY KEY (`id_service_technique`),
  ADD KEY `id_person` (`id_person`);

--
-- Index pour la table `suivi_demande_materiel`
--
ALTER TABLE `suivi_demande_materiel`
  ADD PRIMARY KEY (`id_suivi`);

--
-- Index pour la table `toute_demandes`
--
ALTER TABLE `toute_demandes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id_avis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `demande_materiel`
--
ALTER TABLE `demande_materiel`
  MODIFY `id_demande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id_enseignant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `materiel`
--
ALTER TABLE `materiel`
  MODIFY `id_materiel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messagerie`
--
ALTER TABLE `messagerie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `recuperation`
--
ALTER TABLE `recuperation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `service_technique`
--
ALTER TABLE `service_technique`
  MODIFY `id_service_technique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `suivi_demande_materiel`
--
ALTER TABLE `suivi_demande_materiel`
  MODIFY `id_suivi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
