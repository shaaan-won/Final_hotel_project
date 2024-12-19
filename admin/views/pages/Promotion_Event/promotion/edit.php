<?php
echo Page::title(["title"=>"Edit Promotion"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"promotion", "text"=>"Manage Promotion"]);
echo Page::context_open();
echo Form::open(["route"=>"promotion/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$promotion->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$promotion->name"]);
	echo Form::input(["label"=>"Description","type"=>"textarea","name"=>"description","value"=>"$promotion->description"]);
	echo Form::input(["label"=>"Discount Percentage","type"=>"text","name"=>"discount_percentage","value"=>"$promotion->discount_percentage"]);
	echo Form::input(["label"=>"Start Date","type"=>"text","name"=>"start_date","value"=>"$promotion->start_date"]);
	echo Form::input(["label"=>"End Date","type"=>"text","name"=>"end_date","value"=>"$promotion->end_date"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
