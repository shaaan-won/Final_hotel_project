<?php
echo Page::title(["title"=>"Show RoomAmenityDetail"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"roomamenitydetail", "text"=>"Manage RoomAmenityDetail"]);
echo Page::context_open();
echo RoomAmenityDetail::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
