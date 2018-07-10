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

genesis();