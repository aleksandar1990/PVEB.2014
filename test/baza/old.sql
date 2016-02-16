

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `rent_a_car_db` ;
CREATE SCHEMA IF NOT EXISTS `rent_a_car_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `rent_a_car_db` ;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rent_a_car_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `automobili`
--

CREATE TABLE IF NOT EXISTS `automobili` (
  `BR_sasije` varchar(150) NOT NULL,
  `Proizvodjac` varchar(150) NOT NULL,
  `Model` varchar(150) NOT NULL,
  `Kategorija` varchar(150) NOT NULL,
  `BR_vrata` int(10) NOT NULL,
  `Vrsta_goriva` varchar(150) NOT NULL,
  `Menjac` varchar(200) NOT NULL,
  `Godiste` int(10) NOT NULL,
  `BR_motora` varchar(150) NOT NULL,
  `Boja` varchar(50) NOT NULL,
  `Slika` text NOT NULL COMMENT 'Link ka slici auta ',
  `Cena_kupovine` varchar(150) NOT NULL,
  `Cena_iznajmljivanja` varchar(150) NOT NULL,
  `Kubikaza` varchar(150) NOT NULL,
  `Registraciona_oznaka` varchar(150) NOT NULL,
  `Prva_registracija` varchar(150) DEFAULT NULL,
  `Kilometraza` int(11) NOT NULL,
  `Dodatna_oprema` varchar(200) DEFAULT NULL,
  `Datum_unosa` date DEFAULT NULL,
  `Iznajmljen` tinyint(4) NOT NULL,
  PRIMARY KEY (`BR_sasije`),
  UNIQUE KEY `BR_sasije_UNIQUE` (`BR_sasije`),
  UNIQUE KEY `BR_motora_UNIQUE` (`BR_motora`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `automobili`
--

INSERT INTO `automobili` (`BR_sasije`, `Proizvodjac`, `Model`, `Kategorija`, `BR_vrata`, `Vrsta_goriva`, `Menjac`, `Godiste`, `BR_motora`, `Boja`, `Slika`, `Cena_kupovine`, `Cena_iznajmljivanja`, `Kubikaza`, `Registraciona_oznaka`, `Prva_registracija`, `Kilometraza`, `Dodatna_oprema`, `Datum_unosa`, `Iznajmljen`) VALUES
('24Je49P9X5Q937c', 'HONDA', 'ACCORD AUTOMATIC', 'Passenger car', 5, 'Petrol', 'Automatic', 2010, 'TnwWVMq2DA2JhCV', 'Black', '../images/honda.jpg', '14000', '35', '1997 ccm', 'BG-123-AI', '2014-07-25', 7500, NULL, '2014-12-17', 1),
('455vQhsC6fn425K', 'HONDA', 'ACCORD 2.0', 'Passenger car', 5, 'Petrol', 'Automatic', 2011, '3284865Rta9FH6h', 'Silver', '../images/accord.jpg', '15500', '40', '2000 ccm', 'BG-547-CX', '2014-04-04', 6620, NULL, '2014-12-17', 1),
('58x7K68k44629pD', 'SEAT', 'IBIZA', 'Passenger car', 5, 'Petrol', 'Automatic', 2012, '2AmKbJbKCXfxTjB', 'Red', '../images/ibica.jpg', '13500', '37', '1395 ccm', 'BG-244-FX', '2014-08-24', 9970, NULL, '2014-12-17', 0),
('596G433vEv8g38R', 'VW', 'POLO 1.4 TDI', 'Passenger car', 5, 'Petrol', 'Automatic', 2009, 'PPbuk46Nxhr8S3p', 'White', '../images/polo.jpg', '9000', '30', '1996 ccm', 'BG-774-CC', '2014-09-21', 10750, NULL, '2014-12-17', 0),
('7wsNEm46S6B69Er', 'HONDA', 'CR-V 2.0 AUTOMATIC', 'SUV', 5, 'Petrol', 'Automatic', 2013, '9n8X9agU772Uv4X', 'Silver', '../images/cr-v.jpg', '18000', '50', '1995 ccm', 'BG-231-RV', '2014-10-15', 4420, NULL, '2014-12-17', 0),
('889YHdpv4H4H42U', 'TOYOTA', 'LANDCRUISER', 'SUV', 5, 'Petrol', 'Automatic', 2014, 'W7YwnJncPXK6VEx', 'Silver', '../images/landcruiser.jpg', '25000', '55', '2995 ccm', 'BG-982-YV', '2014-05-09', 1265, NULL, '2014-12-17', 0),
('8ybvGCGARyt5PGu', 'Porsche', 'Panamera 4.8 V8 Turbo S', 'Compact executive car', 5, 'Petrol', 'Automatic', 2013, '677V7ce246hMsTw', 'White', '../images/porsche.jpg', '39000', '60', '4806 ccm', 'BG-753-XY', '2014-06-18', 2315, NULL, '2014-12-17', 0),
('cvbwcekPRFYt4Dg', 'BMW', '328i SEDAN', 'Compact executive car', 5, 'Petrol', 'Automatic', 2014, 'mkkuj42QhN7xE8g', 'Black', '../images/bmw-328i.jpg', '45000', '65', '1997 ccm', 'BG-951-ZX', '2014-07-08', 1620, NULL, '2014-12-17', 0),
('d9uC4r2Bg5Ga57N', 'Mercedes', 'Benz E350', 'Compact executive car', 5, 'Diesel', 'Automatic', 2012, '3TNusN49235n59Q', 'Silver', '../images/mercedes.jpg', '35000', '57', '3000 ccm', 'BG-759-TT', '2014-03-28', 3150, NULL, '2014-12-17', 0),
('eugsSkTKqE9GWNW', 'Chevrolet', 'Captiva', 'SUV', 4, 'Petrol', 'Automatic', 2012, '5Hzg29VH447wZ6Y', 'White', '../images/chevrolet_captiva.jpg', '38000', '60', '2500 ccm', 'BG-748-JD', '2012-05-11', 43127, NULL, '2014-12-17', 0),
('fpUU2S2dfq352ef', 'BMW', 'X5', 'SUV', 4, 'Petrol', 'Automatic', 2011, 'Af59gN34648268W', 'Brown', '../images/bmw_X5.jpg', '45000', '120', '3500 ccm', 'BG-998-JR', '2012-05-12', 60050, NULL, '2014-12-17', 0),
('H9D767229d3888j', 'Subaru', 'Impreza', 'sport', 4, 'Petrol', 'Manual 6 speed', 2010, 'R9VSP63zC978N5C', 'Blue-Gold', '../images/subaru_impreza.jpg', '55000', '140', '2800 ccm', 'BG-551-DT', '2012-05-09', 30050, NULL, '2014-12-17', 0),
('k93Cx72Z8K2y45U', 'Dacia', 'Sindero', 'limousine', 5, 'Petrol', 'Manual 4 speed', 2012, 'tTnMXr3FfhJuUWe', 'White', '../images/dacia_sindero.jpg', '9800', '40', '1300 ccm', 'BG-903-JK', '2013-09-09', 65412, NULL, '2014-12-17', 0),
('Ma325Jjt595C4yA', 'Fiat', '500', 'Hecbek', 2, 'Petrol', 'Manuel 4 speed', 2012, 'Dus796978EG3K2B', 'White', '../images/fiat_500.jpg', '14000', '45', '1300 ccm', 'BG-784-KG', '2012-10-19', 7741, NULL, '2014-12-17', 0),
('Uax427n9e2Uj6Ke', 'Ford', 'Mondeo', 'limousine', 5, 'Petrol', 'Automatic', 2013, '2Ak8K6Q863u7DXQ', 'Black', '../images/mondeo.jpg', '21480', '50', '1600 ccm', 'BG-456-ND', '2013-05-02', 6544, NULL, '2014-12-17', 1),
('ZP9cwkDW8M5xafk', 'Renault', 'Megane', 'Hatchback', 4, 'Petrol', 'Automatic', 2014, 'B2K8shr742u75eN', 'Blue', '../images/renault_megane.jpg', '35000', '55', '1600 ccm', 'BG-436-RS', '2014-06-12', 9987, NULL, '2014-12-17', 1);

--
-- Triggers `automobili`
--
DROP TRIGGER IF EXISTS `automobili_BINS`;
DELIMITER //
CREATE TRIGGER `automobili_BINS` BEFORE INSERT ON `automobili`
 FOR EACH ROW SET NEW.Datum_unosa=curdate()
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `iznajmi`
--

CREATE TABLE IF NOT EXISTS `iznajmi` (
  `Br_ugovora` int(11) NOT NULL AUTO_INCREMENT,
  `Br_sasije` varchar(150) NOT NULL,
  `ID_korisnika` int(13) NOT NULL,
  `Datum_iznajmljivanja` date NOT NULL,
  `Ugovoreni_datum_vracanja` date NOT NULL,
  `Datum_vracanja` date DEFAULT NULL,
  `Komentar` text NOT NULL,
  PRIMARY KEY (`Br_ugovora`),
  UNIQUE KEY `Br_ugovora` (`Br_ugovora`),
  KEY `Br_sasije` (`Br_sasije`,`ID_korisnika`),
  KEY `ID_korisnika_idx` (`ID_korisnika`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `iznajmi`
--

INSERT INTO `iznajmi` (`Br_ugovora`, `Br_sasije`, `ID_korisnika`, `Datum_iznajmljivanja`, `Ugovoreni_datum_vracanja`, `Datum_vracanja`, `Komentar`) VALUES
(1, '24Je49P9X5Q937c', 3, '2014-12-17', '2015-01-17', NULL, ''),
(2, '455vQhsC6fn425K', 4, '2014-12-17', '2015-01-15', NULL, '');

--
-- Triggers `iznajmi`
--
DROP TRIGGER IF EXISTS `iznajmi_AINS`;
DELIMITER //
CREATE TRIGGER `iznajmi_AINS` AFTER INSERT ON `iznajmi`
 FOR EACH ROW UPDATE automobili
	SET Iznajmljen=1
	WHERE new.Br_sasije=automobili.BR_sasije
//
DELIMITER ;
DROP TRIGGER IF EXISTS `iznajmi_AUPD`;
DELIMITER //
CREATE TRIGGER `iznajmi_AUPD` AFTER UPDATE ON `iznajmi`
 FOR EACH ROW UPDATE automobili
	SET Iznajmljen=0
	WHERE new.Br_sasije=automobili.BR_sasije
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE IF NOT EXISTS `korisnik` (
  `ID_korisnika` int(11) NOT NULL AUTO_INCREMENT,
  `identity` varchar(150) NOT NULL COMMENT 'Uloga moze biti: klijent, vlasnik ili mehanicar',
  `Ime` varchar(150) NOT NULL,
  `Prezime` varchar(150) NOT NULL,
  `Adresa` varchar(150) NOT NULL,
  `Telefon` varchar(150) NOT NULL,
  `Mat_broj` int(13) NOT NULL,
  `BR_licne` varchar(150) NOT NULL,
  `Br_pasosa` varchar(150) DEFAULT NULL,
  `Informacije` varchar(200) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `chack` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_korisnika`),
  UNIQUE KEY `ID_korisnika_UNIQUE` (`ID_korisnika`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`ID_korisnika`, `identity`, `Ime`, `Prezime`, `Adresa`, `Telefon`, `Mat_broj`, `BR_licne`, `Br_pasosa`, `Informacije`, `password`, `username`, `email`, `chack`) VALUES
