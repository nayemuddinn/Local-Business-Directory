<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Inventory</title>
    <link rel="stylesheet" href="../CSS/home.css">
    <link rel="stylesheet" href="../CSS/profile.css">
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

            <a href="Bill.html">Bill</a>
            <a href="Customer.php">Customers</a>
            <a href="Profile.php">Profile</a>

        </nav>
        <a href="logout.php"> <button class="btnLogin-popup">Log out</button></a>
    </header>

    <div style="display:flex; justify-content: space-between;">

        <main class="main_wrap" style="padding-top: 50px;">

            <h1 style="color:#ffffff;margin-left:40%; margin-bottom: 100px;">Profile</h1>

            <?php

            session_start();
            $email = $_SESSION['valid'];

            include 'db_connection.php';

            $query = "SELECT * FROM users WHERE email='$email'";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $row) {
                    ?>

                    <body>
                        <form action="" method="post">
                            <div style=" margin-left:50px">
                                <div class="input-box">
                                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                                    <input type="text" name="name" id="name" value="<?= $row['Name']; ?>">
                                    <label>Name</labe1>
                                </div>

                                <div class="input-box">
                                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                                    <input type="email" name="email" autocomplete="off" value="<?= $row['Email']; ?>">
                                    <label>Email</label>
                                </div>

                                <div class="input-box">
                                    <span class="icon"><ion-icon name="call-outline"></ion-icon></ion-icon></span>
                                    <input type="text" name="phone" id="phone" value="<?= $row['Phone']; ?>">
                                    <label>Phone</label>
                                </div>

                                <div class="input-box">
                                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                                    <input type="text" name="address" id="address" value="<?= $row['Address']; ?>">
                                    <label>Address</label>
                                </div>


                                <div>
                                    <input type="submit" class="btn" name="update" value="Update" required>
                                </div>

                            </div>
                        </form>
                    </body>
                    <?php
                }
            }
            ?>

        </main>



        <main class="main_wrap2" style="padding-top: 50px;">

            <h1 style="color:#ffffff;margin-left:40%; margin-bottom: 100px;">Change Password</h1>

            <form action="" method="post">
                <div style=" margin-left:50px">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                        <input type="password" name="cpass" id="cpass" autocomplete="off" required>
                        <label>Current Password</labe1>
                    </div>

                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                        <input type="password" name="npass" id="npass" autocomplete="off" required>
                        <label>New Password</label>
                    </div>

                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <input type="password" name="cnoass" id="cnpass" autocomplete="off" required>
                        <label>Confirm New Password</label>
                    </div>

                    <div>
                        <input type="submit" class="btn" name="update" value="Update" required>
                    </div>

                </div>


            </form>


        </main>

    </div>
</body>

</html>