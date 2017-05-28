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


-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `10162970_apartments`
--

CREATE TABLE IF NOT EXISTS `10162970_apartments` (
  `id` smallint(16) NOT NULL AUTO_INCREMENT,
  `condoid` smallint(16) NOT NULL,
  `apartment` smallint(16) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `condoid` (`condoid`),
  KEY `userid` (`apartment`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Andmete tõmmistamine tabelile `10162970_apartments`
--

INSERT INTO `10162970_apartments` (`id`, `condoid`, `apartment`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `10162970_condos`
--

CREATE TABLE IF NOT EXISTS `10162970_condos` (
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
-- Andmete tõmmistamine tabelile `10162970_condos`
--

INSERT INTO `10162970_condos` (`id`, `name`, `numberofapartments`, `housenumber`, `street`, `city`, `county`) VALUES
(1, 'Sinilille', 18, 13, 'Jalaka', 'Tartu', 'Tartumaa'),
(2, 'Ülase', 30, 2, 'Vaba', 'Tartu', 'Tartumaa'),
(3, 'Kihulane', 8, 69, 'Vildi', 'Võru', 'Võrumaa');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `10162970_counters`
--

CREATE TABLE IF NOT EXISTS `10162970_counters` (
  `id` smallint(16) NOT NULL AUTO_INCREMENT,
  `counter` smallint(16) NOT NULL,
  `date` date NOT NULL,
  `apartmentid` smallint(16) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `apartmentid` (`apartmentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `10162970_users`
--

CREATE TABLE IF NOT EXISTS `10162970_users` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) COLLATE utf8_estonian_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_estonian_ci NOT NULL,
  `email` varchar(32) COLLATE utf8_estonian_ci NOT NULL,
  `apartment` smallint(16) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `apartment` (`apartment`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Andmete tõmmistamine tabelile `10162970_users`
--

INSERT INTO `10162970_users` (`id`, `username`, `password`, `email`, `apartment`) VALUES
(4, 'allarvendla@gmai', 'parool', 'allarvendla@gmail.com', 1);

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
  ADD CONSTRAINT `10162970_counters_ibfk_1` FOREIGN KEY (`apartmentid`) REFERENCES `10162970_apartments` (`id`);

--
-- Piirangud tabelile `10162970_users`
--
ALTER TABLE `10162970_users`
  ADD CONSTRAINT `10162970_users_ibfk_1` FOREIGN KEY (`apartment`) REFERENCES `10162970_apartments` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
