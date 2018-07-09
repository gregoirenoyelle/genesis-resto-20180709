<?php

// Fonction pour afficher du texte
function ajouter_texte_avant_titre() {
	the_title('<p>Mon titre est: ', '</p>');
}
// Hook sur genesis_entry_header pour afficher mon nouveau contenu
add_action('genesis_entry_header', 'ajouter_texte_avant_titre', 12);

genesis();