-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Gen 29, 2025 alle 17:57
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

-- --------------------------------------------------------

--
-- Struttura della tabella `avviso_disponibilita`
--

CREATE TABLE `avviso_disponibilita` (
  `email` varchar(64) NOT NULL,
  `riferimento` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `BUONO`
--

CREATE TABLE `BUONO` (
  `punti` decimal(1,0) NOT NULL,
  `importo` decimal(1,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `email` varchar(64) NOT NULL,
  `riferimento` varchar(32) NOT NULL,
  `quantita` decimal(1,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `CATEGORIA_PRODOTTO`
--

CREATE TABLE `CATEGORIA_PRODOTTO` (
  `nome` varchar(32) NOT NULL,
  `descrizione` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `etichetta`
--

CREATE TABLE `etichetta` (
  `codProdotto` decimal(1,0) NOT NULL,
  `nome` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `INDIRIZZO`
--

CREATE TABLE `INDIRIZZO` (
  `email` varchar(64) NOT NULL,
  `alias` varchar(64) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `cognome` varchar(64) NOT NULL,
  `indirizzo` varchar(64) NOT NULL,
  `numeroCivico` varchar(8) DEFAULT NULL,
  `codicePostale` char(5) NOT NULL,
  `citta` varchar(64) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `azienda` varchar(64) DEFAULT NULL,
  `emailPEC` varchar(64) NOT NULL,
  `SDI` varchar(64) NOT NULL,
  `numIVA` varchar(16) NOT NULL,
  `codProvincia` char(2) NOT NULL,
  `codNazione` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `lista_desideri`
--

CREATE TABLE `lista_desideri` (
  `email` varchar(64) NOT NULL,
  `riferimento` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `METODO_PAGAMENTO`
--

CREATE TABLE `METODO_PAGAMENTO` (
  `codice` decimal(1,0) NOT NULL,
  `descrizione` varchar(256) NOT NULL,
  `costo` decimal(1,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `METODO_SPEDIZIONE`
--

CREATE TABLE `METODO_SPEDIZIONE` (
  `codice` decimal(1,0) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `descrizione` varchar(256) NOT NULL,
  `costo` decimal(1,0) DEFAULT NULL,
  `immagine` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `NAZIONE`
--

CREATE TABLE `NAZIONE` (
  `codNazione` char(3) NOT NULL,
  `nome` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `offerta`
--

CREATE TABLE `offerta` (
  `codProdotto` decimal(1,0) NOT NULL,
  `codPromozione` decimal(1,0) NOT NULL,
  `percSconto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `ORDINE`
--

CREATE TABLE `ORDINE` (
  `riferimento` decimal(1,0) NOT NULL,
  `data` date NOT NULL,
  `tracking` varchar(64) DEFAULT NULL,
  `pun_data` date DEFAULT NULL,
  `pun_numPunti` decimal(1,0) DEFAULT NULL,
  `pun_stato` varchar(64) DEFAULT NULL,
  `not_data` date DEFAULT NULL,
  `not_importo` decimal(1,0) DEFAULT NULL,
  `not_stato` varchar(64) DEFAULT NULL,
  `codice` decimal(1,0) NOT NULL,
  `Pag_codice` decimal(1,0) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `alias` varchar(64) DEFAULT NULL,
  `Ese_email` varchar(64) NOT NULL,
  `Con_email` varchar(64) NOT NULL,
  `Con_alias` varchar(64) NOT NULL,
  `nome` varchar(64) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Struttura della tabella `PRODOTTO`
--

CREATE TABLE `PRODOTTO` (
  `codProdotto` decimal(1,0) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `prezzo` float NOT NULL,
  `descrizione` varchar(5000) NOT NULL,
  `peso` float DEFAULT NULL,
  `lunghezza` float DEFAULT NULL,
  `App_nome` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `PROMOZIONE`
--

CREATE TABLE `PROMOZIONE` (
  `codPromozione` decimal(1,0) NOT NULL,
  `dataOraInizio` date NOT NULL,
  `dataOraFine` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `PROVINCIA`
--

CREATE TABLE `PROVINCIA` (
  `codProvincia` char(2) NOT NULL,
  `nome` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `recensione`
--

CREATE TABLE `recensione` (
  `email` varchar(64) NOT NULL,
  `riferimento` varchar(32) NOT NULL,
  `positivo` char(1) NOT NULL,
  `commento` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `richiesta`
--

CREATE TABLE `richiesta` (
  `R_O_riferimento` decimal(1,0) NOT NULL,
  `riferimento` varchar(32) NOT NULL,
  `quantita` decimal(1,0) NOT NULL,
  `commento` varchar(256) DEFAULT NULL,
  `personalizzazione` varchar(256) DEFAULT NULL,
  `res_motivo` varchar(256) DEFAULT NULL,
  `res_data` date DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Struttura della tabella `SCONTO_QUANTITA_`
--

CREATE TABLE `SCONTO_QUANTITA_` (
  `codProdotto` decimal(1,0) NOT NULL,
  `quantita` decimal(1,0) NOT NULL,
  `sconto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `SCONTO_UTENTE`
--

CREATE TABLE `SCONTO_UTENTE` (
  `codice` varchar(16) NOT NULL,
  `importo` decimal(1,0) NOT NULL,
  `dataScadenza` date NOT NULL,
  `riferimento` decimal(1,0) DEFAULT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `SOGLIA_SPEDIZIONE`
--

CREATE TABLE `SOGLIA_SPEDIZIONE` (
  `nome` varchar(64) NOT NULL,
  `importo` decimal(1,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `sottocategoria`
--

CREATE TABLE `sottocategoria` (
  `Fig_nome` varchar(32) NOT NULL,
  `nome` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `step`
--

CREATE TABLE `step` (
  `riferimento` decimal(1,0) NOT NULL,
  `stato` varchar(64) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `TAG`
--

CREATE TABLE `TAG` (
  `nome` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `UTENTE`
--

CREATE TABLE `UTENTE` (
  `email` varchar(64) NOT NULL,
  `titolo` varchar(8) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `cognome` varchar(64) NOT NULL,
  `dataNascita` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `UTENTE_REGISTRATO`
--

CREATE TABLE `UTENTE_REGISTRATO` (
  `email` varchar(64) NOT NULL,
  `newsletter` char(1) NOT NULL,
  `password` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `VERSIONE_PRODOTTO`
--

CREATE TABLE `VERSIONE_PRODOTTO` (
  `riferimento` varchar(32) NOT NULL,
  `colore` varchar(64) NOT NULL,
  `disponibilita` decimal(1,0) NOT NULL,
  `codProdotto` decimal(1,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `avviso_disponibilita`
--
ALTER TABLE `avviso_disponibilita`
  ADD PRIMARY KEY (`email`,`riferimento`),
  ADD UNIQUE KEY `ID_avviso_disponibilita_IND` (`email`,`riferimento`),
  ADD KEY `REF_avvis_VERSI_IND` (`riferimento`);

--
-- Indici per le tabelle `BUONO`
--
ALTER TABLE `BUONO`
  ADD PRIMARY KEY (`punti`),
  ADD UNIQUE KEY `ID_BUONO_IND` (`punti`);

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`email`,`riferimento`),
  ADD UNIQUE KEY `ID_carrello_IND` (`email`,`riferimento`),
  ADD KEY `REF_carre_VERSI_IND` (`riferimento`);

--
-- Indici per le tabelle `CATEGORIA_PRODOTTO`
--
ALTER TABLE `CATEGORIA_PRODOTTO`
  ADD PRIMARY KEY (`nome`),
  ADD UNIQUE KEY `ID_CATEGORIA_PRODOTTO_IND` (`nome`);

--
-- Indici per le tabelle `etichetta`
--
ALTER TABLE `etichetta`
  ADD PRIMARY KEY (`codProdotto`,`nome`),
  ADD UNIQUE KEY `ID_etichetta_IND` (`codProdotto`,`nome`),
  ADD KEY `REF_etich_TAG_IND` (`nome`);

--
-- Indici per le tabelle `INDIRIZZO`
--
ALTER TABLE `INDIRIZZO`
  ADD PRIMARY KEY (`email`,`alias`),
  ADD UNIQUE KEY `ID_INDIRIZZO_IND` (`email`,`alias`),
  ADD KEY `REF_INDIR_PROVI_IND` (`codProvincia`),
  ADD KEY `REF_INDIR_NAZIO_IND` (`codNazione`);

--
-- Indici per le tabelle `lista_desideri`
--
ALTER TABLE `lista_desideri`
  ADD PRIMARY KEY (`email`,`riferimento`),
  ADD UNIQUE KEY `ID_lista_desideri_IND` (`email`,`riferimento`),
  ADD KEY `REF_lista_VERSI_IND` (`riferimento`);

--
-- Indici per le tabelle `METODO_PAGAMENTO`
--
ALTER TABLE `METODO_PAGAMENTO`
  ADD PRIMARY KEY (`codice`),
  ADD UNIQUE KEY `ID_METODO_PAGAMENTO_IND` (`codice`);

--
-- Indici per le tabelle `METODO_SPEDIZIONE`
--
ALTER TABLE `METODO_SPEDIZIONE`
  ADD PRIMARY KEY (`codice`),
  ADD UNIQUE KEY `ID_METODO_SPEDIZIONE_IND` (`codice`);

--
-- Indici per le tabelle `NAZIONE`
--
ALTER TABLE `NAZIONE`
  ADD PRIMARY KEY (`codNazione`),
  ADD UNIQUE KEY `ID_NAZIONE_IND` (`codNazione`);

--
-- Indici per le tabelle `offerta`
--
ALTER TABLE `offerta`
  ADD PRIMARY KEY (`codPromozione`,`codProdotto`),
  ADD UNIQUE KEY `ID_offerta_IND` (`codPromozione`,`codProdotto`),
  ADD KEY `REF_offer_PRODO_IND` (`codProdotto`);

--
-- Indici per le tabelle `ORDINE`
--
ALTER TABLE `ORDINE`
  ADD PRIMARY KEY (`riferimento`),
  ADD UNIQUE KEY `ID_ORDINE_IND` (`riferimento`),
  ADD KEY `REF_ORDIN_METOD_1_IND` (`codice`),
  ADD KEY `REF_ORDIN_METOD_IND` (`Pag_codice`),
  ADD KEY `REF_ORDIN_INDIR_1_IND` (`email`,`alias`),
  ADD KEY `REF_ORDIN_UTENT_IND` (`Ese_email`),
  ADD KEY `REF_ORDIN_INDIR_IND` (`Con_email`,`Con_alias`),
  ADD KEY `REF_ORDIN_SOGLI_IND` (`nome`);

--
-- Indici per le tabelle `PRODOTTO`
--
ALTER TABLE `PRODOTTO`
  ADD PRIMARY KEY (`codProdotto`),
  ADD UNIQUE KEY `ID_PRODOTTO_IND` (`codProdotto`),
  ADD KEY `REF_PRODO_CATEG_IND` (`App_nome`);

--
-- Indici per le tabelle `PROMOZIONE`
--
ALTER TABLE `PROMOZIONE`
  ADD PRIMARY KEY (`codPromozione`),
  ADD UNIQUE KEY `ID_PROMOZIONE_IND` (`codPromozione`);

--
-- Indici per le tabelle `PROVINCIA`
--
ALTER TABLE `PROVINCIA`
  ADD PRIMARY KEY (`codProvincia`),
  ADD UNIQUE KEY `ID_PROVINCIA_IND` (`codProvincia`);

--
-- Indici per le tabelle `recensione`
--
ALTER TABLE `recensione`
  ADD PRIMARY KEY (`riferimento`,`email`),
  ADD UNIQUE KEY `ID_recensione_IND` (`riferimento`,`email`),
  ADD KEY `REF_recen_UTENT_IND` (`email`);

--
-- Indici per le tabelle `richiesta`
--
ALTER TABLE `richiesta`
  ADD PRIMARY KEY (`R_O_riferimento`,`riferimento`),
  ADD UNIQUE KEY `ID_richiesta_IND` (`R_O_riferimento`,`riferimento`),
  ADD KEY `REF_richi_VERSI_IND` (`riferimento`);

--
-- Indici per le tabelle `SCONTO_QUANTITA_`
--
ALTER TABLE `SCONTO_QUANTITA_`
  ADD PRIMARY KEY (`codProdotto`,`quantita`),
  ADD UNIQUE KEY `ID_SCONTO_QUANTITA__IND` (`codProdotto`,`quantita`);

--
-- Indici per le tabelle `SCONTO_UTENTE`
--
ALTER TABLE `SCONTO_UTENTE`
  ADD PRIMARY KEY (`codice`),
  ADD UNIQUE KEY `ID_SCONTO_UTENTE_IND` (`codice`),
  ADD KEY `REF_SCONT_ORDIN_IND` (`riferimento`),
  ADD KEY `REF_SCONT_UTENT_IND` (`email`);

--
-- Indici per le tabelle `SOGLIA_SPEDIZIONE`
--
ALTER TABLE `SOGLIA_SPEDIZIONE`
  ADD PRIMARY KEY (`nome`),
  ADD UNIQUE KEY `ID_SOGLIA_SPEDIZIONE_IND` (`nome`);

--
-- Indici per le tabelle `sottocategoria`
--
ALTER TABLE `sottocategoria`
  ADD PRIMARY KEY (`Fig_nome`,`nome`),
  ADD UNIQUE KEY `ID_sottocategoria_IND` (`Fig_nome`,`nome`),
  ADD KEY `REF_sotto_CATEG_1_IND` (`nome`);

--
-- Indici per le tabelle `step`
--
ALTER TABLE `step`
  ADD PRIMARY KEY (`riferimento`,`stato`,`data`),
  ADD UNIQUE KEY `ID_step_IND` (`riferimento`,`stato`,`data`);

--
-- Indici per le tabelle `TAG`
--
ALTER TABLE `TAG`
  ADD PRIMARY KEY (`nome`),
  ADD UNIQUE KEY `ID_TAG_IND` (`nome`);

--
-- Indici per le tabelle `UTENTE`
--
ALTER TABLE `UTENTE`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `ID_UTENTE_IND` (`email`);

--
-- Indici per le tabelle `UTENTE_REGISTRATO`
--
ALTER TABLE `UTENTE_REGISTRATO`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `ID_UTENT_UTENT_IND` (`email`);

--
-- Indici per le tabelle `VERSIONE_PRODOTTO`
--
ALTER TABLE `VERSIONE_PRODOTTO`
  ADD PRIMARY KEY (`riferimento`),
  ADD UNIQUE KEY `ID_VERSIONE_PRODOTTO_IND` (`riferimento`),
  ADD KEY `REF_VERSI_PRODO_IND` (`codProdotto`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `avviso_disponibilita`
--
ALTER TABLE `avviso_disponibilita`
  ADD CONSTRAINT `REF_avvis_UTENT` FOREIGN KEY (`email`) REFERENCES `utente_registrato` (`email`),
  ADD CONSTRAINT `REF_avvis_VERSI_FK` FOREIGN KEY (`riferimento`) REFERENCES `versione_prodotto` (`riferimento`);

--
-- Limiti per la tabella `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `REF_carre_UTENT` FOREIGN KEY (`email`) REFERENCES `utente` (`email`),
  ADD CONSTRAINT `REF_carre_VERSI_FK` FOREIGN KEY (`riferimento`) REFERENCES `versione_prodotto` (`riferimento`);

--
-- Limiti per la tabella `etichetta`
--
ALTER TABLE `etichetta`
  ADD CONSTRAINT `REF_etich_PRODO` FOREIGN KEY (`codProdotto`) REFERENCES `prodotto` (`codProdotto`),
  ADD CONSTRAINT `REF_etich_TAG_FK` FOREIGN KEY (`nome`) REFERENCES `tag` (`nome`);

--
-- Limiti per la tabella `INDIRIZZO`
--
ALTER TABLE `INDIRIZZO`
  ADD CONSTRAINT `REF_INDIR_NAZIO_FK` FOREIGN KEY (`codNazione`) REFERENCES `nazione` (`codNazione`),
  ADD CONSTRAINT `REF_INDIR_PROVI_FK` FOREIGN KEY (`codProvincia`) REFERENCES `provincia` (`codProvincia`),
  ADD CONSTRAINT `REF_INDIR_UTENT` FOREIGN KEY (`email`) REFERENCES `utente` (`email`);

--
-- Limiti per la tabella `lista_desideri`
--
ALTER TABLE `lista_desideri`
  ADD CONSTRAINT `REF_lista_UTENT` FOREIGN KEY (`email`) REFERENCES `utente_registrato` (`email`),
  ADD CONSTRAINT `REF_lista_VERSI_FK` FOREIGN KEY (`riferimento`) REFERENCES `versione_prodotto` (`riferimento`);

--
-- Limiti per la tabella `offerta`
--
ALTER TABLE `offerta`
  ADD CONSTRAINT `REF_offer_PRODO_FK` FOREIGN KEY (`codProdotto`) REFERENCES `prodotto` (`codProdotto`),
  ADD CONSTRAINT `REF_offer_PROMO` FOREIGN KEY (`codPromozione`) REFERENCES `promozione` (`codPromozione`);

--
-- Limiti per la tabella `ORDINE`
--
ALTER TABLE `ORDINE`
  ADD CONSTRAINT `REF_ORDIN_INDIR_1_FK` FOREIGN KEY (`email`,`alias`) REFERENCES `indirizzo` (`email`, `alias`),
  ADD CONSTRAINT `REF_ORDIN_INDIR_FK` FOREIGN KEY (`Con_email`,`Con_alias`) REFERENCES `indirizzo` (`email`, `alias`),
  ADD CONSTRAINT `REF_ORDIN_METOD_1_FK` FOREIGN KEY (`codice`) REFERENCES `metodo_spedizione` (`codice`),
  ADD CONSTRAINT `REF_ORDIN_METOD_FK` FOREIGN KEY (`Pag_codice`) REFERENCES `metodo_pagamento` (`codice`),
  ADD CONSTRAINT `REF_ORDIN_SOGLI_FK` FOREIGN KEY (`nome`) REFERENCES `soglia_spedizione` (`nome`),
  ADD CONSTRAINT `REF_ORDIN_UTENT_FK` FOREIGN KEY (`Ese_email`) REFERENCES `utente` (`email`);

--
-- Limiti per la tabella `PRODOTTO`
--
ALTER TABLE `PRODOTTO`
  ADD CONSTRAINT `REF_PRODO_CATEG_FK` FOREIGN KEY (`App_nome`) REFERENCES `categoria_prodotto` (`nome`);

--
-- Limiti per la tabella `recensione`
--
ALTER TABLE `recensione`
  ADD CONSTRAINT `REF_recen_UTENT_FK` FOREIGN KEY (`email`) REFERENCES `utente` (`email`),
  ADD CONSTRAINT `REF_recen_VERSI` FOREIGN KEY (`riferimento`) REFERENCES `versione_prodotto` (`riferimento`);

--
-- Limiti per la tabella `richiesta`
--
ALTER TABLE `richiesta`
  ADD CONSTRAINT `REF_richi_ORDIN` FOREIGN KEY (`R_O_riferimento`) REFERENCES `ordine` (`riferimento`),
  ADD CONSTRAINT `REF_richi_VERSI_FK` FOREIGN KEY (`riferimento`) REFERENCES `versione_prodotto` (`riferimento`);

--
-- Limiti per la tabella `SCONTO_QUANTITA_`
--
ALTER TABLE `SCONTO_QUANTITA_`
  ADD CONSTRAINT `REF_SCONT_PRODO` FOREIGN KEY (`codProdotto`) REFERENCES `prodotto` (`codProdotto`);

--
-- Limiti per la tabella `SCONTO_UTENTE`
--
ALTER TABLE `SCONTO_UTENTE`
  ADD CONSTRAINT `REF_SCONT_ORDIN_FK` FOREIGN KEY (`riferimento`) REFERENCES `ordine` (`riferimento`),
  ADD CONSTRAINT `REF_SCONT_UTENT_FK` FOREIGN KEY (`email`) REFERENCES `utente_registrato` (`email`);

--
-- Limiti per la tabella `sottocategoria`
--
ALTER TABLE `sottocategoria`
  ADD CONSTRAINT `REF_sotto_CATEG` FOREIGN KEY (`Fig_nome`) REFERENCES `categoria_prodotto` (`nome`),
  ADD CONSTRAINT `REF_sotto_CATEG_1_FK` FOREIGN KEY (`nome`) REFERENCES `categoria_prodotto` (`nome`);

--
-- Limiti per la tabella `step`
--
ALTER TABLE `step`
  ADD CONSTRAINT `REF_step_ORDIN` FOREIGN KEY (`riferimento`) REFERENCES `ordine` (`riferimento`);

--
-- Limiti per la tabella `UTENTE_REGISTRATO`
--
ALTER TABLE `UTENTE_REGISTRATO`
  ADD CONSTRAINT `ID_UTENT_UTENT_FK` FOREIGN KEY (`email`) REFERENCES `utente` (`email`);

--
-- Limiti per la tabella `VERSIONE_PRODOTTO`
--
ALTER TABLE `VERSIONE_PRODOTTO`
  ADD CONSTRAINT `REF_VERSI_PRODO_FK` FOREIGN KEY (`codProdotto`) REFERENCES `prodotto` (`codProdotto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
