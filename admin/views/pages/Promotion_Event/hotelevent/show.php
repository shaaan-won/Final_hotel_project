<?php
echo Page::title(["title"=>"Show HotelEvent"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"hotelevent", "text"=>"Manage HotelEvent"]);
echo Page::context_open();
echo HotelEvent::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
