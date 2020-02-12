            <footer class="banner-bottom">
                <div class="container-med">
                    <div class="row banner-bottom__text">
                        <div class="col text-center">
                            <?php if(get_theme_mod( 'icon1_icon', '' )) : ?>
                                <a href="<?php echo get_theme_mod( 'icon1_url', '' ); ?>"><span class="social-icon <?php echo get_theme_mod( 'icon1_icon', '' ); ?>"></span></a>
                            <?php endif; ?>
                            <?php if(get_theme_mod( 'icon2_icon', '' )) : ?>
                                <a href="<?php echo get_theme_mod( 'icon2_url', '' ); ?>"><span class="social-icon <?php echo get_theme_mod( 'icon2_icon', '' ); ?>"></span></a>
                            <?php endif; ?>
                            <?php if(get_theme_mod( 'icon3_icon', '' )) : ?>
                                <a href="<?php echo get_theme_mod( 'icon3_url', '' ); ?>"><span class="social-icon <?php echo get_theme_mod( 'icon3_icon', '' ); ?>"></span></a>
                            <?php endif; ?>
                            <p><?php bloginfo('name'); ?> &copy; <?php echo date('Y'); ?></p>
                        </div>
                    </div>
                </div>
            </footer>

        <?php wp_footer(  ); ?>

    </body>
</html>