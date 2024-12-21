<?php
echo Page::title(["title"=>"Create Order"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"order", "text"=>"Manage Order"]);
echo Page::context_open();
echo Form::open(["route"=>"order/save"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers"]);
	echo Form::input(["label"=>"Order Date","type"=>"date","name"=>"order_date"]);
	echo Form::input(["label"=>"Total Amount","type"=>"text","name"=>"total_amount"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
