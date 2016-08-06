<?php get_header(); //index.php handles single/blog templating ?>
<main class="container">

  <?php
    global $wp_query;
    $total_results = $wp_query->found_posts;
    echo "<h2>" . $total_results . " found for " . $_GET["s"] . "</h2>";
  ?>
  <p>&nbsp;</p>
  <div class="row">
    <div class="col-sm-9">
      <?php if ( is_single() ) : // single post ?>
      <article>
        <h1><?php the_title() ;?></h1>
        <?php the_content(); ?>
      </article>
      <?php else : //list all posts ?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article>
          <h3>
          <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ydopbootstrap3' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
          </h3>
          <?php the_excerpt(); ?>
        </article>
        <hr />
      <div class="clearfix"></div>
      <?php endwhile; endif; ?>
      <?php endif; ?>
    </div>
    <div class="col-sm-3">
      <?php dynamic_sidebar( 'main-sidebar' ); ?>
    </div>
  </main>
  <?php get_footer(); ?>