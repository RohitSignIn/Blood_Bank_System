<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url() ?>hospital"><?= $name ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url() ?>add_blood_info">Add Blood Info</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url() ?>view_requests">View Requests</a>
        </li>  
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?= base_url() ?>logout">Logout</a>
        </li>
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