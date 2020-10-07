-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2020 at 07:45 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `description_short` text NOT NULL,
  `description_long` text NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `img_adresse` varchar(255) NOT NULL DEFAULT '0',
  `discountf` float NOT NULL DEFAULT '0',
  `discountb` tinyint(1) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `visibiliy` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description_short`, `description_long`, `category_id`, `img_adresse`, `discountf`, `discountb`, `quantity`, `visibiliy`, `created_at`) VALUES
(1, 'polo test', 20, 'ceci est le premier test de print ', '', 0, '0', 0, 0, 0, 1, '2020-06-30 16:32:08'),
(2, 'test2', 30, 'test2', '', 0, '0', 0, 0, 0, 1, '2020-06-30 16:32:08'),
(3, 'test3', 20, 'test3', '', 0, '0', 0, 0, 0, 1, '2020-06-30 16:32:08'),
(4, 'test4', 40, 'test4', '', 0, '0', 0, 0, 0, 1, '2020-06-30 16:32:08'),
(5, 'test5', 40, 'test5', '', 0, '0', 0, 0, 0, 1, '2020-06-30 16:32:08'),
(6, 'test6', 52, 'test6', '', 0, '0', 0, 0, 0, 1, '2020-06-30 16:32:08'),
(7, 'test7', 70, 'test7', '', 0, '0', 0, 0, 0, 1, '2020-06-30 16:32:08'),
(8, 'test8', 60, 'test8', '', 0, '0', 0, 0, 0, 1, '2020-06-30 16:32:08'),
(9, 'test9', 50, 'test9\r\n', '', 0, '0', 0, 0, 0, 1, '2020-06-30 16:32:08'),
(10, 'test10', 80, 'test10', '', 0, '0', 0, 0, 0, 1, '2020-06-30 16:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `admin`) VALUES
(5, 'Gilles', 'BOYER', NULL, '$2y$10$lLKcn4HfSUAqHtj208JoXelLPrauHurOtlX1ENXTfGm0myT17YcVe', 'boyer.gilles@live.fr', 1),
(8, 'Emmanuelle', 'BOYER', NULL, '$2y$10$JP/70/lPWlzrQ9gOeMBEN.N9ctPE/hbysKXSq76AAYB/U/Js.ivwa', 'emmanuelle@emmanuelle.fr', 0),
(10, 'Cedric', 'MAGLIONE', NULL, '$2y$10$BWkeSWY92e6BicAWVJSpLOkgV/Sv4BXcTW.CK6fl7x99n56RCNOIK', 'cedric@cedric.fr', 0),
(11, 'Sophie', 'SAUTRON', NULL, '$2y$10$HaQ1lFurgEXGtkIVLd6p/u/69449oTU2vBW1b0aW6dIKDsoUFyj9O', 'sophie@sophie.fr', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
