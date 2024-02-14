<!DOCTYPE html>
<html>
<head>
	<title>Esteban Carfilaf 469b7aac</title>
</head>
<body>
	<header>
		<h1>Welcome to my guessing game</h1>
	</header>
	<main>
		<p>
			<?php
				try{
					if (isset($_GET["guess"])){
						$num = $_GET["guess"];
						if (strlen($num)==0) print 'Your guess is too short';
						elseif (!is_numeric($num)) print 'Your guess is not a number';
						else {
							if ($num < 75) print 'Your guess is too low';
							elseif ($num > 75) print 'Your guess is too high';
							else print 'Congratulations - You are right';
						}
					}
					else print 'Missing guess parameter';	
				} catch (Exception $e){
					print 'Missing guess parameter';
				}
			?>
		</p>
	</main>
	<footer>
	</footer>
</body>
</html>