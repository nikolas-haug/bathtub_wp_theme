<?php 

function bathtub_customize_register( $wp_customize ) {
    //All our sections, settings, and controls will be added here - defaults should match $variables
    $colors = array();
    $colors[] = array(
    'slug'=>'content_text_color', 
    'default' => '#fff',
    'label' => __('Content Text Color', 'bathtub')
    );
    $colors[] = array(
    'slug'=>'content_link_color', 
    'default' => '#3C2E37',
    'label' => __('Content Link Color', 'bathtub')
    );
    foreach( $colors as $color ) {
    // SETTINGS
    $wp_customize->add_setting(
        $color['slug'], array(
        'default' => $color['default'],
        'type' => 'option', 
        'capability' => 
        'edit_theme_options'
        )
    );
    // CONTROLS
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        $color['slug'], 
        array('label' => $color['label'], 
        'section' => 'colors',
        'settings' => $color['slug'])
        )
    );
    }
  }
add_action( 'customize_register', 'bathtub_customize_register' );