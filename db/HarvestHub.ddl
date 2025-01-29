-- *********************************************
-- * Standard SQL generation                   
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Wed Jan 29 17:24:47 2025 
-- * LUN file: C:\Users\Turbo\Desktop\uniProject\TW24-TLB\db\HarvestHub.lun 
-- * Schema: HarvestHub_conserva/SQL 
-- ********************************************* 


-- Database Section
-- ________________ 

create database HarvestHub_conserva;


-- DBSpace Section
-- _______________


-- Tables Section
-- _____________ 

create table avviso_disponibilita (
     email varchar(64) not null,
     riferimento varchar(32) not null,
     constraint ID_avviso_disponibilita_ID primary key (email, riferimento));

create table BUONO (
     punti numeric(1) not null,
     importo numeric(1) not null,
     constraint ID_BUONO_ID primary key (punti));

create table carrello (
     email varchar(64) not null,
     riferimento varchar(32) not null,
     quantita numeric(1) not null,
     constraint ID_carrello_ID primary key (email, riferimento));

create table CATEGORIA_PRODOTTO (
     nome varchar(32) not null,
     descrizione varchar(256) not null,
     constraint ID_CATEGORIA_PRODOTTO_ID primary key (nome));

create table etichetta (
     codProdotto numeric(1) not null,
     nome varchar(32) not null,
     constraint ID_etichetta_ID primary key (codProdotto, nome));

create table INDIRIZZO (
     email varchar(64) not null,
     alias varchar(64) not null,
     nome varchar(64) not null,
     cognome varchar(64) not null,
     indirizzo varchar(64) not null,
     numeroCivico varchar(8),
     codicePostale char(5) not null,
     citta varchar(64) not null,
     telefono varchar(10) not null,
     azienda varchar(64),
     emailPEC varchar(64) not null,
     SDI varchar(64) not null,
     numIVA varchar(16) not null,
     codProvincia char(2) not null,
     codNazione char(3) not null,
     constraint ID_INDIRIZZO_ID primary key (email, alias));

create table lista_desideri (
     email varchar(64) not null,
     riferimento varchar(32) not null,
     constraint ID_lista_desideri_ID primary key (email, riferimento));

create table METODO_PAGAMENTO (
     codice numeric(1) not null,
     descrizione varchar(256) not null,
     costo numeric(1),
     constraint ID_METODO_PAGAMENTO_ID primary key (codice));

create table METODO_SPEDIZIONE (
     codice numeric(1) not null,
     nome varchar(64) not null,
     descrizione varchar(256) not null,
     costo numeric(1),
     immagine varchar(1024) not null,
     constraint ID_METODO_SPEDIZIONE_ID primary key (codice));

create table NAZIONE (
     codNazione char(3) not null,
     nome varchar(64) not null,
     constraint ID_NAZIONE_ID primary key (codNazione));

create table offerta (
     codProdotto numeric(1) not null,
     codPromozione numeric(1) not null,
     percSconto float(1) not null,
     constraint ID_offerta_ID primary key (codPromozione, codProdotto));

create table ORDINE (
     riferimento numeric(1) not null,
     data date not null,
     tracking varchar(64),
     pun_data date,
     pun_numPunti numeric(1),
     pun_stato varchar(64),
     not_data date,
     not_importo numeric(1),
     not_stato varchar(64),
     codice numeric(1) not null,
     Pag_codice numeric(1) not null,
     email varchar(64),
     alias varchar(64),
     Ese_email varchar(64) not null,
     Con_email varchar(64) not null,
     Con_alias varchar(64) not null,
     nome varchar(64) not null,
     constraint ID_ORDINE_ID primary key (riferimento));

create table PRODOTTO (
     codProdotto numeric(1) not null,
     nome varchar(64) not null,
     prezzo float(1) not null,
     descrizione varchar(5000) not null,
     peso float(1),
     lunghezza float(1),
     App_nome varchar(32) not null,
     constraint ID_PRODOTTO_ID primary key (codProdotto));

