<?php
echo Page::title(["title"=>"Create Report"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"report", "text"=>"Manage Report"]);
echo Page::context_open();
echo Form::open(["route"=>"report/save"]);
	echo Form::input(["label"=>"User","name"=>"user_id","table"=>"users"]);
	echo Form::input(["label"=>"Report Type","type"=>"text","name"=>"report_type"]);
	echo Form::input(["label"=>"Report Description","type"=>"textarea","name"=>"report_description"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
