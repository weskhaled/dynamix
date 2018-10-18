<?php
namespace App;
/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
    // section Header
    $wp_customize->add_section(
      'header',
      array(
          'title' => 'Header',
          'description' => 'Change the header of the theme.',
          'priority' => 5,
      )
    );
    // logo
    $wp_customize->add_setting('upload_logo');
    $wp_customize->add_control(
      new \WP_Customize_Image_Control(
        $wp_customize,
        'upload_logo',
        array(
          'label' => 'Logo',
          'section' => 'header',
          'settings' => 'upload_logo',
          'transport' => 'postMessage'
        )
      )
    );
    // subnav bg color
    $wp_customize->add_setting( 'subnav_color',
      array(
        'default' => '#6b5388',
        'transport' => 'postMessage'
      )
    );
    $wp_customize->add_control( new \Skyrocket_Customize_Alpha_Color_Control( $wp_customize, 'subnav_color',
      array(
        'label' => __( 'SubNav background Color' ),
        // 'description' => esc_html__( 'Sample custom control description' ),
        'section' => 'header',
        'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
        'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
          '#000',
          '#fff',
          '#df312c',
          '#df9a23',
          '#eef000',
          '#7ed934',
          '#1571c1',
          '#6b5388'
        )
      )
    ) );
    // phone number
    $wp_customize->add_setting(
      'subnav_phonenumber',
      array(
        'default' => '+216 24 838 161',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
      )
    );
  
    $wp_customize->add_control(
      'subnav_phonenumber',
      array(
        'label' => 'Phone Number (for nav)',
        'section' => 'header',
        'settings' => 'subnav_phonenumber'
      )
    );
    // email subnav
    $wp_customize->add_setting(
      'subnav_email',
      array(
        'default' => 'weskhaled@gmail.com',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage'
      )
    );
  
    $wp_customize->add_control(
      'subnav_email',
      array(
        'label' => 'E-Mail Adress (for nav)',
        'section' => 'header',
        'settings' => 'subnav_email'
      )
    );
      // Submit cv btn link
    // Test of Dropdown Select2 Control (single select)
    $wp_customize->add_setting( 'submit_btn_link',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'absint'
    )
    );
    $wp_customize->add_control( new \Skyrocket_Dropdown_Posts_Custom_Control( $wp_customize, 'submit_btn_link',
      array(
        'label' => __( 'Select the Link for Submit btn', 'skyrocket' ),
        // 'description' => esc_html__( 'Sample Dropdown Posts custom control description', 'skyrocket' ),
        'section' => 'header',
        'input_attrs' => array(
          'posts_per_page' => -1,
          'orderby' => 'name',
          'order' => 'ASC',
          'post_type' => 'page'
        ),
      )
    ) );
    // fixed header
    $wp_customize->add_setting( 'header_fixed',
    array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'skyrocket_switch_sanitization'
    )
  );
  $wp_customize->add_control( new \Skyrocket_Toggle_Switch_Custom_control( $wp_customize, 'header_fixed',
    array(
      'label' => esc_html__( 'Toggle Fixed Header' ),
      'section' => 'header'
    )
  ) );

  // section IndexPage
  $wp_customize->add_section(
    'index_page',
    array(
        'title' => 'Index Page',
        'description' => 'Change the Index Page.',
        'priority' => 12,
    )
  );
  // about text
  $wp_customize->add_setting( 'index_about_section',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'wp_kses_post'
    )
  );
  $wp_customize->add_control( new \Skyrocket_TinyMCE_Custom_control( $wp_customize, 'index_about_section',
    array(
      'label' => __( 'About text' ),
      // 'description' => __( 'This is a TinyMCE Editor Custom Control' ),
      'section' => 'index_page',
      'input_attrs' => array(
        'toolbar1' => 'bold italic bullist numlist alignleft aligncenter alignright link',
        'toolbar2' => 'formatselect outdent indent | blockquote charmap',
      )
    )
  ) );
  // about btn link
  // Test of Dropdown Select2 Control (single select)
  $wp_customize->add_setting( 'about_btn_link',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'absint'
	)
  );
  $wp_customize->add_control( new \Skyrocket_Dropdown_Posts_Custom_Control( $wp_customize, 'about_btn_link',
    array(
      'label' => __( 'Select the Link for About btn', 'skyrocket' ),
      // 'description' => esc_html__( 'Sample Dropdown Posts custom control description', 'skyrocket' ),
      'section' => 'index_page',
      'input_attrs' => array(
        'posts_per_page' => -1,
        'orderby' => 'name',
        'order' => 'ASC',
        'post_type' => 'page'
      ),
    )
  ) );



});
/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});