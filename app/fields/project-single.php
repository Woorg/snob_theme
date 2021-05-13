<?php

namespace App;

use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action('carbon_fields_register_fields', function () {

    Container::make('post_meta', __('Project meta', 'sage'))
        ->where('post_type', '=', 'project')
        ->add_fields([
            Field::make('text', 'project_subtitle', __('Project location')),
            Field::make('media_gallery', 'project_gallery', __('Project Gallery'))
                ->set_type('image')
                ->set_duplicates_allowed( false )
        ]);
});


// Load Carbon Fields

// \Carbon_Fields\Carbon_Fields::boot();
