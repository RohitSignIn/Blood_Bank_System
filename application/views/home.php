<div class="container">

<form id="blood_avlbl_receiver" login="<?php if(isset($login)){ echo $login; }else{ echo ""; } ?>">
  <div class="row">
    <div class="col-sm-12 col-md-3 mb-2">
    <select class="form-select" id="select_blood_group" required name="select_blood_group">
      <option selected value="">Select Blood Group</option>
      <option value="o_pve">O Positive</option>
      <option value="o_nve">O Negative</option>
      <option value="a_pve">A Positive</option>
      <option value="a_nve">A Negative</option>
      <option value="b_pve">B Positive</option>
      <option value="b_nve">B Negative</option>
      <option value="ab_pve">AB Positive</option>
      <option value="ab_nve">AB Negative</option>
    </select>
    </div>
    <div class="col-sm-12 col-md-3 mb-2">
    <select class="form-select" id="select_state" required name="select_state">
      <option selected value="">Select State</option>
      <?php foreach($states as $val){ ?>
        <option value="<?= $val['name'] ?>" stateID="<?= $val['id'] ?>"><?= $val['name'] ?></option>
     <?php } ?>
    </select>
    </div>
    <div class="col-sm-12 col-md-3 mb-2">
    <select class="form-select" id="select_city" required name="select_city">
      <option selected value="">Select City</option>
    </select>
    </div>
    <div class="col-sm-12 col-md-3">
      <button type="submit" class="btn btn-danger">Search</button>
    </div>
  </div>
</form>

<div id="blooddtl_con"></div>

</div>
