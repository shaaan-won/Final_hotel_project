<?php
echo Page::title(["title"=>"Edit RoomAmenity"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"roomamenity", "text"=>"Manage RoomAmenity"]);
echo Page::context_open();
echo Form::open(["route"=>"roomamenity/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$roomamenity->id"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers","value"=>"$roomamenity->customer_id"]);
	echo Form::input(["label"=>"Room","name"=>"room_id","table"=>"rooms","value"=>"$roomamenity->room_id","display_column"=>"room_number"]);
	echo Form::input(["label"=>"Request Date","type"=>"date","name"=>"request_date","value"=>"$roomamenity->request_date"]);
	echo Form::input(["label"=>"Total Amount","type"=>"text","name"=>"total_amount","value"=>"$roomamenity->total_amount"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
