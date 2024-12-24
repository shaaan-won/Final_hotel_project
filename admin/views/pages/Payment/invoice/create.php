<?php
// echo Page::title(["title"=>"Create Invoice"]);
// echo Page::body_open();
// echo Html::link(["class"=>"btn btn-success", "route"=>"invoice", "text"=>"Manage Invoice"]);
// echo Page::context_open();
// echo Form::open(["route"=>"invoice/save"]);
// 	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers"]);
// 	echo Form::input(["label"=>"Booking","name"=>"booking_id","table"=>"bookings","display_column"=>"id"]);
// 	echo Form::input(["label"=>"Total Amount","type"=>"text","name"=>"total_amount"]);
// 	echo Form::input(["label"=>"Payment Status","name"=>"payment_status_id","table"=>"payment_statuses","display_column"=>"name"]);

// echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
// echo Form::close();
// echo Page::context_close();
// echo Page::body_close();
?>
<style>
	.container {
		background-color: #fff;
		max-width: 900px;
		min-width: 768px;
		padding: 30px;
		border-radius: 8px;
		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		margin-top: 50px;
	}

	/* Header Styling */
	.invoice-header {
		text-align: center;
		margin-bottom: 40px;
		background-color: rgb(170, 198, 227);
		padding: 20px;
		border-radius: 8px;
		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
	}

	.invoice-header h2 {
		font-size: 2.5rem;
		font-weight: bold;
		color: #0056b3;
		text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
		margin-bottom: 10px;
	}


	.invoice-header p {
		font-size: 1.2rem;
		margin: 5px 0;
		font-weight: bold;
		color: black;
	}

	/* Section Titles */
	.section-title {
		font-size: 1.4rem;
		font-weight: bold;
		text-align: center;
		color: #333;
		margin-top: 40px;
		border-bottom: 2px solid #0056b3;
		padding-bottom: 5px;
		margin-bottom: 20px;
	}

	/* Customer & Billing Information */
	.row>.col-md-6 {
		margin-bottom: 20px;
	}

	.col-md-6 h5 {
		font-size: 1.2rem;
		color: #0056B3;
		margin-bottom: 15px;
		font-weight: bold;
	}

	.col-md-6 p {
		font-size: 1rem;
		margin: 5px 0;
		color: #495057;
		font-weight: bold;
	}

	.col-md-6 span {
		font-weight: 500;
	}

	/* Table Styles */
	.invoice-table {
		width: 100%;
		margin-top: 20px;
		border-collapse: collapse;
	}

	.invoice-table th,
	.invoice-table td {
		padding: 12px;
		text-align: center;
		border: 1px solid #ddd;
	}

	.invoice-table th {
		background-color: rgba(0, 113, 227, 0.25);
		font-weight: bold;
		color: #495057;
		font-size: 1.1rem;
	}

	.invoice-table td {
		font-size: 1.1rem;
		color: #333;
	}

	.invoice-table tr:nth-child(even) {
		background-color: #f8f9fa;
	}

	.invoice-table .total-amount {
		font-size: 1.5rem;
		font-weight: bold;
		color: #28a745;
	}

	.invoice-table .btn-primary,
	.invoice-table .btn-success {
		margin: 10px 5px;
		padding: 10px 20px;
		font-size: 1rem;
	}

	/* Final Total Section */
	.text-center h3 {
		font-size: 2rem;
		font-weight: bold;
		color: #333;
		margin-bottom: 30px;
	}

	.text-center button {
		width: 200px;
	}

	/* General Dropdown Styling */
	select {
		width: 250px;
		/* Full width for responsiveness */
		padding: 10px;
		/* Add padding for a better look */
		border: 1px solid #ccc;
		/* Light gray border */
		border-radius: 5px;
		/* Rounded corners */
		background-color: #f8f9fa;
		/* Light background */
		font-size: 1rem;
		/* Set font size */
		color: #333;
		/* Dark text color */
		appearance: none;
		/* Remove default styling (browser-dependent) */
		-webkit-appearance: none;
		/* For Safari */
		-moz-appearance: none;
		/* For Firefox */
		cursor: pointer;
		/* Pointer cursor for better UX */
	}

	#discount-input {
		width: 60px;
	}

	#service-charges-input {
		width: 100px;
	}

	#cleaning-charges-input {
		width: 100px;
	}

	/* Responsive Design */
	@media (max-width: 768px) {
		.container {
			padding: 20px;
		}

		.invoice-header h2 {
			font-size: 2rem;
		}

		.invoice-table th,
		.invoice-table td {
			padding: 8px;
		}

		.invoice-table {
			margin-top: 15px;
		}

		.section-title {
			font-size: 1.2rem;
		}

		.text-center h3 {
			font-size: 1.8rem;
		}
	}
</style>

