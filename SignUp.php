<!DOCTYPE html>
<?php
if(isset($_SESSION['status'])) {
	echo "<h4>".$_SESSION['status']."<h4>";
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
    <link rel="stylesheet" href="assets/js/main.js" />
    <link rel="stylesheet" href="assets/js/mains.js" />

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
          <a href="SignIn.php" class="nav-item nav-link">Sign In</a>
        </div>
      </div>
    </nav>
    <div class="content">
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-6">
            <img src="assets/image/img1.png" alt="Image" class="img-fluid" />
          </div>
          <?php
            require('dbcon.php');
            session_start();
            if (isset($_POST['username'])) {
                $username = stripslashes($_REQUEST['username']);  
                $username = mysqli_real_escape_string($con, $username);
                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($con, $password);
                $query    = "SELECT * FROM `users` WHERE username='$username'
                            AND password='" . md5($password) . "'";
                $result = mysqli_query($con, $query) or die(mysql_error());
                $rows = mysqli_num_rows($result);
                if ($rows == 1) {
                    $_SESSION['username'] = $username;
                    header("Location: dash/index.php");
                } else {
                    echo "<div class='form'>
                          <h3>Incorrect Username/password.</h3><br/>
                          <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                          </div>";
                }
            } else {
        ?>
          <div class="col-md-6 contents">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="mb-4">
                  <h3>Sign Up</h3>
                </div>
                <form class="form" name ="SignUp" method="post">
                  <div class="form-group first">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" />
                  </div>

                  <div class="form-group last">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" />
                  </div>
                  <input
                    type="submit"
                    value="Register"
                    name="signup"
                    class="btn btn-block btn-primary"
                  />
                  </div>
                </form>
                <?php } ?>
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
