<?php

// déplacer les post info (date, auteur....)
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
add_action( 'genesis_entry_footer', 'genesis_post_info', 12 );

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
	$permalien = get_permalink();
	// d(get_fields());

	// Affichage de la photo avec une condition

	if ( is_singular('cuisinier') ) {		
		$html .= sprintf( '<section class="photo-cuisto">%s</section>' , $img );
		
	} else {
		$html .= sprintf( '<section class="photo-cuisto"><a href="%s">%s</a></section>', $permalien , $img );;
	}


	// Affichage de la bio
	$html .= '<section class="bio-cuisto">';
		$html .= '<h3>Biographie</h3>';

		// Condition pour affichage de la bio
		if ( is_singular('cuisinier') ) {
			$html .= get_field('cuisto_bio_longue');
		} else {
			$html .= get_field('cuisto_bio_courte');
			$html .= sprintf( '<p class="lire-suite"><a href="%s">Lire la site</a></p>', $permalien );
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
