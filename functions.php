<?php

////////////////////////////////////////////////////////////////////
// Frontend Admin bar toggle
////////////////////////////////////////////////////////////////////

    show_admin_bar( false );

////////////////////////////////////////////////////////////////////
// Theme Information
////////////////////////////////////////////////////////////////////

    $themename = "yboot";
    $developer_uri = "http://www.ydop.com";
    $shortname = "yBoot";

////////////////////////////////////////////////////////////////////
// Enqueue styles
////////////////////////////////////////////////////////////////////
    function yboot_theme_stylesheets(){
        wp_register_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css', array(), null, 'all' );
        wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css', array(), null, 'all' );

        wp_enqueue_style( 'bootstrap');
        wp_enqueue_style( 'font-awesome');

        wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), array(), null, 'all' );
    }
    add_action('wp_enqueue_scripts', 'yboot_theme_stylesheets');


////////////////////////////////////////////////////////////////////
// Enqueue javascripts
////////////////////////////////////////////////////////////////////
    function yboot_theme_js(){        
        wp_enqueue_script('bootstrap','https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js' ,array('jquery'),null,true);
    }
    add_action('wp_enqueue_scripts', 'yboot_theme_js');

////////////////////////////////////////////////////////////////////
// Register Menus
////////////////////////////////////////////////////////////////////

    register_nav_menus(array(
        'main_menu' => 'Main Menu'
    ));

////////////////////////////////////////////////////////////////////
// Register Sidebar(s)
////////////////////////////////////////////////////////////////////

    register_sidebar(array(
        'name' => 'Main Sidebar',
        'id' => 'main-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Blog Sidebar',
        'id' => 'blog-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
////////////////////////////////////////////////////////////////////
// Add support for a featured image and the size
////////////////////////////////////////////////////////////////////

    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size(300,300, true);

////////////////////////////////////////////////////////////////////
// Add support shortcodes in text widgets
////////////////////////////////////////////////////////////////////

    add_filter('widget_text', 'do_shortcode');

////////////////////////////////////////////////////////////////////
// SEO / code clean-up / optimization
////////////////////////////////////////////////////////////////////

    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action('wp_head', 'wp_generator');
    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
    //remove_action( 'wp_head', 'feed_links_extra', 3 ); // Uncomment if no blog
    //remove_action( 'wp_head', 'feed_links', 2 ); // Uncomment if no blog
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );  // oEmbed and REST are all related to WordPress "embed" feature that is very rarely used
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

    //Removes version query strings from css/js files
    function remove_cssjs_ver( $src ) {
        if( strpos( $src, '?ver=' ) )
            $src = remove_query_arg( 'ver', $src );
        return $src;
    }
    add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
    add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );

////////////////////////////////////////////////////////////////////
// Main nav clean-up
////////////////////////////////////////////////////////////////////

    function nav_class_filter( $classesArray ) { 
            foreach($classesArray as $index=>$class){
                //Strip any other "menu-" classes
                if(strpos($class, 'menu-') !== false || strpos($class, 'page-') !== false || strpos($class, 'page_') !== false){
                    unset($classesArray[$index]);
                }
                //Add active class if current or current parent menu item
                if(strpos($class, 'current-menu-parent') !== false || strpos($class, 'current-menu-item') !== false ){
                    $classesArray[$index] = 'active';
                }
                //Add dropdown (for bootstrap) class if menu item has children
                if(strpos($class, 'menu-item-has-children') !== false ){
                    $classesArray[$index] = 'dropdown';
                }
            }
        return $classesArray;
    }

    add_filter('nav_menu_css_class', 'nav_class_filter', 100, 1);

////////////////////////////////////////////////////////////////////
// Add Bootstrap styles to Gravity Forms
////////////////////////////////////////////////////////////////////

    add_filter("gform_field_content", "bootstrap_styles_for_gravityforms_fields", 10, 5);
    function bootstrap_styles_for_gravityforms_fields($content, $field, $value, $lead_id, $form_id){
        
        // Currently only applies to most common field types, but could be expanded.
        
        if($field["type"] != 'hidden' && $field["type"] != 'list' && $field["type"] != 'multiselect' && $field["type"] != 'checkbox' && $field["type"] != 'fileupload' && $field["type"] != 'date' && $field["type"] != 'html' && $field["type"] != 'address') {
            $content = str_replace('class=\'medium', 'class=\'form-control medium', $content);
        }
        
        if($field["type"] == 'name' || $field["type"] == 'address' || $field["type"] == 'text' || $field["type"] == 'email' || $field["type"] == 'phone') {
            $content = str_replace('<input ', '<input class=\'form-control\' ', $content);
        }
        
        if($field["type"] == 'textarea') {
            $content = str_replace('class=\'textarea', 'class=\'form-control textarea', $content);
        }
        
        if($field["type"] == 'checkbox') {
            $content = str_replace('li class=\'', 'li class=\'checkbox ', $content);
            $content = str_replace('<input ', '<input style=\'margin-left:1px;\' ', $content);
        }
        
        if($field["type"] == 'radio') {
            $content = str_replace('li class=\'', 'li class=\'radio ', $content);
            $content = str_replace('<input ', '<input style=\'margin-left:1px;\' ', $content);
        }
        
        return $content;
        
    } // End bootstrap_styles_for_gravityforms_fields()
    
    add_filter("gform_submit_button", "form_submit_button", 10, 2);

    function form_submit_button($button, $form){
        return "<button class='button btn btn-lg btn-default' id='gform_submit_button_{$form["id"]}'><span>Submit</span></button>";
    }



    
?>