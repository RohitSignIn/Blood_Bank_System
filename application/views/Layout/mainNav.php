<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url(); ?>">Blood Bank System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <?php if(!isset($receiver)){ ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Register
            </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= base_url(); ?>register_hospital">Hospital</a></li>
            <li><a class="dropdown-item" href="<?= base_url(); ?>register_receiver">Receiver</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Login
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= base_url(); ?>login_hospital">Hospital</a></li>
            <li><a class="dropdown-item" href="<?= base_url(); ?>login_receiver">Receiver</a></li>
          </ul>
        </li>
        <?php }else{ ?>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= base_url() ?>logout">Logout</a>
          </li>
          <?php } ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Message Boxes -->
<div class="container mt-3">
  <div class="alert alert-success" id="success" style="display:none" role="alert">
    Success
  </div>
  <div class="alert alert-danger" id="error" style="display:none" role="alert">
    Error
  </div>
</div>