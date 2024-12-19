<?php
echo Page::title(["title"=>"Show PaymentStatuse"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"paymentstatuse", "text"=>"Manage PaymentStatuse"]);
echo Page::context_open();
echo PaymentStatuse::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
