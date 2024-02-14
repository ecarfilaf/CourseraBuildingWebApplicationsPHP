<?php
	$message = false;
	$salt = '';
	$oldName = isset($_POST['who']) ? $_POST['who'] : '';
	$oldPass = isset($_POST['pass']) ? $_POST['pass'] : '';
	$stored_hash = '';
	$hash = '';
	$md5 = '';
	$logged = false;

	if (isset($_POST['pass']) && ($oldName == '' || $oldPass == ''))  $message = 'User name and password are required';

	if (isset($_POST['pass']) && ($message == false)){
		$salt = 'EcXsAq*_';
		$stored_hash = '73e23288ad73def40bb6533c06df7e3e';
		$hash = $salt . $oldPass;
		$md5 = hash('md5',$hash);
		if ($stored_hash == $md5){
			header("Location: game.php?name=".urlencode($_POST['who']));
		}else {
			$message = 'Incorrect password';
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Esteban Carfilaf PHP 469b7aac</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="styles.css" />
</head>
<body>
	<header>
		<div class="container">
			<h1>Please Log In</h1>
		</div>
	</header>
	<main class="container">
		<?php
			if ($message !== false) {
				echo ("<p class='alert alert-danger'>");
				echo ($message);
				echo ("</p>");
			}
		?>
		<form method="POST">
			<div>
				<div class="mb-3 mt-3 col-2">
					<label for="name" class="form-label">User Name:</label>
					<input type="text" class="form-control" id="who" placeholder="Enter Username" name="who">
				</div>
				<div class="mb-3 col-2">
					<label for="pass" class="form-label">Password:</label>
					<input type="password" class="form-control" id="pass" placeholder="Enter password" name="pass">
				</div>
			</div>
			<div>
				<button type="submit" class="btn btn-success" >Log In</button>
				<button type="submit" class="btn btn-danger" formaction="index.php" >Cancel</button>
			</div>
		</form>
		<p>
			For a password hint, view source and find a password hint
			in the HTML comments.
			<!-- Hint: The password is the four character sound a cat
			makes (all lower case) followed by 123. miau-->
			</p>
	</main>
	<footer>
		<p>&copy; ECAN 2024</p>
	</footer>
</body>
</html>