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
                    <a href="Customer.html">Update Product</a>
                </div>
            </div>

            <a href="Bill.html">Bill</a>
            <a href="Customer.html">Customers</a>
            <a href="Profile.html">Profile</a>

        </nav>
        <a href="login.php"> <button class="btnLogin-popup">Log out</button></a>
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
            <h1 class="table-title">Products</h1>

            <div style="margin-left=200px;">
                <div class="table-content">
                    <?php
                    include 'db_connection.php';
                    $sql = "SELECT * FROM inventory";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<table border='0'>
                            <th>productID</th>
                            <th align='center'>productName</th>
							<th align='center'>productCategory</th>
							<th align='center'>price</th>
							<th align='center'>available</th>
							<th align='center'>unit</th>
                        </tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                            <td>" . $row["productID"] . " " . "</td>
                            <td>" . $row["productName"] . " " . "</td>
							<td>" . $row["productCategory"] . " " . "</td>
							<td>" . $row["price"] . " " . "</td>
							<td>" . $row["available"] . " " . "</td>
							<td>" . $row["unit"] . " " . "</td>
                            
                        </tr>";
                        }

                        echo "</table>";
                    } else {
                        echo "0 results";
                    }

                    $conn->close();
                    ?>
                </div>
            </div>
        </div>




    </main>
</body>

</html>