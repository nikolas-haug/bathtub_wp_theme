<?php get_header();?>

        <main class="container-med">

            <h2 class="blog-header text-center">Blog!</h2>

            <?php if(have_posts()) : ?>
                <?php while(have_posts()) : the_post() ?>

                    <article class="row">
                        <div class="col">
                            <?php if(has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail( 'full', array( 'class' => 'img-100' ) ); ?>
                            <?php endif; ?>
                        </div>
                        <div class="col">
                            <h3><?php the_title( ); ?></h3>
                            <?php the_content( ); ?>
                        </div>
                    </article>
                    
                <?php endwhile; ?>
            <?php endif; ?>

        </main>

<?php get_footer();?>