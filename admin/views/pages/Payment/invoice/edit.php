<?php
// echo Page::title(["title"=>"Edit Invoice"]);
// echo Page::body_open();
// echo Html::link(["class"=>"btn btn-success", "route"=>"invoice", "text"=>"Manage Invoice"]);
// echo Page::context_open();
// echo Form::open(["route"=>"invoice/update"]);
// 	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$invoice->id"]);
// 	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers","value"=>"$invoice->customer_id"]);
// 	echo Form::input(["label"=>"Booking","name"=>"booking_id","table"=>"bookings","value"=>"$invoice->booking_id","display_column"=>"id"]);
// 	echo Form::input(["label"=>"Order","name"=>"order_id","table"=>"orders","value"=>"$invoice->order_id","display_column"=>"id"]);
// 	echo Form::input(["label"=>"Total Amount","type"=>"text","name"=>"total_amount","value"=>"$invoice->total_amount"]);
// 	echo Form::input(["label"=>"Discount","type"=>"text","name"=>"discount","value"=>"$invoice->discount"]);
// 	echo Form::input(["label"=>"Tax","type"=>"text","name"=>"tax","value"=>"$invoice->tax"]);
// 	echo Form::input(["label"=>"Service Charges","type"=>"text","name"=>"service_charges","value"=>"$invoice->service_charges"]);
// 	echo Form::input(["label"=>"Cleaning Charges","type"=>"text","name"=>"cleaning_charges","value"=>"$invoice->cleaning_charges"]);
// 	echo Form::input(["label"=>"Payment Status","name"=>"payment_status_id","table"=>"payment_statuses","value"=>"$invoice->payment_status_id","display_column"=>"name"]);
// 	echo Form::input(["label"=>"Amount Due","type"=>"text","name"=>"amount_due","value"=>"$invoice->amount_due"]);

// echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
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
		background-color: rgba(0, 113, 227, 0.26);
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
		<p>Invoice No #<span id="invoice-id">12345</span></p>
		<p>Date: <span id="invoice-date">2024-12-17</span></p>
	</div>

	<!-- Customer & Billing Information Section -->
	<div class="row">
		<div class="col-md-6">
			<h5>Customer Details:</h5>
			<p>Name: <span id="customer-name">John Doe</span></p>
			<p>Email: <span id="customer-email">johndoe@example.com</span></p>
			<p>Phone: <span id="customer-phone">123-456-7890</span></p>
			<p>
				Address:
				<span id="customer-address">123 Main Street, Springfield, USA</span>
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
				<td>Discount (10%)</td>
				<td id="discount">-$50.00</td>
			</tr>
			<tr>
				<td>Service Charges</td>
				<td id="service-charges">$30.00</td>
			</tr>
			<tr>
				<td>Cleaning Charges</td>
				<td id="cleaning-charges">$20.00</td>
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