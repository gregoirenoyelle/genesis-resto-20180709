<?php

// Fonction pour afficher du texte
function ajouter_texte_avant_titre() {
	echo "<p>Texte avant titre</p>";
}
// Hook sur genesis_entry_header pour afficher mon nouveau contenu
add_action('genesis_entry_header', 'ajouter_texte_avant_titre', 9);

genesis();