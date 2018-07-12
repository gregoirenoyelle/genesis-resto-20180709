<?php
// Template Name: Page avec boucle
//* Affichage nouvelle boucle après le contenu principal
add_action( 'genesis_entry_content', 'en_boucle_article', 15 );
function en_boucle_article()  {
// Variables
$html = ''; 	

// article du codex: http://codex.wordpress.org/Class_Reference/WP_Query
$ma_boucle = new WP_Query (
	array(
		'cat' => 4,
		'orderby' => 'title',
		'order' => 'ASC',
		'posts_per_page' => 10
	)
); // fin WP_Query 

// début loop $ma_boucle
while ( $ma_boucle->have_posts() ) : $ma_boucle->the_post(); 
	
	// Récupérer les données de la variable $post;
	global $post;
	// Afficher le contenu de la variable $post dans la boucle
	// d($post);
	$html .= '<article class="contenu-boucle">';
		
		$html .= sprintf( '<h3><a href="%s">%s</a></h3>', get_permalink(), get_the_title() );
		$html .= sprintf( '<div class="visuel">%s</div>', get_the_post_thumbnail( $post->ID, 'medium') );
		$html .= sprintf( '<div class="contenu-principal">%s</div>', get_the_excerpt() );
		// Afficher un contenu de l'objet $post.
		$html .= sprintf( '<h2>Article modifié le: %s</h2>', $post->post_modified );

	
	$html .= '</article>';

endwhile;
wp_reset_postdata();
// fin loop $ma_boucle	

// Afficher le HTML
echo $html;



} // FIN function en_boucle_article()

genesis();