<?php

class class_google_css_js {

    public static function googleLoadCssJs (){

        wp_enqueue_style('google-style',CACHE_PATH_IMAGES.'/css/google_style.css',array(),GOOGLE_VERSION,'all');
        wp_enqueue_script(
            'google-js',
            CACHE_PATH_IMAGES. '/js/google.js',
            array(),GOOGLE_VERSION,true);
    }

}

?>