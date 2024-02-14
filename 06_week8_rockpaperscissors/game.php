<?php
	// Demand a GET parameter
	if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
		die('Name parameter missing');
	}

	// Set up the values for the game...
	// 0 is Rock, 1 is Paper, and 2 is Scissors
	$names = array('Rock', 'Paper', 'Scissors');
	$human = isset($_POST["human"]) ? $_POST['human']+0 : -1;

	$computer = 0; // Hard code the computer to rock
	// TODO: Make the computer be random
	$computer = rand(0,2);
	
	// This function takes as its input the computer and human play
	// and returns "Tie", "You Lose", "You Win" depending on play
	// where "You" is the human being addressed by the computer
	function check($computer, $human) {
		// For now this is a rock-savant checking function
		// TODO: Fix this
		if ( $human == $computer ) {
			return "Tie";
		} else if ( $human == 0 && $computer == 2 ) {
			return "You Win";
		} else if ( $human == 1 && $computer == 0 ) {
			return "You Win";
		} else if ( $human == 2 && $computer == 1 ) {
			return "You Win";
		} else if ( $human == 0 && $computer == 1 ) {
			return "You Lose";
		} else if ( $human == 1 && $computer == 2 ) {
			return "You Lose";
		} else if ( $human == 2 && $computer == 0 ) {
			return "You Lose";
		}
		return false;
	}
	
	// Check to see how the play happenned
	$result = check($computer, $human);
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
			<h1>Rock Paper Scissors</h1>
		</div>
	</header>
	<main class="container">
		<p>Welcome: <?php echo htmlentities($_REQUEST['name']) ; ?> </p>
		<form method="POST">
		<div class=row>
			<div class="col-2">
				<div class="dropdown">
					<select name="human" class="form-select">
						<option value="-1">Select</option>
						<option value="0">Rock</option>
						<option value="1">Paper</option>
						<option value="2">Scissors</option>
						<option value="3">Test</option>
					</select>
				</div>
			</div>
			<div class="col-1">
				<button type="submit" class="btn btn-primary">Play</button>
			</div>
			<div class="col-1">
				<button type="submit" class="btn btn-danger" formaction="index.php" >Log Out</button>
			</div>
		</div>
		</form>
		<div class="alert  alert-dark mt-3">
			<?php
				if ( $human == -1 ) {
					print "Please select a strategy and press Play.\n";
				} else if ( $human == 3 ) {
					for($c=0;$c<3;$c++) {
						for($h=0;$h<3;$h++) {
							$r = check($c, $h);
							print "Human=$names[$h] Computer=$names[$c] Result=$r\n<br>";
						}
					}
				} else {
					print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result\n";
				}
			?>
		</div>
	</main>
	<footer class="panel-footer">
		<p>&copy; ECAN 2024</p>
	</footer>
</body>
</html>