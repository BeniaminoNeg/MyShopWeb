-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Lug 14, 2015 alle 10:01
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
-- Struttura della tabella `UtenteRegistrato`
--

CREATE TABLE IF NOT EXISTS `UtenteRegistrato` (
  `Nome` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `Cognome` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Prodottiosservati` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `UtenteRegistrato`
--

INSERT INTO `UtenteRegistrato` (`Nome`, `Cognome`, `Password`, `Email`, `Prodottiosservati`) VALUES
('Beniamino', 'Negrini', '08061993', 'beniamino.negrini@gmail.com', 'P013,P020,P035'),
('Giovanni', 'Lezzi', '07031993', 'Figa', 'P001,P002,P003,P004,P005,P006,P007'),
('Gaetano', 'Fichera', '261293', 'gaetano.fichera93@gmail.com', 'P033,P032,P021'),
('Silvia', 'Montecchia', '070194', 'montecchsilvia@gmail.com', 'P003,P004'),
('Pasquale', 'Cafiero', 'abcdef', 'pascaf', 'P008');

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
