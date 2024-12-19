<?php
echo Page::title(["title"=>"Edit RoomMaintenance"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"roommaintenance", "text"=>"Manage RoomMaintenance"]);
echo Page::context_open();
echo Form::open(["route"=>"roommaintenance/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$roommaintenance->id"]);
	echo Form::input(["label"=>"Room","name"=>"room_id","table"=>"rooms","value"=>"$roommaintenance->room_id"]);
	echo Form::input(["label"=>"Description","type"=>"textarea","name"=>"description","value"=>"$roommaintenance->description"]);
	echo Form::input(["label"=>"Status","name"=>"status_id","table"=>"status","value"=>"$roommaintenance->status_id"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
