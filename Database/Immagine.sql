-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Lug 09, 2015 alle 10:47
-- Versione del server: 5.6.24
-- Versione PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `MyShopDB`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Immagine`
--

CREATE TABLE IF NOT EXISTS `Immagine` (
  `Size` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Type` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Immagine_Piccola` mediumblob NOT NULL,
  `Immagine_Media` mediumblob NOT NULL,
  `Immagine_Grande` mediumblob NOT NULL,
  `Immagine_Originale` mediumblob NOT NULL,
  `Id` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Immagine`
--
ALTER TABLE `Immagine`
  ADD PRIMARY KEY (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
