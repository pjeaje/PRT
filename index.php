<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package GeneratePress
 */

get_header(); ?>

	<div id="primary" <?php generate_content_class();?>>
		<main id="main" <?php generate_main_class(); ?>>
		<?php do_action('generate_before_main_content'); ?>

	<?php if ( is_user_logged_in() && (current_user_can('teacher-cap') || current_user_can('admin-cap'))) { ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
			<a href="http://perthreliefteachers.com.au/my-profile">
				<div class="inside-article update">
					<h2>Please Update Your Availability</h2>
				</div>
			</a>
		</article>
	<?php } ?>	

	<?php if (( 0 == count_user_posts( get_current_user_id(), "post" ) && is_user_logged_in() && current_user_can('school-cap')) || current_user_can('admin-cap') ) :?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
			<a href="http://perthreliefteachers.com.au/school-job-list">
				<div class="inside-article update">
					<h2>Please Update Your Job Profile</h2>
				</div>
			</a>
		</article>
	<?php } ?>		
		
		<?php if ( have_posts() ) : ?>

		
		<header class="page-header">
			<h1 class="page-title">Latest Jobs</h1>
			
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
			</header><!-- .entry-header -->		
		
		
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

		<p><?php the_time('D jS F'); ?> at

<?php if ( in_category( 'school' )) { ?>
    an unknown school
<?php } else { ?>
 <?php foreach((get_the_category()) as $category) {echo $category->cat_name . ' '; } ?>
<?php } ?>
 <?php if( get_post_meta($post->ID, "days", true) ): ?>for <?php echo get_post_meta($post->ID, "days", true); ?><?php else: ?><?php endif; ?>
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

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>

<?php /***		
<article class="colours inside-article colours2" id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article" style="padding-right:20px;">
<p style="background:#96A3B6;"> Primary - Metro </p>
<p style="background:#D48923;"> Secondary - Metro </p>
<p style="background:#a8271c;"> Rural - Primary </p>
<p style="background:#1ca827;"> Rural - DHS </p>
<p style="background:#666666;"> Rural - Secondary </p>
<p style="background:#3cb3c7;"> Rural - Other </p>
	</div><!-- .inside-article -->
</article><!-- #post-## -->		
***/ ?>		
		
		<?php do_action('generate_after_main_content'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
do_action('generate_sidebars');
get_footer();