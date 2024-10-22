-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2024 at 07:48 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobitrendz`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_page_details_tbl`
--

CREATE TABLE `about_page_details_tbl` (
  `Content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about_page_details_tbl`
--

INSERT INTO `about_page_details_tbl` (`Content`) VALUES
('<h2>About MobiTrendz</h2><p>Welcome to MobiTrendz, your premier destination for everything mobile. We specialize exclusively in mobile phones, bringing you the latest innovations in technology and design. Whether you\'re searching for the newest flagship smartphone, or expert advice on the best mobile devices, MobiTrendz is here to meet all your mobile needs.</p><h3>Our Mission</h3><p>At MobiTrendz, our mission is to empower you with the best in mobile technology. We believe that your mobile phone is more than just a device—it’s your gateway to the world, your personal assistant, your entertainment hub, and your connection to friends and family. That’s why we are dedicated to providing a wide selection of high-quality mobile phones and accessories that cater to your unique lifestyle and needs.</p><h3>Why Choose Us?</h3><p><strong>1. Exclusive Focus on Mobile:</strong> Unlike general electronics stores, we specialize exclusively in mobile technology. This focus allows us to offer an unmatched selection of mobile phones and accessories, ensuring that you find exactly what you’re looking for.</p><p><strong>2. Wide Range of Mobile Phones:</strong> From the latest flagship models from top brands like Apple, Samsung, and Google to budget-friendly alternatives, our catalog includes options for every type of user. Whether you\'re looking for a high-performance phone with cutting-edge features or a simple, reliable device, we’ve got it all.</p><p><strong>3. Product Information:</strong> We know that choosing a new phone can be overwhelming. That’s why we provide in-depth product descriptions, expert reviews, detailed specifications. Our goal is to make your decision-making process as easy and informed as possible.</p><p><strong>4. Latest Technology and Trends:</strong> We stay on the cutting edge of mobile technology, offering the newest releases as soon as they hit the market. From 5G-enabled devices to foldable screens and advanced camera systems, you’ll find the latest innovations here.</p><h3>Join Our Mobile Community</h3><p>At MobiTrendz, we’re more than just a store—we’re a community of mobile enthusiasts. Join us on social media, subscribe to our newsletter, and stay connected for the latest updates, exclusive offers, and expert tips on making the most of your mobile technology. We’re here to keep you informed, inspired, and in touch with the latest trends and developments in the mobile world.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `address_details_tbl`
--

CREATE TABLE `address_details_tbl` (
  `Address_Id` int NOT NULL,
  `User_Id` int NOT NULL,
  `Full_Name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Address` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `City` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `State` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Pincode` int NOT NULL,
  `Phone` varchar(15) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address_details_tbl`
--

INSERT INTO `address_details_tbl` (`Address_Id`, `User_Id`, `Full_Name`, `Address`, `City`, `State`, `Pincode`, `Phone`) VALUES
(1, 5, 'Jay Gorfad', 'Kothariya Road', 'Rajkot', 'Gujarat', 360002, '7600242424'),
(2, 5, 'Jay Gorfad', 'Kothariya Road', 'Rajkot', 'Gujarat', 360002, '7600242424'),
(3, 5, 'Jay Gorfad', 'Kothariya Road', 'Rajkot', 'Gujarat', 360002, '7600242424'),
(4, 4, 'Yagnik Desai', 'Kothariya Road', 'Rajkot', 'Gujarat', 360002, '7600242424'),
(5, 4, 'Yagnik Desai', 'Kothariya Road', 'Rajkot', 'Gujarat', 360022, '6355531231'),
(6, 4, 'Yagnik Desai', 'kjerhsd', 'Mumbai', 'fa', 360002, '7600242424'),
(7, 4, 'Yagnik Desai', 'wertyu', 'asda', 'dsada', 360002, '7600242424'),
(8, 8, 'Jay Gorfad', 'Kothariya Road', 'Rajkot', 'Gujarat', 360002, '7600242424');

-- --------------------------------------------------------

--
-- Table structure for table `banner_details_tbl`
--

CREATE TABLE `banner_details_tbl` (
  `Banner_Id` int NOT NULL,
  `Banner_Image` text NOT NULL,
  `View_Order` int NOT NULL,
  `Active_Status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `banner_details_tbl`
--

INSERT INTO `banner_details_tbl` (`Banner_Id`, `Banner_Image`, `View_Order`, `Active_Status`) VALUES
(1, '670a7ae6b300315promaxn1.jpg', 2, 0),
(2, '670a7e6db06a9about_img.jpg', 3, 0),
(4, '67109e83e4596hero.png', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart_details_tbl`
--

CREATE TABLE `cart_details_tbl` (
  `Product_Id` int NOT NULL,
  `Quantity` int NOT NULL,
  `User_Id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_details_tbl`
--

INSERT INTO `cart_details_tbl` (`Product_Id`, `Quantity`, `User_Id`) VALUES
(8, 1, 4),
(10, 1, 4),
(12, 1, 4),
(6, 1, 4),
(11, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `category_details_tbl`
--

CREATE TABLE `category_details_tbl` (
  `Category_Id` int NOT NULL,
  `Category_Name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Parent_Category_Id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_details_tbl`
--

INSERT INTO `category_details_tbl` (`Category_Id`, `Category_Name`, `Parent_Category_Id`) VALUES
(1, 'Apple', NULL),
(2, 'Samsung', NULL),
(3, 'Realme', NULL),
(5, 'Redmi', NULL),
(6, 'Oppo', NULL),
(7, 'Vivo', NULL),
(8, 'OnePlus', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_page_details_tbl`
--

CREATE TABLE `contact_page_details_tbl` (
  `Contact_Email` varchar(255) DEFAULT NULL,
  `Contact_Number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_page_details_tbl`
--

INSERT INTO `contact_page_details_tbl` (`Contact_Email`, `Contact_Number`) VALUES
('mobitrendz@gmail.com', '9137284650');

-- --------------------------------------------------------

--
-- Table structure for table `offer_details_tbl`
--

CREATE TABLE `offer_details_tbl` (
  `Offer_Id` int NOT NULL,
  `Offer_Description` text,
  `Discount` int DEFAULT NULL,
  `Minimum_Order` decimal(7,2) DEFAULT NULL,
  `offer_type` int DEFAULT '1',
  `active_status` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `offer_details_tbl`
--

INSERT INTO `offer_details_tbl` (`Offer_Id`, `Offer_Description`, `Discount`, `Minimum_Order`, `offer_type`, `active_status`) VALUES
(1, 'new offers', 10, 500.00, 1, 1),
(3, 'Offers', 15, 999.00, 2, 1),
(4, 'OFFERS', 19, 799.00, 3, 1),
(5, 'new offers 2', 12, 299.00, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details_tbl`
--

CREATE TABLE `order_details_tbl` (
  `Order_Id` int NOT NULL,
  `Product_Id` int NOT NULL,
  `Quantity` int NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details_tbl`
--

INSERT INTO `order_details_tbl` (`Order_Id`, `Product_Id`, `Quantity`, `Price`) VALUES
(1, 3, 2, 152100),
(2, 6, 5, 109999.12),
(6, 10, 10, 12599.1);

-- --------------------------------------------------------

--
-- Table structure for table `order_header_tbl`
--

CREATE TABLE `order_header_tbl` (
  `Order_Id` int NOT NULL,
  `User_Id` int NOT NULL,
  `Order_Date` datetime NOT NULL,
  `Order_Status` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Shipping_Address_Id` int NOT NULL,
  `Shipping_Charge` float NOT NULL DEFAULT '0',
  `Total` double NOT NULL DEFAULT '0',
  `Payment_Mode` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Cash on Delivery'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_header_tbl`
--

INSERT INTO `order_header_tbl` (`Order_Id`, `User_Id`, `Order_Date`, `Order_Status`, `Shipping_Address_Id`, `Shipping_Charge`, `Total`, `Payment_Mode`) VALUES
(2, 4, '2024-10-02 00:00:00', 'Shipped', 4, 50, 550045.6, 'Cash on Delivery'),
(6, 8, '2024-10-14 00:00:00', 'Processing', 8, 50, 126041, 'Cash on Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `product_details_tbl`
--

CREATE TABLE `product_details_tbl` (
  `Product_Id` int NOT NULL,
  `Category_Id` int NOT NULL,
  `Product_Name` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Product_Image` varchar(255) NOT NULL,
  `Sale_Price` decimal(10,2) NOT NULL,
  `Cost_Price` decimal(10,2) NOT NULL,
  `Discount` tinyint NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `Display` varchar(200) NOT NULL,
  `Processor` varchar(200) NOT NULL,
  `RAM` varchar(100) NOT NULL,
  `Storage` varchar(100) NOT NULL,
  `Rear_Camera` varchar(100) NOT NULL,
  `Front_Camera` varchar(100) NOT NULL,
  `Battery` varchar(200) NOT NULL,
  `Operating_System` varchar(200) NOT NULL,
  `Color` varchar(100) NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_details_tbl`
--

INSERT INTO `product_details_tbl` (`Product_Id`, `Category_Id`, `Product_Name`, `Description`, `Product_Image`, `Sale_Price`, `Cost_Price`, `Discount`, `stock`, `Display`, `Processor`, `RAM`, `Storage`, `Rear_Camera`, `Front_Camera`, `Battery`, `Operating_System`, `Color`, `is_active`) VALUES
(6, 2, 'Samsung Galaxy S23 Ultra', 'Experience the power of Galaxy AI with S23 Ultra to effortlessly perfect your photos with Photo Assist, communicate quickly outside your language with Live Translate, 200MP. Wow-worthy resolution, Fast Charging Support, Stereo Speakers, Always On Display, Wireless Charging, Built-In GPS.', '670b6b6e1f2d1samsungs23ultra.jpg', 124999.00, 111000.00, 12, 25, '‎AMOLED', 'Snapdragon 8Gen 2', '12GB', '256GB', '200MP + 12MP + 10MP', '12MP', '‎5000mah', 'Android', 'Cream', 1),
(8, 1, 'Iphone 11', 'The iPhone 11 boasts a gorgeous all-screen Liquid Retina LCD that is water resistant up to 2 metres for up to 30 minutes.', '670e65a8b4286714Mg+6MoFL._SX679_.jpg', 49999.00, 59999.00, 10, 29, 'XDR Display', 'A13 Bionic', '8GB', '128GB', '48MP + 12MP', '12MP', '4500mah', 'IOS', 'Yellow', 1),
(10, 3, 'Realme NARZO 70x', '7.69 mm Ultra-slim ,188g Light Body, The ultra-thin and lightweight body, combined with a width of 7.97cm, allows for comfortable single-handed grip even during extended periods of use; IP54 Dust and Water Resistance;', '670e68eeadc81realmenarzo70x.jpg', 13999.00, 16999.00, 10, 64, '120Hz Ultra Smooth Display', 'MediaTek Dimensity 6100+ processor', '8GB', '128GB', '48MP + 12MP + 8MP', '12MP', '‎5000mah', 'Android', 'Blue', 1),
(11, 6, 'OPPO A3X 5G', '16.94 cm (6.67\"Inch) HD+ LCD 120Hz Ultra Bright Display to greatly improve the smoothness of screen touches ,with Screen-to-body ratio of 89.9% for better viewing experience.', '670e6afb553d5oppoa3x.jpg', 16999.00, 17999.00, 18, 48, '120Hz Refresh Rate Display', ' MediaTek Dimensity 6300', '8GB', '128GB', '48MP + 12MP', '12MP', '4500mah', 'Android', 'Black', 1),
(12, 7, 'Vivo Y28s', '16.6624 cm (6.56\" inch) LCD Capacitive multi-touch display 90Hz refresh rate, 269 ppi & 840 nits, Side-mounted capacitive fingerprint sensor.', '670e6ce2dd31fvivoy28s.jpg', 14599.00, 17999.00, 13, 76, '6.56\" inch LCD Display', 'Dimensity 6300 5G processor', '8GB', '128GB', '48MP + 12MP', '12MP', '4500mah', 'Android', 'Red', 1);

-- --------------------------------------------------------

--
-- Table structure for table `responses_tbl`
--

CREATE TABLE `responses_tbl` (
  `Response_Id` int NOT NULL,
  `First_Name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Last_Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(320) COLLATE utf8mb4_general_ci NOT NULL,
  `Phone` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `Message` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `responses_tbl`
--

INSERT INTO `responses_tbl` (`Response_Id`, `First_Name`, `Last_Name`, `Email`, `Phone`, `Message`) VALUES
(7, 'Yagnik', 'Desai', 'ydesai000@gmail.com', '6353915155', 'Details About Upcoming Mobile Phones'),
(8, 'Jay', 'Gorfad', 'jaygorfad00@gmail.com', '7600242424', 'About Mobile Phone');

-- --------------------------------------------------------

--
-- Table structure for table `review_details_tbl`
--

CREATE TABLE `review_details_tbl` (
  `Review_Id` int NOT NULL,
  `Reply_To` int DEFAULT NULL,
  `Product_Id` int DEFAULT NULL,
  `User_Id` int NOT NULL,
  `Rating` int DEFAULT NULL,
  `Review` text COLLATE utf8mb4_general_ci NOT NULL,
  `Review_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review_details_tbl`
--

INSERT INTO `review_details_tbl` (`Review_Id`, `Reply_To`, `Product_Id`, `User_Id`, `Rating`, `Review`, `Review_Date`) VALUES
(4, NULL, 3, 5, 5, 'Good Device', '2024-10-13 19:08:48'),
(7, 4, NULL, 1, NULL, 'Good', '2024-10-13 19:12:00'),
(8, NULL, 5, 4, 4, 'Nice Device', '2024-10-13 19:12:23'),
(9, 8, NULL, 1, NULL, 'good', '2024-10-13 19:16:01'),
(10, NULL, 12, 4, 4, 'Good Product', '2024-10-15 18:56:51'),
(11, 10, NULL, 1, NULL, 'Good', '2024-10-15 18:57:08'),
(12, NULL, 6, 4, 5, 'Good Product', '2024-10-17 11:30:16'),
(13, NULL, 8, 4, 1, 'Good Product', '2024-10-17 11:30:50'),
(14, NULL, 10, 4, 3, 'Good Product', '2024-10-17 11:31:13'),
(15, NULL, 11, 4, 2, 'Good Mobile', '2024-10-17 11:31:31'),
(16, NULL, 6, 8, 5, 'Awesome Mobile', '2024-10-18 23:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_details_tbl`
--

CREATE TABLE `user_details_tbl` (
  `User_Id` int NOT NULL,
  `User_Role_Id` int DEFAULT '0',
  `Name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(320) COLLATE utf8mb4_general_ci NOT NULL,
  `Mobile_No` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Active_Status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details_tbl`
--

INSERT INTO `user_details_tbl` (`User_Id`, `User_Role_Id`, `Name`, `Password`, `Email`, `Mobile_No`, `Active_Status`) VALUES
(4, 0, 'Yagnik Desai', '12345678', 'ydesai000@rku.ac.in', '987456320', 1),
(6, 0, 'Bhautik Kacha', '12345678', 'bhautik@gmail.com', '9475681499', 0),
(7, 0, 'Prince Bhatt', '12345678', 'p@gmail.com', '9999254569', -1),
(8, 1, 'Jay Gorfad', '12345678', 'jaygorfad00@gmail.com', '7600242424', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_details_tbl`
--

CREATE TABLE `wishlist_details_tbl` (
  `Product_Id` int NOT NULL,
  `User_Id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_details_tbl`
--
ALTER TABLE `address_details_tbl`
  ADD PRIMARY KEY (`Address_Id`);

--
-- Indexes for table `banner_details_tbl`
--
ALTER TABLE `banner_details_tbl`
  ADD PRIMARY KEY (`Banner_Id`);

--
-- Indexes for table `category_details_tbl`
--
ALTER TABLE `category_details_tbl`
  ADD PRIMARY KEY (`Category_Id`);

--
-- Indexes for table `offer_details_tbl`
--
ALTER TABLE `offer_details_tbl`
  ADD PRIMARY KEY (`Offer_Id`);

--
-- Indexes for table `order_header_tbl`
--
ALTER TABLE `order_header_tbl`
  ADD PRIMARY KEY (`Order_Id`);

--
-- Indexes for table `product_details_tbl`
--
ALTER TABLE `product_details_tbl`
  ADD PRIMARY KEY (`Product_Id`);

--
-- Indexes for table `responses_tbl`
--
ALTER TABLE `responses_tbl`
  ADD PRIMARY KEY (`Response_Id`);

--
-- Indexes for table `review_details_tbl`
--
ALTER TABLE `review_details_tbl`
  ADD PRIMARY KEY (`Review_Id`);

--
-- Indexes for table `user_details_tbl`
--
ALTER TABLE `user_details_tbl`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_details_tbl`
--
ALTER TABLE `address_details_tbl`
  MODIFY `Address_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `banner_details_tbl`
--
ALTER TABLE `banner_details_tbl`
  MODIFY `Banner_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category_details_tbl`
--
ALTER TABLE `category_details_tbl`
  MODIFY `Category_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `offer_details_tbl`
--
ALTER TABLE `offer_details_tbl`
  MODIFY `Offer_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_header_tbl`
--
ALTER TABLE `order_header_tbl`
  MODIFY `Order_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_details_tbl`
--
ALTER TABLE `product_details_tbl`
  MODIFY `Product_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `responses_tbl`
--
ALTER TABLE `responses_tbl`
  MODIFY `Response_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `review_details_tbl`
--
ALTER TABLE `review_details_tbl`
  MODIFY `Review_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_details_tbl`
--
ALTER TABLE `user_details_tbl`
  MODIFY `User_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
