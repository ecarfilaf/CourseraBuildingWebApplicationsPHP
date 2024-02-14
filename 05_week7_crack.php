<!DOCTYPE html>
<html>
<head>
	<title>Esteban Carfilaf PHP</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<header>
		<div class="container-fluid"><h1>MD5 cracker</h1></div>
	</header>
	<main>
		<div class="container-fluid">
			<p>This application takes an MD5 hash of a four digit pin and check all 10,000 possible four digit PINs to determine the PIN.</p>
			<div>Debug Output:</div>
			<div>
				<?php
				$sw = false; $c = 0; $time = 0.0;
				$pass = "";
				$check = hash('md5', $pass);
				if (isset($_GET["md5"])){
					$md5 = $_GET["md5"];
					$c=0;
					$time_ini = microtime(true);
					print "<table>";
					do{
						$pass = '000' . (string) $c;
						$pass = substr($pass,-4,4);
						$check = hash('md5', $pass);
						if ($c < 15){
							print "<tr><td>" . $check . "</td><td>" . $pass . "</td></tr>";
						}
						if ($md5 === $check) $sw = true;
						$c++;
					}while (($c < 10000) && ($md5 != $check));
					$time_fin = microtime(true);
					$time = ($time_fin - $time_ini) * 1000;
					print "</table>";
				}else{
					print 'Total checks: ' . $c . '<br>';
					print 'Elapsed time: ' . $time;
				}
				?>
			</div>
			<div><h4>PIN: <?php if ($sw) echo $pass;
				else echo 'Not Found'; ?> </h4></div>
			<div>
				<form method="get">
					<div class="row">
					<div class="col-2">
							<input type="text" size="40" class="form-control" id="md5" placeholder="Enter MD5" name="md5">
						</div>
						<div class="col">
							<button type="submit" class="btn btn-primary">Crack MD5</button>
						</div>
					</div>
				</form>
			</div>
			<div></div>
		</div>
	</main>
	<footer>
	</footer>
</body>
</html>