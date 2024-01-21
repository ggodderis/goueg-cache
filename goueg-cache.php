<?php
/**
 * Plugin Name:       Goueg Cache
 * Description:       Version de test pour github
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

define( 'CACHE_PATH', plugin_dir_path( __FILE__ ) );

require 'vendor/autoload.php';

$google_settings = get_option('google_settings');

if( is_admin() ){

    $init = new google_options();

}else{

   // google_cache::initCache();

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