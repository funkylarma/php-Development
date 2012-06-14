<html>
	<head>
		<title>Reference as Function Arguments</title>
	</head>
	<body>
		<?php
			function ref_test(&$var) {
				$var = $var *2;
			}

			$a = 10;
			ref_test($a);
			echo $a;
		?>
	</body>
</html>