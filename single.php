<?php

// Fonction pour ajouter une vidéo
function ajouter_video() {
	the_field('code_iframe_de_la_video');
}
add_action('genesis_before_loop', 'ajouter_video', 9);

genesis();