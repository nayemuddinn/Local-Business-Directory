< ?php
session_start();
unset($_SESSION['valid']);  
session_destro();
header("Location: login.php");
?>