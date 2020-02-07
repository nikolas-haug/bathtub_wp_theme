<?php 

/* 

    Template Name: Basic Template

*/

?>

<?php get_header(); ?>

        <main class="container-med">

            <section class="row">

                <?php if(have_posts()): ?>
                    <?php while(have_posts()) : the_post(  ); ?>

                        <?php if(!is_page('home')) : ?>
                            <div class="col col-med-12">
                                <h2 class="sub-title">
                                    <?php the_title( ); ?>
                                </h2>
                            </div>
                        <?php endif; ?>
                        
                        <?php if(has_post_thumbnail()) : ?>
                            <div class="col">
                                <?php the_post_thumbnail( 'full', array( 'class' => 'img-100 ') ); ?>
                            </div>
                        <?php endif; ?>

                        <div class="col padding-top">
                            <?php the_content(  ); ?>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>

            </section>

        </main>

<?php get_footer(  ); ?>