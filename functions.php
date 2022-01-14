
function custom_enqueue_styles() {

	//ajax blog
	wp_enqueue_script( 'ajax-script', get_stylesheet_directory_uri() . '/js/script-ajax.js', array('jquery'),true );
	wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

}
add_action( 'wp_enqueue_scripts', 'custom_enqueue_styles', 20);
