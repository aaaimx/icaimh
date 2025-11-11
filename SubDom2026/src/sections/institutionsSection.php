<?php
include("src/components/partnerComponent.php");
include("src/objects/organizers.php");
include("src/objects/sponsors.php")
?>
<!-- ======= Start Institutions Section ======= -->
<section
  class="px-4"
  style="max-width: 1300px; margin: auto">
  <div class="container p-4 p-md-5 text-center" id="localOrganizers">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="mb-3">LOCAL ORGANIZERS</h1>
        <!-- <img
          src="/public/img/anahuac.png"
          class="w-25 img-fluid "
          alt="..." /> -->
      </div>
    </div>
  </div>

  <div class="container text-center" id="programOrganizers">
    <h1 class="py-2">PROGRAM ORGANIZERS</h1>
    <div class="row">
      <?php
      foreach ($organizers as $organizer) {
        renderPartner($organizer["name"], $organizer["img"], $organizer["url"]);
      }
      ?>
    </div>
  </div>

  <div class="container py-5 text-center" id="sponsors">
    <h1 class="py-2">PARTNERS/SPONSORS</h1>
    <div class="row">
      <?php
      foreach ($sponsors as $sponsor) {
        renderPartner($sponsor["name"], $sponsor["img"], $sponsor["url"]);
      }
      ?>
    </div>
  </div>
</section>
<!-- ======= End Institutions Section ======= -->