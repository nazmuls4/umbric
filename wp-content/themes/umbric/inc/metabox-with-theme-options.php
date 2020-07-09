<?php if ( ! defined( 'ABSPATH' ) ) { die; } 

function umbric_metabox_options( $options ) {

  $options      = array(); 

 // -----------------------------------------
// Page Metabox Options                    -
// -----------------------------------------
$options[]    = array(
  'id'        => 'umbric_page_option',
  'title'     => esc_html__( 'Page Breadcum Options', 'umbric' ),
  'post_type' => 'page',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'  => 'umbric_page_content',     

      'fields' => array(
         array(
          'id'    => 'enable_breadcum',
          'type'  => 'switcher',
          'title' => esc_html__('Enable Breadcum', 'umbric'),
          'default' => false,
          'desc' => esc_html__('Enable Custom Breadcum Area', 'umbric'),
        ),      
        array(
          'id'    => 'custom_page_title',
          'type'  => 'text',
          'title' => esc_html__('Custom breadcum title','umbric'),        
          'desc' =>  esc_html__('Type Custom breadcum title','umbric'), 
          'dependency'   => array( 'enable_breadcum', '==', 'true' ),
        ) ,   
      
        array(
          'id'    => 'breadcum_description',
          'type'  => 'textarea',
          'title' => esc_html__('Custom breadcum description','umbric'),        
          'desc' =>  esc_html__('Type Custom breadcum description','umbric'),
          'default' =>  esc_html__('We’re passionate about helping you curate a lifestyle that fits your unique needs, and creating financial solutions for every stage of life. We combine our services using an integrative approach to help you realize your financial dream.','umbric'),
          'dependency'   => array( 'enable_breadcum', '==', 'true' ),
        )    
 

      ), 
    ), 
  ),

);

 // -----------------------------------------
// Page Metabox Options                    -
// -----------------------------------------


  return $options;

}
add_filter( 'cs_metabox_options', 'umbric_metabox_options' );



// Framework Options

