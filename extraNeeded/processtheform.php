<script>
    // Process the form submission
		$('#process-invoice').on('click', function() {
			// alert("hello");
			// console.log("hello");
			// window.location.href = "<?php echo $base_url; ?>invoice";
			let date = new Date().toISOString().split('T')[0];
			// alert(date);
			let customer_id = $('#customer-name').find(':selected').val();
			// alert(customer_id);
			let booking_id = $('#booking-id').text();
			// alert(booking_id);
			let room_id = $('#room-id').text();
			// alert(room_id);
			let grand_total_room = $('#grand-total').text().replace('$', '');
			// alert(grand_total_room);
			let tax = $('#tax').text().replace('$', '');
			// alert(tax);
			let discount = $('#discount').text().replace('$', '');
			// alert(discount);
			let service_charges = $('#service-charges-input').val();
			// alert(service_charges);
			let cleaning_charges = $('#cleaning-charges-input').val();
			// alert(cleaning_charges);
			let sub_total_room = parseFloat($('#total-amount').text().replace('$', '').trim()).toFixed(2);
			// alert(sub_total_room);
			let amount_paid = $('.amount-paid').map(function() {
				return parseFloat($(this).text().replace('$', ''));
			}).get();
			// alert(amount_paid);
			let total_amount_paid = parseFloat(amount_paid.reduce((total, amount) => total + amount, 0)).toFixed(2);
			// alert(total_amount_paid);

			// Amenities Details to save in database
			let room_amenity_id = <?php echo RoomAmenity::get_last_id() + 1; ?>;
			// alert(room_amenity_id);
			let sub_total_amenities = parseFloat($('#amenity-total').text().replace('$', '').trim()).toFixed(2);
			// alert(sub_total_amenities);

			//room_amenity_id need to be same with the connection of table room_amenity and room_amenity_id
			let room_amenity_id = <?php echo RoomAmenity::get_last_id() + 1; ?>;
			//adding amenities to the databasee by loop one by one using ajax
			let amenities = [];
			$('.amenity').each(function() {
				amenities.push({
					room_amenity_id: room_amenity_id,
					customer_id: customer_id,
					room_id: room_id,
					amenity_id: $(this).find('.amenity-id').text(),
					quantity: $(this).find('.amenity-quantity').text(),
					price: $(this).find('.price').text()
				});
			});
			// alert(amenities);


			// Item Details to save in database
			let order_item_id = <?php echo Order::get_last_id() + 1; ?>;
			// alert(order_item_id);
			let sub_total_items = parseFloat($('#item-total').text().replace('$', '').trim()).toFixed(2);
			// alert(sub_total_items);

			// Payment section & Grand Total to save in database from the final section
			let payment_method = $('#payment-method').find(":selected").text();
			// alert(payment_method);
			let amount_due = $('.amount-due').map(function() {
				return parseFloat($(this).text().replace('$', ''));
			}).get();
			// alert(amount_due);
			let total_amount_due = parseFloat(amount_due.reduce((total, amount) => total + amount, 0)).toFixed(2);
			// alert(total_amount_due);
			let ultimate_due = grand_total_room - parseFloat(total_amount_paid);
			// alert(ultimate_due);
			let payment_date = $('#payment-date').val();
			// alert(payment_date);
			// let grand_total = parseFloat(sub_total_room) + parseFloat(sub_total_amenities) + parseFloat(sub_total_items);
			let extra_charges = parseFloat(sub_total_amenities) + parseFloat(sub_total_items);
			// alert(extra_charges);
			let payment_status_id = (grand_total_room == total_amount_paid) ?
				'1' :
				(grand_total_room > total_amount_paid) ?
				'2' :
				'3'; //best case scenario i have learned so far
			// alert(payment_status_id);
			
			// // Data to save in the Invoice table by ajax by invoice api
			// $.ajax({
			// 	url: "<?php echo $base_url; ?>api/Invoice/save",
			// 	type: "POST",
			// 	data: {
			// 		customer_id: customer_id,
			// 		booking_id: booking_id,
			// 		order_id: order_item_id,
			// 		room_amenitie_id: room_amenity_id,
			// 		total_amount: grand_total_room,
			// 		discount: discount,
			// 		tax: tax,
			// 		service_charges: service_charges,
			// 		cleaning_charges: cleaning_charges,
			// 		payment_status_id: payment_status_id,
			// 		amount_due: total_amount_due
			// 	},
			// 	success: function(response) {
			// 		// alert(response);
			// 		// console.log(response);
			// 		// window.location.href = "<?php echo $base_url; ?>invoice";
			// 	},
			// 	error: function(response) {
			// 		// alert(response);
			// 		alert("The operation for invoice failed");
			// 	}
			// })

			// // Data to save in the Room Amenity table by ajax by room amenity api
			// $.ajax({
			// 	url: "<?php echo $base_url; ?>api/RoomAmenity/save",
			// 	type: "POST",
			// 	data: {
			// 		customer_id: customer_id,
			// 		room_id: room_id,
			// 		request_date: date,
			// 		total_amount: sub_total_amenities					
			// 	},
			// 	success: function(response) {
			// 		// alert(response);
			// 		// console.log(response);
			// 		// window.location.href = "<?php echo $base_url; ?>invoice";
			// 	},error: function(response) {
			// 		// alert(response);
			// 		alert("The operation for room amenity failed");
			// 	}
			// })

			// // Data to save in the Order table by ajax by order api
			// $.ajax({
			// 	url: "<?php echo $base_url; ?>api/Order/save",
			// 	type: "POST",
			// 	data: {
			// 		customer_id: customer_id,
			// 		order_date: date,
			// 		total_amount: sub_total_items
			// 	},
			// 	success: function(response) {
			// 		alert(response);
			// 		// window.location.href = "<?php echo $base_url; ?>invoice";
			// 	},error: function(response) {
			// 		// alert(response);
			// 		alert("The operation for order failed");
			// 	}
			// })	

			// Data to save in the Room Amenity Detail table by ajax by room amenity detail api
			// $.ajax({
			// 	url: "<?php echo $base_url; ?>api/RoomAmenityDetail/",
			// 	type: "POST",
			// 	data: {
			// 		customer_id: customer_id,
			// 		room_amenity_id: room_amenity_id,
			// 		quantity: quantity,
			// 		total_amount: sub_total_amenities
			// 	},
			// 	success: function(response) {
			// 		// alert(response);
			// 		// console.log(response);
			// 		// window.location.href = "<?php echo $base_url; ?>invoice";
			// 	},error: function(response) {
			// 		// alert(response);
			// 		alert("The operation for room amenity detail failed");
			// 	}
			// })
			// Data to save in the Order Item table by ajax by order item api
			// $.ajax({
			// 	url: "<?php echo $base_url; ?>api/OrderItem/",
			// 	type: "POST",
			// 	data: {
			// 		customer_id: customer_id,
			// 		order_id: order_item_id,
			// 		item_id: item_id,
			// 		quantity: quantity,
			// 		total_amount: sub_total_items
			// 	},
			// 	success: function(response) {
			// 		// alert(response);
			// 		// console.log(response);
			// 		// window.location.href = "<?php echo $base_url; ?>invoice";
			// 	},error: function(response) {
			// 		// alert(response);
			// 		alert("The operation for order item failed");
			// 	}
			// })
        });
</script>