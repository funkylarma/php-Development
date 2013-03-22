<html>
	<head>
		<title>Type Casting</title>
	</head>
	<body>
		<?php
			$var1 = "2";
			$var2 = $var1 + 3;
			echo $var1;
		?>
		<br />
		<?php
			echo gettype($var1);
			echo "<br />";
			echo gettype($var2);
			settype($var2, "string");
			echo "<br />";
			echo gettype($var2);
			$var3 = (int) $var1;
			echo "<br />";
			echo gettype($var3);
			echo "<br />";
		?>
	</body>
</html>