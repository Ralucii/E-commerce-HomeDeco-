-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3307
-- Timp de generare: dec. 08, 2022 la 02:33 PM
-- Versiune server: 10.6.5-MariaDB
-- Versiune PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `shopping`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `image`, `price`, `quantity`) VALUES
(10, 54, 'Cutting board marble-mango wood', 'img05.jpg', '49.90', 1),
(11, 54, 'Sandrine bowl', 'img03.jpg', '21', 1),
(16, 61, 'Nordic kitchen cup with saucer', 'img12.jpg', '19.95', 2),
(18, 61, 'Nordic kitchen butter dish with oak lid 10x15 cm', 'img10.jpg', '29.95', 1),
(19, 61, 'Bloomingville throw recycled cotton 130x160 cm', 'img04.jpg', '21.90', 1),
(20, 50, 'Nordic kitchen cup with saucer', 'img12.jpg', '19.95', 1),
(21, 50, 'Nordic kitchen napkin holder', 'img11.jpg', '39.95', 1),
(22, 50, 'Bloomingville skulpture 22 cm', 'img01.jpg', '54', 3),
(23, 50, 'Ernst storage jar with lid natur', 'img09.jpg', '20.90', 1),
(26, 63, 'Nordic kitchen cup with saucer', 'img12.jpg', '19.95', 1),
(28, 64, 'Sandrine bowl', 'img03.jpg', '21', 1),
(29, 64, 'Bloomingville skulpture 22 cm', 'img01.jpg', '54', 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(1, 'Bloomingville skulpture 22 cm', '54', 'img01.jpg'),
(2, 'Table lamp terracotta', '115', 'img02.jpg'),
(3, 'Sandrine bowl', '21', 'img03.jpg'),
(4, 'Bloomingville throw recycled cotton 130x160 cm', '21.90', 'img04.jpg'),
(5, 'Cutting board marble-mango wood', '49.90', 'img05.jpg'),
(6, 'Kendra grey mug', '12', 'img06.jpg'),
(7, 'Joy candle sticks', '17.40', 'img07.jpg'),
(8, 'Bottle Grinder spice mill 2-pack', '80', 'img08.jpg'),
(9, 'Ernst storage jar with lid natur', '20.90', 'img09.jpg'),
(10, 'Nordic kitchen butter dish with oak lid 10x15 cm', '29.95', 'img10.jpg'),
(11, 'Nordic kitchen napkin holder', '39.95', 'img11.jpg'),
(12, 'Nordic kitchen cup with saucer', '19.95', 'img12.jpg');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user_form`
--

DROP TABLE IF EXISTS `user_form`;
CREATE TABLE IF NOT EXISTS `user_form` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_pass` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `confirm_pass`) VALUES
(41, 'ralucutzabucutza', 'raluca@yahoo.ro', 'pass123', ''),
(42, 'valentin_regele', 'zinga_valentin@yahoo.ro', 'pass01234', ''),
(43, 'ramonadeac', 'ramy_ramo73@yahoo.ro', 'ramonica', ''),
(44, 'alice_ingeras', 'alicealbu@yahoo.ro', '202', ''),
(45, 'tamasan123', 'tamasan@yahoo.ro', 'raluca', 'raluca'),
(48, 'bobaru', 'bobi_malina@yahoo.ro', 'glamour', 'glamour'),
(50, 'ralucel', 'ralucel@yahoo.ro', '123', '123'),
(51, 'ralucoita', 'ralucoita@yahoo.ro', 'ralu', 'ralu'),
(53, 'ramona', 'ramy_ramo7@yahoo.ro', 'ramo', 'ramo'),
(57, 'aloha', 'hawaii@yahoo.ro', '12', '12'),
(58, 'irinuka', 'irina_vlad99@yahoo.ro', 'ina123', 'ina123'),
(59, 'serena', 'serena_contiu@yahoo.ro', 'economica', 'economica'),
(60, 'bobaru', 'andreea_malina@yahoo.ro', '1234', '1234'),
(61, 'ralucutza', 'raluk@yahoo.ro', '123', '123'),
(62, 'maxi', 'taxi@yahoo.ro', '123', '123'),
(63, 'raluca123', 'ralucatamasan@yahoo.ro', 'parola01', 'parola01'),
(64, 'gabitza', 'gabitza@gmail.com', 'gabi1', 'gabi1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
