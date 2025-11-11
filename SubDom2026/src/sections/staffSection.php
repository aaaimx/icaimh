<!-- Start Staff Section -->
<section class="p-5 text-center" style="max-width: 1300px; margin: auto" id="staff">
  <h1 class="d-inline-block">STAFF</h1>
  <!-- <br /> -->
  <!-- <h5 class="d-inline-block testimonial3">(Tentative)</h5> -->
  <div class="d-flex justify-content-center py-3">
    <div class="container testimonial3 ">
      <div class="testi3 row">
        <?php
        include("src/objects/staff.php");
        foreach ($staff as $person) {
          renderCard($person["first_name"], $person["last_name"], $person["title"], $person["university"], $person["br"]);
        }
        ?>
      </div>
    </div>
  </div>
</section>
<!-- End Staff Section -->