SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `rmc-wbos` DEFAULT CHARACTER SET utf8 ;
USE `rmc-wbos` ;

-- -----------------------------------------------------
-- Table `rmc-wbos`.`customer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rmc-wbos`.`customer` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cus_type` VARCHAR(45) NOT NULL,
  `cus_company` VARCHAR(45) NULL,
  `cus_fname` VARCHAR(45) NOT NULL,
  `cus_lname` VARCHAR(45) NOT NULL,
  `cus_user_name` VARCHAR(45) NOT NULL,
  `cus_user_passwd` VARCHAR(45) NOT NULL,
  `cus_contact_num` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rmc-wbos`.`delivery`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rmc-wbos`.`delivery` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `del_add` VARCHAR(45) NOT NULL,
  `del_city` VARCHAR(45) NOT NULL,
  `del_country` VARCHAR(45) NOT NULL,
  `del_zip` VARCHAR(10) NULL,
  `customer_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_delivery_customer1_idx` (`customer_id` ASC),
  CONSTRAINT `fk_delivery_customer1`
    FOREIGN KEY (`customer_id`)
    REFERENCES `rmc-wbos`.`customer` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rmc-wbos`.`payment_terms`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rmc-wbos`.`payment_terms` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pay_terms` INT NOT NULL,
  `pay_per_month` INT NOT NULL,
  `pay_discount` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rmc-wbos`.`payment_method`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rmc-wbos`.`payment_method` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `payment_type` VARCHAR(5) NOT NULL,
  `payment_desc` VARCHAR(45) NOT NULL,
  `payment_method` VARCHAR(45) NOT NULL,
  `card_no` INT NOT NULL,
  `cvc_no` INT NOT NULL,
  `card_type` VARCHAR(45) NOT NULL,
  `bank_name` VARCHAR(45) NOT NULL,
  `card_expire` DATE NOT NULL,
  `payment_terms_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_payment_method_payment_terms1_idx` (`payment_terms_id` ASC),
  CONSTRAINT `fk_payment_method_payment_terms1`
    FOREIGN KEY (`payment_terms_id`)
    REFERENCES `rmc-wbos`.`payment_terms` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rmc-wbos`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rmc-wbos`.`order` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `order_date` VARCHAR(45) NOT NULL,
  `order_total` DECIMAL NOT NULL,
  `payment_total` DECIMAL NOT NULL,
  `order_status` VARCHAR(45) NOT NULL,
  `customer_id` INT NOT NULL,
  `delivery_id` INT NOT NULL,
  `payment_method_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_order_customer1_idx` (`customer_id` ASC),
  INDEX `fk_order_delivery1_idx` (`delivery_id` ASC),
  INDEX `fk_order_payment_method1_idx` (`payment_method_id` ASC),
  CONSTRAINT `fk_order_customer1`
    FOREIGN KEY (`customer_id`)
    REFERENCES `rmc-wbos`.`customer` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_delivery1`
    FOREIGN KEY (`delivery_id`)
    REFERENCES `rmc-wbos`.`delivery` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_payment_method1`
    FOREIGN KEY (`payment_method_id`)
    REFERENCES `rmc-wbos`.`payment_method` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rmc-wbos`.`item_inventory`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rmc-wbos`.`item_inventory` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `item_desc` VARCHAR(100) NOT NULL,
  `item_price` DECIMAL NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rmc-wbos`.`order_list`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rmc-wbos`.`order_list` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `item_qty` INT NOT NULL,
  `item_inventory_id` INT NOT NULL,
  `order_id` INT NOT NULL,
  INDEX `fk_order_list_item_inventory1_idx` (`item_inventory_id` ASC),
  PRIMARY KEY (`id`),
  INDEX `fk_order_list_order1_idx` (`order_id` ASC),
  CONSTRAINT `fk_order_list_item_inventory1`
    FOREIGN KEY (`item_inventory_id`)
    REFERENCES `rmc-wbos`.`item_inventory` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_list_order1`
    FOREIGN KEY (`order_id`)
    REFERENCES `rmc-wbos`.`order` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
