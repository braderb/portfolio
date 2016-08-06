<?php get_header(); ?>

    <div class="hero hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-8">
                    <h2>Prominent heading</h2>
                    <p>Product or service benefit</p>
                    <a href="/about" class="btn btn-warning">Call To Action&nbsp;&nbsp;<i class="fa fa-chevron-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <main class="container">
            <?php the_content(); ?>
        </main>
    <?php endwhile; endif; ?>




    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-pad-triple">
                <a href="/"><img src="https://placeholdit.imgix.net/~text?w=360&h=220&txt=360x220&txtsize=20" class="img img-responsive"></a>
                <p>Paragraph Lead - Spread me all over with apple busser a piece of bread. Fill kettle carve rocking chair. Tie bonnet avert eyes walk plow field.</p>
                <a href="/blog" class="btn btn-primary pull-right">Service 1 <i class="fa fa-chevron-circle-right"></i></a>
            </div>
            <div class="col-sm-4 col-pad-triple">
                <a href="/"><img src="https://placeholdit.imgix.net/~text?w=360&h=220&txt=360x220&txtsize=20" class="img img-responsive"></a>
                <p>Paragraph Lead - Spread me all over with apple busser a piece of bread. Fill kettle carve rocking chair. Tie bonnet avert eyes walk plow field.</p>
                <a href="/blog" class="btn btn-primary pull-right">Service 2 <i class="fa fa-chevron-circle-right"></i></a>
            </div>
            <div class="col-sm-4 col-pad-triple">
                <a href="/"><img src="https://placeholdit.imgix.net/~text?w=360&h=220&txt=360x220&txtsize=20" class="img img-responsive"></a>
                <p>Paragraph Lead - Spread me all over with apple busser a piece of bread. Fill kettle carve rocking chair. Tie bonnet avert eyes walk plow field.</p>
                <a href="/blog" class="btn btn-primary pull-right">Service 3 <i class="fa fa-chevron-circle-right"></i></a>
            </div>
        </div>
    </div>


    <div class="fluid-bg">
        <div class="container">
            <div class="row flex-middle">
                <div class="col-sm-8 col-sm-offset-2">
                    <h4>“Here is customer testiomnial... This company has great customer service.”</h4>
                    <p class="text-right"><em>— John Doe, CEO Company</em></p>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2>H2 Heading</h2>
                <p>Mow grass in bare feet toes all. Spread me all over with apple busser a piece of bread. Fill kettle carve rocking chair. Tie bonnet avert eyes walk plow field. Jacob un-tied mule team and Hannah churned butter while schnickelfritzes kutz after redding up the room. Kissing don’t last, cooking do. Throw the horse over the fence some hay. Quit rutsching preacher says sit up straight, six-hour sermon Sundays.</p>
            </div>
            <div class="col-sm-6">
                <h2>H2 Heading</h2>
                <p>Mow grass in bare feet toes all. Spread me all over with apple busser a piece of bread. Fill kettle carve rocking chair. Tie bonnet avert eyes walk plow field. Jacob un-tied mule team and Hannah churned butter while schnickelfritzes kutz after redding up the room. Kissing don’t last, cooking do. Throw the horse over the fence some hay. Quit rutsching preacher says sit up straight, six-hour sermon Sundays.</p>
            </div>
        </div>
    </div>

    <div class="fluid-bg">
        <div class="container">
            <div class="row home-testimonials-content">
                <div class="col-sm-4 text-left">
                    <p class="text-center"><i class="fa fa-2x fa-star"></i>&nbsp;<i class="fa fa-2x fa-star"></i>&nbsp;<i class="fa fa-2x fa-star"></i>&nbsp;<i class="fa fa-2x fa-star"></i>&nbsp;<i class="fa fa-2x fa-star"></i></p>
                    <p>Here is a thing about a thing about a place with a person.</p>
                    <p class="text-right"><strong>—CoolPlaceThing</strong></p>
                </div>
                <div class="col-sm-4 text-left">
                    <p class="text-center"><i class="fa fa-2x fa-star"></i>&nbsp;<i class="fa fa-2x fa-star"></i>&nbsp;<i class="fa fa-2x fa-star"></i>&nbsp;<i class="fa fa-2x fa-star"></i>&nbsp;<i class="fa fa-2x fa-star"></i></p>
                    <p>Here is a thing about a thing about a place with a person.</p>
                    <p class="text-right"><strong>—CoolPlaceThing</strong></p>
                </div>
                <div class="col-sm-4 text-left">
                    <p class="text-center"><i class="fa fa-2x fa-star"></i>&nbsp;<i class="fa fa-2x fa-star"></i>&nbsp;<i class="fa fa-2x fa-star"></i>&nbsp;<i class="fa fa-2x fa-star"></i>&nbsp;<i class="fa fa-2x fa-star"></i></p>
                    <p>Here is a thing about a thing about a place with a person.</p>
                    <p class="text-right"><strong>—CoolPlaceThing</strong></p>
                </div>
            </div>
            <div class="text-right"><a href="https://plus.google.com/+Ydopmarketing/about" target="_blank" class="btn btn-info">More Testimonials <i class="fa fa-chevron-circle-right"></i></a></div>
        </div>
    </div>



    <div class="container">
        <h3>H3 Heading (Blog Area)</h3>
        <p>Mow grass in bare feet toes all. Spread me all over with apple busser a piece of bread. Fill kettle carve rocking chair. Tie bonnet avert eyes walk plow field. Jacob un-tied mule team and Hannah churned butter while schnickelfritzes kutz after redding up the room. Kissing don’t last, cooking do. Throw the horse over the fence some hay. Quit rutsching preacher says sit up straight, six-hour sermon Sundays.</p>
        <p>&nbsp;</p>




        <div class="row">

        <?php
            $recent_posts = get_posts('numberposts=3&order=DESC&orderby=date');
            foreach ($recent_posts as $post) :
                setup_postdata($post); ?>

        <div class="col-sm-4 text-left">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail($post->ID, 'thumbnail'); ?>
                <h4><?php the_title(); ?></h4>
                <p><?php the_excerpt(); ?></p>
            </a>
        </div>

        <?php endforeach; ?>





        </div>
        <div class="text-right"><a href="/blog" class="btn btn-default">Blog <i class="fa fa-chevron-circle-right"></i></a></div>
    </div>

<?php get_footer(); ?>