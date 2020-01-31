<?php

/*

Template Name: Three Image Header

 */

?>

<?php get_header();?>

        <main class="container-med">

            <section>

                <div class="row">

                    <?php if (have_posts()): ?>
                        <?php while (have_posts()): the_post();?>

	                            <?php if (!is_page('home')): ?>
	                                <div class="col">
	                                    <h2 class="sub-title">
	                                        <?php the_title();?>
	                                    </h2>
	                                </div>
	                            <?php endif;?>
                </div>

                            <div class="row row-gallery margin-bottom">

                                <?php if (class_exists('Dynamic_Featured_Image')):
                                    global $dynamic_featured_image;
                                    global $post;
                                    $featured_images = $dynamic_featured_image->get_featured_images($post->ID);
                                ?>

	                                    <div class="col-4">
	                                        <img src="<?php echo $featured_images[0]['full']; ?>" alt="" class="img-cover">
	                                    </div>
	                                    <div class="col-3">
	                                        <img src="<?php echo $featured_images[1]['full']; ?>" alt="" class="img-cover">
	                                    </div>
	                                    <div class="col-5">
	                                        <img src="<?php echo $featured_images[2]['full']; ?>" alt="" class="img-cover">
	                                    </div>

                                    <?php endif;?>
                                    
                            </div>

                        <div class="row">

                            <?php if (!is_page('tour/shows')): ?>
                                <div class="col-12">
                                    <h2>
                                        Upcoming
                                    </h2>
                                </div>
                            <?php endif;?>

                            <div class="col-12">
                                <?php the_content();?>
                            </div>

                        </div>


                        <?php endwhile;?>
                    <?php endif;?>

                </section>

            </main>

<?php get_footer();?>