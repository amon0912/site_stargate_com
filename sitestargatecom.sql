-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 13 Octobre 2020 à 20:35
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `sitestargatecom`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_client` varchar(50) NOT NULL,
  `confirmation_client` tinyint(1) NOT NULL DEFAULT '0',
  `nom_client` varchar(15) NOT NULL,
  `prenoms_client` varchar(30) NOT NULL,
  `email_client` varchar(50) NOT NULL,
  `tel_client` varchar(12) NOT NULL,
  `created_client` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pass` varchar(100) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_client`, `confirmation_client`, `nom_client`, `prenoms_client`, `email_client`, `tel_client`, `created_client`, `pass`) VALUES
('16026069725f85d77cc379a', 1, 'Amon', 'Kakou', 'amon0912@gmail.com', '57988660', '2020-10-13 18:36:12', '0'),
('16026108825f85e6c21de6d', 0, 'Amon', 'K G', 'amon0912@gmail.com', '57988660', '2020-10-13 19:41:22', '1234'),
('16026109815f85e72597c4a', 0, 'Amon', 'K G', 'amon0912@gmail.com', '57988660', '2020-10-13 19:43:01', '0'),
('16026110485f85e7689a8e9', 0, 'Amon', 'K G', 'amon0912@gmail.com', '57988660', '2020-10-13 19:44:08', '$2y$10$MBWiX.im52Sa1x4aixgyQ.fBVdGhto/ZhHpo45RbCFPPU1e6uyuZC'),
('16026111015f85e79dba608', 1, 'Amon', 'K G', 'amon0912@gmail.com', '57988660', '2020-10-13 19:45:01', '$2y$10$2BPgCBqAIvM6VXyglLKJ7exw1q131A6qP91bHYXkhQ.Q3.EzffFUa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
