<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <title>
        <?php
        global $page, $paged;
        wp_title( '|', true, 'right' );
        ?>
        </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="referrer" content="unsafe-url">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <!-- Tag Manager -->
        <!-- /Tag Manager -->

        <header>                
            <div class="branding-header">
                <div class="container">
                    <a class="logo" href="/">
                        <img class="img-responsive" src="https://placeholdit.imgix.net/~text?w=160&h=100&txt=160x100&txtsize=20" alt="Logo" height="120" />
                    </a>
                    <div class="phone">
                        <a href="tel:" class="phone btn btn-primary hidden-sm hidden-md hidden-lg"><i class="fa fa-phone"></i> Call Us</a>
                        <a href="tel:" class="phone hidden-xs"><i class="fa fa-phone "></i> 000-000-000</a>
                    </div>                                
                </div>
            </div>
            <nav class="navbar navbar-default">
                    <?php wp_nav_menu( array(
                        'theme_location'    => 'main_menu',
                        'depth'             => 2,
                        'container_class'   => 'container',
                        'menu_class'        => 'nav navbar-nav')
                    ); ?>
            </nav>
            <script type="text/javascript">
                jQuery(document).ready(function( $ ) {
                        //Sticky header
                        var headerHeight = $("body>header").height();
                        $("html").attr('style', 'margin-top: ' + headerHeight + 'px !important');

                        //Add more-menu button
                        $(".navbar-default .navbar-nav").append('<li class="more-btn fa-ellipsis-v"><a href="#">More</a></li>');

                        //Make more-menu button "active" if child is
                        if($(".more").hasClass("active")){$(".more-btn").addClass("active"); }

                        //Build more-menu when clicked, retain active states
                        $(".more-btn").click(function(){
                            $(this).toggleClass("on");
                            if($(this).hasClass("on")){
                                $(".more").clone().removeClass("remove").addClass("more-item").appendTo(".navbar-default .navbar-nav");                            
                            }else{
                                $(".more-item").remove();
                            }
                        });

                        //Init Sub Menus
                        $(".navbar-default .dropdown").each(function(){
                            $(this).find("a").first().attr("data-toggle", "dropdown").addClass("dropdown-toggle");
                            $(this).find(".sub-menu").addClass("dropdown-menu").removeClass("sub-menu");
                        });
                });
            </script>
        </header>