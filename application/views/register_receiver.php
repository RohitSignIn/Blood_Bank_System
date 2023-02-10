<form id="register_receiver" class="container mt-4" action="">
    <h3 class="mb-3">Register as receiver</h3>
        <div class="input-group mb-3">
            <span class="input-group-text" id="username">Name</span>
            <input type="text" class="form-control" placeholder="Full Name" required name="username">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="email">Email</span>
            <input type="email" class="form-control" placeholder="Email" required name="email">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="contact">Contact</span>
            <input type="number" class="form-control" placeholder="Contact" required name="contact">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="password">Password</span>
            <input type="password" class="form-control" placeholder="Password" required name="password">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="confirm_password">Confirm Password</span>
            <input type="password" class="form-control" placeholder="Confirm password" required name="confirm_password">
        </div>
        <button type="submit" class="btn btn-danger">Register</button>
</form>