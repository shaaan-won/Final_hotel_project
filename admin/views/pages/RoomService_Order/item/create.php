<?php
echo Page::title(["title"=>"Create Item"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"item", "text"=>"Manage Item"]);
echo Page::context_open();
echo Form::open(["route"=>"item/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Description","type"=>"textarea","name"=>"description"]);
	echo Form::input(["label"=>"Price","type"=>"text","name"=>"price"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
