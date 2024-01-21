<?php

class google_cache {

    public static function initCache () {

        $url = "https://maps.googleapis.com/maps/api/place/details/json?key=".API_KEY."&placeid=".PLACE_ID."&language=fr&reviews_sort=newest";
        $duree_cache = 3600 * 24;
        $cache = get_transient('my_google_review_key');

        if ( $cache === false ){

            $ch =   curl_init();
                    curl_setopt ($ch, CURLOPT_URL, $url);
                    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

            $cache = curl_exec ($ch);

            set_transient('my_google_review_key', $cache , $duree_cache );

        }
            $cache = json_decode($cache,true);
            echo '<pre>';
                print_r( $cache['result']['rating'] );
                print_r( $cache['result']['reviews'] );
            echo '</pre>';

    }
    
}