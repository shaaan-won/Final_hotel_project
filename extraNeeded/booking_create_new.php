<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script> -->

<style>
	.container {
		width: 80%;
		margin: 20px auto;
		background: #ffffff;
		padding: 20px;
		border-radius: 8px;
		box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
	}

	h1,
	h2 {
		text-align: center;
		color: #333333;
		margin-bottom: 20px;
	}

	form {
		margin: 20px 0;
	}

	label {
		display: block;
		margin: 10px 0 5px;
		color: #555555;
	}

	input,
	select,
	button {
		width: 100%;
		padding: 10px;
		margin: 5px 0;
		border: 1px solid #cccccc;
		border-radius: 5px;
	}

	button {
		background-color: #007bff;
		color: white;
		font-size: 16px;
		border: none;
		cursor: pointer;
	}

	button:hover {
		background-color: #0056b3;
	}

	#availability-results,
	#booking-confirmation {
		margin-top: 20px;
		padding: 10px;
		background-color: #e9ecef;
		border-radius: 5px;
	}

	#booking-form-container {
		margin-top: 30px;
	}

	a {
		text-decoration: none;
		color: #e9ecef;
		font-weight: bold;
		font-size: 16px;
	}
</style>
<?php
// global $tx, $db, $now;

// if (isset($_POST['check_availability'])) {
// 	$check_in = $_POST['check_in'];
// 	$check_out = $_POST['check_out'];
// 	$room_type = $_POST['room_type'];

// 	$sql = "SELECT * FROM ht_rooms 
// 	WHERE room_type_id = ? AND status_id = 5 
// 	AND id NOT IN (
// 		SELECT room_id FROM ht_bookings 
// 		WHERE check_in_date <= ? AND check_out_date >= ?
// 	)";

// 	$stmt = $db->prepare($sql);
// 	$stmt->bind_param("iss", $room_type, $check_in, $check_out);
// 	$stmt->execute();
// 	$result = $stmt->get_result();

// 	if ($result->num_rows > 0) {
// 		while ($row = $result->fetch_assoc()) {
// 			$room_number = $row['room_number'];
// 			$price = $row['price'];
// 			$capacity = $row['capacity'];
// 			$status = $row['status_id'];

// 			echo "<p>Room Number: $room_number</p>";
// 			echo "<p>Price: $price</p>";
// 			echo "<p>Capacity: $capacity</p>";
// 			echo "<p>Status: $status</p>";
// 			echo "<hr>";
// 		}
// 	} else {
// 		echo "<p>No rooms available for the selected dates and room type.</p>";
// 	}
// }

?>

<div class="container">
	<h1>Booking Management System</h1>

	<!-- Room Availability Form -->
	<section id="room-availability">
		<h2>Check Room Availability</h2>
		<form id="availability-form" method="post">
			<label for="capacity">Capacity:</label>
			<input type="number" id="capacity" name="capacity">

			<label for="room_type">Room Type:</label>
			<span><?php echo RoomType::html_select("room_type"); ?></span>

			<label for="checkin">Check-in Date:</label>
			<input type="date" id="checkin" name="checkin" required>

			<label for="checkout">Check-out Date:</label>
			<input type="date" id="checkout" name="checkout" required>

			<button type="submit" name="check_availability">Check Availability</button>
		</form>
		<div id="available-rooms"></div>
	</section>

	<!-- Booking Form -->
	<section id="booking">
		<h2>Book a Room</h2>
		<form id="booking-form" method="post">
			<label for="customer_id">Customer Name:</label>
			<!-- <input type="number" id="customer_id" name="customer_id" required> -->
			<span><?php echo Customer::html_select("customer_id"); ?></span>
			<button type="button" class="btn btn-success"><a href="<?php echo $base_url ?>customer/create">Add New Customer</a></button>
			<!-- <input type="button" value="Add Customer" class="btn btn-primary " data-toggle="modal" data-target="#customerModal"> -->


			<label for="room_id">Room ID:</label>
			<input type="number" id="room_id" name="room_id" required>

			<label for="checkin_date">Check-in Date:</label>
			<input type="date" id="checkin_date" name="checkin_date" required>

			<label for="checkout_date">Check-out Date:</label>
			<input type="date" id="checkout_date" name="checkout_date" required>

			<button type="submit">Book Now</button>
		</form>
		<div id="booking-status"></div>
	</section>
</div>



<script>
	$(document).ready(function() {


		// Handle room availability form submission
		$('#availability-form').submit(function(event) {
			event.preventDefault();

			const checkInDate = $('#check-in').val();
			const checkOutDate = $('#check-out').val();
			const roomType = $('#room-type').val();

			$.ajax({
				url: '<?php echo $base_url ?>api/booking/find';
				type: 'POST',
				data: {
					check_in: checkInDate,
					check_out: checkOutDate,
					room_type: roomType
				},
				success: function(response) {
					// $('#availability-results').html(response);
					// $('#available-rooms').html(response);
					console.log(response);
				},
				error: function() {
					alert('An error occurred while checking availability.');
				}
			});
		});

		// Handle booking form submission
		// 	$('#booking-form').submit(function(event) {
		// 		event.preventDefault();

		// 		const formData = $(this).serialize();

		// 		$.ajax({
		// 			url: 'make_booking.php',
		// 			type: 'POST',
		// 			data: formData,
		// 			success: function(response) {
		// 				$('#booking-confirmation').html(response);
		// 				$('#booking-form-container').hide();
		// 			},
		// 			error: function() {
		// 				alert('An error occurred while making the booking.');
		// 			}
		// 		});
		// 	});
	});
</script>