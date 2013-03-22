<html>
	<head>
		<title>Loops: foreach</title>
	</head>
	<body>
		<?php
			$ages = array(4, 8, 15, 16, 23, 42);
		?>
		
		<?php
			foreach ( $ages as $age ) {
				echo $age . ", ";
			}
		?>
		<br />
		<?php
			foreach ( $ages as $position => $age ) {
				echo $position . ": " . $age . "<br />";
			}
		?>
		<br />
		<?php
			$prices = array("Brand New Computer" => 2000, "1 month in Lynda.com Training Library" => 25, "Learning PHP" => "priceless");
			
			foreach ( $prices as $key => $value ) {
				if ( is_int( $value ) ) {
					echo $key . ": $" . $value . "<br />";
				} else {
					echo $key . ": " . $value . "<br />";
				}
			}
		?>
	</body>
</html>