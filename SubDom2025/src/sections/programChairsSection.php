<!-- ======= Start Pogram Chairs Section ======= -->
<section
  id="pChairs"
  class="p-5 text-center"
  style="max-width: 1300px; margin: auto">
  <h1 class="d-inline-block">PROGRAM CHAIRS</h1>
  <div class="d-flex justify-content-center py-3">
    <div class="testimonial3 py-5">
      <!-- 
        <div class="row justify-content-center">
          <div class="col-md-8 text-center">
            <h4 class="mb-3">Check what our Customers are Saying</h4>
            <h6 class="subtitle font-weight-normal">You can relay on our amazing features list and also our customer services will be great experience for you without doubt</h6>
          </div>
        </div> 
      -->

      <div class="container">
        <div class="testi3 row justify-content-center">
          <?php
          include("src/objects/programChairs.php");
          foreach ($programChairs as $person) {
            renderCard($person["first_name"], $person["last_name"], $person["title"], $person["university"], $person["br"]);
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ======= End Pogram Chairs Section ======= -->