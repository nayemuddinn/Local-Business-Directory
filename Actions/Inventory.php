<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Inventory</title>
  <link rel="stylesheet" href="../CSS/home.css">
  <link rel="stylesheet" href="../CSS/Inventory.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

  <header>
    <h2 class="logo">Logo</h2>
    <nav class="navigation">
      <a href="dashboard.php">Dashboard</a>
      <a href="Inventory.php">Inventory</a>
      <a href="Bill.html">Bill</a>
      <a href="Customer.html">Customers</a>
      <a href="Profile.html">Profile</a>
    </nav>
    <a href="login.php"> <button class="btnLogin-popup">Log out</button></a>
  </header>

  <main class="main_wrap">
    <div style="padding-top: 20px;padding-left:70px">
      <div class="wrap" style="margin-left:100px; margin-top:20px">
        <div class="search">
          <input type="text" class="searchTerm" placeholder="What are you looking for?">
          <button type="submit" class="searchButton">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </div>

    <h1 style="color:#ffffff;margin-left:40%; margin-bottom: 100px;">Add Item Here</h1>

    <body>
      <form method="POST" style="display: grid; grid-template-columns: repeat(2,1fr);gap: 20px; padding-left: 50px;"
        action="additem.php">


        <div class="input-box">
          <input type="text" style="margin-left: 30px;" name="productname"  autocomplete="off" required>
          <label style="color:#ffffff; font-size:1.2em; font-weight: 700;" for="name">Product Name</label>
        </div>

        <div class="input-box">
          <input type="text" style="margin-left: 15px;" id="productprice" name="productprice" maxlength="10"  autocomplete="off" required>
          <label style="color:#ffffff; font-size:1.2em; font-weight: 700;" for="productID">Product Price</label>
        </div>

        <div class="input-box">
          <input type="number" style="margin-left: 10px;" name="quantity" id="quantity" min="1" max=""  autocomplete="off" required>
          <label style="color:#ffffff; font-size:1.2em; font-weight: 700;" for="name">Available Product</label>
        </div>

        <div class="input-box">
          <input type="text" style="margin-left: 5px;" name="unit" id="unit" autocomplete="off" required>
          <label style="color:#ffffff; font-size:1.2em; font-weight: 700;" for="unit">Product Unit</label>
        </div>

        <div style="margin-top:20px">
          <label style="margin-left:10px;color:#ffffff; font-size:1.2em; font-weight: 700;"
            for="productCategory">Product
            Category</label>
          <select style="margin-left: 10px;" id="productcategory" name="productcategory">
            <option value="electronics">Electronics</option>
            <option value="clothing">Clothing</option>
            <option value="grocery">Grocery</option>
            <option value="medicine">Medicine</option>
            <option value="personalcare">Personal Care</option>
            <option value="Kids">Kids</option>
            <option value="Kitchen">Kitchen</option>
            <option value="Stationary">Stationary</option>
          </select>
        </div>
        <button type="submit" class="btn" name="additem">Add Items</button>
      </form>
    </body>
  </main>
</body>

</html>