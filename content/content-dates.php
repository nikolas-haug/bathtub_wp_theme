<?php

$args = array(
    'post_type' => 'shows',
    'meta_key' => 'show_date',
    'orderby' => 'meta_value',
    'order' => 'ASC' 
);
$main_posts = new WP_Query($args);

while ($main_posts->have_posts()) {
    $main_posts->the_post();

    $currentDate = time();

    ?>

    <?php get_post_meta( get_the_ID(), 'show_date', true ); ?>
    <!-- <?php echo print_r($currentDate); ?> -->

    <p class="date-ref">
        <a href="<?php echo get_post_meta(get_the_ID(), 'show_link', true); ?>" target="_blank">

            <!-- Only show the event if happening in the future -->
            <?php if($currentDate > get_post_meta( get_the_ID(), 'show_date', true )) : ?>
                <?php the_content( ); ?>
            <?php endif; ?>

            <span><?php echo date('m-d-y', get_post_meta( get_the_ID(), 'show_date', true )); ?></span>
            <span> - </span>
            <?php echo get_the_content( ); ?>
        </a>
    </p>

<?php

}
wp_reset_query();

?>
