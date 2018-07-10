<?php

// Contenu de la fiche cuisinier

function resto_contenu_cuisinier() {
	// Variables
	$html = 'toto';

	// Affichage de la bio longue
	$html .= 'tintin';


	// Affichage du HTML
	echo $html;

} // FIN function resto_contenu_cuisinier()

add_action('genesis_entry_content', 'resto_contenu_cuisinier');


genesis();