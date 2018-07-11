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


genesis();