<?php
//* Modèle qui s'applique à toutes les pages
/* 
	Attention pour optimiser le site, vous pourriez créer un modèle de page (Template Name...) au lieu d'un modèle pour toutes les pages. 
*/ 


// Fonction pour masquer le titre dans la page
/***
 * genesis_meta est appelé au moment de la 
 * création de la balise head dans le HTML
 */
add_action('genesis_meta', 'cuisto_masquer_titre');
function cuisto_masquer_titre() {
	// Champ Vrai / Faux ACF
	$masquer_titre = get_field('page_masquer_le_titre');
	// var_dump($masquer_titre); exit;
	// pour enlever le titre si la case à cocher est active
	if ( $masquer_titre ) {
		remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
	}	
}


// Fonctions pour appliquer du css sur titre
add_action('wp_head', 'cuisto_css_titre', 999);
function cuisto_css_titre() { 

// Déclaration des variables
$couleur = get_field('page_changer_couleur_titre');
$taille = get_field('page_taille_titre');

// var_dump($taille); exit;
// print_r($taille); exit;

?>
	<style type="text/css">
		.entry-title {
			font-size: <?php echo $taille; ?>rem;
			color: <?php echo $couleur; ?>;
		}
	</style>

<?php } // FIN function cuisto_css_titre()


genesis();
















?>