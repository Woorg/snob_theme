<?php
    use Carbon_Fields\Block;
    use Carbon_Fields\Field;

    add_action( 'carbon_fields_register_fields', function () {
        Block::make( __( 'Contacts block' ) )
            ->add_fields( array(
                Field::make( 'complex', 'contacts_list' )
                    ->add_fields( 'contacts', array(
                        Field::make( 'text', 'city', __('City') ),
                        Field::make( 'text', 'phone', __('Phone') ),
                        Field::make( 'text', 'text', __('Text') ),
                        Field::make( 'text', 'country', __('Country') ),
                    ) ),

                Field::make( 'text', 'title', 'Title' ),
                Field::make( 'textarea', 'text', 'Text' )
                    ->set_rows( 2 ),

                Field::make( 'text', 'button_text', __( 'Button text') ),
                Field::make( 'text', 'form_title', __( 'Form title') ),
                Field::make( 'text', 'form_shortcode', 'Form shortcode' )
            ))

            ->set_category( 'custom', __( 'Custom blocks' ), 'admin-page' )

            ->set_inner_blocks( true )
            ->set_inner_blocks_position( 'below' )

            ->set_render_callback( function ( $arg ) {
                 return snob_get_block_template('contacts', $arg);
            });

    });
