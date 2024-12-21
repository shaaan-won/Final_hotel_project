<?php
echo Page::title(["title"=>"Create Room"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"room", "text"=>"Manage Room"]);
echo Page::context_open();
echo Form::open(["route"=>"room/save"]);
	echo Form::input(["label"=>"Room Number","type"=>"text","name"=>"room_number"]);
	echo Form::input(["label"=>"Room Type","name"=>"room_type_id","table"=>"room_types"]);
	echo Form::input(["label"=>"Price","type"=>"text","name"=>"price"]);
	echo Form::input(["label"=>"Capacity","type"=>"text","name"=>"capacity"]);
	echo Form::input(["label"=>"Status","name"=>"status_id","table"=>"statuss"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
