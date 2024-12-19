<?php
echo Page::title(["title"=>"Create RoomMaintenance"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"roommaintenance", "text"=>"Manage RoomMaintenance"]);
echo Page::context_open();
echo Form::open(["route"=>"roommaintenance/save"]);
	echo Form::input(["label"=>"Room","name"=>"room_id","table"=>"rooms"]);
	echo Form::input(["label"=>"Description","type"=>"textarea","name"=>"description"]);
	echo Form::input(["label"=>"Status","name"=>"status_id","table"=>"status"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
