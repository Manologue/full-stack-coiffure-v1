<?php include('includes/header.php') ?>





<main id="authenticate-page">
 <div class="section-center">

  <h4 class="title">Identifier vous pour votre rendez vous</h4>
  <!-- alert -->
  <?php include('includes/alert-cart.php') ?>
  <!-- end of alert -->
  <div class="container">
   <section class="section">
    <form class="form">
     <div class="form-row">
      <label for="name" class="form-label">Nom</label>
      <input type="text" placeholder="hello there" id="name" class="form-input" />
     </div>
     <div class="form-row">
      <label for="adress" class="form-label">Adress</label>
      <input type="text" id="adress" class="form-input" />
     </div>
     <div class="form-row">
      <label for="code_postal" class="form-label">Code postal</label>
      <input type="text" id="code_postal" class="form-input" />
     </div>
     <div class="form-row">
      <label for="number" class="form-label">Tel</label>
      <input type="number" id="number" class="form-input" />
     </div>
     <div class="form-row">
      <label for="email" class="form-label">Email</label>
      <input type="email" id="email" class="form-input" />
      <small class="form-alert">please provide value</small>
     </div>
     <div class="form-row">
      <label for="textarea" class="form-label">Demande particuliere</label>
      <textarea class="form-textarea"></textarea>
     </div>
     <div class="form-row">
      <input type="checkbox" name="" id=""><span> accept <a href="#">terms and conditions</a></span>
     </div>
     <button type="submit" class="btn btn-block">nous faire parvenir</button>
    </form>
   </section>

   <!-- cart  -->
   <?php include('includes/cart.php') ?>
   <!-- end of cart -->
  </div>
 </div>

 <!-- ************************** modals ************************ -->
 <?php include('includes/modals.php') ?>
</main>


<?php include('includes/footer.php') ?>