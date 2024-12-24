<?php
echo Page::title(["title"=>"Create RoomServiceRequest"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"roomservicerequest", "text"=>"Manage RoomServiceRequest"]);
echo Page::context_open();
echo Form::open(["route"=>"roomservicerequest/save"]);
	echo Form::input(["label"=>"User","name"=>"user_id","table"=>"users"]);
	echo Form::input(["label"=>"Room","name"=>"room_id","table"=>"rooms","display_column"=>"room_number"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers"]);
	echo Form::input(["label"=>"Request Type","type"=>"text","name"=>"request_type"]);
	echo Form::input(["label"=>"Request Description","type"=>"textarea","name"=>"request_description"]);
	echo Form::input(["label"=>"Status","name"=>"status_id","table"=>"statuss","display_column"=>"name"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
