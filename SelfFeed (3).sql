-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2016 at 04:04 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SelfFeed`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(64) unsigned NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `salt` varchar(64) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `salt`, `active`) VALUES
(2, 'admin', '937abe8abb696c477037a33236f185c06062137681a4a4be07d375ee11e37fa5c5e36d61b5e43bd3de5918d7147f21e2fcd1849f29efae69be8378f889275865', '17683199', 1),
(3, 'admin_1', '3a0c9762383fcc56498bc2f9f0906b17bf4e32f36647f162623e4a118e7739788647e06c58abd84a0f980cdef999fea3ab7b49e444210da56133bc26b1fc04c7', '44051393', 0);

-- --------------------------------------------------------

--
-- Table structure for table `food_ingredients`
--

CREATE TABLE IF NOT EXISTS `food_ingredients` (
  `id` int(64) NOT NULL,
  `product_id` int(64) NOT NULL,
  `ingredient_id` int(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_ingredients`
--

INSERT INTO `food_ingredients` (`id`, `product_id`, `ingredient_id`) VALUES
(12, 10, 10),
(13, 10, 7),
(14, 10, 8),
(15, 11, 5),
(16, 11, 7),
(17, 11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int(64) unsigned NOT NULL,
  `name` varchar(128) NOT NULL,
  `picture` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `picture`) VALUES
(5, 'Lime', './Image/ingredients/Lime.png'),
(6, 'Italian Parsley', './Image/ingredients/Parsley.png'),
(7, 'Tomato', './Image/ingredients/Tomato.png'),
(8, 'Ketchup', './Image/ingredients/ketchup.png'),
(9, 'corn', './Image/ingredients/corn.png'),
(10, 'Mozzarella', './Image/ingredients/butter.png'),
(11, 'Butter', './Image/ingredients/butter.png');

-- --------------------------------------------------------

--
-- Table structure for table `job_applicants`
--

