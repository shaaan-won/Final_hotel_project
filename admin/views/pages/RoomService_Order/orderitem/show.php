<?php
echo Page::title(["title"=>"Show OrderItem"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"orderitem", "text"=>"Manage OrderItem"]);
echo Page::context_open();
echo OrderItem::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
