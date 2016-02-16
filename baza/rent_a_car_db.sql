SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `rent_a_car_db` ;
CREATE SCHEMA IF NOT EXISTS `rent_a_car_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `rent_a_car_db` ;

-- -----------------------------------------------------
-- Table `rent_a_car_db`.`automobili`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rent_a_car_db`.`automobili` ;

CREATE TABLE IF NOT EXISTS `rent_a_car_db`.`automobili` (
  `BR_sasije` VARCHAR(150) NOT NULL,
  `Proizvodjac` VARCHAR(150) NOT NULL,
  `Model` VARCHAR(150) NOT NULL,
  `Kategorija` VARCHAR(150) NOT NULL,
  `BR_vrata` INT(10) NOT NULL,
  `Vrsta_goriva` VARCHAR(150) NOT NULL,
  `Menjac` VARCHAR(200) NOT NULL,
  `Godiste` INT(10) NOT NULL,
  `BR_motora` VARCHAR(150) NOT NULL,
  `Boja` VARCHAR(50) NOT NULL,
  `Slika` TEXT NOT NULL COMMENT 'Link ka slici auta ',
  `Cena_kupovine` VARCHAR(150) NOT NULL,
  `Cena_iznajmljivanja` VARCHAR(150) NOT NULL,
  `Kubikaza` VARCHAR(150) NOT NULL,
  `Registraciona_oznaka` VARCHAR(150) NOT NULL,
  `Prva_registracija` VARCHAR(150) NULL DEFAULT NULL,
  `Kilometraza` INT(11) NOT NULL,
  `Dodatna_oprema` VARCHAR(200) NULL DEFAULT NULL,
  `Datum_unosa` DATE NULL DEFAULT NULL,
  `Iznajmljen` TINYINT(4) NOT NULL,
  PRIMARY KEY (`BR_sasije`),
  UNIQUE INDEX `BR_sasije_UNIQUE` (`BR_sasije` ASC),
  UNIQUE INDEX `BR_motora_UNIQUE` (`BR_motora` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- Dumping data for table `automobili`
--

INSERT INTO `automobili` (`BR_sasije`, `Proizvodjac`, `Model`, `Kategorija`, `BR_vrata`, `Vrsta_goriva`, `Menjac`, `Godiste`, `BR_motora`, `Boja`, `Slika`, `Cena_kupovine`, `Cena_iznajmljivanja`, `Kubikaza`, `Registraciona_oznaka`, `Prva_registracija`, `Kilometraza`, `Dodatna_oprema`, `Datum_unosa`, `Iznajmljen`) VALUES
('24Je49P9X5Q937c', 'HONDA', 'ACCORD AUTOMATIC', 'Passenger car', 5, 'Petrol', 'Automatic', 2010, 'TnwWVMq2DA2JhCV', 'Black', '../images/honda.jpg', '14000', '35', '1997 ccm', 'BG-123-AI', '2014-07-25', 34210, NULL, '2014-12-17', 1),
('455vQhsC6fn425K', 'HONDA', 'ACCORD 2.0', 'Passenger car', 5, 'Petrol', 'Automatic', 2011, '3284865Rta9FH6h', 'Silver', '../images/accord.jpg', '15500', '40', '2000 ccm', 'BG-547-CX', '2014-04-04', 32522, NULL, '2014-12-17', 1),
('58x7K68k44629pD', 'SEAT', 'IBIZA', 'Passenger car', 5, 'Petrol', 'Automatic', 2012, '2AmKbJbKCXfxTjB', 'Red', '../images/ibica.jpg', '13500', '37', '1395 ccm', 'BG-244-FX', '2014-08-24', 25100, NULL, '2014-12-17', 0),
('596G433vEv8g38R', 'VW', 'POLO 1.4 TDI', 'Passenger car', 5, 'Petrol', 'Automatic', 2009, 'PPbuk46Nxhr8S3p', 'White', '../images/polo.jpg', '9000', '30', '1996 ccm', 'BG-774-CC', '2014-09-21', 15421, NULL, '2014-12-17', 0),
('7wsNEm46S6B69Er', 'HONDA', 'CR-V 2.0 AUTOMATIC', 'SUV', 5, 'Petrol', 'Automatic', 2013, '9n8X9agU772Uv4X', 'Silver', '../images/cr-v.jpg', '18000', '50', '1995 ccm', 'BG-231-RV', '2014-10-15', 4420, NULL, '2014-12-17', 0),
('889YHdpv4H4H42U', 'TOYOTA', 'LANDCRUISER', 'SUV', 5, 'Petrol', 'Automatic', 2014, 'W7YwnJncPXK6VEx', 'Silver', '../images/landcruiser.jpg', '25000', '55', '2995 ccm', 'BG-982-YV', '2014-05-09', 21411, NULL, '2014-12-17', 0),
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


-- -----------------------------------------------------
-- Table `rent_a_car_db`.`korisnik`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rent_a_car_db`.`korisnik` ;

CREATE TABLE IF NOT EXISTS `rent_a_car_db`.`korisnik` (
  `ID_korisnika` INT(11) NOT NULL AUTO_INCREMENT,
  `identity` VARCHAR(150) NOT NULL COMMENT 'Uloga moze biti: klijent, vlasnik ili mehanicar',
  `Ime` VARCHAR(150) NOT NULL,
  `Prezime` VARCHAR(150) NOT NULL,
  `Adresa` VARCHAR(150) NOT NULL,
  `Telefon` VARCHAR(150) NOT NULL,
  `Mat_broj` INT(13) NOT NULL,
  `BR_licne` VARCHAR(150) NOT NULL,
  `Br_pasosa` VARCHAR(150) NULL DEFAULT NULL,
  `Informacije` VARCHAR(200) NULL DEFAULT NULL,
  `password` VARCHAR(200) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `chack` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID_korisnika`),
  UNIQUE INDEX `ID_korisnika_UNIQUE` (`ID_korisnika` ASC),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`ID_korisnika`, `identity`, `Ime`, `Prezime`, `Adresa`, `Telefon`, `Mat_broj`, `BR_licne`, `Br_pasosa`, `Informacije`, `password`, `username`, `email`, `chack`) VALUES
