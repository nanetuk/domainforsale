<?php
function valideteForm() {
  if (strlen($_POST['name']) < 2) {
    return 'You name should have at least 2 characters!';
  }

  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    return 'Invalid email address!';
  }

  if (floatval($_POST['bid']) < 0) {
    return 'Bid not valid!';
  }

  return true;
}

function sanitize_text_fields( $str, $keep_newlines = false ) {
  if ( is_object( $str ) || is_array( $str ) ) {
      return '';
  }

  $str = (string) $str;

  $filtered = str_replace( "<\n", "&lt;\n", $str );

  if ( ! $keep_newlines ) {
      $filtered = preg_replace( '/[\r\n\t ]+/', ' ', $filtered );
  }
  $filtered = trim( $filtered );

  $found = false;
  while ( preg_match( '/%[a-f0-9]{2}/i', $filtered, $match ) ) {
      $filtered = str_replace( $match[0], '', $filtered );
      $found    = true;
  }

  if ( $found ) {
      // Strip out the whitespace that may now exist after removing the octets.
      $filtered = trim( preg_replace( '/ +/', ' ', $filtered ) );
  }

  return $filtered;
}

$post = $get = array();
foreach ($_POST as $key => $value) {
  $post[sanitize_text_fields($key)] = sanitize_text_fields($value);
}
foreach ($_GET as $key => $value) {
  $get[sanitize_text_fields($key)] = sanitize_text_fields($value);
}
define('post', $post);
define('get', $get);