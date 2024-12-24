<?php
echo Page::title(["title"=>"Show RoomServiceRequest"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"roomservicerequest", "text"=>"Manage RoomServiceRequest"]);
echo Page::context_open();
echo RoomServiceRequest::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
