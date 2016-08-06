<?php get_header(); //index.php handles single/blog templating ?>
<main class="container">

  <div class="row">
    <div class="col-sm-9">
    <?php if ( is_single() ) : // single post ?>
      <article>
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
        <h1><?php the_title() ;?></h1>
        <?php the_content(); ?>
      </article>
    <?php else : //list all posts ?>
    <h1>Blog</h1>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="col-md-4 col-double-pad">
      <article>
        <?php if ( has_post_thumbnail() ) : ?>
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail(); ?>
          </a>
        <div class="clear"></div>
        <?php endif; ?>
        <h3>
          <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ydopbootstrap3' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h3>
        <?php the_excerpt(); ?>
      </article>
    </div>
      <?php endwhile; endif; ?>
  <?php endif; ?>
  <div class="pagination">
    <?php echo paginate_links(); ?>
  </div>
  </div>
  <div class="col-sm-3">
    <?php dynamic_sidebar( 'blog-sidebar' ); ?>
  </div>
</main>
<?php get_footer(); ?>