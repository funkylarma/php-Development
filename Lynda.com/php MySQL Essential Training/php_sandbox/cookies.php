<?php
	setcookie( 'test', 45, time()+(60*60*24*7) );
?>
<html>
	<head>
		<title>Cookies</title>
	</head>
	<body>
		Remember: setting cookies MUST happen before ANY HTML us sent
		UNLESS putput buffering is turned on.
	</body>
</html>