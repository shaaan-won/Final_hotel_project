<?php
echo Page::title(["title"=>"Create Promotion"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"promotion", "text"=>"Manage Promotion"]);
echo Page::context_open();
echo Form::open(["route"=>"promotion/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Description","type"=>"textarea","name"=>"description"]);
	echo Form::input(["label"=>"Discount Percentage","type"=>"text","name"=>"discount_percentage"]);
	echo Form::input(["label"=>"Start Date","type"=>"text","name"=>"start_date"]);
	echo Form::input(["label"=>"End Date","type"=>"text","name"=>"end_date"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
