<?php
echo Page::title(["title"=>"Edit HotelEvent"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"hotelevent", "text"=>"Manage HotelEvent"]);
echo Page::context_open();
echo Form::open(["route"=>"hotelevent/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$hotelevent->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$hotelevent->name"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers","value"=>"$hotelevent->customer_id"]);
	echo Form::input(["label"=>"Event Date","type"=>"text","name"=>"event_date","value"=>"$hotelevent->event_date"]);
	echo Form::input(["label"=>"Event Time","type"=>"text","name"=>"event_time","value"=>"$hotelevent->event_time"]);
	echo Form::input(["label"=>"Location","type"=>"textarea","name"=>"location","value"=>"$hotelevent->location"]);
	echo Form::input(["label"=>"Attendees","type"=>"text","name"=>"attendees","value"=>"$hotelevent->attendees"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
