<?php session_start();
require_once("configs/config.php");
require_once("helpers/helper.php");
require_once("libraries/library.php");
require_once("models/model.php");
require_once("controllers/controller.php");

if (!isset($_SESSION["uid"])) header("location:$base_url");
$uid = $_SESSION["uid"];


?>


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from techzaa.in/rasket/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Nov 2024 03:35:00 GMT -->

<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Analytics | Rasket - Responsive Admin Dashboard Template</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="A fully responsive premium admin dashboard template" />
     <meta name="author" content="Techzaa" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />

     <!-- App favicon -->
     <link rel="shortcut icon" href="<?= $base_url ?>assets/images/favicon.ico">

     <!-- Vendor css (Require in all Page) -->
     <link href="<?= $base_url ?>assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

     <!-- Icons css (Require in all Page) -->
     <link href="<?= $base_url ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />

     <!-- App css (Require in all Page) -->
     <link href="<?= $base_url ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />

     <!-- Bootstrap 5 CSS -->
     <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->

     <!-- Theme Config js (Require in all Page) -->
     <script src="<?= $base_url ?>assets/js/config.min.js"></script>
     <!-- jQuery js (Require in all Page) -->
     <script src="<?= $base_url ?>assets/js/jquery.min.js"></script>
     <!-- <style>
          a{
               text-decoration: none;
          }
     </style> -->

     <!-- for selct dropdown -->
     <link href="<?= $base_url ?>assets/css/select2.min.css" rel="stylesheet" />
     <script src="<?= $base_url ?>assets/js/select2.min.js"></script>
</head>

<body>

     <!-- START Wrapper -->
     <div class="wrapper">

          <?php include("views/layout/preloader.php"); ?>
          <?php include("views/layout/navbar.php"); ?>
          <?php include("views/layout/main_sidebar.php"); ?>
          <?php include("views/layout/right_sidebar.php"); ?>

          <div class="page-content">

               <!-- Start Container Fluid -->
               <div class="container-fluid">