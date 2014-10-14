-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2014 at 06:33 AM
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
  `cus_user_passwd` varchar(255) NOT NULL,
  `cus_contact_num` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `cus_type`, `cus_company`, `cus_fname`, `cus_lname`, `cus_user_name`, `cus_user_passwd`, `cus_contact_num`) VALUES
(1, 'Retail', 'APC', 'Nikko', 'Espiritu', 'nikko123', '299bea33bdf9e2f0488bdb09dc1d36affecd4c078aa4d0753f33d22b5c0d4a13', '0981231238'),
(2, 'Retail', 'JM''s Sari-sari Store', 'John Michael', 'Santos', 'jmsantos', 'e40db1e082687dffb2ef298f56e3a6c56faf3142e1103f1917e80c0e228bd478', '09428032613'),
(3, 'Wholesale', 'Milantrovaltis Wholesale Inc.', 'Carlos Daniel', 'Nerez', 'admin', '69f00a573073b56f9ac48463e6ced3e7f11dc834f4ee5010c90dd807124f6d38', '09226905245');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `del_add`, `del_city`, `del_country`, `del_zip`, `customer_id`) VALUES
(4, '1234-A Juan Luna st, Paseo De Roxas', 'Makati', 'Philippines', '1000', 1),
(5, '1442 Mactan Street Baclaran', 'Paranaque City', 'Philippines', '0710', 2),
(6, 'Unit 18B03 Victoria de Manila, Taft Avenue', 'Manila', 'Philippines', '1007', 3);

-- --------------------------------------------------------

--
-- Table structure for table `item_inventory`
--

CREATE TABLE IF NOT EXISTS `item_inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_desc` varchar(100) NOT NULL,
  `item_price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `item_inventory`
--

INSERT INTO `item_inventory` (`id`, `item_desc`, `item_price`) VALUES
(1, 'Peanut Butter 200 grams', '500'),
(2, 'Marshmallow 5 grams', '10'),
(3, 'Marshmallow 120 grams', '900');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `order_date`, `order_total`, `payment_total`, `order_status`, `customer_id`, `delivery_id`, `payment_method_id`) VALUES
(4, '2014-08-01', '500', '0', 'Approved', 1, 4, 1),
(5, '2014-08-02', '21', '700', 'Approved', 2, 5, 2),
(6, '2014-08-20', '900', '0', 'Pending', 3, 6, 3),
(7, '2014-10-14', '5000', '5000', 'Approved', 1, 4, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `item_qty`, `item_inventory_id`, `order_id`) VALUES
(2, 1, 1, 4),
(3, 3, 2, 5),
(5, 1, 3, 6);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `payment_type`, `payment_desc`, `payment_method`, `card_no`, `cvc_no`, `card_type`, `bank_name`, `card_expire`, `payment_terms_id`) VALUES
(1, 'CARD', 'CARD', 'CARD', 2147483647, 123, 'CREDIT', 'BDO', '2014-08-12', 1),
(2, 'CARD', 'CARD', 'CARD', 12345, 777, 'DEBIT', 'BPI', '2014-08-06', 2),
(3, 'CARD', 'CARD', 'CARD', 2147483647, 152, 'CREDIT', 'BPI', '2014-08-31', 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `payment_terms`
--

INSERT INTO `payment_terms` (`id`, `pay_terms`, `pay_per_month`, `pay_discount`) VALUES
(1, 5, 100, 0),
(2, 1, 2500, 250),
(3, 9, 100, 20);

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
