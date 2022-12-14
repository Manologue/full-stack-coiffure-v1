<section id="cart" class="section cart">
 <div class="cart-center stylist-div">
  <div class="cart-container">
   <p class="title">Un rendez vous avec:</p>
   <div class="booking">
    <div class="head">
     <div class="img-container">
      <img src="<?= DOC_ROOT ?>uploads/<?= html_escape($user['picture']) ?>" alt="" />
      <span><?= html_escape($user['first_name']) ?></span>
     </div>
     <span class="total-cart-amount">
      <!--******** ajax *********-->
     </span>
    </div>
   </div>
   <div class="destination">
    <div class="head">
     <span><i class="fa-solid fa-location-dot"></i> Destination address</span>
     <?php if ($cart_page !== "success") { ?>
      <a id="destination-btn" href="#">modifier</a>
     <?php } ?>
    </div>
    <div class="info">
     <p>
      Hartsfield-Jackson Atlanta International Airport, 6000 N Terminal
      Pkwy, Atlanta, GA 30320, United States
     </p>
    </div>
    <!-- <div class="info empty">
     <p>veillez ajouter votre address</p>
    </div> -->
   </div>
   <div class="services-cart">
    <div class="head">
     <span><i class="fa-solid fa-cart-shopping"></i> Services selectionnes</span>
     <?php if ($cart_page !== "stylist" && $cart_page !== "success") { ?>
      <a id="" href="<?= DOC_ROOT ?>stylist/<?= html_escape($user['url_address']) ?>">modifier</a>
     <?php } ?>
    </div>
    <div class="services-container" data-user_id=<?= html_escape($user['id']) ?> data-services_count=<?= html_escape(($_SESSION["count_services_{$user['id']}"]) ?? 0) ?>>
     <!--********** ajax  **********-->

    </div>
   </div>
   <?php if ($cart_page === 'authenticate' || $cart_page === 'success') { ?>
    <div class="date-time">
     <div class="head">
      <span><i class="fa-regular fa-clock"></i> Date & heure</span>
      <?php if ($cart_page !== "success") { ?>
       <a id="" href="<?= DOC_ROOT ?>stylist/<?= html_escape($user['url_address']) ?>/cart/select-datetime">modifier</a>
      <?php } ?>
     </div>
     <div class="info">
      <p>
       <?= isset($_SESSION["valid_date_time_{$user['id']}"]) ? $format_date . ' a ' . $format_time . ' h ' : "" ?>
      </p>
     </div>
    </div>
   <?php } ?>
  </div>
  <!-- handle with javascript in modals.js check the if cartForm condition -->
  <?php if ($cart_page === "stylist") { ?>
   <form method="POST" action="<?= DOC_ROOT ?>stylist/<?= html_escape($user['url_address']) ?>/cart/select-datetime">
    <button class="btn cart-btn">fixer un rendez-vous</button>
    <input type="hidden" value="true" name="valid" />
   </form>
  <?php } ?>
 </div>
</section>