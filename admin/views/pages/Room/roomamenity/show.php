<?php
echo Page::title(["title"=>"Show RoomAmenity"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"roomamenity", "text"=>"Manage RoomAmenity"]);
echo Page::context_open();
echo RoomAmenity::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
