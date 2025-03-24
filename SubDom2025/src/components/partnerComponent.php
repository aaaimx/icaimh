<?php
function renderPartner($name, $img, $url)
{
?>
  <div class="col-md-4 my-4">
    <div class="card h-100 inactive">
      <div class="card-body d-flex align-items-center">
        <h4 class="card-title w-100">
          <?php echo $name; ?>
        </h4>
      </div>
      <img
        src="<?php echo $img; ?>"
        class="img-fluid card-img-to rounded-top p-3 max-image"
        alt="<?php echo $name; ?>" />
      <div
        class="card-body d-flex flex-column align-items-center justify-content-end">
        <!-- <p>Text template</p> -->
        <a
          href="<?php echo $url; ?>"
          target="_blank"
          class="btn btn-success">
          <i class="fa-solid fa-link" style="margin-right: 10px"></i>Visit website</a>
      </div>
    </div>
  </div>
<?php
}
?>