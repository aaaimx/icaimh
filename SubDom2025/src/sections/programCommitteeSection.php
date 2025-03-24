<!-- Start Committee Section -->
<section class="p-5 text-center" style="max-width: 1300px; margin: auto">
  <h1 class="d-inline-block">PROGRAM COMMITTEE</h1>
  <br />
  <h5 class="d-inline-block testimonial3">(Tentative)</h5>
  <div class="d-flex justify-content-center py-3">
    <div class="container testimonial3 py-5">
      <div class="testi3 row">
        <?php
        include("src/objects/programCommittes.php");
        foreach ($programCommittee as $person) {
          renderCard($person["first_name"], $person["last_name"], $person["title"], $person["university"], $person["br"]);
        }
        ?>
      </div>
    </div>
  </div>
</section>
<!-- End Committee Section -->