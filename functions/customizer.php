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
        'default' => '#5c4186',
        'label' => 'Navbar Color'
    );
    
    // main color
    $txtcolors[] = array(
        'slug'=>'main_color', 
        'default' => '#000',
        'label' => 'Main Color'
    );
 
    // secondary color
    $txtcolors[] = array(
        'slug'=>'secondary_color', 
        'default' => '#666',
        'label' => 'Secondary Color'
    );
 
    // link color
    $txtcolors[] = array(
        'slug'=>'link_color', 
        'default' => '#008AB7',
        'label' => 'Link Color'
    );
 
    // link color ( hover, active )
    $txtcolors[] = array(
        'slug'=>'hover_link_color', 
        'default' => '#9e4059',
        'label' => 'Link Color (on hover)'
    );
    
    
    // add the settings and controls for each color
    foreach( $txtcolors as $txtcolor ) {
 
        // SETTINGS
        $wp_customize->add_setting(
            $txtcolor['slug'], array(
                'default' => $txtcolor['default'],
                'type' => 'option', 
                'capability' => 
                'edit_theme_options'
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
        'description' => __( 'Change the navbar accent color' ),
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
    
    /********************************
    **                             **
    *********     Slider      *******
    **                             **
    ********************************/
    
}

add_action('customize_register', 'core_customizer_settings');

function core_custom_colors() {
    // // Navbar color
    $navbar_color = get_option( 'navbar_color' );
    
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
        /* main color */
        #site-title a, h1, h2, h2.page-title, h2.post-title, h2 a:link, h2 a:visited, footer h3 { 
            color:  <?php echo $main_color; ?>; 
        } 
            
        /* Navbar Background */
        .navbar-background {
            background-color: <?php echo $navbar_color; ?>; 
        }
 
        /* secondary color */
        #site-description, .sidebar h3, h4, h5, h6 {
            color:  <?php echo $secondary_color; ?>; 
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