<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package SKT BeFit
 */

get_header(); ?>

<div id="content">
    <div class="site-aligner">
        <section class="site-main content-left" id="sitemain">
            <div class="blog-post">
				<?php if ( have_posts() ) : ?>
                    <header>
                        <h1 class="entry-title"><?php printf( esc_html__( 'Search Results for: %s', 'skt-befit' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    </header>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content', 'search' ); ?>
                    <?php endwhile; ?>
                    <?php   
						// Previous/next post navigation.
                        the_posts_pagination( array(
						'mid_size' => 2,
						'prev_text' => esc_html__( 'Back', 'skt-befit' ),
						'next_text' => esc_html__( 'Onward', 'skt-befit' ),
						) );
					?>
                <?php else : ?>
                    <?php get_template_part( 'no-results', 'search' ); ?>
                <?php endif; ?>
            </div><!-- blog-post -->
        </section>
        <div class="sidebar_right">
        <?php get_sidebar();?>
        </div><!-- sidebar_right -->
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- content -->

<?php get_footer(); ?>