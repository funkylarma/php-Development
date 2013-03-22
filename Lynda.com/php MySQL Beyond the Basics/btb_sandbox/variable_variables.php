<html>
	<head>
		<title>Variable Variables</title>
	</head>
	<body>
		<?php
			$a = "goodbye";
			$hello = "Hello everyone.";
			$goodbye = "Goodbye";
			echo $a . "<br />";
			echo $hello . "<br />";

			echo $$a;
		?>
	</body>
</html>