-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2024 at 06:13 PM
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
  `Content` text
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
  `Full_Name` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Pincode` int NOT NULL,
  `Phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `address_details_tbl`
--

INSERT INTO `address_details_tbl` (`Address_Id`, `User_Id`, `Full_Name`, `Address`, `City`, `State`, `Pincode`, `Phone`) VALUES
(1, 4, 'Yagnik  Desai', 'main bazzar,swayam park', 'Rajkot', 'Gujarat', 360049, '9087678998'),
(2, 4, 'Kishan Vekariya', 'Kotdapitha Babra', 'Amreli', 'Gujarat', 365421, '7897897890');

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
(1, '6717b2b06dae6_banner15.png', 2, 1),
(2, '670a7e6db06a9about_img.jpg', 3, 0),
(4, '67109e83e4596hero.png', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart_details_tbl`
--

CREATE TABLE `cart_details_tbl` (
  `Product_Id` int NOT NULL,
  `Quantity` int NOT NULL DEFAULT '1',
  `User_Id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart_details_tbl`
--

INSERT INTO `cart_details_tbl` (`Product_Id`, `Quantity`, `User_Id`) VALUES
(6, 1, 11),
(6, 1, 9),
(6, 1, 10),
(8, 3, 11),
(10, 1, 11),
(14, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `category_details_tbl`
--

CREATE TABLE `category_details_tbl` (
  `Category_Id` int NOT NULL,
  `Category_Name` varchar(100) NOT NULL,
  `Parent_Category_Id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
('new@gmail.com', '9137284651');

-- --------------------------------------------------------

--
-- Table structure for table `offer_details_tbl`
--

CREATE TABLE `offer_details_tbl` (
  `Offer_Id` int NOT NULL,
  `Offer_Code` varchar(20) NOT NULL,
  `Offer_Description` text,
  `Discount` int DEFAULT NULL,
  `Max_Discount` float NOT NULL,
  `Minimum_Order` decimal(7,2) DEFAULT NULL,
  `offer_type` int DEFAULT '1',
  `active_status` int DEFAULT '1',
  `Start_Date` datetime DEFAULT NULL,
  `End_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `offer_details_tbl`
--

INSERT INTO `offer_details_tbl` (`Offer_Id`, `Offer_Code`, `Offer_Description`, `Discount`, `Max_Discount`, `Minimum_Order`, `offer_type`, `active_status`, `Start_Date`, `End_Date`) VALUES
(6, '10DISCOUNT', '10% Discount on orders above ₹145', 10, 100, 145.00, 1, 1, '2024-11-21 21:48:06', '2025-11-30 21:48:37'),
(7, 'FIRSTORDER', 'First purchase discount', 5, 50, NULL, 2, 1, '2024-11-21 21:48:20', '2024-11-30 21:48:37'),
(8, 'FREESHIPPING', 'Free shipping offer', NULL, 0, 300.00, 3, 1, '2024-11-21 21:48:25', '2024-11-30 21:48:37'),
(9, '15DISCOUNT', '15% Discount on orders above ₹200', 15, 150, 200.00, 1, 1, '2024-11-14 21:48:28', '2024-11-30 21:48:37'),
(10, '20DISCOUNT', '20% Discount on orders above ₹300', 20, 60, 300.00, 1, 1, '2024-11-21 21:48:32', '2024-11-30 21:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `order_details_tbl`
--

CREATE TABLE `order_details_tbl` (
  `Order_Id` int NOT NULL,
  `Product_Id` int NOT NULL,
  `Quantity` int NOT NULL,
  `Price` double NOT NULL,
  `Discount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details_tbl`
--

INSERT INTO `order_details_tbl` (`Order_Id`, `Product_Id`, `Quantity`, `Price`, `Discount`) VALUES
(1, 8, 3, 26899.628252788, 100.37),
(2, 10, 2, 25198.2, 0.00),
(3, 11, 1, 13886.456524797, 52.72),
(3, 10, 1, 12551.445235772, 47.65),
(4, 10, 1, 12599.1, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_header_tbl`
--

CREATE TABLE `order_header_tbl` (
  `Order_Id` int NOT NULL,
  `User_Id` int NOT NULL,
  `Order_Date` datetime NOT NULL,
  `Order_Status` varchar(10) NOT NULL,
  `Shipping_Address_Id` int NOT NULL,
  `Shipping_Charge` float NOT NULL DEFAULT '0',
  `Total` double NOT NULL DEFAULT '0',
  `Payment_Mode` varchar(50) DEFAULT 'Cash on Delivery'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_header_tbl`
--

INSERT INTO `order_header_tbl` (`Order_Id`, `User_Id`, `Order_Date`, `Order_Status`, `Shipping_Address_Id`, `Shipping_Charge`, `Total`, `Payment_Mode`) VALUES
(1, 4, '2024-12-11 06:37:30', 'Completed', 1, 50, 26950, 'Online'),
(2, 4, '2024-12-11 06:43:10', 'Pending', 1, 50, 25248.2, 'COD');

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
(6, 2, 'Samsung Galaxy S23 Ultra', 'Experience the power of Galaxy AI with S23 Ultra to effortlessly perfect your photos with Photo Assist, communicate quickly outside your language with Live Translate, 200MP. Wow-worthy resolution, Fast Charging Support, Stereo Speakers, Always On Display, Wireless Charging, Built-In GPS.', '673ddf45e9a86_samsungs23ultra.jpg', 121999.05, 123456.00, 12, 0, '‎AMOLED', 'Snapdragon 8Gen 2', '12GB', '256GB', '200MP + 12MP + 10MP', '12MP', '‎5000mah', 'Android', 'Cream', 1),
(8, 1, 'Iphone 16', 'The iPhone 11 boasts a gorgeous all-screen Liquid Retina LCD that is water resistant up to 2 metres for up to 30 minutes.', '675b14661d1d3_15Plus.jpg', 65000.00, 70000.00, 8, 0, 'XDR Display', 'A13 Bionic', '8GB', '128GB', '48MP + 12MP', '20MP', '4500mah', 'IOS', 'Yellow', 1),
(10, 3, 'Realme NARZO 70x', '7.69 mm Ultra-slim ,188g Light Body, The ultra-thin and lightweight body, combined with a width of 7.97cm, allows for comfortable single-handed grip even during extended periods of use; IP54 Dust and Water Resistance;', '670e68eeadc81realmenarzo70x.jpg', 13999.00, 16999.00, 10, 58, '120Hz Ultra Smooth Display', 'MediaTek Dimensity 6100+ processor', '8GB', '128GB', '48MP + 12MP + 8MP', '12MP', '‎5000mah', 'Android', 'Blue', 1),
(11, 6, 'OPPO A3X 5G', '16.94 cm (6.67\"Inch) HD+ LCD 120Hz Ultra Bright Display to greatly improve the smoothness of screen touches ,with Screen-to-body ratio of 89.9% for better viewing experience.', '670e6afb553d5oppoa3x.jpg', 16999.00, 17999.00, 18, 47, '120Hz Refresh Rate Display', ' MediaTek Dimensity 6300', '8GB', '128GB', '48MP + 12MP', '12MP', '4500mah', 'Android', 'Black', 1),
(12, 7, 'Vivo Y28s', '16.6624 cm (6.56\" inch) LCD Capacitive multi-touch display 90Hz refresh rate, 269 ppi & 840 nits, Side-mounted capacitive fingerprint sensor.', '670e6ce2dd31fvivoy28s.jpg', 14599.00, 17999.00, 13, 76, '6.56\" inch LCD Display', 'Dimensity 6300 5G processor', '8GB', '128GB', '48MP + 12MP', '12MP', '4500mah', 'Android', 'Red', 1),
(13, 8, 'asasf', 'sdafafaas', '671869c0b4d28samsungs23ultra.jpg', 10.00, 10.00, 10, 10, 'XDR Display', 'asf', '12Gb', '128GB', '48MP + 12MP', '12MP', '4500mah', 'Android', 'Cream', 0),
(14, 1, 'Iphone 15 Pro', 'iphone', '67409349bfcac_71yzJoE7WlL._SX679_.jpg', 150000.00, 150000.00, 10, 2, '6.7” AMOLED Display', ' MediaTek Dimensity 6300', '12Gb', '512GB', '48MP + 12MP + 8MP', '12MP', '‎5000mah', 'IOS', 'Green', 1),
(15, 5, 'Redmi Note 13 Pro+', 'Display: 6.67 Inches; 120 Hz 3D Curved AMOLED 1.5K Display with Corning Gorilla Glass Victus; Resolution: 2712 x 1220 Pixels; Dolby Vision, Adaptive HDR 10+, 68.7billion colors, 1800nits Peak Brightness', '675b2570ea49413.webp', 27998.00, 33999.00, 9, 5, 'AMOLED Display', 'Mediatek 7200 Ultra 5G', '8GB', '256GB', '48MP + 12MP + 8MP', '20MP', '4500mah', 'Android', 'Black', 0),
(16, 3, 'Realme GT 7 Pro', 'Powered by the cutting-edge 3nm Snapdragon 8 Elite processor, this device achieves an impressive 3M AnTuTu Score, delivering exceptional speed and responsiveness, bringing you boundless explorations and allowing you to handle demanding applications and gaming with ease.', '675b265decb5dgt7pro.jpg', 55999.00, 59998.00, 10, 7, 'Quad-Curved Display', 'Snapdragon 8 Elite Processor', '12GB', '256GB', '48MP + 12MP + 8MP', '20MP', '‎5000mah', 'Android', 'Grey', 1),
(17, 5, 'Redmi Note 13 Pro', '6.67 Inches; 120 Hz AMOLED 1.5K Display with Corning Gorilla Glass Victus; Resolution: 2712 x 1220 Pixels; Dolby Vision, 68.7billion colors, 1800nits Peak Brightness', '675b27147fbb7redmi13pro.jpg', 22998.00, 25999.00, 12, 9, '120Hz Ultra Smooth Display', 'Snapdragon 7s Gen2 Processor', '12GB', '256GB', '48MP + 12MP + 8MP', '20MP', '‎5000mah', 'Android', 'Purple', 1);

-- --------------------------------------------------------

--
-- Table structure for table `responses_tbl`
--

CREATE TABLE `responses_tbl` (
  `Response_Id` int NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `responses_tbl`
--

INSERT INTO `responses_tbl` (`Response_Id`, `First_Name`, `Last_Name`, `Email`, `Phone`, `Message`) VALUES
(7, 'Yagnik', 'Desai', 'ydesai000@gmail.com', '6353915155', 'Details About Upcoming Mobile Phones'),
(8, 'Jay', 'Gorfad', 'jaygorfad00@gmail.com', '7600242424', 'About Mobile Phone'),
(10, 'jayyy', 'Gorfad', 'ydesai000@rku.ac.in', '6353915155', 'xyz'),
(11, 'Bhakti', 'Bhut', 'patelbhakti636@gmail.com', '7896521430', 'New Message');

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
  `Review` text NOT NULL,
  `Review_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `review_details_tbl`
--

INSERT INTO `review_details_tbl` (`Review_Id`, `Reply_To`, `Product_Id`, `User_Id`, `Rating`, `Review`, `Review_Date`) VALUES
(16, NULL, 6, 8, 5, 'Awesome Mobile', '2024-10-18 23:36:44'),
(17, 12, NULL, 8, NULL, 'aabc', '2024-10-23 09:40:56'),
(20, NULL, 10, 4, 4, 'Good Battery Life', '2024-12-12 22:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_details_tbl`
--

CREATE TABLE `user_details_tbl` (
  `User_Id` int NOT NULL,
  `User_Role_Id` int DEFAULT '0',
  `Name` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `Mobile_No` varchar(20) NOT NULL,
  `Active_Status` tinyint NOT NULL,
  `Profile_Picture` varchar(255) DEFAULT 'default-img.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_details_tbl`
--

INSERT INTO `user_details_tbl` (`User_Id`, `User_Role_Id`, `Name`, `Password`, `Email`, `Mobile_No`, `Active_Status`, `Profile_Picture`) VALUES
(4, 0, 'Yagnik Desai', '23122312', 'ydesai000@rku.ac.in', '9874563200', 1, '67189fe87a6a4_download.png'),
(6, 0, 'Bhautik Kacha', '12345678', 'bhautik@gmail.com', '9475681499', 0, 'default-img.png'),
(7, 0, 'Prince Bhatt', '12345678', 'p@gmail.com', '9999254569', 1, 'default-img.png'),
(8, 1, 'Jay Gorfad', '12345678', 'jaygorfad00@gmail.com', '7600242424', 1, 'default-img.png'),
(11, 0, 'Jay Barasiya', '12345678', 'jbarasiya302@rku.ac.in', '9876543210', 1, '67189310d9e97_shirt photo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_details_tbl`
--

CREATE TABLE `wishlist_details_tbl` (
  `Product_Id` int NOT NULL,
  `User_Id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  MODIFY `Address_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `Offer_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_header_tbl`
--
ALTER TABLE `order_header_tbl`
  MODIFY `Order_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_details_tbl`
--
ALTER TABLE `product_details_tbl`
  MODIFY `Product_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `responses_tbl`
--
ALTER TABLE `responses_tbl`
  MODIFY `Response_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `review_details_tbl`
--
ALTER TABLE `review_details_tbl`
  MODIFY `Review_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_details_tbl`
--
ALTER TABLE `user_details_tbl`
  MODIFY `User_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
