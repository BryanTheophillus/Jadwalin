<?php
session_start();
unset($_SESSION['verified_user_id']);
unset($_SESSION['idTokenString']);

$_SESSION['status'] = "You Have Been Log Out";
header("Location: signin.php");
exit();
?>