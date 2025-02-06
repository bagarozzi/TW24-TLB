-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Feb 06, 2025 alle 16:47
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `HarvestHub`
--

create database `HarvestHub`;
use `HarvestHub`;

--
-- Struttura della tabella `ADMIN`
--

CREATE TABLE `ADMIN` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `ADMIN`
--

INSERT INTO `ADMIN` (`username`, `password`) VALUES
('turbo', 'admin');

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `codProdotto` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `CATEGORIA_PRODOTTO`
--

CREATE TABLE `CATEGORIA_PRODOTTO` (
  `nome` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `CATEGORIA_PRODOTTO`
--

INSERT INTO `CATEGORIA_PRODOTTO` (`nome`) VALUES
('Cattle'),
('Chemicals'),
('Equipment'),
('Harvesters'),
('Hay and Forage'),
('Tractors');

-- --------------------------------------------------------

--
-- Struttura della tabella `NOTIFICA`
--

CREATE TABLE `NOTIFICA` (
  `id_notifica` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Titolo` varchar(30) NOT NULL,
  `Descrizione` varchar(255) NOT NULL,
  `letto` tinyint(1) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `riferimento` int(11) NOT NULL,
  `email` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `NOTIFICA`
--

INSERT INTO `NOTIFICA` (`id_notifica`, `Data`, `Titolo`, `Descrizione`, `letto`, `username`, `riferimento`, `email`) VALUES
(4, '2025-02-05', 'Ordine #5 piazzato', 'Un utente ha piazzato questo ordine.', 0, 'turbo', 5, NULL),
(5, '2025-02-05', 'L\'ordine 2 è stato spedito', 'L\'ordine è stato spedito', 1, NULL, 2, 'juturbo@gmail.com'),
(6, '2025-02-05', 'L\'ordine 5 è stato spedito', 'L\'ordine è stato spedito', 1, NULL, 5, 'juturbo@gmail.com'),
(7, '2025-02-05', 'L\'ordine 5 è stato consegnato', 'L\'ordine è stato consegnato correttamente', 1, NULL, 5, 'juturbo@gmail.com'),
(8, '2025-02-05', 'Ordine #6 confermato', 'Il tuo ordine è stato confermato.', 0, NULL, 6, 'juturbo@gmail.com'),
(9, '2025-02-05', 'Ordine #6 piazzato', 'Un utente ha piazzato questo ordine.', 0, 'turbo', 6, NULL),
(10, '2025-02-06', 'L\'ordine 2 è stato consegnato', 'L\'ordine è stato consegnato correttamente', 0, NULL, 2, 'juturbo@gmail.com'),
(11, '2025-02-06', 'L\'ordine 3 è stato spedito', 'L\'ordine è stato spedito', 0, NULL, 3, 'juturbo@gmail.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `ORDINE`
--

CREATE TABLE `ORDINE` (
  `riferimento` int(11) NOT NULL,
  `data` date NOT NULL,
  `email` varchar(64) NOT NULL,
  `stato` ENUM('confermato', 'spedito', 'consegnato') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `ORDINE`
--

INSERT INTO `ORDINE` (`riferimento`, `data`, `email`, `stato`) VALUES
(1, '2025-02-05', 'juturbo@gmail.com', 'confermato'),
(2, '2025-02-05', 'juturbo@gmail.com', 'consegnato'),
(3, '2025-02-05', 'juturbo@gmail.com', 'spedito'),
(4, '2025-02-05', 'juturbo@gmail.com', 'confermato'),
(5, '2025-02-05', 'juturbo@gmail.com', 'consegnato'),
(6, '2025-02-05', 'juturbo@gmail.com', 'confermato');

-- --------------------------------------------------------

--
-- Struttura della tabella `PRODOTTO`
--

CREATE TABLE `PRODOTTO` (
  `codProdotto` int(11) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `prezzo` FLOAT NOT NULL,
  `descrizione` varchar(100) NOT NULL,
  `immagine` varchar(100) NOT NULL,
  `disponibilita` int(11) NOT NULL,
  `App_nome` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `PRODOTTO`
--

INSERT INTO `PRODOTTO` (`codProdotto`, `nome`, `prezzo`, `descrizione`, `immagine`, `disponibilita`, `App_nome`) VALUES
(1, 'Total liquid Herbicide', '35', 'Total and liquid weedkiller suitable for all applications.', 'resources/products/antigrass.png', 3, 'Chemicals'),
(2, 'Class Lexion 7500', '300000', 'Harvester Lexion 7500. Always powerful.', 'resources/products/claas-lexion-7500.png', 2, 'Harvesters'),
(3, 'Class Xerion 12.650', '700000', 'Class Xerion 12, 650hp. Overcome everything.', 'resources/products/claas-xerion-12.650.png', 2, 'Tractors'),
(4, 'Class Jaguar 900', '50000', 'Hay harvester Class Jaguar 900. ', 'resources/products/class-jaguar900.png', 2, 'Hay and Forage'),
(5, 'Cow', '900', 'Your favourite cow!', 'resources/products/cow.png', 100, 'Cattle'),
(6, 'Fiat Agri 180/90', '30000', 'The legendary. The greatest of all time. The Fiat Agri 180/90.', 'resources/products/fa-18090.jpg', 2, 'Tractors'),
(7, 'Horse', '1600', 'Your favourite horse!', 'resources/products/horse.png', 100, 'Cattle'),
(8, 'John Deere 6M-180', '80000', 'Tractor John Deere 6M 180. Tame the beast.', 'resources/products/jd-6m180.png', 5, 'Tractors'),
(9, 'John Deere 5120 ML ', '40000', '5120ML, it\'s not the size, it\'s how you use it.', 'resources/products/jd-5120ml.png', 3, 'Tractors'),
(10, 'John Deere 9900i', '80000', 'The greatest hay and forage harvester, back in stock.', 'resources/products/jd-9900i.png', 3, 'Hay and Forage'),
(11, 'John Deere F310R', '4000', 'John Deere Mower F310R', 'resources/products/jd-falciaf310r.png', 4, 'Equipment'),
(12, 'John Deere S7-900', '350000', 'John Deere\'s second best. Harvesting made easy.', 'resources/products/jd-s7900.png', 3, 'Harvesters'),
(13, 'John Deere 1590', '5000', 'John Deere seeder 1590. A true masterpiece.', 'resources/products/jd-seeder1590.png', 4, 'Equipment'),
(14, 'Massey-Ferguson Baler 1843', '15000', 'The latest baler from Massey-Ferguson.', 'resources/products/mf-1842.jpg', 5, 'Equipment'),
(15, 'Massery-Ferguson TD', '15000', 'The best tedder in the game.', 'resources/products/mf-jpg.jpg', 3, 'Equipment'),
(16, 'New Holland CH10', '450000', 'The best you can have from New Holland 2025 line.', 'resources/products/nh-ch10.png', 2, 'Harvesters'),
(17, 'New Holland FR-920', '250000', 'Hay harvester, 910hp.', 'resources/products/nh-fr.png', 4, 'Hay and Forage'),
(18, 'Hydroponics nutrients', '30', 'Hydroponics nutrients, suitable for all greens.', 'resources/products/nutrients.png', 4, 'Chemicals'),
(19, 'Pig', '300', 'Your favourite pig!', 'resources/products/pig.png', 3, 'Cattle'),
(20, 'Dosatron Hydroponics Pump', '90', 'Hydroponics dosing pump. 100.000 hours.', 'resources/products/pompa-idroponica.jpg', 40, 'Chemicals'),
(21, 'Froggy Shoulder Pump', '40', 'Get wherever you want!', 'resources/products/zaino-diserbante.jpg', 15, 'Chemicals');

-- --------------------------------------------------------

--
-- Struttura della tabella `richiesta`
--

CREATE TABLE `richiesta` (
  `riferimento` int(11) NOT NULL,
  `codProdotto` int(11) NOT NULL,
  `quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `richiesta`
--

INSERT INTO `richiesta` (`riferimento`, `codProdotto`, `quantita`) VALUES
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 1),
(6, 1, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `UTENTE`
--

CREATE TABLE `UTENTE` (
  `email` varchar(64) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `cognome` varchar(64) NOT NULL,
  `dataNascita` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `UTENTE`
--

INSERT INTO `UTENTE` (`email`, `password`, `nome`, `cognome`, `dataNascita`) VALUES
('juturbo@gmail.com', 'ciao', 'Jacopo', 'Turchi', '2003-08-08');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `ADMIN`
--
ALTER TABLE `ADMIN`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `ID_ADMIN_IND` (`username`);

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`email`,`codProdotto`),
  ADD UNIQUE KEY `ID_carrello_IND` (`email`,`codProdotto`),
  ADD KEY `REF_carre_PRODO_IND` (`codProdotto`);

--
-- Indici per le tabelle `CATEGORIA_PRODOTTO`
--
ALTER TABLE `CATEGORIA_PRODOTTO`
  ADD PRIMARY KEY (`nome`),
  ADD UNIQUE KEY `ID_CATEGORIA_PRODOTTO_IND` (`nome`);

--
-- Indici per le tabelle `NOTIFICA`
--
ALTER TABLE `NOTIFICA`
  ADD PRIMARY KEY (`id_notifica`),
  ADD UNIQUE KEY `ID_NOTIFICA_IND` (`id_notifica`),
  ADD KEY `REF_NOTIF_ADMIN_IND` (`username`),
  ADD KEY `REF_NOTIF_ORDIN_IND` (`riferimento`),
  ADD KEY `REF_NOTIF_UTENT_IND` (`email`);

--
-- Indici per le tabelle `ORDINE`
--
ALTER TABLE `ORDINE`
  ADD PRIMARY KEY (`riferimento`),
  ADD UNIQUE KEY `ID_ORDINE_IND` (`riferimento`),
  ADD KEY `REF_ORDIN_UTENT_IND` (`email`);

--
-- Indici per le tabelle `PRODOTTO`
--
ALTER TABLE `PRODOTTO`
  ADD PRIMARY KEY (`codProdotto`),
  ADD UNIQUE KEY `ID_PRODOTTO_IND` (`codProdotto`),
  ADD KEY `REF_PRODO_CATEG_IND` (`App_nome`);

--
-- Indici per le tabelle `richiesta`
--
ALTER TABLE `richiesta`
  ADD PRIMARY KEY (`riferimento`,`codProdotto`),
  ADD UNIQUE KEY `ID_richiesta_IND` (`riferimento`,`codProdotto`),
  ADD KEY `REF_richi_PRODO_IND` (`codProdotto`);

--
-- Indici per le tabelle `UTENTE`
--
ALTER TABLE `UTENTE`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `ID_UTENTE_IND` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `NOTIFICA`
--
ALTER TABLE `NOTIFICA`
  MODIFY `id_notifica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `ORDINE`
--
ALTER TABLE `ORDINE`
  MODIFY `riferimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `PRODOTTO`
--
ALTER TABLE `PRODOTTO`
  MODIFY `codProdotto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `REF_carre_PRODO_FK` FOREIGN KEY (`codProdotto`) REFERENCES `prodotto` (`codProdotto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `REF_carre_UTENT` FOREIGN KEY (`email`) REFERENCES `utente` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `NOTIFICA`
--
ALTER TABLE `NOTIFICA`
  ADD CONSTRAINT `REF_NOTIF_ADMIN_FK` FOREIGN KEY (`username`) REFERENCES `admin` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `REF_NOTIF_ORDIN_FK` FOREIGN KEY (`riferimento`) REFERENCES `ordine` (`riferimento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `REF_NOTIF_UTENT_FK` FOREIGN KEY (`email`) REFERENCES `utente` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `ORDINE`
--
ALTER TABLE `ORDINE`
  ADD CONSTRAINT `REF_ORDIN_UTENT_FK` FOREIGN KEY (`email`) REFERENCES `utente` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `PRODOTTO`
--
ALTER TABLE `PRODOTTO`
  ADD CONSTRAINT `REF_PRODO_CATEG_FK` FOREIGN KEY (`App_nome`) REFERENCES `categoria_prodotto` (`nome`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limiti per la tabella `richiesta`
--
ALTER TABLE `richiesta`
  ADD CONSTRAINT `REF_richi_ORDIN` FOREIGN KEY (`riferimento`) REFERENCES `ordine` (`riferimento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `REF_richi_PRODO_FK` FOREIGN KEY (`codProdotto`) REFERENCES `prodotto` (`codProdotto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
