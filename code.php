<?php 
session_start();
include('dbcon.php');

if(isset($_POST['signup'])) {
	$email = $_POST['inputEmail'];
	$password = $_POST['inputPassword'];
}

	$userProperties = [
    'email' => $email,
    'emailVerified' => false,
    'password' => $password,
];

$createdUser = $auth->createUser($userProperties);
if($createUser) {
	$_SESSION['status'] = "Successfully Sign Up";
	header("Location: SignIn.php");
} else {
		$_SESSION['status'] = "User has not been Sign Up";
	header("Location: SignUp.php");
}
?>