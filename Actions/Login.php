<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Local Business Directory</title>
  <link rel="stylesheet" href="../CSS/login.css">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>

  <?php

  include 'db_connection.php';

  if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $result = mysqli_query($conn, "SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
    $row = mysqli_fetch_assoc($result);

    if (is_array($row) && !empty($row)) {
      $_SESSION['valid'] = $row['Email'];
      $_SESSION['name'] = $row['Name'];
    } else {
      echo "<div class='message'>
      <p>Wrong Username or Password</p>
      <br> <br> <br>
       <div>";
      echo "<div> <a href='login.php'><button class='GoBack-btn'>Go Back</button>
      </div>";

    }
    if (isset($_SESSION['valid'])) {
      header("Location: dashboard.php");
    }

  } else {

    ?>

    <header>
      <h2 class="logo">Logo</h2>
    </header>

    <div class="login-wrapper">

      <div class="form-box login">
        <h2>Login</h2>
        <form action="" method="post">
          <div class="input-box">
            <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
            <input type="email" name="email" id="email" autocomplete="off" required>
            <label>Email</labe1>
          </div>

          <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
            <input type="password" name="password" id="password" autocomplete="off" required>
            <label>Password</label>
          </div>

          <div class="remember-forgot">
            <a href="#">Forgot Password?</a>
          </div>

          <button type="submit" class="btn" name="login">Login</button>


        </form>

        <div class="register-link">
          <a href="registration.php" class="register-link"> Don't have an account?</a>
        </div>
      </div>


    <?php } ?>
  </div>
</body>

</html>