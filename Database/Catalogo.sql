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
-- Struttura della tabella `Catalogo`
--

CREATE TABLE IF NOT EXISTS `Catalogo` (
  `Id` varchar(4) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Nome` varchar(40) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Descrizione` varchar(1000) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Prezzo` float NOT NULL,
  `Ids` varchar(5) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Categoria` char(20) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `Catalogo`
--

INSERT INTO `Catalogo` (`Id`, `Nome`, `Descrizione`, `Prezzo`, `Ids`, `Categoria`) VALUES
('001', 'Arance Navel', 'Arance navel di origine controllata al kg', 13.45, '00001', 'Frutta'),
('002', 'Pomodori pachino', 'Pomodori pachino al kg', 1.4, '00002', 'Ortaggi'),
('003', 'Banane', 'Banane siciliane al kg', 1.67, '00002', 'Frutta'),
('004', 'Insalata cappuccio', 'Insalata cappuccio al kg', 1.35, '00003', 'Ortaggi'),
('005', 'Camoscio d''oro', 'Camoscio d''oro gr.500', 3.5, '00001', 'Formaggi'),
('006', 'Mozzarelle S.Lucia', 'Mozzarelle santa lucia senza lattosio', 1.85, '00002', 'Formaggi'),
('007', 'Vino San Crispino', 'Vino da tavola della cantina Ronco', 1.3, '00004', 'Vino'),
('008', 'Pasta farfalle De cecco', 'Pasta farfalle de cecco gr.500\r\n', 0.9, '00003', 'Pasta'),
('009', 'Riso Scotti ai funghi porcini', 'Riso scotti ai funghi porcini 210g', 1.55, '00003', 'Pasta'),
('010', 'Riso scotti agli asparagi', 'Riso scotti agli asparagi gr.210', 1.55, '00002', 'Pasta'),
('011', 'Riso scotti zafferano e gamberetti', 'Riso scotti allo zafferano gr.210', 1.65, '00003', 'Pasta'),
('012', 'Riso scotti classico', 'Riso scotti  gr.250', 1.1, '00001', 'Pasta'),
('013', 'Pasta spaghetti de cecco', 'Pasta spaghetti marca de cecco gr.500', 0.98, '00002', 'Pasta'),
('014', 'Pasta pennette de cecco', 'Pasta pennette de cecco gr.500', 1.25, '00004', 'Pasta'),
('015', 'Pasta penne de cecco', 'pasta penne de cecco gr.250', 0.99, '00003', 'Pasta'),
('016', 'Pasta de cecco fusilli', 'Pasta de cecco fusilli gr.500', 1, '00003', 'Pasta'),
('017', 'Pasta penne Barilla', 'Pasta penne barilla gr.250', 1.15, '00001', 'Pasta'),
('018', 'Pasta pennette barilla', 'Pasta pennette barilla kg.1', 0.85, '00001', 'Pasta'),
('019', 'Pasta pennette integrali barilla', 'Pasta integrale barilla gr.500', 1.35, '00006', 'Pasta'),
('020', 'Villa gemma bianco', 'Vino Bianco dal gusto sofisticato', 9, '00004', 'Vino'),
('021', 'Hamburger di soia', 'Hamburger di soia 2x90g', 1.9, '00003', 'Carne'),
('022', 'Acqua san benedetto 1/2L', 'Acqua san benedetto 6x0.5l', 0.9, '00002', 'Acqua'),
('023', 'Olive nere ', 'Olive nere snocciolate Delizia', 0.89, '00006', 'Condimenti'),
('024', 'Mais Bonduelle', 'Tris di mais in scatola ', 1.9, '00004', 'Mais'),
('025', 'Patatine fritte ', 'Patatine fritte Buitoni 450g', 3.69, '00005', 'Patate'),
('026', 'Cereali Nesquik ', 'Cereali nesquik al cacao 500g', 2.69, '00003', 'Cereali'),
('027', 'Cereali Kellog''s', 'Cereali kellogg''s cacao e nocciole 325g', 2.25, '00006', 'Cereali'),
('028', 'Cereali Corn Flakes Kellogg''s', 'Cereali al miele 325g', 1.89, '00005', 'Cereali'),
('029', 'Philadelphia prosciutto cotto', '', 2.3, '00005', 'Formaggi'),
('030', 'Carta Igienica Regina', '4 rotoli di carta igienica Rotoloni regina', 1.4, '00006', 'Bagno'),
('031', 'Carta igienica Eco Lucart', 'Carta igieniza 100% ecologica', 1.55, '00006', 'Bagno'),
('032', 'Carta igienica Hello Kitty', '4 rotoli di carta igienica con stampe di hello kitty', 1.6, '00003', 'Bagno'),
('033', 'Carta igienica Foxy ', 'Carta igienica profumata 4 rotoli + 2 omaggio', 2, '00002', 'Bagno'),
('034', 'Carta igienica Regina camomilla', '4 rotoli a 3 veli ', 2.65, '00003', 'Bagno'),
('035', 'Gelato Carte d''or affogato caffe''', 'Gelato carte d''or affogato caffe'' per 2 persone 110kcal', 2.7, '00003', 'Gelati'),
('036', 'Gelato algida al latte', 'Gelato algida ''big milk'' x6', 2.35, '00004', 'Gelati'),
('037', 'Gelato algida gusto panna', 'Vaschetta gelato per 2 persone al gusto panna', 2.15, '00006', 'Gelati'),
('038', 'Cornetti gelato algida Fragola', '6 Cornetti in scatola al gusto fragola', 2.9, '00006', 'Gelati'),
('039', 'Gelato algida magnum ''bomboniera''', '6 mini gelati firmato algida al latte ricoperti di cioccolato fondente', 1.7, '00001', 'Gelati'),
('040', 'Mini cornetti algida cacao e classico', '12 Mini cornetti algida in scatola 6 al cacao e 6 classici', 2.1, '00005', 'Gelati'),
('041', 'Gelati algida Cremino', 'Gelato al latte ricoperto di cioccolato fondente in scatola 6 pezzi', 2.7, '00003', 'Gelati'),
('042', 'Cornetti algida caramello', '6 cornetti gelato algida al caramello, in scatola', 2.6, '00002', 'Gelati'),
('043', 'Gelati mini algida magnum', '6 gelati formato mini in scatola gianduia e pistacchio', 2.5, '00006', 'Gelati'),
('044', 'Nutella', 'Vasetto nutella 500g', 3.7, '00004', 'Cioccolata'),
('045', 'Nutella ferrero bready', 'Cialde di pane farcite di nutella. 8 pezzi', 2.1, '00005', 'Cioccolata'),
('046', 'Pesce Filetto di platessa panato', 'Filetto di platessa impanato con tempi di cottura 6/8 minuti. 300g', 4.15, '00003', 'Pesce'),
('047', 'Pesce Filetto di platessa ', 'Filetto di platessa al naturale targato Findus,surgelato. 600g', 5.2, '00006', 'Pesce'),
('048', 'Pesce filetto di merluzzo gratinato', 'Filetto di merluzzo gratinato pomodoro e basilico 380g', 3.7, '00004', 'Pesce'),
('049', 'Pesce Bastoncini findus', 'Bastoncini findus 18 pezzi 450g piu'' leggeri e croccanti', 2.3, '00002', 'Pesce'),
('050', 'Filetto di tonno all''olio di oliva', 'Filetto di tonno in scatola all''olio di oliva ''maruzzella''', 1.9, '00004', 'Pesce'),
('051', 'Affettato Salame ungherese Levoni', 'Salame ungherese affettato', 1.85, '00005', 'Carne');

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
