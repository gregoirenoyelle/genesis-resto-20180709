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
	$html = '';
	$cuisiniers = get_field('selection_cuisinier');
	$titre = get_field('resto_titre_article');
	// d(get_fields());
	d($cuisiniers);

	// Titre 
	if ( $titre ) {
		$html .= sprintf('<div class="archive-description"><h3>%s</h3></div>', $titre);
	}

	
	$html .= '<section class="selection-cuisinier">';

	// Boucles de cuisinier

	foreach ($cuisiniers as $cuisinier) {
		// Variables de la boucle
		$id = $cuisinier->ID;
		// get_permalink avec le id car je ne suis pas dans la boucle
		$lien = get_permalink($id);
		// image ACF avec le id car je ne suis pas dans la boucle
		$img_id = get_field('cuisto_photo', $id);
		$img = wp_get_attachment_image( $img_id, 'cuisinier');
		// d($img_id);
		
		$html .= '<article class="entry">';
			$html .= sprintf( '<figure>%s</figure>', $img );
			$html .= sprintf( '<h2><a href="%s">%s</a></h2>', $lien, $cuisinier->post_title  );
		$html .= '</article>';

	} // FIN foreach ($cuisiniers as $cuisinier)

	// Fin de la boucle
		
	$html .= '</section>';

	// Affichier le HTML
	echo $html;

} // FIN function resto_afficher_cuisinier()
add_action('genesis_after_entry', 'resto_afficher_cuisinier', 8);


function resto_afficher_cuisinier_ids() {
	// Variables
	$html = '';
	$cuisiniers_id = get_field('selection_cuisinier_ids');
	d($cuisiniers_id);

	// article du codex: http://codex.wordpress.org/Class_Reference/WP_Query
	$ma_boucle = new WP_Query (
		array(
			'post_type' => 'cuisinier',
			'post__in' => $cuisiniers_id,
			'orderby' => 'post__in',
			'order' => 'ASC',
		)
	); // fin WP_Query 
	// début loop $ma_boucle
	while ( $ma_boucle->have_posts() ) : $ma_boucle->the_post(); 
		// Variable de la boucle
		$img_id = get_field('cuisto_photo', $id);
		$img = wp_get_attachment_image( $img_id, 'cuisinier');

		d($img_id);
		
		$html .= '<article class="entry">';
			
			$html .= sprintf( '<h3><a href="%s">%s</a></h3>', get_permalink(), get_the_title() );
			$html .= sprintf( '<figure>%s</figure>', $img );

		$html .= '</article>';
	endwhile;
	wp_reset_postdata();
	// fin loop $ma_boucle	

	// Afficher HTML
	echo $html;
} // FIN function resto_afficher_cuisinier_ids()
add_action('genesis_after_entry', 'resto_afficher_cuisinier_ids', 9);


genesis();