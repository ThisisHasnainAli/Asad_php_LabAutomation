-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2025 at 02:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labautomation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `admin_pass` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `admin_pass`, `name`) VALUES
(1, 'adil@1.co', '12112', 'Aayan'),
(2, 'm.asadraza01@gmail.com', '@AsadAdmin', 'Asad');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(1, 'aaliyanaslam22@gmail.com', 'aaliyanaslam22@gmail.com', 'heelo');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `product_id`, `message`, `created_at`) VALUES
(1, 11, 9, 'Your product \'Bulb 4\' has been APPROVED. Download your certificate.', '2025-09-30 16:04:06'),
(2, 10, 6, 'Your product \'7837438 - Italian Cheese.300.00\' has been REJECTED.', '2025-10-01 12:10:25'),
(3, 11, 10, 'Your product \'Resistor\' has been REJECTED.', '2025-10-01 12:15:22'),
(4, 11, 14, 'Your product \'Resistor  2\' has been APPROVED. Download your certificate.', '2025-10-01 12:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_testing`
--

CREATE TABLE `product_testing` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `manufacture_num` varchar(50) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `cpri_doc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_testing`
--

INSERT INTO `product_testing` (`user_id`, `product_id`, `product_name`, `product_code`, `manufacture_num`, `details`, `status`, `product_image`, `cpri_doc`) VALUES
(1, 3, 'Capacitor', '1333432', '4354325', 'Please check email within 1 week or check testing details42423134', 3, NULL, NULL),
(10, 4, 'Electric  kit', '090000000', '32432423432', 'Please check email within 1 week or check testing details ang i thunk this the the world best robos in the world', 3, NULL, NULL),
(1, 5, 'kettlw', '03232534349', '525323', 'A capacitor is a passive electronic component that stores electrical energy in an electric field. It consists of two conductive plates separated by an insulating material called a dielectric. When a voltage is applied across the plates, an electric field is created in the dielectric, causing positive charges to accumulate on one plate and negative charges on the other. This separation of charges stores energy in the capacitor.', 2, NULL, NULL),
(10, 6, '7837438 - Italian Cheese.300.00', '4356456546', '4563235141', 'Please check email within 1 week or check testing details', 3, NULL, NULL),
(11, 7, 'Bulb', '032545254525', '545487484845', 'Electronic Item', 2, NULL, NULL),
(11, 8, 'Bulb 2', '032545254525', '545487484845', 'Electronic Item', 3, NULL, NULL),
(11, 9, 'Bulb 4', '032545254525', '000156966656', 'Electronic item', 2, 'uploads/images/Bulb.jfif', 'uploads/docs/Bulb.docx'),
(11, 10, 'Resistor', '321032133302', '245645645655', 'Electric Items', 0, 'uploads/images/imges.png', 'uploads/docs/Bulb.docx'),
(11, 14, 'Resistor  2', '321032133302', '245645645655', 'Electric Items', 2, 'uploads/images/imges.png', 'uploads/docs/Bulb.docx'),
(11, 15, 'capacitor 5', '321032133302', '245645645655', 'Electric Items', 1, 'uploads/images/Bulb.jfif', 'uploads/docs/Bulb.docx');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_password`, `email`, `name`) VALUES
(1, '12112', 'adil@1.co', 'adil'),
(2, '12112', 'aaliyanaslam22@gmail.com', 'aaliyan'),
(3, '12112', 'aaliyanaslam22@gmail.com', 'aaliyan'),
(4, '12112', 'talhasaleem990@gmail.com', 'talha'),
(5, '1212', 'aaliyanaslam22@gmail.com', '2132131'),
(6, '12', 'aaliyanaslam22@gmail.com', 'sadsadd'),
(7, '12', 'aaliyanaslam22@gmail.com', 'fdfdgfdgd'),
(8, '12', 'aaliyanaslam22@gmail.com', 'sadsadd'),
(9, 'dsfdsfdsf@', 'aaliyanaslam22@gmail.com', 'Aaliyan'),
(10, '12112@', 'aaliyanaslam22@gmail.com', 'Aaliyan'),
(11, '@Asad123456789', 'm.asadraza0001@gmail.com', 'Asad Raza'),
(12, '$2y$10$/A4wqZRZ.l6mIUWFgKxOBefYRVdPxmwYJoWV45eing7', 'hannanahmed804@gmail.com', ''),
(13, '@Ahmed123456789', 'Ahmedshah@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_testing`
--
ALTER TABLE `product_testing`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `FK_user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_testing`
--
ALTER TABLE `product_testing`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_testing`
--
ALTER TABLE `product_testing`
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
