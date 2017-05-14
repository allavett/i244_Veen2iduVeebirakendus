-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Loomise aeg: Mai 08, 2017 kell 11:06 PM
-- Serveri versioon: 10.1.21-MariaDB
-- PHP versioon: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Andmebaas: `water_counter`
--
CREATE DATABASE IF NOT EXISTS `water_counter` DEFAULT CHARACTER SET utf8 COLLATE utf8_estonian_ci;
USE `water_counter`;

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `apartments`
--

CREATE TABLE IF NOT EXISTS `apartments` (
  `id` smallint(16) NOT NULL AUTO_INCREMENT,
  `condoid` smallint(16) NOT NULL,
  `apartment` smallint(16) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `condoid` (`condoid`),
  KEY `userid` (`apartment`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Andmete tõmmistamine tabelile `apartments`
--

INSERT INTO `apartments` (`id`, `condoid`, `apartment`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `condos`
--

CREATE TABLE IF NOT EXISTS `condos` (
  `id` smallint(16) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_estonian_ci NOT NULL,
  `numberofapartments` smallint(3) NOT NULL,
  `housenumber` smallint(4) NOT NULL,
  `street` varchar(16) COLLATE utf8_estonian_ci NOT NULL,
  `city` varchar(32) COLLATE utf8_estonian_ci NOT NULL,
  `county` varchar(32) COLLATE utf8_estonian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Andmete tõmmistamine tabelile `condos`
--

INSERT INTO `condos` (`id`, `name`, `numberofapartments`, `housenumber`, `street`, `city`, `county`) VALUES
(1, 'Sinilille', 18, 13, 'Jalaka', 'Tartu', 'Tartumaa'),
(2, 'Ülase', 30, 2, 'Vaba', 'Tartu', 'Tartumaa'),
(3, 'Kihulane', 8, 69, 'Vildi', 'Võru', 'Võrumaa');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `counters`
--

CREATE TABLE IF NOT EXISTS `counters` (
  `id` smallint(16) NOT NULL AUTO_INCREMENT,
  `counter` smallint(16) NOT NULL,
  `date` date NOT NULL,
  `apartmentid` smallint(16) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `apartmentid` (`apartmentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) COLLATE utf8_estonian_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_estonian_ci NOT NULL,
  `email` varchar(32) COLLATE utf8_estonian_ci NOT NULL,
  `apartment` smallint(16) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `apartment` (`apartment`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Andmete tõmmistamine tabelile `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `apartment`) VALUES
(4, 'allarvendla@gmai', 'parool', 'allarvendla@gmail.com', 1);

--
-- Tõmmistatud tabelite piirangud
--

--
-- Piirangud tabelile `apartments`
--
ALTER TABLE `apartments`
  ADD CONSTRAINT `apartments_ibfk_1` FOREIGN KEY (`condoid`) REFERENCES `condos` (`id`);

--
-- Piirangud tabelile `counters`
--
ALTER TABLE `counters`
  ADD CONSTRAINT `counters_ibfk_1` FOREIGN KEY (`apartmentid`) REFERENCES `apartments` (`id`);

--
-- Piirangud tabelile `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`apartment`) REFERENCES `apartments` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
