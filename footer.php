            <footer class="banner-bottom">
                <div class="container-med">
                    <div class="row banner-bottom__text">
                        <div class="col text-center">
                            <a href="#"><span class="social-icon fab fa-facebook fa-2x"></span></a>
                            <a href="#"><span class="social-icon fab fa-instagram fa-2x"></span></a>
                            <a href="#"><span class="social-icon fab fa-bandcamp fa-2x"></span></a>
                            <p><?php bloginfo('name'); ?> &copy; <?php echo date('Y'); ?></p>
                        </div>
                    </div>
                </div>
            </footer>

            <!-- <?php if(is_active_sidebar( 'footer_area' )) : ?>
                <?php dynamic_sidebar('footer_area'); ?>
            <?php endif; ?> -->

        <?php wp_footer(  ); ?>

    </body>
</html>