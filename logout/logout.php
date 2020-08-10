
<?php
session_start();
session_unset();
session_destroy();
unset($_SESSION['nim']);
unset($_SESSION['password']);

header("location: ../Login/Login.php");
die();
?>