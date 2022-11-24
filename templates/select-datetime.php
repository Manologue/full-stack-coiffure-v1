<?php include('includes/header.php') ?>



<!------------------------------ HOME PAGE ----------------------->
<main id="datetime-page">
 <div class="section-center">
  <!-- alert -->
  <?php include('includes/alert-cart.php') ?>
  <!-- end of alert -->


  <h5 class="title">choisir date & heure</h5>
  <!-- calendar -->

  <div class="container">
   <div class="calendar-container">

    <!-- calendar placeholder coming from ajax jquery -->
    <div id="picker"></div>

    <!-- displaying date chosen -->
    <p>Selected date: <span id="selected-date"></span></p>
    <p>Selected time: <span id="selected-time"></span></p>
   </div>
   <!-- end of calendar -->

   <!-- cart  -->
   <?php include('includes/cart.php') ?>
   <!-- end of cart -->
  </div>

 </div>

 <!-- ************************** modals ************************ -->
 <?php include('includes/modals.php') ?>
</main>

<?php include('includes/footer.php') ?>