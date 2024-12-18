-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2024 at 07:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelmngmnt_shaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `ht_billings`
--

CREATE TABLE `ht_billings` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `itemized_charges` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`itemized_charges`)),
  `total_amount` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_billings`
--

INSERT INTO `ht_billings` (`id`, `reservation_id`, `user_id`, `itemized_charges`, `total_amount`, `payment_method`, `payment_date`, `created_at`) VALUES
(1, 1, 1, '{\"room_charge\": 150.00, \"tax\": 50.00}', 200.00, 'Credit Card', '2024-11-25 18:00:00', '2024-11-26 04:23:38'),
(2, 2, 2, '{\"room_charge\": 400.00, \"tax\": 50.00}', 450.00, 'Debit Card', '2024-11-30 18:00:00', '2024-11-26 04:23:38'),
(3, 3, 3, '{\"room_charge\": 550.00, \"tax\": 50.00}', 600.00, 'Credit Card', '2024-12-09 18:00:00', '2024-11-26 04:23:38'),
(4, 4, 4, '{\"room_charge\": 1000.00, \"tax\": 200.00}', 1200.00, 'PayPal', '2024-12-14 18:00:00', '2024-11-26 04:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `ht_checkincheckout`
--

CREATE TABLE `ht_checkincheckout` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `check_in_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `check_out_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comments` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_checkincheckout`
--

INSERT INTO `ht_checkincheckout` (`id`, `reservation_id`, `check_in_time`, `check_out_time`, `comments`, `created_at`) VALUES
(1, 1, '2024-11-26 08:00:00', '2024-11-30 06:00:00', 'No issues at check-in.', '2024-11-26 04:23:38'),
(2, 2, '2024-12-01 10:00:00', '2024-12-05 05:00:00', 'Guest requested late check-in and was accommodated.', '2024-11-26 04:23:38'),
(3, 3, '2024-12-10 09:00:00', '2024-12-12 04:00:00', 'Extra pillows were provided as requested.', '2024-11-26 04:23:38'),
(4, 4, '2024-12-15 08:30:00', '2024-12-18 06:00:00', 'Guests celebrated their anniversary; everything went smoothly.', '2024-11-26 04:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `ht_customer_details`
--

CREATE TABLE `ht_customer_details` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `id_card_type_name` int(10) DEFAULT NULL,
  `id_card_number` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_customer_details`
--

