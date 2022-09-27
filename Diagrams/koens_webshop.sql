-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 27 sep 2022 om 08:57
-- Serverversie: 10.4.25-MariaDB
-- PHP-versie: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koens_webshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(60) NOT NULL,
  `filename` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `filename`) VALUES
(1, 'Stussy Beanie', 'Stussy Big Stock Cuff Beanie', '€44.95', '\r\n./Images/stussyhat.png'),
(2, 'Nike Wool Cap', 'Nike Sportswear Heritage 86 Wool Cap', '€29.99', './Images/nikehat.png'),
(3, 'Tired Cap', 'Tired Oval Logo Two Tone Cap', '€54.95', './Images/tiredhat.png'),
(4, 'Cash Only Cap', 'Cash Only College 6 Panel Cap', '€44.95', './Images/cashhat.png'),
(5, 'Polar Cap', 'Polar Denim Cap', '€49.95', './Images/polarhat.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(14, 'rudy', 'rudy@rudy.nl', '$2y$10$kVqegHbm./Bk2z1m9ByFZOKVnVK4OgQ1U5UTSYtnjlbeBCoQnCqum'),
(15, 'pietje', 'pietje@piet.nl', '$2y$10$DHPVUMczj75pFIlGvwq91ebrEMA/Y00QTVqX7NPVgnz5XPzyr.zKO'),
(16, 'piet', 'piet@piet.nl', '$2y$10$lGtVMSGiEnOTcIZvZ.g6w.QDk4sYAkKdPWvVvQDv8/UjZXW35.lUe'),
(17, 'bert', 'bert@bert.nl', '$2y$10$AzA3FP1rn2FfRP3S7AD5zOWX2PUiA2x/P/XiZ3rUbOoIImrjueJOy'),
(18, 'klaas', 'klaas@klaas.nl', '$2y$10$n/1vZjnmzyQxCVvfn9vfQuTYSy8WmNc4JR2s85IVUbkT01Cf9rjzu');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
