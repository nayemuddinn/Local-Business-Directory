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

            <div class="dropdown-container">
                <a href="">Inventory </a>
                <div class="dropdown-content">
                    <a href="searchProduct.php">Search Product</a>
                    <a href="addProduct.php">Add Product</a>
                    <a href="Customer.html">Update Product</a>
                </div>
            </div>

            <a href="Bill.html">Bill</a>
            <a href="Customer.html">Customers</a>
            <a href="Profile.html">Profile</a>

        </nav>
        <a href="logout.php"> <button class="btnLogin-popup">Log out</button></a>
    </header>

    <main class="main_wrap" style="padding-top: 50px;">
        <h1 style="color:#ffffff;margin-left:40%; margin-bottom: 50px;">Update Item</h1>
        <div style="margin-left:280px">
            <div class="wrap" style="margin-right:300px; margin-top:10px">
                <div class="search">
                    <input type="text" class="searchTerm" placeholder="Search Product">
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>

        <?php

        include 'db_connection.php';

        if (isset($_POST['additem'])) {
            $name = $_POST['productname'];
            $price = $_POST['productprice'];
            $quantity = $_POST['quantity'];
            $unit = $_POST['unit'];
            $category = $_POST['productcategory'];

            $verify_query = mysqli_query($conn, "SELECT productName FROM inventory WHERE productName='$name'");
            if (mysqli_num_rows($verify_query) != 0) {
                echo "<div class='message'>
      <p>Product Already Exist!</p>
  </div> <br>";
                echo "<a href='addproduct.php'><button class='btn'>Go Back</button>";
            } else {

                $conn->begin_Transaction();
                try {
                    $conn->query("INSERT INTO inventory(ProductName,ProductCategory,price,available,unit) VALUES('$name','$category','$price','$quantity','$unit')") or die("Erroe Occured");
                    $conn->commit();
                    echo "<div class='message'>
        <p>Added successfully!</p>
    </div> <br>";
                    echo "<a href='addproduct.php'><button class='btn'>Go Back</button>";
                } catch (Exception $e) {
                    echo "<div class='message'>
        <p>Failed to Add Product !</p>
    </div> <br>";
                    echo "<a href='addproduct.php'><button class='btn'>Try Again</button>";
                    $conn->rollback();
                }
            }
        } else {
            ?>

            <body>
                <form method="POST"
                    style="display: grid; grid-template-columns: repeat(2,1fr);gap: 20px; padding-left: 50px;" action="">


                    <div class="input-box">
                        <input type="text" style="margin-left: 30px;" name="productname" autocomplete="off" required>
                        <label style="color:#ffffff; font-size:1.2em; font-weight: 700;" for="name">Product Name</label>
                    </div>

                    <div class="input-box">
                        <input type="text" style="margin-left: 15px;" id="productprice" name="productprice" maxlength="10"
                            autocomplete="off" required>
                        <label style="color:#ffffff; font-size:1.2em; font-weight: 700;" for="productID">Product
                            Price</label>
                    </div>

                    <div class="input-box">
                        <input type="number" style="margin-left: 10px;" name="quantity" id="quantity" min="1" max=""
                            autocomplete="off" required>
                        <label style="color:#ffffff; font-size:1.2em; font-weight: 700;" for="name">Available
                            Product</label>
                    </div>

                    <div class="input-box">
                        <input type="text" style="margin-left: 5px;" name="unit" id="unit" autocomplete="off" required>
                        <label style="color:#ffffff; font-size:1.2em; font-weight: 700;" for="unit">Product Unit</label>
                    </div>
                    <div style="  margin-left: 250px;margin-top: 15px;" class="Ucenter">
                        <button type="submit" class="tbtn" name="additem" id="additem">Update</button>
                    </div>

                    <div style="margin-top: 16px;" class="Dcenter">
                        <button class="dbtn">Delete</button>
                    </div>
                </form>
            </body>

        <?php } ?>
    </main>
</body>

</html>