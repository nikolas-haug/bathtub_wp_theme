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

if (!empty($meta_value)) {
    $image_ids = explode(',', $meta_value['image']);
    $columns = explode(',', $meta_value['text']);
}
?>

                        <div class="col-<?php echo $columns[0]; ?>">
                            <img src="<?php echo $image_ids[0]; ?>" class="img-cover">
                        </div>
                        <div class="col-<?php echo $columns[1]; ?>">
                            <img src="<?php echo $image_ids[1]; ?>" class="img-cover">
                        </div>
                        <div class="col-<?php echo $columns[2]; ?>">
                            <img src="<?php echo $image_ids[2]; ?>" class="img-cover">
                        </div>

                    </div>

                    <div class="row">

                        <!-- Main content section for all pages using this template -->
                        <div class="col-12">
                            <?php the_content();?>
                        </div>
                        <!-- Check if need to display custom post content by page title -->
                        <?php if (is_page(array('tour-shows', 'shows', 'dates'))): ?>
                            <div class="col-12 upcoming-shows">
                                <h3>
                                    Upcoming Shows
                                </h3>
                                    <?php include locate_template('content/content-dates.php', false, false);?>
                                <button class="jsSeePastShows">
                                    See Past Shows
                                </button>
                            </div>
                            <div class="col-12 past-shows">
                                <h3>Past Shows</h3>
                                <?php include locate_template('content/content-dates-past.php', false, false);?>
                                <button class="jsSeeUpcomingShows">
                                    See Upcoming Shows
                                </button>
                            </div>
                        <?php endif;?>

                    </div>

                <?php endwhile;?>
            <?php endif;?>
        </section>
    </main>

<?php get_footer();?>