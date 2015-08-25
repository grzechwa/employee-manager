-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema employee
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema employee
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `employee` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `employee` ;

-- -----------------------------------------------------
-- Table `employee`.`dzial`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `employee`.`dzial` ;

CREATE TABLE IF NOT EXISTS `employee`.`dzial` (
  `id_dzial` INT NOT NULL AUTO_INCREMENT,
  `nazwa_dzialu` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_dzial`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `employee`.`stanowisko`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `employee`.`stanowisko` ;

CREATE TABLE IF NOT EXISTS `employee`.`stanowisko` (
  `id_stanowisko` INT NOT NULL AUTO_INCREMENT,
  `nazwa_stanowiska` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_stanowisko`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `employee`.`pracownik`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `employee`.`pracownik` ;

CREATE TABLE IF NOT EXISTS `employee`.`pracownik` (
  `id_pracownik` INT NOT NULL AUTO_INCREMENT,
  `data_urodzin` DATE NULL,
  `imie` VARCHAR(15) NOT NULL,
  `nazwisko` VARCHAR(25) NOT NULL,
  `data_pracy` DATE NULL,
  `login` VARCHAR(20) NULL,
  `password` VARCHAR(32) NULL,
  `id_dzial` INT NOT NULL,
  `id_stanowisko` INT NOT NULL,
  `image` VARCHAR(45) NULL,
  PRIMARY KEY (`id_pracownik`),
  INDEX `fk_pracownik_dzial_idx` (`id_dzial` ASC),
  INDEX `fk_pracownik_stanowisko1_idx` (`id_stanowisko` ASC),
  CONSTRAINT `fk_pracownik_dzial`
    FOREIGN KEY (`id_dzial`)
    REFERENCES `employee`.`dzial` (`id_dzial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pracownik_stanowisko1`
    FOREIGN KEY (`id_stanowisko`)
    REFERENCES `employee`.`stanowisko` (`id_stanowisko`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `employee`.`dzial`
-- -----------------------------------------------------
START TRANSACTION;
USE `employee`;
INSERT INTO `employee`.`dzial` (`id_dzial`, `nazwa_dzialu`) VALUES (NULL, 'Promocja');
INSERT INTO `employee`.`dzial` (`id_dzial`, `nazwa_dzialu`) VALUES (NULL, 'RD');
INSERT INTO `employee`.`dzial` (`id_dzial`, `nazwa_dzialu`) VALUES (NULL, 'HR');
INSERT INTO `employee`.`dzial` (`id_dzial`, `nazwa_dzialu`) VALUES (NULL, 'Ksiegowosc');
INSERT INTO `employee`.`dzial` (`id_dzial`, `nazwa_dzialu`) VALUES (NULL, 'Gospodarczy');

COMMIT;


-- -----------------------------------------------------
-- Data for table `employee`.`stanowisko`
-- -----------------------------------------------------
START TRANSACTION;
USE `employee`;
INSERT INTO `employee`.`stanowisko` (`id_stanowisko`, `nazwa_stanowiska`) VALUES (NULL, 'Kierownik');
INSERT INTO `employee`.`stanowisko` (`id_stanowisko`, `nazwa_stanowiska`) VALUES (NULL, 'Programista');
INSERT INTO `employee`.`stanowisko` (`id_stanowisko`, `nazwa_stanowiska`) VALUES (NULL, 'Menedżer');
INSERT INTO `employee`.`stanowisko` (`id_stanowisko`, `nazwa_stanowiska`) VALUES (NULL, 'Sprzataczka');

COMMIT;


-- -----------------------------------------------------
-- Data for table `employee`.`pracownik`
-- -----------------------------------------------------
START TRANSACTION;
USE `employee`;
INSERT INTO `employee`.`pracownik` (`id_pracownik`, `data_urodzin`, `imie`, `nazwisko`, `data_pracy`, `login`, `password`, `id_dzial`, `id_stanowisko`, `image`) VALUES (NULL, '', 'Jan', 'Kowalski', NULL, 'test', 'test', 1, 1, 'res/img/empl/emp01.jpg');
INSERT INTO `employee`.`pracownik` (`id_pracownik`, `data_urodzin`, `imie`, `nazwisko`, `data_pracy`, `login`, `password`, `id_dzial`, `id_stanowisko`, `image`) VALUES (NULL, NULL, 'Teofil', 'Rozyc', NULL, 'test', 'test', 2, 1, 'res/img/empl/emp02.jpg');
INSERT INTO `employee`.`pracownik` (`id_pracownik`, `data_urodzin`, `imie`, `nazwisko`, `data_pracy`, `login`, `password`, `id_dzial`, `id_stanowisko`, `image`) VALUES (NULL, NULL, 'Ligia', 'Kochowska', NULL, 'a', 'a', 4, 3, 'res/img/empl/emp03.jpg');
INSERT INTO `employee`.`pracownik` (`id_pracownik`, `data_urodzin`, `imie`, `nazwisko`, `data_pracy`, `login`, `password`, `id_dzial`, `id_stanowisko`, `image`) VALUES (NULL, NULL, 'Wespazjan', 'Hood', NULL, 'b', 'b', 3, 3, 'res/img/empl/emp04.jpg');
INSERT INTO `employee`.`pracownik` (`id_pracownik`, `data_urodzin`, `imie`, `nazwisko`, `data_pracy`, `login`, `password`, `id_dzial`, `id_stanowisko`, `image`) VALUES (NULL, NULL, 'Ewa', 'Lang', NULL, 'test', 'test', 4, 1, 'res/img/empl/emp05.jpg');

COMMIT;

