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

  <header>
    <h2 class="logo">Logo</h2>
  </header>

  <div class="registration-wrapper">
    <div class="form-box login">


      <?php

      include 'db_connection.php';

      if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $verify_query = mysqli_query($conn, "SELECT Email FROM users WHERE Email='$email'");
        if (mysqli_num_rows($verify_query) != 0) {
          echo "<div class='message'>
            <p>This email is used, Try another One Please!</p>
        </div> <br>";
          echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
        } else {

          mysqli_query($conn, "INSERT INTO users(Name,Email,Password,Phone,Address) VALUES('$name','$email','$password','$phone','$address')") or die("Erroe Occured");

          echo "<div class='message'>
              <p>Registration successfully!</p>
          </div> <br>";
        


        }
      } else {

        ?>
        <h2>Registration</h2>
        <form action="" method="post">

          <div class="input-box">
            <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
            <input type="text" name="name" id="name" autocomplete="off" required>
            <label>Name</labe1>
          </div>

          <div class="input-box">
            <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
            <input type="text" name="email" id="email" autocomplete="off" required>
            <label>Email</label>
          </div>

          <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
            <input type="password" name="password" id="password" autocomplete="off" required>
            <label>Password</label>
          </div>

          <div class="input-box">
            <span class="icon"><ion-icon name="call-outline"></ion-icon></ion-icon></span>
            <input type="text" name="phone" id="phone" autocomplete="off" required>
            <label>Phone</label>
          </div>

          <div class="input-box">
            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
            <input type="text" name="address" id="address" autocomplete="off" required>
            <label>Address</label>
          </div>

          <div class="remember-forgot">
            <a href="#">Forgot Password?</a>
          </div>

          <div>
            <input type="submit" class="btn" name="register" value="Register" required>
          </div>


        </form>

        <div class="register-link">
          <a href="login.php" class="register-link"> Already have an account?</a>
        </div>
      </div>
    <?php } ?>
  </div>



</body>

</html>