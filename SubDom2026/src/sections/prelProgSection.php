<!-- Start Schedule Section -->
<?php
include("src/objects/modules_day_one.php");
include("src/objects/modules_day_two.php");
include("src/objects/modules_day_three.php");
?>

<head>
  <link rel="stylesheet" href="src/css/schedule.css">
</head>
<section id="schedule" class="section-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h1>SCHEDULE</h1>
    </div>

    <ul
      class="nav nav-tabs"
      role="tablist"
      data-aos="fade-up"
      data-aos-delay="100">
      <li class="nav-item">
        <a
          class="nav-link active"
          href="#day-1"
          role="tab"
          data-bs-toggle="tab">1-JULY</a><br />
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#day-2" role="tab" data-bs-toggle="tab">2-JULY</a><br />
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#day-3" role="tab" data-bs-toggle="tab">3-JULY</a><br />
      </li>
    </ul>

    <h3 class="sub-heading"></h3>

    <div
      class="tab-content row justify-content-center"
      data-aos="fade-up"
      data-aos-delay="200">
      <div
        role="tabpanel"
        class="col-lg-7 tab-pane fade show active"
        id="day-1">
        <div class="schedule">
          <?php foreach ($modules_day_one as $module) { ?>
            <div class="time-slot"><?php echo htmlspecialchars($module['time_start']); ?></div>
            <div class="session <?php echo htmlspecialchars($module['color']); ?>">
              <h3><?php echo htmlspecialchars($module['session']); ?></h3>
              <?php if (isset($module['speaker'])) { ?>
                <span><?php echo htmlspecialchars($module['time_start']); ?> - <?php echo htmlspecialchars($module['time_end']); ?></span>
                <span><?php echo htmlspecialchars($module['speaker']); ?></span>
              <?php } ?>
            </div>
          <?php } ?>
        </div>
      </div>
      <div role="tabpanel" class="col-lg-7 tab-pane fade" id="day-2">
        <div class="schedule">
          <?php foreach ($modules_day_two as $module) { ?>
            <div class="time-slot"><?php echo htmlspecialchars($module['time_start']); ?></div>
            <div class="session <?php echo htmlspecialchars($module['color']); ?>">
              <h3><?php echo htmlspecialchars($module['session']); ?></h3>
              <?php if (isset($module['speaker'])) { ?>
                <span><?php echo htmlspecialchars($module['time_start']); ?> - <?php echo htmlspecialchars($module['time_end']); ?></span>
                <span><?php echo htmlspecialchars($module['speaker']); ?></span>
              <?php } ?>
            </div>
          <?php } ?>
        </div>
      </div>
      <div role="tabpanel" class="col-lg-7 tab-pane fade" id="day-3">
        <div class="schedule">
          <?php foreach ($modules_day_three as $module) { ?>
            <div class="time-slot"><?php echo htmlspecialchars($module['time_start']); ?></div>
            <div class="session <?php echo htmlspecialchars($module['color']); ?>">
              <h3><?php echo htmlspecialchars($module['session']); ?></h3>
              <?php if (isset($module['speaker'])) { ?>
                <span><?php echo htmlspecialchars($module['time_start']); ?> - <?php echo htmlspecialchars($module['time_end']); ?></span>
                <span><?php echo htmlspecialchars($module['speaker']); ?></span>
              <?php } ?>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- End Schedule Section -->