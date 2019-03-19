<?php
if(isset($_POST['loginButton'])) {
	//Login button was pressed
	$username = $_POST['loginUsername'];
	$password = $_POST['loginPassword'];

	$result = $account->login($username, $password);

	if($result == true) {
		$_SESSION['userLoggedIn'] = $username;
		header("Location: index.php");
	}

}

if(isset($_POST['guestButton'])) {
	//Guest button was pressed
	$username = 'Guest';
	$password = 'Guest';
	

	$result = $account->login($username, $password);

	if($result == true) {
		/*
		if(isset($_SESSION['userLoggedIn'])) {
			$username = $_POST['guest'];
		}
		*/
		header("Location: index.php");
	}

}
?>