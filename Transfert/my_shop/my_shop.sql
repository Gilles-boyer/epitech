-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Sam 04 Juillet 2020 à 16:27
-- Version du serveur :  5.7.30-0ubuntu0.18.04.1
-- Version de PHP :  7.1.33-16+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `my_shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`) VALUES
(19, 'HOMME', 33),
(20, 'FEMME', 33),
(21, 'ENFANT', 33),
(22, 'ROUGE', 32),
(23, 'VERT', 32),
(24, 'BLANC', 32),
(25, 'NOIR', 32),
(26, 'JAUNE', 32),
(27, 'S', 34),
(28, 'M', 34),
(29, 'L', 34),
(30, 'XL', 34),
(31, 'XXL', 34),
(32, 'COLOR', 0),
(33, 'GENRE', 0),
(34, 'SIZE', 0),
(35, 'RED', 32),
(36, 'GREEN', 32),
(37, 'YELLOW', 32),
(38, 'BLACK', 32),
(40, 'SM', 34),
(41, 'ENFANT GARCON', 33),
(42, 'WHITE', 32),
(43, 'BLUE', 32),
(44, 'PURPLE', 32);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_ID` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `price` float NOT NULL DEFAULT '0',
  `description_short` text NOT NULL,
  `description_long` text NOT NULL,
  `genre_id` int(11) NOT NULL DEFAULT '0',
  `color_id` int(11) NOT NULL,
  `img_adresse` varchar(255) NOT NULL DEFAULT '0',
  `discountf` float NOT NULL DEFAULT '0',
  `discountb` tinyint(1) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `visibility` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id`, `product_ID`, `name`, `price`, `description_short`, `description_long`, `genre_id`, `color_id`, `img_adresse`, `discountf`, `discountb`, `quantity`, `visibility`, `created_at`, `size_id`) VALUES
