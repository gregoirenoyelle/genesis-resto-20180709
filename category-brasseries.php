<?php

// Fonction pour afficher du texte
function ajouter_texte_avant_titre() {
	the_title('<p>Mon titre est: ', '</p>');
}
// Hook sur genesis_entry_header pour afficher mon nouveau contenu
add_action('genesis_entry_header', 'ajouter_texte_avant_titre', 12);

// Fonction pour ajouter une vidéo
function ajouter_video() {
	echo '<div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/274720181?title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>';
}
add_action('genesis_before_loop', 'ajouter_video', 9);

genesis();