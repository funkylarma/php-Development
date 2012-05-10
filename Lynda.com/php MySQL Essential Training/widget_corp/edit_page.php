<?php
	
	require_once( "includes/session.php" );
	require_once( "includes/connection.php" );
	require_once( "includes/functions.php" );
	confirm_logged_in();

	if ( intval( $_GET['page'] ) == 0 ) {
		redirect_to( "content.php" );
	}

	include_once( "includes/form_functions.php" );

	if ( isset( $_POST['submit'] ) ) {
		// Validation
		$errors = array();
		
		$required_fields = array( 'subject_id', 'menu_name', 'position', 'visible', 'content' );
		$errors = array_merge( $errors, check_required_fields( $required_fields ) );

		$fields_with_lengths = array( 'menu_name' => 30 );
		$errors = array_merge( $errors, check_max_field_lengths( $fields_with_lengths ) );


		if ( empty( $errors ) ) {
			// Perform update
			$id         = mysql_prep( $_GET['page'] );
			$subject_id = mysql_prep( $_POST['subject_id'] );
			$menu_name  = trim( mysql_prep( $_POST['menu_name'] ) );
			$position   = mysql_prep( $_POST['position'] );
			$visible    = mysql_prep( $_POST['visible'] );
			$content    = mysql_prep( $_POST['content'] );

			$query = "UPDATE pages SET subject_id = {$subject_id}, menu_name = '{$menu_name}', position = {$position}, visible = {$visible}, content = '{$content}' WHERE id = {$id}";
			$result = mysql_query( $query, $connection );
			if ( mysql_affected_rows() == 1 ) {
				// Success
				$message = "The page was successfully updated";
			} else {
				$message = "The page update failed: " . mysql_error();
			}

		} else {
			if ( count( $errors ) == 1 ) {
				$message = "There was 1 error in the form.";
			} else {
				$message = "There were " . count( $errors ) . " errors in the form.";
			}
		}

	}

	find_selected_page();

	include("includes/header.php");

?>
<table id="structure">
	<tr>
		<td id="navigation">
			<?php echo navigation( $sel_subject, $sel_page ); ?>
		</td>
		<td id="page">
			<h2>Edit Page: <?php echo $sel_page['menu_name']; ?></h2>
			<?php 
				if ( !empty( $message ) ) {
					echo "<p class=\"message\">" . $message . "</p>";
				}
				if ( !empty( $errors ) ) {
					display_errors( $errors );
				}
			?>
			<form action="edit_page.php?page=<?php echo urlencode( $sel_page['id'] ); ?>" method="post">
				<?php include( "page_form.php" ); ?>
				<input type="submit" name="submit" value="Edit Page" />
				<a href="delete_page.php?subj=<?php echo urlencode( $sel_page['id'] ); ?>">Delete Page</a>
			</form>
			<br />
			<a href="content.php?page=<?php echo $sel_page['id']; ?>">Cancel</a>
		</td>
	</tr>
</table>
<?php require("includes/footer.php"); ?>