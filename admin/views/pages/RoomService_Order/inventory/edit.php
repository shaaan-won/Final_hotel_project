<?php
echo Page::title(["title"=>"Edit Inventory"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"inventory", "text"=>"Manage Inventory"]);
echo Page::context_open();
echo Form::open(["route"=>"inventory/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$inventory->id"]);
	echo Form::input(["label"=>"Supplier","name"=>"supplier_id","table"=>"suppliers","value"=>"$inventory->supplier_id"]);
	echo Form::input(["label"=>"Item","name"=>"item_id","table"=>"items","value"=>"$inventory->item_id"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity","value"=>"$inventory->quantity"]);
	echo Form::input(["label"=>"Unit Price","type"=>"text","name"=>"unit_price","value"=>"$inventory->unit_price"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
