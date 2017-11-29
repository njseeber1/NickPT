<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SKT BeFit
 */

get_header(); 
?>

<?php if ( 'page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && $wp_query->get_queried_object_id() == get_option( 'page_for_posts' ) ) : ?>

<div id="content">
    <div class="site-aligner">
        <section class="site-main content-left" id="sitemain">
        	 <div class="blog-post">
					<?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part( 'content', get_post_format() );
                    
                        endwhile;
                        // Previous/next post navigation.
                        	the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => esc_html__( 'Back', 'skt-befit' ),
							'next_text' => esc_html__( 'Onward', 'skt-befit' ),
						) );
                    
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    
                    endif;
                    ?>
                    </div><!-- blog-post -->
             </section>
        <div class="sidebar_right">
        <?php get_sidebar();?>
        </div><!-- sidebar_right -->
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- content -->
<?php else: ?>
    <section class="latest-blog">
        <div class="site-aligner">
        <div class="section-title"><?php esc_attr_e('Latest News','skt-befit'); ?></div>
            <div>
		<?php $k = 0; ?>
		<?php global $wp_query; ?>
        <?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
        <?php $k++; ?>
        <div class="one_fourth <?php if($k%4==0){?>last_column<?php } ?>">
         <?php if( has_post_thumbnail() ) { ?>
        <p><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail(); ?></a>
        </p>
        <?php } ?>
      <div class="recent-post-title"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </div>
        <div class="clear"></div>
        <div class="postauthor"><?php echo get_the_author(); ?></div>
        <div class="postdate"><?php echo get_the_date('F j, Y'); ?></div>
        <div class="clear"></div>
        <div class="post-content">
        <?php the_excerpt(); ?>
        </div>
        <a href="<?php the_permalink(); ?>"><div class="morebtn"><?php esc_attr_e('Read More','skt-befit'); ?></div></a>
	    </div><?php if($k%4==0){?><div class="clear"></div><?php } ?>
        <?php endwhile; ?>
                        <?php   // Previous/next post navigation.
                        the_posts_pagination( array(
						'mid_size' => 2,
						'prev_text' => esc_html__( 'Back', 'skt-befit' ),
						'next_text' => esc_html__( 'Onward', 'skt-befit' ),
						) ); ?>
            </div>                    
        </div><div class="clear"></div>
    </section>
<?php endif; ?>
<?php get_footer(); ?>