<?php



// CAMPI
add_filter( 'comment_form_default_fields', 'wot_comment_fields_custom_html' );
function wot_comment_fields_custom_html( $fields ) {

	// unset di tutti i campi
	unset( $fields['comment'] );
	unset( $fields['author'] );
	unset( $fields['email'] );
	unset( $fields['url'] );

	// ridefinizione dei campi
	$fields = [

    // autore
		'author' => '<div class="comment-form-author form-group">' . '<label for="author">' . __( 'Il tuo nome (*)', 'textdomain'  ) . '</label> ' .
		'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" class="form-control" maxlength="245"' . $aria_req . $html_req . ' /></div>',

    // email
		'email'  => '<div class="comment-form-email form-group"><label for="email">' . __( 'Il tuo indirizzo email (*)', 'textdomain'  ) . '</label> ' .
		'<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" class="form-control" maxlength="100" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></div>',

	];
	// fine customizzazione, restituisco il risultato
	return $fields;
}

// rimuovo il campo commento originale (altrimenti se ne vedrebbero 2)
add_filter( 'comment_form_defaults', 'wot_remove_default_comment_field', 10, 1 );
function wot_remove_default_comment_field( $defaults ) {
  if ( isset( $defaults[ 'comment_field' ] ) && ! is_user_logged_in() ) {
    $defaults[ 'comment_field' ] = '';
  }
  return $defaults;
}
