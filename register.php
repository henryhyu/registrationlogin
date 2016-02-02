<?php
require_once 'load.php';
$j->register('login.php');
?>

<html>
<head>
	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
	<link rel="stylesheet" href="css/registerstyle.css">
	<title> Register Form </title>
</head>

<body>
	<div class="register-container">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-register" method="post">
			<ul class="register-nav">
				<li class="register-nav__item">
					<a href="login.php">Sign In</a>
				</li>
				<li class="register-nav__item active">
					<a href="register.php">Sign Up</a>
				</li>
			</ul>
			<label for="register-input-name" class="register__label">
				Name
			</label>
			<input id="register-input-name" type="text" name="name" class="register__input" placeholder="John Doe" required=""/>

			<label for="register-input-user" class="register__label">
				Username
			</label>
			<input id="register-input-user" type="text" name="username" class="register__input" placeholder="johndoe" required=""/>

			<label for="register-input-password" class="register__label">
				Password
			</label>
			<input id="register-input-password" type="password" name="password" class="register__input" placeholder="password123" required=""/>

			<label for="register-input-password" class="register__label">
				Retype Password
			</label>
			<input id="register-input-password" type="password" name="repassword" class="register__input" placeholder="password123" required=""/>

			<label for="register-input-email" class="register__label">
				Email
			</label>
			<input id="register-input-email" type="text" name="email" class="register__input" placeholder="johndoe@domain.com" type="email" required=""/>

			<label for="register-input-birthday" class="register__label">
				Birthday
			</label>
			<input id="register-input-birthday" type="text" name="birthday" class="register__input" placeholder="January 1st, 2000" required=""/>

			<label for="register-input-gender" class="register__label">
				Gender
			</label>
			<input id="register-input-gender" type="text" name="gender" class="register__input" placeholder="Male" required=""/>

			<label for="register-input-phone" class="register__label">
				Phone Number
			</label>
			<input id="register-input-phone" type="text" name="phone" class="register__input" placeholder="408-123-4567" required=""/>
			<input type="hidden" name="date" value="<?php echo time(); ?>" /> <br><br><br>

			<button type="submit" value="register" class="register__submit"> Register! </button>
		</form>

	</div>

</body>
</html>
