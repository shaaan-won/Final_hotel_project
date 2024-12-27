<?php
echo Page::title(["title"=>"Create OrderItem"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"orderitem", "text"=>"Manage OrderItem"]);
echo Page::context_open();
echo Form::open(["route"=>"orderitem/save"]);
	echo Form::input(["label"=>"Order","name"=>"order_id","table"=>"orders","display_column"=>"id"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers"]);
	echo Form::input(["label"=>"Room","name"=>"room_id","table"=>"rooms","display_column"=>"room_number"]);
	echo Form::input(["label"=>"Item","name"=>"item_id","table"=>"items"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity"]);
	echo Form::input(["label"=>"Total","type"=>"text","name"=>"total"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
