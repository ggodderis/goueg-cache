<?php

    $cache = get_transient('my_google_review_key');
    
    if( $cache ){

        $content    = '';
        $cache      = json_decode($cache,true);
        $reviews    = $cache['result']['reviews'];

        $nombre_avis   = $cache['result']['user_ratings_total'];
        $ratio         = $cache['result']['rating'];

        $pourcent      = ($ratio*2)*10;

        $etoiles_google = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 178 28.53">
        <defs>
        <linearGradient id="g_gradient_google" x1="0%" y1="0%" x2="100%" y2="0%">
          <stop offset="0%" stop-color="#d9b929"/>
          <stop offset="'.$pourcent.'%" stop-color="#d9b929"/>
          <stop offset="'.$pourcent.'%" stop-color="#d9b929"/>
          <stop offset="100%" stop-color="#ffffff"/>
        </linearGradient>
        </defs>
        <path class="g_gradient_google" d="M24.3,28.5L15,22.9l-9.3,5.7L8.2,18L0,10.9L10.8,10L15,0l4.2,10L30,10.9l-8.2,7.1L24.3,28.5z M61.3,28.5L52,22.9l-9.3,5.7
          L45.2,18L37,10.9L47.8,10L52,0l4.2,10L67,10.9l-8.2,7.1L61.3,28.5z M98.3,28.5L89,22.9l-9.3,5.7L82.2,18L74,10.9L84.8,10L89,0
          l4.2,10l10.8,0.9l-8.2,7.1L98.3,28.5z M135.3,28.5l-9.3-5.7l-9.3,5.7l2.5-10.6l-8.2-7.1l10.8-0.9L126,0l4.2,10l10.8,0.9l-8.2,7.1
          L135.3,28.5z M172.3,28.5l-9.3-5.7l-9.3,5.7l2.5-10.6l-8.2-7.1l10.8-0.9L163,0l4.2,10l10.8,0.9l-8.2,7.1L172.3,28.5z"/>
        <path class="g_contour" d="M89,2.6l3.2,7.8l0.2,0.6l0.6,0l8.4,0.7l-6.4,5.5l-0.5,0.4l0.1,0.6l2,8.2L89.5,22L89,21.7L88.5,22l-7.2,4.4l2-8.2l0.1-0.6
          l-0.5-0.4l-6.4-5.5l8.4-0.7l0.6,0l0.2-0.6L89,2.6 M52,2.6l3.2,7.8l0.2,0.6l0.6,0l8.4,0.7l-6.4,5.5l-0.5,0.4l0.1,0.6l2,8.2L52.5,22
          L52,21.7L51.5,22l-7.2,4.4l2-8.2l0.1-0.6l-0.5-0.4l-6.4-5.5l8.4-0.7l0.6,0l0.2-0.6L52,2.6 M15,2.6l3.2,7.8l0.2,0.6l0.6,0l8.4,0.7
          l-6.4,5.5l-0.5,0.4l0.1,0.6l2,8.2L15.5,22L15,21.7L14.5,22l-7.2,4.4l2-8.2l0.1-0.6l-0.5-0.4l-6.4-5.5l8.4-0.7l0.6,0l0.2-0.6L15,2.6
          M163,2.6l3.2,7.8l0.2,0.6l0.6,0l8.4,0.7l-6.4,5.5l-0.5,0.4l0.1,0.6l2,8.2l-7.2-4.4l-0.5-0.3l-0.5,0.3l-7.2,4.4l2-8.2l0.1-0.6
          l-0.5-0.4l-6.4-5.5l8.4-0.7l0.6,0l0.2-0.6L163,2.6 M126,2.6l3.2,7.8l0.2,0.6l0.6,0l8.4,0.7l-6.4,5.5l-0.5,0.4l0.1,0.6l2,8.2
          l-7.2-4.4l-0.5-0.3l-0.5,0.3l-7.2,4.4l2-8.2l0.1-0.6l-0.5-0.4l-6.4-5.5l8.4-0.7l0.6,0l0.2-0.6L126,2.6 M89,0l-4.2,10L74,10.9
          l8.2,7.1l-2.5,10.6l9.3-5.7l9.3,5.6l-2.5-10.6l8.2-7.1L93.1,10L89,0L89,0z M52,0l-4.2,10L37,10.9l8.2,7.1l-2.5,10.6l9.3-5.7l9.3,5.6
          l-2.5-10.6l8.2-7.1L56.1,10L52,0L52,0z M15,0l-4.2,10L0,10.9L8.2,18L5.7,28.5l9.3-5.7l9.3,5.6l-2.5-10.6l8.2-7.1L19.1,10L15,0L15,0z
          M163,0l-4.2,10L148,10.9l8.2,7.1l-2.5,10.6l9.3-5.7l9.3,5.6l-2.5-10.6l8.2-7.1L167.1,10L163,0L163,0z M126,0l-4.2,10L111,10.9
          l8.2,7.1l-2.5,10.6l9.3-5.7l9.3,5.6l-2.5-10.6l8.2-7.1L130.1,10L126,0L126,0z"/>
        </svg>';

        $content    .= '<div id="g_content">'.
                        '<h1 class="g_h1">Mes avis clients sur Google</h1>'.
                        '<div class="g_sous_titre">'.
                            '<b class="g_bleu">Google</b>&nbsp;évaluation&nbsp;'.
                                $ratio.'/5 <div class="g_sous_titre_stars">'.$etoiles_google.'</div> sur '.$nombre_avis.' avis'.
                        '</div>'.
                        '<div id="g_navig"><button type="button" id="prev"><</button><button type="button" id="next">></button></div>'.
                        '<div id="g_content_scroll">'.
                            '<div id="g_scroll">';

        foreach( $reviews as $value ):

        $content .= '<div class="g_vignette">'.
                        '<div class="g_header_comment">'.
                            '<img class="g_thumbnail" src="'.$value['profile_photo_url'].'" />'.
                            '<div class="g_infos">'.
                                '<div class="g_author">'.$value['author_name'].'</div>'.
                                '<div class="g_date">'.$value['relative_time_description'].'</div>'.
                                '<img class="g_stars" src="'.CACHE_PATH_IMAGES.'images/etoiles_'.$value['rating'].'.svg" width="128" height="128" />'.
                            '</div>'.
                        '</div>'.
                            '<div class="g_text">'.$value['text'].'</div>'.
                            '<div class="g_signature">'.
                                '<img src="'.CACHE_PATH_IMAGES.'/images/logo_google_small.png" alt="Google" width="10" height="10">'.
                                '&nbsp;<span class="g_bleu">Posté sur Google</span>'.
                                '</div>'.
                    '</div>';

        endforeach;

        $content .=         '</div>'.
                        '</div>'.
                        '<a class="g_button" href="https://www.google.com/search?hl=fr-FR&gl=fr&q=goueg.fr+-+Gr%C3%A9gory+Godderis,+268+chemin+des+traversi%C3%A8res,+38190+Les+Adrets&ludocid=998116345690223306&lsig=AB86z5WL2COJR-do2jTy5RlnVQ8Q#lrd=0x478a5be4c202d92b:0xdda0587356072ca,1,,,,1" title="Voir tous les avis Google sur goueg.fr">Voir tous les avis</a>'.
                    '</div>';

        echo $content;

    }else{
        return false;
    }

?>