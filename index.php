<?php get_header(); ?>


    <main class="main__container">
        <?php if (have_posts()) : ?>

            <?php if (is_home() && !is_front_page()) : ?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>
            <?php endif; ?>

            <?php
            while (have_posts()) : the_post();
                ?>

                <article id="post-<?php the_ID(); ?>" class="main__article">
                    <header>

                        <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
                    </header>

                    <div class="main__authorname">
                        post by
                        <strong>
                            <?php the_author(); ?>
                        </strong>
                    </div>
                    <div class="main__postdate">
                        <?php the_date(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>
                    <?php the_excerpt() ?>


                </article>

                <?php
            endwhile;

            the_posts_pagination(array(
                'prev_text' => __('Previous page', ''),
                'next_text' => __('Next page', ''),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('', '') . ' </span>',
            ));


        endif;
        ?>
    </main>
<?php get_footer(); ?>