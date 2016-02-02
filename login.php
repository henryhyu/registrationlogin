<?php

// Print out contents of POST or GET global variables
// after a URL: ?action=logout is the GET parameters
// print_r vs. var_dump: var_dump truncates arrays that have too many elements
// print_r($_GET);
// var_dump($_POST);

	require_once('load.php'); // load.php to import all the required files
	if (isset($_GET['action'])) { // isset() function to check if the GET variable is set
		if ( $_GET['action'] == 'logout' ) { // GET method for logging out
			$loggedout = $j->logout();
	}
}
	$logged = $j->login('index.php'); // redirects to index page if logged in successfully
?>

<html>
	<head>
		<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
		<link rel="stylesheet" href="css/loginstyle.css">
		<title> User Login </title>
	</head>

	<body>
		<div>
			<?php if ( $logged == 'invalid' ) : ?>
				<p style="background: #e49a9a; border: 1px solid #c05555; padding: 7px 10px;">
					The username or password you entered is incorrect. Please try again.
				</p>
			<?php endif; ?>
			<?php
				if (isset($_GET['reg']))
					if ( $_GET['reg'] == 'true' ): ?>
				<p style="background: #fef1b5; border: 1px solid #eedc82; padding: 7px 10px;">
					You have successfully registered your account. You may now log in.
				</p>
			<?php endif; ?>
			<?php
				if (isset($_GET['action']))
					if ( $_GET['action'] == 'logout' ) :?>
				<?php if ( $loggedout == true ) : ?>
					<p style="background: #fef1b5; border: 1px solid #eedc82; padding: 7px 10px;">
						You have logged out successfully! Have a nice day! :)
					</p>
				<?php else: ?>
					<p style="background: #e49a9a; border: 1px solid #c05555; padding: 7px 10px;">
						There was a problem logging you out. :(
					</p>
				<?php endif; ?>
			<?php endif; ?>
			<?php
				if (isset($_GET['msg']))
					if ( $_GET['msg'] == 'login' ) :?>
				<p style="background: #e49a9a; border: 1px solid #c05555; padding: 7px 10px;">
						You must log in to view this content. Please log in below.
					</p>
			<?php endif; ?>

<!-- $_PHP_SELF variable contains the name of self script in which it is being called.
This variable returns the name and path of the current file (from the root folder). -->
		<div class="login-container">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-login" method="post">
				<ul class="login-nav">
					<li class="login-nav__item active">
						<a href="">Sign In</a>
					</li>
					<li class="login-nav__item">
						<a href="register.php">Sign Up</a>
					</li>
				</ul>
				<label for="login-input-user" class="login__label">
					Username
				</label>
				<input id="login-input-user" type="text" name="username" class="login__input"/>
				<label for="login-input-password" class="login__label">
					Password
				</label>
				<input id="login-input-password" type="password" name="password" class="login__input" />
				<label for="login-sign-up" class="login__label--checkbox">
					<input id="login-sign-up" type="checkbox" class="login__input--checkbox" />
					Keep me signed in
				</label>
				<button type="submit" value="Log In" class="login__submit"> Sign In </button>
			</form>
			<a href="http://www.phpgang.com/how-to-create-forget-password-form-in-php_381.html" class="login__forgot">Forgot Password?</a>
		</div>
	</body>
</html>
