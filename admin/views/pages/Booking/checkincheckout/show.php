<?php
echo Page::title(["title"=>"Show CheckinCheckout"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"checkincheckout", "text"=>"Manage CheckinCheckout"]);
echo Page::context_open();
echo CheckinCheckout::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
