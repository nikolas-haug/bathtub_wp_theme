<?php 

/* 

    Template Name: Two Column Upper

*/

?>

<?php get_header(); ?>

        <main class="container-med">

            <section>

                <div class="row">

                    <?php if(have_posts()) : ?>
                        <?php while(have_posts()) : the_post(  ); ?>
                            <div class="col-med-6 padding-top flex-order-sm-1">
                                <?php if(has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail( 'full', array( 'class' => 'img-100' ) ); ?>
                                <?php endif; ?>
                            </div>

                            <div class="col-med-6">
                                <h2 class="sub-title"><?php the_title(  ); ?></h2>
                                <p>
                                    <?php echo get_post_meta(get_the_ID(), 'sub_section', true); ?>
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