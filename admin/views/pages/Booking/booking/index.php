<?php
echo Page::title(["title"=>"Manage Booking"]);
echo Page::body_open();
// echo Page::context_open();
?>
<div class="card" style="padding:10px; margin-top:10px;">
  <div class="card-header d-flex justify-content-between offset-5">
      <a class="btn btn-danger" href="<?php echo $base_url ?>invoice/create">Create Hotel Bill</a>
    <!-- <div class="flex-fill">Manage Booking</div>  -->
  </div>
  <div class="card-body">
    <!-- Card Body Content Goes Here -->


<?php
$page = isset($_GET["page"]) ?$_GET["page"]:1;
echo Booking::html_table($page,10);
echo Page::context_close();
echo Page::body_close();
?>
