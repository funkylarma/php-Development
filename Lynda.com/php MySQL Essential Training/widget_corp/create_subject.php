<?php

require_once( "includes/session.php" );
require_once( "includes/connection.php" );
require_once( "includes/functions.php" );
confirm_logged_in();

// Validation
$errors = array();
$required_fields = array( 'menu_name', 'position', 'visible' );
foreach ( $required_fields as $fieldname ) {
	if ( !isset( $_POST[$fieldname] ) || empty( $_POST[$fieldname] ) ) {
		$errors[] = $fieldname;
	}
}

$fields_with_lengths = array( 'menu_name' => 30 );
foreach ( $fields_with_lengths as $fieldname => $maxlength ) {
	if ( strlen( trim( mysql_prep( $_POST[$fieldname] ) ) ) > $maxlength ) {
		$errors[] = $fieldname;
	}
}

if ( !empty($errors ) ) {
	redirect_to( "new_subject.php" );
}


$menu_name = mysql_prep( $_POST['menu_name'] );
$position  = mysql_prep( $_POST['position'] );
$visible   = mysql_prep( $_POST['visible'] );

$query = "INSERT INTO subjects (menu_name, position, visible) VALUES ( '{$menu_name}', {$position}, {$visible})";

if ( mysql_query( $query, $connection ) ) {
	redirect_to( "content.php");
} else {
	// Display error message
	echo "<p>Subject creation failed.</p>";
	echo "<p>" . mysql_error() . "</p>";
}

mysql_close( $connection );