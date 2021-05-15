<?php

/*
Change CSS class to custom logo
https://wordpress.stackexchange.com/questions/229905/how-to-add-css-class-to-custom-logo
*/
add_filter( 'get_custom_logo', 'change_logo_class' );
function change_logo_class( $html ) {
	$html = str_replace( 'custom-logo-link', 'navbar-brand', $html );
	return $html;
}
