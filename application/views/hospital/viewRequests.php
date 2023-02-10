<div class="container">
<h3 class="mb-3">Blood Requested by receivers</h3>
<?php
foreach ($data as $val) { ?>
  <div class="card mt-4">
  <h5 class="card-header text-danger"><?= $val['blood_group'] ?></h5>
  <div class="card-body">
    <!-- <h5 class="card-title"><?= $val['blood_group'] ?></h5> -->
    <p class="card-text"><?= $val['name'] ?> Request for <?= $val['blood_group'] ?> Blood</p>
    <a href="tel:<?= $val['contact'] ?>" class="btn btn-danger"><?= $val['contact'] ?></a>
  </div>
  </div>
<?php } ?>

</div>