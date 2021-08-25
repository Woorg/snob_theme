<?php
    use Carbon_Fields\Block;
    use Carbon_Fields\Field;

    add_action( 'carbon_fields_register_fields', function () {
        Block::make( __( 'My books block' ) )
            ->add_fields( array(
                Field::make( 'rich_text', 'text', 'Text' )

            ))

            ->set_category( 'custom', __( 'Custom blocks' ), 'admin-page' )

            ->set_inner_blocks( true )
            ->set_inner_blocks_position( 'below' )

            ->set_render_callback( function ( $arg ) {
                 return snob_get_block_template('my-books', $arg);
            });

    });
