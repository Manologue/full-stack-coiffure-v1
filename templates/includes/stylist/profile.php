<!-- profile -->
<div class="profile stylist-div">
 <div class="img-container">
  <img src="<?= DOC_ROOT ?>uploads/<?= html_escape($user['picture']) ?>" alt="" />
 </div>
 <div class="details">
  <h5><?= html_escape($user['first_name']) ?> <?= html_escape(mb_substr($user['name'], 0, 1))  ?>, stylist mobile a <?= html_escape($user['city_of_work']) ?>, <?= html_escape($user['state']) ?></h5>
  <p class="experience"><span>experience</span>depuis <?= html_escape($user['years_exp']) ?> ans</p>
 </div>
</div>
<!-- about -->
<div class="about stylist-div">
 <h5>apropos...</h5>
 <p>
  <?= html_escape($user['bio']) ?>
 </p>
</div>