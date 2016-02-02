<?php
	// PHP will check if the file has already been included, and if so, not include (require) it again.
	// Same function as require, which has same function as include
	// The include statement includes and evaluates the specified file.
	require_once('load.php');
	$logged = $j->checkLogin();

	if ( $logged == false ) {
		// Build the redirect
		$url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		$redirect = str_replace('index.php', 'login.php', $url);

		// Redirect to the home page
		header("Location: $redirect?msg=login");
		exit;
	} else {
		// Grab the authorization cookie array
		$cookie = $_COOKIE['joombologauth'];

		//Set the user and authID variables
		$user = $cookie['user'];
		$authID = $cookie['authID'];

		// Query the database for the selected user
		$table = 'j_users';
		$sql = "SELECT * FROM $table WHERE user_login = '" . $user . "'";
		$results = $jdb->select($sql);

		// Kill the script if the submitted username doesn't exit
		if (!$results) {
			die('Sorry, that username does not exist!');
		}

		// Fetch the results into an associative array
		$results = mysql_fetch_assoc( $results );
} ?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/indexstyle.css">
		<title>Members Only</title>
	</head>

	<body>
		<div id="particles-js"></div>
		<div id="main">
			<h3>Members Only Page</h3>
			<p><b>User Information</b></p>
			<table>
				<tr>
					<td>User ID: </td>
					<td><?php echo $results['ID']; ?></td>
				</tr>

				<tr>
					<td>Name: </td>
					<td><?php echo $results['user_name']; ?></td>
				</tr>

				<tr>
					<td>Username: </td>
					<td><?php echo $results['user_login']; ?></td>
				</tr>

				<tr>
					<td>Email: </td>
					<td><?php echo $results['user_email']; ?></td>
				</tr>

				<tr>
					<td>Birthday: </td>
					<td><?php echo $results['user_birthday']; ?></td>
				</tr>

				<tr>
					<td>Gender: </td>
					<td><?php echo $results['user_gender']; ?></td>
				</tr>

				<tr>
					<td>Phone Number: </td>
					<td><?php echo $results['user_phone']; ?></td>
				</tr>

				<tr>
					<td>Registered: </td>
					<td><?php echo date('l, F jS, Y', $results['user_registered']); ?></td>
				</tr>

				<tr>
					<td>Quote: </td>
					<td>There has to be faith, which is not expressed in things to which you cling.
						(In) Ideas, opinions, to which you cling, in a kind of desperation.
						Faith is the act of letting go, and that must begin by letting go of God.
						Man is a little germ, that lives on an unimportant rock ball,
						that revolves about an insignificant star on the outer edges of one of the smaller galaxies.
						But on the other hand, if you think about that for a few minutes,
						I am absolutely amazed to discover myself on this rock ball...but you can always wake up. - Alan Watts
					</td>
				</tr>

				<tr>
					<td>Quote: </td>
					<td>You and I are all as much continuous with the physical
						universe as a wave is continuous with the ocean. - Alan Watts
					</td>
				</tr>

				<tr>
					<td>Lyric: </td>
					<td>Mr. Sandman, bring me a dream, <br>
							Make him the cutest that I've ever seen, <br>
							Give him two lips like roses and clover, <br>
							Then tell him that his lonesome nights are over!!!
					</td>
				</tr>
			</table>

			<p>This is the members only page. Only logged in users can view this page. You can <a href="login.php?action=logout">click here to logout</a>
				<form action="login.php?action=logout">
					<input type="submit" value="Log Out" />
				</form>
			</p>

		</div>


		<!-- scripts -->
		<script src="js/particles.js"></script>
		<script src="js/app.js"></script>

	</body>

</html>
