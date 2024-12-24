<?php
echo Page::title(["title"=>"Create Amenity"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"amenity", "text"=>"Manage Amenity"]);
echo Page::context_open();
echo Form::open(["route"=>"amenity/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Amenity Price","type"=>"text","name"=>"amenity_price"]);
	echo Form::input(["label"=>"Description","type"=>"textarea","name"=>"description"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
