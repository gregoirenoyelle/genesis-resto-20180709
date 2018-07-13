<?php

// Fonction pour ajouter une vidéo
function ajouter_video() {

	// Affichage de la vidéo avec echo sur la variable
	$video = get_field('code_iframe_de_la_video');
	echo $video;

	// Affichage de la vidéo avec echo sur la fonction
	echo get_field('code_iframe_de_la_video');

	// Affichage de la vidéo avec la fonction ACF
	the_field('code_iframe_de_la_video');
}
add_action('genesis_before_loop', 'ajouter_video', 9);



// Appeler la zone de widget
// Affichage de la zone de Widget home-top
function resto_widget_cuisinier() {
	if ( in_category('brasseries') ) {
		genesis_widget_area( 'fiche-cuisinier', array(
			'before' => '<div class="entry widget-area widget-cuisinier">',
			'after'  => '</div>',
		) );
	}
}
add_action('genesis_after_entry', 'resto_widget_cuisinier' );


// Afficher les cuisinier
function resto_afficher_cuisinier() {
	// Variables
	$cuisiniers = get_field('selection_cuisinier');
	// d(get_fields());
	d($cuisiniers);
	
}
add_action('genesis_after_entry', 'resto_afficher_cuisinier', 9);



genesis();