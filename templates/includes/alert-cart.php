<!-- handle with javascript in cart.js check the comment // on submit form in alert cart container -->
<section class="section alert-section-cart">
 <div class="alert-center stylist-div">
  <i class="fas fa-exclamation-circle"></i>
  <div>
   <span>veillez entrer une autre adress</span>
   <p>
    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat,
    distinctio!
   </p>
   <form method="GET" action="<?= DOC_ROOT ?>search/">
    <input type="hidden" class="location" name="location">
    <input type="hidden" value="" name="services" />
    <input type="hidden" value="" name="day" />
    <button type="submit" class="btn cart-btn">Trouvez un coiffeur à cette adresse</button>
   </form>
  </div>
 </div>
</section>