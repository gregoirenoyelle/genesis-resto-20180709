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

	// Affichage 	
	$html .= '<section class="info-contact">';
		$html .= '<h3>Contacts</h3>';
		$html .= '<ul>';
			$html .= sprintf( '<li><a href="%s" target="_blank">Site Internet</a></li>', get_field('cuisto_site_internet') );
			$html .= sprintf( '<li><a href="%s">Bio en PDF</a></li>', get_field('cuisto_bio_pdf') );
			$html .= sprintf( '<li><a href="mailto:%s">Envoyer un mail</a></li>', get_field('cuisto_email') );
		$html .= '</ul>';
	$html .= '</section>';

	// Affichage du HTML
	echo $html;

} // FIN function resto_contenu_cuisinier()

add_action('genesis_entry_content', 'resto_contenu_cuisinier');


genesis();