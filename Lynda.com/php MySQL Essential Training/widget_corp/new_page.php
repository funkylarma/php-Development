<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php find_selected_page(); ?>
<?php include("includes/header.php"); ?>
<table id="structure">
	<tr>
		<td id="navigation">
			<?php echo navigation( $sel_subject, $sel_page ); ?>
			<br />
			<a href="new_subject.php">+ Add a new subject</a>
		</td>
		<td id="page">
			<h2>Add Page</h2>
			<?php if ( !empty( $message ) ) { 
				echo "<p class=\"message\">" . $message . "</p>";
			}
			if ( !empty( $errors ) ) {
				display_errors( $errors );
			}
			?>

			<form action="new_page.php?subj=<?php echo $sel_subject['id']; ?>" method="post">
				<?php $new_page = true;
				include( "page_form.php" ); ?>
				<input type="submit" name="submit" value="Create Page" />
			</form>
			<br />
			<a href="edit_subject.php?subj=<?php echo $sel_subject['id']; ?>">Cancel</a>
		</td>
	</tr>
</table>
<?php require("includes/footer.php"); ?>