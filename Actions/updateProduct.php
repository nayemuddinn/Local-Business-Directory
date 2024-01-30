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
                    <a href="UpdateProduct.php">Update Product</a>
                </div>
            </div>

            <a href="Bill.html">Bill</a>
            <a href="Customer.php">Customers</a>
            <a href="profile.php">Profile</a>

        </nav>
        <a href="logout.php"> <button class="btnLogin-popup">Log out</button></a>
    </header>

    <main class="main_wrap" style="padding-top: 50px;">
        <h1 style="color:#ffffff;margin-left:40%; margin-bottom: 50px;">Update Item</h1>

        <div style="margin-left:280px">
            <div class="wrap" style="margin-right:300px; margin-top:10px">
                <form action=" " method="GET">
                    <div class="search">
                        <input type="text" name="search" placeholder="Search here" class="searchTern">
                        <button type="submit" class="searchButton">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <?php

        include 'db_connection.php';

        if (isset($_GET['search'])) {
            $id = $_GET['search'];

            $query = "SELECT * FROM inventory WHERE productID='$id'";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $row) {


                    ?>

                    <body>
                        <form method="POST"
                            style="display: grid; grid-template-columns: repeat(2,1fr);gap: 20px; padding-left: 50px;" action="">


                            <div class="input-box">
                                <input type="text" style="text-align:left; font-weight:600;" name="productname"
                                    value="<?= $row['productName']; ?>">
                                <label style="color:#ffffff; font-size:1.2em; font-weight: 700;" for="name">Product Name</label>
                            </div>

                            <div class="input-box">
                                <input type="text" style="text-align:left; font-weight:600;" id="productprice" name="productprice"
                                    value="<?= $row['price']; ?>">
                                <label style="color:#ffffff; font-size:1.2em; font-weight: 700;" for="productPrice">Product
                                    Price</label>
                            </div>

                            <div class="input-box">
                                <input type="number" style="text-align:left; font-weight:600;" name="quantity"
                                    value="<?= $row['available']; ?>">
                                <label style="color:#ffffff; font-size:1.2em; font-weight: 700;" for="name">Available
                                    Product</label>
                            </div>

                            <div class="input-box">
                                <input type="text" style="text-align:left; font-weight:600;" name="unit"
                                    value="<?= $row['unit']; ?>">
                                <label style="color:#ffffff; font-size:1.2em; font-weight: 700;" for="unit">Product Unit</label>
                            </div>

                            <div style="display:flex;">
                                <form action=" " method="POST">
                                    <div style="  margin-left: 280px;margin-top: 15px;" class="Ucenter">
                                        <button type="submit" class="tbtn" name="updateitem" id="updateitem">Update</button>
                                    </div>
                                </form>
                                <form action=" " method="POST">
                                    <div style="margin-top: 16px;margin-left:15px;" class="Dcenter">
                                        <button type="submit" name='deleteitem' class="dbtn">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </form>
                    </body>
                    <?php
                }
            } else {
                echo "<div class='center'> 
                <p style='color:white; font-size:1.3em;'>Product Not Found !</p><a href='updateProduct.php'><button class='GoBack-btn'>Go Back</button>
                </div>";

            }
        }


        if (isset($_POST['deleteitem'])) {
            $ida = $_GET['search'];
            $que = "DELETE FROM inventory WHERE productID='$ida'";

            if ($conn->query($que) === TRUE) {
                echo "<div class='center'> 
                <p style='color:white; font-size:1.3em;'>Deleted Successfully !</p><a href='updateProduct.php'><button class='GoBack-btn'>Reload</button>
                </div>";
            } else {
                echo "<div class='center'> 
                <p style='color:white; font-size:1.3em;'>Failed to Delete !</p><a href='updateProduct.php'><button class='GoBack-btn'>Reload</button>
                </div>";
            }

        }





        /* if (isset($_POST['updateitem'])) {
            
        
            $name = $_GET['productname'];
            $price = $_GET['productprice'];
            $quantity = $_GET['quantity'];
            $unit = $_GET['unit'];

            $que = "UPDATE inventoryt set productName='" . $_POST['$name'] . "', price='" . $_POST['$price'] . "', available='" . $_POST['quantity'] . "' ,unit='" . $_POST['unit'] . "'";

            if ($conn->query($que) === TRUE) {
                echo "<div class='center'> 
                <p style='color:white; font-size:1.3em;'>Updated Successfully !</p><a href='updateProduct.php'><button class='GoBack-btn'>Reload</button>
                </div>";
            } else {
                echo "<div class='center'> 
                <p style='color:white; font-size:1.3em;'>Failed to Update !</p><a href='updateProduct.php'><button class='GoBack-btn'>Reload</button>
                </div>";
            }
        }  */





        ?>




    </main>
</body>

</html>