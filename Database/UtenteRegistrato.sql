-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Giu 30, 2015 alle 12:19
-- Versione del server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myshopdb`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `utenteregistrato`
--

CREATE TABLE IF NOT EXISTS `utenteregistrato` (
  `Email` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Password` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Nome` char(20) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Cognome` char(30) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Prodottiosservati` varchar(500) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabella degli utenti registrati';

--
-- Dump dei dati per la tabella `utenteregistrato`
--

INSERT INTO `utenteregistrato` (`Email`, `Password`, `Nome`, `Cognome`, `Prodottiosservati`) VALUES
('beniamino.negrini@gmail.com', 'Coppitanno993', 'Beniamino', 'Negrini', '001,002,015'),
('gaetano.fichera@gmail.com', '261293', 'Gaetano', 'Fichera', '033,032,021'),
('lordjhon16@gmail.com', '07031993', 'Giovanni', 'Lezzi', '001,002,003,004,005,006,007'),
('montecchsilvia@gmail.com', '070194', 'Silvia', 'Montecchia', '003,004');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `utenteregistrato`
--
ALTER TABLE `utenteregistrato`
 ADD PRIMARY KEY (`Email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
