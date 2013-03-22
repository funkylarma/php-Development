<html>
	<head>
		<title>Array Functions</title>
	</head>
	<body>
		<?php
			$array1 = array(4, 8, 15, 16, 23, 42);
		?>
		
		Count: <?php echo count($array1); ?><br />
		Max value: <?php echo max($array1); ?><br />
		Min value: <?php echo min($array1); ?><br />
		<br />
		Sort: <?php sort($array1); print_r($array1); ?><br />
		Reverse sort: <?php rsort($array1); print_r($array1); ?><br />
		<br />
		Implode: <?php echo $string1 = implode(" * ", $array1); ?><br />
		Explode: <?php echo print_r(explode(" * ", $string1)); ?><br />
		<br />
		In array: <?php echo in_array(15, $array1); ?><br />
	</body>
</html>