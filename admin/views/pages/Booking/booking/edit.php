<?php
echo Page::title(["title"=>"Edit Booking"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"booking", "text"=>"Manage Booking"]);
echo Page::context_open();
echo Form::open(["route"=>"booking/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$booking->id"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers","value"=>"$booking->customer_id"]);
	echo Form::input(["label"=>"Room","name"=>"room_id","table"=>"rooms","value"=>"$booking->room_id","display_column"=>"room_number"]);
	echo Form::input(["label"=>"Check In Date","type"=>"date","name"=>"check_in_date","value"=>"$booking->check_in_date"]);
	echo Form::input(["label"=>"Check Out Date","type"=>"date","name"=>"check_out_date","value"=>"$booking->check_out_date"]);
	echo Form::input(["label"=>"Status","name"=>"status_id","table"=>"statuss","value"=>"$booking->status_id"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
