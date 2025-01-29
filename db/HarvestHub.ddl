-- *********************************************
-- * Standard SQL generation                   
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Wed Jan 29 16:36:58 2025 
-- * LUN file: C:\Users\Turbo\Desktop\uniProject\TW24-TLB\db\HarvestHub.lun 
-- * Schema: HarvestHub_copia_aggiornata/1-1-1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database HarvestHub_copia_aggiornata;


-- DBSpace Section
-- _______________


-- Tables Section
-- _____________ 

create table BUONO (
     punti numeric(1) not null,
     importo numeric(1) not null,
     constraint IDBUONO primary key (punti));

create table CATEGORIA_PRODOTTO (
     nome varchar(32) not null,
     descrizione varchar(256) not null,
     constraint IDCATEGORIA primary key (nome));

create table INDIRIZZO (
     alias varchar(64) not null,
     nome varchar(64) not null,
     cognome varchar(64) not null,
     indirizzo varchar(64) not null,
     numeroCivico varchar(8),
     codicePostale char(5) not null,
     città varchar(64) not null,
     telefono varchar(10) not null,
     azienda varchar(64),
     emailPEC varchar(64) not null,
     SDI varchar(64) not null,
     numIVA varchar(16) not null,
     constraint IDINDIRIZZO primary key (, alias));

create table METODO_PAGAMENTO (
     codice -- Sequence attribute not implemented -- not null,
     descrizione varchar(256) not null,
     costo numeric(1),
     constraint IDMETODO PAGAMENTO primary key (codice));

create table METODO_SPEDIZIONE (
     codice -- Sequence attribute not implemented -- not null,
     nome varchar(64) not null,
     descrizione varchar(256) not null,
     costo numeric(1),
     immagine varchar(1024) not null,
     constraint IDMETODO DI SPEDIZIONE primary key (codice));

create table NAZIONE (
     codNazione char(3) not null,
     nome varchar(64) not null,
     constraint IDNAZIONE primary key (codNazione));

create table ORDINE (
     riferimento -- Sequence attribute not implemented -- not null,
     data date not null,
     tracking varchar(64),
     step -- Compound attribute --,
     punti fedeltà -- Compound attribute --,
     nota di credito -- Compound attribute --,
     constraint IDORDINE primary key (riferimento));

create table PRODOTTO (
     codProdotto -- Sequence attribute not implemented -- not null,
     nome varchar(64) not null,
     prezzo float(1) not null,
     descrizione varchar(5000) not null,
     peso float(1),
     lunghezza float(1),
     constraint IDPRODOTTO primary key (codProdotto));

create table PROMOZIONE (
     codPromozione -- Sequence attribute not implemented -- not null,
     dataOraInizio date not null,
     dataOraFine date not null,
     constraint IDPROMOZIONE primary key (codPromozione));

create table PROVINCIA (
     codProvincia char(2) not null,
     nome varchar(64) not null,
     constraint IDPROVINCIA primary key (codProvincia));

create table SCONTO_QUANTITA' (
     quantità numeric(1) not null,
     sconto float(1) not null,
     constraint IDSCONTO QUANTITA' primary key (, quantità));

create table SCONTO_UTENTE (
     codice varchar(16) not null,
     importo numeric(1) not null,
     dataScadenza date not null,
     constraint IDSCONTO UTENTE primary key (codice));

create table SOGLIA_SPEDIZIONE (
     nome varchar(64) not null,
     importo numeric(1) not null,
     constraint IDSOGLIA SPEDIZIONE primary key (nome));

create table TAG (
     nome varchar(32) not null,
     constraint IDTAG primary key (nome));

create table UTENTE (
     email varchar(64) not null,
     titolo varchar(8) not null,
     nome varchar(64) not null,
     cognome varchar(64) not null,
     dataNascita date,
     constraint IDUTENTE primary key (email));

create table UTENTE_REGISTRATO (
     newsletter char not null,
     password varchar(512) not null);

create table VERSIONE_PRODOTTO (
     riferimento varchar(32) not null,
     colore varchar(64) not null,
     disponibilita numeric(1) not null,
     constraint IDVERSIONE PRODOTTO primary key (riferimento));


-- Constraints Section
-- ___________________ 


-- Index Section
-- _____________ 

