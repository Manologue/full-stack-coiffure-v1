<section class="section services" id="services">
 <h4 style="color: white" class="title">Nos services</h4>

 <div class="section-center services-center">
  <?php foreach ($categories as $category) { ?>
   <a href="<?= DOC_ROOT ?>hairdressing/<?= $category['seo_title'] ?>" class="product-card">
    <div class="hover-screen"></div>
    <img src="<?= DOC_ROOT ?>uploads/<?= html_escape($category['image']) ?>" alt="" />
    <div class="product-desc">
     <h5><?= html_escape($category['title']) ?></h5>
     <p><span>a domicile</span></p>
    </div>
   </a>
  <?php } ?>
 </div>
</section>