(1, 'vlasnik', 'Predrag', 'Vujic', 'Studentski Trg 16', '011654675', 123456, '1145470', '', NULL, '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@pveb.rs', '0'),
(2, 'mehanicar', 'Petar', 'Petrovic', 'Vatroslava Jagica 5', '011321324', 624321, '5467743', NULL, NULL, 'bf676ed1364b5857fba69b5623c81b64', 'pera', 'pera@pveb.rs', '0'),
(3, 'klijent', 'Sasa', 'Malkov', 'Vojvode Supljikca 2', '011245478', 555123, '8478512', NULL, NULL, 'd70bf314239f5bcdbdb3c671bcb95d5f', 'smalkov', 'smalkov@pveb.rs', '0'),
(4, 'klijent', 'Nenad', 'Mitic', 'Kabinet 717', '0113321842', 654122, '1015466', NULL, NULL, 'aee03111935944a5ad1f1c887bd141e2', 'nenad', 'nenad@matf.rs', '0');


-- -----------------------------------------------------
-- Table `rent_a_car_db`.`iznajmi`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rent_a_car_db`.`iznajmi` ;

CREATE TABLE IF NOT EXISTS `rent_a_car_db`.`iznajmi` (
  `Br_ugovora` INT(11) NOT NULL AUTO_INCREMENT,
  `Br_sasije` VARCHAR(150) NOT NULL,
  `ID_korisnika` INT(13) NOT NULL,
  `Datum_iznajmljivanja` DATE NOT NULL,
  `Ugovoreni_datum_vracanja` DATE NOT NULL,
  `Datum_vracanja` DATE NULL DEFAULT NULL,
  `Komentar` TEXT NOT NULL,
  PRIMARY KEY (`Br_ugovora`),
  UNIQUE INDEX `Br_ugovora` (`Br_ugovora` ASC),
  INDEX `Br_sasije` (`Br_sasije` ASC, `ID_korisnika` ASC),
  INDEX `ID_korisnika_idx` (`ID_korisnika` ASC),
  CONSTRAINT `Br_sasije`
    FOREIGN KEY (`Br_sasije`)
    REFERENCES `rent_a_car_db`.`automobili` (`BR_sasije`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ID_korisnika`
    FOREIGN KEY (`ID_korisnika`)
    REFERENCES `rent_a_car_db`.`korisnik` (`ID_korisnika`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;

--
-- Dumping data for table `iznajmi`
--

INSERT INTO `iznajmi` (`Br_ugovora`, `Br_sasije`, `ID_korisnika`, `Datum_iznajmljivanja`, `Ugovoreni_datum_vracanja`, `Datum_vracanja`, `Komentar`) VALUES
(1, '24Je49P9X5Q937c', 3, '2014-12-17', '2015-01-17', NULL, ''),
(2, '455vQhsC6fn425K', 4, '2014-12-17', '2015-01-15', NULL, '');


-- -----------------------------------------------------
-- Table `rent_a_car_db`.`kvarovi`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rent_a_car_db`.`kvarovi` ;

CREATE TABLE IF NOT EXISTS `rent_a_car_db`.`kvarovi` (
  `ID_kvara` INT(11) NOT NULL AUTO_INCREMENT,
  `ID_sasije` VARCHAR(150) NOT NULL,
  `ID_prijavio` INT(150) NOT NULL COMMENT 'ID_korisnika koji je prijavio kvar',
  `ID_popravio` INT(150) NOT NULL COMMENT 'ID mehanicara',
  `Opis_kvara` TEXT NULL DEFAULT NULL,
  `Datum_prijave` DATE NOT NULL,
  `Datum_popravke` DATE NULL DEFAULT NULL,
  `Cena_delova` VARCHAR(150) NULL DEFAULT NULL,
  `Opis_popravke` TEXT NULL DEFAULT NULL,
  `Opis_stanja` TEXT NOT NULL COMMENT 'Opis opsteg stanja vozila posle popravke',
  PRIMARY KEY (`ID_kvara`),
  INDEX `ID_sasije_idx` (`ID_sasije` ASC),
  INDEX `ID_prijavio_idx` (`ID_prijavio` ASC),
  INDEX `ID_popravio_idx` (`ID_popravio` ASC),
  CONSTRAINT `ID_popravio`
    FOREIGN KEY (`ID_popravio`)
    REFERENCES `rent_a_car_db`.`korisnik` (`ID_korisnika`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ID_prijavio`
    FOREIGN KEY (`ID_prijavio`)
    REFERENCES `rent_a_car_db`.`korisnik` (`ID_korisnika`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ID_sasije`
    FOREIGN KEY (`ID_sasije`)
    REFERENCES `rent_a_car_db`.`automobili` (`BR_sasije`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


--
-- Dumping data for table `kvarovi`
--

INSERT INTO `kvarovi` (`ID_kvara`, `ID_sasije`, `ID_prijavio`, `ID_popravio`, `Opis_kvara`, `Datum_prijave`, `Datum_popravke`, `Cena_delova`, `Opis_popravke`, `Opis_stanja`) VALUES
(1, '24Je49P9X5Q937c', 2, 2, 'brakes are bad', '2015-01-07', '2015-01-07', '1200', 'changed oil in braks', 'Car is now  runing and secure'),
(2, '455vQhsC6fn425K', 2, 2, 'The car is overheating...', '2015-01-07', NULL , '', '', 'The car is overheating and steaming uder the hood'),
(3, '7wsNEm46S6B69Er', 2, 2, 'missing gears when driving', '2015-01-07', NULL , '', '', 'missing gears when driving car');


-- -----------------------------------------------------
-- Table `rent_a_car_db`.`nabavka`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rent_a_car_db`.`nabavka` ;

CREATE TABLE IF NOT EXISTS `rent_a_car_db`.`nabavka` (
  `ID_nabavke` INT(11) NOT NULL AUTO_INCREMENT,
  `ID_narucioca` INT(11) NOT NULL COMMENT 'Povezati sa tabelom u kojoj je ID mehanicara',
  `nabavka` TEXT NOT NULL,
  `datum_nabavke` DATE NOT NULL,
  PRIMARY KEY (`ID_nabavke`),
  INDEX `ID_narucioca_idx` (`ID_narucioca` ASC),
  CONSTRAINT `ID_narucioca`
    FOREIGN KEY (`ID_narucioca`)
    REFERENCES `rent_a_car_db`.`korisnik` (`ID_korisnika`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1;


-- -----------------------------------------------------
-- Table `rent_a_car_db`.`odrzavanje`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rent_a_car_db`.`odrzavanje` ;

CREATE TABLE IF NOT EXISTS `rent_a_car_db`.`odrzavanje` (
  `ID_odrzavanja` INT(11) NOT NULL AUTO_INCREMENT,
  `BROJ_sasije` VARCHAR(150) NOT NULL,
  `ID_mehanicara` INT(11) NOT NULL,
  `Opis_radnje` TEXT NOT NULL,
  `Trenutna_kilom` INT(11) NOT NULL COMMENT 'Trenutna kilometraza vozila',
  `Datum_rada` DATE NOT NULL,
  PRIMARY KEY (`ID_odrzavanja`),
  UNIQUE INDEX `ID_odrzavanja_UNIQUE` (`ID_odrzavanja` ASC),
  INDEX `ID_mehanicara_idx` (`ID_mehanicara` ASC),
  INDEX `BROJ_sasije_idx` (`BROJ_sasije` ASC),
  CONSTRAINT `BROJ_sasije`
    FOREIGN KEY (`BROJ_sasije`)
    REFERENCES `rent_a_car_db`.`automobili` (`BR_sasije`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ID_mehanicara`
    FOREIGN KEY (`ID_mehanicara`)
    REFERENCES `rent_a_car_db`.`korisnik` (`ID_korisnika`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `rent_a_car_db`.`prodati_automobili`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rent_a_car_db`.`prodati_automobili` ;

CREATE TABLE IF NOT EXISTS `rent_a_car_db`.`prodati_automobili` (
  `id_prodaje` INT(11) NOT NULL AUTO_INCREMENT,
  `broj_sasije_vozila` VARCHAR(150) NOT NULL,
  `id_kupca` INT(11) NOT NULL,
  `datum_prodaje` DATE NOT NULL,
  `iznos` INT(11) NOT NULL,
  `placen` TINYINT(4) NOT NULL,
  PRIMARY KEY (`id_prodaje`),
  INDEX `broj_sasije_idx` (`broj_sasije_vozila` ASC),
  INDEX `id_kupca_idx` (`id_kupca` ASC),
  CONSTRAINT `broj_sasije_vozila`
    FOREIGN KEY (`broj_sasije_vozila`)
    REFERENCES `rent_a_car_db`.`automobili` (`BR_sasije`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_kupca`
    FOREIGN KEY (`id_kupca`)
    REFERENCES `rent_a_car_db`.`korisnik` (`ID_korisnika`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


--
-- Dumping data for table `prodati_automobili`
--

INSERT INTO `prodati_automobili` (`id_prodaje`, `broj_sasije_vozila`, `id_kupca`, `datum_prodaje`, `iznos`, `placen`) VALUES
(1, 'ZP9cwkDW8M5xafk', 3, '2014-12-17', 35000, 1),
(2, 'Uax427n9e2Uj6Ke', 4, '2014-12-17', 21480, 0);


-- -----------------------------------------------------
-- Table `rent_a_car_db`.`transakcije`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rent_a_car_db`.`transakcije` ;

CREATE TABLE IF NOT EXISTS `rent_a_car_db`.`transakcije` (
  `id_transakcije` INT(11) NOT NULL AUTO_INCREMENT,
  `id_uplatioca` INT(11) NOT NULL,
  `datum_transakcije` DATE NOT NULL,
  `opis_transakcije` VARCHAR(150) NULL DEFAULT NULL,
  `iznos` INT(11) NOT NULL,
  PRIMARY KEY (`id_transakcije`),
  INDEX `id_uplatioca_idx` (`id_uplatioca` ASC),
  CONSTRAINT `id_uplatioca`
    FOREIGN KEY (`id_uplatioca`)
    REFERENCES `rent_a_car_db`.`korisnik` (`ID_korisnika`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


--
-- Dumping data for table `transakcije`
--

INSERT INTO `transakcije` (`id_transakcije`, `id_uplatioca`, `datum_transakcije`, `opis_transakcije`, `iznos`) VALUES
(1, 3, '2014-12-17', 'kupovina Renault Megane', 35000);


-- -----------------------------------------------------
-- Table `rent_a_car_db`.`zamena_ulja`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rent_a_car_db`.`zamena_ulja` ;

CREATE TABLE IF NOT EXISTS `rent_a_car_db`.`zamena_ulja` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Oil_type` text,
  `BRsasije` VARCHAR(150) NOT NULL,
  `IDmehanicara` INT(11) NOT NULL,
  `Datum_promene` DATE NOT NULL,
  `Kilometraza` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `IDmehanicara_idx` (`IDmehanicara` ASC),
  INDEX `BRsasije_idx` (`BRsasije` ASC),
  CONSTRAINT `IDmehanicara`
    FOREIGN KEY (`IDmehanicara`)
    REFERENCES `rent_a_car_db`.`korisnik` (`ID_korisnika`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `BRsasije`
    FOREIGN KEY (`BRsasije`)
    REFERENCES `rent_a_car_db`.`automobili` (`BR_sasije`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1;


--
-- Dumping data for table `zamena_ulja`
--

INSERT INTO `zamena_ulja` (`ID`, `Oil_type`, `BRsasije`, `IDmehanicara`, `Datum_promene`, `Kilometraza`) VALUES
(11, 'Shell', '24Je49P9X5Q937c', 2, '2015-01-06', 34210),
(12, 'Mol', '596G433vEv8g38R', 1, '2015-01-06', 15421);


-- -----------------------------------------------------
-- Table `rent_a_car_db`.`events`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rent_a_car_db`.`events` ;

CREATE TABLE IF NOT EXISTS `rent_a_car_db`.`events` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `start_date` DATETIME NOT NULL,
  `end_date` DATETIME NOT NULL,
  `text` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `start_date`, `end_date`, `text`) VALUES
(1, '2014-12-17 09:00', '2014-12-17 10:00', 'korisnik Sasa Malkov kupio auto Renault Megane'),
(2, '2014-12-17 11:00', '2014-12-17 12:00', 'korisnik Sasa Malkov iznajmio auto HONDA ACCORD AUTOMATIC'),
(3, '2015-01-17 11:00', '2015-01-17 12:00', 'korisnik Sasa Malkov treba da vrati auto HONDA ACCORD AUTOMATIC'),
(4, '2014-12-17 12:00', '2014-12-17 13:00', 'korisnik Nenad Mitic iznajmio auto HONDA ACCORD 2.0'),
(5, '2015-01-15 12:00', '2015-01-15 13:00', 'korisnik Nenad Mitic treba da vrati auto HONDA ACCORD 2.0');


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
USE `rent_a_car_db`;

DELIMITER $$

USE `rent_a_car_db`$$
DROP TRIGGER IF EXISTS `rent_a_car_db`.`automobili_BINS` $$
USE `rent_a_car_db`$$
CREATE TRIGGER `automobili_BINS` BEFORE INSERT ON `automobili`
 FOR EACH ROW SET NEW.Datum_unosa=curdate()$$


USE `rent_a_car_db`$$
DROP TRIGGER IF EXISTS `rent_a_car_db`.`iznajmi_AINS` $$
USE `rent_a_car_db`$$
CREATE TRIGGER `iznajmi_AINS` AFTER INSERT ON `iznajmi`
 FOR EACH ROW UPDATE automobili
	SET Iznajmljen=1
	WHERE new.Br_sasije=automobili.BR_sasije$$


USE `rent_a_car_db`$$
DROP TRIGGER IF EXISTS `rent_a_car_db`.`iznajmi_AUPD` $$
USE `rent_a_car_db`$$
CREATE TRIGGER `iznajmi_AUPD` AFTER UPDATE ON `iznajmi`
 FOR EACH ROW UPDATE automobili
	SET Iznajmljen=0
	WHERE new.Br_sasije=automobili.BR_sasije$$


USE `rent_a_car_db`$$
DROP TRIGGER IF EXISTS `rent_a_car_db`.`kvarovi_BINS` $$
USE `rent_a_car_db`$$
CREATE TRIGGER `kvarovi_BINS` BEFORE INSERT ON `kvarovi`
 FOR EACH ROW set new.Datum_prijave=curdate()$$


USE `rent_a_car_db`$$
DROP TRIGGER IF EXISTS `rent_a_car_db`.`nabavka_BINS` $$
USE `rent_a_car_db`$$
CREATE TRIGGER `nabavka_BINS` BEFORE INSERT ON `nabavka`
 FOR EACH ROW set new.datum_nabavke=curdate()$$


USE `rent_a_car_db`$$
DROP TRIGGER IF EXISTS `rent_a_car_db`.`odrzavanje_BINS` $$
USE `rent_a_car_db`$$
CREATE TRIGGER `odrzavanje_BINS` BEFORE INSERT ON `odrzavanje`
 FOR EACH ROW set new.Datum_rada=curdate()$$


USE `rent_a_car_db`$$
DROP TRIGGER IF EXISTS `rent_a_car_db`.`prodati_automobili_AINS` $$
USE `rent_a_car_db`$$
CREATE TRIGGER `prodati_automobili_AINS` AFTER INSERT ON `prodati_automobili`
 FOR EACH ROW UPDATE automobili
	SET Iznajmljen=1
	WHERE new.broj_sasije_vozila=automobili.BR_sasije$$


USE `rent_a_car_db`$$
DROP TRIGGER IF EXISTS `rent_a_car_db`.`prodati_automobili_BINS` $$
USE `rent_a_car_db`$$
CREATE TRIGGER `prodati_automobili_BINS` BEFORE INSERT ON `prodati_automobili`
 FOR EACH ROW set new.datum_prodaje=curdate()$$


USE `rent_a_car_db`$$
DROP TRIGGER IF EXISTS `rent_a_car_db`.`transakcije_BINS` $$
USE `rent_a_car_db`$$
CREATE TRIGGER `transakcije_BINS` BEFORE INSERT ON `transakcije`
 FOR EACH ROW set new.datum_transakcije=curdate()$$


USE `rent_a_car_db`$$
DROP TRIGGER IF EXISTS `rent_a_car_db`.`zamena_ulja_BINS` $$
USE `rent_a_car_db`$$
CREATE TRIGGER `zamena_ulja_BINS` BEFORE INSERT ON `zamena_ulja`
 FOR EACH ROW set new.Datum_promene=curdate()
$$


USE `rent_a_car_db`$$
DROP TRIGGER IF EXISTS `rent_a_car_db`.`zamena_ulja_AINS` $$
CREATE TRIGGER `zamena_ulja_AINS` AFTER INSERT ON `zamena_ulja`
FOR EACH ROW UPDATE automobili
	SET Kilometraza=new.Kilometraza
	WHERE new.BRsasije=automobili.BR_sasije
$$


USE `rent_a_car_db`$$
DROP TRIGGER IF EXISTS `rent_a_car_db`.`kvarovi_AINS` $$
CREATE TRIGGER `kvarovi_AINS` AFTER INSERT ON `kvarovi`
FOR EACH ROW UPDATE automobili
	SET Iznajmljen=1
	WHERE new.ID_sasije=automobili.BR_sasije
$$
	

USE `rent_a_car_db`$$
DROP TRIGGER IF EXISTS `rent_a_car_db`.`kvarovi_BUPD` $$
CREATE TRIGGER `kvarovi_BUPD` BEFORE UPDATE ON `kvarovi` 
FOR EACH ROW 

	UPDATE automobili
	SET Iznajmljen=0
	WHERE new.ID_sasije=automobili.BR_sasije;

$$


DELIMITER ;
