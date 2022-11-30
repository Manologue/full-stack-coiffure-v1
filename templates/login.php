<?php include('includes/header.php') ?>
<!------------------------------ HOME PAGE ----------------------->
<main id="login-page">
 <div class="section-center">
  <?php if ($success) { ?>
   <div class="alert title alert-success"><?= $success ?></div>
  <?php } ?>
  <section class="main login-section">
   <!-- form  -->
   <form class="form" action="<?= DOC_ROOT ?>login" method="POST">
    <?php if ($errors['message']) { ?>
     <div class="alert alert-danger"><?= $errors['message'] ?></div>
    <?php } ?>
    <h5>Se connecter a son compte</h5>
    <div class="form-row">
     <label for="email" class="form-label">Email</label>
     <input type="email" name="email" id="email" class="form-input" />
     <small class="form-alert"><?= $errors['email'] ?></small>
    </div>
    <div class="form-row">
     <label for="password" class="form-label">Mot de passe</label>
     <input type="password" name="password" id="password" class="form-input" />
     <small class="form-alert"><?= $errors['password'] ?></small>
    </div>
    <button type="submit" class="btn btn-block">Se connecter</button>
    <div class="register-links">
     <a href="<?= DOC_ROOT ?>register">click pour t'inscrire</a>
     <a href="<?= DOC_ROOT ?>password-forgot"> mot de passe oublie?</a>
    </div>
   </form>
  </section>
 </div>

</main>

<!-- ************************** modals ************************ -->
<?php include('includes/modals.php') ?>
<!------------------------------END OF HOME PAGE  ----------------------------->

<?php include('includes/footer.php') ?>