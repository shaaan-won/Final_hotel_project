<?php
echo Page::title(["title"=>"Show RoomMaintenance"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"roommaintenance", "text"=>"Manage RoomMaintenance"]);
echo Page::context_open();
echo RoomMaintenance::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
