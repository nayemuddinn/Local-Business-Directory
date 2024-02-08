<?php
session_start();
if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../CSS/login.css">
  <link rel="stylesheet" href="../CSS/home.css">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>

  <header>
    <div style="display: block;">
      <img src="../Assets/logo.png" />
      <p>
      <h4>Local Business Directory</h4>
      </p>
    </div>
    <nav class="navigation">

      <a href="dashboard.php">Dashboard</a>

      <div class="dropdown-container">
        <a href="">Inventory </a>
        <div class="dropdown-content">
          <a href="searchProduct.php">Search Product</a>
          <a href="addProduct.php">Add Product</a>
          <a href="updateProduct.php">Update Product</a>
        </div>
      </div>

      <a href="Bill.php">Bill</a>
      <a href="Customer.php">Customers</a>
      <a href="Profile.php">Profile</a>

    </nav>
    <a href="logout.php"> <button class="btnLogin-popup">Log out</button></a>
  </header>

  <div class="homewrap">
    <p>Welcome to local business directory website</p>
  </div>

</body>

</html>