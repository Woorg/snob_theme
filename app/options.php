<?php

namespace App;

use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action('carbon_fields_register_fields', function () {
    Container::make('theme_options', __('Theme Options', 'sage'))
        ->add_fields(array(
            Field::make( 'image', 'logo_image', __( 'Logo image' ) ),
            Field::make( 'image', 'instagram_icon', __( 'Instagram icon' ) ),
            Field::make( 'text', 'instagram_url', __( 'Instagram URL' ) ),
            Field::make( 'image', 'telegram_icon', __( 'Telegram icon' ) ),
            Field::make( 'text', 'telegram_url', __( 'Telegram URL' ) ),
            Field::make( 'image', 'behance_icon', __( 'Behance icon' ) ),
            Field::make( 'text', 'behance_url', __( 'Behance URL' ) ),
            Field::make( 'text', 'copyright'),
            Field::make( 'text', 'yandex_map_coords', __( 'Yandex map coords' ))
        ));


});


// Load Carbon Fields
add_action('after_setup_theme', function () {
    \Carbon_Fields\Carbon_Fields::boot();
});