INSERT INTO `ht_customer_details` (`id`, `name`, `first_name`, `last_name`, `email`, `phone`, `id_card_type_name`, `id_card_number`, `address`, `created_at`, `updated_at`) VALUES
(1, '', 'Michael', 'Green', 'michael.green@example.com', '1231231234', 1, 'A12345678', '321 Elm St', '2024-11-26 04:23:38', '2024-11-26 04:23:38'),
(2, '', 'Sarah', 'White', 'sarah.white@example.com', '5675675678', 2, 'B23456789', '654 Oak St', '2024-11-26 04:23:38', '2024-11-26 04:23:38'),
(3, '', 'David', 'Brown', 'david.brown@example.com', '2342342345', 3, 'C34567890', '987 Pine St', '2024-11-26 04:23:38', '2024-11-26 04:23:38'),
(4, '', 'Emily', 'Taylor', 'emily.taylor@example.com', '8768768765', 3, 'D45678901', '123 Birch St', '2024-11-26 04:23:38', '2024-11-26 04:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `ht_customer_feedback`
--

CREATE TABLE `ht_customer_feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_customer_feedback`
--

INSERT INTO `ht_customer_feedback` (`id`, `user_id`, `comments`, `rating`, `created_at`) VALUES
(1, 1, 'Great stay, room was clean and comfortable!', 5, '2024-11-26 04:23:38'),
(2, 2, 'Good service, but the check-in process took too long.', 3, '2024-11-26 04:23:38'),
(3, 3, 'The suite was amazing, would definitely book again!', 5, '2024-11-26 04:23:38'),
(4, 4, 'Had a wonderful time, staff was friendly and accommodating.', 4, '2024-11-26 04:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `ht_id_card_types`
--

CREATE TABLE `ht_id_card_types` (
  `id` int(11) NOT NULL,
  `id_card_type_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_id_card_types`
--

INSERT INTO `ht_id_card_types` (`id`, `id_card_type_name`, `created_at`) VALUES
(1, 'Passport', '2024-11-26 04:23:38'),
(2, 'Driver License', '2024-11-26 04:23:38'),
(3, 'National ID', '2024-11-26 04:23:38'),
(4, 'Student ID', '2024-11-26 04:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `ht_payments`
--

CREATE TABLE `ht_payments` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_payments`
--

INSERT INTO `ht_payments` (`id`, `reservation_id`, `amount`, `payment_method_id`, `payment_date`, `created_at`) VALUES
(1, 1, 200.00, 1, '2024-11-25 18:00:00', '2024-11-26 04:23:38'),
(2, 2, 450.00, 2, '2024-11-30 18:00:00', '2024-11-26 04:23:38'),
(3, 3, 600.00, 1, '2024-12-09 18:00:00', '2024-11-26 04:23:38'),
(4, 4, 1200.00, 3, '2024-12-14 18:00:00', '2024-11-26 04:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `ht_payment_methods`
--

CREATE TABLE `ht_payment_methods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_payment_methods`
--

INSERT INTO `ht_payment_methods` (`id`, `name`, `description`) VALUES
(1, 'Credit Card', 'Payment made using a credit card.'),
(2, 'Debit Card', 'Payment made using a debit card.'),
(3, 'PayPal', 'Payment made through PayPal.'),
(4, 'Cash', 'Payment made using cash.');

-- --------------------------------------------------------

--
-- Table structure for table `ht_performance_reviews`
--

CREATE TABLE `ht_performance_reviews` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `review_date` date DEFAULT NULL,
  `review_score` decimal(3,2) DEFAULT NULL,
  `review_comments` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_performance_reviews`
--

INSERT INTO `ht_performance_reviews` (`id`, `staff_id`, `review_date`, `review_score`, `review_comments`, `created_at`) VALUES
(1, 1, '2024-06-15', 4.50, 'Excellent management skills and customer interaction.', '2024-11-26 04:23:38'),
(2, 2, '2024-07-15', 4.20, 'Consistently delivers quality work, but needs improvement in time management.', '2024-11-26 04:23:38'),
(3, 3, '2024-08-15', 4.80, 'Outstanding performance, always going above and beyond for guests.', '2024-11-26 04:23:38'),
(4, 4, '2024-09-15', 4.00, 'Good performance, but occasional lapses in communication.', '2024-11-26 04:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `ht_reports`
--

CREATE TABLE `ht_reports` (
  `id` int(11) NOT NULL,
  `report_type` varchar(255) DEFAULT NULL,
  `report_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`report_data`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_reports`
--

INSERT INTO `ht_reports` (`id`, `report_type`, `report_data`, `created_at`) VALUES
(1, 'Monthly Revenue', '{\"total_revenue\": 20000.00, \"room_sales\": 15000.00, \"service_sales\": 5000.00}', '2024-11-26 04:23:38'),
(2, 'Staff Performance', '{\"average_performance_score\": 4.5, \"highest_performance_score\": 4.8, \"lowest_performance_score\": 4.0}', '2024-11-26 04:23:38'),
(3, 'Customer Feedback', '{\"average_rating\": 4.3, \"positive_comments\": 75, \"negative_comments\": 25}', '2024-11-26 04:23:38'),
(4, 'Occupancy Report', '{\"total_rooms\": 100, \"rooms_occupied\": 80, \"vacant_rooms\": 20}', '2024-11-26 04:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `ht_reservations`
--

CREATE TABLE `ht_reservations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `room_id` int(11) DEFAULT NULL,
  `check_in_date` date DEFAULT NULL,
  `check_out_date` date DEFAULT NULL,
  `special_requests` text DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `remaining_amount` decimal(10,2) DEFAULT NULL,
  `payment_status` enum('Pending','Paid','Cancelled') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_reservations`
--

INSERT INTO `ht_reservations` (`id`, `user_id`, `customer_id`, `booking_date`, `room_id`, `check_in_date`, `check_out_date`, `special_requests`, `total_amount`, `remaining_amount`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 1, 101, '2024-11-26 04:23:38', 1, '2024-11-26', '2024-11-30', 'No special requests', 200.00, 200.00, 'Pending', '2024-11-26 04:23:38', '2024-11-26 04:23:38'),
(2, 2, 102, '2024-11-26 04:23:38', 2, '2024-12-01', '2024-12-05', 'Late check-in request', 450.00, 450.00, 'Pending', '2024-11-26 04:23:38', '2024-11-26 04:23:38'),
(3, 3, 103, '2024-11-26 04:23:38', 3, '2024-12-10', '2024-12-12', 'Request for extra pillows', 600.00, 600.00, 'Pending', '2024-11-26 04:23:38', '2024-11-26 04:23:38'),
(4, 4, 104, '2024-11-26 04:23:38', 4, '2024-12-15', '2024-12-18', 'Celebrate anniversary', 1200.00, 1200.00, 'Pending', '2024-11-26 04:23:38', '2024-11-26 04:23:38');

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
  `name` int(100) NOT NULL,
  `room_number` varchar(10) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_rooms`
--

INSERT INTO `ht_rooms` (`id`, `name`, `room_number`, `room_type_id`, `created_at`, `updated_at`) VALUES
(1, 0, '101', 1, '2024-11-26 04:23:38', '2024-11-26 04:23:38'),
(2, 0, '102', 2, '2024-11-26 04:23:38', '2024-11-26 04:23:38'),
(3, 0, '201', 3, '2024-11-26 04:23:38', '2024-11-26 04:23:38'),
(4, 0, '301', 4, '2024-11-26 04:23:38', '2024-11-26 04:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `ht_room_servicerequests`
--

CREATE TABLE `ht_room_servicerequests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `request_type` varchar(50) DEFAULT NULL,
  `request_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_room_servicerequests`
--

INSERT INTO `ht_room_servicerequests` (`id`, `user_id`, `room_id`, `request_type`, `request_description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Cleaning', 'Requested room cleaning service.', '2024-11-26 04:23:38', '2024-11-26 04:23:38'),
(2, 2, 2, 'Food', 'Ordered breakfast to be delivered at 7 AM.', '2024-11-26 04:23:38', '2024-11-26 04:23:38'),
(3, 3, 3, 'Laundry', 'Requested laundry pickup for two shirts.', '2024-11-26 04:23:38', '2024-11-26 04:23:38'),
(4, 4, 4, 'Spa', 'Requested a massage to be scheduled for the afternoon.', '2024-11-26 04:23:38', '2024-11-26 04:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `ht_room_types`
--

CREATE TABLE `ht_room_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `max_occupancy` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_room_types`
--

INSERT INTO `ht_room_types` (`id`, `name`, `description`, `max_occupancy`, `created_at`, `updated_at`) VALUES
(1, 'Single Room', 'A small room with a single bed, ideal for one person.', 1, '2024-11-26 04:23:38', '2024-11-26 04:23:38'),
(2, 'Double Room', 'A spacious room with two beds, ideal for two people.', 2, '2024-11-26 04:23:38', '2024-11-26 04:23:38'),
(3, 'Suite', 'A luxurious room with a separate living area, perfect for business or long stays.', 4, '2024-11-26 04:23:38', '2024-11-26 04:23:38'),
(4, 'Penthouse', 'A high-end room with panoramic views and luxury amenities.', 2, '2024-11-26 04:23:38', '2024-11-26 04:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `ht_staff_details`
--

CREATE TABLE `ht_staff_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `work_schedule` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`work_schedule`)),
  `hired_date` date DEFAULT NULL,
  `performance_score` decimal(3,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_staff_details`
--

INSERT INTO `ht_staff_details` (`id`, `name`, `first_name`, `last_name`, `role_id`, `email`, `phone`, `address`, `work_schedule`, `hired_date`, `performance_score`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'John', 'Doe', 1, 'johndoe@hotel.com', '1234567890', '123 Main St', '{\"Monday\": \"9:00-17:00\", \"Tuesday\": \"9:00-17:00\"}', '2022-01-15', 4.50, '2024-11-26 04:23:38', '2024-11-26 04:23:38'),
(2, 'Jane Smith', 'Jane', 'Smith', 2, 'janesmith@hotel.com', '0987654321', '456 Oak St', '{\"Wednesday\": \"9:00-17:00\", \"Thursday\": \"9:00-17:00\"}', '2021-07-30', 4.20, '2024-11-26 04:23:38', '2024-11-26 04:23:38'),
(3, 'Alice Johnson', 'Alice', 'Johnson', 3, 'alicejohnson@hotel.com', '1122334455', '789 Pine St', '{\"Friday\": \"9:00-17:00\", \"Saturday\": \"9:00-17:00\"}', '2023-04-01', 4.80, '2024-11-26 04:23:38', '2024-11-26 04:23:38'),
(4, 'Bob Brown', 'Bob', 'Brown', 1, 'bobbrown@hotel.com', '6677889900', '101 Maple St', '{\"Monday\": \"9:00-17:00\", \"Friday\": \"9:00-17:00\"}', '2020-09-12', 4.00, '2024-11-26 04:23:38', '2024-11-26 04:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `ht_staff_roles`
--

CREATE TABLE `ht_staff_roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL,
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`permissions`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_staff_roles`
--

INSERT INTO `ht_staff_roles` (`id`, `role_name`, `permissions`) VALUES
(1, 'Manager', '{\"view_reports\": true, \"edit_staff\": true, \"manage_reservations\": true}'),
(2, 'Housekeeper', '{\"clean_rooms\": true, \"request_assistance\": true}'),
(3, 'Receptionist', '{\"check_in_check_out\": true, \"assist_guests\": true}'),
(4, 'Chef', '{\"prepare_food\": true, \"manage_kitchen_inventory\": true}');

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
-- Table structure for table `ht_work_schedule`
--

CREATE TABLE `ht_work_schedule` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `day_of_week` varchar(10) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ht_work_schedule`
--

INSERT INTO `ht_work_schedule` (`id`, `staff_id`, `day_of_week`, `start_time`, `end_time`, `created_at`) VALUES
(1, 1, 'Monday', '09:00:00', '17:00:00', '2024-11-26 04:23:38'),
(2, 2, 'Wednesday', '09:00:00', '17:00:00', '2024-11-26 04:23:38'),
(3, 3, 'Friday', '09:00:00', '17:00:00', '2024-11-26 04:23:38'),
(4, 4, 'Monday', '09:00:00', '17:00:00', '2024-11-26 04:23:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ht_billings`
--
ALTER TABLE `ht_billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_checkincheckout`
--
ALTER TABLE `ht_checkincheckout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_customer_details`
--
ALTER TABLE `ht_customer_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `ht_customer_feedback`
--
ALTER TABLE `ht_customer_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_id_card_types`
--
ALTER TABLE `ht_id_card_types`
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
-- Indexes for table `ht_performance_reviews`
--
ALTER TABLE `ht_performance_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_reports`
--
ALTER TABLE `ht_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_reservations`
--
ALTER TABLE `ht_reservations`
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
-- Indexes for table `ht_room_servicerequests`
--
ALTER TABLE `ht_room_servicerequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_room_types`
--
ALTER TABLE `ht_room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_staff_details`
--
ALTER TABLE `ht_staff_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `ht_staff_roles`
--
ALTER TABLE `ht_staff_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_users`
--
ALTER TABLE `ht_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ht_work_schedule`
--
ALTER TABLE `ht_work_schedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ht_billings`
--
ALTER TABLE `ht_billings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_checkincheckout`
--
ALTER TABLE `ht_checkincheckout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_customer_details`
--
ALTER TABLE `ht_customer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_customer_feedback`
--
ALTER TABLE `ht_customer_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_id_card_types`
--
ALTER TABLE `ht_id_card_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_payments`
--
ALTER TABLE `ht_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_payment_methods`
--
ALTER TABLE `ht_payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_performance_reviews`
--
ALTER TABLE `ht_performance_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_reports`
--
ALTER TABLE `ht_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_reservations`
--
ALTER TABLE `ht_reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ht_roles`
--
ALTER TABLE `ht_roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ht_rooms`
--
ALTER TABLE `ht_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_room_servicerequests`
--
ALTER TABLE `ht_room_servicerequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_room_types`
--
ALTER TABLE `ht_room_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_staff_details`
--
ALTER TABLE `ht_staff_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_staff_roles`
--
ALTER TABLE `ht_staff_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ht_users`
--
ALTER TABLE `ht_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `ht_work_schedule`
--
ALTER TABLE `ht_work_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
