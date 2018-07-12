<?php

//* Changer ordre d'affichage dans la page cuisinier
add_action( 'pre_get_posts', 'resto_cuisinier_archive_filter' );
function resto_cuisinier_archive_filter( $query ) {
	if ( $query->is_main_query() && !is_admin() && $query->is_post_type_archive( 'cuisinier' ) ) {
		$query->set( 'orderby', 'menu_order' );
		$query->set('order','ASC');
	}
}