<?php
// Template Name: Page avec boucle
//* Affichage nouvelle boucle après le contenu principal
add_action( 'genesis_entry_content', 'en_boucle_article', 15 );
function en_boucle_article()  {
// article du codex: http://codex.wordpress.org/Class_Reference/WP_Query
$ma_boucle = new WP_Query (
	array(
		'cat' => 4,
		'orderby' => 'title',
		'order' => 'ASC',
		'posts_per_page' => 10
	)
); // fin WP_Query 
?>

<?php	
// début loop $ma_boucle
while ( $ma_boucle->have_posts() ) : $ma_boucle->the_post(); ?>
	<article class="contenu-boucle">
	
		<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3> 
		<div class="visuel">
			<?php the_post_thumbnail('medium' ); ?>
		</div> 
		
		<div class="contenu-principal">
			<?php the_excerpt(); ?>
		</div>
	
	</article>
<?php endwhile;
wp_reset_postdata();
// fin loop $ma_boucle	
} // FIN function en_boucle_article()

genesis();