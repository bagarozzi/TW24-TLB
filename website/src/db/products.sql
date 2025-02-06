-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 05, 2025 alle 16:01
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harvesthub`
--

--
-- Dump dei dati per la tabella `categoria_prodotto`
--

INSERT INTO `categoria_prodotto` (`nome`) VALUES
('Cattle'),
('Chemicals'),
('Equipment'),
('Harvesters'),
('foraging'),
('Tractors');

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`codProdotto`, `nome`, `prezzo`, `descrizione`, `immagine`, `disponibilita`, `App_nome`) VALUES
(1, 'Total liquid Herbicide', 30, 'Total and liquid weedkiller suitable for all applications.', 'resources/products/antigrass.png', 10, 'Chemicals'),
(2, 'Class Lexion 7500', 300000, 'Harvester Lexion 7500. Always powerful.', 'resources/products/claas-lexion-7500.png', 2, 'Harvesters'),
(3, 'Claas Xerion 12.650', 700000, 'Class Xerion 12, 650hp. Overcome everything.', 'resources/products/claas-xerion-12.650.png', 2, 'Tractors'),
(4, 'Claas Jaguar 900', 50000, 'Hay harvester Class Jaguar 900. ', 'resources/products/claas-jaguar900.png', 2, 'foraging'),
(5, 'Cow', 900, 'Your favourite cow!', 'resources/products/cow.png', 100, 'Cattle'),
(6, 'Fiat Agri 180/90', 30000, 'The legendary. The greatest of all time. THE. FIAT. AGRI. 180/90.', 'resources/products/fa-18090.jpg', 2, 'Tractors'),
(7, 'Horse', 1600, 'Your favourite horse!', 'resources/products/horse.png', 100, 'Cattle'),
(8, 'John Deere 6M-180', 80000, 'Tractor John Deere 6M 180. Tame the beast.', 'resources/products/jd-6m180.png', 5, 'Tractors'),
(9, 'John Deere 5120 ML ', 40000, '5120ML, it\'s not the size, it\'s how you use it.', 'resources/products/jd-5120ml.png', 3, 'Tractors'),
(10, 'John Deere 9900i', 80000, 'The greatest foraging harvester, back in stock.', 'resources/products/jd-9900i.png', 3, 'foraging'),
(11, 'John Deere F310R', 4000, 'John Deere Mower F310R', 'resources/products/jd-falciaf310r.png', 4, 'Equipment'),
(12, 'John Deere S7-900', 350000, 'John Deere\'s second best. Harvesting made easy.', 'resources/products/jd-s7900.png', 3, 'Harvesters'),
(13, 'John Deere 1590', 5000, 'John Deere seeder 1590. A true masterpiece.', 'resources/products/jd-seeder1590.png', 4, 'Equipment'),
(14, 'Massey-Ferguson Baler 1843', 15000, 'The latest baler from Massey-Ferguson.', 'resources/products/mf-1842.jpg', 5, 'Equipment'),
(15, 'Massery-Ferguson TD', 15000, 'The best tedder in the game.', 'resources/products/mf-jpg.jpg', 3, 'Equipment'),
(16, 'New Holland CH10', 450000, 'The best you can have from New Holland 2025 line.', 'resources/products/nh-ch10.png', 2, 'Harvesters'),
(17, 'New Holland FR-920', 250000, 'Hay harvester, 910hp.', 'resources/products/nh-fr.png', 4, 'foraging'),
(18, 'Hydroponics nutrients', 30, 'Hydroponics nutrients, suitable for all greens.', 'resources/products/nutrients.png', 4, 'Chemicals'),
(19, 'Pig', 300, 'Your favourite pig!', 'resources/products/pig.png', 3, 'Cattle'),
(20, 'Dosatron Hydroponics Pump', 90, 'Hydroponics dosing pump. 100.000 hours.', 'resources/products/pompa-idroponica.jpg', 40, 'Chemicals'),
(21, 'Froggy Shoulder Pump', 40, 'Get wherever you want!', 'resources/products/zaino-diserbante.jpg', 15, 'Chemicals');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
