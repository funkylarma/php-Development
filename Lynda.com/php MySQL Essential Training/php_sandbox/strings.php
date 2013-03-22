<html>
	<head>
		<title>Strings</title>
	</head>
	<body>
		<?php
			echo "Hello World<br />";
			echo 'Hello World<br />';
			$my_variable = "Hello World";
			echo $my_variable;
			echo "<br />";
			echo $my_variable . " Again";
		?>
		<br />
		<?php
			echo "$my_variable Again.<br />";
			echo "{$my_variable} Again.<br />";
			echo '$my_variable Again.<br />';
		?>
	</body>
</html>