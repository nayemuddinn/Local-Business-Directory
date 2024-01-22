<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Local Business Directory</title>
  <link rel="stylesheet" href="../CSS/home.css">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>

  <header>
    <h2 class="logo">Logo</h2>
    <nav class="navigation">
      <a href="dashboard.html">Dashboard</a>
      <a href="Inventory.html">Inventory</a>
      <a href="Bill.html">Bill</a>
      <a href="Customer.html">Customers</a>
      <a href="Profile.html">Profile</a>
      <button class="btnLogin-popup">Login</button>
    </nav>
  </header>

  <div class="wrapper">

    <div class="form-box login">
      <h2>Login</h2>
      <form action="" method="post">
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

        <div class="remember-forgot">
          <a href="#">Forgot Password?</a>
        </div>

        <button type="submit" class="btn">Login</button>

      </form>

      <div class="register-link">
      <a href="register.php" class="register-link"> Don't have an account?</a>
    </div>
    </div>

   

  </div>
</body>

</html>