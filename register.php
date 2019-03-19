<?php
	
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");
	
	
	//include("includes/includedFiles.php");

	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>

<html>
<head>
	<title>Welcome to Pantheon!</title>

	<link rel="stylesheet" type="text/css" href="assets/css/register.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>
	<?php

	if(isset($_POST['registerButton'])) {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").hide();
					$("#registerForm").show();
				});
			</script>';
	}
	else {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").show();
					$("#registerForm").hide();
				});
			</script>';
	}

	?>
	

	<div id="background">

		<div id="loginContainer">

			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>Welcome to Pantheon</h2>
					<p>
						<?php echo $account->getError(Constants::$loginFailed); ?>
						<label for="loginUsername">Username</label>
						<input id="loginUsername" name="loginUsername" type="text" placeholder="enter username" value="<?php getInputValue('loginUsername') ?>" required autocomplete="off">
					</p>
					<p>
						<label for="loginPassword">Password</label>
						<input id="loginPassword" name="loginPassword" type="password" placeholder="enter password" required>
					</p>

					<button type="submit" name="loginButton">LOG IN</button>

					<div class="hasAccountText">
						<span id="hideLogin">Click here to register !</span>
					</div>
					
				</form>

				<form id="guestForm" action="register.php" method="POST">
					<button type="submit" name="guestButton">Guest</button>
				</form>



				<form id="registerForm" action="register.php" method="POST">
					<h2>Start a free account</h2>
					<p>
						<?php echo $account->getError(Constants::$usernameCharacters); ?>
						<?php echo $account->getError(Constants::$usernameTaken); ?>
						<label for="username">Username</label>
						<input id="username" name="username" type="text" placeholder="Enter valid username" value="<?php getInputValue('username') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$firstNameCharacters); ?>
						<label for="firstName">First name</label>
						<input id="firstName" name="firstName" type="text" placeholder="Enter valid first name" value="<?php getInputValue('firstName') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$lastNameCharacters); ?>
						<label for="lastName">Last name</label>
						<input id="lastName" name="lastName" type="text" placeholder="Enter valid Last name" value="<?php getInputValue('lastName') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$emailInvalid); ?>
						<?php echo $account->getError(Constants::$emailTaken); ?>
						<label for="email">Email</label>
						<input id="email" name="email" type="email" placeholder="e.g. Johndoe@gmail.com" value="<?php getInputValue('email') ?>" required>
					</p>

					<p>
						<label for="email2">Confirm email</label>
						<input id="email2" name="email2" type="email" placeholder="e.g. Johndoe@gmail.com" value="<?php getInputValue('email2') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
						<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
						<?php echo $account->getError(Constants::$passwordCharacters); ?>
						<label for="password">Password</label>
						<input id="password" name="password" type="password" placeholder="Your password" required>
					</p>

					<p>
						<label for="password2">Confirm password</label>
						<input id="password2" name="password2" type="password" placeholder="Your password" required>
					</p>

					<button type="submit" name="registerButton">SIGN UP</button>

					<div class="hasAccountText">
						<span id="hideRegister">Already have an account? Log in here.</span>
					</div>
					
				</form>


			</div>

			<div id="loginText">
				<h1>Protect The Culture at All Costs</h1>
				<h3>But what is exactly at Stake?</h3>
				<h2>KLEOS</h2>
				<p>
					The word is a Greek expression referenced thousands of years ago in many works from Homer’s 
					Iliad and Odyssey in which continues to hold much resonating value in present day society. 
					As Oxford classicist Spencer Klavan puts it “…The thing that you fight for or trade in your death 
					for in many cases is your Kleos. That's the closest thing you're gonna get to immortality, that 
					after you die people will talk about you. They will tell stories about you and you will live on 
					in collective memory.” At Pantheon we parallel this to our current society in which blockchain 
					can offer a decentralized, censorship resistant & immutable vessel to not only corroborate, 
					but to interact and keep the influence created by the contributors to our culture intact. 
					What oral tradition has brought to date has been filled with such rich content that stimulates us. 
					However, this process has always been susceptible to be distorted by skewed sources often dictated 
					with heavy bias from the carrier in which it was derived from or conversely not exposed to society at all. 
					Pantheon recognises how distributed ledger technology can enables us as a community of consumers, creators and curators 
					to secure culture in a manner that has never existed before. 
				</p>

				<ul>
					<li>Get rewarded for your contributions</li>
					<li>Help establish the meaning behind some of the greatest works</li>
					<li>Wager on the performance of the culture, future works & more!</li>
				</ul>
			</div>

		</div>
	</div>

</body>
</html>