(11, 'RF1HPNC', 'Polo Noir Champion', 29.99, 'Polo Noir Champion', 'Polo Noir Champion ajusté avec liseret orange // ceci est un test', 19, 38, 'img/polo_homme_005.jpg', 0, 5, 35, 1, '2020-07-02 20:27:36', 30),
(13, 'RFLKJOE', 'Polo Red young', 19.98, 'Polo ajusté pour enfant rouge', 'Polo ajusté pour enfant de couleur rouge avec liseret noir sur les manches et logo.', 21, 22, 'img/polo_enfant_010.jpg', 0, 0, 20, 1, '2020-07-04 13:47:12', 27),
(14, 'RFLMKHLIUG', 'Polo Green Young', 18.95, 'Polo ajusté pour enfant vert', 'Polo ajusté pour enfant de couleur vert avec liseret bleu et blanc sur les manches et le cole.', 21, 23, 'img/polo_enfant_009.jpg', 0, 0, 10, 1, '2020-07-04 13:53:22', 28),
(15, 'RFPIOYGFH', 'Polo  BlueWoman', 25.99, 'Polo ajusté noir pour femme', 'Polo pour femme noir avec col bleu et blanc. Logo sur le devant du polo de type ajusté.', 20, 25, 'img/polo_femme_004.jpg', 0, 0, 20, 1, '2020-07-04 13:58:39', 29),
(16, 'RFMOIUVKGTC', 'Polo WhiteYoung', 25.98, 'Polo enfant blanc', 'Polo enfant de couleur blanc avec liseret bleu marine sur les manches et le col.', 21, 24, 'img/polo_enfant_004.jpg', 0, 0, 30, 1, '2020-07-04 14:00:39', 30),
(17, 'RFLKHOSP', 'Polo Red&amp;Blue Woman', 29.95, 'Polo ajusté pour femme', 'Polo pour femme de couleur rouge et bleu et ajusté. Logo devant et col rouge et bleu.', 20, 22, 'img/polo_femme_012.jpg', 0, 0, 15, 1, '2020-07-04 14:04:09', 28),
(18, 'RFPLGDRDJB', 'Polo WhiteWoman', 24.99, 'Polo blan pour femme', 'Polo blanc pour femme avec simplement un logo sur le devant et un col de couleur blanc', 20, 24, 'img/polo_femme_008.jpg', 0, 0, 19, 1, '2020-07-04 14:07:35', 30),
(19, 'RFMLJSPOHJP', 'Polo WhiteMan', 25.99, 'Polo pour homme de couleur blanc', 'Polo pour homme de taille regular et de couleur blanc. Col blanc et logo sur le devant.', 19, 24, 'img/polo_homme_010.jpg', 0, 0, 30, 1, '2020-07-04 14:10:10', 31),
(20, 'RFMLJSTYZFS', 'POLO ActionMan', 29.99, 'Polo pour homme Bicolore', 'Polo Homme bicolore. 2 nuances de bleu et un logo orange sur le devant.', 19, 43, 'img/polo_homme_011.jpg', 0, 0, 40, 1, '2020-07-04 14:12:32', 29),
(21, 'RFkJSBN', 'Polo PinkWoman', 23.95, 'Polo pour femme ajusté', 'Polo ajusté pour femme de couleur rose et col rose.', 20, 44, 'img/polo_femme_003.jpg', 0, 0, 30, 1, '2020-07-04 14:14:35', 40),
(22, 'RFMLKJH', 'Polo BlueWoman Simple', 19.95, 'Polo pour femme ajusté bleu', 'Polo pour femme de couleur bleu uni sans motifs.', 20, 43, 'img/polo_femme_006.jpg', 0, 1, 20, 1, '2020-07-04 16:10:25', 27),
(23, 'RFZERTYUI', 'Polo CocoYoung', 16.95, 'Polo enfant vert à motifs', 'Polo pour enfant de couleur vert avec des motif palmiers noir.  Col uni de couleur vert.', 21, 23, 'img/polo_enfant_007.jpg', 0, 0, 15, 1, '2020-07-04 16:13:23', 28),
(24, 'RFUJNBVFR', 'Polo WhiteMan R&amp;B', 25.99, 'Polo ajusté pour homme', 'Polo pour homme de couleur blanc, ajusté avec liseret bleu et rouge sur les manches et le col.', 19, 24, 'img/polo_homme_003.jpg', 0, 0, 20, 1, '2020-07-04 16:16:33', 30),
(25, 'RFZSDCVOIU', 'Polo DecontractWoman', 24.95, 'Polo ajusté pour femme bleu', 'Polo ajusté pour femme de couleur bleu et col couleur argent avec motifs et sans liseret.', 20, 43, 'img/polo_femme_002.jpg', 0, 0, 34, 1, '2020-07-04 16:19:31', 28),
(26, 'RFZDCVJPKBL', 'Polo MotifWoman', 28.99, 'Polo pour femme a motif bleu', 'Polo pour femme de couleur bleu et blanc avec motifs et col de couleur blanc.', 20, 43, 'img/polo_femme_011.jpg', 0, 0, 40, 1, '2020-07-04 16:21:47', 27),
(27, 'RFJLCRESFUM', 'Polo YellowMan', 25.99, 'Polo homme de couleu noir', 'Polo pour homme de couleur noir avec col de couleur jaune avec motifs jaune et sans liseret.', 19, 38, 'img/polo_homme_007.jpg', 0, 0, 40, 1, '2020-07-04 16:23:47', 31);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `admin`) VALUES
(5, 'Gilles', 'BOYER', NULL, '$2y$10$lLKcn4HfSUAqHtj208JoXelLPrauHurOtlX1ENXTfGm0myT17YcVe', 'boyer.gilles@live.fr', 1),
(8, 'Emmanuelle', 'BOYER', NULL, '$2y$10$JP/70/lPWlzrQ9gOeMBEN.N9ctPE/hbysKXSq76AAYB/U/Js.ivwa', 'emmanuelle@emmanuelle.fr', 0),
(10, 'Cedric', 'MAGLIONE', NULL, '$2y$10$BWkeSWY92e6BicAWVJSpLOkgV/Sv4BXcTW.CK6fl7x99n56RCNOIK', 'cedric@cedric.fr', 1),
(11, 'Sophie', 'SAUTRON', NULL, '$2y$10$HaQ1lFurgEXGtkIVLd6p/u/69449oTU2vBW1b0aW6dIKDsoUFyj9O', 'sophie@sophie.fr', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
