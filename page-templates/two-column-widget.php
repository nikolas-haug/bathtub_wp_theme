<?php 

/* 

    Template Name: Two Column With Widget

*/

?>

<?php get_header(); ?>

        <main class="container-med">

            <section>

                <div class="row">

                    <?php if(have_posts()) : ?>
                        <?php while(have_posts()) : the_post(  ); ?>
                            <div class="col col-med-6 padding-top padding-bottom flex-order-sm-1">
                            <?php if(is_active_sidebar( 'footer_area' )) : ?>
                                <?php dynamic_sidebar('footer_area'); ?>
                            <?php endif; ?>
                            </div>

                            <div class="col col-med-6">
                                <h2 class="sub-title"><?php the_title(  ); ?></h2>
                                <p class="<?php echo get_post_meta(get_the_ID(), 'extra_css', true) ?? ''; ?>">
                                    <?php echo get_post_meta(get_the_ID(), 'extra_content', true); ?>
                                </p>
                            </div>
                            
                </div>

                            <div class="row">
                                <div class="col">
                                    <?php the_content( ); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>


            </section>

        </main>

<?php get_footer(  ); ?>