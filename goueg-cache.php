<?php
/**
 * Plugin Name:       Goueg Google reviews
 * Description:       Affichage des avis google
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Grégory Godderis
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       goueg-cache
 *
 */

 // Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

define( 'GOOGLE_VERSION', '0.0018' );
define( 'CACHE_PATH', plugin_dir_path( __FILE__ ) );
define( 'CACHE_PATH_IMAGES', plugin_dir_url( __FILE__ ) );

require 'vendor/autoload.php';

$google_settings = get_option('google_settings');

/**
 * Si c'est l'admin
 */
if( is_admin() ){

    $init = new class_google_options();

}else{

    if( $google_settings ){

        define('PLACE_ID', $google_settings['place_id']);
        define('API_KEY', $google_settings['api_key']);

    /**
     * Initialisation du cache de google
     */
        add_action ('after_setup_theme', 'class_google_cache::initCache');

    /**
     * Ajout du short code pour afficher les reviews
     * @param [google_widget]
     */
        $shortcode = new class_google_shortcode();

    /**
     * Load des fichiers css et js
     */
        add_action('wp_enqueue_scripts','class_google_css_js::googleLoadCssJs', 10);

    }

}

/*
if( !is_admin() && isset($_GET['cache'])){

    function d4p_get_query_results() {

        // global $wpdb;

        if( $_GET['cache'] == 'remove' ){
            delete_transient('my_transient_key');
        }
    
        $cache = get_transient('my_transient_key');
    
        if ($cache === false) {
            
            $args = array(
                'post_type' => 'page',
                'posts_per_page' => 3,
            );
            $cache = new WP_Query( $args );
            //$data = $wpdb->get_results(' // SQL query // ');
            // $date = new DateTime('now',new DateTimeZone('Europe/Paris'));
            // $date = (clone $date)->format('H:i:s');
            // $data = 'Jeudi 19 Octobre '.$date;
            set_transient('my_transient_key', $cache , 30 ); //3600 * 24

            wp_reset_postdata();
        }


        if( $cache->have_posts() ) : 
            while ( $cache->have_posts() ) 
            : $cache->the_post();

            the_title();
            the_content();
            the_post_thumbnail();

            endwhile;
        endif;
    }

    add_action('init','d4p_get_query_results');

}
*/

?>