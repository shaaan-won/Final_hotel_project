<?php
echo Page::title(["title"=>"Edit Customer"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"customer", "text"=>"Manage Customer"]);
echo Page::context_open();
echo Form::open(["route"=>"customer/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$customer->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$customer->name"]);
	echo Form::input(["label"=>"First Name","type"=>"text","name"=>"first_name","value"=>"$customer->first_name"]);
	echo Form::input(["label"=>"Last Name","type"=>"text","name"=>"last_name","value"=>"$customer->last_name"]);
	echo Form::input(["label"=>"Email","type"=>"text","name"=>"email","value"=>"$customer->email"]);
	echo Form::input(["label"=>"Phone","type"=>"text","name"=>"phone","value"=>"$customer->phone"]);
	echo Form::input(["label"=>"Id Card Type","name"=>"id_card_type_id","table"=>"id_card_types","value"=>"$customer->id_card_type_id"]);
	echo Form::input(["label"=>"Id Card Number","type"=>"text","name"=>"id_card_number","value"=>"$customer->id_card_number"]);
	echo Form::input(["label"=>"Address","type"=>"textarea","name"=>"address","value"=>"$customer->address"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
