<?php 
session_start();
include('dbcon.php');

if(isset($_POST['signin'])) {
	$email = $_POST['inputEmail'];
	$clearTextPassword = $_POST['inputPassword'];
}

try {
    $user = $auth->getUserByEmail("$email");
		$signInResult = $auth->signInWithEmailAndPassword($email, $clearTextPassword);
	$signInResult->idToken();
	$idTokenString = $signInResult->idToken();
	try {
    $verifiedIdToken = $auth->verifyIdToken($idTokenString);
		$uid = $verifiedIdToken->claims()->get('sub');

		$_SESSION['verified_user_id'] = $uid;
		$_SESSION['idTokenString'] = $idTokenString;
		
		$_SESSION['status'] = "Login Successfully";
		header ("Location: dash/index.php");
		exit();
} catch (InvalidToken $e) {
    echo 'The token is invalid: '.$e->getMessage();
}catch (InvalidToken $e) {
		echo 'The token couldd not be parsed '.$e->getMessage();	
}

} catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
    $_SESSION['status'] = "Email Not Found";
		header("Location: SignIn.php");
		exit();
}	
	
?>