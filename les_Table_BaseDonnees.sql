-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 24, 2020 at 07:35 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id12823799_souad`
--

-- --------------------------------------------------------

--
-- Table structure for table `Clients`
--

CREATE TABLE `Clients` (
  `id_client` int(20) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mod_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Adress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num_tele` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Clients`
--

INSERT INTO `Clients` (`id_client`, `nom`, `prenom`, `email`, `mod_pass`, `Adress`, `num_tele`) VALUES
(58, 'njnjn', 'njj', 'souad74@gmail.com', 'souadSOUAD74?', 'lkl', 563897452),
(62, 'hhhh', 'Souad', 'Souad56@gmail.com', 'Aze123/*1', 'Ait meloul', 603775375);

-- --------------------------------------------------------

--
-- Table structure for table `Commande`
--

CREATE TABLE `Commande` (
  `id_client` int(20) NOT NULL,
  `id_produit` int(20) NOT NULL,
  `quantite` int(20) NOT NULL,
  `prix_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Commande`
--

INSERT INTO `Commande` (`id_client`, `id_produit`, `quantite`, `prix_total`) VALUES
(58, 100, 5, 850),
(58, 101, 1, 150),
(59, 101, 2, 300),
(59, 102, 1, 150),
(59, 105, 3, 510),
(59, 107, 2, 340),
(59, 108, 1, 200),
(59, 109, 1, 200),
(59, 110, 20, 3400),
(62, 100, 1, 170),
(62, 107, 1, 170),
(62, 108, 1, 200);

-- --------------------------------------------------------

--
-- Table structure for table `Commentaires`
--

CREATE TABLE `Commentaires` (
  `id_comm` int(20) NOT NULL,
  `id_c` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Commentaire` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Commentaires`
--

INSERT INTO `Commentaires` (`id_comm`, `id_c`, `Commentaire`) VALUES
(9, 'hhhh Souad', 'bhhjjkklmm');

-- --------------------------------------------------------

--
-- Table structure for table `Paiment`
--

CREATE TABLE `Paiment` (
  `id_paiment` int(20) NOT NULL,
  `id_client` int(20) NOT NULL,
  `card_num` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Sous_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Paiment`
--

INSERT INTO `Paiment` (`id_paiment`, `id_client`, `card_num`, `Sous_total`) VALUES
(1, 59, 'gfhjkl', 300),
(2, 59, 'rdtfygvuhbijoklp', 3400),
(3, 59, 'ghjklmù', 1340),
(4, 62, '0236548', 540);

-- --------------------------------------------------------

--
-- Table structure for table `Produits`
--

CREATE TABLE `Produits` (
  `id_produit` int(20) NOT NULL,
  `article_nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_produit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Produits`
--

INSERT INTO `Produits` (`id_produit`, `article_nom`, `img_produit`, `prix`) VALUES
(100, 'hoodie1', 'img1.jpg', 170),
(101, 'hoodie2', 'img4.jpg', 150),
(102, 'hoodie3', 'IMG5.jpg', 150),
(103, 'hoodie4', 'img6.jpg', 200),
(104, 'hoodie5', 'img7.jpg', 169),
(105, 'hoodie6', 'img8.jpg', 170),
(106, 'hoodie7', 'img9.jpg', 150),
(107, 'hoodie8', 'img10.jpg', 170),
(108, 'hoodie9', 'img11.jpg', 200),
(109, 'hoodie10', 'img12.jpg', 200),
(110, 'hoodie11', 'img13.jpg', 170),
(111, 'hoodie12', 'img14.jpg', 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Clients`
--
ALTER TABLE `Clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`id_client`,`id_produit`),
  ADD KEY `Commande_ibfk_1` (`id_produit`);

--
-- Indexes for table `Commentaires`
--
ALTER TABLE `Commentaires`
  ADD PRIMARY KEY (`id_comm`);

--
-- Indexes for table `Paiment`
--
ALTER TABLE `Paiment`
  ADD PRIMARY KEY (`id_paiment`);

--
-- Indexes for table `Produits`
--
ALTER TABLE `Produits`
  ADD PRIMARY KEY (`id_produit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Clients`
--
ALTER TABLE `Clients`
  MODIFY `id_client` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `Commentaires`
--
ALTER TABLE `Commentaires`
  MODIFY `id_comm` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Paiment`
--
ALTER TABLE `Paiment`
  MODIFY `id_paiment` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Produits`
--
ALTER TABLE `Produits`
  MODIFY `id_produit` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Commande`
--
ALTER TABLE `Commande`
  ADD CONSTRAINT `Commande_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `Produits` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Commande_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `Clients` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
