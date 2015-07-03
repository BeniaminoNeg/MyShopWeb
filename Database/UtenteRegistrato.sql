-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Lug 03, 2015 alle 19:30
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
  `Password` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Email` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Nome` char(20) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Cognome` char(30) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Prodottiosservati` varchar(500) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabella degli utenti registrati';

--
-- Dump dei dati per la tabella `UtenteRegistrato`
--

INSERT INTO `UtenteRegistrato` (`Password`, `Email`, `Nome`, `Cognome`, `Prodottiosservati`) VALUES
('Coppitanno993', 'beniamino.negrini@gmail.com', 'Beniamino', 'Negrini', '001,002,015'),
('261293', 'gaetano.fichera@gmail.com', 'Gaetano', 'Fichera', '033,032,021'),
('07031993', 'lordjhon16@gmail.com', 'Giovanni', 'Lezzi', '001,002,003,004,005,006,007'),
('070194', 'montecchsilvia@gmail.com', 'Silvia', 'Montecchia', '003,004');

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