create table PROMOZIONE (
     codPromozione numeric(1) not null,
     dataOraInizio date not null,
     dataOraFine date not null,
     constraint ID_PROMOZIONE_ID primary key (codPromozione));

create table PROVINCIA (
     codProvincia char(2) not null,
     nome varchar(64) not null,
     constraint ID_PROVINCIA_ID primary key (codProvincia));

create table recensione (
     email varchar(64) not null,
     riferimento varchar(32) not null,
     positivo char not null,
     commento varchar(1024) not null,
     constraint ID_recensione_ID primary key (riferimento, email));

create table richiesta (
     R_O_riferimento numeric(1) not null,
     riferimento varchar(32) not null,
     quantita numeric(1) not null,
     commento varchar(256),
     personalizzazione varchar(256),
     res_motivo varchar(256),
     res_data date,
     constraint ID_richiesta_ID primary key (R_O_riferimento, riferimento));

create table SCONTO_QUANTITA_ (
     codProdotto numeric(1) not null,
     quantita numeric(1) not null,
     sconto float(1) not null,
     constraint ID_SCONTO_QUANTITA__ID primary key (codProdotto, quantita));

create table SCONTO_UTENTE (
     codice varchar(16) not null,
     importo numeric(1) not null,
     dataScadenza date not null,
     riferimento numeric(1),
     email varchar(64) not null,
     constraint ID_SCONTO_UTENTE_ID primary key (codice));

create table SOGLIA_SPEDIZIONE (
     nome varchar(64) not null,
     importo numeric(1) not null,
     constraint ID_SOGLIA_SPEDIZIONE_ID primary key (nome));

create table sottocategoria (
     Fig_nome varchar(32) not null,
     nome varchar(32) not null,
     constraint ID_sottocategoria_ID primary key (Fig_nome, nome));

create table step (
     riferimento numeric(1) not null,
     stato varchar(64) not null,
     data date not null,
     constraint ID_step_ID primary key (riferimento, stato, data));

create table TAG (
     nome varchar(32) not null,
     constraint ID_TAG_ID primary key (nome));

create table UTENTE (
     email varchar(64) not null,
     titolo varchar(8) not null,
     nome varchar(64) not null,
     cognome varchar(64) not null,
     dataNascita date,
     constraint ID_UTENTE_ID primary key (email));

create table UTENTE_REGISTRATO (
     email varchar(64) not null,
     newsletter char not null,
     password varchar(512) not null,
     constraint ID_UTENT_UTENT_ID primary key (email));

create table VERSIONE_PRODOTTO (
     riferimento varchar(32) not null,
     colore varchar(64) not null,
     disponibilita numeric(1) not null,
     codProdotto numeric(1) not null,
     constraint ID_VERSIONE_PRODOTTO_ID primary key (riferimento));


-- Constraints Section
-- ___________________ 

alter table avviso_disponibilita add constraint REF_avvis_VERSI_FK
     foreign key (riferimento)
     references VERSIONE_PRODOTTO;

alter table avviso_disponibilita add constraint REF_avvis_UTENT
     foreign key (email)
     references UTENTE_REGISTRATO;

alter table carrello add constraint REF_carre_VERSI_FK
     foreign key (riferimento)
     references VERSIONE_PRODOTTO;

alter table carrello add constraint REF_carre_UTENT
     foreign key (email)
     references UTENTE;

alter table etichetta add constraint REF_etich_TAG_FK
     foreign key (nome)
     references TAG;

alter table etichetta add constraint REF_etich_PRODO
     foreign key (codProdotto)
     references PRODOTTO;

alter table INDIRIZZO add constraint REF_INDIR_UTENT
     foreign key (email)
     references UTENTE;

alter table INDIRIZZO add constraint REF_INDIR_PROVI_FK
     foreign key (codProvincia)
     references PROVINCIA;

alter table INDIRIZZO add constraint REF_INDIR_NAZIO_FK
     foreign key (codNazione)
     references NAZIONE;

