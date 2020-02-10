            <footer class="banner-bottom">
                <div class="container-med">
                    <div class="row">
                        <div class="col text-center">
                            <p class="banner-bottom__text"><?php bloginfo('name'); ?> &copy; <?php echo date('Y'); ?></p>
                        </div>
                    </div>
                </div>
            </footer>

            <?php if(is_active_sidebar( 'footer_area' )) : ?>
                <?php dynamic_sidebar('footer_area'); ?>
            <?php endif; ?>

        <?php wp_footer(  ); ?>

    </body>
</html>