<?php
echo Page::title(["title"=>"Edit CheckinCheckout"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"checkincheckout", "text"=>"Manage CheckinCheckout"]);
echo Page::context_open();
echo Form::open(["route"=>"checkincheckout/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$checkincheckout->id"]);
	echo Form::input(["label"=>"Room","name"=>"room_id","table"=>"rooms","value"=>"$checkincheckout->room_id" ,"display_column"=>"room_number"]);
	echo Form::input(["label"=>"Check In Date","type"=>"date","name"=>"check_in_date","value"=>"$checkincheckout->check_in_date"]);
	echo Form::input(["label"=>"Check Out Date","type"=>"date","name"=>"check_out_date","value"=>"$checkincheckout->check_out_date"]);
	echo Form::input(["label"=>"Notes","type"=>"textarea","name"=>"notes","value"=>"$checkincheckout->notes"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
