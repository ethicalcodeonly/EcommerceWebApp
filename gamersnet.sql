-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2025 at 05:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamersnet`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `cart_item_added` datetime NOT NULL DEFAULT current_timestamp(),
  `cart_item_quantity` int(11) NOT NULL DEFAULT 1,
  `cart_item_status` varchar(20) NOT NULL DEFAULT 'cart'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemid` int(11) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `itemdescription` text NOT NULL,
  `itemprice` double(8,2) NOT NULL,
  `itemimage` varchar(100) NOT NULL,
  `image1` varchar(300) NOT NULL,
  `image2` varchar(300) NOT NULL,
  `image3` varchar(300) NOT NULL,
  `image4` varchar(100) NOT NULL,
  `itemquantity` int(11) NOT NULL DEFAULT 100,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemid`, `itemname`, `itemdescription`, `itemprice`, `itemimage`, `image1`, `image2`, `image3`, `image4`, `itemquantity`, `category`) VALUES
(4, 'Crimson', 'The Jordan Crimson is a striking color variant often associated with the iconic Air Jordan sneaker line. Featuring a deep, rich red with subtle hints of pink and purple, this vibrant shade captures attention with its bold yet sophisticated tone. The Jordan Crimson is typically used in sneaker designs, adding a dynamic and fresh twist to the classic Jordan aesthetic, appealing to both collectors and fashion-forward sneakerheads.', 1200.00, 'images/Crimson/crimson1.jpg', 'images/Crimson/crimson2.jpg', 'images/Crimson/crimson3.jpg', 'images/Crimson/crimson4.jpg', 'images/Crimson/crimson5.jpg', 2, 'Jordan'),
(5, 'Jubilee', 'The Jubilee colorway is a sleek, elegant design often linked to the Air Jordan 11 collection. It features a black patent leather upper paired with a metallic silver \"23\" logo and accents, creating a refined, premium look. The Jubilee is inspired by the 25th anniversary of the Air Jordan line and blends classic style with a celebratory touch, making it a standout in both performance and fashion. The colorway exudes luxury and timeless appeal, appealing to both sneaker enthusiasts and collectors.', 1500.00, 'images/Jubilee/jubilee1.jpg', 'images/Jubilee/jubilee2.jpg', 'images/Jubilee/jubilee3.jpg', 'images/Jubilee/jubilee4.jpg', 'images/Jubilee/jubilee5.jpg', 100, 'Jordans'),
(6, 'Volt', 'The Volt Nike colorway is a bright, neon yellow-green hue that exudes energy and boldness. Often used in Nike sneakers and apparel, this striking shade stands out with its high-visibility tone, making it both eye-catching and stylish. Volt is frequently paired with other dark or neutral colors to create a dynamic contrast, adding a modern, athletic edge to the design. Its vibrant, electric vibe has made it popular in performance sports gear and streetwear, symbolizing speed, power, and innovation.', 0.00, 'images/volt/volt1.jpg', 'images/volt/volt2.jpg', 'images/volt/volt3.jpg', 'images/volt/volt4.jpg', 'images/volt/volt5.jpg', 100, 'Nike'),
(7, 'ISPA', 'ISPA (Innovative Systems Performance Actions) is a design division within Nike focused on creating forward-thinking, experimental footwear and apparel. The ISPA line blends performance with bold, futuristic aesthetics, often incorporating unique materials, deconstructed designs, and functional innovations. ISPA products are known for their utilitarian, high-tech look, frequently featuring modular components, weather-resistant features, and versatile designs that can adapt to various conditions. This line pushes the boundaries of sneaker culture and sportswear, appealing to those who embrace unconventional style and performance-driven innovation.', 2000.00, 'images/ISPA1.jpg', 'images/ISPA2.jpg', 'images/ISPA3.jpg', 'images/ISPA4.jpg', 'images/ISPA5.jpg', 100, 'Nike');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `purchase_item_price` double(8,2) NOT NULL,
  `purchase_item_quantity` int(11) NOT NULL DEFAULT 1,
  `purchase_date` datetime NOT NULL DEFAULT current_timestamp(),
  `receipt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `receipt_id` int(11) NOT NULL,
  `receipt_code` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `receipt_subtotal` double(8,2) NOT NULL,
  `receipt_total` double(8,2) NOT NULL,
  `receipt_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `custemail` varchar(100) NOT NULL,
  `custpass` varchar(300) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `custname` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `custemail`, `custpass`, `reg_date`, `user_type`, `custname`) VALUES
(9, 'superman@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2025-02-25 12:13:41', 'user', 'Super Man');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
