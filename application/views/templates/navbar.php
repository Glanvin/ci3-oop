<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">

    <a class="navbar-brand" href="<?= base_url('HomeController') ?>">CI3 OOP Project</a>
    <div class="dropdown ms-auto order-lg-3">
      <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="<?= base_url('assets/images/profile.webp') ?>" class="img-fluid rounded-circle shadow" alt="profile_picture" width="32" height="32">
        <span class="d-none d-lg-inline ms-2"><?= $username ?></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-end shadow">
        <li><a class="dropdown-item" href="#">My Profile</a></li>
        <li><a class="dropdown-item" href="#">Account Settings</a></li>
        <li><hr class="dropdown-divider"></li>
        <li>
          <a class="dropdown-item text-danger" href="<?= site_url('auth/signout') ?>">Sign Out</a></li>
      </ul>
    </div>

    <button class="navbar-toggler ms-2 order-lg-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-lg-2" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if($currentPage == 'home') echo "active"?>" href="<?= base_url('HomeController') ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($currentPage == "events") echo 'active'?>" href="<?= base_url('HomeController') ?>">Events</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link <?php if($currentPage == "admin") echo 'active'?>" href="<?= base_url('AdminController') ?>">Admin</a>
        </li>
      </ul>
    </div>

  </div>
</nav>