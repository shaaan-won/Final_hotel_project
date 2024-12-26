<?php
echo Page::title(["title"=>"Create RoomAmenityDetail"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"roomamenitydetail", "text"=>"Manage RoomAmenityDetail"]);
echo Page::context_open();
echo Form::open(["route"=>"roomamenitydetail/save"]);
	echo Form::input(["label"=>"Room Amenity Id","name"=>"room_amenity_id","table"=>"room_amenities","display_column"=>"id"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers"]);
	echo Form::input(["label"=>"Room","name"=>"room_id","table"=>"rooms","display_column"=>"room_number"]);
	echo Form::input(["label"=>"Amenity","name"=>"amenity_id","table"=>"amenities","display_column"=>"name"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity"]);
	echo Form::input(["label"=>"Price","type"=>"text","name"=>"price"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
