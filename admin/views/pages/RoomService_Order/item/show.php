<?php
echo Page::title(["title"=>"Show Item"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"item", "text"=>"Manage Item"]);
echo Page::context_open();
echo Item::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
