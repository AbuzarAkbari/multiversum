-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 27 mei 2018 om 20:45
-- Serverversie: 10.1.16-MariaDB
-- PHP-versie: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multiversum`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_price` decimal(2,0) NOT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `display` varchar(255) DEFAULT NULL,
  `resolution` varchar(255) DEFAULT NULL,
  `refresh_rate` varchar(255) DEFAULT NULL,
  `view` varchar(255) DEFAULT NULL,
  `functies` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `accessories` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`product_id`, `product_price`, `platform`, `display`, `resolution`, `refresh_rate`, `view`, `functies`, `color`, `accessories`, `image`, `product_name`) VALUES
(2, '99', 'ps4', 'nee', '1920x1080', '100hz', '100', ' Camera, Gyroscoop, Verstelbare lenzen', 'wit', 'Headset bedraad, Kabels', 'view/assets/images/HTC_Vive/main.jpeg', 'Oculus rift'),
(3, '99', 'pc', 'ja', '1920x1280', '100hz', '100', ' Camera, Gyroscoop, Verstelbare lenzen', 'zwart', 'Headset bedraad, Kabels', 'view/assets/images/Oculus_rift/main.jpeg', 'Oculus rift'),
(4, '99', 'ps4', 'nee', '1920x1080', '100hz', '100', ' Camera, Gyroscoop, Verstelbare lenzen', 'wit', 'Headset bedraad, Kabels', 'view/assets/images/HTC_Vive/main.jpeg', 'Oculus rift'),
(5, '99', 'pc', 'ja', '1920x1280', '100hz', '100', ' Camera, Gyroscoop, Verstelbare lenzen', 'zwart', 'Headset bedraad, Kabels', 'view/assets/images/Oculus_rift/main.jpeg', 'Oculus rift');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
