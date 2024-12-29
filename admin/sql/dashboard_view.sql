CREATE OR REPLACE VIEW ht_hotel_dashboards AS
SELECT
    -- General Statistics
    (SELECT COUNT(*) FROM ht_customers) AS total_customers,
    (SELECT COUNT(*) FROM ht_bookings WHERE check_in_date <= NOW() AND check_out_date >= NOW()) AS total_check_ins,
    (SELECT COUNT(*) FROM ht_bookings WHERE check_out_date < NOW()) AS total_check_outs,
    (SELECT SUM(total_amount) FROM ht_invoices WHERE payment_status_id = (SELECT id FROM ht_payment_statuses WHERE name = 'Paid')) AS total_revenue,

    -- revenue from invoice table by day & month
    (SELECT SUM(total_amount) FROM ht_invoices WHERE DATE(created_at) = CURDATE()) AS today_revenue,
    (SELECT SUM(total_amount) FROM ht_invoices WHERE MONTH(created_at) = MONTH(CURDATE())) AS this_month_revenue,
    (SELECT SUM(total_amount) FROM ht_invoices WHERE YEAR(created_at) = YEAR(CURDATE())) AS this_year_revenue,

    -- Room Type Statistics
    (SELECT COUNT(*) FROM ht_rooms WHERE room_type_id = (SELECT id FROM ht_room_types WHERE name = 'Standard')) AS standard_rooms_total,
    (SELECT COUNT(*) FROM ht_rooms WHERE room_type_id = (SELECT id FROM ht_room_types WHERE name = 'Deluxe')) AS deluxe_rooms_total,
    (SELECT COUNT(*) FROM ht_rooms WHERE room_type_id = (SELECT id FROM ht_room_types WHERE name = 'Suite')) AS suite_rooms_total,
    (SELECT COUNT(*) FROM ht_rooms WHERE room_type_id = (SELECT id FROM ht_room_types WHERE name = 'Penthouse')) AS penthouse_rooms_total,
    
    -- Room Statistics
    (SELECT COUNT(*) FROM ht_rooms WHERE status_id = (SELECT id FROM ht_statuss WHERE name = 'Available')) AS available_rooms,
    (SELECT COUNT(*) FROM ht_rooms WHERE status_id = (SELECT id FROM ht_statuss WHERE name = 'Booked')) AS booked_rooms,
    (SELECT COUNT(*) FROM ht_rooms WHERE status_id = (SELECT id FROM ht_statuss WHERE name = 'Maintenance')) AS maintenance_rooms,

    -- room occupied statistics by customer need to khnow the room types
    (SELECT COUNT(*) FROM ht_rooms WHERE status_id = (SELECT id FROM ht_statuss WHERE name = 'Available') AND room_type_id = (SELECT id FROM ht_room_types WHERE name = 'Standard')) AS standard_rooms,
    (SELECT COUNT(*) FROM ht_rooms WHERE status_id = (SELECT id FROM ht_statuss WHERE name = 'Available') AND room_type_id = (SELECT id FROM ht_room_types WHERE name = 'Deluxe')) AS deluxe_rooms,
    (SELECT COUNT(*) FROM ht_rooms WHERE status_id = (SELECT id FROM ht_statuss WHERE name = 'Available') AND room_type_id = (SELECT id FROM ht_room_types WHERE name = 'Suite')) AS suite_rooms,
    (SELECT COUNT(*) FROM ht_rooms WHERE status_id = (SELECT id FROM ht_statuss WHERE name = 'Available') AND room_type_id = (SELECT id FROM ht_room_types WHERE name = 'Penthouse')) AS penthouse_rooms,

    -- Recent Activity: Check-in/Check-out Counts
    (SELECT COUNT(*) FROM ht_bookings WHERE DATE(check_in_date) = CURDATE()) AS today_check_ins,
    (SELECT COUNT(*) FROM ht_bookings WHERE DATE(check_out_date) = CURDATE()) AS today_check_outs,
    
    -- Booking Statistics
    (SELECT COUNT(*) FROM ht_bookings WHERE check_in_date <= NOW() AND check_out_date >= NOW()) AS current_check_ins,
    -- (SELECT COUNT(*) FROM ht_bookings WHERE check_out_date < NOW()) AS current_check_outs,
    (SELECT COUNT(*) FROM ht_bookings WHERE check_out_date > NOW()) AS future_check_ins,

    -- Customer Feedback Statistics
    (SELECT ROUND(AVG(rating), 1) FROM ht_customer_feedbacks) AS average_customer_rating,
    (SELECT COUNT(*) FROM ht_customer_feedbacks) AS total_feedbacks,
    
    -- Payment Statistics
    (SELECT COUNT(*) FROM ht_payments WHERE payment_statuse_id = (SELECT id FROM ht_payment_statuses WHERE name = 'Paid')) AS paid_payments,
    (SELECT COUNT(*) FROM ht_payments WHERE payment_statuse_id = (SELECT id FROM ht_payment_statuses WHERE name = 'Pending')) AS pending_payments,
    (SELECT COUNT(*) FROM ht_payments WHERE payment_statuse_id = (SELECT id FROM ht_payment_statuses WHERE name = 'Failed')) AS failed_payments,
    
    -- Detailed Data Aggregation
    (SELECT COUNT(*) FROM ht_bookings) AS total_bookings,
    (SELECT COUNT(*) FROM ht_rooms) AS total_rooms,
    (SELECT COUNT(*) FROM ht_room_types) AS total_room_types,
    (SELECT COUNT(*) FROM ht_payments) AS total_payments