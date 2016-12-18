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
	<?php } ?>	
	
	
		<?php if ( have_posts() ) : ?>		
			
	<?php if ( is_user_logged_in() && (current_user_can('teacher-cap') || current_user_can('admin-cap'))) { ?>
	<header class="page-header">
	<h1 class="page-title">Schools Looking For Teachers<br />
<?php 	
date_default_timezone_set('Australia/Perth'); // Put your PHP supported timezone in place of America/New York
$script_tz = date_default_timezone_get();
// get current day:
echo date('g:ia e'); ?></h1>
	</header><!-- .entry-header -->	
	
	<?php } elseif  (!is_user_logged_in()){ ?>	
	<header class="page-header">
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
		
	<h2 style="padding:10px;font-size:1.5em;">Perth Relief Teachers is a 100% free service for <a href="http://perthreliefteachers.com.au/login-school"><strong>Schools</strong></a> to post their relief teaching/EA needs and for <a href="http://perthreliefteachers.com.au/login-teacher"><strong>Teachers</strong></a> and <a href="http://perthreliefteachers.com.au/ea-login"><strong>Education Assistants</strong></a> to list their availability.
	<br /><br />
	<a href="http://perthreliefteachers.com.au/login-school"><strong>Schools</strong></a> can search for available teachers and education assistants.
	<br /><br />
	<a href="http://perthreliefteachers.com.au/login-teacher"><strong>Teachers</strong></a> can search for schools in need of relief staff.<br /><br />
	Our goal is to bring Schools and Staff together.
	<br /><br />
	<span style="text-align:center;"><?php 	
	date_default_timezone_set('Australia/Perth'); // Put your PHP supported timezone
	$script_tz = date_default_timezone_get();
	// get current day:
	echo date('g:ia e'); 
	?></span>
	</h2>
	
	</header><!-- .entry-header -->	
	<?php } ?>
	
	<?php if ( is_user_logged_in() && (current_user_can('ea-cap') || current_user_can('teacher-cap') || current_user_can('admin-cap'))) { ?>
	<header class="page-header">
	<p>It is important you keep your availability profile up-to-date <strong>each day</strong>. If you are working or unavailable on a particular day you must login and update your availability. Schools rely on the accuracy of your availability profile.</p>
	</header><!-- .entry-header -->	
	<?php } else { ?>	
	<?php } ?>			

<?php if (( 0 == count_user_posts( get_current_user_id(), "teacher" ) && is_user_logged_in() && current_user_can('teacher-cap')) && !current_user_can('admin-cap') ) :?>		
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article update2">
		<p>You need to update your <a href="http://perthreliefteachers.com.au/teacher-profile"><strong>Availability</strong></a> before you can view school jobs.</p>
	</div>
</article>
<?php elseif (( 0 !== count_user_posts( get_current_user_id(), "teacher" ) && is_user_logged_in() && current_user_can('teacher-cap')) || (current_user_can('admin-cap') ) ) :?>	

<!----- --->	
<?php if (( 0 == count_user_posts( get_current_user_id(), "post" ) && is_user_logged_in() && current_user_can('school-cap')) && !current_user_can('admin-cap') ) :?>		
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<p style="margin:10px;">You need to update your <a href="http://perthreliefteachers.com.au/post-a-job"><strong>Job Profile</strong></a> before you can contact teachers.</p>
	</div>
</article>
<?php elseif (( 0 !== count_user_posts( get_current_user_id(), "post" ) && is_user_logged_in() && current_user_can('school-cap')) || current_user_can('admin-cap') ) :?>
<!----- --->	

		<a href="http://perthreliefteachers.com.au/teacher-relief-work-today" title="Today's Teacher Relief Work">	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article today" >
		<header class="entry-header">
		<p>Today - <?php 
date_default_timezone_set('Australia/Perth'); // Put your PHP supported timezone
$script_tz = date_default_timezone_get();		
echo date('l j\<\s\u\p\>S\<\/\s\u\p\> M'); ?></p>
		</header><!-- .entry-header -->
	</div><!-- .inside-article -->
</article><!-- #post-## -->
		</a>

		<a href="http://perthreliefteachers.com.au/teacher-relief-work-tomorrow" title="Tomorrow's Teacher Relief Work">	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article tomorrow" >
		<header class="entry-header">
		<p>Tomorrow - <?php 
date_default_timezone_set('Australia/Perth'); // Put your PHP supported timezone
$script_tz = date_default_timezone_get();		
echo date('l j\<\s\u\p\>S\<\/\s\u\p\> M',strtotime('+24 hours')); ?></p>
		</header><!-- .entry-header -->
	</div><!-- .inside-article -->
</article><!-- #post-## -->
		</a>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article" >
		<header class="entry-header">
	<h2 style="margin:0px;text-align:center;">
		<strong>School Jobs</strong><br>
		<a href="http://perthreliefteachers.com.au/school-job-days/01-monday">Mon</a> · 
		<a href="http://perthreliefteachers.com.au/school-job-days/02-tuesday">Tue</a> · 
		<a href="http://perthreliefteachers.com.au/school-job-days/03-wednesday">Wed</a> · 
		<a href="http://perthreliefteachers.com.au/school-job-days/04-thursday">Thu</a> · 
		<a href="http://perthreliefteachers.com.au/school-job-days/05-friday">Fri</a>
	</h2>
		</header>
	</div><!-- .inside-article -->
</article><!-- #post-## -->	
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>



<?php if ( 'PerthReliefTeachers.com.au' == get_the_author() ) { ?>
<?php } else { ?>

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

		<a href="<?php the_permalink(); ?>" title="<?php foreach((get_the_category()) as $category) {echo $category->cat_name . ' '; } ?>">	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php do_action( 'generate_before_content'); ?>
		<header class="entry-header">
<p>
	<?php if ( in_category( 'school' )) { ?>
	 an unknown school
	<?php } else { ?>
	<?php foreach((get_the_category()) as $category) {echo $category->cat_name . ' '; } ?>
	<?php } ?>
	<?php if( get_post_meta($post->ID, "days", true) ): ?>for <?php echo get_post_meta($post->ID, "days", true); ?>
	<?php else: ?><?php endif; ?>
</p>
		</header><!-- .entry-header -->
		<?php do_action( 'generate_after_entry_header'); ?>	
		<?php do_action( 'generate_after_entry_content'); ?>
		<?php do_action( 'generate_after_content'); ?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
		</a>

</span>

<?php } // end admin author post ?>
			


			<?php endwhile; ?>

			<?php generate_content_nav( 'nav-below' ); ?>
			
<?php endif; ?>	<!-- end of no teacher profile -->	
		
<?php elseif ( is_user_logged_in() && (current_user_can('school-cap'))) : ?>
<?php wp_redirect( 'http://perthreliefteachers.com.au/teacher', 302 ); exit; ?>
<?php endif; ?>	<!-- end of no job profile -->	

			
		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>



		<?php do_action('generate_after_main_content'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
do_action('generate_sidebars');
get_footer();