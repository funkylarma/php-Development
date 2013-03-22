<html>
	<head>
		<title>Functions2</title>
	</head>
	<body>
		<?php
			$bar = "outside";
			function foo() {
				global $bar;
				$bar = "inside";
			}
			foo();
			echo $bar . "<br />";
		?>
		<br />
		<?php

			$bar = "outside";
			function foo2( $bar ) {
				$bar = "inside";
				return $bar;
			}
			$bar = foo2( $bar );
			echo $bar . "<br />";
		?>
		<br />
		<?php
			function paint( $room="office", $colour="red" ) {
				echo "The colour of the {$room} is {$colour}.";
			}

			paint( "bedroom", "blue" );
		?>
	</body>
</html>