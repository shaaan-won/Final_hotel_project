<?php
echo Page::title(["title"=>"Show Staff"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"staff", "text"=>"Manage Staff"]);
echo Page::context_open();
echo Staff::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
