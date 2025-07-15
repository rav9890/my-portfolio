-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2024 at 09:39 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clg_online_auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_boli`
--

CREATE TABLE IF NOT EXISTS `tbl_boli` (
  `boli_id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pname` varchar(55) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `boli` varchar(22) NOT NULL,
  PRIMARY KEY (`boli_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `tbl_boli`
--

INSERT INTO `tbl_boli` (`boli_id`, `seller_id`, `product_id`, `pname`, `user_id`, `name`, `boli`) VALUES
(30, 1, 14, 'WIfi Module', 2, 'Anup Kumar', '100'),
(31, 1, 14, 'WIfi Module', 2, 'Anup Kumar', '110'),
(32, 1, 14, 'WIfi Module', 3, 'Rakesh Charde', '120'),
(33, 1, 14, 'WIfi Module', 3, 'Rakesh Charde', '130'),
(34, 1, 14, 'WIfi Module', 2, 'Anup Kumar', '140'),
(35, 1, 16, 'Wow Furniture', 2, 'Anup Kumar', '1100'),
(36, 1, 16, 'Wow Furniture', 3, 'Rakesh Charde', '1400'),
(37, 1, 16, 'Wow Furniture', 2, 'Anup Kumar', '1700'),
(38, 1, 16, 'Wow Furniture', 3, 'Rakesh Charde', '1900'),
(39, 1, 16, 'Wow Furniture', 2, 'Anup Kumar', '2100'),
(40, 1, 17, 'MI Tv', 2, 'Anup Kumar', '100'),
(41, 1, 17, 'MI Tv', 3, 'Rakesh Charde', '500'),
(42, 1, 17, 'MI Tv', 2, 'Anup Kumar', '700'),
(43, 5, 18, 'Mens Pants', 2, 'Anup Kumar', '4000'),
(44, 5, 18, 'Mens Pants', 3, 'Rakesh Charde', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_boli1`
--

CREATE TABLE IF NOT EXISTS `tbl_boli1` (
  `boli_id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pname` varchar(55) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `boli` varchar(22) NOT NULL,
  PRIMARY KEY (`boli_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `tbl_boli1`
--

INSERT INTO `tbl_boli1` (`boli_id`, `seller_id`, `product_id`, `pname`, `user_id`, `name`, `boli`) VALUES
(8, 2, 9, 'Dell Laptop', 2, 'Anup Kumar', '500'),
(11, 2, 8, 'Sunking', 3, 'Rakesh Charde', '320'),
(14, 2, 10, 'Microwave', 2, 'Anup Kumar', '1400'),
(21, 2, 11, 'New Bike', 2, 'Anup Kumar', '29000'),
(31, 1, 14, 'WIfi Module', 2, 'Anup Kumar', '140'),
(36, 1, 16, 'Wow Furniture', 2, 'Anup Kumar', '2100'),
(39, 1, 17, 'MI Tv', 2, 'Anup Kumar', '700'),
(41, 5, 18, 'Mens Pants', 3, 'Rakesh Charde', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(70) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category`) VALUES
(2, 'Furniture'),
(3, 'LED TV'),
(4, 'mobile');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE IF NOT EXISTS `tbl_products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `company` varchar(55) NOT NULL,
  `category` varchar(55) NOT NULL,
  `pname` varchar(55) NOT NULL,
  `price` varchar(22) NOT NULL,
  `file` varchar(200) NOT NULL,
  `adate` varchar(22) NOT NULL,
  `start` varchar(22) NOT NULL,
  `valid` varchar(22) NOT NULL,
  `pstatus` varchar(22) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `seller_id`, `name`, `company`, `category`, `pname`, `price`, `file`, `adate`, `start`, `valid`, `pstatus`) VALUES
(16, 1, 'Ravi Chutey', 'Plywood Company', 'Furniture', 'Wow Furniture', '1000', 'ePenguins.jpg', 'Nov 20 2021', '16:15:00', '16:18:00', 'APPROVED'),
(17, 1, 'Ravi Chutey', 'Plywood Company', 'LED TV', 'MI Tv', '1200', 'eTulips.jpg', 'Dec 26 2021', '13:15:09', '13:16:09', 'APPROVED'),
(18, 5, 'vaibhav wasnik', 'xyz', 'Furniture', 'Mens Pants', '100', 'ellogo.JPG', 'Apr 18 2023', '12:51:01', '12:53:01', 'APPROVED');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sellers`
--

CREATE TABLE IF NOT EXISTS `tbl_sellers` (
  `seller_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `company` varchar(55) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(44) NOT NULL,
  `file` varchar(200) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`seller_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_sellers`
--

INSERT INTO `tbl_sellers` (`seller_id`, `name`, `contact`, `company`, `address`, `city`, `file`, `username`, `password`) VALUES
(1, 'Ravi Chutey', '767544321', 'Plywood Company', 'Parvati nagar, bhandara', 'Bhandara', '', 'ravi', 'ravi123'),
(2, 'Ankit Gaur', '8745142333', 'Raj Enterprises', 'Maskasath, ngp', 'Nagpur', '', 'raj', 'raj123'),
(4, 'Rajat Nemane', '6756544544', 'XYZ Company', 'Ram Sagar road m ngp', 'Bhandara', 'econtact_us.jpg', 'rajat', 'rajat123'),
(5, 'vaibhav wasnik', '7972844899', 'xyz', 'sai nagar,nagpur', 'Nagpur', 'elogo_15.png', 'vaibhav', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(44) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `name`, `contact`, `address`, `city`, `email`, `username`, `password`) VALUES
(2, 'Anup Kumar', '9579047478', 'Reshimbagh, nagpur', 'Nagpur', 'anup@gmail.com', 'anup', 'anup123'),
(3, 'Rakesh Charde', '7656434323', 'Narsala road , nagpur', 'nagpur', 'rakesh@gmail.com', 'rakesh', 'rakesh123');
