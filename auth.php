<?php 
session_start();
include('dbcon.php');
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;

if(isset($_SESSION['verified_user_id'])) {
	$uid = $_SESSION['verified_user_id'];
	$idTokenString = $_SESSION['idTokenString'];

	try {
    $verifiedIdToken = $auth->verifyIdToken($idTokenString);
		
} catch (InvalidToken $e) {
    echo 'The token is invalid: '.$e->getMessage();
		$_SESSION['status'] = "Token Invalid";
		header("Location: logout.php");
		exit();
}catch (InvalidToken $e) {
		echo 'The token couldd not be parsed '.$e->getMessage();	
}		
	
} else {
	$_SESSION['status'] = "Login to acces dashboard";
	header("Location: SignIn.php");
	exit();
}

?>