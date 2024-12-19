<?php
echo Page::title(["title"=>"Edit Item"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"item", "text"=>"Manage Item"]);
echo Page::context_open();
echo Form::open(["route"=>"item/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$item->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$item->name"]);
	echo Form::input(["label"=>"Description","type"=>"textarea","name"=>"description","value"=>"$item->description"]);
	echo Form::input(["label"=>"Price","type"=>"text","name"=>"price","value"=>"$item->price"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
