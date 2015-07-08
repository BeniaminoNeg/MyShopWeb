-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Lug 08, 2015 alle 22:16
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
  `Nome` char(20) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Cognome` char(30) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Password` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Email` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Prodottiosservati` varchar(500) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `UtenteRegistrato`
--

INSERT INTO `UtenteRegistrato` (`Nome`, `Cognome`, `Password`, `Email`, `Prodottiosservati`) VALUES
('Beniamino', 'Negrini', 'Coppitanno993', 'beniamino.negrini@gmail.com', '001,002,015'),
('Gaetano', 'Fichera', '261293', 'gaetano.fichera93@gmail.com', '033,032,021'),
('Giovanni', 'Lezzi', '07031993', 'lordjhon16@gmail.com', '001,002,003,004,005,006,007'),
('Silvia', 'Montecchia', '070194', 'montecchsilvia@gmail.com', '003,004');

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
