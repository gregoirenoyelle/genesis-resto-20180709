<?php

// Contenu de la fiche cuisinier

function resto_contenu_cuisinier() {
	// Variables
	$html = '';

	// Affichage de la bio longue
	$html .= '<section class="bio-cuisto">';
		$html .= '<h3>Biographie</h3>';
		$html .= get_field('cuisto_bio_longue');
	$html .= '</section>';


	// Affichage du HTML
	echo $html;

} // FIN function resto_contenu_cuisinier()

add_action('genesis_entry_content', 'resto_contenu_cuisinier');


genesis();