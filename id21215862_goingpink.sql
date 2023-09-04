-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 02, 2023 at 06:23 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21215862_goingpink`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB ;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_bookings`
--

DROP TABLE IF EXISTS `hotel_bookings`;
CREATE TABLE IF NOT EXISTS `hotel_bookings` (
  `hotel_id` int NOT NULL AUTO_INCREMENT,
  `hotel_manager_id` int NOT NULL,
  `user_id` int NOT NULL,
  `admin_id` int NOT NULL,
  `hotel_booking_id` int NOT NULL,
  `hotelname` varchar(50) NOT NULL,
  `number_of_pax` varchar(50) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `room_availability` varchar(50) NOT NULL,
  `hotel_availability` varchar(50) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `total_hotel_price` decimal(10,2) NOT NULL,
  `hotel_assigned_staff` varchar(50) NOT NULL,
  PRIMARY KEY (`hotel_id`),
  KEY `hotel_manager_id_key` (`hotel_manager_id`),
  KEY `user_id_key` (`user_id`),
  KEY `admin_id_key` (`admin_id`)
) ENGINE=InnoDB ;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_management`
--

DROP TABLE IF EXISTS `hotel_management`;
CREATE TABLE IF NOT EXISTS `hotel_management` (
  `hotel_manager_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`hotel_manager_id`)
) ENGINE=InnoDB ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `admin_id` int NOT NULL,
  `hotel_booking_id` int NOT NULL,
  `transport_booking_id` int NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_status` varchar(50) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `admin1_id_key` (`admin_id`),
  KEY `user2_id_key` (`user_id`)
) ENGINE=InnoDB ;

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

DROP TABLE IF EXISTS `policy`;
CREATE TABLE IF NOT EXISTS `policy` (
  `policy_id` int NOT NULL AUTO_INCREMENT,
  `admin_id` int NOT NULL,
  `policy_name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`policy_id`),
  KEY `admin3_id_key` (`admin_id`)
) ENGINE=InnoDB ;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `rating_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `feedback_description` varchar(50) NOT NULL,
  `total_stars_rating` varchar(50) NOT NULL,
  PRIMARY KEY (`rating_id`),
  KEY `user3_id_key` (`user_id`)
) ENGINE=InnoDB ;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `report_id` int NOT NULL AUTO_INCREMENT,
  `admin_id` int NOT NULL,
  `report_description` varchar(50) NOT NULL,
  PRIMARY KEY (`report_id`),
  KEY `admin4_id_key` (`admin_id`)
) ENGINE=InnoDB ;

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

DROP TABLE IF EXISTS `support`;
CREATE TABLE IF NOT EXISTS `support` (
  `support_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`support_id`)
) ENGINE=InnoDB ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `ticket_id` int NOT NULL AUTO_INCREMENT,
  `support_id` int NOT NULL,
  `user_id` int NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `support_type` varchar(50) NOT NULL,
  `ticket_description` varchar(50) NOT NULL,
  `ticket_status` varchar(50) NOT NULL,
  `ticket_priority` varchar(50) NOT NULL,
  `ticket_solution` varchar(50) NOT NULL,
  `ticket_assigned_staff` varchar(50) NOT NULL,
  PRIMARY KEY (`ticket_id`),
  KEY `support_id_key` (`support_id`),
  KEY `user5_id_key` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `transportation_bookings`
--

DROP TABLE IF EXISTS `transportation_bookings`;
CREATE TABLE IF NOT EXISTS `transportation_bookings` (
  `transport_id` int NOT NULL AUTO_INCREMENT,
  `transport_manager_id` int NOT NULL,
  `user_id` int NOT NULL,
  `admin_id` int NOT NULL,
  `transport_booking_id` int NOT NULL,
  `transport_type` varchar(50) NOT NULL,
  `transport_status` varchar(50) NOT NULL,
  `transport_availability` varchar(50) NOT NULL,
  `total_transport_price` decimal(10,2) NOT NULL,
  `transport_assigned_staff` varchar(50) NOT NULL,
  `arrival_time` date NOT NULL,
  `departure_time` date NOT NULL,
  `arrival_location` varchar(50) NOT NULL,
  `departure_location` varchar(50) NOT NULL,
  PRIMARY KEY (`transport_id`),
  KEY `transport_manager_id_key` (`transport_manager_id`),
  KEY `user6_id_key` (`user_id`),
  KEY `admin6_id_key` (`admin_id`)
) ENGINE=InnoDB ;

-- --------------------------------------------------------

--
-- Table structure for table `transport_management`
--

DROP TABLE IF EXISTS `transport_management`;
CREATE TABLE IF NOT EXISTS `transport_management` (
  `transport_manager_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`transport_manager_id`)
) ENGINE=InnoDB ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB ;

-- --------------------------------------------------------

--
-- Table structure for table `view_booking_history`
--

DROP TABLE IF EXISTS `view_booking_history`;
CREATE TABLE IF NOT EXISTS `view_booking_history` (
  `history_id` int NOT NULL AUTO_INCREMENT,
  `hotel_id` int NOT NULL,
  `transport_id` int NOT NULL,
  `invoice_id` int NOT NULL,
  `booking_status` varchar(50) NOT NULL,
  PRIMARY KEY (`history_id`),
  KEY `hotel_id_key` (`hotel_id`),
  KEY `transport_id_key` (`transport_id`),
  KEY `invoice_id_key` (`invoice_id`)
) ENGINE=InnoDB ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  ADD CONSTRAINT `admin_id_key` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `hotel_manager_id_key` FOREIGN KEY (`hotel_manager_id`) REFERENCES `hotel_management` (`hotel_manager_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user_id_key` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `admin1_id_key` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user2_id_key` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `policy`
--
ALTER TABLE `policy`
  ADD CONSTRAINT `admin3_id_key` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `user3_id_key` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `admin4_id_key` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `support_id_key` FOREIGN KEY (`support_id`) REFERENCES `support` (`support_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user5_id_key` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `transportation_bookings`
--
ALTER TABLE `transportation_bookings`
  ADD CONSTRAINT `admin6_id_key` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `transport_manager_id_key` FOREIGN KEY (`transport_manager_id`) REFERENCES `transport_management` (`transport_manager_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user6_id_key` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `view_booking_history`
--
ALTER TABLE `view_booking_history`
  ADD CONSTRAINT `hotel_id_key` FOREIGN KEY (`hotel_id`) REFERENCES `hotel_bookings` (`hotel_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `invoice_id_key` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`invoice_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `transport_id_key` FOREIGN KEY (`transport_id`) REFERENCES `transportation_bookings` (`transport_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
