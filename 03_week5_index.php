<!DOCTYPE html>
<html>
<head>
	<title>Esteban Carfilaf PHP</title>
	<link type="text/css" rel="stylesheet" href="02_blocks.css">
</head>
<body>
	<header>
		<h1>Esteban Carfilaf PHP</h1>
	</header>
	<main>
		<p>
		<?php
			print ('The SHA256 hash of "Esteban Carfilaf" is ');
			print hash('sha256', 'Esteban Carfilaf');
		?>
		</p>
		<pre>
ASCII ART:

    ***********
    **       **
    **
    **
    **
    **       **
    ***********

		</pre>
		<a href="check.php">Click here to check the error setting</a>
		<br>
		<a href="fail.php">Click here to cause a traceback</a>
	</main>
	<footer>
		<?php 
			$stuff = array('course' => 'PHP-Intro', 'topic' => 'Arrays');
			echo isset($stuff['section']);
		?>
		</footer>
</body>
</html>