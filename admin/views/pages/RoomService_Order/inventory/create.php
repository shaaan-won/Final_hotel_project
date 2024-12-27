<?php
echo Page::title(["title"=>"Create Inventory"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"inventory", "text"=>"Manage Inventory"]);
echo Page::context_open();
echo Form::open(["route"=>"inventory/save"]);
	echo Form::input(["label"=>"Supplier","name"=>"supplier_id","table"=>"suppliers"]);
	echo Form::input(["label"=>"Item","name"=>"item_id","table"=>"items"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity"]);
	echo Form::input(["label"=>"Unit Price","type"=>"text","name"=>"unit_price"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
