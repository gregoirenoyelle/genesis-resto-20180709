<?php

// Appel du Contenu de la fiche cuisinier
get_template_part('contenu','cuisinier');

// Appeler la zone de widget
// Affichage de la zone de Widget home-top
function resto_widget_cuisinier() {
	genesis_widget_area( 'fiche-cuisinier', array(
		'before' => '<div class="entry widget-area widget-cuisinier">',
		'after'  => '</div>',
	) );
}
add_action('genesis_after_entry', 'resto_widget_cuisinier' );

function resto_afficher_etoiles() {
	// si problème mettre la globale $post
	// global $post;
	echo get_the_term_list($post->ID, 'etoile', '<p class="entry-meta">Nombre d\'étoiles :', ', ', '</p>' );
}	
add_action('genesis_entry_footer', 'resto_afficher_etoiles');


genesis();