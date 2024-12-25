<?php
// echo Page::title(["title"=>"Create Invoice"]);
// echo Page::body_open();
// echo Html::link(["class"=>"btn btn-success", "route"=>"invoice", "text"=>"Manage Invoice"]);
// echo Page::context_open();
// echo Form::open(["route"=>"invoice/save"]);
// 	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers"]);
// 	echo Form::input(["label"=>"Booking","name"=>"booking_id","table"=>"bookings","display_column"=>"id"]);
// 	echo Form::input(["label"=>"Order","name"=>"order_id","table"=>"orders","display_column"=>"id"]);
// 	echo Form::input(["label"=>"Total Amount","type"=>"text","name"=>"total_amount"]);
// 	echo Form::input(["label"=>"Discount","type"=>"text","name"=>"discount"]);
// 	echo Form::input(["label"=>"Tax","type"=>"text","name"=>"tax"]);
// 	echo Form::input(["label"=>"Service Charges","type"=>"text","name"=>"service_charges"]);
// 	echo Form::input(["label"=>"Cleaning Charges","type"=>"text","name"=>"cleaning_charges"]);
// 	echo Form::input(["label"=>"Payment Status","name"=>"payment_status_id","table"=>"payment_statuses","display_column"=>"name"]);
// 	echo Form::input(["label"=>"Amount Due","type"=>"text","name"=>"amount_due"]);

// echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
// echo Form::close();
// echo Page::context_close();
// echo Page::body_close();
?>

