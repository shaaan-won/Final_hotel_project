<?php
echo Page::title(["title"=>"Create Invoice"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"invoice", "text"=>"Manage Invoice"]);
echo Page::context_open();
echo Form::open(["route"=>"invoice/save"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers"]);
	echo Form::input(["label"=>"Booking","name"=>"booking_id","table"=>"bookings","display_column"=>"id"]);
	echo Form::input(["label"=>"Total Amount","type"=>"text","name"=>"total_amount"]);
	echo Form::input(["label"=>"Payment Status","name"=>"payment_status_id","table"=>"payment_statuses","display_column"=>"name"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
