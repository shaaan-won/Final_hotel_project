-- 1. Users Table
CREATE TABLE `ht_users` (
  `id`  int(10) auto_increment primary key  ,
  `name` varchar(50) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp  DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
(127, 'admin', 1, '$2y$10$zeyUFTm0vqQ0uAUS04kl4ubY6.2Y0zQXqcFC70XvD.8Ot5s3Om5PG', 'towhid1@outlook.com', 'Mohammad Towhidul Islam', '2024-04-29 05:28:06', '127.jpg', '45354353', 0, '34324324', '2022-02-15 21:00:46', '192.168.150.29', NULL, NULL),
(192, 'naeem', 2, '$2y$10$BTQzbrLdYG9/hSfLBf7mzOLzDG1kp6E90OaMh9jEWBafyGkG6oAt6', 'naymur@gmail.com', 'Naymur Rahman', '2024-04-04 05:43:27', NULL, NULL, 0, '01800000000', NULL, '192.168.150.25', NULL, NULL),
(194, 'jakaria', 2, '$2y$10$Zyt3rgYgF9vnDBhNRN/8lO1BirJFCCNr3rhTRiI.7W1aVIuriBJiS', 'jkp.jakaria@gmail.com', 'jkp', '2024-04-15 04:53:54', NULL, NULL, 0, '01642527454', NULL, '192.168.150.47', NULL, NULL),
(196, 'Aminur', 2, '$2y$10$u1Wku9Uh61adCVAPm6ToSOp.8EgdXkiXo/DGp3oD.i/8o9I6a/Dai', 'amiur@gmail.com', 'Aminur Rahman', '2024-04-04 05:45:19', NULL, NULL, 0, '01800000000', NULL, '192.168.150.25', NULL, NULL),
(197, 'Tanim', 2, '$2y$10$NcNFqz1p2N76l4NH96f4Y.KTU8s/e.CqZB.lD7lewc4rcBvMstgaK', 'tanim@gmail.com', 'Rifat Ahammed Tanim', '2024-04-04 05:54:06', NULL, NULL, 0, '01900000000', NULL, '192.168.150.34', NULL, NULL),
(199, 'midul', 2, '$2y$10$sUhLutkkEUOUTWY2yWi.C.B55DFNOhUrbfFnrzcKM2FK7xdDF6Rby', 'midul@yahoo.com', 'Midul Islam', '2024-04-04 05:50:50', NULL, NULL, 0, '0198748343', NULL, '192.168.150.5', NULL, NULL),
(200, 'Jabed ', 2, '$2y$10$mgdw/E0HYncsz1wZaxygKerTF9VAfiPMnq4TSLsscA5CVHSih/RbS', 'olba@gmail.com', 'Javed ', '2024-04-04 05:59:27', NULL, NULL, 0, '01869546555', NULL, '192.168.150.22', NULL, NULL),
(201, 'omar', 2, '$2y$10$GnOgIBKPRsNIeM3OJExotuuBjGqzgcYGnfQeZpz4pug/GNqiLCWwS', 'omar@gmail.com', 'Omar Faruk', '2024-04-15 04:57:44', NULL, NULL, 0, '343434', NULL, '192.168.150.11', NULL, NULL),
(204, 'Anni', 2, '$2y$10$JWg5tGwzGUwnFT/PZBT4wuqIKAw3Vb6X7kWs9zC3ueLSi1RMzi87W', 'jannatulneasa464@gmail.com', 'Jannatul Neasa', '2024-04-04 05:54:32', NULL, NULL, 0, '3254436756', NULL, '192.168.150.29', NULL, NULL),
(206, 'mir3', 4, '$2y$10$wYZrszbJ9LIadOof3PRIzuHQNnjAQuTanA.JBmsreow3nJm04hCRW', 'mir@gmail.com', 'Mizanur Rahman ', '2024-05-15 07:36:41', 'mir3.png', NULL, 0, '', '0000-00-00 00:00:00', '::1', '0000-00-00 00:00:00', ''),
(209, 'abc', 1, '$2y$10$M52jied3IiUeo/ke8QU5SO0tS5IrW3T7aXVEL3a7l7/HN/4l98XKO', 'abc@gmail.com', NULL, '2024-05-15 06:29:14', 'abc-gmail-com.jpg', NULL, 0, NULL, '2024-05-15 12:08:29', '::1', '0000-00-00 00:00:00', ''),
(213, 'sium', 2, '$2y$10$Ziq..GqX0z4Lf2H4tE62VOsSDmyq8BUhESIhHu4BEfLKvrJLUszOS', 'sium@gmail.com', NULL, '2024-05-15 07:43:08', 'sium.jpeg', NULL, 0, NULL, '0000-00-00 00:00:00', '192.168.150.18', '0000-00-00 00:00:00', '');

CREATE TABLE `ht_roles` (
  `id` int(10) auto_increment primary key ,
  `name` varchar(20) ,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp  DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ht_roles`
--

INSERT INTO `ht_roles` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Admin', '2024-03-02 04:59:14', '2024-03-02 04:59:14'),
(2, 'Manager', '2024-02-28 12:10:59', '2024-02-28 06:10:59'),
(4, 'Guest', '2024-03-07 10:24:21', '2024-03-07 04:24:21'),
(5, 'Manager', '2024-03-07 12:25:34', '2024-03-07 06:25:34'),
(6, 'Manager', '2024-03-07 12:25:53', '2024-03-07 06:25:53');

-- 1. Customers Table
CREATE TABLE ht_customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    phone INT(15),
    id_card_type_id INT,
    id_card_number INT(20),
    address TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 2.a. IdCardType Table
CREATE TABLE ht_id_card_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- dummy data for IdCardType Table
INSERT INTO ht_id_card_types (name, created_at) VALUES
('National ID', CURRENT_TIMESTAMP),
('Birth Certificate', CURRENT_TIMESTAMP),
('Passport', CURRENT_TIMESTAMP);

-- 2. Staff Table
CREATE TABLE ht_staffs ( 
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    staff_role_id INT,
    email VARCHAR(255) UNIQUE,
    phone INT(15),
    address TEXT,
    work_schedule_id JSON,
    hired_date DATE,
    performance_score DECIMAL(3, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 3. StaffRoles Table
CREATE TABLE ht_staff_roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 4. WorkSchedule Table
CREATE TABLE ht_work_schedules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    staff_id INT,
    start_time datetime,
    end_time datetime,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 5. PerformanceReviews Table
CREATE TABLE ht_staff_performance_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    staff_id INT,
    review_date DATE,
    review_score DECIMAL(3, 2),
    review_comments TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 6. Reports Table
CREATE TABLE ht_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    report_type VARCHAR(50),
    report_description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 7. CustomerFeedback Table
CREATE TABLE ht_customer_feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    comments TEXT,
    rating INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 8. items Table
CREATE TABLE ht_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    price DECIMAL(10, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ;

-- 9. RoomServiceRequests Table
CREATE TABLE ht_room_service_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    room_id INT,
    customer_id INT,
    request_type VARCHAR(50),
    request_description TEXT,
    status_id INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 10. Statuses Table
CREATE TABLE ht_statuss (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 11. Rooms Table
CREATE TABLE ht_rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_number VARCHAR(50) UNIQUE,
    room_type_id INT,
    price DECIMAL(10, 2),
    capacity INT,
    status_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 12. RoomTypes Table
CREATE TABLE ht_room_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 13. Bookings Table
CREATE TABLE ht_bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    room_id INT,
    check_in_date DATETIME,
    check_out_date DATETIME,
    status_id INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
-- 13.a. CheckinCheckout Table
CREATE TABLE ht_checkin_checkout (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT,
    check_in_date DATETIME,
    check_out_date DATETIME,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

--dummy data for ht_checkin_checkout
INSERT INTO ht_checkin_checkout (booking_id, check_in_date, check_out_date, notes, created_at, updated_at) VALUES
(1, '2024-03-07 12:25:53', '2024-03-07 06:25:53', 'Check-in notes', '2024-03-07 12:25:53', '2024-03-07 06:25:53'),
(2, '2024-03-07 12:25:53', '2024-03-07 06:25:53', 'Check-in notes', '2024-03-07 12:25:53', '2024-03-07 06:25:53'),
(3, '2024-03-07 12:25:53', '2024-03-07 06:25:53', 'Check-in notes', '2024-03-07 12:25:53', '2024-03-07 06:25:53'),
(4, '2024-03-07 12:25:53', '2024-03-07 06:25:53', 'Check-in notes', '2024-03-07 12:25:53', '2024-03-07 06:25:53');


-- 14. Payments Table
CREATE TABLE ht_payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    booking_id INT,
    amount DECIMAL(10, 2),
    payment_method_id INT ,
    payment_status_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- 14.a. PaymentMethods Table
CREATE TABLE ht_payment_methods (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 15. PaymentStatuses Table
CREATE TABLE ht_payment_statuses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 16. Room Maintenance Table
CREATE TABLE ht_room_maintenance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_id INT,
    description TEXT,
    status_id INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 17. LoyaltyProgram Table
CREATE TABLE ht_loyalty_programs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    points INT DEFAULT 0,
    membership_level VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 18. Promotions Table
CREATE TABLE ht_promotions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    discount_percentage DECIMAL(5, 2),
    start_date DATE,
    end_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 19. Amenities Table
CREATE TABLE ht_amenities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 20. RoomAmenities Table
CREATE TABLE ht_room_amenities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_id INT,
    amenity_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 21. Invoices Table
CREATE TABLE ht_invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    booking_id INT,
    total_amount DECIMAL(10, 2),
    payment_status_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 22. Events Table
CREATE TABLE ht_events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    customer_id INT,
    event_date DATE,
    event_time TIME,
    location TEXT,
    attendees INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 23. Suppliers Table
CREATE TABLE ht_suppliers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    contact_name VARCHAR(255),
    email VARCHAR(255),
    phone VARCHAR(15),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 24. Inventory Table
CREATE TABLE ht_inventory (
    id INT AUTO_INCREMENT PRIMARY KEY,
    supplier_id INT,
    item_name VARCHAR(255),
    quantity INT,
    unit_price DECIMAL(10, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 25. Orders Table
CREATE TABLE ht_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    order_date DATE,
    total_amount DECIMAL(10, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 26. OrderItems Table
CREATE TABLE ht_order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    item_id INT,
    quantity INT,
    unit_price DECIMAL(10, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


--Dummy Data for Tables 


-- Dummy data for ht_customers
INSERT INTO ht_customers (name, first_name, last_name, email, phone, id_card_type_id, id_card_number, address) VALUES
('John Doe', 'John', 'Doe', 'john.doe@example.com', 1234567890, 1, 987654321, '123 Main St'),
('Jane Smith', 'Jane', 'Smith', 'jane.smith@example.com', 2345678901, 2, 876543210, '456 Elm St'),
('Alice Johnson', 'Alice', 'Johnson', 'alice.johnson@example.com', 3456789012, 1, 765432109, '789 Oak St'),
('Bob Brown', 'Bob', 'Brown', 'bob.brown@example.com', 4567890123, 2, 654321098, '101 Pine St');

-- Dummy data for ht_staffs
INSERT INTO ht_staffs (name, staff_role_id, email, phone, address, work_schedule_id, hired_date, performance_score) VALUES
('Michael Scott', 1, 'michael.scott@example.com', 1234567890, 'Scranton, PA', JSON_ARRAY('9AM-5PM', 'Mon-Fri'), '2023-01-10', 4.5),
('Dwight Schrute', 2, 'dwight.schrute@example.com', 2345678901, 'Scranton, PA', JSON_ARRAY('9AM-5PM', 'Mon-Fri'), '2023-01-10', 4.7),
('Jim Halpert', 3, 'jim.halpert@example.com', 3456789012, 'Scranton, PA', JSON_ARRAY('9AM-5PM', 'Mon-Fri'), '2023-01-10', 4.6),
('Pam Beesly', 4, 'pam.beesly@example.com', 4567890123, 'Scranton, PA', JSON_ARRAY('9AM-5PM', 'Mon-Fri'), '2023-01-10', 4.8);

-- Dummy data for ht_staff_roles
INSERT INTO ht_staff_roles (name) VALUES
('Manager'),
('Assistant to the Regional Manager'),
('Sales Representative'),
('Receptionist');

-- Dummy data for ht_work_schedules
INSERT INTO ht_work_schedules (staff_id, start_time, end_time) VALUES
(1, '2023-06-30 09:00:00', '2023-06-30 17:00:00'),
(2, '2023-06-30 09:00:00', '2023-06-30 17:00:00'),
(3, '2023-06-30 09:00:00', '2023-06-30 17:00:00'),
(4, '2023-06-30 09:00:00', '2023-06-30 17:00:00');

-- Dummy data for ht_staff_performance_reviews
INSERT INTO ht_staff_performance_reviews (staff_id, review_date, review_score, review_comments) VALUES
(1, '2023-06-30', 4.5, 'Excellent performance'),
(2, '2023-06-30', 4.0, 'Good job overall'),
(3, '2023-06-30', 4.2, 'Solid performance'),
(4, '2023-06-30', 4.8, 'Outstanding effort');

-- Dummy data for ht_reports
INSERT INTO ht_reports (user_id, report_type, report_description) VALUES
(1, 'Incident', 'Lost and found item reported'),
(2, 'Maintenance', 'Leaky faucet in room 204'),
(3, 'Service', 'Slow room service response'),
(4, 'Complaint', 'Noisy neighbors in room 305');

-- Dummy data for ht_customer_feedback
INSERT INTO ht_customer_feedback (user_id, comments, rating) VALUES
(1, 'Great service and friendly staff', 5),
(2, 'Room was clean and comfortable', 4),
(3, 'Food was delicious', 5),
(4, 'Would stay here again', 4);

-- Dummy data for ht_items
INSERT INTO ht_items (name, description, price) VALUES
('Shampoo', 'Hair cleansing shampoo', 5.99),
('Conditioner', 'Hair softening conditioner', 6.99),
('Soap', 'Body cleansing soap', 2.99),
('Toothpaste', 'Mint flavored toothpaste', 3.99);

-- Dummy data for ht_room_service_requests
INSERT INTO ht_room_service_requests (user_id, room_id, customer_id, request_type, request_description, status_id) VALUES
(1, 101, 1, 'Cleaning', 'Room cleaning requested', 1),
(2, 102, 2, 'Maintenance', 'Air conditioning not working', 1),
(3, 103, 3, 'Food', 'Breakfast delivery requested', 2),
(4, 104, 4, 'Laundry', 'Laundry service requested', 1);

-- Dummy data for ht_statuses
INSERT INTO ht_statuss (name) VALUES
('Pending'),
('In Progress'),
('Completed'),
('Cancelled');

-- Dummy data for ht_rooms
INSERT INTO ht_rooms (room_number, room_type_id, price, capacity, status_id) VALUES
('101', 1, 100.00, 2, 1),
('102', 2, 150.00, 3, 1),
('103', 3, 200.00, 4, 2),
('104', 4, 250.00, 2, 1);

-- Dummy data for ht_room_types
INSERT INTO ht_room_types (name, description) VALUES
('Standard', 'Basic room with essential amenities'),
('Deluxe', 'Spacious room with additional features'),
('Suite', 'Luxurious suite with premium services'),
('Penthouse', 'Exclusive top-floor suite with panoramic views');

-- Dummy data for ht_bookings
INSERT INTO ht_bookings (customer_id, room_id, check_in_date, check_out_date, status_id) VALUES
(1, 101, '2023-04-01', '2023-04-05', 1),
(2, 102, '2023-05-10', '2023-05-15', 1),
(3, 103, '2023-06-20', '2023-06-25', 2),
(4, 104, '2023-07-15', '2023-07-20', 1);

-- Dummy data for ht_payments
INSERT INTO ht_payments (customer_id, booking_id, amount, payment_method_id, payment_status_id) VALUES
(1, 1, 100.00, 1, 1),
(2, 2, 150.00, 2, 1),
(3, 3, 200.00, 3, 2),
(4, 4, 250.00, 4, 1);

-- Dummy data for ht_payment_methods
INSERT INTO ht_payment_methods (name, description) VALUES
('Credit Card', 'Payments made via credit cards.'),
('Debit Card', 'Payments made via debit cards.'),
('Bank Transfer', 'Payments made via bank transfers.'),
('PayPal', 'Payments made via PayPal.');

-- Dummy data for ht_payment_statuses
INSERT INTO ht_payment_statuses (name) VALUES
('Pending'),
('Completed'),
('Failed');

-- Dummy data for ht_room_maintenance
INSERT INTO ht_room_maintenance (room_id, description, status_id) VALUES
(101, 'AC not working', 1),
(102, 'Leaky faucet', 1),
(103, 'Broken window', 2),
(104, 'Carpet cleaning', 1);

-- Dummy data for ht_loyalty_programs
INSERT INTO ht_loyalty_programs (customer_id, points, membership_level) VALUES
(1, 1000, 'Gold'),
(2, 1500, 'Platinum'),
(3, 800, 'Silver'),
(4, 1200, 'Gold');

-- Dummy data for ht_promotions
INSERT INTO ht_promotions (name, description, discount_percentage, start_date, end_date) VALUES
('Summer Sale', 'Discount on all rooms', 10.00, '2023-06-01', '2023-06-30'),
('Winter Offer', 'Special rates for winter', 15.00, '2023-12-01', '2023-12-31'),
('Holiday Package', 'Holiday season discount', 20.00, '2023-12-15', '2023-12-25'),
('New Year Deal', 'New Year promotion', 25.00, '2023-12-31', '2024-01-05');

-- Dummy data for ht_amenities
INSERT INTO ht_amenities (name, description) VALUES
('Wi-Fi', 'High-speed internet access'),
('Swimming Pool', 'Outdoor swimming pool'),
('Gym', 'Fitness center with modern equipment'),
('Spa', 'Relaxing spa services');

-- Dummy data for ht_room_amenities
INSERT INTO ht_room_amenities (room_id, amenity_id) VALUES
(101, 1),
(102, 2),
(103, 3),
(104, 4);

-- Dummy data for ht_invoices
INSERT INTO ht_invoices (customer_id, booking_id, total_amount, payment_status_id) VALUES
(1, 1, 500.00, 1),
(2, 2, 750.00, 1),
(3, 3, 1000.00, 2),
(4, 4, 1250.00, 1);

-- Dummy data for ht_events
INSERT INTO ht_events (name, customer_id, event_date, event_time, location, attendees) VALUES
('Wedding', 1, '2023-08-15', '18:00:00', 'Main Hall', 200),
('Wedding', 1, '2023-08-15', '18:00:00', 'Grand Hall', 100),
('Conference', 2, '2023-09-20', '09:00:00', 'Conference Room A', 50),
('Birthday Party', 3, '2023-10-05', '17:00:00', 'Banquet Hall', 30),
('Corporate Meeting', 4, '2023-11-10', '10:00:00', 'Meeting Room B', 20);

-- Dummy data for ht_suppliers
INSERT INTO ht_suppliers (name, contact_name, email, phone, address) VALUES
('ABC Supplies', 'John Supplier', 'john.supplier@example.com', '123-456-7890', '789 Warehouse St'),
('XYZ Distributors', 'Jane Distributor', 'jane.distributor@example.com', '234-567-8901', '123 Supply Ave'),
('Furniture Inc.', 'Alice Furniture', 'alice.furniture@example.com', '345-678-9012', '456 Sofa St'),
('Tech Gear', 'Bob Tech', 'bob.tech@example.com', '456-789-0123', '101 Gadget Blvd');

-- Dummy data for ht_inventory
INSERT INTO ht_inventory (supplier_id, item_name, quantity, unit_price) VALUES
(1, 'Shampoo Bottles', 100, 3.50),
(2, 'Conditioner Bottles', 150, 4.00),
(3, 'Soap Bars', 200, 1.25),
(4, 'Toothpaste Tubes', 250, 2.75);

-- Dummy data for ht_orders
INSERT INTO ht_orders (customer_id, order_date, total_amount) VALUES
(1, '2023-07-01', 150.00),
(2, '2023-08-10', 200.00),
(3, '2023-09-15', 250.00),
(4, '2023-10-20', 300.00);

-- Dummy data for ht_order_items
INSERT INTO ht_order_items (order_id, item_id, quantity, unit_price) VALUES
(1, 1, 2, 50.00),
(2, 2, 1, 100.00),
(3, 3, 5, 30.00),
(4, 4, 3, 75.00);