alter table lista_desideri add constraint REF_lista_VERSI_FK
     foreign key (riferimento)
     references VERSIONE_PRODOTTO;

alter table lista_desideri add constraint REF_lista_UTENT
     foreign key (email)
     references UTENTE_REGISTRATO;

alter table offerta add constraint REF_offer_PROMO
     foreign key (codPromozione)
     references PROMOZIONE;

alter table offerta add constraint REF_offer_PRODO_FK
     foreign key (codProdotto)
     references PRODOTTO;

alter table ORDINE add constraint COEX_ORDINE_1
     check((pun_data is not null and pun_numPunti is not null and pun_stato is not null)
           or (pun_data is null and pun_numPunti is null and pun_stato is null)); 

alter table ORDINE add constraint COEX_ORDINE
     check((not_data is not null and not_importo is not null and not_stato is not null)
           or (not_data is null and not_importo is null and not_stato is null)); 

alter table ORDINE add constraint REF_ORDIN_METOD_1_FK
     foreign key (codice)
     references METODO_SPEDIZIONE;

alter table ORDINE add constraint REF_ORDIN_METOD_FK
     foreign key (Pag_codice)
     references METODO_PAGAMENTO;

alter table ORDINE add constraint REF_ORDIN_INDIR_1_FK
     foreign key (email, alias)
     references INDIRIZZO;

alter table ORDINE add constraint REF_ORDIN_INDIR_1_CHK
     check((email is not null and alias is not null)
           or (email is null and alias is null)); 

alter table ORDINE add constraint REF_ORDIN_UTENT_FK
     foreign key (Ese_email)
     references UTENTE;

alter table ORDINE add constraint REF_ORDIN_INDIR_FK
     foreign key (Con_email, Con_alias)
     references INDIRIZZO;

alter table ORDINE add constraint REF_ORDIN_SOGLI_FK
     foreign key (nome)
     references SOGLIA_SPEDIZIONE;

alter table PRODOTTO add constraint REF_PRODO_CATEG_FK
     foreign key (App_nome)
     references CATEGORIA_PRODOTTO;

alter table recensione add constraint REF_recen_VERSI
     foreign key (riferimento)
     references VERSIONE_PRODOTTO;

alter table recensione add constraint REF_recen_UTENT_FK
     foreign key (email)
     references UTENTE;

alter table richiesta add constraint COEX_richiesta
     check((res_motivo is not null and res_data is not null)
           or (res_motivo is null and res_data is null)); 

alter table richiesta add constraint REF_richi_VERSI_FK
     foreign key (riferimento)
     references VERSIONE_PRODOTTO;

alter table richiesta add constraint REF_richi_ORDIN
     foreign key (R_O_riferimento)
     references ORDINE;

alter table SCONTO_QUANTITA_ add constraint REF_SCONT_PRODO
     foreign key (codProdotto)
     references PRODOTTO;

alter table SCONTO_UTENTE add constraint REF_SCONT_ORDIN_FK
     foreign key (riferimento)
     references ORDINE;

alter table SCONTO_UTENTE add constraint REF_SCONT_UTENT_FK
     foreign key (email)
     references UTENTE_REGISTRATO;

alter table sottocategoria add constraint REF_sotto_CATEG_1_FK
     foreign key (nome)
     references CATEGORIA_PRODOTTO;

alter table sottocategoria add constraint REF_sotto_CATEG
     foreign key (Fig_nome)
     references CATEGORIA_PRODOTTO;

alter table step add constraint REF_step_ORDIN
     foreign key (riferimento)
     references ORDINE;

alter table UTENTE_REGISTRATO add constraint ID_UTENT_UTENT_FK
     foreign key (email)
     references UTENTE;

alter table VERSIONE_PRODOTTO add constraint REF_VERSI_PRODO_FK
     foreign key (codProdotto)
     references PRODOTTO;


-- Index Section
-- _____________ 

create unique index ID_avviso_disponibilita_IND
     on avviso_disponibilita (email, riferimento);

