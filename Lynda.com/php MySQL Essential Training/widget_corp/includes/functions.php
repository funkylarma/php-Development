<?php

function mysql_prep( $value ) {
	$magic_quotes_active = get_magic_quotes_gpc();
	$new_enough_php = function_exists( "mysql_real_escape_string" );
	if ( $new_enough_php ) {
		if ( $magic_quotes_active ) {
			$value = stripslashes( $value );
		} else {
			if ( !$magic_quotes_active ) {
				$value = addslashes( $value );
			}
		}
	}
	return $value;
}

function redirect_to( $location = NULL ) {
	if ( $location != NULL ) {
		header( "Location: {$location}" );
		exit;
	}
}

function confirm_query( $result_set ) {
	if( !$result_set ) {
		die( "Database query failed: " . mysql_error() );
	}
}

function get_all_subjects( $public = true ) {
	global $connection;
	$query = "SELECT * 
			  FROM subjects ";
	if ( $public ) {
		$query .= "WHERE visible = 1 ";
	}
	$query .= "ORDER BY position ASC";
	$subject_set = mysql_query( $query, $connection );
	confirm_query( $subject_set );
	return $subject_set;
}

function get_all_pages() {
	global $connection;
	$query = "SELECT *
			  FROM pages
			  ORDER BY position ASC";
	$page_set = mysql_query( $query, $connection );
	confirm_query( $page_set );
	return $page_set;
}

function get_pages_for_subject( $subject_id, $public = true ) {
	global $connection;
	$query = "SELECT * 
		  FROM pages 
		  WHERE subject_id = {$subject_id} ";
	if ( $public ) {
		$query .= "AND visible = 1 ";
	}
	$query .= "ORDER BY position ASC";
	$page_set = mysql_query( $query, $connection );
	confirm_query( $page_set );
	return $page_set;
}

function get_subject_by_id( $subject_id ) {
	global $connection;
	$query = "SELECT * ";
	$query .= "FROM subjects ";
	$query .= "WHERE id = " . $subject_id;
	$query .= " LIMIT 1";
	$result_set = mysql_query( $query, $connection );
	confirm_query( $result_set );
	// If no rows are returned, fetch array will return false
	if ( $subject = mysql_fetch_array( $result_set ) ) {
		return $subject;
	} else {
		return NULL;
	}
}

function get_page_by_id( $page_id ) {
	global $connection;
	$query = "SELECT * ";
	$query .= "FROM pages ";
	$query .= "WHERE id = " . $page_id;
	$query .= " LIMIT 1";
	$result_set = mysql_query( $query, $connection );
	confirm_query( $result_set );
	if ( $page = mysql_fetch_array( $result_set ) ) {
		return $page;
	} else {
		return NULL;
	}
}

function get_default_page( $subject_id ) {
	// Get all visible pages
	$page_set = get_pages_for_subject( $subject_id, true );
	if ( $first_page = mysql_fetch_array( $page_set ) ) {
		return $first_page;
	} else {
		return NULL;
	}
}

function find_selected_page() {
	global $sel_subject;
	global $sel_page;
	if( isset( $_GET['subj'] ) ) {
		$sel_subject = get_subject_by_id( $_GET['subj'] );
		$sel_page = get_default_page( $sel_subject['id'] );
	} elseif ( isset( $_GET['page'] ) ) {
		$sel_subject = NULL;
		$sel_page = get_page_by_id( $_GET['page'] );
	} else {
		$sel_subject = NULL;
		$sel_page = NULL;
	}
}

function navigation( $sel_subject, $sel_page, $public = false ) {
	$output = '<ul class="subjects">';

		$subject_set = get_all_subjects( $public );

		while ( $subject = mysql_fetch_array( $subject_set ) ) {
			$output .= "<li";
			if( $subject["id"] == $sel_subject['id'] ) {
				$output .= " class=\"selected\"";
			}
			$output .= "><a href=\"edit_subject.php?subj=" . urlencode( $subject["id"] ) . "\">{$subject["menu_name"]}</a></li>";

			$page_set = get_pages_for_subject( $subject["id"], $public );

			$output .= "<ul class=\pages\">";
			while ( $page = mysql_fetch_array( $page_set ) ) {
				$output .= "<li";
				if( $page["id"] == $sel_page['id'] ) {
					$output .= " class=\"selected\"";
				}
				$output .= "><a href=\"content.php?page=" . urlencode( $page["id"] ) . "\">{$page["menu_name"]}</a></li>";
			}
			$output .= "</ul>";
		}

	$output .= "</ul>";
	return $output;
}

function public_navigation( $sel_subject, $sel_page, $public = true ) {
	$output = '<ul class="subjects">';

		$subject_set = get_all_subjects( $public );

		while ( $subject = mysql_fetch_array( $subject_set ) ) {
			$output .= "<li";
			if( $subject["id"] == $sel_subject['id'] ) {
				$output .= " class=\"selected\"";
			}
			$output .= "><a href=\"index.php?subj=" . urlencode( $subject["id"] ) . "\">{$subject["menu_name"]}</a></li>";

			if ( $subject["id"] == $sel_subject['id'] ) {
				$page_set = get_pages_for_subject( $subject["id"], $public );

				$output .= "<ul class=\pages\">";
				while ( $page = mysql_fetch_array( $page_set ) ) {
					$output .= "<li";
					if( $page["id"] == $sel_page['id'] ) {
						$output .= " class=\"selected\"";
					}
					$output .= "><a href=\"index.php?page=" . urlencode( $page["id"] ) . "\">{$page["menu_name"]}</a></li>";
				}
				$output .= "</ul>";
			}
		}

	$output .= "</ul>";
	return $output;
}