<html>
	<head>
		<title>Numbers: Floats</title>
	</head>
	<body>
		<?php
			$var1 = 3.14;
			echo 4/3;
		?>
		<br />
		Floating point: <?php echo $myFloat = 3.14; ?><br />
		Round: <?php echo round($myFloat, 1); ?><br />
		Ceiling: <?php echo ceil($myFloat); ?><br />
		Floor: <?php echo floor($myFloat); ?><br />
		<br />
		Absolute value: <?php echo abs(0 - 300); ?><br />
		Exponential: <?php echo pow(2, 8); ?><br />
		Square root: <?php echo sqrt(100); ?><br />
		Modulo: <?php echo fmod(20, 7); ?><br />
		Random (any): <?php rand(); ?><br />
		Random (min,max): <?php echo rand(1, 10); ?><br />
	</body>
</html>