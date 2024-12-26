<?php
echo Page::title(["title"=>"Edit RoomAmenityDetail"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"roomamenitydetail", "text"=>"Manage RoomAmenityDetail"]);
echo Page::context_open();
echo Form::open(["route"=>"roomamenitydetail/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$roomamenitydetail->id"]);
	echo Form::input(["label"=>"Room Amenity Id","name"=>"room_amenity_id","table"=>"room_amenities","value"=>"$roomamenitydetail->room_amenity_id","display_column"=>"id"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers","value"=>"$roomamenitydetail->customer_id"]);
	echo Form::input(["label"=>"Room","name"=>"room_id","table"=>"rooms","value"=>"$roomamenitydetail->room_id","display_column"=>"room_number"]);
	echo Form::input(["label"=>"Amenities","name"=>"amenity_id","table"=>"amenities","value"=>"$roomamenitydetail->amenity_id","display_column"=>"name"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity","value"=>"$roomamenitydetail->quantity"]);
	echo Form::input(["label"=>"Price","type"=>"text","name"=>"price","value"=>"$roomamenitydetail->price"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
