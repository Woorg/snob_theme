import svg4everybody from 'svg4everybody';
// import Swup from 'swup';
// import SwupBodyClassPlugin from '@swup/body-class-plugin';
// import SwupScrollPlugin from '@swup/scroll-plugin';
// import SwupFadeTheme from '@swup/fade-theme';

// import SwupPreloadPlugin from '@swup/preload-plugin';
// import SwupScriptsPlugin from '@swup/scripts-plugin';

import Nav from '../../blocks/nav/nav';
import Map from '../../blocks/map/map';


(function ($) {

    svg4everybody();


    let styles = [
      'padding: 2px 9px',
      'background: #1b1e64',
      'color: #fff',
      'display: inline-block',
      'box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.2) inset, 0 5px 3px -5px rgba(0, 0, 0, 0.5), 0 -13px 5px -10px rgba(255, 255, 255, 0.4) inset',
      'line-height: 1.52',
      'text-align: left',
      'font-size: 14px',
      'font-weight: 400'
    ].join(';');

    console.log('%c developed by igor gorlov https://gorlov.gq', styles);


    /**
     * Swup
     */

    // const swup = new Swup({
    //   containers: ['#swup'],
    //   plugins: [
    //     new SwupBodyClassPlugin(),
    //     new SwupScrollPlugin({
    //       animateScroll: true
    //     }),

    //     new SwupScriptsPlugin(),

    //     new SwupFadeTheme(),
    //   ]
    // });

    /**
     * Scroll animation
     */

    // AOS.init({
    //   duration: 1200,
    //   startEvent: 'DOMContentLoaded',
    // });


    /**
     * Nav
     */

    const nav = new Nav()


    /**
     Map
    */

    const $mapContainer = document.querySelector('.map')

    if ( $mapContainer ) {
      const map = Map()

    }


})(jQuery);
