-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Feb 02, 2025 alle 19:46
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
  `nome` varchar(32) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `lista_desideri`
--

CREATE TABLE `lista_desideri` (
  `codProdotto` int(11) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `username` varchar(20) NULL,
  `riferimento` int(11) NOT NULL,
  `email` varchar(64) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Struttura della tabella `PRODOTTO`
--

CREATE TABLE `PRODOTTO` (
  `codProdotto` int(11) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `prezzo` varchar(16) NOT NULL,
  `descrizione` varchar(100) NOT NULL,
  `immagine` varchar(64) NOT NULL,
  `disponibilita` int(11) NOT NULL,
  `App_nome` varchar(32) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `recensione`
--

CREATE TABLE `recensione` (
  `codProdotto` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `stelle` int(11) NOT NULL,
  `commento` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `richiesta`
--

CREATE TABLE `richiesta` (
  `riferimento` int(11) NOT NULL,
  `codProdotto` int(11) NOT NULL,
  `quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indici per le tabelle `lista_desideri`
--
ALTER TABLE `lista_desideri`
  ADD PRIMARY KEY (`email`,`codProdotto`),
  ADD UNIQUE KEY `ID_lista_desideri_IND` (`email`,`codProdotto`),
  ADD KEY `REF_lista_PRODO_IND` (`codProdotto`);

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
-- Indici per le tabelle `recensione`
--
ALTER TABLE `recensione`
  ADD PRIMARY KEY (`codProdotto`,`email`),
  ADD UNIQUE KEY `ID_recensione_IND` (`codProdotto`,`email`),
  ADD KEY `REF_recen_UTENT_IND` (`email`);

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
  MODIFY `id_notifica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `ORDINE`
--
ALTER TABLE `ORDINE`
  MODIFY `riferimento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `PRODOTTO`
--
ALTER TABLE `PRODOTTO`
  MODIFY `codProdotto` int(11) NOT NULL AUTO_INCREMENT;

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
-- Limiti per la tabella `lista_desideri`
--
ALTER TABLE `lista_desideri`
  ADD CONSTRAINT `REF_lista_PRODO_FK` FOREIGN KEY (`codProdotto`) REFERENCES `prodotto` (`codProdotto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `REF_lista_UTENT` FOREIGN KEY (`email`) REFERENCES `utente` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Limiti per la tabella `recensione`
--
ALTER TABLE `recensione`
  ADD CONSTRAINT `REF_recen_PRODO` FOREIGN KEY (`codProdotto`) REFERENCES `prodotto` (`codProdotto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `REF_recen_UTENT_FK` FOREIGN KEY (`email`) REFERENCES `utente` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

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
