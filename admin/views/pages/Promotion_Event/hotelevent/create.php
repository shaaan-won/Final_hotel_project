<?php
echo Page::title(["title"=>"Create HotelEvent"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"hotelevent", "text"=>"Manage HotelEvent"]);
echo Page::context_open();
echo Form::open(["route"=>"hotelevent/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers"]);
	echo Form::input(["label"=>"Event Date","type"=>"text","name"=>"event_date"]);
	echo Form::input(["label"=>"Event Time","type"=>"text","name"=>"event_time"]);
	echo Form::input(["label"=>"Location","type"=>"textarea","name"=>"location"]);
	echo Form::input(["label"=>"Attendees","type"=>"text","name"=>"attendees"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
