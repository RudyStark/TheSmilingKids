-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: db.3wa.io
-- Generation Time: Apr 01, 2022 at 02:21 PM
-- Server version: 5.7.33-0ubuntu0.18.04.1-log
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rudysaksik_Projet`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `subject` text NOT NULL,
  `content` longtext NOT NULL,
  `date` datetime NOT NULL,
  `mail` varchar(150) NOT NULL,
  `phone` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `subject`, `content`, `date`, `mail`, `phone`) VALUES
(1, 'Rudy Saksik', 'sqddsqdsq', 'sdqdsq', '2021-10-17 16:30:29', 'Rudy.saksik@gmail.com', '0618746416'),
(2, 'Rudy Saksik', 'qsdsdq', 'qdssqddsq', '2021-10-17 16:32:24', 'Rudy.saksik@gmail.com', '0618746416'),
(3, 'Rudy Saksik', 'qdsqd', 'qdssdq', '2021-10-17 16:33:06', 'Rudy.saksik@gmail.com', '0618746416'),
(4, 'Frank', 'Informations', 'Hi, \r\ni wanna know some infos about your associations !', '2021-10-23 17:51:29', 'frank@new.com', '+331115751212'),
(5, 'Plop', 'Test du DESC', 'ok', '2021-10-25 07:56:07', 'plop@fm.com', '25451346431'),
(6, 'Geralt deRiv', 'Hey !', 'Hi guys whatsup? i have some gold for you !', '2021-10-30 18:56:30', 'geralt@witcher.com', 'none'),
(7, 'rerzrez', 'fsddsfsdf', 'fdqffqsqsf', '2021-11-05 10:39:49', 'rzrezrez@test.com', 'fdfdsfd'),
(8, '3wa TEST', 'Ceci est un test', 'Bonjour Mr .', '2021-11-06 20:09:54', 'test@gamial.com', '+33154521');

-- --------------------------------------------------------

--
-- Table structure for table `donation_detail`
--

CREATE TABLE `donation_detail` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `total` float NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donation_detail`
--

INSERT INTO `donation_detail` (`id`, `date`, `total`, `user_id`) VALUES
(117, '2022-02-09 18:00:35', 10, 35),
(118, '2022-02-09 18:01:11', 10, 35),
(119, '2022-02-09 18:03:31', 105, 35),
(120, '2022-02-09 18:06:03', 105, 35),
(121, '2022-02-09 18:11:06', 105, 35),
(122, '2022-02-09 18:12:40', 105, 35),
(123, '2022-02-09 18:15:16', 30, 35),
(124, '2022-02-28 15:15:57', 30, 40),
(125, '2022-02-28 17:13:52', 100, 40);

-- --------------------------------------------------------

--
-- Table structure for table `donation_product`
--

