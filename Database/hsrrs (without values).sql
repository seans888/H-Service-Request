-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema hsrrs
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema hsrrs
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `hsrrs` DEFAULT CHARACTER SET utf8 ;
USE `hsrrs` ;

-- -----------------------------------------------------
-- Table `hsrrs`.`room`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hsrrs`.`room` (
  `room_no` INT NOT NULL,
  `room_location` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`room_no`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hsrrs`.`position`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hsrrs`.`position` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pos_name` VARCHAR(25) NOT NULL,
  `pos_des` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hsrrs`.`department`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hsrrs`.`department` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `dept_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hsrrs`.`employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hsrrs`.`employee` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `emp_lname` VARCHAR(20) NOT NULL,
  `emp_fname` VARCHAR(20) NOT NULL,
  `emp_mname` VARCHAR(20) NOT NULL,
  `emp_contact_no` VARCHAR(15) NOT NULL,
  `pos_id` INT NOT NULL,
  `dept_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_EMPLOYEE_JOB1_idx` (`pos_id` ASC),
  INDEX `dept_idx` (`dept_id` ASC),
  CONSTRAINT `fk_EMPLOYEE_JOB1`
    FOREIGN KEY (`pos_id`)
    REFERENCES `hsrrs`.`position` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `dept`
    FOREIGN KEY (`dept_id`)
    REFERENCES `hsrrs`.`department` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hsrrs`.`ticket_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hsrrs`.`ticket_type` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hsrrs`.`ticket_description`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hsrrs`.`ticket_description` (
  `id` INT NOT NULL,
  `tickd_statement` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hsrrs`.`ticket`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hsrrs`.`ticket` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tick_status` VARCHAR(10) NOT NULL,
  `tick_priority` VARCHAR(10) NOT NULL,
  `tick_limit` TIME NOT NULL,
  `tick_closed_time` DATETIME NULL,
  `tick_date` DATETIME NOT NULL,
  `tick_escalate` TINYINT NOT NULL,
  `room_id` INT NOT NULL,
  `employee_id` INT NULL,
  `employee_id1` INT NULL,
  `ticket_type_id` INT NOT NULL,
  `ticket_description_id` INT NOT NULL,
  `department_id` INT NOT NULL,
  `room_room_no` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ticket_employee1_idx` (`employee_id` ASC),
  INDEX `fk_ticket_employee2_idx` (`employee_id1` ASC),
  INDEX `fk_ticket_ticket_type1_idx` (`ticket_type_id` ASC),
  INDEX `fk_ticket_ticket_description1_idx` (`ticket_description_id` ASC),
  INDEX `fk_ticket_department1_idx` (`department_id` ASC),
  INDEX `fk_ticket_room1_idx` (`room_room_no` ASC),
  CONSTRAINT `fk_ticket_employee1`
    FOREIGN KEY (`employee_id`)
    REFERENCES `hsrrs`.`employee` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_employee2`
    FOREIGN KEY (`employee_id1`)
    REFERENCES `hsrrs`.`employee` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_ticket_type1`
    FOREIGN KEY (`ticket_type_id`)
    REFERENCES `hsrrs`.`ticket_type` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_ticket_description1`
    FOREIGN KEY (`ticket_description_id`)
    REFERENCES `hsrrs`.`ticket_description` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_department1`
    FOREIGN KEY (`department_id`)
    REFERENCES `hsrrs`.`department` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_room1`
    FOREIGN KEY (`room_room_no`)
    REFERENCES `hsrrs`.`room` (`room_no`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
