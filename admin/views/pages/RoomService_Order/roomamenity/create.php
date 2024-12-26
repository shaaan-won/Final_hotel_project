<?php
echo Page::title(["title"=>"Create RoomAmenity"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"roomamenity", "text"=>"Manage RoomAmenity"]);
echo Page::context_open();
echo Form::open(["route"=>"roomamenity/save"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers"]);
	echo Form::input(["label"=>"Room","name"=>"room_id","table"=>"rooms","display_column"=>"room_number"]);
	echo Form::input(["label"=>"Request Date","type"=>"date","name"=>"request_date"]);
	echo Form::input(["label"=>"Total Amount","type"=>"text","name"=>"total_amount"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
