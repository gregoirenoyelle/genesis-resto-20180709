<?php

// Contenu de la fiche cuisinier

function resto_contenu_cuisinier() {

	// Contrôle si ACF est actif
	if ( ! function_exists('get_field')) {
		echo '<h1 style="color: red;">Attention vous devez activer ACF dans votre site</h1>';
		return;
	} 

	// If sur une ligne
	// if ( ! function_exists('get_field')) return;

	// Variables
	$html = '';
	$img_id = get_field('cuisto_photo');
	// Formats d'image: thumbnail, medium, large, full OU format sur mesure
	$img = wp_get_attachment_image( $img_id, 'cuisinier' );

	// Affichage de la photo
	$html .= sprintf( '<section class="photo-cuisto">%s</section>' , $img );

	// Affichage de la bio longue
	$html .= '<section class="bio-cuisto">';
		$html .= '<h3>Biographie</h3>';
		
		// Condition pour affichage de la bio
		if ( is_singular('cuisinier') ) {
			$html .= get_field('cuisto_bio_longue');
		} else {
			$html .= get_field('cuisto_bio_courte');
		}
		
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
