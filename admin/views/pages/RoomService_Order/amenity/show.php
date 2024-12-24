<?php
echo Page::title(["title"=>"Show Amenity"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"amenity", "text"=>"Manage Amenity"]);
echo Page::context_open();
echo Amenity::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
