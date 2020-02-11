<?php

$args = array(
    'post_type' => 'shows',
    'meta_key' => 'show_date',
    'orderby' => 'meta_value',
    'order' => 'ASC' 
);
$date_posts = new WP_Query($args);

while ($date_posts->have_posts()) {
    $date_posts->the_post();

    $currentDate = time();

    ?>

    <?php get_post_meta( get_the_ID(), 'show_date', true ); ?>
    <!-- <?php echo print_r($currentDate); ?> -->

    <!-- If 'Past Shows' page - Only show the events that have happened -->
    <?php if($currentDate > get_post_meta( get_the_ID(), 'show_date', true ) && is_page(array('tour-shows', 'shows', 'dates'))) : ?>
    <p class="date-ref">
        <a href="<?php echo get_post_meta(get_the_ID(), 'show_link', true); ?>" target="_blank">
                <span><?php echo date('M d, Y', get_post_meta( get_the_ID(), 'show_date', true )); ?></span>
                <span> - </span>
                <?php echo get_the_content( ); ?>
            </a>
        </p>
        <?php endif; ?>

<?php

}
wp_reset_query();

?>
