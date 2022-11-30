<!-- handle with javascript  in searchForm.js-->
<form class="home-form" method="GET" action="<?= DOC_ROOT ?>search/">
 <div class="field field-except">
  <input type="text" value="" data-id="location" id="location-input" name="location" placeholder="Emplacement" autocomplete="off" readonly="readonly" />
  <div class="icons">
   <i class="fa-solid fa-location-dot"></i>
   <i class="uil uil-times"></i>
  </div>
 </div>
 <div class="field field-except">
  <input type="text" value="" data-id="services" class="services-field" id="services-input" name="services" placeholder="Enter services" autocomplete="off" readonly="readonly" />
  <div class="icons">
   <i class="fa-solid fa-scissors"></i>
   <i class="uil uil-times"></i>
  </div>
 </div>
 <div class="field field-date">
  <input type="date" value="" data-id="date" id="search-day" min='' name="day" lang="fr-CA" placeholder="Enter day" />
  <div class="icons">
   <i class="fa-solid fa-calendar-days"></i>
   <i class="uil uil-times"></i>
  </div>
 </div>
 <div class="field search">
  <button class="btn" type="submit">search</button>
 </div>
</form>