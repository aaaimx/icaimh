<?php
function renderCfpCard($title, $children)
{
?>
  <div class="card mb-4">
    <?php if (isset($title)) { ?>
      <div class="card-header bg-primary text-white">
        <h2 class="h4 mb-0"><?= $title ?></h2>
      </div>
    <?php } ?>
    <div class="card-body">
      <?php echo $children; ?>
    </div>
  </div>
<?php
}
