<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../CSS/login.css">
  <link rel="stylesheet" href="../CSS/home.css">
  <link rel="stylesheet" href="../CSS/bill.css">
  <link rel="stylesheet" href="../CSS/billtable.css">
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


  <div>
    <main class="main_wrap">
      <h1 style="padding-top:15px;margin-top:100px; color:#ffffff;margin-left:45%; margin-bottom: 30px;">Cart</h1>
      <div style="margin-left:80px">
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
                <table>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Available</th>
                    <th>Unit</th>
                    <th>Quantity</th>
                    <th>Add</th>
                  </tr>
                  <tr>

                    <?php
                    include 'db_connection.php';

                    if (isset($_GET['search'])) {
                      $name = $_GET['search'];

                      if (!empty($name)) {

                        $sql = "SELECT * FROM inventory where productID='$name' or productName LIKE '%" . $name . "%'";

                        $result = $conn->query($sql);
                        $result2 = $conn->query($sql);
                        $res = mysqli_fetch_assoc($result2);


                        if ($res == 0) {
                          echo "<div>  <p style='margin-top:50px;color:white; font-weight:400;font-size:1.3em'>Not Result Found!</p> </div> <br>";

                        } else {
                          while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <form action=" " method="POST">
                              <td>
                                <input
                                  style="border-color:transparent;text-align:center;max-width: 30px;background:transparent;color:white;"
                                  type="text" name="pid" autocomplete="off" value="  <?php echo $row['productID']; ?>"></input>
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
                              <td>
                                <input type="number"
                                  style="color:white;font: size 1em; background:transparent;max-width:80px; text-align:center;"
                                  name="quantity" value="1" min="1" max="" autocomplete="off" required>

                              </td>
                              <td>

                                <input type="submit" class="tbtn" name="add" value="Add"></input>

                              </td>
                          </tr>
                          </form>
                          <?php
                          }
                        }
                      }
                    }

                    ?>

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php

      include 'db_connection.php';

      if (isset($_POST['add'])) {

        $id = $_POST['pid'];
        $quantity = $_POST['quantity'];


        $sql = "SELECT * FROM cart where productID='$id'";
        $res = $conn->query($sql);
        $res2 = $conn->query($sql);
        $res3 = $conn->query($sql);
        $ro = mysqli_fetch_assoc($res);
        $ro2 = mysqli_fetch_assoc($res2);
        $ro3 = mysqli_fetch_assoc($res3);

        $sq = "SELECT * FROM inventory where productID='$id'";
        $result = $conn->query($sq);
        $row = mysqli_fetch_assoc($result);

        $name = $row['productName'];
        $price = $row['price'];
        $totalPrice = $quantity * $price;
        $unit = $row['unit'];
        $available = $row['available'];

        if ($ro2) {
          $quantity = $quantity + $ro['Quantity'];

        }

        if ($quantity > $available)
          echo "<div>  <p style='margin-top:50px;color:white; font-weight:600;font-size:1.4em; margin-left:300px;'>Not Enough Product Available!</p> </div> <br>";
        else {

          if ($ro3) {
            $que = "delete from cart where productName='$name'";

            $conn->query($que);
          }

          $conn->begin_Transaction();
          try {
            $conn->query("INSERT INTO cart(productID,ProductName,productPrice,Quantity,unit,totalPrice) VALUES('$id','$name','$price','$quantity','$unit','$totalPrice')") or die("Erroe Occured");
            $conn->commit();
            echo "<div>  <p style='margin-top:50px;color:white; font-weight:600;font-size:1.4em; margin-left:350px;'>Added to Cart!</p> </div> <br>";

          } catch (Exception $e) {
            echo "<div class='message'>
    <p>Failed to Add Product !</p>
</div> <br>";
            $conn->rollback();
          }
        }
      }

      ?>

    </main>


 <div style="display:flex;">
    <main class="main_wrap">
      <h1 style="padding-top:15px;margin-top:50px; color:#ffffff;margin-left:45%; margin-bottom: 30px;">Cart</h1>
      <div class="container">
        <div>
          <div class="table-wrapper">
            <div>
              <div>
                <table>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>TotalPrice(BDT)</th>
                    <th>Delete</th>

                  </tr>
                  <tr>

                    <?php
                    include 'db_connection.php';

                    $sql = "SELECT * FROM cart";

                    $result = $conn->query($sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <form action=" " method="POST">
                        <td>
                          <input
                            style="text-align:center;border-color:transparent;max-width: 30px;background:transparent;color:white;"
                            type="text" name="did" autocomplete="off" value="  <?php echo $row['productID']; ?>"></input>
                        </td>
                        <td>
                          <?php echo $row['productName']; ?>
                        </td>
                        <td>
                          <?php echo $row['productPrice']; ?>
                        </td>
                        <td>
                          <?php echo $row['Quantity']; ?>
                        </td>
                        <td>
                          <?php echo $row['unit']; ?>
                        </td>
                        <td>
                          <?php echo $row['totalPrice']; ?>
                        </td>
                        <td>
                          <input type="submit" class="dbtn" name="delete" value="Delete"></input>
                        </td>
                    </tr>
                    </form>
                    <?php
                    }
                    ?>

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php

      include 'db_connection.php';

      if (isset($_POST['delete'])) {

        $did = $_POST['did'];
        $que = "delete from cart where productID='$did'";
        if ($conn->query($que) == TRUE) {
          echo "<div>  <p style='margin-top:50px;color:white; font-weight:600;font-size:1.4em; margin-left:45%;'>Deleted From Cart!</p> <a href='bill.php'><button style='margin-left:45%; margin-top:20px;' class='GoBack-btn'>Refresh</button></a></div> <br>";
        } else {
          echo "<div>  <p style='margin-top:50px;color:white; font-weight:600;font-size:1.4em; margin-left:350px;'>Failed to Delete</p> </div> <br>";
        }
      }
      ?>


    </main>

    <div>
    <input type="submit" class="dbtn" name="pay" value="Pay"></input>
    </div>
  </div>
    </div>


</body>

</html>