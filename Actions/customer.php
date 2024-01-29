<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Inventory</title>
    <link rel="stylesheet" href="../CSS/home.css">
    <link rel="stylesheet" href="../CSS/customer.css">
    <link rel="stylesheet" href="../CSS/Inventory.css">
    <link rel="stylesheet" href="../CSS/tableStyles.css">
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
                    <a href="updateProduct.php">Update Product</a>
                </div>
            </div>

            <a href="Bill.html">Bill</a>
            <a href="Customer.php">Customers</a>
            <a href="Profile.php">Profile</a>

        </nav>
        <a href="logout.php"> <button class="btnLogin-popup">Log out</button></a>
    </header>

    <div style="display:block">

        <main class="main_wrap" style="padding-top: 50px;">

            <h1 style="color:#ffffff;margin-left:40%; margin-bottom: 30px;">Add New Customer</h1>

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
                        style="display: grid; grid-template-columns: repeat(2,1fr);gap: 20px; padding-left: 50px;"
                        action="">


                        <div class="input-box">
                            <input type="text" style="margin-left: 30px;" name="productname" autocomplete="off" required>
                            <label style="color:#ffffff; font-size:1.2em; font-weight: 700;" for="name">Customer
                                Name</label>
                        </div>

                        <div class="input-box">
                            <input type="text" style="margin-left: 15px;" id="productprice" name="productprice"
                                maxlength="10" autocomplete="off" required>
                            <label style="color:#ffffff; font-size:1.2em; font-weight: 700;" for="productID">Customer
                                Email</label>
                        </div>

                        <div class="input-box">
                            <input type="number" style="margin-left: 10px;" name="quantity" id="quantity" min="1" max=""
                                autocomplete="off" required>
                            <label style="color:#ffffff; font-size:1.2em; font-weight: 700;" for="name">Customer
                                Phone</label>
                        </div>

                        <div class="input-box">
                            <input type="text" style="margin-left: 5px;" name="unit" id="unit" autocomplete="off" required>
                            <label style="color:#ffffff; font-size:1.2em; font-weight: 700;" for="unit">Customer
                                Address</label>
                        </div>


                        <button type="submit" class="btn" name="additem" id="additem">Add Customers</button>
                    </form>
                </body>

            <?php } ?>
        </main>



        <main class="main_wrap">
            <h1 style="margin-top:50px; color:#ffffff;margin-left:40%; margin-bottom: 50px;">Search Customer Here</h1>
            <div style="margin-right:100px">
                <div class="wrap" style="margin-right:300px; margin-top:20px">
                    <div class="search">
                        <input type="text" class="searchTerm" placeholder="What are you looking for?">
                        <button type="submit" class="searchButton">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="container">
                <div>
                    <div class="table-wrapper">
                        <div>
                            <div>
                                <h2 style="color:white; font: weight 500px;">Products</h2>
                            </div>
                            <div>
                                <table>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                    </tr>
                                    <tr>

                                        <?php
                                        include 'db_connection.php';
                                        $sql = "SELECT * FROM customer";
                                        $result = $conn->query($sql);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <td>
                                                <?php echo $row['customerID']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['customerName']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['Email']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['Phone']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['Address']; ?>
                                            </td>


                                        </tr>
                                        <?php
                                        }

                                        ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div>



</body>

</html>