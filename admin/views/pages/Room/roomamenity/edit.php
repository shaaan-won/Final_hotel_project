<?php
echo Page::title(["title"=>"Edit RoomAmenity"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"roomamenity", "text"=>"Manage RoomAmenity"]);
echo Page::context_open();
echo Form::open(["route"=>"roomamenity/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$roomamenity->id"]);
	echo Form::input(["label"=>"Room","name"=>"room_id","table"=>"rooms","value"=>"$roomamenity->room_id"]);
	echo Form::input(["label"=>"Amenity","name"=>"amenity_id","table"=>"amenitys","value"=>"$roomamenity->amenity_id"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
