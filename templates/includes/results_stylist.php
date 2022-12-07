<div class="results-center">
  <?php
  if (count($users) < 1 || empty($users)) {
    echo "<p>Désolé, nous n'avons pas de coiffeur correspondant exactement à votre demande. Veuillez apporter des modifications, nous pourrions avoir des options pour vous une autre fois ou dans un endroit plus précis.</p>";
  } else {

    $i = 0;
    foreach ($users as $user) {
      $users_infos[$i];

      foreach ($users_infos[$i] as $user_info) {
        $user['category_list'][] = $user_info['category'];
      }

      $user['category_list'] = implode(", ", $user['category_list']);

      $i++; ?>
      <a href="<?= DOC_ROOT ?>stylist/<?= $user['url_address'] ?>" class="article">
        <div class="desc">
          <div class="img-container">
            <img src="<?= DOC_ROOT ?>uploads/<?= html_escape($user['picture']) ?>" alt="" />
          </div>
          <div class="about-container">
            <span class="name"><?= html_escape($user['username']) ?></span>
            <p class="city"><?= html_escape($user['city_of_work']) ?>, <?= html_escape($user['state']) ?></p>
            <p class="experience"><span>experience</span>depuis <?= html_escape($user['years_exp']) ?> ans</p>
            <p class="price">a partir de <span><?= html_escape($user['price_starter']) ?>$</span></p>
          </div>
        </div>
        <div class="services">
          <i class="fa-solid fa-scissors"></i>
          <p><?= html_escape($user['category_list']) ?></p>
        </div>
      </a>
  <?php }
  } ?>

  <!-- end of single result -->
</div>