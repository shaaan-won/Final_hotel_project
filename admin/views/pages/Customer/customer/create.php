<?php
echo Page::title(["title"=>"Create Customer"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"customer", "text"=>"Manage Customer"]);
echo Page::context_open();
echo Form::open(["route"=>"customer/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"First Name","type"=>"text","name"=>"first_name"]);
	echo Form::input(["label"=>"Last Name","type"=>"text","name"=>"last_name"]);
	echo Form::input(["label"=>"Email","type"=>"text","name"=>"email"]);
	echo Form::input(["label"=>"Phone","type"=>"text","name"=>"phone"]);
	echo Form::input(["label"=>"Id Card Type","name"=>"id_card_type_id","table"=>"id_card_types"]);
	echo Form::input(["label"=>"Id Card Number","type"=>"text","name"=>"id_card_number"]);
	echo Form::input(["label"=>"Address","type"=>"textarea","name"=>"address"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
