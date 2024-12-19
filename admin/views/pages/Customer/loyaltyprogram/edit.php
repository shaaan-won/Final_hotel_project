<?php
echo Page::title(["title"=>"Edit LoyaltyProgram"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"loyaltyprogram", "text"=>"Manage LoyaltyProgram"]);
echo Page::context_open();
echo Form::open(["route"=>"loyaltyprogram/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$loyaltyprogram->id"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers","value"=>"$loyaltyprogram->customer_id"]);
	echo Form::input(["label"=>"Points","type"=>"text","name"=>"points","value"=>"$loyaltyprogram->points"]);
	echo Form::input(["label"=>"Membership Level","type"=>"text","name"=>"membership_level","value"=>"$loyaltyprogram->membership_level"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