create index REF_avvis_VERSI_IND
     on avviso_disponibilita (riferimento);

create unique index ID_BUONO_IND
     on BUONO (punti);

create unique index ID_carrello_IND
     on carrello (email, riferimento);

create index REF_carre_VERSI_IND
     on carrello (riferimento);

create unique index ID_CATEGORIA_PRODOTTO_IND
     on CATEGORIA_PRODOTTO (nome);

create unique index ID_etichetta_IND
     on etichetta (codProdotto, nome);

create index REF_etich_TAG_IND
     on etichetta (nome);

create unique index ID_INDIRIZZO_IND
     on INDIRIZZO (email, alias);

create index REF_INDIR_PROVI_IND
     on INDIRIZZO (codProvincia);

create index REF_INDIR_NAZIO_IND
     on INDIRIZZO (codNazione);

create unique index ID_lista_desideri_IND
     on lista_desideri (email, riferimento);

create index REF_lista_VERSI_IND
     on lista_desideri (riferimento);

create unique index ID_METODO_PAGAMENTO_IND
     on METODO_PAGAMENTO (codice);

create unique index ID_METODO_SPEDIZIONE_IND
     on METODO_SPEDIZIONE (codice);

create unique index ID_NAZIONE_IND
     on NAZIONE (codNazione);

create unique index ID_offerta_IND
     on offerta (codPromozione, codProdotto);

create index REF_offer_PRODO_IND
     on offerta (codProdotto);

create unique index ID_ORDINE_IND
     on ORDINE (riferimento);

create index REF_ORDIN_METOD_1_IND
     on ORDINE (codice);

create index REF_ORDIN_METOD_IND
     on ORDINE (Pag_codice);

create index REF_ORDIN_INDIR_1_IND
     on ORDINE (email, alias);

create index REF_ORDIN_UTENT_IND
     on ORDINE (Ese_email);

create index REF_ORDIN_INDIR_IND
     on ORDINE (Con_email, Con_alias);

create index REF_ORDIN_SOGLI_IND
     on ORDINE (nome);

create unique index ID_PRODOTTO_IND
     on PRODOTTO (codProdotto);

create index REF_PRODO_CATEG_IND
     on PRODOTTO (App_nome);

create unique index ID_PROMOZIONE_IND
     on PROMOZIONE (codPromozione);

create unique index ID_PROVINCIA_IND
     on PROVINCIA (codProvincia);

create unique index ID_recensione_IND
     on recensione (riferimento, email);

create index REF_recen_UTENT_IND
     on recensione (email);

create unique index ID_richiesta_IND
     on richiesta (R_O_riferimento, riferimento);

create index REF_richi_VERSI_IND
     on richiesta (riferimento);

create unique index ID_SCONTO_QUANTITA__IND
     on SCONTO_QUANTITA_ (codProdotto, quantita);

create unique index ID_SCONTO_UTENTE_IND
     on SCONTO_UTENTE (codice);

create index REF_SCONT_ORDIN_IND
     on SCONTO_UTENTE (riferimento);

create index REF_SCONT_UTENT_IND
     on SCONTO_UTENTE (email);

create unique index ID_SOGLIA_SPEDIZIONE_IND
     on SOGLIA_SPEDIZIONE (nome);

create unique index ID_sottocategoria_IND
     on sottocategoria (Fig_nome, nome);

create index REF_sotto_CATEG_1_IND
     on sottocategoria (nome);

create unique index ID_step_IND
     on step (riferimento, stato, data);

create unique index ID_TAG_IND
     on TAG (nome);

create unique index ID_UTENTE_IND
     on UTENTE (email);

create unique index ID_UTENT_UTENT_IND
     on UTENTE_REGISTRATO (email);

create unique index ID_VERSIONE_PRODOTTO_IND
     on VERSIONE_PRODOTTO (riferimento);

create index REF_VERSI_PRODO_IND
     on VERSIONE_PRODOTTO (codProdotto);

