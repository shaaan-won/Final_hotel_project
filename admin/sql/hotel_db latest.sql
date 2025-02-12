-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2025 at 04:54 AM
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
-- Database: `hotel_db`
--
DROP DATABASE IF EXISTS `hotel_db`;
CREATE DATABASE IF NOT EXISTS `hotel_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hotel_db`;
-- --------------------------------------------------------

--
-- Table structure for table `ht_amenities`
--

CREATE TABLE `ht_amenities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `amenity_price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_amenities`
--

INSERT INTO `ht_amenities` (`id`, `name`, `amenity_price`, `description`, `created_at`) VALUES
(1, 'Wi-Fi', 20.00, 'High-speed internet access', '2024-12-19 05:49:33'),
(2, 'Swimming Pool', 50.00, 'Outdoor swimming pool', '2024-12-19 05:49:33'),
(3, 'Gym', 30.00, 'Fitness center with modern equipment', '2024-12-19 05:49:33'),
(4, 'Spa', 100.00, 'Relaxing spa services', '2024-12-19 05:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `ht_bookings`
--

CREATE TABLE `ht_bookings` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `check_in_date` datetime DEFAULT NULL,
  `check_out_date` datetime DEFAULT NULL,
  `status_id` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ht_checkin_checkouts`
--

CREATE TABLE `ht_checkin_checkouts` (
  `id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `check_in_date` datetime DEFAULT NULL,
  `check_out_date` datetime DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ht_customers`
--

CREATE TABLE `ht_customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  `id_card_type_id` int(11) DEFAULT NULL,
  `id_card_number` int(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_customers`
--

INSERT INTO `ht_customers` (`id`, `name`, `first_name`, `last_name`, `email`, `phone`, `id_card_type_id`, `id_card_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'John', 'Doe', '0', 1234567890, 1, 987654321, '123 Main St', '2024-12-19 11:51:14', '2024-12-19 11:51:14'),
(2, 'Jane Smith', 'Jane', 'Smith', '0', 2147483647, 2, 876543210, '456 Elm St', '2024-12-19 11:51:14', '2024-12-19 11:51:14'),
(16, 'Shawon Islam', 'Shawon', 'Islam', 'shawoni397@gmail.com', 132, 3, 2147483647, 'Shahapur46867869', '2025-01-19 12:20:41', '2025-01-19 12:20:41'),
(29, 'Shawon Islam', 'Shawon', 'Islam', 'shawoni397@gmail.com', 132, 2, 2147483647, 'Shahapur', '2025-01-19 12:28:16', '2025-01-19 12:28:16'),
(32, 'Shawon Islam', 'Shawon', 'Islam', 'shawoni397@gmail.com', 132, 2, 879685278, 'Shahapur', '2025-01-19 12:30:54', '2025-01-19 12:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `ht_customer_feedbacks`
--

CREATE TABLE `ht_customer_feedbacks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `comments` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_customer_feedbacks`
--

INSERT INTO `ht_customer_feedbacks` (`id`, `user_id`, `customer_id`, `comments`, `rating`, `created_at`) VALUES
(1, 127, 1, 'Great service and friendly staff', 5, '2024-12-21 21:10:17'),
(2, 127, 2, 'Room was clean and comfortable', 4, '2024-12-21 21:10:22');

-- --------------------------------------------------------

--
-- Stand-in structure for view `ht_hotel_dashboards`
-- (See below for the actual view)
--
CREATE TABLE `ht_hotel_dashboards` (
`total_customers` bigint(21)
,`total_check_ins` bigint(21)
,`total_check_outs` bigint(21)
,`total_revenue` decimal(32,2)
,`today_revenue` decimal(32,2)
,`this_month_revenue` decimal(32,2)
,`this_year_revenue` decimal(32,2)
,`standard_rooms_total` bigint(21)
,`deluxe_rooms_total` bigint(21)
,`suite_rooms_total` bigint(21)
,`penthouse_rooms_total` bigint(21)
,`available_rooms` bigint(21)
,`booked_rooms` bigint(21)
,`maintenance_rooms` bigint(21)
,`standard_rooms` bigint(21)
,`deluxe_rooms` bigint(21)
,`suite_rooms` bigint(21)
,`penthouse_rooms` bigint(21)
,`today_check_ins` bigint(21)
,`today_check_outs` bigint(21)
,`current_check_ins` bigint(21)
,`future_check_ins` bigint(21)
,`average_customer_rating` decimal(12,1)
,`total_feedbacks` bigint(21)
,`paid_payments` bigint(21)
,`pending_payments` bigint(21)
,`failed_payments` bigint(21)
,`total_bookings` bigint(21)
,`total_rooms` bigint(21)
,`total_room_types` bigint(21)
,`total_payments` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `ht_hotel_events`
--

CREATE TABLE `ht_hotel_events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `location` text DEFAULT NULL,
  `attendees` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_hotel_events`
--

INSERT INTO `ht_hotel_events` (`id`, `name`, `customer_id`, `event_date`, `event_time`, `location`, `attendees`, `created_at`, `updated_at`) VALUES
(1, 'Wedding', 1, '2023-08-15', '18:00:00', 'Main Hall', 200, '2024-12-19 05:49:33', '2024-12-19 05:49:33'),
(2, 'Wedding', 1, '2023-08-15', '18:00:00', 'Grand Hall', 100, '2024-12-19 05:49:33', '2024-12-19 05:49:33'),
(3, 'Conference', 2, '2023-09-20', '09:00:00', 'Conference Room A', 50, '2024-12-19 05:49:33', '2024-12-19 05:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `ht_id_card_types`
--

CREATE TABLE `ht_id_card_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_id_card_types`
--

INSERT INTO `ht_id_card_types` (`id`, `name`, `created_at`) VALUES
(1, 'National ID', '2024-12-19 22:49:07'),
(2, 'Birth Certificate', '2024-12-19 22:49:07'),
(3, 'Passport', '2024-12-19 22:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `ht_inventorys`
--

CREATE TABLE `ht_inventorys` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_inventorys`
--

INSERT INTO `ht_inventorys` (`id`, `supplier_id`, `item_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 200, 3.50, '2024-12-27 19:48:54', '2024-12-27 19:48:54'),
(2, 2, 3, 146, 4.00, '2024-12-27 19:38:14', '2024-12-28 07:23:56'),
(3, 3, 2, 197, 1.25, '2024-12-27 19:38:21', '2024-12-28 07:23:56'),
(4, 4, 4, 247, 2.75, '2024-12-27 19:38:26', '2024-12-28 07:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `ht_invoices`
--

CREATE TABLE `ht_invoices` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `room_amenitie_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `service_charges` int(11) NOT NULL,
  `cleaning_charges` int(11) NOT NULL,
  `payment_status_id` int(11) DEFAULT NULL,
  `amount_due` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ht_items`
--

CREATE TABLE `ht_items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_items`
--

INSERT INTO `ht_items` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Shampoo', 'Hair cleansing shampoo', 5.99, '2024-12-19 05:49:33', '2024-12-19 05:49:33'),
(2, 'Conditioner', 'Hair softening conditioner', 6.99, '2024-12-19 05:49:33', '2024-12-19 05:49:33'),
(3, 'Soap', 'Body cleansing soap', 2.99, '2024-12-19 05:49:33', '2024-12-19 05:49:33'),
(4, 'Toothpaste', 'Mint flavored toothpaste', 3.99, '2024-12-19 05:49:33', '2024-12-19 05:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `ht_loyalty_programs`
--

CREATE TABLE `ht_loyalty_programs` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `points` int(11) DEFAULT 0,
  `membership_level` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_loyalty_programs`
--

INSERT INTO `ht_loyalty_programs` (`id`, `customer_id`, `points`, `membership_level`, `created_at`, `updated_at`) VALUES
(1, 1, 1000, 'Gold', '2024-12-19 05:49:33', '2024-12-19 05:49:33'),
(2, 2, 1500, 'Platinum', '2024-12-19 05:49:33', '2024-12-19 05:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `ht_orders`
--

CREATE TABLE `ht_orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ht_order_items`
--

CREATE TABLE `ht_order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `ht_order_items`
--
DELIMITER $$
CREATE TRIGGER `update_inventory_after_sale` AFTER INSERT ON `ht_order_items` FOR EACH ROW BEGIN
    -- Update the quantity in ht_inventorys table
    UPDATE ht_inventorys
    SET quantity = quantity - NEW.quantity
    WHERE item_id = NEW.item_id;

    -- Optional: Add a condition to prevent the quantity from going negative
    IF (SELECT quantity FROM ht_inventorys WHERE item_id = NEW.item_id) < 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Insufficient stock in inventory!';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ht_payments`
--

CREATE TABLE `ht_payments` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `payment_statuse_id` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ht_payment_methods`
--

CREATE TABLE `ht_payment_methods` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_payment_methods`
--

INSERT INTO `ht_payment_methods` (`id`, `name`, `created_at`) VALUES
(1, 'credit card', '2024-12-21 05:42:09'),
(2, 'Paypal', '2024-12-21 05:42:18'),
(3, 'Bank Transfer', '2024-12-21 05:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `ht_payment_statuses`
--

CREATE TABLE `ht_payment_statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_payment_statuses`
--

INSERT INTO `ht_payment_statuses` (`id`, `name`, `created_at`) VALUES
(1, 'Due', '2024-12-27 06:21:24'),
(2, 'Paid', '2024-12-27 06:20:44'),
(3, 'Failed', '2024-12-19 05:49:33'),
(4, 'Completed', '2024-12-27 18:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `ht_promotions`
--

CREATE TABLE `ht_promotions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `discount_percentage` decimal(5,2) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_promotions`
--

INSERT INTO `ht_promotions` (`id`, `name`, `description`, `discount_percentage`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'Summer Sale', 'Discount on all rooms', 10.00, '2023-06-01', '2023-06-30', '2024-12-19 05:49:33', '2024-12-19 05:49:33'),
(2, 'Winter Offer', 'Special rates for winter', 15.00, '2023-12-01', '2023-12-31', '2024-12-19 05:49:33', '2024-12-19 05:49:33'),
(3, 'Holiday Package', 'Holiday season discount', 20.00, '2023-12-15', '2023-12-25', '2024-12-19 05:49:33', '2024-12-19 05:49:33'),
(4, 'New Year Deal', 'New Year promotion', 25.00, '2023-12-31', '2024-01-05', '2024-12-19 05:49:33', '2024-12-19 05:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `ht_reports`
--

CREATE TABLE `ht_reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `report_type` varchar(50) DEFAULT NULL,
  `report_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_reports`
--

INSERT INTO `ht_reports` (`id`, `user_id`, `report_type`, `report_description`, `created_at`, `updated_at`) VALUES
(1, 194, 'Incident', 'Lost and found item reported', '2024-12-21 21:12:17', '2024-12-21 21:12:17'),
(2, 199, 'Maintenance', 'Leaky faucet in room 204', '2024-12-21 21:12:22', '2024-12-21 21:12:22'),
(3, 206, 'Service', 'Slow room service response', '2024-12-21 21:12:26', '2024-12-21 21:12:26'),
(4, 194, 'Complaint', 'Noisy neighbors in room 305', '2024-12-21 21:12:32', '2024-12-21 21:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `ht_roles`
--

CREATE TABLE `ht_roles` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ht_roles`
--

INSERT INTO `ht_roles` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Admin', '2024-03-02 04:59:14', '2024-03-01 22:59:14'),
(2, 'Manager', '2024-02-28 12:10:59', '2024-02-28 00:10:59'),
(4, 'Guest', '2024-03-07 10:24:21', '2024-03-06 22:24:21'),
(5, 'Manager', '2024-03-07 12:25:34', '2024-03-07 00:25:34'),
(6, 'Manager', '2024-03-07 12:25:53', '2024-03-07 00:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `ht_rooms`
--

CREATE TABLE `ht_rooms` (
  `id` int(11) NOT NULL,
  `room_number` varchar(50) DEFAULT NULL,
  `room_type_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_rooms`
--

INSERT INTO `ht_rooms` (`id`, `room_number`, `room_type_id`, `price`, `capacity`, `status_id`, `created_at`, `updated_at`) VALUES
(1, '101', 1, 100.00, 2, 6, '2025-02-10 07:30:29', '2025-02-10 07:30:29'),
(2, '102', 2, 150.00, 3, 6, '2025-02-10 07:30:33', '2025-02-10 07:30:33'),
(3, '103', 3, 200.00, 4, 6, '2025-02-10 07:30:37', '2025-02-10 07:30:37'),
(4, '104', 4, 250.00, 2, 6, '2025-02-10 07:30:41', '2025-02-10 07:30:41'),
(7, '105', 1, 150.00, 2, 6, '2025-02-10 07:31:16', '2025-02-10 07:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `ht_room_amenities`
--

CREATE TABLE `ht_room_amenities` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `request_date` datetime DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ht_room_amenity_details`
--

CREATE TABLE `ht_room_amenity_details` (
  `id` int(11) NOT NULL,
  `room_amenity_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `amenity_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ht_room_maintenance`
--

CREATE TABLE `ht_room_maintenance` (
  `id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status_id` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_room_maintenance`
--

INSERT INTO `ht_room_maintenance` (`id`, `room_id`, `description`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'AC not working', 1, '2024-12-19 05:49:33', '2024-12-21 20:26:06'),
(2, 2, 'Leaky faucet', 1, '2024-12-19 05:49:33', '2024-12-21 20:26:11'),
(3, 3, 'Broken window', 2, '2024-12-19 05:49:33', '2024-12-21 20:26:16'),
(4, 4, 'Carpet cleaning', 1, '2024-12-19 05:49:33', '2024-12-21 20:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `ht_room_service_requests`
--

CREATE TABLE `ht_room_service_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `request_type` varchar(50) DEFAULT NULL,
  `request_description` text DEFAULT NULL,
  `status_id` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_room_service_requests`
--

INSERT INTO `ht_room_service_requests` (`id`, `user_id`, `room_id`, `customer_id`, `request_type`, `request_description`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 200, 1, 1, 'Cleaning', 'Room cleaning requested', 1, '2024-12-21 20:49:23', '2024-12-21 20:49:23'),
(2, 197, 2, 2, 'Maintenance', 'Air conditioning not working', 1, '2024-12-21 20:49:28', '2024-12-21 20:49:28');

-- --------------------------------------------------------

--
-- Table structure for table `ht_room_types`
--

CREATE TABLE `ht_room_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_room_types`
--

INSERT INTO `ht_room_types` (`id`, `name`, `description`, `photo`, `created_at`) VALUES
(1, 'Standard', 'Basic room with essential amenities', '', '2024-12-19 05:49:33'),
(2, 'Deluxe', 'Spacious room with additional features', '', '2024-12-19 05:49:33'),
(3, 'Suite', 'Luxurious suite with premium services', '', '2024-12-19 05:49:33'),
(4, 'Penthouse', 'Exclusive top-floor suite with panoramic views', '', '2024-12-19 05:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `ht_staffs`
--

CREATE TABLE `ht_staffs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `staff_role_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `work_schedule_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`work_schedule_id`)),
  `hired_date` date DEFAULT NULL,
  `performance_score` decimal(3,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_staffs`
--

INSERT INTO `ht_staffs` (`id`, `name`, `staff_role_id`, `email`, `phone`, `address`, `work_schedule_id`, `hired_date`, `performance_score`, `created_at`, `updated_at`) VALUES
(1, 'Michael Scott', 1, 'michael.scott@example.com', 1234567890, 'Scranton, PA', '1', '2023-01-10', 4.50, '2024-12-19 05:49:33', '2025-01-08 03:25:40'),
(2, 'Dwight Schrute', 2, 'dwight.schrute@example.com', 2147483647, 'Scranton, PA', '2', '2023-01-10', 4.70, '2024-12-19 05:49:33', '2025-01-08 03:25:47'),
(3, 'Jim Halpert', 3, 'jim.halpert@example.com', 2147483647, 'Scranton, PA', '3', '2023-01-10', 4.60, '2024-12-19 05:49:33', '2025-01-08 03:25:54'),
(4, 'Pam Beesly', 4, 'pam.beesly@example.com', 2147483647, 'Scranton, PA', '4', '2023-01-10', 4.80, '2024-12-19 05:49:33', '2025-01-08 03:25:59'),
(9, 'Shawon Islam', 2, 'shawoni397@gmail.com', 132, 'Shahapur', '1', '2002-05-24', 3.22, '2025-01-09 05:26:18', '2025-01-09 05:26:18'),
(14, 'Shawon Islam', 2, 'shawoni397dj@gmail.com', 132, 'Shahapur', '1', '2025-01-24', 3.22, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Shawon Islam', 1, 'shawo97@gmail.com', 132, 'Shahapur', '1', '2025-01-14', 3.22, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Shawon Islam', 1, 'shawongrei397@gmail.com', 132, 'Shahapur', '1', '2025-01-22', 3.22, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ht_staff_performance_reviews`
--

CREATE TABLE `ht_staff_performance_reviews` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `review_date` date DEFAULT NULL,
  `review_score` decimal(3,2) DEFAULT NULL,
  `review_comments` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_staff_performance_reviews`
--

INSERT INTO `ht_staff_performance_reviews` (`id`, `staff_id`, `review_date`, `review_score`, `review_comments`, `created_at`) VALUES
(1, 1, '2023-06-30', 4.50, 'Excellent performance', '2024-12-19 05:49:33'),
(2, 2, '2023-06-30', 4.00, 'Good job overall', '2024-12-19 05:49:33'),
(3, 3, '2023-06-30', 4.20, 'Solid performance', '2024-12-19 05:49:33'),
(4, 4, '2023-06-30', 4.80, 'Outstanding effort', '2024-12-19 05:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `ht_staff_roles`
--

CREATE TABLE `ht_staff_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_staff_roles`
--

INSERT INTO `ht_staff_roles` (`id`, `name`, `created_at`) VALUES
(1, 'Manager', '2024-12-19 05:49:33'),
(2, 'Assistant to the Regional Manager', '2024-12-19 05:49:33'),
(3, 'Sales Representative', '2024-12-19 05:49:33'),
(4, 'Receptionist', '2024-12-19 05:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `ht_statuss`
--

CREATE TABLE `ht_statuss` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_statuss`
--

INSERT INTO `ht_statuss` (`id`, `name`, `created_at`) VALUES
(1, 'Pending', '2024-12-19 05:49:33'),
(2, 'In Progress', '2024-12-19 05:49:33'),
(3, 'Completed', '2024-12-19 05:49:33'),
(4, 'Cancelled', '2024-12-19 05:49:33'),
(5, 'Booked', '2024-12-21 18:40:12'),
(6, 'Available', '2024-12-23 03:22:39');

-- --------------------------------------------------------

--
-- Table structure for table `ht_suppliers`
--

CREATE TABLE `ht_suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_suppliers`
--

INSERT INTO `ht_suppliers` (`id`, `name`, `contact_name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'ABC Supplies', 'John Supplier', 'john.supplier@example.com', '123-456-7890', '789 Warehouse St', '2024-12-19 05:49:33', '2024-12-19 05:49:33'),
(2, 'XYZ Distributors', 'Jane Distributor', 'jane.distributor@example.com', '234-567-8901', '123 Supply Ave', '2024-12-19 05:49:33', '2024-12-19 05:49:33'),
(3, 'Furniture Inc.', 'Alice Furniture', 'alice.furniture@example.com', '345-678-9012', '456 Sofa St', '2024-12-19 05:49:33', '2024-12-19 05:49:33'),
(4, 'Tech Gear', 'Bob Tech', 'bob.tech@example.com', '456-789-0123', '101 Gadget Blvd', '2024-12-19 05:49:33', '2024-12-19 05:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `ht_users`
--

CREATE TABLE `ht_users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo` varchar(50) DEFAULT NULL,
  `verify_code` varchar(50) DEFAULT NULL,
  `inactive` tinyint(1) UNSIGNED DEFAULT 0,
  `mobile` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `remember_token` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ht_users`
--

INSERT INTO `ht_users` (`id`, `name`, `role_id`, `password`, `email`, `full_name`, `created_at`, `photo`, `verify_code`, `inactive`, `mobile`, `updated_at`, `ip`, `email_verified_at`, `remember_token`) VALUES
(127, 'admin', 1, '$2y$10$zeyUFTm0vqQ0uAUS04kl4ubY6.2Y0zQXqcFC70XvD.8Ot5s3Om5PG', 'towhid1@outlook.com', 'Mohammad Towhidul Islam', '2024-04-28 23:28:06', '127.jpg', '45354353', 0, '34324324', '2022-02-15 21:00:46', '192.168.150.29', NULL, NULL),
(192, 'naeem', 2, '$2y$10$BTQzbrLdYG9/hSfLBf7mzOLzDG1kp6E90OaMh9jEWBafyGkG6oAt6', 'naymur@gmail.com', 'Naymur Rahman', '2024-04-03 23:43:27', NULL, NULL, 0, '01800000000', NULL, '192.168.150.25', NULL, NULL),
(194, 'jakaria', 2, '$2y$10$Zyt3rgYgF9vnDBhNRN/8lO1BirJFCCNr3rhTRiI.7W1aVIuriBJiS', 'jkp.jakaria@gmail.com', 'jkp', '2024-04-14 22:53:54', NULL, NULL, 0, '01642527454', NULL, '192.168.150.47', NULL, NULL),
(196, 'Aminur', 2, '$2y$10$u1Wku9Uh61adCVAPm6ToSOp.8EgdXkiXo/DGp3oD.i/8o9I6a/Dai', 'amiur@gmail.com', 'Aminur Rahman', '2024-04-03 23:45:19', NULL, NULL, 0, '01800000000', NULL, '192.168.150.25', NULL, NULL),
(197, 'Tanim', 2, '$2y$10$NcNFqz1p2N76l4NH96f4Y.KTU8s/e.CqZB.lD7lewc4rcBvMstgaK', 'tanim@gmail.com', 'Rifat Ahammed Tanim', '2024-04-03 23:54:06', NULL, NULL, 0, '01900000000', NULL, '192.168.150.34', NULL, NULL),
(199, 'midul', 2, '$2y$10$sUhLutkkEUOUTWY2yWi.C.B55DFNOhUrbfFnrzcKM2FK7xdDF6Rby', 'midul@yahoo.com', 'Midul Islam', '2024-04-03 23:50:50', NULL, NULL, 0, '0198748343', NULL, '192.168.150.5', NULL, NULL),
(200, 'Jabed ', 2, '$2y$10$mgdw/E0HYncsz1wZaxygKerTF9VAfiPMnq4TSLsscA5CVHSih/RbS', 'olba@gmail.com', 'Javed ', '2024-04-03 23:59:27', NULL, NULL, 0, '01869546555', NULL, '192.168.150.22', NULL, NULL),
(201, 'omar', 2, '$2y$10$GnOgIBKPRsNIeM3OJExotuuBjGqzgcYGnfQeZpz4pug/GNqiLCWwS', 'omar@gmail.com', 'Omar Faruk', '2024-04-14 22:57:44', NULL, NULL, 0, '343434', NULL, '192.168.150.11', NULL, NULL),
(204, 'Anni', 2, '$2y$10$JWg5tGwzGUwnFT/PZBT4wuqIKAw3Vb6X7kWs9zC3ueLSi1RMzi87W', 'jannatulneasa464@gmail.com', 'Jannatul Neasa', '2024-04-03 23:54:32', NULL, NULL, 0, '3254436756', NULL, '192.168.150.29', NULL, NULL),
(206, 'mir3', 4, '$2y$10$wYZrszbJ9LIadOof3PRIzuHQNnjAQuTanA.JBmsreow3nJm04hCRW', 'mir@gmail.com', 'Mizanur Rahman ', '2024-05-15 01:36:41', 'mir3.png', NULL, 0, '', '0000-00-00 00:00:00', '::1', '0000-00-00 00:00:00', ''),
(209, 'abc', 1, '$2y$10$M52jied3IiUeo/ke8QU5SO0tS5IrW3T7aXVEL3a7l7/HN/4l98XKO', 'abc@gmail.com', NULL, '2024-05-15 00:29:14', 'abc-gmail-com.jpg', NULL, 0, NULL, '2024-05-15 12:08:29', '::1', '0000-00-00 00:00:00', ''),
(213, 'sium', 2, '$2y$10$Ziq..GqX0z4Lf2H4tE62VOsSDmyq8BUhESIhHu4BEfLKvrJLUszOS', 'sium@gmail.com', NULL, '2024-05-15 01:43:08', 'sium.jpeg', NULL, 0, NULL, '0000-00-00 00:00:00', '192.168.150.18', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `ht_work_schedules`
--

CREATE TABLE `ht_work_schedules` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_work_schedules`
--

INSERT INTO `ht_work_schedules` (`id`, `staff_id`, `start_time`, `end_time`, `created_at`) VALUES
(1, 1, '2023-06-30 09:00:00', '2023-06-30 17:00:00', '2024-12-19 05:49:33'),
(2, 2, '2023-06-30 09:00:00', '2023-06-30 17:00:00', '2024-12-19 05:49:33'),
(3, 3, '2023-06-30 09:00:00', '2023-06-30 17:00:00', '2024-12-19 05:49:33'),
(4, 4, '2023-06-30 09:00:00', '2023-06-30 17:00:00', '2024-12-19 05:49:33');

-- --------------------------------------------------------

--
-- Structure for view `ht_hotel_dashboards`
--
DROP TABLE IF EXISTS `ht_hotel_dashboards`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ht_hotel_dashboards`  AS SELECT (select count(0) from `ht_customers`) AS `total_customers`, (select count(0) from `ht_bookings` where `ht_bookings`.`check_in_date` <= current_timestamp() and `ht_bookings`.`check_out_date` >= current_timestamp()) AS `total_check_ins`, (select count(0) from `ht_bookings` where `ht_bookings`.`check_out_date` < current_timestamp()) AS `total_check_outs`, (select sum(`ht_invoices`.`total_amount`) from `ht_invoices` where `ht_invoices`.`payment_status_id` = (select `ht_payment_statuses`.`id` from `ht_payment_statuses` where `ht_payment_statuses`.`name` = 'Paid')) AS `total_revenue`, (select sum(`ht_invoices`.`total_amount`) from `ht_invoices` where cast(`ht_invoices`.`created_at` as date) = curdate()) AS `today_revenue`, (select sum(`ht_invoices`.`total_amount`) from `ht_invoices` where month(`ht_invoices`.`created_at`) = month(curdate())) AS `this_month_revenue`, (select sum(`ht_invoices`.`total_amount`) from `ht_invoices` where year(`ht_invoices`.`created_at`) = year(curdate())) AS `this_year_revenue`, (select count(0) from `ht_rooms` where `ht_rooms`.`room_type_id` = (select `ht_room_types`.`id` from `ht_room_types` where `ht_room_types`.`name` = 'Standard')) AS `standard_rooms_total`, (select count(0) from `ht_rooms` where `ht_rooms`.`room_type_id` = (select `ht_room_types`.`id` from `ht_room_types` where `ht_room_types`.`name` = 'Deluxe')) AS `deluxe_rooms_total`, (select count(0) from `ht_rooms` where `ht_rooms`.`room_type_id` = (select `ht_room_types`.`id` from `ht_room_types` where `ht_room_types`.`name` = 'Suite')) AS `suite_rooms_total`, (select count(0) from `ht_rooms` where `ht_rooms`.`room_type_id` = (select `ht_room_types`.`id` from `ht_room_types` where `ht_room_types`.`name` = 'Penthouse')) AS `penthouse_rooms_total`, (select count(0) from `ht_rooms` where `ht_rooms`.`status_id` = (select `ht_statuss`.`id` from `ht_statuss` where `ht_statuss`.`name` = 'Available')) AS `available_rooms`, (select count(0) from `ht_rooms` where `ht_rooms`.`status_id` = (select `ht_statuss`.`id` from `ht_statuss` where `ht_statuss`.`name` = 'Booked')) AS `booked_rooms`, (select count(0) from `ht_rooms` where `ht_rooms`.`status_id` = (select `ht_statuss`.`id` from `ht_statuss` where `ht_statuss`.`name` = 'Maintenance')) AS `maintenance_rooms`, (select count(0) from `ht_rooms` where `ht_rooms`.`status_id` = (select `ht_statuss`.`id` from `ht_statuss` where `ht_statuss`.`name` = 'Available') and `ht_rooms`.`room_type_id` = (select `ht_room_types`.`id` from `ht_room_types` where `ht_room_types`.`name` = 'Standard')) AS `standard_rooms`, (select count(0) from `ht_rooms` where `ht_rooms`.`status_id` = (select `ht_statuss`.`id` from `ht_statuss` where `ht_statuss`.`name` = 'Available') and `ht_rooms`.`room_type_id` = (select `ht_room_types`.`id` from `ht_room_types` where `ht_room_types`.`name` = 'Deluxe')) AS `deluxe_rooms`, (select count(0) from `ht_rooms` where `ht_rooms`.`status_id` = (select `ht_statuss`.`id` from `ht_statuss` where `ht_statuss`.`name` = 'Available') and `ht_rooms`.`room_type_id` = (select `ht_room_types`.`id` from `ht_room_types` where `ht_room_types`.`name` = 'Suite')) AS `suite_rooms`, (select count(0) from `ht_rooms` where `ht_rooms`.`status_id` = (select `ht_statuss`.`id` from `ht_statuss` where `ht_statuss`.`name` = 'Available') and `ht_rooms`.`room_type_id` = (select `ht_room_types`.`id` from `ht_room_types` where `ht_room_types`.`name` = 'Penthouse')) AS `penthouse_rooms`, (select count(0) from `ht_bookings` where cast(`ht_bookings`.`check_in_date` as date) = curdate()) AS `today_check_ins`, (select count(0) from `ht_bookings` where cast(`ht_bookings`.`check_out_date` as date) = curdate()) AS `today_check_outs`, (select count(0) from `ht_bookings` where `ht_bookings`.`check_in_date` <= current_timestamp() and `ht_bookings`.`check_out_date` >= current_timestamp()) AS `current_check_ins`, (select count(0) from `ht_bookings` where `ht_bookings`.`check_out_date` > current_timestamp()) AS `future_check_ins`, (select round(avg(`ht_customer_feedbacks`.`rating`),1) from `ht_customer_feedbacks`) AS `average_customer_rating`, (select count(0) from `ht_customer_feedbacks`) AS `total_feedbacks`, (select count(0) from `ht_payments` where `ht_payments`.`payment_statuse_id` = (select `ht_payment_statuses`.`id` from `ht_payment_statuses` where `ht_payment_statuses`.`name` = 'Paid')) AS `paid_payments`, (select count(0) from `ht_payments` where `ht_payments`.`payment_statuse_id` = (select `ht_payment_statuses`.`id` from `ht_payment_statuses` where `ht_payment_statuses`.`name` = 'Pending')) AS `pending_payments`, (select count(0) from `ht_payments` where `ht_payments`.`payment_statuse_id` = (select `ht_payment_statuses`.`id` from `ht_payment_statuses` where `ht_payment_statuses`.`name` = 'Failed')) AS `failed_payments`, (select count(0) from `ht_bookings`) AS `total_bookings`, (select count(0) from `ht_rooms`) AS `total_rooms`, (select count(0) from `ht_room_types`) AS `total_room_types`, (select count(0) from `ht_payments`) AS `total_payments` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ht_amenities`
--
ALTER TABLE `ht_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_bookings`
--
ALTER TABLE `ht_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_checkin_checkouts`
--
ALTER TABLE `ht_checkin_checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_customers`
--
ALTER TABLE `ht_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_customer_feedbacks`
--
ALTER TABLE `ht_customer_feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_hotel_events`
--
ALTER TABLE `ht_hotel_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_id_card_types`
--
ALTER TABLE `ht_id_card_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_inventorys`
--
ALTER TABLE `ht_inventorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_invoices`
--
ALTER TABLE `ht_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_items`
--
ALTER TABLE `ht_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_loyalty_programs`
--
ALTER TABLE `ht_loyalty_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_orders`
--
ALTER TABLE `ht_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_order_items`
--
ALTER TABLE `ht_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_payments`
--
ALTER TABLE `ht_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_payment_methods`
--
ALTER TABLE `ht_payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_payment_statuses`
--
ALTER TABLE `ht_payment_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_promotions`
--
ALTER TABLE `ht_promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_reports`
--
ALTER TABLE `ht_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_roles`
--
ALTER TABLE `ht_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_rooms`
--
ALTER TABLE `ht_rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_number` (`room_number`);

--
-- Indexes for table `ht_room_amenities`
--
ALTER TABLE `ht_room_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_room_amenity_details`
--
ALTER TABLE `ht_room_amenity_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_room_maintenance`
--
ALTER TABLE `ht_room_maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_room_service_requests`
--
ALTER TABLE `ht_room_service_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_room_types`
--
ALTER TABLE `ht_room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_staffs`
--
ALTER TABLE `ht_staffs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `ht_staff_performance_reviews`
--
ALTER TABLE `ht_staff_performance_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_staff_roles`
--
ALTER TABLE `ht_staff_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_statuss`
--
ALTER TABLE `ht_statuss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_suppliers`
--
ALTER TABLE `ht_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_users`
--
ALTER TABLE `ht_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_work_schedules`
--
ALTER TABLE `ht_work_schedules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ht_amenities`
--
ALTER TABLE `ht_amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_bookings`
--
ALTER TABLE `ht_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ht_checkin_checkouts`
--
ALTER TABLE `ht_checkin_checkouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ht_customers`
--
ALTER TABLE `ht_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `ht_customer_feedbacks`
--
ALTER TABLE `ht_customer_feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_hotel_events`
--
ALTER TABLE `ht_hotel_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ht_id_card_types`
--
ALTER TABLE `ht_id_card_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ht_inventorys`
--
ALTER TABLE `ht_inventorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ht_invoices`
--
ALTER TABLE `ht_invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ht_items`
--
ALTER TABLE `ht_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_loyalty_programs`
--
ALTER TABLE `ht_loyalty_programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_orders`
--
ALTER TABLE `ht_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ht_order_items`
--
ALTER TABLE `ht_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ht_payments`
--
ALTER TABLE `ht_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ht_payment_methods`
--
ALTER TABLE `ht_payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ht_payment_statuses`
--
ALTER TABLE `ht_payment_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_promotions`
--
ALTER TABLE `ht_promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_reports`
--
ALTER TABLE `ht_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_roles`
--
ALTER TABLE `ht_roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ht_rooms`
--
ALTER TABLE `ht_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ht_room_amenities`
--
ALTER TABLE `ht_room_amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ht_room_amenity_details`
--
ALTER TABLE `ht_room_amenity_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ht_room_maintenance`
--
ALTER TABLE `ht_room_maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_room_service_requests`
--
ALTER TABLE `ht_room_service_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_room_types`
--
ALTER TABLE `ht_room_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_staffs`
--
ALTER TABLE `ht_staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ht_staff_performance_reviews`
--
ALTER TABLE `ht_staff_performance_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_staff_roles`
--
ALTER TABLE `ht_staff_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_statuss`
--
ALTER TABLE `ht_statuss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ht_suppliers`
--
ALTER TABLE `ht_suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_users`
--
ALTER TABLE `ht_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `ht_work_schedules`
--
ALTER TABLE `ht_work_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