function umbric_framework_options( $options ) {

  $options      = array(); 
    
   

    $options[]   = array(
      'name'     => 'umbric_logo_options',
      'title'    => esc_html__( 'Logo Setting', 'umbric' ),
      'icon'     => 'fa fa-camera',
      'fields'      => array(

          // begin: a field
          array(
            'id'      => 'enable_logo',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Enable Site Logo', 'umbric' ),
            'desc'   => esc_html__( 'Do you want Enable Site Logo? If you want yes ? Just Enable the Switcher', 'umbric' ),
            'default'    => false,
          ),

          array(
            'id'      => 'upload_logo',
            'type'    => 'image',
            'title'   => esc_html__( 'Uplaod Logo', 'umbric' ),
            'desc'   => esc_html__( 'Do you want to Uplaod Logo? If you want Just Enable the Switcher', 'umbric' ),
            'help'   => esc_html__( 'Make sure your image size is : 120 By 62 px', 'umbric' ),
            'dependency'   => array( 'enable_logo', '==', 'true' ),
          ),
 
          

        ), // end: fields
    );


    $options[]   = array(
      'name'     => 'umbric_header_options',
      'title'    => esc_html__( 'Header Setting', 'umbric' ),
      'icon'     => 'fa fa-header',
      'fields'      => array(


             // begin: a field
              array(
                'id'              => 'header_info_box',
                'type'            => 'group',
                'title'           => esc_html__( 'Header info box', 'umbric' ),
                'button_title'    => 'Add New',
                'accordion_title' => esc_html__( 'Add New info box', 'umbric'),
                'fields'          => array(

                  array(
                    'id'      => 'info_box_icon',
                    'type'    => 'icon',
                    'title'   => esc_html__( 'Infobox Icon', 'umbric' ),
                    'desc'   => esc_html__( 'Select Infobox Icon', 'umbric' ),
                    'default'    => esc_attr__( 'fa fa-envelope', 'umbric' ),
                  ),
                  array(
                    'id'      => 'infobox_text',
                    'type'    => 'text',
                    'title'   => esc_html__( 'Infobox content', 'umbric' ),
                    'default'    => esc_html__( 'info@umbricsecurities.ca', 'umbric' ),
                  ),              
                       
                  array(
                    'id'      => 'infobox_link',
                    'type'    => 'text',
                    'title'   => esc_html__( 'Infobox link', 'umbric' ), 
                  ),              
                               
                 
                )
              ),



        ), // end: fields
    );

 
    $options[]   = array(
      'name'     => 'umbric_service_page_options',
      'title'    => esc_html__( 'Service Page Setting', 'umbric' ),
      'icon'     => 'fa fa-500px',
      'fields'      => array(
 

          array(
            'id'      => 'btn_icon',
            'type'    => 'icon',
            'title'   => esc_html__( 'Btn icon', 'umbric' ),
            'desc'   => esc_html__( 'Type Text Logo', 'umbric' ),
            'default'    => esc_html__( 'fa fa-envelope', 'umbric' ), 
          ),
          array(
            'id'      => 'btn_label',
            'type'    => 'text',
            'title'   => esc_html__( 'Btn label', 'umbric' ),
            'desc'   => esc_html__( 'Type Text Logo', 'umbric' ),
            'default'    => esc_html__( 'CONTACT US', 'umbric' ), 
          ),
          
          array(
            'id'      => 'btn_link',
            'type'    => 'text',
            'title'   => esc_html__( 'Btn label', 'umbric' ),
            'desc'   => esc_html__( 'Type Text Logo', 'umbric' ), 
          ),
          

        ), // end: fields
    );

    $options[]   = array(
      'name'     => 'umbric_blog_options',
      'title'    => esc_html__( 'Blog Setting', 'umbric' ),
      'icon'     => 'fa fa-bold',

          'sections' => array(


               array(
                  'name'      => 'text_options',
                  'title'     => 'Blog setting',
                  'icon'      => 'fa fa-check',

                  // begin: fields
                  'fields'    => array(



                      array(
                          'id'      => 'blog_feature_image',
                          'type'    => 'image',
                          'title'   => esc_html__( 'Blog Breadcum feature iamge', 'umbric' ),
                          'desc'   => esc_html__( 'Blog Breadcum feature iamge', 'umbric' ), 
                      ),

                      array(
                          'id'      => 'blog_title',
                          'type'    => 'text',
                          'title'   => esc_html__( 'Blog Breadcum title', 'umbric' ),
                          'desc'   => esc_html__( 'Type Blog Breadcum title', 'umbric' ),
                          'default'    => esc_html__( 'Our Blog', 'umbric' ), 
                      ),
                        
                      array(
                          'id'      => 'blog_description',
                          'type'    => 'textarea',
                          'title'   => esc_html__( 'Blog Breadcum Description', 'umbric' ),
                          'desc'   => esc_html__( 'Type Blog Breadcum Description', 'umbric' ),
                          'default'    => esc_html__( 'We’re passionate about helping you curate a lifestyle that fits your unique needs, and creating financial solutions for every stage of life. We combine our services using an integrative approach to help you realize your financial dream.', 'umbric' ), 
                      ),
                        

                  ),
              ),

            array(
                  'name'      => 'archive_options',
                  'title'     => 'Archive setting',
                  'icon'      => 'fa fa-check',

                  // begin: fields
                  'fields'    => array(



                      array(
                          'id'      => 'archive_feature_image',
                          'type'    => 'image',
                          'title'   => esc_html__( 'Archive Breadcum feature iamge', 'umbric' ),
                          'desc'   => esc_html__( 'Blog Breadcum feature iamge', 'umbric' ), 
                      ),

                      array(
                          'id'      => 'archive_description',
                          'type'    => 'textarea',
                          'title'   => esc_html__( 'Archive Breadcum Description', 'umbric' ),
                          'desc'   => esc_html__( 'Archive Breadcum Description', 'umbric' ),
                          'default'    => esc_html__( 'We’re passionate about helping you curate a lifestyle that fits your unique needs, and creating financial solutions for every stage of life. We combine our services using an integrative approach to help you realize your financial dream.', 'umbric' ), 
                      ),
                        

                  ),
              ),
            array(
                  'name'      => 'search_options',
                  'title'     => 'Search setting',
                  'icon'      => 'fa fa-check',

                  // begin: fields
                  'fields'    => array(



                      array(
                          'id'      => 'search_feature_image',
                          'type'    => 'image',
                          'title'   => esc_html__( 'Search Breadcum feature iamge', 'umbric' ),
                          'desc'   => esc_html__( 'Search Breadcum feature iamge', 'umbric' ), 
                      ), 

                  ),
              ),
            array(
                  'name'      => 'fourzero_options',
                  'title'     => 'Four zero setting',
                  'icon'      => 'fa fa-check',

                  // begin: fields
                  'fields'    => array(



                      array(
                          'id'      => 'fourzero_feature_image',
                          'type'    => 'image',
                          'title'   => esc_html__( 'Four zero Breadcum feature iamge', 'umbric' ),
                          'desc'   => esc_html__( 'Blog Breadcum feature iamge', 'umbric' ), 
                      ),

                      array(
                          'id'      => 'fourzero_description',
                          'type'    => 'textarea',
                          'title'   => esc_html__( 'Four zero Breadcum Description', 'umbric' ),
                          'desc'   => esc_html__( 'Archive Breadcum Description', 'umbric' ),
                          'default'    => esc_html__( 'We’re passionate about helping you curate a lifestyle that fits your unique needs, and creating financial solutions for every stage of life. We combine our services using an integrative approach to help you realize your financial dream.', 'umbric' ), 
                      ),
                        

                  ),
              ),


          ),// section end

          
         

    );


 

    $options[]   = array(
      'name'     => 'umbric_social_link_options',
      'title'    => esc_html__( 'Social Link Setting', 'umbric' ),
      'icon'     => 'fa fa-signal',
      'fields'      => array(

          // begin: a field
          array(
            'id'              => 'social_link',
            'type'            => 'group',
            'title'           => esc_html__( 'Social link', 'umbric' ),
            'button_title'    => 'Add New',
            'accordion_title' => esc_html__( 'Add New Social link', 'umbric'),
            'fields'          => array(

              array(
                'id'      => 'social_link_icon',
                'type'    => 'icon',
                'title'   => esc_html__( 'Social link Icon', 'umbric' ),
                'desc'   => esc_html__( 'Select Social link Icon', 'umbric' ),
                'default'    => esc_attr__( 'fa fa-facebook', 'umbric' ),
              ),
              array(
                'id'      => 'socialtextlink',
                'type'    => 'text',
                'title'   => esc_html__( 'Social link', 'umbric' ),
                'desc'   => esc_html__( 'Type Social link', 'umbric' ),
                'default'    => esc_html__( 'http://facebook.com/', 'umbric' ),
              ),              
                           
             
            )
          ),
          

        ), // end: fields
    );

  
    

    $options[]   = array(
      'name'     => 'umbric_footer_options',
      'title'    => esc_html__( 'Footer Setting', 'umbric' ),
      'icon'     => 'fa fa-bold',

          'sections' => array(


               array(
                  'name'      => 'footer_about_us',
                  'title'     => 'Footer about us Setting',
                  'icon'      => 'fa fa-check',

                  // begin: fields
                  'fields'    => array(   

                      array(
                        'id'      => 'footer_about_title',
                        'type'    => 'text', 
                        'title'   => esc_html__( 'Footer about title', 'umbric' ),
                        'desc'   => esc_html__( 'Type Footer about title', 'umbric' ),
                        'default'    => esc_html__( 'About Us', 'umbric' ),
                      ),

                      array(
                        'id'      => 'footer_about_desc',
                        'type'    => 'textarea',
                        'sanitize'    => false,
                        'title'   => esc_html__( 'Footer about description', 'umbric' ),
                        'desc'   => esc_html__( 'Type Footer about description', 'umbric' ),
                        'default'    => esc_html__( 'Lorem ipsum dolor sit amet, consectetur of Ur of the rebates, and vitality, so that the labor and sorrow, but some important things to do eiusmod tem por. Over the years come, who nostrud exercise, the school district work.', 'umbric' ),
                      ),


                        

                  ),
              ),

               array(
                  'name'      => 'opening_titme',
                  'title'     => 'Opening time',
                  'icon'      => 'fa fa-clock-o',

                  // begin: fields
                  'fields'    => array(   

                      array(
                        'id'      => 'opening_time_title',
                        'type'    => 'text', 
                        'title'   => esc_html__( 'Opening time title', 'umbric' ),
                        'desc'   => esc_html__( 'Type Opening time title', 'umbric' ),
                        'default'    => esc_html__( 'Opening Hours', 'umbric' ),
                      ),
                      array(
                        'id'      => 'opening_time_image',
                        'type'    => 'image', 
                        'title'   => esc_html__( 'Opening time image', 'umbric' ),
                        'desc'   => esc_html__( 'Type Opening time image', 'umbric' ), 
                      ),

                     array(
                          'id'              => 'opening_list',
                          'type'            => 'group',
                          'title'           => esc_html__( 'Footer opening list', 'umbric' ),
                          'button_title'    => 'Add New',
                          'accordion_title' => esc_html__( 'Add New Footer opening list', 'umbric'),
                          'fields'          => array(

                             
                            array(
                              'id'      => 'text',
                              'type'    => 'text',
                              'title'   => esc_html__( 'Type text', 'umbric' ),
                              'desc'   => esc_html__( 'Type text', 'umbric' ),
                              'default'    => esc_attr__( 'Mon - Sat 8:00 Am - 5:30 Pm', 'umbric' ),
                            ),
                                       
                           
                          )
                      ),

                        

                  ),
              ),


               array(
                  'name'      => 'footer_location',
                  'title'     => 'Footer location Setting',
                  'icon'      => 'fa fa-map-marker',

                  // begin: fields
                  'fields'    => array( 

                      array(
                        'id'      => 'location_title',
                        'type'    => 'text', 
                        'title'   => esc_html__( 'location title', 'umbric' ),
                        'desc'   => esc_html__( 'Type location title', 'umbric' ),
                        'default'    => esc_html__( 'Our Location', 'umbric' ),
                      ),

                       array(
                          'id'              => 'location_list',
                          'type'            => 'group',
                          'title'           => esc_html__( 'loccation list', 'umbric' ),
                          'button_title'    => 'Add New',
                          'accordion_title' => esc_html__( 'Add New loccation list', 'umbric'),
                          'fields'          => array(

                             
                            array(
                              'id'      => 'location_text',
                              'type'    => 'text',
                              'title'   => esc_html__( 'Loccation text', 'umbric' ),
                              'desc'   => esc_html__( 'Type text', 'umbric' ),
                              'default'    => esc_attr__( '2360 Bristol Circle #100, Oakville, ON L6H 6M5', 'umbric' ),
                            ),
                                  
                             
                            array(
                              'id'      => 'location_link',
                              'type'    => 'text',
                              'title'   => esc_html__( 'location link text', 'umbric' ),
                              'desc'   => esc_html__( 'Type location link text', 'umbric' ), 
                            ),
                                       
                           
                          )
                      ),

                        

                  ),
              ),

               array(
                  'name'      => 'copyright_option',
                  'title'     => 'Footer Copyright Setting',
                  'icon'      => 'fa fa-check',

                  // begin: fields
                  'fields'    => array(   
                      array(
                        'id'      => 'footer_copyright_text',
                        'type'    => 'textarea',
                        'sanitize'    => false,
                        'title'   => esc_html__( 'Footer Copyright text', 'umbric' ),
                        'desc'   => esc_html__( 'Type Footer Copyright text', 'umbric' ),
                        'default'    => esc_html__( '© Copyright Confido Wealth Management - 2020', 'umbric' ),
                      ),

                        

                  ),
              ),

            



          ),// section end

          
         

    );

 
  

  return $options;

}
add_filter( 'cs_framework_options', 'umbric_framework_options' );


// Framework Setting

function umbric_framework_settings( $settings ) {

  $settings      = array(); 

  $settings           = array(
    'menu_title'      => esc_html__( 'Theme Options', 'umbric'),
    'menu_type'       => 'theme', // menu, submenu, options, theme, etc.
    'menu_slug'       => 'umbric-theme-option',
    'ajax_save'       => true,
    'show_reset_all'  => true,
    'framework_title' => esc_html__( 'Umbric Theme Options by templateacademy', 'umbric'),
  );
  return $settings;

}
add_filter( 'cs_framework_settings', 'umbric_framework_settings' );




// Shortcode Setting
function umbric_shortcode_options( $options ) {

  $options      = array(); 

  return $options;

}
add_filter( 'cs_shortcode_options', 'umbric_shortcode_options' );

// Customize Setting
function umbric_customize_options( $options ) {

  $options      = array(); 

  return $options;

}
add_filter( 'cs_customize_options', 'umbric_customize_options' );


