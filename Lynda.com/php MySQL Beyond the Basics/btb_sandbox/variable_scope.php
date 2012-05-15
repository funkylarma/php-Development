<html>
	<head>
		<title>Variable Scope</title>
	</head>
	<body>
		<?php
			
			// Set variable at global scope
			$var = 1;

			// Define function containing local variable
			function test1() {
				$var = 2;
				echo $var;
				echo "<br />";
			}

			// Call function
			test1();
			// Echo global
			echo $var . "<br />";

			echo "<hr />";

			// Define function scope global variable
			function test2() {
				global $var;
				$var = 2;
				echo $var;
				echo "<br />";
			}

			// Call function
			test2();
			echo $var . "<br />";

			echo "<hr />";

			// Define function scope global variable
			function test3() {
				static $var = 2;
				echo $var;
				echo "<br />";
				$var++;
			}

			// Call function
			test3();
			test3();
			test3();
		?>
	</body>
</html>