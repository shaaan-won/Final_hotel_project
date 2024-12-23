<?php
echo Page::title(["title"=>"Edit RoomAmenity"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"roomamenity", "text"=>"Manage RoomAmenity"]);
echo Page::context_open();
echo Form::open(["route"=>"roomamenity/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$roomamenity->id"]);
	echo Form::input(["label"=>"Customer Id","type"=>"text","name"=>"customer_id","table"=>"customers","value"=>"$roomamenity->customer_id","display_column"=>"name"]);
	echo Form::input(["label"=>"Room","name"=>"room_id","table"=>"rooms","value"=>"$roomamenity->room_id","display_column"=>"room_number"]);
	echo Form::input(["label"=>"Amenity","name"=>"amenity_id","table"=>"amenities","value"=>"$roomamenity->amenity_id","display_column"=>"name"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity","value"=>"$roomamenity->quantity"]);
	echo Form::input(["label"=>"Total Price","type"=>"text","name"=>"total_price","value"=>"$roomamenity->total_price"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
