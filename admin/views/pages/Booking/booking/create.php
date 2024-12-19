<?php
echo Page::title(["title"=>"Create Booking"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"booking", "text"=>"Manage Booking"]);
echo Page::context_open();
echo Form::open(["route"=>"booking/save"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers"]);
	echo Form::input(["label"=>"Room","name"=>"room_id","table"=>"rooms"]);
	echo Form::input(["label"=>"Check In Date","type"=>"text","name"=>"check_in_date"]);
	echo Form::input(["label"=>"Check Out Date","type"=>"text","name"=>"check_out_date"]);
	echo Form::input(["label"=>"Status","name"=>"status_id","table"=>"status"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();