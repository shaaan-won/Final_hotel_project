<?php


// probot create-mvc -m CustomerLoyalty -px ht_ -t loyalty_programs  -d hotel_db 


?>

<style>
	select {
		width: 100%;
		/* Make the dropdown fill the container width */
		padding: 10px;
		/* Add padding for better usability */
		font-size: 16px;
		/* Set a readable font size */
		border: 1px solid #ccc;
		/* Add a border */
		border-radius: 5px;
		/* Add rounded corners */
		background-color: #f9f9f9;
		/* Set a subtle background color */
		color: #333;
		/* Set text color */
		appearance: none;
		/* Remove native styling for consistency */
		outline: none;
		/* Remove default outline */
		transition: border-color 0.3s, box-shadow 0.3s;
		/* Add smooth transitions */
	}

	select:focus {
		border-color: #007bff;
		/* Highlight border on focus */
		box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
		/* Add focus glow */
	}

	select option {
		padding: 10px;
		/* Add padding to options */
		font-size: 16px;
		/* Ensure consistency in font size */
		background-color: #fff;
		/* Set a consistent background */
		color: #333;
		/* Set text color */
	}
</style>

<div class="container mt-5" style="max-width: 600px;">
	<h1>Hotel Booking Form</h1>
	<form id="bookingForm">
		<div class="mb-3">
			<label for="customer_id" class="form-label">Customer Name</label>
			<!-- <input type="text" class="form-control" id="customer_id" name="customer_id" required> -->
			<span><?php echo Customer::html_select("customer_id"); ?></span>
			<input type="button" value="Add Customer" class="btn btn-primary" data-toggle="modal" data-target="#customerModal">
		</div>
		<div class="mb-3">
			<label for="room_id" class="form-label">Room</label>
			<select class="form-select" id="room_id" name="room_id" required>
				<option value="">Select a Room</option>
				<!-- Rooms will be dynamically loaded here -->
			</select>
		</div>
		<div class="mb-3">
			<label for="check_in_date" class="form-label">Check-in Date</label>
			<input type="datetime-local" class="form-control" id="check_in_date" name="check_in_date" required>
		</div>
		<div class="mb-3">
			<label for="check_out_date" class="form-label">Check-out Date</label>
			<input type="datetime-local" class="form-control" id="check_out_date" name="check_out_date" required>
		</div>
		<button type="submit" class="btn btn-primary">Book Now</button>
	</form>
	<div id="message" class="mt-3"></div>
</div>

<script>
	$(document).ready(function() {
		// Load available rooms dynamically
	});
</script>

<script>
	$(document).ready(function() {
		// Load available rooms dynamically
		// $.ajax({
		// 	url: 'fetch_rooms.php',
		// 	method: 'GET',
		// 	success: function(data) {
		// 		$('#room_id').append(data);
		// 	}
		// });

		// Form submission
		// $('#bookingForm').on('submit', function(e) {
		// 	e.preventDefault();
		// 	const formData = $(this).serialize();

		// 	$.ajax({
		// 		url: 'process_booking.php',
		// 		method: 'POST',
		// 		data: formData,
		// 		success: function(response) {
		// 			$('#message').html('<div class="alert alert-success">' + response + '</div>');
		// 			$('#bookingForm')[0].reset();
		// 		},
		// 		error: function(xhr) {
		// 			$('#message').html('<div class="alert alert-danger">' + xhr.responseText + '</div>');
		// 		}
		// 	});
		// });
	});
</script>


			<!-- Modal -->
			<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="customerModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="customerModalLabel">Add Customer</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<iframe src="<?php echo $base_url ?>customer/create" frameborder="0">
						</iframe>
						<!-- <div class="modal-body">
							<form id="addCustomerForm">
								<div class="form-group">
									<label for="customerName">Customer Name</label>
									<input type="text" class="form-control" id="customerName" placeholder="Enter name">
								</div>
								<div class="form-group">
									<label for="customerEmail">Email</label>
									<input type="email" class="form-control" id="customerEmail" placeholder="Enter email">
								</div>
								<div class="form-group">
									<label for="customerPhone">Phone</label>
									<input type="text" class="form-control" id="customerPhone" placeholder="Enter phone number">
								</div>
								<button type="submit" class="btn btn-primary">Save Customer</button>
							</form>
						</div> -->
					</div>
				</div>
			</div>
			<!-- Modal End -->