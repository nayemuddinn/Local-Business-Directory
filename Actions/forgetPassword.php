<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Business Directory</title>
    <link rel="stylesheet" href="../CSS/login.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>

<?php
include 'db_connection.php';

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $pin = $_POST['pin'];
    $password = $_POST['password'];
    
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $hashed_pin = password_hash($pin, PASSWORD_DEFAULT);

    $result = mysqli_query($conn, "SELECT * FROM users WHERE Email='$email' and PIN=$pin") or die("Select Error");
    $row = mysqli_fetch_assoc($result);

    if ($row) {

        echo'kutta';
        $query = "UPDATE users SET password='$hashed_password' WHERE email='$email'";

        if ($conn->query($query) === TRUE) {
            echo "<div class='center'> 
                 <p style='color:white; font-size:1.3em;'>Reset Successfully !</p><a href='login.php'><button class='GoBack-btn'>Login Now</button>
                 </div>";
        } else {
            echo "<div class='center'> 
                 <p style='color:white; font-size:1.3em;'>Failed to Reset Password !</p><a href='forgetPassword.php'><button class='GoBack-btn'>Try Again !</button>
                 </div>";
        }
    } else {
        echo "<div class='message'>
        <p>No user Found</p>
        <br> <br> <br>
        <div>";
        echo "<div> <a href='forgetPassword.php'><button class='GoBack-btn'>Go Back</button>
        </div>";
    }
} else {
?>
        <header>
        <div style="display: block;">
            <img src="../Assets/logo.png" />
            <p>
            <h4>Local Business Directory</h4>
            </p>
        </div>
        </header>

        <div class="login-wrapper">

            <div class="form-box login">
                <h2>Forgot Password</h2>
                <form action="" method="post">

                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                        <input type="email" name="email" id="email" autocomplete="off" required>
                        <label>Email</label>
                    </div>

                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                        <input type="password" name="pin" id="pin" autocomplete="off" required>
                        <label>Pin</label>
                    </div>

                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                        <label>New Password</label>
                    </div>

                    <div><br></div>
                    <button type="submit" class="btn" name="login">Submit</button>

                </form>

                <div class="register-link">
                    <a href="registration.php" class="register-link"> Don't have an account?</a>
                </div>
            </div>
        <?php } ?>
    </div>

</body>

</html>