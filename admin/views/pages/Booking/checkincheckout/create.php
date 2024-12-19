<?php
echo Page::title(["title"=>"Create CheckinCheckout"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"checkincheckout", "text"=>"Manage CheckinCheckout"]);
echo Page::context_open();
echo Form::open(["route"=>"checkincheckout/save"]);
	echo Form::input(["label"=>"Booking","name"=>"booking_id","table"=>"bookings"]);
	echo Form::input(["label"=>"Check In Date","type"=>"date","name"=>"check_in_date"]);
	echo Form::input(["label"=>"Check Out Date","type"=>"date","name"=>"check_out_date"]);
	echo Form::input(["label"=>"Notes","type"=>"textarea","name"=>"notes"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
