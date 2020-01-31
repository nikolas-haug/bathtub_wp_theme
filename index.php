<?php get_header(); ?>

        <main class="container-med">

        <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
                <h1><?php the_title( ); ?></h1>

               
            <?php endwhile; ?>
        <?php endif; ?>

            <section class="row">

                <div class="col">
                    <img
                        src="https://images.pexels.com/photos/736355/pexels-photo-736355.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                        alt="" class="img-100">
                </div>

                <div class="col col-sm-6 padding-top">
                    <p>
                        One morning, when Gregor Samsa woke from troubled
                        dreams, he found himself transformed in his bed into a
                        horrible vermin. He lay on his armour-like back, and if
                        he lifted his head a little he could see his brown
                        belly, slightly domed and divided by arches
                    </p>
                </div>

                <div class="col col-sm-6">
                    <h3>contact</h3>
                    <form action="">
                        <input type="text">
                        <input type="submit" class="full-button margin-top">
                    </form>
                </div>

            </section>

        </main>

<?php get_footer(  ); ?>