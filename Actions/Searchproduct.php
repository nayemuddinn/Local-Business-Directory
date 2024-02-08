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
    <title>Inventory</title>
    <link rel="stylesheet" href="../CSS/home.css">
    <link rel="stylesheet" href="../CSS/Inventory.css">
    <link rel="stylesheet" href="../CSS/tableStyles.css">
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
                    <a href="updateProduct.php">Update Product</a>
                </div>
            </div>

            <a href="Bill.php">Bill</a>
            <a href="Customer.php">Customers</a>
            <a href="Profile.php">Profile</a>

        </nav>
        <a href="logout.php"> <button class="btnLogin-popup">Log out</button></a>
    </header>


    <main class="main_wrap">
        <h1 style="margin-top:50px; color:#ffffff;margin-left:40%; margin-bottom: 50px;">Search Item Here</h1>
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



                                    if (isset($_GET['search'])) {
                                        $cat = $_GET['search'];
                                        if(empty($cat))
                                        $sql = "SELECT * FROM inventory";
                                        else{
                                        $sql = "SELECT * FROM inventory where productCategory LIKE '%" . $cat . "%' or productName LIKE '%" . $cat . "%' or productID='$cat'";
                                        }

                                    } else {
                                        $sql = "SELECT * FROM inventory";
                                    }



                                    $result = $conn->query($sql);
                                    $result2 = $conn->query($sql);
                                    $res = mysqli_fetch_assoc($result2);

                                    if ($res == 0) {
                                        echo "<div>  <p style='margin-top:50px;color:white; font-weight:400;font-size:1.3em'>Not Result Found!</p> </div> <br>";


                                    } else {

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