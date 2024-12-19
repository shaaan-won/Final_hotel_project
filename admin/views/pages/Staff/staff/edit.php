<?php
echo Page::title(["title"=>"Edit Staff"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"staff", "text"=>"Manage Staff"]);
echo Page::context_open();
echo Form::open(["route"=>"staff/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$staff->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$staff->name"]);
	echo Form::input(["label"=>"Staff Role","name"=>"staff_role_id","table"=>"staff_roles","value"=>"$staff->staff_role_id"]);
	echo Form::input(["label"=>"Email","type"=>"text","name"=>"email","value"=>"$staff->email"]);
	echo Form::input(["label"=>"Phone","type"=>"text","name"=>"phone","value"=>"$staff->phone"]);
	echo Form::input(["label"=>"Address","type"=>"textarea","name"=>"address","value"=>"$staff->address"]);
	echo Form::input(["label"=>"Work Schedule Id","type"=>"text","name"=>"work_schedule_id","value"=>"$staff->work_schedule_id"]);
	echo Form::input(["label"=>"Hired Date","type"=>"text","name"=>"hired_date","value"=>"$staff->hired_date"]);
	echo Form::input(["label"=>"Performance Score","type"=>"text","name"=>"performance_score","value"=>"$staff->performance_score"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
