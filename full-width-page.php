<?php
/**
   Template Name:  Full-Width Template
 */
?>
<?php get_header(); ?>

    <main class="container">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="row">
                <div class="col-sm-12">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile; endif; ?>
    </main>

<?php get_footer(); ?>