<?php
echo Page::title(["title"=>"Create Booking"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"booking", "text"=>"Manage Booking"]);
echo Page::context_open();
echo Form::open(["route"=>"booking/save"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers"]);
	echo Form::input(["label"=>"Room","name"=>"room_id","table"=>"rooms","display_column"=>"room_number"]);
	echo Form::input(["label"=>"Check In Date","type"=>"date","name"=>"check_in_date"]);
	echo Form::input(["label"=>"Check Out Date","type"=>"date","name"=>"check_out_date"]);
	echo Form::input(["label"=>"Status","name"=>"status_id","table"=>"statuss"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
?>
<script>
	
</script>
<!-- <style>

	.container {
		width: 40%;
		margin: 50px auto;
		background-color: white;
		padding: 20px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		border-radius: 10px;
	}

	.form-heading {
		text-align: center;
		font-size: 24px;
		margin-bottom: 20px;
		color: #333;
	}

	.form-group {
		margin-bottom: 20px;
	}

	label {
		font-size: 18px;
		color: #555;
		display: block;
		margin-bottom: 8px;
	}

	select,
	input[type="date"] {
		width: 100%;
		padding: 10px;
		font-size: 16px;
		border-radius: 5px;
		border: 1px solid #ccc;
	}

	select:focus,
	input[type="date"]:focus {
		border-color: #007bff;
		outline: none;
	}

	button {
		background-color: #007bff;
		color: white;
		padding: 10px 15px;
		border: none;
		border-radius: 5px;
		width: 100%;
		font-size: 16px;
		cursor: pointer;
	}

	button:hover {
		background-color: #0056b3;
	}
</style>
<div class="container">
	<h2 class="form-heading">Hotel Booking Form</h2>

	<form id="bookingForm" action="submit_booking.php" method="POST">
		<div class="form-group">
			<label for="customer_id">Customer</label>
			<select id="customer_id" name="customer_id" required>
				<option value="">Select Customer</option>
			</select>
		</div>

		<div class="form-group">
			<label for="room_id">Room</label>
			<select id="room_id" name="room_id" required>
				<option value="">Select Room</option>
			
			</select>
		</div>

		<div class="form-group">
			<label for="check_in_date">Check-in Date</label>
			<input type="date" id="check_in_date" name="check_in_date" required>
		</div>

		<div class="form-group">
			<label for="check_out_date">Check-out Date</label>
			<input type="date" id="check_out_date" name="check_out_date" required>
		</div>

		<div class="form-group">
			<button type="submit" class="btn">Book Now</button>
		</div>
	</form>
</div> -->