(1, 'vlasnik', 'Predrag', 'Vujic', 'Studentski Trg 16', '011654675', 123456, '1145470', '', NULL, '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@pveb.rs', '0'),
(2, 'mehanicar', 'Petar', 'Petrovic', 'Vatroslava Jagica 5', '011321324', 624321, '5467743', NULL, NULL, 'bf676ed1364b5857fba69b5623c81b64', 'pera', 'pera@pveb.rs', '0'),
(3, 'klijent', 'Sasa', 'Malkov', 'Vojvode Supljikca 2', '011245478', 555123, '8478512', NULL, NULL, 'd70bf314239f5bcdbdb3c671bcb95d5f', 'smalkov', 'smalkov@pveb.rs', '0'),
(4, 'klijent', 'Nenad', 'Mitic', 'Kabinet 717', '0113321842', 654122, '1015466', NULL, NULL, 'aee03111935944a5ad1f1c887bd141e2', 'nenad', 'nenad@matf.rs', '0');

-- --------------------------------------------------------

--
-- Table structure for table `kvarovi`
--

CREATE TABLE IF NOT EXISTS `kvarovi` (
  `ID_kvara` int(11) NOT NULL AUTO_INCREMENT,
  `ID_sasije` varchar(150) NOT NULL,
  `ID_prijavio` int(150) NOT NULL COMMENT 'ID_korisnika koji je prijavio kvar',
  `ID_popravio` int(150) NOT NULL COMMENT 'ID mehanicara',
  `Opis_kvara` text NOT NULL,
  `Datum_prijave` date NOT NULL,
  `Datum_popravke` date NOT NULL,
  `Cena_delova` varchar(150) NOT NULL,
  `Opis_popravke` text NOT NULL,
  `Opis_stanja` text NOT NULL COMMENT 'Opis opsteg stanja vozila posle popravke',
  PRIMARY KEY (`ID_kvara`),
  KEY `ID_sasije_idx` (`ID_sasije`),
  KEY `ID_prijavio_idx` (`ID_prijavio`),
  KEY `ID_popravio_idx` (`ID_popravio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Triggers `kvarovi`
--
DROP TRIGGER IF EXISTS `kvarovi_BINS`;
DELIMITER //
CREATE TRIGGER `kvarovi_BINS` BEFORE INSERT ON `kvarovi`
 FOR EACH ROW set new.Datum_prijave=curdate()
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `nabavka`
--

CREATE TABLE IF NOT EXISTS `nabavka` (
  `ID_nabavke` int(11) NOT NULL AUTO_INCREMENT,
  `ID_narucioca` int(11) NOT NULL COMMENT 'Povezati sa tabelom u kojoj je ID mehanicara',
  `nabavka` text NOT NULL,
  `datum_nabavke` date NOT NULL,
  PRIMARY KEY (`ID_nabavke`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `odrzavanje`
--

CREATE TABLE IF NOT EXISTS `odrzavanje` (
  `ID_odrzavanja` int(11) NOT NULL AUTO_INCREMENT,
  `BROJ_sasije` varchar(150) NOT NULL,
  `ID_mehanicara` int(11) NOT NULL,
  `Opis_radnje` text NOT NULL,
  `Trenutna_kilom` int(11) NOT NULL COMMENT 'Trenutna kilometraza vozila',
  `Datum_rada` date NOT NULL,
  PRIMARY KEY (`ID_odrzavanja`),
  UNIQUE KEY `ID_odrzavanja_UNIQUE` (`ID_odrzavanja`),
  KEY `ID_mehanicara_idx` (`ID_mehanicara`),
  KEY `BROJ_sasije_idx` (`BROJ_sasije`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Triggers `odrzavanje`
--
DROP TRIGGER IF EXISTS `odrzavanje_BINS`;
DELIMITER //
CREATE TRIGGER `odrzavanje_BINS` BEFORE INSERT ON `odrzavanje`
 FOR EACH ROW set new.Datum_rada=curdate()
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `prodati_automobili`
--

CREATE TABLE IF NOT EXISTS `prodati_automobili` (
  `id_prodaje` int(11) NOT NULL AUTO_INCREMENT,
  `broj_sasije_vozila` varchar(150) NOT NULL,
  `id_kupca` int(11) NOT NULL,
  `datum_prodaje` date NOT NULL,
  `iznos` int(11) NOT NULL,
  `placen` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_prodaje`),
  KEY `broj_sasije_idx` (`broj_sasije_vozila`),
  KEY `id_kupca_idx` (`id_kupca`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `prodati_automobili`
--

INSERT INTO `prodati_automobili` (`id_prodaje`, `broj_sasije_vozila`, `id_kupca`, `datum_prodaje`, `iznos`, `placen`) VALUES
(1, 'ZP9cwkDW8M5xafk', 3, '2014-12-17', 35000, 1),
(2, 'Uax427n9e2Uj6Ke', 4, '2014-12-17', 21480, 0);

--
-- Triggers `prodati_automobili`
--
DROP TRIGGER IF EXISTS `prodati_automobili_AINS`;
DELIMITER //
CREATE TRIGGER `prodati_automobili_AINS` AFTER INSERT ON `prodati_automobili`
 FOR EACH ROW UPDATE automobili
	SET Iznajmljen=1
	WHERE new.broj_sasije_vozila=automobili.BR_sasije
//
DELIMITER ;
DROP TRIGGER IF EXISTS `prodati_automobili_BINS`;
DELIMITER //
CREATE TRIGGER `prodati_automobili_BINS` BEFORE INSERT ON `prodati_automobili`
 FOR EACH ROW set new.datum_prodaje=curdate()
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transakcije`
--

CREATE TABLE IF NOT EXISTS `transakcije` (
  `id_transakcije` int(11) NOT NULL AUTO_INCREMENT,
  `id_uplatioca` int(11) NOT NULL,
  `datum_transakcije` date NOT NULL,
  `opis_transakcije` varchar(150) DEFAULT NULL,
  `iznos` int(11) NOT NULL,
  PRIMARY KEY (`id_transakcije`),
  KEY `id_uplatioca_idx` (`id_uplatioca`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `transakcije`
--

INSERT INTO `transakcije` (`id_transakcije`, `id_uplatioca`, `datum_transakcije`, `opis_transakcije`, `iznos`) VALUES
(1, 3, '2014-12-17', 'kupovina Renault Megane', 35000);

--
-- Triggers `transakcije`
--
DROP TRIGGER IF EXISTS `transakcije_BINS`;
DELIMITER //
CREATE TRIGGER `transakcije_BINS` BEFORE INSERT ON `transakcije`
 FOR EACH ROW set new.datum_transakcije=curdate()
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `zamena_ulja`
--

CREATE TABLE IF NOT EXISTS `zamena_ulja` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BR_sasije` int(11) NOT NULL,
  `Datum_promene` date NOT NULL,
  `ID_mehanicara` int(11) NOT NULL,
  `Kolometraza` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `start_date`, `end_date`, `text`) VALUES
(1, '2014-12-17 09:00', '2014-12-17 10:00', 'korisnik Sasa Malkov kupio auto Renault Megane'),
(2, '2014-12-17 11:00', '2014-12-17 12:00', 'korisnik Sasa Malkov iznajmio auto HONDA ACCORD AUTOMATIC'),
(3, '2015-01-17 11:00', '2015-01-17 12:00', 'korisnik Sasa Malkov treba da vrati auto HONDA ACCORD AUTOMATIC'),
(4, '2014-12-17 12:00', '2014-12-17 13:00', 'korisnik Nenad Mitic iznajmio auto HONDA ACCORD 2.0'),
(5, '2015-01-15 12:00', '2015-01-15 13:00', 'korisnik Nenad Mitic treba da vrati auto HONDA ACCORD 2.0');


--
-- Constraints for dumped tables
--

--
-- Constraints for table `iznajmi`
--
ALTER TABLE `iznajmi`
  ADD CONSTRAINT `Br_sasije` FOREIGN KEY (`Br_sasije`) REFERENCES `automobili` (`BR_sasije`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ID_korisnika` FOREIGN KEY (`ID_korisnika`) REFERENCES `korisnik` (`ID_korisnika`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kvarovi`
--
ALTER TABLE `kvarovi`
  ADD CONSTRAINT `ID_popravio` FOREIGN KEY (`ID_popravio`) REFERENCES `korisnik` (`ID_korisnika`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ID_prijavio` FOREIGN KEY (`ID_prijavio`) REFERENCES `korisnik` (`ID_korisnika`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ID_sasije` FOREIGN KEY (`ID_sasije`) REFERENCES `automobili` (`BR_sasije`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `odrzavanje`
--
ALTER TABLE `odrzavanje`
  ADD CONSTRAINT `BROJ_sasije` FOREIGN KEY (`BROJ_sasije`) REFERENCES `automobili` (`BR_sasije`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ID_mehanicara` FOREIGN KEY (`ID_mehanicara`) REFERENCES `korisnik` (`ID_korisnika`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prodati_automobili`
--
ALTER TABLE `prodati_automobili`
  ADD CONSTRAINT `broj_sasije_vozila` FOREIGN KEY (`broj_sasije_vozila`) REFERENCES `automobili` (`BR_sasije`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_kupca` FOREIGN KEY (`id_kupca`) REFERENCES `korisnik` (`ID_korisnika`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transakcije`
--
ALTER TABLE `transakcije`
  ADD CONSTRAINT `id_uplatioca` FOREIGN KEY (`id_uplatioca`) REFERENCES `korisnik` (`ID_korisnika`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
