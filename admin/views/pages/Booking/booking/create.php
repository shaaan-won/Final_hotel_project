<?php
echo Page::title(["title" => "Create Booking"]);
echo Page::body_open();
echo Html::link(["class" => "btn btn-success", "route" => "booking", "text" => "Manage Booking"]);

echo Page::context_open();
echo Form::open(["route" => "booking/save"]);
echo Form::input(["label" => "Check In Date", "type" => "date", "name" => "check_in_date"]);
echo Form::input(["label" => "Check Out Date", "type" => "date", "name" => "check_out_date"]);
echo Form::input(["label" => "Customer", "name" => "customer_id", "table" => "customers"]);
echo Form::input(["label" => "Room", "name" => "room_id", "table" => "rooms", "display_column" => "room_number"]);
echo Form::input(["label" => "Status", "name" => "status_id", "table" => "statuss"]);

echo Form::input(["name" => "create", "class" => "btn btn-primary offset-2", "value" => "Save", "type" => "submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
?>

<script>
	$(document).ready(function() {
		// alert("hello");
		$('#check_out_date').on("change", function() {

			let date1 = $(this).val();

			let date2 = $('#check_in_date').val();

			$.ajax({
				url: "<?php echo $base_url; ?>api/Room/all_room_except_booking_date",
				type: "POST",
				data: {
					date1: date1,
					date2: date2
				},
				success: function(response) {
					console.log(response);
					let rooms = JSON.parse(response);
					console.log(rooms);


					$('#room_id').empty();
					$('#room_id').append('<option value="">Select Room</option>');
					for (let i = 0; i < rooms.rooms.length; i++) {
						$('#room_id').append('<option value="' + rooms.rooms[i].id + '">' + rooms.rooms[i].room_number + '</option>');
					}
				}
			});

		});
	});
</script>