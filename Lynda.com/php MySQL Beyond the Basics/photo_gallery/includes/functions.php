<?php

function strip_zeros_from_date( $marked_string="" ) {
  // Remove the marked zeros
  $no_zeros = str_replace('*0', '', $marked_string);
  // Remove any remaining marks
  $cleaned_string = str_replace('*', '', $no_zeros);
  return $cleaned_string;
}

function redirect_to( $location = NULL ) {
  if($location != NULL) {
    header("Location: {$location}");
    exit;
  }
}

function output_message( $message = "" ) {
  if(!empty($message)) {
    return "<p class=\"message\">{$message}</p>";
  } else {
    return "";
  }
}