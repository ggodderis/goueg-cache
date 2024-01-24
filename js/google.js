document.addEventListener("DOMContentLoaded", function() {

    var vignetteWidth = 310;
    var largeur = document.querySelector('#g_content_scroll').offsetWidth;

    window.addEventListener('resize', function(event) {
        largeur = document.querySelector('#g_content_scroll').offsetWidth;
    }, true);

    console.log( Math.round(largeur / vignetteWidth) );

    const container = document.querySelector('#g_content_scroll');
    const next = document.querySelector('#next');
    const prev = document.querySelector('#prev');

    next.addEventListener('click', bouge, false );
    prev.addEventListener('click', bouge, false );

    function bouge(event) {

        let sans = event.currentTarget.id;
        let pas = Math.round(largeur / vignetteWidth);
        let positionScroll = container.scrollLeft;
        let scroll = null;

        switch ( sans ){
            case 'next':
                scroll = positionScroll+vignetteWidth;
                console.log('suivante', container.scrollLeft, scroll );
                //container.scrollLeft = vignetteWidth;
                break;
            case 'prev':
                scroll = positionScroll-vignetteWidth;
                console.log('précédante', container.scrollLeft, scroll );
                //container.scrollLeft = positionScroll-(pas*vignetteWidth);
                break;
        }
        container.scrollLeft = scroll;
        // let pas = Math.round(largeur / vignetteWidth);
        // let scroll = (largeur - position);
        // console.log(scroll);
        // container.scrollLeft = scroll;

    }

  });