<div class="container">
	<div class="invoice-header">
		<h2>Hotel Management Invoice</h2>
		<p>Invoice No #<?php echo date("Ymd") ?>-<span id="invoice-id"><?= Invoice::get_last_id() + 1 ?></span></p>
		<p>Date: <span id="invoice-date"><?= date("Y-m-d") ?></span></p>
	</div>

	<!-- Customer & Billing Information Section -->
	<div class="row ">
		<div class="col-md-6">
			<h5>Customer Details:</h5>
			<p>Name: <span id="customer-name"><?php echo Customer::html_select(); ?></span></p>
			<p>Email: <span id="customer-email"></span></p>
			<p>Phone: <span id="customer-phone"></span></p>
			<p>
				Address:
				<span id="customer-address"></span>
			</p>
		</div>
		<div class="col-md-6">
			<h5>Billing Information:</h5>
			<p>Room Number: <span id="room-number"></span></p>
			<p>Room Type: <span id="room-type"></span></p>
			<p>Room Price(per night): <span id="room-price-per-night" class="text-red fw-bold fs-20"></span></p>
			<p>Check-In Date: <span id="check-in"></span></p>
			<p>Check-Out Date: <span id="check-out"></span></p>
			<p>Booking ID: <span id="booking-id"></span></p>
			<!-- <p>Status: <span id="status">Paid</span></p> -->
		</div>
	</div>

	<!-- Billing Table -->
	<div class="section-title">Billing Details</div>
	<table class="table table-bordered invoice-table">
		<thead>
			<tr>
				<th>Description</th>
				<th>Amount</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Room Price ==<span class="text-red fw-bold fs-20" id="total-days">(1 night)</span></td>
				<td id="room-price">$500.00</td>
			</tr>
			<tr>
				<td>Tax (15%)</td>
				<td id="tax">$75.00</td>
			</tr>
			<tr>
				<td>Discount== <input type="number" name="discount" id="discount-input" placeholder="Enter Discount" value="10">%</td>
				<!-- <td id="discount"> -$50.00</td> -->
				<td id="discount"> </td>
			</tr>
			<tr>
				<td>Service Charges</td>
				<td id="service-charges">$ <input type="number" name="service-charges" id="service-charges-input" placeholder="Service Charges"></td>
			</tr>
			<tr>
				<td>Cleaning Charges</td>
				<td id="cleaning-charges">$ <input type="number" name="cleaning-charges" id="cleaning-charges-input" placeholder="Cleaning Charges"></td>
			</tr>
			<tr>
				<td>Extra Services (Spa)</td>
				<td id="extra-services">$100.00</td>
			</tr>
			<tr style="background-color:rgba(201, 66, 66, 0.43)">
				<td><strong>Total Amount</strong></td>
				<td class="total-amount" id="total-amount">$675.00</td>
			</tr>
		</tbody>
	</table>

	<!-- Payment History Section -->
	<div class="section-title">Payment History</div>
	<table class="table table-bordered invoice-table">
		<thead>
			<tr>
				<th>Payment Method</th>
				<th>Amount Paid</th>
				<th>Status</th>
				<th>Payment Date</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Credit Card</td>
				<td>$500.00</td>
				<td>Paid</td>
				<td>2024-12-15</td>
			</tr>
			<tr>
				<td>Cash</td>
				<td>$175.00</td>
				<td>Paid</td>
				<td>2024-12-17</td>
			</tr>
		</tbody>
	</table>

	<!-- Service Requests Section -->
	<div class="section-title">Service Requests</div>
	<table class="table table-bordered invoice-table">
		<thead>
			<tr>
				<th>Service</th>
				<th>Description</th>
				<th>Status</th>
				<th>Cost</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Spa</td>
				<td>Full body massage</td>
				<td>Completed</td>
				<td>$100.00</td>
			</tr>
			<tr>
				<td>Room Service</td>
				<td>Breakfast</td>
				<td>Completed</td>
				<td>$25.00</td>
			</tr>
		</tbody>
	</table>

	<!-- Notes Section -->
	<div class="section-title" style="color: #0056B3; ">Special Notes</div>
	<p id="special-notes" style="align-items: center; text-align: center ; font-size: 20px; font-weight: bold">
		Thank you for staying with us. We hope you had a pleasant experience!
	</p>

	<!-- Final Total Section -->
	<div class="text-center">
		<h4>Total Amount: <span id="final-total">$675.00</span></h4>
		<h4>Total Due: <span id="amount-due">$675.00</span></h4>
		<h3 class="text-warning bg-info">Status: <span id="payment-status">Paid</span></h3>
		<button class="btn btn-primary" id="edit-invoice">Edit Invoice</button>
		<button class="btn btn-success" id="generate-invoice">
			Generate Invoice
		</button>
	</div>
