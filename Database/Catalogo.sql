-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Lug 13, 2015 alle 17:59
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
-- Struttura della tabella `Catalogo`
--

CREATE TABLE IF NOT EXISTS `Catalogo` (
  `Id` varchar(4) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Nome` varchar(40) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Descrizione` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Prezzo` float NOT NULL,
  `Ids` varchar(6) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Categoria` char(20) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `Catalogo`
--

INSERT INTO `Catalogo` (`Id`, `Nome`, `Descrizione`, `Prezzo`, `Ids`, `Categoria`) VALUES
('P001', 'ARANCE NAVEL', 'Arance navel di origine controllata al kg', 13.45, 'S00001', 'Frutta'),
('P002', 'POMODORI PACHINO', 'Pomodori pachino al kg', 1.4, 'S00002', 'Ortaggi'),
('P003', 'BANANE', 'Banane siciliane al kg', 1.67, 'S00002', 'Frutta'),
('P004', 'INSALATA CAPPUCCIO', 'Insalata cappuccio al kg', 1.35, 'S00003', 'Ortaggi'),
('P005', 'CAMOSCIO D''ORO', 'Camoscio d''oro gr.500', 3.5, 'S00001', 'Formaggi'),
('P006', 'MOZZARELLE S.LUCIA', 'Mozzarelle santa lucia senza lattosio', 1.85, 'S00002', 'Formaggi'),
('P007', 'VINO SAN CRISPINO', 'Vino da tavola della cantina Ronco', 1.3, 'S00004', 'Vino'),
('P008', 'PASTA FARFALLE DE CECCO', 'Pasta farfalle de cecco gr.500\r\n', 0.9, 'S00003', 'Pasta'),
('P009', 'RISO SCOTTI AI FUNGHI PORCINI', 'Riso scotti ai funghi porcini 210g', 1.55, 'S00003', 'Pasta'),
('P010', 'RISO SCOTTI AGLI ASPARAGI', 'Riso scotti agli asparagi gr.210', 1.55, 'S00002', 'Pasta'),
('P011', 'RISO SCOTTI ZAFFERANO E GAMBERETTI', 'Riso scotti allo zafferano gr.210', 1.65, 'S00003', 'Pasta'),
('P012', 'RISO SCOTTI CLASSICO', 'Riso scotti  gr.250', 1.1, 'S00001', 'Pasta'),
('P013', 'PASTA SPAGHETTI DE CECCO', 'Pasta spaghetti marca de cecco gr.500', 0.98, 'S00002', 'Pasta'),
('P014', 'PASTA PENNETTE DE CECCO', 'Pasta pennette de cecco gr.500', 1.25, 'S00004', 'Pasta'),
('P015', 'PASTA PENNE DE CECCO', 'pasta penne de cecco gr.250', 0.99, 'S00003', 'Pasta'),
('P016', 'PASTA DE CECCO FUSILLI', 'Pasta de cecco fusilli gr.500', 1, 'S00003', 'Pasta'),
('P017', 'PASTA PENNE BARILLA', 'Pasta penne barilla gr.250', 1.15, 'S00001', 'Pasta'),
('P018', 'PASTA PENNETTE BARILLA', 'Pasta pennette barilla kg.1', 0.85, 'S00001', 'Pasta'),
('P019', 'PASTA PENNETTE INTEGRALI BARILLA', 'Pasta integrale barilla gr.500', 1.35, 'S00006', 'Pasta'),
('P020', 'VILLA GEMMA BIANCO', 'Vino Bianco dal gusto sofisticato', 9, 'S00004', 'Vino'),
('P021', 'HAMBURGER DI SOIA', 'Hamburger di soia 2x90g', 1.9, 'S00003', 'Carne'),
('P022', 'ACQUA SAN BENEDETTO 1/2L', 'Acqua san benedetto 6x0.5l', 0.9, 'S00002', 'Acqua'),
('P023', 'OLIVE NERE', 'Olive nere snocciolate Delizia', 0.89, 'S00006', 'Condimenti'),
('P024', 'MAIS BONDUELLE', 'Tris di mais in scatola ', 1.9, 'S00004', 'Mais'),
('P025', 'PATATINE FRITTE', 'Patatine fritte Buitoni 450g', 3.69, 'S00005', 'Patate'),
('P026', 'CEREALI NESQUIK', 'Cereali nesquik al cacao 500g', 2.69, 'S00003', 'Cereali'),
('P027', 'CEREALI KELLOGG''S', 'Cereali kellogg''s cacao e nocciole 325g', 2.25, 'S00006', 'Cereali'),
('P028', 'CEREALI KORN FLAKES KELLOG''S', 'Cereali al miele 325g', 1.89, 'S00005', 'Cereali'),
('P029', 'PHILADELPHIA PROSCIUTTO COTTO', '', 2.3, 'S00005', 'Formaggi'),
('P030', 'CARTA IGIENICA REGINA', '4 rotoli di carta igienica Rotoloni regina', 1.4, 'S00006', 'Bagno'),
('P031', 'CARTA IGIENICA ECO LUCART', 'Carta igieniza 100% ecologica', 1.55, 'S00006', 'Bagno'),
('P032', 'CARTA IGIENICA HELLO KITTY', '4 rotoli di carta igienica con stampe di hello kitty', 1.6, 'S00003', 'Bagno'),
('P033', 'CARTA IGIENICA FOXY', 'Carta igienica profumata 4 rotoli + 2 omaggio', 2, 'S00002', 'Bagno'),
('P034', 'CARTA IGIENICA REGINA CAMOMILLA', '4 rotoli a 3 veli ', 2.65, 'S00003', 'Bagno'),
('P035', 'GELATO CARTE D'' OR AFFOGATO AL CAFFE''', 'Gelato carte d''or affogato caffe'' per 2 persone 110kcal', 2.7, 'S00003', 'Gelati'),
('P036', 'GELATO ALGIDA AL LATTE', 'Gelato algida ''big milk'' x6', 2.35, 'S00004', 'Gelati'),
('P037', 'GELATO ALGIDA GUSTO PANNA', 'Vaschetta gelato per 2 persone al gusto panna', 2.15, 'S00006', 'Gelati'),
('P038', 'CORNETTI GELATO ALGIDA FRAGOLA', '6 Cornetti in scatola al gusto fragola', 0, 'S00006', 'Gelati'),
('P039', 'GELATO MAGNUM ALGIDA ''BOMBONIERA''', '6 mini gelati firmato algida al latte ricoperti di cioccolato fondente', 1.7, 'S00001', 'Gelati'),
('P040', 'MINI CORNETTI ALGIDA CACAO E CLASSICO', '12 Mini cornetti algida in scatola 6 al cacao e 6 classici', 2.1, 'S00005', 'Gelati'),
('P041', 'GELATI ALGIDA CREMINO', 'Gelato al latte ricoperto di cioccolato fondente in scatola 6 pezzi', 2.7, 'S00003', 'Gelati'),
('P042', 'CORNETTI ALGIDA CARAMELLO', '6 cornetti gelato algida al caramello, in scatola', 2.6, 'S00002', 'Gelati'),
('P043', 'GELATI MINI ALGIDA MAGNUM', '6 gelati formato mini in scatola gianduia e pistacchio', 2.5, 'S00006', 'Gelati'),
('P044', 'NUTELLA', 'Vasetto nutella 500g', 3.7, 'S00004', 'Cioccolata'),
('P045', 'NUTELLA FERRERO BREADY', 'Cialde di pane farcite di nutella. 8 pezzi', 2.1, 'S00005', 'Cioccolata'),
('P046', 'PESCE FILETTO DI PLATESSA PANATO', 'Filetto di platessa impanato con tempi di cottura 6/8 minuti. 300g', 4.15, 'S00003', 'Pesce'),
('P047', 'PESCE FILETTO DI PLATESSA', 'Filetto di platessa al naturale targato Findus,surgelato. 600g', 5.2, 'S00006', 'Pesce'),
('P048', 'PESCE FILETTO DI MERLUZZO GRATINATO', 'Filetto di merluzzo gratinato pomodoro e basilico 380g', 3.7, 'S00004', 'Pesce'),
('P049', 'PESCE BASTONCINI FINDUS', 'Bastoncini findus 18 pezzi 450g piu'' leggeri e croccanti', 2.3, 'S00002', 'Pesce'),
('P050', 'FILETTO DI TONNO ALL'' OLIO DI OLIVA', 'Filetto di tonno in scatola all''olio di oliva ''maruzzella''', 1.9, 'S00004', 'Pesce'),
('P051', 'AFFETTATO SALAME UNGHERESE LEVONI', 'Salame ungherese affettato', 1.85, 'S00005', 'Carne');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Catalogo`
--
ALTER TABLE `Catalogo`
  ADD PRIMARY KEY (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
