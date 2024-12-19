<?php
echo Page::title(["title"=>"Show LoyaltyProgram"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"loyaltyprogram", "text"=>"Manage LoyaltyProgram"]);
echo Page::context_open();
echo LoyaltyProgram::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
