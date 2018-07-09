<?php
/**
 * Page d'accueil qui est appelée quand le réglage de lecture est sur:
 * La page d’accueil affiche : Les derniers articles
 * (Réglages > Lecture)
 *
 * @author Grégoire Noyelle
 * @package Sample Theme
 * @subpackage Customizations
 */

// Hook sur Genesis Meta. Ce hook est chargé très tôt dans la page.$
// Ce hook appelle la fonction cuisto_sample_home_genesis_meta
add_action( 'genesis_meta', 'cuisto_sample_home_genesis_meta' );
/**
 * Affiche les widgets si la zone Accueil - Haut de page (home-top) ou Accueil - Bas de page (home-bottom)
 * est active. Elles sont actives quand des widgets sont placés dans les zones.
 *
 */
function cuisto_sample_home_genesis_meta() {
	// Création de la condition pour voir si les zones sont actives.
	// Attention, c'est l'identifiant (id) qui est utilisé
	if ( is_active_sidebar( 'home-top' ) || is_active_sidebar( 'home-bottom' ) ) {
		//* Imposer la pleine largeur à la page
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
		//* Ajouter une classe dans la balise body.
		add_filter( 'body_class', 'gn_sample_body_class' );
		//* Retire le fil d'Ariane
		remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
		//* Enlève la boucle par défaut qui affichait les derniers articles
		remove_action( 'genesis_loop', 'genesis_do_loop' );
		//* Appeler la zone de widget home-top au même endroit que la boucle d'origine
		add_action( 'genesis_loop', 'gn_sample_home_top_widgets' );
		//* Appeler la zone de widget home-bottom avant la zone footer
		add_action( 'genesis_before_footer', 'gn_sample_home_bottom_widgets', 1 );
	}
}

//* Déclaration des fonctions sur mesure appelée dans la fonction cuisto_sample_home_genesis_meta

// Ajouter une classe gn-sample-home dans la balise body
function gn_sample_body_class( $classes ) {
	$classes[] = 'gn-sample-home';
	return $classes;
}
// Affichage de la zone de Widget home-top
function gn_sample_home_top_widgets() {
	genesis_widget_area( 'home-top', array(
		'before' => '<div class="home-top widget-area">',
		'after'  => '</div>',
	) );
}
// Affichage de la zone de widget home-bottom
function gn_sample_home_bottom_widgets() {
	genesis_widget_area( 'home-bottom', array(
		'before' => '<div class="home-bottom widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );
}

genesis();

