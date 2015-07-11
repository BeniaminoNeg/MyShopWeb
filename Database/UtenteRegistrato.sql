-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Lug 11, 2015 alle 10:49
-- Versione del server: 5.6.21
-- PHP Version: 5.6.3

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
('Beniamino', 'Negrini', 'Coppitanno993', 'beniamino.negrini@gmail.com', 'P001,P002,P015'),
('Gaetano', 'Fichera', '261293', 'gaetano.fichera93@gmail.com', 'P033,P032,P021'),
('Giovanni', 'Lezzi', '07031993', 'lordjhon16@gmail.com', 'P001,P002,P003,P004,P005,P006,P007'),
('Silvia', 'Montecchia', '070194', 'montecchsilvia@gmail.com', 'P003,P004');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `UtenteRegistrato`
--
ALTER TABLE `UtenteRegistrato`
 ADD PRIMARY KEY (`Email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
