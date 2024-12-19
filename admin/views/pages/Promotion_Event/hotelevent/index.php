<?php
echo Page::title(["title"=>"Manage HotelEvent"]);
echo Page::body_open();
echo Page::context_open();
$page = isset($_GET["page"]) ?$_GET["page"]:1;
echo HotelEvent::html_table($page,10);
echo Page::context_close();
echo Page::body_close();
