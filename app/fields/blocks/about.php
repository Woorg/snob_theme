<?php
    use Carbon_Fields\Block;
    use Carbon_Fields\Field;

    add_action( 'carbon_fields_register_fields', function () {
        Block::make( __( 'About us block' ) )
            ->add_fields( array(
                Field::make( 'image', 'about_image', __( 'About Image' ) ),
                Field::make( 'rich_text', 'about_text', __( 'About text' ) ),

                Field::make( 'text', 'about_button_text', __( 'About button text' ) ),
                Field::make( 'text', 'about_button_link', __( 'About button email' ) ),

            ))

            ->set_category( 'custom', __( 'Custom blocks' ), 'admin-page' )

            ->set_inner_blocks( true )
            ->set_inner_blocks_position( 'below' )

            ->set_render_callback( function ( $arg ) {
                 return get_block_template('about', $arg);
            });

    });
