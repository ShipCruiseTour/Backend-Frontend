<nav class="navbar navbar-expand-lg navbarMe">
  <div class="container-fluid containerME">
    <a class="navbar-brand logo" href="<?php echo URLROOT; ?>"><img src="<?= URLROOT ?>image/ShipCruiseTour.png" alt="logo" class="logoImg"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav mx-auto ulMe">
        <a class="nav-link active" href="<?php echo URLROOT; ?>">Home</a>
        <a class="nav-link active" href="<?php echo URLROOT; ?>cruises/about">About</a>
        <a class="nav-link active" href="<?php echo URLROOT; ?>cruises/place">My place<b></b></a>
        <a class="nav-link active" href="<?php echo URLROOT; ?>cruises/contact">Contact Us</a>
      </div>
      <div style="margin-left: 0px !important;" class="navbar-nav ms-auto ulMe">
        <a class="nav-link dropdown-toggle aliMe" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa fa-user"></i>
        </a>
        <ul class="dropdown-menu dropMe">
          <?php if(isset($_SESSION['user_id'])): ?>
            <li><a class="dropdown-item aliMe" href="<?= URLROOT?>cruises/reservationCle">Vos Reservation</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item aliMe" href="<?= URLROOT?>users/logout">Logout</a></li>
            <?php else: ?>
          <li><a class="dropdown-item aliMe" href="<?= URLROOT?>users/login">Login</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item aliMe" href="<?= URLROOT?>users/register">Signup</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
</nav>