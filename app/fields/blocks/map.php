<?php
    use Carbon_Fields\Block;
    use Carbon_Fields\Field;

    add_action( 'carbon_fields_register_fields', function () {
        Block::make( __( 'Map block' ) )
            ->add_fields( array(
                Field::make( 'textarea', 'address', 'Address' )
                    ->set_rows( 2 ),
                Field::make( 'textarea', 'work_time', 'Opening hours' )
                    ->set_rows( 2 )

            ))

            ->set_category( 'custom', __( 'Custom blocks' ), 'admin-page' )


            ->set_inner_blocks( true )
            ->set_inner_blocks_position( 'below' )

            ->set_render_callback( function ( $arg ) {
                 return get_block_template('map', $arg);
            });

    });
