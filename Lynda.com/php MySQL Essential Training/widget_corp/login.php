<?php
	require_once("includes/session.php");
	require_once("includes/connection.php");
	require_once("includes/functions.php");

	if ( logged_in() ) {
		redirect_to( "staff.php" );
	}

	include_once( "includes/form_functions.php" );

	// Start form processing
	if ( isset( $_POST['submit'] ) ) {
		$errors = array();

		$required_fields = array( 'username', 'password' );
		$errors = array_merge( $errors, check_required_fields( $required_fields, $_POST ) );

		$fields_with_lengths = array( 'username' => 30, 'password' => 30 );
		$errors = array_merge( $errors, check_max_field_lengths( $fields_with_lengths, $_POST) );


		$username = trim( mysql_prep( $_POST['username'] ) );
		$password = trim( mysql_prep( $_POST['password'] ) );
		$hashed_password = sha1( $password );

		if ( empty( $errors ) ) {
			$query = "SELECT id, username FROM users ";
			$query .= "WHERE username = '{$username}' ";
			$query .= "AND hashed_password = '{$hashed_password}' ";
			$result_set = mysql_query( $query );
			confirm_query( $result_set );
			if ( mysql_num_rows( $result_set ) == 1 ) {
				$found_user = mysql_fetch_array( $result_set );
				$_SESSION['user_id'] = $found_user['id'];
				$_SESSION['username'] = $found_user['username'];
				redirect_to( "staff.php" );
			} else {
				$message = "There was more than one user is that combination";
			}

		} else {
			$message = "Username/password combination incorrect.<br />Please make sure you can type";
		}
	} else {
		if ( isset( $_GET['logout'] ) && $_GET['logout'] == 1 ) {
			$message = "You are now logged out";
		}
		$username = "";
		$password = "";
	}
?>

<?php include("includes/header.php"); ?>
<table id="structure">
	<tr>
		<td id="navigation">
			<a href="staff.php">Return to Menu</a>
			<br />
		</td>
		<td id="page">
			<h2>Create New User</h2>
			<?php 
				if ( !empty( $message ) ) {
					echo "<p class=\"message\">" . $message . "</p>";
				}

				if ( !empty( $errors ) ) {
					display_errors( $errors );
				}
			?>
			<form action="login.php" method="post">
				<table>
					<tr>
						<td>Username:</td>
						<td><input type="text" name="username" maxlength="30" value="<?php echo htmlentities( $username ); ?>" /></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" name="password" maxlength="30" value="<?php echo htmlentities( $password ); ?>" /></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" name="submit" value="Create User" /></td>
					</tr>
				</table>
			</form>
		</td>
	</tr>
</table>
<?php require("includes/footer.php"); ?>