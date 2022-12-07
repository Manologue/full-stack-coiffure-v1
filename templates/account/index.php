<?php include("includes/header.php") ?>

<!-- Begin page -->
<div class="wrapper">
 <!-- ========== Left Sidebar Start ========== -->
 <?php include("includes/left-sidebar.php") ?>
 <!-- Left Sidebar End -->

 <!-- ============================================================== -->
 <!-- Start Page Content here -->
 <!-- ============================================================== -->

 <div class="content-page">
  <div class="content">
   <!-- Topbar Start -->
   <?php include("includes/topbar.php") ?>
   <!-- end Topbar -->

   <!-- Start Content-->
   <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
     <div class="col-12">
      <div class="page-title-box">
       <div class="page-title-right">
        <form class="d-flex">
         <div class="input-group">
          <input type="text" class="form-control form-control-light" id="dash-daterange">
          <span class="input-group-text bg-primary border-primary text-white">
           <i class="mdi mdi-calendar-range font-13"></i>
          </span>
         </div>
         <a href="javascript: void(0);" class="btn btn-primary ms-2">
          <i class="mdi mdi-autorenew"></i>
         </a>
         <a href="javascript: void(0);" class="btn btn-primary ms-1">
          <i class="mdi mdi-filter-variant"></i>
         </a>
        </form>
       </div>
       <h4 class="page-title">Dashboard</h4>
      </div>
     </div>
    </div>
    <!-- end page title -->




   </div>
   <!-- container -->

  </div>
  <!-- content -->

  <!-- Footer Start -->
  <?php include("includes/content-footer.php") ?>
  <!-- end Footer -->

 </div>

 <!-- ============================================================== -->
 <!-- End Page content -->
 <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
<?php include("includes/end-bar.php") ?>
<div class="rightbar-overlay"></div>
<!-- /End-bar -->

<!-- bundle -->
<?php include("includes/footer.php") ?>