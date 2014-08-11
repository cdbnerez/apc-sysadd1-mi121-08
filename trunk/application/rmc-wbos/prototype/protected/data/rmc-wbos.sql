-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2014 at 10:23 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rmc-wbos`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_type` varchar(45) NOT NULL,
  `cus_company` varchar(45) DEFAULT NULL,
  `cus_fname` varchar(45) NOT NULL,
  `cus_lname` varchar(45) NOT NULL,
  `cus_user_name` varchar(45) NOT NULL,
  `cus_user_passwd` varchar(45) NOT NULL,
  `cus_contact_num` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `cus_type`, `cus_company`, `cus_fname`, `cus_lname`, `cus_user_name`, `cus_user_passwd`, `cus_contact_num`) VALUES
(1, '1', 'APC', 'Nikko', 'Espiritu', 'nikko123', 'nikko123', '0981231238'),
(2, 'Retail', 'JM''s Sari-sari Store', 'John Michael', 'Santos', 'jmsantos', 'jm8322187', '09428032613');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `del_add` varchar(45) NOT NULL,
  `del_city` varchar(45) NOT NULL,
  `del_country` varchar(45) NOT NULL,
  `del_zip` varchar(10) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_delivery_customer1_idx` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `del_add`, `del_city`, `del_country`, `del_zip`, `customer_id`) VALUES
(4, '1234-A Juan Luna st, Paseo De Roxas', 'Makati', 'Philippines', '1000', 1),
(5, '1442 Mactan Street Baclaran', 'Paranaque City', 'Philippines', '0710', 2);

-- --------------------------------------------------------

--
-- Table structure for table `item_inventory`
--

CREATE TABLE IF NOT EXISTS `item_inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_desc` varchar(100) NOT NULL,
  `item_price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `item_inventory`
--

INSERT INTO `item_inventory` (`id`, `item_desc`, `item_price`) VALUES
(1, 'Peanut Butter 200 grams', '500'),
(2, 'Marshmallow 5grams', '10');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `order_total` decimal(10,0) NOT NULL,
  `payment_total` decimal(10,0) NOT NULL,
  `order_status` varchar(45) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_customer1_idx` (`customer_id`),
  KEY `fk_order_delivery1_idx` (`delivery_id`),
  KEY `fk_order_payment_method1_idx` (`payment_method_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `order_date`, `order_total`, `payment_total`, `order_status`, `customer_id`, `delivery_id`, `payment_method_id`) VALUES
(4, '9999-12-31', '500', '0', 'approved', 1, 4, 1),
(5, '0000-00-00', '21', '700', 'Pending', 2, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE IF NOT EXISTS `order_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_qty` int(11) NOT NULL,
  `item_inventory_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_list_item_inventory1_idx` (`item_inventory_id`),
  KEY `fk_order_list_order1_idx` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `item_qty`, `item_inventory_id`, `order_id`) VALUES
(2, 1, 1, 4),
(3, 3, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE IF NOT EXISTS `payment_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(5) NOT NULL,
  `payment_desc` varchar(45) NOT NULL,
  `payment_method` varchar(45) NOT NULL,
  `card_no` int(11) NOT NULL,
  `cvc_no` int(11) NOT NULL,
  `card_type` varchar(45) NOT NULL,
  `bank_name` varchar(45) NOT NULL,
  `card_expire` date NOT NULL,
  `payment_terms_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payment_method_payment_terms1_idx` (`payment_terms_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `payment_type`, `payment_desc`, `payment_method`, `card_no`, `cvc_no`, `card_type`, `bank_name`, `card_expire`, `payment_terms_id`) VALUES
(1, 'I', 'Installments', 'Installments', 2147483647, 123, 'Credit', 'ABC Bank', '9999-12-31', 1),
(2, '1', 'It is where you credit card to purchase', 'Credit Card', 12345, 7777, 'Credit Card', 'BDO', '0000-00-00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment_terms`
--

CREATE TABLE IF NOT EXISTS `payment_terms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_terms` int(11) NOT NULL,
  `pay_per_month` int(11) NOT NULL,
  `pay_discount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payment_terms`
--

INSERT INTO `payment_terms` (`id`, `pay_terms`, `pay_per_month`, `pay_discount`) VALUES
(1, 5, 100, 0),
(2, 1, 2500, 250);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `fk_delivery_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_delivery1` FOREIGN KEY (`delivery_id`) REFERENCES `delivery` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_payment_method1` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_method` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_list`
--
ALTER TABLE `order_list`
  ADD CONSTRAINT `fk_order_list_item_inventory1` FOREIGN KEY (`item_inventory_id`) REFERENCES `item_inventory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_list_order1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD CONSTRAINT `fk_payment_method_payment_terms1` FOREIGN KEY (`payment_terms_id`) REFERENCES `payment_terms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
