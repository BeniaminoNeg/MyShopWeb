-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Giu 30, 2015 alle 11:31
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
  `Password` varchar(20) COLLATE armscii8_bin NOT NULL,
  `Email` varchar(60) COLLATE armscii8_bin NOT NULL DEFAULT '',
  `Nome` varchar(20) COLLATE armscii8_bin NOT NULL,
  `Cognome` varchar(20) COLLATE armscii8_bin NOT NULL,
  `prodottiosservati` varchar(1000) COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dump dei dati per la tabella `utenteregistrato`
--

INSERT INTO `utenteregistrato` (`Password`, `Email`, `Nome`, `Cognome`, `prodottiosservati`) VALUES
('Coppitanno993', 'beniamino.negrni@gmail.com', 'Beniamino', 'Negrini', ''),
('261293', 'gaetano.fichera93@gmail.com', 'Gaetano', 'Fichera', ''),
('07031993', 'lordjhon16@gmail.com', 'Giovanni', 'Lezzi', ''),
('070194', 'montecchsilvia@gmail.com', 'Silvia', 'Montecchia', '');

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
