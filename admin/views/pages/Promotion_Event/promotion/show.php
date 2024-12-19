<?php
echo Page::title(["title"=>"Show Promotion"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"promotion", "text"=>"Manage Promotion"]);
echo Page::context_open();
echo Promotion::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
