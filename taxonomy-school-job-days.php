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
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article" style="text-align:center" >
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
				</div>
		</article>		
		
	<?php if ( is_user_logged_in() && (current_user_can('teacher-cap') || current_user_can('admin-cap'))) { ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
			<a href="http://perthreliefteachers.com.au/teacher-profile">
				<div class="inside-article update">
					<h2><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please Update Your Availability</h2>
				</div>
			</a>
		</article>
	<?php } ?>			
		
<?php if ( is_user_logged_in() && (current_user_can('teacher-cap') || (current_user_can('admin-cap') || current_user_can('school-cap')))) { ?>			
		
		<?php if ( have_posts() ) : ?>
		
			<header class="page-header<?php if ( is_author() ) echo ' clearfix';?>">
				<h1 class="page-title">
					<?php single_term_title(); ?> relief work
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
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

			
			
<?php if (( 0 == count_user_posts( get_current_user_id(), "teacher" ) && is_user_logged_in() && current_user_can('teacher-cap') && !current_user_can('admin-cap')) ) :?>		
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article update">
		<p>You need to update your <a href="http://perthreliefteachers.com.au/teacher-profile"><strong>Availability</strong></a> before you can view school jobs. This is <strong>very</strong> (very) important!</p>
	</div>
</article>
<?php elseif (( 0 !== count_user_posts( get_current_user_id(), "teacher" ) && is_user_logged_in() && current_user_can('teacher-cap')) || (current_user_can('admin-cap') || current_user_can('school-cap')) ) :?>			
			
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

<div <?php post_class( 0 === ++$GLOBALS['wpdb']->current_post % 2 ? 'second' : '' ); ?>>
<?php /* 
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
 */ ?>	
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article teacher-list">
		<?php do_action( 'generate_before_content'); ?>
		<header class="entry-header">
		<p>
				<?php
					foreach((get_the_category()) as $category) {
					echo $category->cat_name . '';
					}
				?><?php
add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
$timelimit=6.5 * 86400; // 7 days * seconds per day
$post_age = date('U') - get_the_modified_date('U');
if ($post_age < $timelimit) : ?>
<?php elseif ($post_age > $timelimit) : ?>
.
<?php endif; ?>			
</p>
		</header><!-- .entry-header -->
		<?php do_action( 'generate_after_entry_header'); ?>	
		<?php /* do_action( 'generate_after_entry_content'); */ ?>
		<?php do_action( 'generate_after_content'); ?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
		</a>
<?php /* </span> */ ?>
			
</div>

			<?php endwhile; ?>

			<?php generate_content_nav( 'nav-below' ); ?>

<?php endif; ?>	<!-- end of no job profile -->			
			
		<?php else : ?>		
		
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
	
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
	
		<h2 style="text-align:center;">No Schools</h2><p>Please search again using different criteria.</p>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
		<?php endif; ?>
		<?php do_action('generate_after_main_content'); ?>
		
<?php } elseif  (!is_user_logged_in() || current_user_can('teacher-cap') ){ ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php do_action( 'generate_before_content'); ?>
		<header class="entry-header">
		<h1 style="text-align:center;"><i class="fa fa-lock fa-5x" aria-hidden="true"></i>
</h1>
<?php wp_redirect( 'http://perthreliefteachers.com.au/', 302 ); exit; ?>
		</header><!-- .entry-header -->
	</div><!-- .inside-article -->
</article><!-- #post-## -->		
<?php } ?>	

	
		
		</main><!-- #main -->
	</section><!-- #primary -->

<?php 
do_action('generate_sidebars');
get_footer();