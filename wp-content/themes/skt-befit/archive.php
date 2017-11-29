<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package SKT BeFit
 */

get_header(); ?>

<div id="content">
    <div class="site-aligner">
        <section class="site-main content-left" id="sitemain">
			<?php if ( have_posts() ) : ?>
                <header class="page-header">
                    <h1 class="entry-title">
                        <?php
                            if ( is_category() ) :
                                single_cat_title();

                            elseif ( is_tag() ) :
                                single_tag_title__('Tag:', 'skt-befit');

                            elseif ( is_author() ) :
                                /* Queue the first post, that way we know
                                 * what author we're dealing with (if that is the case).
                                */
                                the_post();
                                printf( esc_attr( 'Author: %s', 'skt-befit' ), '<span class="vcard">' . get_the_author() . '</span>' );
                                /* Since we called the_post() above, we need to
                                 * rewind the loop back to the beginning that way
                                 * we can run the loop properly, in full.
                                 */
                                rewind_posts();

                            elseif ( is_day() ) :
                                printf( esc_attr__( 'Day: %s', 'skt-befit' ), '<span>' . get_the_date() . '</span>' );
    
                            elseif ( is_month() ) :
                                printf( esc_attr__( 'Month: %s', 'skt-befit' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
    
                            elseif ( is_year() ) :
                                printf( esc_attr__( 'Year: %s', 'skt-befit' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
    
                            elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                                esc_attr_e( 'Asides', 'skt-befit' );
    
                            elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                                esc_attr_e( 'Images', 'skt-befit');
    
                            elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                                esc_attr_e( 'Videos', 'skt-befit' );
    
                            elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                                esc_attr_e( 'Quotes', 'skt-befit' );
    
                            elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                                esc_attr_e( 'Links', 'skt-befit' );
    
                            else :
                                esc_attr_e( 'Archives', 'skt-befit' );
    
                            endif;
                        ?>
                    </h1>
                    <?php
                        // Show an optional term description.
                        $term_description = term_description();
                        if ( ! empty( $term_description ) ) :
                            printf( '<div class="taxonomy-description">%s</div>', translate($term_description, 'skt-befit'));
                        endif;
                    ?>
                </header><!-- .page-header -->
				<div class="blog-post">
					<?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content', get_post_format() ); ?>
                    <?php endwhile; ?>
                </div>
                <?php   // Previous/next post navigation.
                        the_posts_pagination( array(
						'mid_size' => 2,
						'prev_text' => esc_html__( 'Back', 'skt-befit' ),
						'next_text' => esc_html__( 'Onward', 'skt-befit' ),
						) ); ?>
            <?php else : ?>
                <?php get_template_part( 'no-results', 'archive' ); ?>
            <?php endif; ?>
        </section>
        <div class="sidebar_right">
        <?php get_sidebar();?>
        </div><!-- sidebar_right -->
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- content -->
	
<?php get_footer(); ?>