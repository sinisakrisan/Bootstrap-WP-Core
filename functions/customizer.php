<?php 

function core_customizer_settings($wp_customize) {
    
    /********************************
    **                             **
    *********    Sections     *******
    **                             **
    ********************************/
    
    $wp_customize->add_section( 'layout' , array(
    'title' =>  'Layout',
    'priority' => 10,
    ) );
    
    /********************************
    **                             **
    *********     Colors      *******
    **                             **
    ********************************/
    
    // navbar background
    $txtcolors[] = array(
        'slug'=>'navbar_color', 
        'default' => '#cecece',
        'label' => __( 'Navbar color', 'core' )
    );
    
    // footer background
    $txtcolors[] = array(
        'slug'=>'footer_color', 
        'default' => '#cecece',
        'label' => __( 'Footer color', 'core' )
    );
 
    // link color
    $txtcolors[] = array(
        'slug'=>'link_color', 
        'default' => '#008AB7',
        'label' => __( 'Link color', 'core' ),
    );
 
    // link color ( hover, active )
    $txtcolors[] = array(
        'slug'=>'hover_link_color', 
        'default' => '#9e4059',
        'label' => __( 'Hover link color', 'core' ),
    );
    
    
    // add the settings and controls for each color
    foreach( $txtcolors as $txtcolor ) {
 
        // SETTINGS
        $wp_customize->add_setting(
            $txtcolor['slug'], array(
                'default' => $txtcolor['default'],
                'type' => 'option', 
                'capability' => 'edit_theme_options'
            )
        );
        // CONTROLS
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                $txtcolor['slug'], 
                array('label' => $txtcolor['label'], 
                'section' => 'colors',
                'priority' => 20,
                'settings' => $txtcolor['slug'])
            )
        );
    }
    
    /********************************
    **                             **
    *********    Identity     *******
    **                             **
    ********************************/

    $wp_customize->add_setting('core_logo');
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'core_logo',
    array(
        'label' => __( 'Site Logo', 'core' ),
        'description' => __( 'Due the limitations in Bootstrap 4 Navbar height, logos are restricted to maximum height of 40px. Width is not restricted.', 'core' ),
        'section' => 'title_tagline',
        'settings' => 'core_logo',
    ) ) );
    
    /********************************
    **                             **
    *********     Navbar      *******
    **                             **
    ********************************/

    $wp_customize->add_setting( 'core_navbar_accent', 
    array(
        'default'    => 'light',
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        //'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
    ) );


    $wp_customize->add_control( new WP_Customize_Control(
    $wp_customize, 'core_navbar_accent',
    array(
        'label'      => __( 'Navbar Accent', 'core' ), 
        'description' => __( 'Change the navbar accent color', 'core' ),
        'settings'   => 'core_navbar_accent', 
        'priority'   => 10,
        'section'    => 'colors',
        'type'    => 'select',
        'choices' => array(
            'light' => 'Dark',
            'dark' => 'Light',
    ) ) ) );
    
    /********************************
    **                             **
    *********     Layout      *******
    **                             **
    ********************************/
    
    $wp_customize->add_setting( 'core_layout', 
    array(
        'default'    => '-fluid',
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        //'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
    ) );


    $wp_customize->add_control( new WP_Customize_Control(
    $wp_customize, 'core_layout',
    array(
        'label'      => __( 'Theme Layout', 'core' ), 
        'description' => __( 'Select preferred layout of the theme', 'core' ),
        'settings'   => 'core_layout', 
        'priority'   => 20,
        'section'    => 'layout',
        'type'    => 'radio',
        'choices' => array(
            '-fluid' => 'Fluid',
            '' => 'Fixed',
    ) ) ) );
    
    
    // Hero Area 
    // To be developed, comment out for time being
    /*
    
    $wp_customize->add_setting( 'core_hero_area', 
    array(
        'default'    => '0',
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        //'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
    ) );
    
    $wp_customize->add_control( new WP_Customize_Control(
    $wp_customize, 'core_hero_area',
    array(
        'label'      => __( 'Frontpage Hero', 'core' ), 
        'description' => __( 'Frontpage Hero Area enables widget position right under navbar on the home page. Perfect for your sliders. Hero area is always full width.', 'core' ),
        'settings'   => 'core_hero_area', 
        'priority'   => 30,
        'section'    => 'layout',
        'type'    => 'radio',
        'choices' => array(
            '0' => 'Disabled',
            '1' => 'Enabled',
    ) ) ) );
    */
}

add_action('customize_register', 'core_customizer_settings');

function core_custom_colors() {
    // Navbar color
    $navbar_color = get_option( 'navbar_color' );
    
    // Footer color
    $footer_color = get_option( 'footer_color' );
    
    // main color
    $main_color = get_option( 'main_color' );
 
    // secondary color
    $secondary_color = get_option( 'secondary_color' );
 
    // link color
    $link_color = get_option( 'link_color' );
 
    // hover or active link color
    $hover_link_color = get_option( 'hover_link_color' );
    
    /****************************************
    styling
    ****************************************/
    ?>
    <style>
        /* Navbar Background */
        .navbar-background {
            background-color: <?php echo $navbar_color; ?>; 
        }
        
        /* Footer Background */
        .footer-background {
            background-color: <?php echo $footer_color; ?>; 
            
        }
 
        /* links color */
        a:link, a:visited { 
            color:  <?php echo $link_color; ?>; 
        }
 
        /* hover links color */
        a:hover, a:active {
            color:  <?php echo $hover_link_color; ?>; 
        }
</style>
     
<?php
 
}
add_action( 'wp_head', 'core_custom_colors' );