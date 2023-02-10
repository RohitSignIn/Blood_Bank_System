<form id="register_hospital" class="container mt-4" action="">
    <h3 class="mb-3">Register as hospital</h3>
        <div class="input-group mb-3">
            <span class="input-group-text" id="hospital_name">Hospital Name</span>
            <input type="text" class="form-control" placeholder="Enter Hospital Name" value="" required name="hospital_name">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="email">Email</span>
            <input type="email" class="form-control" placeholder="Email" value="" required name="email">
        </div>
        <div class="input-group mb-3">
            <select class="form-select" id="select_state" required name="select_state">
            <option selected value="">Select State</option>
                <?php foreach($states as $val){ ?>
                    <option value="<?= $val['name'] ?>" stateID="<?= $val['id'] ?>"><?= $val['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="input-group mb-3">
            <select class="form-select" id="select_city" required name="select_city">
                <option selected value="">Select City</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="local_address">Local Address</span>
            <input type="text" class="form-control" placeholder="Local Address" value="" required name="local_address">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="password">Password</span>
            <input type="password" class="form-control" placeholder="Password" value="" required name="password">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="confirm_password">Confirm Password</span>
            <input type="password" class="form-control" placeholder="Confirm password" value="" required name="confirm_password">
        </div>
        <button type="submit" class="btn btn-danger">Register</button>
</form>