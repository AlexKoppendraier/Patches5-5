-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 19 nov 2017 om 23:33
-- Serverversie: 10.1.26-MariaDB
-- PHP-versie: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin`
--

CREATE TABLE `admin` (
  `admin_naam` varchar(43) NOT NULL,
  `admin_email` varchar(43) NOT NULL,
  `admin_password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `dikte` varchar(10) NOT NULL,
  `product_name` varchar(23) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `prodcuct_prijs` double NOT NULL,
  `kleur` varchar(10) NOT NULL,
  `formaat` varchar(10) NOT NULL,
  `vorm` varchar(13) NOT NULL,
  `materiaal` varchar(13) NOT NULL,
  `thema` varchar(13) NOT NULL,
  `views` int(11) NOT NULL,
  `image` LONGBLOB NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`dikte`, `product_name`, `Product_id`, `prodcuct_prijs`, `kleur`, `formaat`, `vorm`, `materiaal`, `thema`, `views`) VALUES
('12x34x12', 'eerste patch', 1, 12.43, 'groen', '34x21', 'ster', 'katoen', 'sport', 1),
('12x4x10', 'tweede patch', 2, 12.5, 'blauw', '12x4', 'rond', 'wol', 'reis', 5),
('123x34', '3rde patch', 3, 4, 'goud', '34x69', 'ster', 'ijzer', 'SPORT', 8),
('12X34', '4DE PATCH', 4, 6, 'groen', '23x398', 'cirkel', 'wol', 'games', 3),
('1232x23', 'over9000 patch', 5, 12.1, 'rood', '12x243', 'rond', 'metaal', 'sport', 2),
('23x32', 'Kekpatch', 6, 5, 'rood', '12x32', 'vierkant', 'Katoen', 'sport', 9),
('12x12', 'WoW Patch', 7, 12, 'paars', '12x32', 'rond', 'Katoen', 'Gaming', 3),
('76x45', 'Snek', 8, 4.2, 'geel', '54x12', 'rond', 'Katoen', 'dieren', 7),
('43x34', 'Troll', 9, 7.12, 'groen', '43x9', 'driehoek', 'Katoen', 'dieren', 6),
('32x12', 'League', 10, 4.78, 'blauw', '32x54', 'rechthoek', 'Wol', 'Gaming', 45),
('32x54', 'RS', 11, 6.89, 'oranje', '32x5', 'rond', 'Katoen', 'Gaming', 23),
('23x1', 'Garen', 12, 4.66, 'blauw', '32x5', 'ster', 'katoen', 'sport', 32),
('23x9', 'Soraka', 13, 3.9, 'groen', '43x09', 'rond', 'katoen', 'gaming', 3),
('32x998', 'piraat', 14, 3.05, 'oranje', '32x8', 'rond', 'wol', 'middeleeuwen', 32),
('23x9', 'walvis', 15, 6.9, 'blauw', '32x8', 'rond', 'katoen', 'dieren', 3),
('23x89', 'vuurbal', 16, 55.9, 'rood', '23x8', 'vierkant', 'katoen', 'natuur', 3);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_password`) USING HASH;

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `Product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