<style>
	.container {
		background-color: #fff;
		max-width: 950px;
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

	.invoice-table tr:hover {
		background-color: #e9ecef;
	}

	.invoice-table .total-amount {
		font-size: 1.5rem;
		font-weight: bold;
		color: rgb(0, 0, 0);
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

	#payment-method>select  {
		width: 160px;
		/* Full width for responsiveness */
		/* height: 60px; */

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
	#amenity-select>select , #item-select>select {
		width: 150px;
		/* Full width for responsiveness */
		/* height: 60px; */

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
	#amenity-quantity , #item-quantity {
		width: 50px;
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

	#amount-due {
		width: 100px;
		font-size: 1.5rem;
		font-weight: bold;
		color: rgb(0, 0, 0);
	}

	#amount-paid {
		width: 100px;
		font-size: 1.5rem;
		font-weight: bold;
		color: rgb(0, 0, 0);
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
	<div class="section-title ">Billing Details</div>
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
			<!-- <tr>
				<td>Extra Services (Spa)</td>
				<td id="extra-services">$100.00</td>
			</tr> -->
			<tr style="background-color:rgba(201, 66, 66, 0.43)">
				<td><strong>Total Amount</strong></td>
				<td class="total-amount" id="total-amount"></td>
			</tr>
		</tbody>
	</table>
	
	<!-- Service Requests Section -->
	<div class="section-title">Extra Services</div>
	<div style="display: flex; justify-content: space-between; ">
		<!-- Amenities Charges -->
		<div style="width: 440px; overflow: hidden;">
			<h4 class="text-center">Amenities Charges</h4>
			<table class="invoice-table">
				<thead>
					<tr>
						<th>Amenity</th>
						<th>Price</th>
						<th>QTY</th>
						<th>
							<!-- <p>Total</p> -->
							<button type="button" style="background-color:rgba(249, 7, 7, 0.94); color: #fff;" class="btn" id="amenity-clear">Clear</button>
						</th>
					</tr>
					<tr>
						<th id="amenity-select"><?php echo Amenity::html_select(); ?></th>
						<th><span id="amenity-price"></span></th>
						<th><input type="number" name="amenity-quantity" id="amenity-quantity" placeholder="QTY" value="1"></th>
						<th><button type="button" style="background-color:rgba(0, 255, 85, 0.72); color: #fff;" class="btn" id="amenity-add">Add</button></th>
					</tr>
				</thead>
				<tbody id="amenities-charges-row">
					<!-- <tr>
						<td>Spa</td>
						<td>$50.00</td>
						<td>1</td>
						<td>$50.00</td>
					</tr>
					<tr>
						<td>Gym</td>
						<td>$20.00</td>
						<td>1</td>
						<td>$20.00</td>
					</tr> -->
				</tbody>
			</table>
		</div>

		<!-- Order Items -->
		<div style="width: 440px; overflow: hidden;">
			<h4 class="text-center">Order Items</h4>
			<table class="invoice-table">
				<thead>
					<tr>
						<th>Item</th>
						<th>Price</th>
						<th>QTY</th>
						<th  style="block-size: 50px;"> 
							<!-- <p>Total</p> -->
							<!-- <button type="button" style="background-color:rgba(255, 31, 57, 0.68); color: #fff; height: 40px; font-size: 10px;" class="btn btn-sm" id="item-clear-all">Clear</button> -->
							<button type="button" style="background-color:rgba(249, 7, 7, 0.94); color: #fff;" class="btn" id="item-clear">Clear</button>
						</th>
					</tr>
					<tr>
						<th id="item-select"><?php echo Item::html_select(); ?></th>
						<th><span id="item-price"></span></th>
						<th><input type="number" name="item-quantity" id="item-quantity" placeholder="QTY" value="1"></th>
						<th><button type="button" style="background-color:rgba(0, 255, 85, 0.72); color: #fff;" class="btn" id="item-add">Add</button></th>
					</tr>
				</thead>
				<tbody id="order-items-row">
					<!-- <tr>
						<td>Breakfast</td>
						<td>$15.00</td>
						<td>2</td>
						<td>$30.00</td>
					</tr>
					<tr>
						<td>Dinner</td>
						<td>$25.00</td>
						<td>1</td>
						<td>$25.00</td>
					</tr> -->
				</tbody>
			</table>
		</div>
	</div>

	<!-- Payment History Section -->
	<div class="section-title">Payment History</div>
	<table class="table table-bordered invoice-table ">
		<thead>
			<tr>
				<th>Payment Method</th>
				<th>Amount Paid</th>
				<th>Amount Due</th>
				<th>Payment Date</th>
				<th id="clear-all-btn"><button id="clear-all" style="background-color:rgb(220, 38, 38); color: #fff;align-items: center;" class="btn ">Clear All</button></th>
			</tr>
		</thead>
		<tbody id="payment-history">
			<tr id="payment-row">
				<td id="payment-method"><?php echo PaymentMethod::html_select(); ?></td>
				<td><input type="number" name="amount-paid" id="amount-paid"></td>
				<td><span id="amount-due" class="text-red fw-bold">$0.00</span></td>
				<td><input type="date" name="payment-date" id="payment-date"></td>
				<td><button id="insert-payment" style="background-color:rgba(0, 255, 85, 0.72); color: #fff;" class="btn ">Add</button></td>
			</tr>
			<!-- <tr>
				<td>Cash</td>
				<td>$175.00</td>
				<td>Paid</td>
				<td>2024-12-17</td>
			</tr> -->
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
		// function to print cart and add cart to database local storage
		// var cart = new Cart("payment");
		// printcart();
		// alert("hello");
		$('select').select2();

		// Customer Information , Billing Information, Billing Summary
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
									$('#total-amount').text("$" + total.toFixed(2));
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
		//payment summary
		$('#amount-paid').on('input', function() {
			let payment_type = $('#payment-method').find(":selected").val();
			// alert (payment_type);
			let amount_paid = parseFloat($('#amount-paid').val());
			let total_amount = parseFloat($('#total-amount').text().replace('$', ''));
			// alert (amount_paid);
			// alert (total_amount);
			let amount_due = total_amount - amount_paid;
			$('#amount-due').text("$" + amount_due.toFixed(2));
			// alert (amount_due);
		});
		//payment date
		$('#payment-date').on('input', function() {
			let payment_date = $(this).val();
			// alert(payment_date);
		});
		// Event listener for the "Add Payment" button
		$('#insert-payment').on('click', function() {
			// Retrieve input values
			let payment_method = $('#payment-method').find(":selected").text();
			// let total_amount = $('#total-amount').text().replace('$', '').trim();
			let amount_paid = $('#amount-paid').val();
			let amount_due = $('#amount-due').text().replace('$', '').trim();
			let payment_date = $('#payment-date').val();
			// Validate inputs
			if (!payment_method || !amount_paid || !payment_date) {
				alert('Please fill all payment details.');
				return;
			}

			// Create the new row dynamically
			let newRow = `
       			 <tr>
            		<td>${payment_method}</td>
            		<td >$${parseFloat(amount_paid).toFixed(2)}</td>
            		<td>$${parseFloat(amount_due).toFixed(2)}</td>
           			<td>${payment_date}</td>
            		<td>
                		<button style="align-items: center; background-color: #f44336; color: #fff;" class="btn delete-payment">Delete</button>
            		</td>
        		</tr>
    		`;

			// Append the new row after #payment-row
			$('#payment-row').after(newRow);

			// Clear input fields
			$('#amount-paid').val('');
			$('#payment-date').val('');
			$('#amount-due').text("$0.00");
		});

		// Event listener for dynamically added delete buttons
		$(document).on('click', '.delete-payment', function() {
			$(this).closest('tr').remove();
		});
		//Event listener for dynamically delete all payment
		$('#clear-all-btn').on('click', function() {
			$('#payment-row').nextAll().remove();
		})
		// Extra services section
		//Amenity
		$('#amenity-select').on('change', function() {
			// alert("hello");
			let amenity_id = $(this).find(":selected").val();
			// alert(amenity_id);
			$.ajax({
				url: '<?php echo $base_url; ?>api/Amenity/find',
				method: 'POST',
				data: {
					id: amenity_id
				},
				success: function(response) {
					// alert(response);
					// console.log(response);
					var amenity_info = JSON.parse(response);
					// console.log(amenity_info);
					let amenity_price = amenity_info.amenity.amenity_price;
					// alert(amenity_price);
					$('#amenity-price').text(amenity_price);
				}
			})
		})
		$('#amenity-add').on('click', function() {
			let aminity_name = $('#amenity-select').find(":selected").text();
			let amenity_price = $('#amenity-price').text().replace('$', '');
			let amenity_quantity = $('#amenity-quantity').val();
			let amenity_total = parseFloat(amenity_price) * parseFloat(amenity_quantity);
			// alert(amenity_total);
			html = `<tr>
						<td>${aminity_name}</td>
						<td>${amenity_price}</td>
						<td>${amenity_quantity}</td>
						<td class="amenity-total">${"$" + amenity_total.toFixed(2)}</td>
					</tr>`;
			$('#amenities-charges-row').append(html);

			// Clear input fields
			// $('#amenity-select').val('');
			$('#amenity-quantity').val('1');
			// $('#amenity-price').text("$0.00");
		})
		//Event listener for dynamically delete one by one amenity
		$('#amenity-clear').on('click', function() {
			// alert("hello");
			$('#amenities-charges-row tr:last').remove();
		})

		//Item
		$('#item-select').on('change', function() {
			// alert("hello");
			let item_id = $(this).find(":selected").val();
			// alert(item_id);
			$.ajax({
				url: '<?php echo $base_url; ?>api/Item/find',
				method: 'POST',
				data: {
					id: item_id
				},
				success: function(response) {
					// alert(response);
					// console.log(response);
					var item_info = JSON.parse(response);
					// console.log(item_info);
					let item_price = item_info.item.price;
					// alert(item_price);
					$('#item-price').text(item_price);
				}
			})
		})
		$('#item-add').on('click', function() {
			// alert("hello");
			let item_name = $('#item-select').find(":selected").text();
			let item_price = $('#item-price').text().replace('$', '');
			let item_quantity = $('#item-quantity').val();
			let item_total = parseFloat(item_price) * parseFloat(item_quantity);
			// alert(item_total);
			html = `<tr>
						<td>${item_name}</td>
						<td>${item_price}</td>
						<td>${item_quantity}</td>
						<td class="item-total">${"$" + item_total.toFixed(2)}</td>
					</tr>`;
			$('#order-items-row').append(html);

			// Clear input fields
			// $('#item-select').val('');
			$('#item-quantity').val('1');
			// $('#item-price').text("$0.00");
		})
		//Event listener for dynamically delete one by one item
		$('#item-clear').on('click', function() {
			// alert("hello");
			$('#order-items-row tr:last').remove();
		})
		//

	});
	//by sir method of add row in table
