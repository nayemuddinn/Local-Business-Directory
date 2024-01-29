<?php

include 'db_connection.php';

if (isset($_POST['deleteitem'])) {
    $id = $_GET['search'];


    $que = "DELETE FROM inventory WHERE productID='$id'";


    if ($conn->query($que) === TRUE) {
        echo "<div class='center'> 
<p style='color:white; font-size:1.3em;'>Deleted Successfully !</p><a href='updateProduct.php'><button class='GoBack-btn'>Go Back</button>
</div>";
    } else {
        echo "<div class='center'> 
<p style='color:white; font-size:1.3em;'>ProductDelete Failed !</p><a href='updateProduct.php'><button class='GoBack-btn'>Try Again</button>
</div>";
    }

}
?>