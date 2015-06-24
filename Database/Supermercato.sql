-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mag 30, 2015 alle 12:35
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
-- Struttura della tabella `Supermercato`
--

CREATE TABLE IF NOT EXISTS `Supermercato` (
  `Ids` varchar(5) COLLATE armscii8_bin NOT NULL,
  `Nome` varchar(20) COLLATE armscii8_bin NOT NULL,
  `Via` varchar(30) COLLATE armscii8_bin NOT NULL,
  `Città` varchar(20) COLLATE armscii8_bin NOT NULL,
  `Civico` varchar(5) COLLATE armscii8_bin NOT NULL,
  `Logo` varchar(50) COLLATE armscii8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dump dei dati per la tabella `Supermercato`
--

INSERT INTO `Supermercato` (`Ids`, `Nome`, `Via`, `Città`, `Civico`, `Logo`) VALUES
('00001', 'Conad', 'Via Giuseppe Saragat', 'L''Aquila', '', NULL),
('00002', 'Tigre', 'Via Preturo', 'Coppito', '33', NULL),
('00003', 'In''s', 'Via Giuseppe Saragat', 'L''Aquila', '', NULL),
('00004', 'Eurospin', 'Via Mulino di Pile', 'L''Aquila', '64', NULL),
('00005', 'Di Meglio', 'Via Toscana', 'Teramo', '29', NULL),
('00006', 'Coop', 'Via Calabria', 'Roma', '59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Supermercato`
--
ALTER TABLE `Supermercato`
 ADD PRIMARY KEY (`Ids`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
