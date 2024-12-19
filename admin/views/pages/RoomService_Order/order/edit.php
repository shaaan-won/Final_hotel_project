<?php
echo Page::title(["title"=>"Edit Order"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"order", "text"=>"Manage Order"]);
echo Page::context_open();
echo Form::open(["route"=>"order/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$order->id"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers","value"=>"$order->customer_id"]);
	echo Form::input(["label"=>"Order Date","type"=>"text","name"=>"order_date","value"=>"$order->order_date"]);
	echo Form::input(["label"=>"Total Amount","type"=>"text","name"=>"total_amount","value"=>"$order->total_amount"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
