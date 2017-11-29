<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT BeFit
 */
?>
<footer id="footer">
	<div class="site-aligner">
    		<div class="widget-column">
            <div class="cols">
            <?php
            $contact_title = get_theme_mod('contact_title');
			$contact_desc = get_theme_mod('contact_desc');
			$contact_no = get_theme_mod('contact_no');
			$contact_mail = get_theme_mod('contact_mail');
			$fb_link = get_theme_mod('fb_link'); 
			$twitt_link = get_theme_mod('twitt_link');
			$gplus_link = get_theme_mod('gplus_link');
			$linked_link = get_theme_mod('linked_link');	
			?>
            <?php if (!empty($contact_title)){  ?>
            <h2><?php echo esc_html($contact_title); ?></h2>
            <?php } ?>
                <?php if (!empty($contact_desc)){  ?>
                    <p><?php echo wp_kses_post($contact_desc);?></p>
                <?php } ?>
                <div class="spacer20"></div>
               <?php if (!empty($contact_no)){  ?>
                    <div class="foot-label"><?php esc_attr_e('Call Us : ','skt-befit'); ?></div><div class="add-content"><?php echo esc_html($contact_no); ?></div><div class="clear"></div>
                <?php } ?>
                	<?php if (!empty($contact_no)){  ?>
                    <div class="foot-label"><?php esc_attr_e('E-mail : ','skt-befit'); ?></div><div class="mail-content">
                    <?php if( get_theme_mod('contact_mail')){ ?><a href="mailto:<?php echo antispambot( sanitize_email( $contact_mail ) ); ?>"><?php echo antispambot( sanitize_email( $contact_mail ) ); ?></a><?php } ?>
                    </div>
                    <?php } ?>
                <!-- mail-content --><div class="clear"></div>
                <div class="spacer10"></div>
                <div class="social">
				<?php if (!empty($fb_link)) { ?>
                 <a target="_blank" href="<?php echo esc_url($fb_link); ?>" title="Facebook" ><div class="fb icon"></div></a>
                 <?php } ?>
                <?php if (!empty($twitt_link)) { ?>
                 <a target="_blank" href="<?php echo esc_url($twitt_link); ?>" title="Twitter" ><div class="twitt icon"></div></a>
                 <?php } ?>
                 <?php if (!empty($gplus_link)) { ?>
             	 <a target="_blank" href="<?php echo esc_url($gplus_link); ?>" title="Google Plus" ><div class="gplus icon"></div></a>
                 <?php } ?>
                 <?php if (!empty($linked_link)) { ?>
                 <a target="_blank" href="<?php echo esc_url($linked_link); ?>" title="Linkedin" ><div class="linkedin icon"></div></a>
                 <?php } ?>
                </div>
            </div><!-- cols -->
       </div><!-- widget-column -->
       <div class="widget-column">
                <div class="cols"><h2><?php esc_attr_e('Our Menu','skt-befit'); ?></h2>
                   <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
                </div><!-- cols -->
        </div><!-- widget-column -->
        <div class="widget-column">
            <div class="cols"><h2><?php esc_attr_e('Latest Posts','skt-befit'); ?></h2>
				<ul class="recent-post">
                	<?php query_posts('post_type=post&posts_per_page=2&ignore_sticky_posts=1'); ?>
					<?php if ( have_posts() ) : ?>
                    <?php  while( have_posts() ) : the_post(); ?>
                  	<li><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(59,51)); ?><?php the_title();?></a><br/><?php the_excerpt(); ?></li>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
                </div><!-- cols -->
        </div><!-- widget-column -->
        <div class="widget-column last">
       		<?php if(!dynamic_sidebar('twitter-wid')) : ?>
                <div class="cols"><h2><?php esc_attr_e('Twitter Feed','skt-befit'); ?></h2>
                   <p><?php esc_attr_e('Use twitter widget for twitter feed.','skt-befit'); ?></p>
                </div><!-- cols -->
            <?php endif; ?>
        </div><!-- widget-column --><div class="clear"></div>
	</div><!-- site-aligner -->
</footer>
<div id="copyright">
	<div class="site-aligner">
    	<div class="right"><?php echo sktbefit_by(); ?></div>
        <div class="clear"></div>
    </div>
</div><!-- copyright -->
</div><!-- wrapper -->
<?php wp_footer(); ?>
</body>
</html>