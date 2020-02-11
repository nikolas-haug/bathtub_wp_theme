<?php

$today = time();

$args = array(
    'post_type' => 'shows',
    'meta_key' => 'show_date',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_query' => array(
        'end_clause' => array(
            'key' => 'show_date',
            'value' => $today,
            'type' => 'NUMERIC',
            'compare' => '<'

        )
    )
);

$date_posts = new WP_Query($args);

while ($date_posts->have_posts()) {
    $date_posts->the_post();

    ?>

    <p class="date-ref">
        <a href="<?php echo get_post_meta(get_the_ID(), 'show_link', true); ?>" target="_blank">
            <span><?php echo date('M d, Y', get_post_meta(get_the_ID(), 'show_date', true)); ?></span>
            <span> - </span>
            <?php echo get_the_content(); ?>
        </a>
    </p>

<?php

}
wp_reset_query();

?>