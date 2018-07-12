<?php 
// A placer dans le fichier functions.php de votre thème
//* Contrôle si Advanced Custom Field est actif sur le site
if ( ! function_exists( 'get_field' ) ) {
	// Variable pour URL de la page Extension
	$no_acf_plugin_url = get_bloginfo('url') . '/wp-admin/plugins.php';
	// Notice dans le back-office au moment de la désactivation
	add_action('admin_notices','gn_warning_admin_missing_acf');
	function gn_warning_admin_missing_acf() {
       global $no_acf_plugin_url;
	   $output = '<div id="my-custom-warning" class="error fade">';
	   $output .= sprintf('<p><strong>Attention</strong>, ce site ne fonctionne pas sans l\'extension <strong>Advanced Custom Fields</strong>. Merci d\'activer cette <a href="%s">extension</a>.</p>', $no_acf_plugin_url);
	   $output .= '</div>';
	   echo $output;
	 }
	 
	// Notice dans le front qui masque tout le contenu et affiche le lien pour ce connecter
	add_action( 'template_redirect', 'gn_template_redirect_warning_missing_acf', 0 );
	function gn_template_redirect_warning_missing_acf() {
		global $no_acf_plugin_url;
		wp_die( sprintf( 'Ce site ne fonctionne pas sans l\'extension <strong>Advanced Custom Fields</strong>. Merci <a href="%s">d\'activer l\'extension</a>.', $no_acf_plugin_url ) );
	}
}