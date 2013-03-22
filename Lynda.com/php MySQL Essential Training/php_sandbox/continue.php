<html>
	<head>
		<title>Loops: continue</title>
	</head>
	<body>
		<?php
			for ( $count = 0; $count <= 10; $count++) {
				if ( $count == 5) {
					continue;
				}	
				echo $count . ", ";
			}
		?>
	</body>
</html>