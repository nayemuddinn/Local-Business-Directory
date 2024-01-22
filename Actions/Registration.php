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
      <h2>Registration</h2>
      <form action="" method="post">

        <div class="input-box">
          <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
          <input type="Text" required>
          <label>Name</labe1>
        </div>

        <div class="input-box">
          <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
          <input type="email" required>
          <label>Email</labe1>
        </div>

        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
          <input type="password" required>
          <label>Password</label>
        </div>

        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
          <input type="tel" required>
          <label>Phone/label>
        </div>

        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
          <input type="text" required>
          <label>Address</label>
        </div>

        <div class="remember-forgot">
          <a href="#">Forgot Password?</a>
        </div>

        <button type="submit" class="btn">Register</button>

      </form>

      <div class="register-link">
        <a href="login.php" class="register-link"> Already have an account?</a>
      </div>
    </div>



  </div>
</body>

</html>