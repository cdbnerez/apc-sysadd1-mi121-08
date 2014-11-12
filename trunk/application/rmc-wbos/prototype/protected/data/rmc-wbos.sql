-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2014 at 04:25 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rmc-wbos`
--
CREATE DATABASE IF NOT EXISTS `rmc-wbos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rmc-wbos`;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `cus_type`, `cus_company`, `cus_fname`, `cus_lname`, `cus_user_name`, `cus_user_passwd`, `cus_contact_num`) VALUES
(7, 'Sytem Admin', 'ABC Company', 'Carlos Daniel', 'Nerez', 'cdbnerez', '13bc5da478f4b1ca535308569c29484bdf8bbc299d83f32eb62bb5e99dad06cf', '09226905245'),
(10, 'Retail', 'Masagana Supermarket', 'Felipe', 'Massa', 'fmassa123', '9a59d13d82fc3831eb5def69955a285794e3d45aad3ea9d5ab266431a926764f', '09524563215');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `del_add` varchar(255) NOT NULL,
  `del_city` varchar(45) NOT NULL,
  `del_country` varchar(45) NOT NULL,
  `del_zip` varchar(10) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_delivery_order1_idx` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `del_add`, `del_city`, `del_country`, `del_zip`, `order_id`) VALUES
(7, '18B03 Victoria De Manila', 'Manila', 'Philippines', '1006', 8);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_desc` varchar(100) NOT NULL,
  `item_price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item_desc`, `item_price`) VALUES
(4, 'Peanut Butter - 500 grams', '150'),
(5, 'Peanut Butter - 250 grams', '100'),
(6, 'Marshmallow - 100 grams', '50'),
(7, 'Peanut Brittle - 250 grams', '90');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `order_status` varchar(45) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_total` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_customer1_idx` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `order_date`, `order_status`, `customer_id`, `order_total`) VALUES
(8, '2014-10-29', 'Pending', 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE IF NOT EXISTS `order_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_qty` int(11) NOT NULL,
  `order_list_total_amount` decimal(10,0) DEFAULT NULL,
  `item_order_total` decimal(10,0) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_list_order1_idx` (`order_id`),
  KEY `fk_order_list_item1_idx` (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `item_qty`, `order_list_total_amount`, `item_order_total`, `item_id`, `order_id`) VALUES
(6, 1, '150', '150', 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE IF NOT EXISTS `payment_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(5) NOT NULL,
  `payment_desc` varchar(45) NOT NULL,
  `bank_name` varchar(45) NOT NULL,
  `payment_terms` int(11) NOT NULL,
  `payment_per_month` int(11) NOT NULL,
  `payment_discount` int(11) NOT NULL,
  `payment_total_amount` decimal(10,0) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payment_method_order1_idx` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `payment_type`, `payment_desc`, `bank_name`, `payment_terms`, `payment_per_month`, `payment_discount`, `payment_total_amount`, `order_id`) VALUES
(4, 'CASH', 'Cash (Straight)', 'Robinsons', 0, 150, 0, '150', 8);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `fk_delivery_order1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_list`
--
ALTER TABLE `order_list`
  ADD CONSTRAINT `fk_order_list_item1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_list_order1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD CONSTRAINT `fk_payment_method_order1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
