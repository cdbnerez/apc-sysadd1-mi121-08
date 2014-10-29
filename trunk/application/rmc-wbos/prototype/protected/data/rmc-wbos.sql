SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `rmc-wbos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `rmc-wbos` ;

-- -----------------------------------------------------
-- Table `rmc-wbos`.`customer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rmc-wbos`.`customer` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `cus_type` VARCHAR(45) NOT NULL,
  `cus_company` VARCHAR(45) NULL DEFAULT NULL,
  `cus_fname` VARCHAR(45) NOT NULL,
  `cus_lname` VARCHAR(45) NOT NULL,
  `cus_user_name` VARCHAR(45) NOT NULL,
  `cus_user_passwd` VARCHAR(255) NOT NULL,
  `cus_contact_num` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `rmc-wbos`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rmc-wbos`.`order` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `order_date` DATE NOT NULL,
  `order_status` VARCHAR(45) NOT NULL,
  `customer_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_order_customer1_idx` (`customer_id` ASC),
  CONSTRAINT `fk_order_customer1`
    FOREIGN KEY (`customer_id`)
    REFERENCES `rmc-wbos`.`customer` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `rmc-wbos`.`delivery`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rmc-wbos`.`delivery` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `del_add` VARCHAR(255) NOT NULL,
  `del_city` VARCHAR(45) NOT NULL,
  `del_country` VARCHAR(45) NOT NULL,
  `del_zip` VARCHAR(10) NULL DEFAULT NULL,
  `order_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_delivery_order1_idx` (`order_id` ASC),
  CONSTRAINT `fk_delivery_order1`
    FOREIGN KEY (`order_id`)
    REFERENCES `rmc-wbos`.`order` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `rmc-wbos`.`item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rmc-wbos`.`item` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `item_desc` VARCHAR(100) NOT NULL,
  `item_price` DECIMAL(10,0) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `rmc-wbos`.`order_list`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rmc-wbos`.`order_list` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `item_qty` INT(11) NOT NULL,
  `order_list_total_amount` DECIMAL(10,0) NOT NULL,
  `item_order_total` DECIMAL(10,0) NOT NULL,
  `item_id` INT(11) NOT NULL,
  `order_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_order_list_order1_idx` (`order_id` ASC),
  INDEX `fk_order_list_item1_idx` (`item_id` ASC),
  CONSTRAINT `fk_order_list_order1`
    FOREIGN KEY (`order_id`)
    REFERENCES `rmc-wbos`.`order` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_list_item1`
    FOREIGN KEY (`item_id`)
    REFERENCES `rmc-wbos`.`item` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `rmc-wbos`.`payment_method`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rmc-wbos`.`payment_method` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `payment_type` VARCHAR(5) NOT NULL,
  `payment_desc` VARCHAR(45) NOT NULL,
  `bank_name` VARCHAR(45) NOT NULL,
  `payment_terms` INT NOT NULL,
  `payment_per_month` INT NOT NULL,
  `payment_discount` INT NOT NULL,
  `payment_total_amount` DECIMAL(10,0) NOT NULL,
  `order_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_payment_method_order1_idx` (`order_id` ASC),
  CONSTRAINT `fk_payment_method_order1`
    FOREIGN KEY (`order_id`)
    REFERENCES `rmc-wbos`.`order` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
