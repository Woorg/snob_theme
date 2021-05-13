<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;


/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {

    // aos css
    // wp_enqueue_style('aos', get_template_directory_uri() . '/front/static/prod/assets/css/separate-css/aos.css', null);

    // magnific css
    // wp_enqueue_style('magnific', get_template_directory_uri() . '/front/static/dev/assets/css/separate-css/magnific-popup.css', null);


    // main css dev
    wp_enqueue_style('main', get_template_directory_uri() . '/front/static/dev/assets/css/main.css', null, random());

    // main css prod
    // wp_enqueue_style('main', get_template_directory_uri() . '/front/static/prod/assets/css/main.min.css', null);

    wp_enqueue_script('jquery');
    // wp_script_add_data('jquery-core', 'defer', true);
    // wp_script_add_data('jquery-core', 'async', true);

    wp_script_add_data('jquery-migrate', 'defer', true);
    wp_script_add_data('eio-lazy-load', 'defer', true);


    // aos js
    // wp_enqueue_script('aos', get_template_directory_uri() . '/front/static/prod/assets/js/separate-js/aos.js', null, '1.0', true);

    // wp_script_add_data('aos', 'defer', true);

    // magnific js
    // wp_enqueue_script('magnific', get_template_directory_uri() . '/front/static/dev/assets/js/separate-js/jquery.magnific-popup.min.js', null, '1.0', true);

    // wp_script_add_data('magnific', 'defer', true);

    wp_script_add_data('wp-polyfill', 'defer', true);
    wp_script_add_data('contact-form-7', 'defer', true);


    if ( is_home() || is_front_page()) {

        // Yandex maps
        wp_enqueue_script('ya-maps', 'https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=aba0a418-e4f2-4ee8-91f5-cba95332689d', null, '1.0', true);

        wp_script_add_data('ya-maps', 'defer', true);

        wp_localize_script('ya-maps', 'map', [
            'coords' => carbon_get_theme_option('yandex_map_coords')
        ]);
    }


    // main js dev
    wp_enqueue_script('main', get_template_directory_uri() . '/front/static/dev/assets/js/main.js', null, '1.0', true);

    // main js prod
    // wp_enqueue_script('main', get_template_directory_uri() . '/front/static/prod/assets/js/main.min.js', null, '1.0', true);

    wp_script_add_data('main', 'defer', true);


    /**
     * Ajax projects
     */

    // register our main script but do not enqueue it yet


    wp_register_script('load-more', app_path() . '/inc/js/myloadmore.js', null, '1.0', true);

    wp_localize_script('load-more', 'load_more_reviews', array(
        'ajaxurl' => admin_url('admin-ajax.php'), // WordPress AJAX
        'posts' => json_encode($query->query_vars), // everything about your loop is here
        'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
        'max_page' => $query->max_num_pages,
        'security' => wp_create_nonce('load_more'),
    ));

    wp_enqueue_script('load-more');

    wp_script_add_data('load-more', 'defer', true);
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */

    register_nav_menus([
        'primary_navigation' => __('Header menu', 'sage'),

    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');
    add_image_size('project_thumb', 1200, 500, true);
    add_image_size('about_thumb', 486, 565, true);


    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });


    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });


    // Carbon fields
    collect(glob(config('theme.dir') . '/app/fields/*.php'))
        ->map(function ($field) {
            return require_once($field);
        });


    // Carbon blocks
    collect(glob(config('theme.dir') . '/app/fields/blocks/*.php'))
        ->map(function ($field) {
            return require_once($field);
        });
});
