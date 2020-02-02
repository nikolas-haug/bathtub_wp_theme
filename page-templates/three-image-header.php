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

	                                        <?php
                                            $meta_value = get_post_meta(get_the_ID(), 'your_fields', true);

                                            $image_ids = explode(',', $meta_value['image']);?>

	                                    <div class="col-3">
	                                        <img src="<?php echo $image_ids[0]; ?>" class="img-cover">
	                                    </div>
	                                    <div class="col-5">
	                                        <img src="<?php echo $image_ids[1]; ?>" class="img-cover">
	                                    </div>
	                                    <div class="col-4">
	                                        <img src="<?php echo $image_ids[2]; ?>" class="img-cover">
	                                    </div>

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