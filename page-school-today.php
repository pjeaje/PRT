<?php /* Template Name: School Today */ ?>
<?php
/**
 * The template for displaying todays schools.
 *
 * @package GeneratePress
 */

get_header(); ?>

	<div id="primary" <?php generate_content_class();?>>
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
					<h2><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please Update Your Availability Profile</h2>
				</div>
			</a>
		</article>
	<?php } ?>				

		<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php do_action( 'generate_before_content'); ?>
		
		<?php if ( generate_show_title() ) : ?>
			<header class="entry-header">
				<?php /** the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); **/ ?>
			</header><!-- .entry-header -->
		<?php endif; ?>
		
		<?php do_action( 'generate_after_entry_header'); ?>
		<div class="entry-content" itemprop="text">
			<?php the_content(); ?>

<?php if (( 0 == count_user_posts( get_current_user_id(), "teacher" ) && is_user_logged_in() && current_user_can('teacher-cap')) &&   !current_user_can('admin-cap') ) :?>		
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article update2">
		<p>You need to update your <a href="http://perthreliefteachers.com.au/teacher-profile"><strong>Availability</strong></a> before you can view school jobs.</p>
	</div>
</article>
<?php elseif (( 0 !== count_user_posts( get_current_user_id(), "teacher" ) && is_user_logged_in() && current_user_can('teacher-cap')) || (current_user_can('admin-cap'))) :?>
		
<?php 	
date_default_timezone_set('Australia/Perth'); // Put your PHP supported timezone in place of America/New York
$script_tz = date_default_timezone_get();
// get current day:
$currentday = date('l'); ?>
<?php if ($currentday == Monday){ ?>
<div class="day-title">Monday</div>
<?php wp_redirect( 'http://perthreliefteachers.com.au/school-job-days/01-monday', 302 ); exit; ?>
<?php } elseif ($currentday == Tuesday){ ?>
<div class="day-title">Tuesday</div>
<?php wp_redirect( 'http://perthreliefteachers.com.au/school-job-days/02-tuesday', 302 ); exit; ?>
<?php } elseif ($currentday == Wednesday){ ?>
<div class="day-title">Wednesday</div>
<?php wp_redirect( 'http://perthreliefteachers.com.au/school-job-days/03-wednesday', 302 ); exit; ?>
<?php } elseif ($currentday == Thursday){ ?>
<div class="day-title">Thursday</div>
<?php wp_redirect( 'http://perthreliefteachers.com.au/school-job-days/04-thursday', 302 ); exit; ?>
<?php } elseif ($currentday == Friday){ ?>
<div class="day-title">Friday</div>
<?php wp_redirect( 'http://perthreliefteachers.com.au/school-job-days/05-friday', 302 ); exit; ?>
<?php } elseif ($currentday == Saturday){ ?>
<h2 style="text-align: center;">It's Saturday, Let's Party!</h2>
<p style="text-align: center;"><img class="aligncenter size-full wp-image-919" src="http://perthreliefteachers.com.au/wp-content/uploads/160170.jpg" alt="160170" width="526" height="440" /></p>
<?php } elseif ($currentday == Sunday){ ?>
<h2 style="text-align: center;">What do you mean it's Monday tomorrow!</h2>
<p style="text-align: center;"><img class="aligncenter size-full wp-image-919" src="http://perthreliefteachers.com.au/wp-content/uploads/backtoworktomorrow.jpg" alt="160170" width="526" height="440" /></p>
<?php } else { ?>
<?php } ?>	

<?php endif; ?>	<!-- end of no job profile -->		
			
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'generatepress' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
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
			<?php generate_content_nav( 'nav-below' ); ?>
			<?php do_action('generate_after_main_content'); ?>
		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>			
			
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
do_action('generate_sidebars');
get_footer();