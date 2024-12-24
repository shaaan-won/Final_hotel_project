<?php
echo Page::title(["title"=>"Edit Amenity"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"amenity", "text"=>"Manage Amenity"]);
echo Page::context_open();
echo Form::open(["route"=>"amenity/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$amenity->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$amenity->name"]);
	echo Form::input(["label"=>"Amenity Price","type"=>"text","name"=>"amenity_price","value"=>"$amenity->amenity_price"]);
	echo Form::input(["label"=>"Description","type"=>"textarea","name"=>"description","value"=>"$amenity->description"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
