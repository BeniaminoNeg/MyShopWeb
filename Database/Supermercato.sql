-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Lug 12, 2015 alle 16:30
-- Versione del server: 5.6.24
-- Versione PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_myshopp`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Supermercato`
--

CREATE TABLE IF NOT EXISTS `Supermercato` (
  `Ids` varchar(7) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Nome` varchar(20) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Via` varchar(30) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Citta` varchar(20) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Civico` varchar(5) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `Supermercato`
--

INSERT INTO `Supermercato` (`Ids`, `Nome`, `Via`, `Citta`, `Civico`) VALUES
('S00001', 'Conad', 'Via Giuseppe Saragat', 'L''Aquila', ''),
('S00002', 'Tigre', 'Via Preturo', 'Coppito', '33'),
('S00003', 'In''s', 'Via Giuseppe Saragat', 'L''Aquila', ''),
('S00004', 'Eurospin', 'Via Mulino di Pile', 'L''Aquila', '64'),
('S00005', 'Di Meglio', 'Via Toscana', 'Teramo', '29'),
('S00006', 'Coop', 'Via Calabria', 'Roma', '59');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Supermercato`
--
ALTER TABLE `Supermercato`
  ADD PRIMARY KEY (`Ids`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
