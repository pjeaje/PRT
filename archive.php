<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package GeneratePress
 */

get_header(); ?>

	<section id="primary" <?php generate_content_class(); ?>>
		<main id="main" <?php generate_main_class(); ?>>
		<?php do_action('generate_before_main_content'); ?>
		
	<?php /****** if ( is_user_logged_in() && (current_user_can('teacher-cap') || current_user_can('admin-cap'))) { ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
			<a href="http://perthreliefteachers.com.au/teacher-profile">
				<div class="inside-article update">
					<h2><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please Update Your Availability</h2>
				</div>
			</a>
		</article>
	<?php } ?>	
	
	<?php if ( is_user_logged_in() && (current_user_can('ea-cap') || current_user_can('admin-cap'))) { ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
			<a href="http://perthreliefteachers.com.au/ea-availability">
				<div class="inside-article update">
					<h2><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please Update Your EA Availability</h2>
				</div>
			</a>
		</article>
	<?php } ?>		

	<?php if ( is_user_logged_in() && (current_user_can('school-cap') || current_user_can('admin-cap'))) { ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
			<a href="http://perthreliefteachers.com.au/school-job-list">
				<div class="inside-article update">
					<h2><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please Update Your Job Profile</h2>
				</div>
			</a>
		</article>
	<?php } *******/ ?>			
		
		<?php if ( have_posts() ) : ?>
		
			<header class="page-header<?php if ( is_author() ) echo ' clearfix';?>">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							*/
							the_post();
							echo get_avatar( get_the_author_meta( 'ID' ), 50 );
							printf( __( 'About %s', 'generate' ), '<span class="vcard">' . get_the_author() . '</span>' );
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();

						elseif ( is_day() ) :
							printf( __( '%s', 'generate' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( '%s', 'generate' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( '%s', 'generate' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'generate' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'generate');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'generate' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'generate' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'generate' );

						else :
							_e( 'School Teacher Relief Jobs', 'generate' );

						endif;
					?>
				</h1>
	<?php if ( is_user_logged_in() && (current_user_can('school-cap') || current_user_can('admin-cap'))) { ?>
	<?php } elseif  (!is_user_logged_in()){ ?>			
		<?php if( !is_mobile()) { ?>	
			<p class="mobilebest">This website works best on a mobile phone<br /><br />
			<span class="fa-stack fa-lg">
			  <i class="fa fa-mobile fa-3x fa-stack-1x"></i>
			  <i class="fa fa-check fa-2x fa-stack-1x"></i>
			</span>				
			<span class="fa-stack fa-lg">
			  <i class="fa fa-tablet fa-3x fa-stack-1x"></i>
			  <i class="fa fa-times fa-2x fa-stack-1x"></i>
			</span>	
			<span class="fa-stack fa-lg">
			  <i class="fa fa-desktop fa-3x fa-stack-1x"></i>
			  <i class="fa fa-times times-desktop fa-2x fa-stack-1x"></i>
			</span><br />
			<small>but it still works on tablets and desktops</small>
			</p>			
		<?php } else { ?>			
		<?php } ?>	
	<?php } ?>			
				
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description" class="white-space">%s</div>', $term_description );
					endif;
					
					if ( get_the_author_meta('description') && is_author() ) : // If a user has filled out their decscription show a bio on their entries
						echo '<div class="author-info">' . get_the_author_meta('description') . '</div>';
					endif;
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

<?php /* <div <?php post_class( 0 === ++$GLOBALS['wpdb']->current_post % 2 ? 'second' : '' ); ?>> */ ?>	
<?php if ( post_is_in_descendant_category( 91 ) ) { ?>
<span class="primary">
<?php } elseif ( post_is_in_descendant_category( 1 ) ) { ?>
<span class="secondary">
<?php } elseif ( post_is_in_descendant_category( 494 ) ) { ?>
<span class="rural-primary">
<?php } elseif ( post_is_in_descendant_category( 721 ) ) { ?>
<span class="rural-dhs">
<?php } elseif ( post_is_in_descendant_category( 685 ) ) { ?>
<span class="rural-secondary">
<?php } elseif ( post_is_in_descendant_category( 776 ) ) { ?>
<span class="rural-other">
<?php } elseif ( post_is_in_descendant_category( 9999999999 ) ) { ?>
<span class="9999999999">
<?php } ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php do_action( 'generate_before_content'); ?>
		<header class="entry-header">

		<p><?php the_time('l jS F'); ?> at <?php foreach((get_the_category()) as $category) {echo $category->cat_name . ' '; } ?> <?php if( get_post_meta($post->ID, "days", true) ): ?>for <?php echo get_post_meta($post->ID, "days", true); ?><?php else: ?><?php endif; ?>
		</p>
		</header><!-- .entry-header -->
		<?php do_action( 'generate_after_entry_header'); ?>	
		<?php do_action( 'generate_after_entry_content'); ?>
		<?php do_action( 'generate_after_content'); ?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
		</a>
</span>
			
<?php /* </div> */ ?>

			<?php endwhile; ?>

			<?php generate_content_nav( 'nav-below' ); ?>

		<?php else : ?>
	<header class="page-header<?php if ( is_author() ) echo ' clearfix';?>">
		<h1 class="page-title"><?php single_cat_title(); ?></h1>
		<p>
			<?php $description  =  get_queried_object()->description; if ( ! empty( $description ) ) : ?>
					<p style="text-align:center;width:100%;overflow:hidden;">					
					<a href="https://www.google.com.au/search?q=<?php single_cat_title(); ?>+western+australia" target="_blank"><i class="fa fa-globe fa-4x" style="float:left;"></i></a> 
					<a href="https://www.google.com.au/maps/place/<?php single_cat_title(); ?>+western+australia" target="_blank"><i class="fa fa-map-marker fa-4x"></i></a> 
					<a href="http://www.whitepages.com.au/searchBus.action?name=<?php single_cat_title(); ?>&location=" target="_blank"><i class="fa fa-phone fa-4x" style="float:right;"></i></a>				
					</p>		
			<p><?php echo $description; ?></p>
			<?php else: ?>
					<p style="text-align:center;width:100%;overflow:hidden;">					
					<a href="https://www.google.com.au/search?q=<?php single_cat_title(); ?>+western+australia" target="_blank"><i class="fa fa-globe fa-4x" style="float:left;"></i></a> 
					<a href="https://www.google.com.au/maps/place/<?php single_cat_title(); ?>+western+australia" target="_blank"><i class="fa fa-map-marker fa-4x"></i></a> 
					<a href="https://www.google.com.au/search?q=<?php single_cat_title(); ?>+western+australia" target="_blank"><i class="fa fa-phone fa-4x" style="float:right;"></i></a>				
					</p>
					<p><?php single_cat_title(); ?> seeking relief teachers to work at their school.</p>
			<?php endif; ?>		
		</p>
	</header>
		<?php endif; ?>
		<?php do_action('generate_after_main_content'); ?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php 
do_action('generate_sidebars');
get_footer();