CREATE TABLE IF NOT EXISTS `job_applicants` (
  `id` int(64) unsigned NOT NULL,
  `job_number` int(64) NOT NULL,
  `firstName` varchar(128) NOT NULL,
  `lastName` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `linkedIn` varchar(256) DEFAULT NULL,
  `resume` varchar(256) NOT NULL,
  `coverLetter` varchar(256) DEFAULT NULL,
  `howDid` varchar(512) NOT NULL,
  `whyUs` varchar(512) NOT NULL,
  `whyThis` varchar(512) NOT NULL,
  `howYou` varchar(512) DEFAULT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_applicants`
--

INSERT INTO `job_applicants` (`id`, `job_number`, `firstName`, `lastName`, `email`, `phone`, `linkedIn`, `resume`, `coverLetter`, `howDid`, `whyUs`, `whyThis`, `howYou`, `read`) VALUES
(2, 2, 'Brian', 'Ruchiadi', 'ruchiadibrian@yahoo.com', '0168079796', '', './CV_and_Resume/test.docx', NULL, 'Online                                ', 'Opportunity                                ', 'I love to ride                                ', 'Friendly                                ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_vacancy`
--

CREATE TABLE IF NOT EXISTS `job_vacancy` (
  `id` int(64) unsigned NOT NULL,
  `job_name` varchar(64) NOT NULL,
  `job_description` varchar(512) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_vacancy`
--

INSERT INTO `job_vacancy` (`id`, `job_name`, `job_description`, `active`) VALUES
(1, 'Sous Chef', '                                 The executive chef’s assistant and next in charge is a sous chef. It is the job of the sous chef to pick up the slack when the executive chef has a day off or is on vacation. They may need to fill in on the line, or work a particular station on busy nights. Many smaller restaurants don’t keep a sous chef on staff.                                 ', 1),
(2, 'Delivery Crew', 'Be our part of street  riders. Deliver the request with precision to the location.Plenty of benefits awaiting', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(64) unsigned NOT NULL,
  `product_name` varchar(64) NOT NULL,
  `product_quantity` int(64) unsigned NOT NULL,
  `product_price` float NOT NULL,
  `product_active` tinyint(1) NOT NULL,
  `upload_date` date NOT NULL,
  `product_description` varchar(128) DEFAULT NULL,
  `product_brief_description` varchar(64) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_quantity`, `product_price`, `product_active`, `upload_date`, `product_description`, `product_brief_description`) VALUES
(4, 'Grapefruit', 6, 5.45, 0, '2016-10-09', 'Sample product description for grapefruit                                "\r\n                                                    ', NULL),
(5, 'Apple', 20, 1.1, 0, '2016-10-11', 'Description 2', NULL),
(6, 'Honeydew', 6, 10.6, 0, '2016-10-11', 'Description 3', NULL),
(8, 'durian', 5, 40, 0, '2016-10-25', 'Sample text for product description                                ', NULL),
(9, 'Lime', 10, 10, 0, '2016-11-20', '                                                                ', NULL),
(10, 'Spaghetti Bolognese', 10, 11.8, 1, '2016-11-22', 'spaghetti served with a sauce of ground beef, tomato, onion, and herbs.                                                         ', ' Spaghetti with tomato paste                                    '),
(11, 'Spaghetti Carbonara', 15, 11.4, 1, '2016-11-22', '  Carbonara  is an Italian pasta dish from Rome made with eggs, cheese (Pecorino Romano or Parmigiano-Reggiano), bacon (guancial', '   Spaghetti with Mozzarella cheese, and herbs                  ');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE IF NOT EXISTS `products_images` (
  `id` int(64) unsigned NOT NULL,
  `product_id` int(64) NOT NULL,
  `product_image` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `product_image`) VALUES
(2, 4, './Image/products/grapefruit.jpeg'),
(3, 5, './Image/products/apple.jpeg'),
(4, 6, './Image/products/honeydew.jpg'),
(5, 7, './Image/products/durian.jpeg'),
(6, 8, './Image/products/durian.jpeg'),
(7, 9, './Image/products/Lime.png'),
(8, 10, './Image/products/spaghetti_bolognese.jpg'),
(9, 11, './Image/products/spaghetti_carbonara.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `store_status`
--

CREATE TABLE IF NOT EXISTS `store_status` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_status`
--

INSERT INTO `store_status` (`id`, `status`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` int(64) unsigned NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`) VALUES
(1, 'ruchiadibrian@yahoo.com'),
(6, 'user2@yahoo.com'),
(7, 'user3@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(64) unsigned NOT NULL,
  `user_id` int(64) NOT NULL,
  `product_id` int(64) NOT NULL,
  `quantity` int(64) NOT NULL,
  `price` float NOT NULL,
  `transaction_status` tinyint(1) NOT NULL,
  `transaction_date` date NOT NULL,
  `delivery_request` date NOT NULL,
  `delivery_location` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `product_id`, `quantity`, `price`, `transaction_status`, `transaction_date`, `delivery_request`, `delivery_location`) VALUES
(1, 1, 10, 5, 11.8, 2, '2016-11-23', '2016-11-26', ''),
(2, 1, 10, 4, 11.8, 2, '2016-11-23', '2016-11-26', ''),
(3, 1, 10, 2, 11.8, 2, '2016-11-28', '2016-11-29', ''),
(4, 1, 11, 1, 11.4, 5, '2016-11-28', '2016-11-29', ''),
(5, 14, 11, 1, 11.4, 5, '2016-11-30', '2016-12-01', ''),
(6, 14, 10, 1, 11.8, 5, '2016-11-30', '2016-12-01', ''),
(7, 13, 11, 1, 11.4, 5, '2016-12-09', '2016-12-10', 'Sunway University');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_status`
--

CREATE TABLE IF NOT EXISTS `transaction_status` (
  `id` int(64) unsigned NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_status`
--

INSERT INTO `transaction_status` (`id`, `status`) VALUES
(1, 'FAILED'),
(2, 'SUCCESS'),
(3, 'PROCESSING'),
(4, 'PENDING'),
(5, 'UNPROCESSED'),
(6, 'CANCELED');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(64) unsigned NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(32) NOT NULL,
  `contact_no` varchar(32) DEFAULT NULL,
  `join_date` date NOT NULL,
  `active` tinyint(1) NOT NULL,
  `salt` varchar(64) NOT NULL,
  `address` varchar(256) DEFAULT NULL,
  `first_name` varchar(64) DEFAULT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `post_code` int(32) DEFAULT NULL,
  `state` varchar(32) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `contact_no`, `join_date`, `active`, `salt`, `address`, `first_name`, `last_name`, `city`, `post_code`, `state`) VALUES
(1, 'ruchiadibrian', '64b35d3b54999298a3a30a383fc183b5f42610fc7a4f2012095fead920acf5ee', 'ruchiadibrian@yahoo.com', '0168079796', '2016-10-03', 1, '89635570', 'Jalan PJS 11/12, Bandar Sunway, 47500 Subang Jaya, Selangor, Malaysia', 'Brian', 'Ruchiadi', 'Bandar Sunway', 47500, 'selangor'),
(13, 'Brian', '8d6e4fe24df9b2c2a6cd89f204d0777188e7d60efe17576da84a727022014833', 'ruchiadibria@yahoo.com', '0168079796', '2016-11-30', 1, '68915138', 'Petaling Jaya', 'Brian', '', 'Bandar Sunway', 47500, 'selangor');

-- --------------------------------------------------------

--
-- Table structure for table `users_optional_address`
--

CREATE TABLE IF NOT EXISTS `users_optional_address` (
  `id` int(64) NOT NULL,
  `user_id` int(64) NOT NULL,
  `address_type` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `state` varchar(256) NOT NULL,
  `postcode` int(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_optional_address`
--

INSERT INTO `users_optional_address` (`id`, `user_id`, `address_type`, `address`, `city`, `state`, `postcode`) VALUES
(1, 13, 'home', 'Sunway University', 'bandar sunway', 'selangor', 47500),
(3, 13, 'work', 'Level 21, Menara Maxis,Kuala Lumpur City Centre,Off Jalan Ampang, Kuala Lumpur City Centre, 50450 Kuala Lumpur, Malaysia', 'Kuala Lumpur', 'selangor', 50450);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `food_ingredients`
--
ALTER TABLE `food_ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `job_applicants`
--
ALTER TABLE `job_applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_status`
--
ALTER TABLE `store_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_status`
--
ALTER TABLE `transaction_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users_optional_address`
--
ALTER TABLE `users_optional_address`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(64) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `food_ingredients`
--
ALTER TABLE `food_ingredients`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(64) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `job_applicants`
--
ALTER TABLE `job_applicants`
  MODIFY `id` int(64) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  MODIFY `id` int(64) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(64) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` int(64) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `store_status`
--
ALTER TABLE `store_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(64) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(64) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `transaction_status`
--
ALTER TABLE `transaction_status`
  MODIFY `id` int(64) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(64) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users_optional_address`
--
ALTER TABLE `users_optional_address`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
