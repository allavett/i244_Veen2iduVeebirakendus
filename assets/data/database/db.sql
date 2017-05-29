-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Loomise aeg: Mai 30, 2017 kell 01:31 AM
-- Serveri versioon: 10.1.21-MariaDB
-- PHP versioon: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Andmebaas: `test`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `10162970_apartments`
--

CREATE TABLE `10162970_apartments` (
  `id` smallint(16) NOT NULL,
  `condoid` smallint(16) NOT NULL,
  `apartment` smallint(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Andmete tõmmistamine tabelile `10162970_apartments`
--

INSERT INTO `10162970_apartments` (`id`, `condoid`, `apartment`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `10162970_condos`
--

CREATE TABLE `10162970_condos` (
  `id` smallint(16) NOT NULL,
  `name` varchar(32) COLLATE utf8_estonian_ci NOT NULL,
  `numberofapartments` smallint(3) NOT NULL,
  `housenumber` smallint(4) NOT NULL,
  `street` varchar(16) COLLATE utf8_estonian_ci NOT NULL,
  `city` varchar(32) COLLATE utf8_estonian_ci NOT NULL,
  `county` varchar(32) COLLATE utf8_estonian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Andmete tõmmistamine tabelile `10162970_condos`
--

INSERT INTO `10162970_condos` (`id`, `name`, `numberofapartments`, `housenumber`, `street`, `city`, `county`) VALUES
(1, 'Sinilille', 18, 13, 'Jalaka', 'Tartu', 'Tartumaa'),
(2, 'Ülase', 30, 2, 'Vaba', 'Tartu', 'Tartumaa'),
(3, 'Kihulane', 8, 69, 'Vildi', 'Võru', 'Võrumaa'),
(4, 'Värvuke', 75, 87, 'Kulla', 'Viljandi', 'Viljandimaa');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `10162970_counters`
--

CREATE TABLE `10162970_counters` (
  `id` smallint(16) NOT NULL,
  `counter` smallint(16) NOT NULL,
  `date` date NOT NULL,
  `userid` smallint(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Andmete tõmmistamine tabelile `10162970_counters`
--

INSERT INTO `10162970_counters` (`id`, `counter`, `date`, `userid`) VALUES
(1, 1, '2017-05-30', 18),
(2, 2, '2017-05-30', 18),
(3, 3, '2017-05-30', 18),
(4, 4, '2017-05-30', 18),
(5, 5, '2017-05-30', 18),
(6, 6, '2017-05-30', 18),
(7, 1, '0000-00-00', 18),
(8, 1, '2017-05-30', 18),
(9, 5, '2017-05-30', 18),
(10, 4, '2017-05-30', 18),
(11, 1, '2017-05-30', 18),
(12, 1, '2017-05-30', 18),
(13, 1, '2017-05-30', 18),
(14, 4, '2017-05-30', 18),
(15, 5, '2017-05-30', 16);

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `10162970_users`
--

CREATE TABLE `10162970_users` (
  `id` smallint(16) NOT NULL,
  `username` varchar(16) COLLATE utf8_estonian_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_estonian_ci NOT NULL,
  `email` varchar(32) COLLATE utf8_estonian_ci NOT NULL,
  `apartment` smallint(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Andmete tõmmistamine tabelile `10162970_users`
--

INSERT INTO `10162970_users` (`id`, `username`, `password`, `email`, `apartment`) VALUES
(16, 'allarvendla', '$2y$10$IzWuXhZTUr5ML0KJE4nzeetEZ0W3o.f0Rhg/9JwsZJ5jM3Ely1kAS', 'allarvendla@gmail.com', 1),
(17, 'allarvendla1', '$2y$10$tLK02cFSuuGwhelJKn0nSurILWecsTxMsehiwuipFSO6GegE17dvy', 'allarvendla@gmail.com', 1),
(18, 'allarvendla2', '$2y$10$MZ5LPGhPFi4bJMZ9zGSMdesvx3L8iSUzul3QrAgg3PP9BhgjMKE3e', 'allarvendla@gmail.com', 1);

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `10162970_apartments`
--
ALTER TABLE `10162970_apartments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `condoid` (`condoid`),
  ADD KEY `userid` (`apartment`);

--
-- Indeksid tabelile `10162970_condos`
--
ALTER TABLE `10162970_condos`
  ADD PRIMARY KEY (`id`);

--
-- Indeksid tabelile `10162970_counters`
--
ALTER TABLE `10162970_counters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apartmentid` (`userid`);

--
-- Indeksid tabelile `10162970_users`
--
ALTER TABLE `10162970_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apartment` (`apartment`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `10162970_apartments`
--
ALTER TABLE `10162970_apartments`
  MODIFY `id` smallint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT tabelile `10162970_condos`
--
ALTER TABLE `10162970_condos`
  MODIFY `id` smallint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT tabelile `10162970_counters`
--
ALTER TABLE `10162970_counters`
  MODIFY `id` smallint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT tabelile `10162970_users`
--
ALTER TABLE `10162970_users`
  MODIFY `id` smallint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Tõmmistatud tabelite piirangud
--

--
-- Piirangud tabelile `10162970_apartments`
--
ALTER TABLE `10162970_apartments`
  ADD CONSTRAINT `10162970_apartments_ibfk_1` FOREIGN KEY (`condoid`) REFERENCES `10162970_condos` (`id`);

--
-- Piirangud tabelile `10162970_counters`
--
ALTER TABLE `10162970_counters`
  ADD CONSTRAINT `userID` FOREIGN KEY (`userid`) REFERENCES `10162970_users` (`id`);

--
-- Piirangud tabelile `10162970_users`
--
ALTER TABLE `10162970_users`
  ADD CONSTRAINT `10162970_users_ibfk_1` FOREIGN KEY (`apartment`) REFERENCES `10162970_apartments` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
