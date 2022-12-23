<nav class="navbar navbar-expand-lg navbarMe">
  <div class="container-fluid containerME">
    <a class="navbar-brand logo" href="home.php"><img src="<?= URLROOT ?>image/ShipCruiseTour.png" alt="logo" class="logoImg"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav mx-auto ulMe">
        <a class="nav-link active" href="home.php">Dashboard</a>
        <a class="nav-link active" href="port.php">Port Control</a>
        <a class="nav-link active" href="navire.php">Navire Control<b></b></a>
        <a class="nav-link active" href="croisiere.php">Croisiere Control</a>
        <a class="nav-link active" href="reservation.php">Reservation</a>
      </div>
      <div style="margin-left: 0px !important;" class="navbar-nav ms-auto ulMe">
        <a class="nav-link dropdown-toggle aliMe" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa fa-user"></i>
        </a>
        <ul class="dropdown-menu dropMe">
            <li><a class="dropdown-item aliMe" href="../index.php">Visit Shop</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item aliMe" href="logout.php">Logout</a></li>
        </ul>
      </div>
      
    </div>
  </div>
</nav>