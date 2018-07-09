<?php
// Template Name: Page avec châpeau

/* Champs ACF
texte chapeau: resto_texte_chapeau
taille police: resto_taille_police
*/

// Afficher le châpeau après le titre
function resto_chapeau_apres_titre() {
	
	// Première écriture ligne par ligne
	// echo '<p>';
	// echo get_field('resto_texte_chapeau');
	// echo '</p>';

	// Deuxième écriture avec la concaténation "." (bâton de colle)
	// echo '<p>' . get_field('resto_texte_chapeau') . '</p>';

	// Troisième écriture avec la fonction PHP printf
	$classe = "chapeau"; 
	printf( '<section class="%s" style="font-size:%spx;color: %s;">%s</section>', $classe, get_field('resto_taille_police'), get_field('resto_couleur_chapeau'), get_field('resto_texte_chapeau') );
}
add_action('genesis_before_entry_content', 'resto_chapeau_apres_titre');

genesis();