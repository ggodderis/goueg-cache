<?php

class google_cache {

    public static function initCache () {

        echo 'initCache';

        $cache = get_transient('my_google_review_key');

        if ($cache === false){

            $cache = json_encode('objet google review');

            set_transient('my_google_review_key', $cache , 30 ); //3600 * 24
        }

        print_r( $cache );

    }
    
}