<?php
echo Page::title(["title"=>"Create LoyaltyProgram"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"loyaltyprogram", "text"=>"Manage LoyaltyProgram"]);
echo Page::context_open();
echo Form::open(["route"=>"loyaltyprogram/save"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers"]);
	echo Form::input(["label"=>"Points","type"=>"text","name"=>"points"]);
	echo Form::input(["label"=>"Membership Level","type"=>"text","name"=>"membership_level"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