</div>

<script>
	//function to format date in readable format
	function formatDate(dateTimeString) {
		const date = new Date(dateTimeString); // Parse the date-time string
		const options = {
			year: 'numeric',
			month: 'long',
			day: 'numeric'
		}; // Customize the format
		return date.toLocaleDateString(undefined, options); // Format to a readable date
	}
	$(document).ready(function() {
		// alert("hello");
		$('select').select2();
		$('#customer-name').on('change', function() {
			// alert("hello");
			var customer_id = $(this).find(':selected').val();
			$.ajax({
				url: '<?php echo $base_url; ?>api/Customer/find',
				method: 'POST',
				data: {
					id: customer_id
				},
				success: function(response) {
					// alert(response);
					// console.log(response);
					var customer_info = JSON.parse(response);
					// console.log(customer_info);

					$('#customer-email').text(customer_info.customer.email);
					$('#customer-phone').text(customer_info.customer.phone);
					$('#customer-address').text(customer_info.customer.address);
					// alert(customer_info.name);
				}
			});
			$.ajax({
				url: '<?php echo $base_url; ?>api/booking/find',
				method: 'POST',
				data: {
					customer_id: customer_id
				},
				success: function(response) {
					// alert(response);
					// console.log(response);
					var booking_info = JSON.parse(response);
					// console.log(booking_info);
					var room_id = booking_info.booking.room_id;
					let check_in_date = booking_info.booking.check_in_date;
					let check_out_date = booking_info.booking.check_out_date;
					$.ajax({
						url: '<?php echo $base_url; ?>api/Room/find',
						method: 'POST',
						data: {
							id: room_id
						},
						success: function(response) {
							// alert(response);
							// console.log(response);
							var room_info = JSON.parse(response);
							// console.log(room_info);
							let room_price_per_night = room_info.room.price;
							var room_type_id = room_info.room.room_type_id;
							// alert(room_type_id);
							$.ajax({
								url: '<?php echo $base_url; ?>api/RoomType/find',
								method: 'POST',
								data: {
									id: room_type_id
								},
								success: function(response) {
									// alert(response);
									// console.log(response);
									var room_type_info = JSON.parse(response);
									// console.log(room_type_info);
									$('#room-type').text(room_type_info.roomtype.name);
								}
							})
							$('#room-number').text(room_info.room.room_number);
							$('#room-price-per-night').text("$" + room_price_per_night);
							let total_room_price = parseFloat(room_price_per_night * daysDifference).toFixed(2);
							// alert(total_room_price);
							$('#room-price').text("$" + total_room_price);
							//tax = 15% of room price
							let tax = parseFloat(total_room_price * 0.15).toFixed(2);
							$('#tax').text("$" + tax);
							//discount
							$('#discount-input').on('input', function() {
								let discount = $(this).val();
								let total_discount = parseFloat(total_room_price * discount / 100).toFixed(2);
								$('#discount').text("$" + total_discount);
							});
							//service charges & cleaning charges
							$('#service-charges-input').on('change', function() {
								let service_charges = $(this).val();
								$('#cleaning-charges-input').on('change', function() {
									// alert("hello");
									let cleaning_charges = $(this).val();
									let total_service_charges = parseFloat(service_charges) + parseFloat(cleaning_charges);
									// alert(total_service_charges);
									// var total_room_price =parseFloat($('#room-price').text()).toFixed(2);
									// var tax = parseFloat($('#tax').text()).toFixed(2);
									var total_discount_fetch = $('#discount-input').val();
									var total_discount = parseFloat(total_room_price * total_discount_fetch / 100).toFixed(2);
									// alert(total_room_price);
									// alert(tax);
									// alert(total_discount);
									let total = parseFloat(total_room_price) - parseFloat(total_discount) + parseFloat(tax) + total_service_charges;
									// alert(total);
									$('#total-amount').text("$" + total);
								});
								// $('#service-charges').text("$" + total_service_charges.toFixed(2));
								// $('#cleaning-charges').text("$" + total_service_charges.toFixed(2));

								// $('#extra-services-input').on('input', function() {
								// 	let extra_services = $(this).val();
								// 	let total_extra_services = parseFloat(extra_services);
								// 	// $('#extra-services').text("$" + total_extra_services.toFixed(2));
								// });

							});




						}
					})
					$('#booking-id').text(booking_info.booking.id);
					$('#check-in').text(formatDate(check_in_date));
					$('#check-out').text(formatDate(check_out_date));

					// Calculate the difference in milliseconds
					let timeDifference = new Date(check_out_date) - new Date(check_in_date);
					let daysDifference = timeDifference / (1000 * 60 * 60 * 24);
					// alert(daysDifference);

					$('#total-days').text(daysDifference + " nights");
				}
			});
		});


	});
</script>