</script>
<script src=" <?php echo $base_url ?>/js/cart.js"></script>









<!-- $('#insert-payment').on('click', function() {
// 	// alert("hello");
// 	// let payment = {
// 	// 	"payment_type": $('#payment-method').find(":selected").val(),
// 	// 	"amount_paid": $('#amount-paid').val(),
// 	// 	"amount_due": $('#amount-due').text().replace('$', ''),
// 	// 	"payment_date": $('#payment-date').val(),
// 	// 	"booking_id": $('#booking-id').text()
// 	// };
// 	// cart.save(payment);
// 	// printcart();
// 	// alert(JSON.stringify(payment));
// 	// $.ajax({
// 	// 	url: '<?php echo $base_url; ?>api/Payment/create',
// 	// 	type: 'POST',
// 	// 	data: payment,
// 	// 	success: function(response) {
// 	// 		// alert(response);
// 	// 		// console.log(response);
// 	// 		// var payment_info = JSON.parse(response);
// 	// 		// alert(payment_info);
// 	// 	}
// 	// });
// })
//by codeium method of add row in table
// $('#insert-payment').on('click', function() {
// 	// alert("hello");
// 	let payment = {
// 		payment_type: payment_type,
// 		amount_paid: amount_paid,
// 		amount_due: amount_due,
// 		payment_date: payment_date,
// 		booking_id: $('#booking-id').text(),
// 	};
// 	cart.save(payment);
// 	printcart();
// 	// alert(JSON.stringify(payment));
// 	// $.ajax({
// 	// 	url: '<?php echo $base_url; ?>api/Payment/create',
// 	// 	type: 'POST',
// 	// 	data: payment,
// 	// 	success: function(response) {
// 	// 		// alert(response);
// 	// 		// console.log(response);
// 	// 		// var payment_info = JSON.parse(response);
// 	// 		// alert(payment_info);
// 	// 		// console.log(payment_info);
// 	// 		// alert(payment_info);
// 	// 	}
// 	// });
// 	function printcart() {
// 		let cart = JSON.parse(localStorage.getItem('cart'));
// 		let html = '';
// 		if (cart.length > 0) {
// 			payment.forEach(element, key => {
// 				html += `
// 				<tr>
// 					<td>${element.payment_type}</td>
// 					<td>${element.amount_paid}</td>
// 					<td>${element.amount_due}</td>
// 					<td>${element.payment_date}</td>
// 					<td><button class="btn btn-danger delete" data-id="${element.id}">Delete</button></td>
// 				</tr>
// 				`;
// 				$('#payment-table').after(html);
// 			});
// 		}
// 	});
// }); -->