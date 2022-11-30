<?php include("includes/header.php") ?>

<!-- Begin page -->
<div class="wrapper">
 <!-- ========== Left Sidebar Start ========== -->
 <?php include("includes/left-sidebar.php") ?>
 <!-- Left Sidebar End -->

 <!-- ============================================================== -->
 <!-- Start Page Content here -->
 <!-- ============================================================== -->

 <div class="content-page bookings-page">
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
       <!-- <div class="page-title-right">
        <ol class="breadcrumb m-0">
         <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
         <li class="breadcrumb-item active">Bookings</li>
        </ol>
       </div> -->
       <h4 class="page-title">Bookings</h4>
      </div>
     </div>
    </div>
    <!-- end page title -->



    <!-- table -->
    <?php if ($failure) { ?><div class="alert alert-danger"><?= $failure ?></div><?php } ?>
    <div class="booking-alert"></div>
    <div class="table-responsive">
     <table class="table table-bordered booking-table table-centered mb-0">
      <thead>
       <tr>
        <th>#</th>
        <th>User</th>
        <th>Balance</th>
        <th>Currency</th>
        <th>Status</th>
        <th>Tel</th>
        <th>Customer name</th>
        <th>address</th>
        <th>Report</th>
       </tr>
      </thead>
      <tbody>
       <?php foreach ($bookings as $booking) { ?>
        <tr>
         <td><?= html_escape($booking['id']) ?></td>
         <td class="table-user">
          <img src="<?= DOC_ROOT ?>uploads/<?= html_escape($booking['picture']) ?>" alt="table-user" class="me-2 rounded-circle" />
          <?= html_escape($booking['first_name']) ?> <?= html_escape($booking['name'])  ?>
         </td>
         <td><?= html_escape($booking['amount']) ?></td>
         <td><?= html_escape($booking['currency']) ?></td>
         <td><?= html_escape($booking['status']) ?></td>
         <td><?= html_escape($booking['tel']) ?></td>
         <td><?= html_escape($booking['name']) ?></td>
         <td><?= html_escape($booking['adress']) ?></td>
         <td><a href="<?= DOC_ROOT ?>admin/booking_report/<?= html_escape($booking['id']) ?>">view</a></td>
        </tr>
       <?php } ?>
      </tbody>
     </table>
    </div>
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