<?php
/**
 * @package SKT BeFit
 */
?>
<div class="blog-post-repeat">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
        	<div class="post-thumb"><?php the_post_thumbnail(); ?>
            </div><!-- post-thumb -->
            <div class="blog-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></div>
            <?php if ( 'post' == get_post_type() ) : ?>
            
                <div class="postmeta">
                    <div class="post-date"><?php echo get_the_date(); ?></div><!-- post-date -->
                    <div class="post-comment"> &nbsp;|&nbsp; <a href="<?php esc_url(comments_link()); ?>"><?php comments_number(); ?></a></div>
                    <div class="post-categories"> &nbsp;|&nbsp; <?php the_category(', '); ?></div>
                    <div class="clear"></div>
                </div><!-- postmeta -->
            <?php endif; ?>
        </header><!-- .entry-header -->
    
        <?php if ( is_search() || !is_single() ) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
           	<?php the_excerpt(); ?>
            <p class="read-more"><a href="<?php the_permalink(); ?>"><?php esc_attr_e('Read More &raquo;','skt-befit'); ?></a></p>
        </div><!-- .entry-summary -->
        <?php else : ?>
        <div class="entry-content">
            <?php the_content( esc_attr_e( 'Continue reading <span class="meta-nav">&rarr;</span>', 'skt-befit' ) ); ?>
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_attr_e( 'Pages:', 'skt-befit' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->
        <?php endif; ?>
    
        <footer class="entry-meta" style="display:none;">
            <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
                <?php
                    /* translators: used between list items, there is a space after the comma */
                    $categories_list = get_the_category_list(', ');
                    if ( $categories_list && sktbefit_categorized_blog() ) :
                ?>
                <span class="cat-links">
                    <?php printf( esc_attr__( 'Posted in %1$s', 'skt-befit' ), $categories_list ); ?>
                </span>
                <?php endif; // End if categories ?>
    
                <?php
                    /* translators: used between list items, there is a space after the comma */
                    $tags_list = get_the_tag_list(', ');
                    if ( $tags_list ) :
                ?>
                <span class="tags-links">
                    <?php printf( esc_attr__( 'Tagged %1$s', 'skt-befit' ), $tags_list ); ?>
                </span>
                <?php endif; // End if $tags_list ?>
            <?php endif; // End if 'post' == get_post_type() ?>
    
            <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
            <span class="comments-link"><?php comments_popup_link( esc_attr__( 'Leave a comment', 'skt-befit' ), esc_attr__( '1 Comment', 'skt-befit' ), esc_attr__( '% Comments', 'skt-befit' ) ); ?></span>
            <?php endif; ?>
    
            <?php edit_post_link( esc_attr__( 'Edit', 'skt-befit' ), '<span class="edit-link">', '</span>' ); ?>
        </footer><!-- .entry-meta -->
    </article><!-- #post-## -->
</div><!-- blog-post-repeat -->