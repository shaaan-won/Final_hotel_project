<?php
echo Page::title(["title"=>"Edit RoomServiceRequest"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"roomservicerequest", "text"=>"Manage RoomServiceRequest"]);
echo Page::context_open();
echo Form::open(["route"=>"roomservicerequest/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$roomservicerequest->id"]);
	echo Form::input(["label"=>"User","name"=>"user_id","table"=>"users","value"=>"$roomservicerequest->user_id"]);
	echo Form::input(["label"=>"Room","name"=>"room_id","table"=>"rooms","value"=>"$roomservicerequest->room_id","display_column"=>"room_number"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers","value"=>"$roomservicerequest->customer_id"]);
	echo Form::input(["label"=>"Request Type","type"=>"text","name"=>"request_type","value"=>"$roomservicerequest->request_type"]);
	echo Form::input(["label"=>"Request Description","type"=>"textarea","name"=>"request_description","value"=>"$roomservicerequest->request_description"]);
	echo Form::input(["label"=>"Status","name"=>"status_id","table"=>"statuss","value"=>"$roomservicerequest->status_id"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
