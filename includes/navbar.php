<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand mx-3" style="font-size: 20px;" href="index.php"><i class="fab fa-cuttlefish" style="color: #86E3CE;"></i><i class="fab fa-autoprefixer"></i><b style="font-size: 25px;"> U </b><i class="fab fa-tumblr"></i> <i class="fab fa-github-alt"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand mx-3" style="font-size: 20px;" href="index.php"><i class="fas fa-home"></i> Home</a>
    <a class="navbar-brand mx-3" style="font-size: 20px;" href="categlog.php"><i class="fas fa-store"></i> Shop Now</a>
    <a class="navbar-brand mx-3" style="font-size: 20px;" href="installment.php"><i class="fas fa-calculator"></i> Car Calculator</a>
    <div class="collapse navbar-collapse mx-5 "  id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <?php if(isset($_SESSION['id'])){ ?>
        <li class="nav-item dropdown ml-auto">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION['name']; ?>
            <img src="img/<?php echo $_SESSION['image']; ?>" class="rounded-circle" width="30px" alt=""> 
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="booking.php">Booking List</a>
            <a class="dropdown-item" href="profile.php">Profile</a>
            <a class="dropdown-item" href="password.php">Edit Password</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="php/logout.php">Logout</a>
          </div>
        </li>
          <?php }else{ ?>
        <li class="nav-item ml-auto">
          <a class="btn btn-success px-4 mt-1 m-md-1" href="login.php" tabindex="-1" aria-disabled="true">Login</a>
        </li>
        <li class="nav-item ml-auto">
          <a class="btn btn-warning px-3 mt-1 m-md-1" href="register.php" tabindex="-1" aria-disabled="true">Register</a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </nav>
  