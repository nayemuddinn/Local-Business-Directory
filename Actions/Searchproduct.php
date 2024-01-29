<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Inventory</title>
    <link rel="stylesheet" href="../CSS/home.css">
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
                    <a href="Customer.html">Search Product</a>
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


    <main class="main_wrap">
        <h1 style="margin-top:50px; color:#ffffff;margin-left:40%; margin-bottom: 50px;">Search Item Here</h1>
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
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Available</th>
                                    <th>Unit</th>
                                </tr>
                                <tr>

                                    <?php
                                    include 'db_connection.php';
                                    $sql = "SELECT * FROM inventory";
                                    $result = $conn->query($sql);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <td>
                                            <?php echo $row['productID']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['productName']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['productCategory']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['price']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['available']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['unit']; ?>
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
</body>

</html>