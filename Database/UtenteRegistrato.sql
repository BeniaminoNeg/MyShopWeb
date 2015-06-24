-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Giu 24, 2015 alle 18:42
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
-- Struttura della tabella `UtenteRegistrato`
--

CREATE TABLE IF NOT EXISTS `UtenteRegistrato` (
  `Password` varchar(20) COLLATE armscii8_bin NOT NULL,
  `Email` varchar(60) COLLATE armscii8_bin NOT NULL DEFAULT '',
  `Nome` varchar(20) COLLATE armscii8_bin NOT NULL,
  `Cognome` varchar(20) COLLATE armscii8_bin NOT NULL,
  `Via` varchar(30) COLLATE armscii8_bin DEFAULT NULL,
  `Città` varchar(20) COLLATE armscii8_bin DEFAULT NULL,
  `NCivico` varchar(5) COLLATE armscii8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dump dei dati per la tabella `UtenteRegistrato`
--

INSERT INTO `UtenteRegistrato` (`Password`, `Email`, `Nome`, `Cognome`, `Via`, `Città`, `NCivico`) VALUES
('Coppitanno993', 'beniamino.negrni@gmail.com', 'Beniamino', 'Negrini', 'Via Caporciano', 'Coppito', '2'),
('261293', 'gaetano.fichera93@gmail.com', 'Gaetano', 'Fichera', 'Don Luigi Sturzo', 'Formia', '62'),
('07031993', 'lordjhon16@gmail.com', 'Giovanni', 'Lezzi', 'Largo Paolo Borsellino', 'Teramo', '3'),
('070194', 'montecchsilvia@gmail.com', 'Silvia', 'Montecchia', 'Calabria', 'Castellalto', '5');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `UtenteRegistrato`
--
ALTER TABLE `UtenteRegistrato`
  ADD PRIMARY KEY (`Email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
