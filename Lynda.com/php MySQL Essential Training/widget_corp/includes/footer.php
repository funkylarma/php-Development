		</div><!-- #main -->
		<div id="footer">
			Copyright 2007, Widget Corp
		</div><!-- #footer -->
	</body>
</html>
<?php
if( isset( $connection ) ) { 
	// 5. Close connection
	mysql_close( $connection );
}
?>