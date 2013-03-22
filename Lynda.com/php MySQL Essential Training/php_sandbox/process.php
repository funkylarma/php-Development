<html>
	<head>
		<title>Form Process</title>
	</head>
	<body>
		<?php
			$username = $_POST['username'];
			$password = $_POST['password'];

			echo "{$username}: {$password}";
		?>
	</body>
</html>