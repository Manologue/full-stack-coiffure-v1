<!-- modal location -->
<div class="modal-overlay" id="modal-location">
  <div class="popup">
    <header>
      <span>Location</span>
      <div class="close"><i class="uil uil-times"></i></div>
    </header>
    <div class="content">
      <span>
        <i class="fa-solid fa-location-dot"></i> Ou est-ce que le coiffeur doit
        venir</span>
      <div class="form-row">
        <input type="text" placeholder="entrer votre address..." id="name" class="form-input" autocomplete="off" />
      </div>

      <div class="results">
        <!-- <p class="error">
          We couldn't find any matches. Try checking the spelling and searching
          again.
        </p> -->
        <span class="research"><i class="fa-solid fa-earth-europe"></i> Rechercher des coiffeurs pres de
          chez vous</span>
        <div class="list">
          <!-- <span data-location="newyork">
            <i class="fa-solid fa-location-dot"></i> newyork</span>
          <span data-location="toronto">
            <i class="fa-solid fa-location-dot"></i> toronto</span>
          <span data-location="Gachi">
            <i class="fa-solid fa-location-dot"></i> Gachi</span>
          <span data-location="Moromo">
            <i class="fa-solid fa-location-dot"></i> Moromo</span>
          <span data-location="venir10">
            <i class="fa-solid fa-location-dot"></i> venir10</span>
        </div> -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end of modal location -->
<!-- modal services -->
<div class="modal-overlay" id="modal-services">
  <div class="popup">
    <header>
      <span>
        <i class="fa-solid fa-scissors"></i>
        Services
      </span>
      <div class="close"><i class="uil uil-times"></i></div>
    </header>
    <div class="content">
      <div class="list">
        <?php foreach ($categories as $category) { ?>

          <span><input type="checkbox" value="<?= $category['title'] ?>" id="" /> <?= html_escape($category['title']) ?> </span>

        <?php } ?>
      </div>
      <button class="btn">Ajouter</button>
    </div>
  </div>
</div>
<!--end of modal services -->
<!-- modal alert  -->
<div class="modal-overlay" id="modal-danger">
  <div class="popup">
    <header>
      <span>
        <i class="fa-solid fa-circle-exclamation"></i> Espace adresse
      </span>
      <div class="close"><i class="uil uil-times"></i></div>
    </header>
    <div class="content">
      <p>
        s'il vous plait veillez entrer une adresse pour que nous puissions vous
        mettre en contact avec les meilleur coiffeur de votre region
      </p>
    </div>
  </div>
</div>
<!-- end of modal alert -->
<!-- succes alert  -->
<div id="modal-success">
  <div class="container">
    <span><i class="fa-solid fa-circle-check"></i> ajouter avec succes</span>
  </div>
</div>
<!-- end of succes alert -->

<div class="modal-overlay" id="modal-session">
  <div class="popup">
    <header>
      <span>
        <i class="fa-solid fa-circle-exclamation"></i> votre session a expirée
      </span>
      <div class="close"><i class="uil uil-times"></i></div>
    </header>
    <div class="btn-container">
      <button class="btn">ok</button>
    </div>
  </div>
</div>