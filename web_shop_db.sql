-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2020 at 05:53 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'a156f048e92b05bbe7f64973019c49c8');

-- --------------------------------------------------------

--
-- Table structure for table `bank_dep_tbl`
--

CREATE TABLE `bank_dep_tbl` (
  `id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `dep_date` varchar(200) NOT NULL,
  `dep_time` time NOT NULL,
  `branch_name` varchar(200) NOT NULL,
  `upolod_slip_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_dep_tbl`
--

INSERT INTO `bank_dep_tbl` (`id`, `payment_id`, `dep_date`, `dep_time`, `branch_name`, `upolod_slip_img`) VALUES
(1, 1, '2020-02-21', '02:00:00', 'asm', 'C:fakepathProject Progress Journal.pdf'),
(2, 5, '2020-12-02', '00:12:00', 'colombo', 'C:fakepathEMkC-R1UcAA-69X.jpg'),
(3, 6, '2200-01-12', '12:12:00', '211221211', 'C:fakepathEMkC-R1UcAA-69X.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `brand_tbl`
--

CREATE TABLE `brand_tbl` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand_tbl`
--

INSERT INTO `brand_tbl` (`brand_id`, `brand_name`) VALUES
(1, 'HP'),
(2, 'Samsung'),
(4, 'LG'),
(5, 'Signature'),
(6, 'Singer'),
(7, 'ASUS'),
(8, 'MI'),
(9, 'General'),
(10, 'lk');

-- --------------------------------------------------------

--
-- Table structure for table `cash_on_delivery`
--

CREATE TABLE `cash_on_delivery` (
  `id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cash_on_delivery`
--

INSERT INTO `cash_on_delivery` (`id`, `payment_id`) VALUES
(1, 3),
(2, 4),
(3, 7),
(4, 8),
(5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`category_id`, `category_name`) VALUES
(1, 'Electronics'),
(2, 'Ladies Wears'),
(3, 'Mens Wears'),
(4, 'Kids wears'),
(7, 'Phones & Accessories'),
(8, 'Computer & Office'),
(9, 'Bags & Shoes'),
(11, 'Home Appliances'),
(12, 'General'),
(13, 'man'),
(14, 'sdasdsad');

-- --------------------------------------------------------

--
-- Table structure for table `comments_tbl`
--

CREATE TABLE `comments_tbl` (
  `comments_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `comment_type` varchar(200) NOT NULL,
  `customer_ord_id` int(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments_tbl`
--

INSERT INTO `comments_tbl` (`comments_id`, `customer_id`, `comment_type`, `customer_ord_id`, `description`) VALUES
(4, 1, 'complain', 6, 'asdasdasdaasddas'),
(5, 1, 'complain', 3, 'hp nnnnnnn'),
(9, 1, 'complain', 3, 'sadsadasda'),
(10, 1, 'complain', 7, 'sdfsdfsdfs');

-- --------------------------------------------------------

--
-- Table structure for table `customer_ord_prds`
--

CREATE TABLE `customer_ord_prds` (
  `customer_ord_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_qtry` int(11) NOT NULL,
  `current_price_per_prd` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '1',
  `customer_note` varchar(200) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '0',
  `order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_ord_prds`
--

INSERT INTO `customer_ord_prds` (`customer_ord_id`, `order_date`, `customer_id`, `product_id`, `order_qtry`, `current_price_per_prd`, `order_id`, `customer_note`, `payment_status`, `order_status`) VALUES
(1, '2020-05-06', 1, 4, 1, 65000, 1, '', 1, 0),
(2, '2020-05-06', 1, 6, 1, 3000, 1, '', 1, 0),
(3, '2020-05-06', 1, 1, 1, 20000, 2, '', 1, 0),
(4, '2020-05-06', 1, 3, 1, 5000, 2, '', 1, 0),
(6, '2020-05-06', 1, 4, 1, 65000, 3, '', 1, 0),
(7, '2020-05-06', 1, 5, 1, 1200, 3, '', 1, 0),
(8, '2020-05-06', 1, 5, 1, 1200, 4, '', 1, 0),
(9, '2020-05-06', 1, 6, 1, 3000, 4, '', 1, 0),
(10, '2020-05-06', 1, 4, 1, 65000, 4, '', 1, 0),
(11, '2020-05-06', 1, 3, 1, 5000, 5, '', 1, 0),
(12, '2020-05-06', 1, 3, 5, 5000, 6, '', 1, 0),
(13, '2020-05-06', 1, 3, 1, 5000, 7, 'asdsadasdasdasdadas', 1, 0),
(14, '2020-05-06', 1, 2, 1, 1750, 7, '', 1, 0),
(15, '2020-05-06', 2, 3, 1, 5000, 8, '', 1, 0),
(16, '2020-05-06', 1, 5, 1, 1200, 9, '', 1, 0),
(34, '2020-05-11', 1, 3, 1, 5000, 10, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_tbl`
--

CREATE TABLE `customer_tbl` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `postal` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_tbl`
--

INSERT INTO `customer_tbl` (`customer_id`, `first_name`, `last_name`, `email`, `password`, `phone`, `address`, `city`, `postal`) VALUES
(1, 'Mohamed', 'Aasim', 'aasim782@gmail.com', 'a156f048e92b05bbe7f64973019c49c8', 756881134, '155,Meeranagar Road, Nintavur', 'Nintavur', '32340'),
(2, 'mohamed', 'aaqil', 'aasim1@gmail.com', '2151eb06480373dff243e9fa2c285d2c', 752852508, '155,\nMeera oda val', 'nintvaur', '32310'),
(3, 'mohamed', 'aaqil', 'aasim789@gmail.com', '7776bbf7dce59f94c5188a7c67fc9309', 752852508, '155,\nMeera oda val', 'nintvaur', '32310'),
(4, 'fsdf', 'sfsdf', 'sfsdfs@asda.lk', '2151eb06480373dff243e9fa2c285d2c', 756333321, 'dfsd', 'df', '12345'),
(5, 'fsdf', 'sfsdf', 'sfsdfsasd@asda.lk', 'bfc371a27be40557bfe96f518d64a09c', 756333321, 'dfsd', 'df', '12345'),
(6, 'ad', 'asda', 'sdasd@sadsa.lkl', '2552316d1ea55a4afc32e70954661834', 756333321, 'sadasd', 'dasdsa', '12321'),
(7, 'sddfcsdf', 'sdfdsf', 'aasim2@gmail.com', 'a156f048e92b05bbe7f64973019c49c8', 756333321, 'Srilanak\nasdas', 'dasdsa', '23123'),
(8, 'sdfsfdsf', 'sdfdsfdsf', 'aasim3@gmail.com', 'a156f048e92b05bbe7f64973019c49c8', 1231321312, '1231231', '1231', '12312'),
(10, 'asd', 'asdasdsa', 'dasd@sadasda.ks', '2151eb06480373dff243e9fa2c285d2c', 721756516, 'asdad', 'asd', '12345'),
(11, 'sad', 'dasd', 'aasdasd@sadsada.kl', '2151eb06480373dff243e9fa2c285d2c', 756333321, 'sdasdasd', 'dasdasda', '04544'),
(13, 'asdasdasdas', 'dasdasdsadaad', 'dadsadasdasd@asdasd.ll', '2151eb06480373dff243e9fa2c285d2c', 721756516, 'SRILANKA\nSRILANKA', 'SRILANKA', '32323');

-- --------------------------------------------------------

--
-- Table structure for table `offer_tbl`
--

CREATE TABLE `offer_tbl` (
  `offer_id` int(11) NOT NULL,
  `offer_start_date` date NOT NULL,
  `offer_end_date` date NOT NULL,
  `discount_rate` varchar(200) NOT NULL,
  `reason` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `online_tran_tbl`
--

CREATE TABLE `online_tran_tbl` (
  `id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_tran_tbl`
--

INSERT INTO `online_tran_tbl` (`id`, `payment_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`order_id`, `customer_id`, `delivery_id`) VALUES
(1, 1, 0),
(2, 1, 0),
(3, 1, 0),
(4, 1, 0),
(5, 1, 0),
(6, 1, 0),
(7, 1, 0),
(8, 2, 0),
(9, 1, 0),
(10, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment_tbl`
--

CREATE TABLE `payment_tbl` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `paymen_catg` varchar(200) NOT NULL,
  `order_verification` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_tbl`
--

INSERT INTO `payment_tbl` (`payment_id`, `order_id`, `payment_date`, `paymen_catg`, `order_verification`) VALUES
(1, 1, '2020-05-06', '2', 0),
(2, 2, '2020-05-06', '1', 0),
(3, 3, '2020-05-06', '3', 0),
(4, 4, '2020-05-06', '3', 0),
(5, 5, '2020-05-06', '2', 0),
(6, 6, '2020-05-06', '2', 0),
(7, 7, '2020-05-06', '3', 0),
(8, 8, '2020-05-06', '3', 0),
(9, 9, '2020-05-06', '3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `product_id` int(11) NOT NULL,
  `product_category` varchar(200) NOT NULL,
  `product_brand` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_desc` text NOT NULL,
  `product_img` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_total_qty` int(11) NOT NULL,
  `product_keywords` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`product_id`, `product_category`, `product_brand`, `product_name`, `product_desc`, `product_img`, `product_price`, `product_total_qty`, `product_keywords`) VALUES
(1, '1', '2', 'Galaxy A50', 'Get closer to what matters to you on Galaxy A50\'s 6.4-inch Infinity-U display. ... Galaxy A50 is pure, premium aesthetics. ... Galaxy A50\'s Triple camera consists of an Ultra Wide Camera with a 123-degree field of vision like the human eye, as well as a 25MP (F1.\r\nVideos', 'samsung_a50.jpg', 20000, 20, 'samsung Samsung LEVANT SM-A505FZBCMID'),
(2, '3', '5', 'Mens Shirt', 'Shirts for Men - Buy Shirts for Men at best prices. Explore the latest collection of Men\'s shirts available at Flipkart. Free Shipping! Easy Returns! COD!', 'manShirts.jpg', 1750, 15, 'men shirt official signature'),
(3, '4', '9', 'kids Car', 'My 10 month old granddaughter absolutely LOVES this car!. I got it for her for Christmas and out of all of her gifts this is her favorite. The age on the box says 18-36 months. She is definitely ok in the car. It has seat belt and she fits nicely in it. The interior is all closed off so she it could even fit another small child. It has a little trunk space in the front to store stuff. The handle bends down to put in car for travel. There is a cup holder for the adult and the child. It is very smooth and quiet. My daughter and I put it together in about 15 minutes. The wheels go on like tricycle wheels so need some tools but was very easy to put together. Highly recommend this car!', 'kids.jpg', 5000, 7, 'kids car 2020 '),
(4, '1', '9', 'Hp Laptop', '15.6\" Full HD (1920 x 1080) IPS BrightView Micro-Edge WLED-Backlit Touchscreen Display, Intel UHD Graphics 620\r\n\r\n8th Gen Intel Core i7-8550U Processor, (Quad-Core, 8MB Cache, 1.8 GHz Up To 4.0GHz), 12GB DDR4 Memory, 256GB SSD Boot + 1TB HDD\r\n802.11b/g/n/ac (2x2), 10/100/1000 Gigabit Ethernet, Bluetooth4.2, Card Reader, B&O PLAY with Dual Speakers, HD Webcam\r\n2 x USB 3.1 Gen 1, 1 x USB 3.1 Type-C Gen 1, 1 x HDMI1.4, 1 x Combo Headphone / Microphone Jack, RJ-45 Ethernet\r\nBacklit Keyboard, Windows 10 Home, 41 Wh 3-Cell Battery, 4.25 lbs, 14.24\" W x 9.51\" D x 0.70\" H, Mineral Silver', 'asuslap.png', 65000, 5, 'laptop asus 2020 '),
(5, '2', '9', 'Women Watches', '-Style: Fashion Luxury Brand Style\r\n\r\n- Feature Brands Swiss Geneva\r\n\r\n- 100% brand new and high quality.\r\n\r\n- Precise quartz movement for accurate time keeping.\r\n\r\n- 30M Daily waterproof (not for showering and swimming).\r\n \r\n-18K Gold Nano Vaccum Plated, Gold Color Not Fade.\r\n \r\n-Christmas Gift ,Anneversary ,Party ,Brithday, Dating Wear\r\n \r\n \r\nFeatures (Approx):\r\nCase diameter:  3.6 cm approx.\r\nCase thickness:  0.8 cm approx.\r\nCase Material: Stainless Steel \r\nBand Width: 2 cm\r\nBand Length:  21.300cm approx.\r\nBand Material:   Stainless Steel ', 'watch.jpg', 1200, 5, 'watch girl '),
(6, '3', '9', 'Men\'s Sunglasses', 'KINGSEVEN Fashion Polarized Sunglasses Men Luxury Brand Designer Vintage Driving Sun Glasses Male Goggles Shadow UV400', 'glass.jpg', 3000, 5, 'glass man'),
(7, '1', '2', 'USB Type C Cable', 'Baseus USB Type C Cable For Samsung S20 S10 Plus Xiaomi Fast Charging Wire Cord USB-C Charger Mobile Phone USBC Type-c Cable 3m', 'charger.jpg', 750, 25, 'cable'),
(8, '1', '1', 'Wireless earphones', 'mifa X8 TWS Earbuds Wireless bluetooth earphones Touch Control Stereo Cordless Headset For iPhone Smart Phone With Charging Box', 'headphone.jpeg', 3500, 10, 'headphone'),
(9, '1', '9', '3.0 USB Charger', 'YKZ Quick Charge 3.0 USB Charger LED Display QC 3.0 PD Fast Charging Mobile Phone Charger for iPhone Xiaomi Samsung Huawei', '3Acharger.jpg', 500, 5, '3A charger cager'),
(10, '1', '9', 'keyboard and Mouse', 'Gaming keyboard and Mouse Wired keyboard with backlight keyboard Russia Gamer kit 5500Dpi Silent Gaming Mouse Set For PC Laptop', 'keyboard.jpg', 7500, 12, 'Laptop game keyboard'),
(11, '	1', '4', 'fan', 'gooood fan', 'C:fakepathfan.jpg', 1250, 0, 'fan fa top f a n'),
(12, '	2', '4', 'asSa', 'sadas', 'C:fakepath\080203205921-C4-1_Mens-T-Shirt_Fashion-Bug-300x382.jpg', 21321, 0, 'dasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `tracking_tbl`
--

CREATE TABLE `tracking_tbl` (
  `tracking_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_dep_tbl`
--
ALTER TABLE `bank_dep_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `brand_tbl`
--
ALTER TABLE `brand_tbl`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cash_on_delivery`
--
ALTER TABLE `cash_on_delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cash_on_delivery_ibfk_1` (`payment_id`);

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments_tbl`
--
ALTER TABLE `comments_tbl`
  ADD PRIMARY KEY (`comments_id`),
  ADD KEY `comments_tbl_ibfk_2` (`customer_ord_id`),
  ADD KEY `comments_tbl_ibfk_3` (`customer_id`);

--
-- Indexes for table `customer_ord_prds`
--
ALTER TABLE `customer_ord_prds`
  ADD PRIMARY KEY (`customer_ord_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_ord_prds_ibfk_2` (`customer_id`),
  ADD KEY `customer_ord_prds_ibfk_3` (`order_id`);

--
-- Indexes for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `online_tran_tbl`
--
ALTER TABLE `online_tran_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tracking_tbl`
--
ALTER TABLE `tracking_tbl`
  ADD PRIMARY KEY (`tracking_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_dep_tbl`
--
ALTER TABLE `bank_dep_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand_tbl`
--
ALTER TABLE `brand_tbl`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cash_on_delivery`
--
ALTER TABLE `cash_on_delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments_tbl`
--
ALTER TABLE `comments_tbl`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_ord_prds`
--
ALTER TABLE `customer_ord_prds`
  MODIFY `customer_ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `online_tran_tbl`
--
ALTER TABLE `online_tran_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tracking_tbl`
--
ALTER TABLE `tracking_tbl`
  MODIFY `tracking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_dep_tbl`
--
ALTER TABLE `bank_dep_tbl`
  ADD CONSTRAINT `bank_dep_tbl_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payment_tbl` (`payment_id`);

--
-- Constraints for table `cash_on_delivery`
--
ALTER TABLE `cash_on_delivery`
  ADD CONSTRAINT `cash_on_delivery_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payment_tbl` (`payment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments_tbl`
--
ALTER TABLE `comments_tbl`
  ADD CONSTRAINT `comments_tbl_ibfk_2` FOREIGN KEY (`customer_ord_id`) REFERENCES `customer_ord_prds` (`customer_ord_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_tbl_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customer_tbl` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_ord_prds`
--
ALTER TABLE `customer_ord_prds`
  ADD CONSTRAINT `customer_ord_prds_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product_tbl` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ord_prds_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer_tbl` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ord_prds_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `order_tbl` (`order_id`);

--
-- Constraints for table `online_tran_tbl`
--
ALTER TABLE `online_tran_tbl`
  ADD CONSTRAINT `online_tran_tbl_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payment_tbl` (`payment_id`);

--
-- Constraints for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD CONSTRAINT `order_tbl_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_tbl` (`customer_id`);

--
-- Constraints for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  ADD CONSTRAINT `payment_tbl_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_tbl` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