CREATE TABLE `donation_product` (
  `id` int(11) NOT NULL,
  `donation_detail_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `products_id` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donation_product`
--

INSERT INTO `donation_product` (`id`, `donation_detail_id`, `quantity`, `products_id`, `price`) VALUES
(158, 117, 2, 1, 5),
(159, 118, 2, 1, 5),
(160, 119, 1, 1, 5),
(161, 119, 1, 2, 100),
(162, 120, 1, 1, 5),
(163, 120, 1, 2, 100),
(164, 121, 1, 1, 5),
(165, 121, 1, 2, 100),
(166, 122, 1, 1, 5),
(167, 122, 1, 2, 100),
(168, 123, 1, 3, 30),
(169, 124, 1, 3, 30),
(170, 125, 1, 2, 100);

-- --------------------------------------------------------

--
-- Table structure for table `payment_detail`
--

CREATE TABLE `payment_detail` (
  `id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `status` varchar(150) NOT NULL,
  `donation_detail_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `title`, `content`, `date`) VALUES
(28, 35, 'test', 'test', '2021-11-05 11:03:33'),
(30, 40, 'fdfd', 'fsfdsfds', '2021-11-05 11:06:35'),
(32, 40, 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, nemo omnis dolores magni culpa deleniti a adipisci eos fugit sunt.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, nemo omnis dolores magni culpa deleniti a adipisci eos fugit sunt.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, nemo omnis dolores magni culpa deleniti a adipisci eos fugit sunt.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, nemo omnis dolores magni culpa deleniti a adipisci eos fugit sunt.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, nemo omnis dolores magni culpa deleniti a adipisci eos fugit sunt.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, nemo omnis dolores magni culpa deleniti a adipisci eos fugit sunt.', '2021-11-12 10:46:09');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `price` decimal(11,0) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'Smile !', 'One smile can change everything !', '5', 'kids-smile'),
(2, 'Day Bed', 'Bed for parents', '100', 'Mothers-Day-Bed'),
(3, 'Chair', 'Chair for parents', '30', 'Mothers-Day-Chair');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `zipcode` int(10) NOT NULL,
  `country` varchar(50) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `isAuthor` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `mail`, `password`, `lastname`, `firstname`, `phone`, `address`, `city`, `zipcode`, `country`, `isAdmin`, `isAuthor`) VALUES
(35, 'roudy@admin.com', '$2y$10$GT/gfm1Hp6Vtdbq2Lmv5Zu9tLE1UlRorCslxwg5bvsncTHZDABrrS', 'CARCAR', 'MORGAN', '1254545', 'TEST TEST', 'TEST', 75008, 'FranceTEST', 0, 0),
(40, 'admin@admin.com', '$2y$10$q1kpiMknucZOb6NyoHCVsOLmCfm2jm9P3ObdXTxJtj6YRkAE4C.iy', 'Admin', 'Admin', '+33157454451', 'chez moi', 'PAV', 93320, 'Cafe', 1, 0),
(42, 'rudy.saksik@gmail.com', '$2y$10$OilK3EG2Ulb7zbaZNHQVP.VHtcho89aKyJGKTintFQO84rZ85nXnK', 'Saksik', 'Rudy', '+336123456', '25 av la bas', 'Paris', 75009, 'France', 0, 0),
(43, 'jp@cool.fr', '$2y$10$QzbNjNp6oyHSkjBrOeeNYudmLRUc2oYKpx/5/yKHCK9X2C2nxMR9G', 'DE LA VEGA', 'Jean Pierre', '0542124535', 'kfjslkfjdskfsk', 'bkldjvljdfsljf', 93120, 'France', 0, 0),
(45, 'sparrow@admin.com', '$2y$10$.wK4Mk/JlBXrP7Fqu6azvei1dkSyKg/9NBOIcbcG8aqabHfRJvXCu', 'Sparrow', 'Jack', '06124578754', '15 rue labas', 'Paris', 93120, 'France', 1, 0),
(46, 'alerb@test.com', '$2y$10$E6XEdbJgzDsUAwuXF11cZ./rp.VRbejiepuTUqHF1VzlXbGdUhode', 'Test', 'Albert', '06112454782', '25 test', 'Paris', 75001, 'France', 0, 0),
(47, 'test@test.com', '$2y$10$cSBszY1eXKc4cZfdyOsu/.G5LsSlJndqYK4w9r0pMIbUs1E9/nplK', 'TEST1', 'TEST1', '123456789', 'test', 'test', 75001, 'France', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation_detail`
--
ALTER TABLE `donation_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `donation_product`
--
ALTER TABLE `donation_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id` (`products_id`),
  ADD KEY `donation_detail_id` (`donation_detail_id`);

--
-- Indexes for table `payment_detail`
--
ALTER TABLE `payment_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donation_detail` (`donation_detail_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `donation_detail`
--
ALTER TABLE `donation_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `donation_product`
--
ALTER TABLE `donation_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `payment_detail`
--
ALTER TABLE `payment_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donation_detail`
--
ALTER TABLE `donation_detail`
  ADD CONSTRAINT `donation_detail_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `donation_product`
--
ALTER TABLE `donation_product`
  ADD CONSTRAINT `donation_product_ibfk_1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `donation_product_ibfk_2` FOREIGN KEY (`donation_detail_id`) REFERENCES `donation_detail` (`id`);

--
-- Constraints for table `payment_detail`
--
ALTER TABLE `payment_detail`
  ADD CONSTRAINT `payment_detail_ibfk_1` FOREIGN KEY (`donation_detail_id`) REFERENCES `donation_detail` (`id`),
  ADD CONSTRAINT `payment_detail_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
