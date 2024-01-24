<?php

class class_google_shortcode {


    public function __construct(){

        add_shortcode( 'google_widget', array(&$this,'google_show_widget') );
    }

    public function google_show_widget ( $param = '' ){

        ob_start();
    	require CACHE_PATH.'/templates/temp_google_review.php';
  		$return = ob_get_contents();
        ob_end_clean();
        ob_end_flush();

	    return $return;

    }


}

?>