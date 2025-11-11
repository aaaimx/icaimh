<?php
function renderCard($firstName, $lastName, $title, $university, $br)
{
?>
  <div class="col-lg-3 col-md-6">
    <div class="col my-3 min-size">
      <div class="card card-shadow border-0 h-100">
        <div
          class="card-body d-flex flex-column justify-content-evenly">
          <div
            class="d-block pt-4 d-md-flex flex-column align-items-center justify-content-evenly">
            <h6 class="mb-0 customer line-height">
              <?php echo $firstName ?><br /><?php echo $lastName ?>
            </h6>
            <?php if (isset($title)) { ?>
              <p class="my-2"><?php echo $title ?></p>
            <?php } ?>
            <div class="mb-0 d-flex align-items-center info-text">
              <p class="w-100 mb-0">
                <?php echo $university ?>
                <?php if (isset($br)) { ?>
                  <br /><?php echo $br ?>
                <?php } ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>