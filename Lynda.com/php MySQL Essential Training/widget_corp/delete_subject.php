<?php 
require_once("includes/connection.php");
require_once("includes/functions.php");

if ( intval( $_GET['subj'] ) == 0 ) {
	redirect_to( "content.php" );
}

$id = mysql_prep( $_GET['subj'] );

if ( $subject = get_subject_by_id( $id ) ) {
	$query = "DELETE FROM subjects WHERE id = {$id} LIMIT 1";
	$result = mysql_query( $query, $connection );

	if ( mysql_affected_rows() == 1 ) {
		redirect_to( "content.php" );
	} else {
		echo "<p>Subject deletion failed.</p>";
		echo "<p>" . mysql_error() . "</p>";
		echo "<a href=\"content.php\">Return to main page</a>";
	}
} else {
	redirect_to( "content.php" );
}

mysql_close( $connection );