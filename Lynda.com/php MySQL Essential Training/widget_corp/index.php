<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php find_selected_page(); ?>
<?php include("includes/header.php"); ?>
<table id="structure">
	<tr>
		<td id="navigation">
			<?php echo public_navigation( $sel_subject, $sel_page ); ?>
			<br />
		</td>
		<td id="page">
			<?php if ( $sel_page ) { ?>
				<h2><?php echo htmlentities( $sel_page['menu_name'] ); ?></h2>
				<div class="page-content">
					<?php echo htmlentities( nl2br( $sel_page['content'] ) ); ?>
				</div>
			<?php } else { ?>
				<h2>Welcome to the home page</h2>
			<?php } ?>
		</td>
	</tr>
</table>
<?php require("includes/footer.php"); ?>