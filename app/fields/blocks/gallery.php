<?php
    use Carbon_Fields\Block;
    use Carbon_Fields\Field;

    add_action( 'carbon_fields_register_fields', function () {
        Block::make( __( 'Gallery block' ) )
            ->add_fields( array(
                Field::make( 'rich_text', 'text', 'Text' ),

                Field::make( 'complex', 'gallery' )
                    ->add_fields( array(
                        Field::make( 'textarea', 'gallery_caption', __( 'Gallery caption' ) )
                            ->set_rows( 4 ),

                        Field::make( 'complex', 'gallery_images' )

                            ->add_fields( array(
                                Field::make( 'image', 'gallery_image' ),
                            ))

                    )),

                ))


            ->set_category( 'custom', __( 'Custom blocks' ), 'admin-page' )

            ->set_inner_blocks( true )
            ->set_inner_blocks_position( 'below' )

            ->set_render_callback( function ( $arg ) {
                 return get_block_template('gallery', $arg);
            });

    });
