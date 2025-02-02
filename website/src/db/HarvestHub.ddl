-- *********************************************
-- * Standard SQL generation                   
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Sun Feb  2 16:05:08 2025 
-- * LUN file: C:\Users\Turbo\Desktop\uniProject\TW24-TLB\db\HarvestHub.lun 
-- * Schema: HarvestHub_concettuale/SQL 
-- ********************************************* 


-- Database Section
-- ________________ 

create database `HarvestHub2`;
use `HarvestHub2`;


-- DBSpace Section
-- _______________


-- Tables Section
-- _____________ 

create table CATEGORIA_PRODOTTO (
     nome varchar(32) not null,
     descrizione varchar(256) not null,
     constraint ID_CATEGORIA_PRODOTTO_ID primary key (nome));

create table ORDINE (
     riferimento numeric(1) not null,
     data date not null,
     email varchar(64) not null,
     constraint ID_ORDINE_ID primary key (riferimento));

create table ADMIN (
     username varchar(20) not null,
     password varchar(20) not null,
     constraint ID_ADMIN_ID primary key (username));

create table carrello (
     codProdotto numeric(1) not null,
     email varchar(64) not null,
     quantita numeric(1) not null,
     constraint ID_carrello_ID primary key (email, codProdotto));

create table NOTIFICA (
     id_notifica numeric(1) not null,
     Data date not null,
     Titolo varchar(20) not null,
     Descrizione varchar(255) not null,
     letto char not null,
     username varchar(20) not null,
     riferimento numeric(1) not null,
     email varchar(64) not null,
     constraint ID_NOTIFICA_ID primary key (id_notifica));

create table UTENTE (
     email varchar(64) not null,
     username varchar(20) not null,
     password varchar(20) not null,
     nome varchar(64) not null,
     cognome varchar(64) not null,
     dataNascita date not null,
     constraint ID_UTENTE_ID primary key (email));

create table PRODOTTO (
     codProdotto numeric(1) not null,
     nome varchar(64) not null,
     prezzo char(1) not null,
     descrizione char(1) not null,
     immagine char(1) not null,
     disponibilita numeric(1) not null,
     App_nome varchar(32) not null,
     constraint ID_PRODOTTO_ID primary key (codProdotto));

create table lista_desideri (
     codProdotto numeric(1) not null,
     email varchar(64) not null,
     constraint ID_lista_desideri_ID primary key (email, codProdotto));

create table recensione (
     codProdotto numeric(1) not null,
     email varchar(64) not null,
     stelle numeric(1) not null,
     commento varchar(1024) not null,
     constraint ID_recensione_ID primary key (codProdotto, email));

create table richiesta (
     riferimento numeric(1) not null,
     codProdotto numeric(1) not null,
     quantita numeric(1) not null,
     constraint ID_richiesta_ID primary key (riferimento, codProdotto));


-- Constraints Section
-- ___________________ 

alter table ORDINE add constraint REF_ORDIN_UTENT_FK
     foreign key (email)
     references UTENTE (email);

alter table carrello add constraint REF_carre_UTENT
     foreign key (email)
     references UTENTE (email);

alter table carrello add constraint REF_carre_PRODO_FK
     foreign key (codProdotto)
     references PRODOTTO (codProdotto);

alter table NOTIFICA add constraint REF_NOTIF_ADMIN_FK
     foreign key (username)
     references ADMIN (username);

alter table NOTIFICA add constraint REF_NOTIF_ORDIN_FK
     foreign key (riferimento)
     references ORDINE (riferimento);

alter table NOTIFICA add constraint REF_NOTIF_UTENT_FK
     foreign key (email)
     references UTENTE (email);

alter table PRODOTTO add constraint REF_PRODO_CATEG_FK
     foreign key (App_nome)
     references CATEGORIA_PRODOTTO (nome);

alter table lista_desideri add constraint REF_lista_UTENT
     foreign key (email)
     references UTENTE (email);

alter table lista_desideri add constraint REF_lista_PRODO_FK
     foreign key (codProdotto)
     references PRODOTTO (codProdotto);

alter table recensione add constraint REF_recen_UTENT_FK
     foreign key (email)
     references UTENTE (email);

alter table recensione add constraint REF_recen_PRODO
     foreign key (codProdotto)
     references PRODOTTO (codProdotto);

alter table richiesta add constraint REF_richi_PRODO_FK
     foreign key (codProdotto)
     references PRODOTTO (codProdotto);

alter table richiesta add constraint REF_richi_ORDIN
     foreign key (riferimento)
     references ORDINE (riferimento);


-- Index Section
-- _____________ 

create unique index ID_CATEGORIA_PRODOTTO_IND
     on CATEGORIA_PRODOTTO (nome);

create unique index ID_ORDINE_IND
     on ORDINE (riferimento);

create index REF_ORDIN_UTENT_IND
     on ORDINE (email);

create unique index ID_ADMIN_IND
     on ADMIN (username);

create unique index ID_carrello_IND
     on carrello (email, codProdotto);

create index REF_carre_PRODO_IND
     on carrello (codProdotto);

create unique index ID_NOTIFICA_IND
     on NOTIFICA (id_notifica);

create index REF_NOTIF_ADMIN_IND
     on NOTIFICA (username);

create index REF_NOTIF_ORDIN_IND
     on NOTIFICA (riferimento);

create index REF_NOTIF_UTENT_IND
     on NOTIFICA (email);

create unique index ID_UTENTE_IND
     on UTENTE (email);

create unique index ID_PRODOTTO_IND
     on PRODOTTO (codProdotto);

create index REF_PRODO_CATEG_IND
     on PRODOTTO (App_nome);

create unique index ID_lista_desideri_IND
     on lista_desideri (email, codProdotto);

create index REF_lista_PRODO_IND
     on lista_desideri (codProdotto);

create unique index ID_recensione_IND
     on recensione (codProdotto, email);

create index REF_recen_UTENT_IND
     on recensione (email);

create unique index ID_richiesta_IND
     on richiesta (riferimento, codProdotto);

create index REF_richi_PRODO_IND
     on richiesta (codProdotto);

