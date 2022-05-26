<!DOCTYPE html>
<?php
if(isset($_SESSION['status'])) {
	echo "<h4 class='alert alert success'>".$_SESSION['status']."<h4>";
	unset($_SESSION['status']);
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/fonts/icomoon/style.css" />
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/navbar.css" />
    <link rel="stylesheet" href="assets/js/mains.js" />
    <link rel="stylesheet" href="assets/js/main.js" />
    <title>Jadwalin</title>
  </head>

  <body>
    <nav class="navbar navbar-expand-xl navbar-light bg-light mx-5 mt-3 bg-transparent">
      <a href="index.php" class="navbar-brand">Jadwalin</a>
      <button
        type="button"
        class="navbar-toggler"
        data-toggle="collapse"
        data-target="#navbarCollapse"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ml-auto">
          <a href="SignUp.php" class="nav-item nav-link">Sign Up</a>
        </div>
      </div>
    </nav>
    <div class="content">
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-6">
            <img src="assets/image/img1.png" alt="Image" class="img-fluid" />
          </div>
          <div class="col-md-6 contents">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="mb-4">
                  <h3>Sign In</h3>
                </div>
                <form action="lcode.php" method="post">
                  <div class="form-group first">
                    <label for="username">Email</label>
                    <input type="text" class="form-control" name="inputEmail" />
                  </div>
                  <div class="form-group last mb-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="inputPassword" />
                  </div>

                  <input
                    type="submit"
                    value="Log In"
                    name="signin"
                    class="btn btn-block btn-primary"
                  />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
