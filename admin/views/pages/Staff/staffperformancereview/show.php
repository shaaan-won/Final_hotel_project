<?php
echo Page::title(["title"=>"Show StaffPerformanceReview"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"staffperformancereview", "text"=>"Manage StaffPerformanceReview"]);
echo Page::context_open();
echo StaffPerformanceReview::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
