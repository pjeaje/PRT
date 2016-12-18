<?php
/**
 * The Template for displaying all single posts.
 *
 * @package GeneratePress
 */
 
// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;

get_header(); ?>

	<div id="primary" <?php generate_content_class();?>>
		<main id="main" <?php generate_main_class(); ?>>
		<?php do_action('generate_before_main_content'); ?>
		<?php while ( have_posts() ) : the_post(); ?>
		
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- Perth Relief Teachers -->
		<ins class="adsbygoogle"
			 style="display:block"
			 data-ad-client="ca-pub-3761760999645154"
			 data-ad-slot="1467788483"
			 data-ad-format="auto"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>		
	</div>
</article>			

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php do_action( 'generate_before_contentXXX'); ?>
		
		<header class="entry-header">
			<?php if ( generate_show_title() ) : ?>
				<h1 class="entry-title" itemprop="headline">WA Gov Education Jobs<br /><?php the_modified_date('D F j, Y'); ?></h1>
				
			<?php endif; ?>
			<div class="entry-meta">
				<?php generate_posted_on(); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->
		
		<?php do_action( 'generate_after_entry_header'); ?>
		<div class="entry-content" itemprop="text">
		
<?php if( rcp_is_active() && 5 == rcp_get_subscription_id() ) : ?>
<?php the_content(); ?>
<?php elseif(!rcp_is_active() && 5 == rcp_get_subscription_id()) : ?>
Teacher-Plus membership coming soon...
<?php the_content(); ?>
<?php elseif(rcp_is_active()) : ?>
Teacher-Plus membership coming soon...
<?php the_content(); ?>
<?php elseif(!rcp_is_active()) : ?>
Teacher-Plus membership coming soon...
<?php the_content(); ?>
<?php endif; ?>				
			
			<h2 class="postie"><a href="https://perthreliefteachers.com.au/wagovjobs">Previous Jobs &raquo;</a></h2>		 
			<?php /****
			<p><?php $form_widget = new \MailPoet\Form\Widget(); echo $form_widget->widget(array('form' => 2, 'form_type' => 'php')); ?></p>
			****/ ?>
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'generatepress' ),
				'after'  => '</div>',
			) );
			 ?>
		</div><!-- .entry-content -->
		<?php do_action( 'generate_after_entry_content'); ?>

		<footer class="entry-meta">
			<?php generate_entry_meta(); ?>
			<?php /**** generate_content_nav( 'nav-below' ); ****/ ?>
			<?php edit_post_link( __( 'Edit', 'generatepress' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
		<?php do_action( 'generate_after_content'); ?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) : ?>
					<div class="comments-area">
						<?php comments_template(); ?>
					</div>
			<?php endif; ?>

		<?php endwhile; // end of the loop. ?>
		<?php do_action('generate_after_main_content'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
do_action('generate_sidebars');
get_footer();