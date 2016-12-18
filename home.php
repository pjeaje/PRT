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

	<?php /******* if ( is_user_logged_in() && (current_user_can('teacher-cap') || current_user_can('admin-cap'))) { ?>
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
		
		
			
			
	<?php if ( is_user_logged_in() && (current_user_can('teacher-cap') || current_user_can('admin-cap'))) { ?>
	<header class="page-header">
	<h1 class="page-title">Schools Seeking<br />Relief Teachers</h1>
<p style="text-align:center;"><?php 	
date_default_timezone_set('Australia/Perth'); // Put your PHP supported timezone in place of America/New York
$script_tz = date_default_timezone_get();
// get current day:
echo date('g:ia e'); ?>
</p>
	</header><!-- .entry-header -->	

		<a href="http://perthreliefteachers.com.au/teacher-relief-work-today" title="Today's School Relief">	
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

		<a href="http://perthreliefteachers.com.au/teacher-relief-work-tomorrow" title="Tomorrow's School Relief">	
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
	<div class="inside-article">
<h2 style="margin:0px;text-align:center;">
School Relief Work<br>
<a href="http://perthreliefteachers.com.au/school-job-days/01-monday">Mon</a>&bull;<a href="http://perthreliefteachers.com.au/school-job-days/02-tuesday">Tue</a>&bull;<a href="http://perthreliefteachers.com.au/school-job-days/03-wednesday">Wed</a>&bull;<a href="http://perthreliefteachers.com.au/school-job-days/04-thursday">Thu</a>&bull;<a href="http://perthreliefteachers.com.au/school-job-days/05-friday">Fri</a>
</h2>
	</div>
</article>

<?php } elseif ( is_user_logged_in() && (current_user_can('ea-cap') || current_user_can('XXXadmin-cap'))){ ?>	
<?php wp_redirect( 'http://perthreliefteachers.com.au/ea-profile', 302 ); exit; ?>

	<?php } elseif  (!is_user_logged_in()){ ?>	
	<header class="page-header">
		<?php if( !is_mobile()) { ?>	
			<p class="mobilebest">
			<span class="fa-stack fa-lg">
			  <i class="fa fa-mobile fa-3x fa-stack-1x"></i>
			  <i class="fa fa-check fa-2x fa-stack-1x"></i>
			</span><br />
			This website is mobile friendly
			</p>			
		<?php } else { ?>			
		<?php } ?>
		
	<h2 style="padding:10px;font-size:1.5em;">Perth Relief Teachers is a 100% free service for <a href="http://perthreliefteachers.com.au/login-school"><strong>Schools</strong></a>, <a href="http://perthreliefteachers.com.au/login-teacher"><strong>Teachers</strong></a> and <a href="http://perthreliefteachers.com.au/ea-login"><strong>Education Assistants</strong></a>.
	<br /><br />
	<a href="http://perthreliefteachers.com.au/login-school"><strong>Schools</strong></a> can search for available teachers and education assistants.
        <br /><br />
        <a href="http://perthreliefteachers.com.au/login-school"><strong>Schools</strong></a> can list their relief work needs.
	<br /><br />
	<a href="http://perthreliefteachers.com.au/login-school"><strong>Schools</strong></a> can make a list of their preferred  teachers.
        <br /><br />
	<a href="http://perthreliefteachers.com.au/login-teacher"><strong>Teachers</strong></a> can search for schools in need of relief staff.
	<br /><br />
	<a href="http://perthreliefteachers.com.au/login-teacher"><strong>Teachers</strong></a> can list their availability.
	<br /><br />
	<a href="http://perthreliefteachers.com.au/ea-login"><strong>Education Assistants</strong></a> can list their availability.<br /><br />
	Our goal is to bring Schools and Staff together.
	</h2>		
	</header><!-- .entry-header -->	
	<?php } ?>
	
	<?php if ( is_user_logged_in() && (current_user_can('ea-cap') || current_user_can('teacher-cap') || current_user_can('admin-cap'))) { ?>
	<header class="page-header">
	<!-- <p>It is important you keep your <i class="fa fa-calendar" aria-hidden="true"></i> availability profile up-to-date <strong>each day</strong>. If you are working or unavailable on a particular day you must login and update your availability. Schools rely on the accuracy of your availability profile.</p> -->


<!-- START MODIFIED POST CONDITIONAL -->	
<?php
global $wpdb;
$pre=$wpdb->prefix;
date_default_timezone_set('Australia/Perth'); // Put your PHP supported timezone in place of America/New York
$script_tz = date_default_timezone_get();
$date=date("Y-m-d H:i:s",strtotime("-9 days"));
$userid=get_current_user_id();
$sql="SELECT p.ID FROM ".$pre."posts as p WHERE p.post_modified >= '".$date."' AND  p.post_author='".$userid."' AND p.post_type='teacher'";
$modpost=$wpdb->query($sql);
if($modpost){ ?>
	<p>Thanks for keeping your profile up to date</p>
<?php } else { ?>			
<?php /* wp_redirect( 'http://perthreliefteachers.com.au/?page_id=1537', 302 ); exit; */ ?>	
<?php if ( is_user_logged_in() && (current_user_can('teacher-cap'))) { ?>

<?php /*****
<center><img src="https://cdn.meme.am/instances/64773813.jpg"></center>
<h2 style="text-align:center;">Psst! Please update your profile</h2>
<p style="margin:20px;">Your <a href="http://perthreliefteachers.com.au/my-profile"><strong>availability</strong></a> needs updating <strong>at least once a week</strong>(or each day you are unavailable). Schools rely on the accuracy of your <a href="http://perthreliefteachers.com.au/my-profile"><strong>availability</strong></a>.</p>
<p style="margin:20px;">If you like you can set your <a href="http://perthreliefteachers.com.au/my-profile"><strong>availability</strong></a> as "No Days" for the current week (It takes less than a minute to update). Teachers are listed according to how recently they have updated their availability.</p>
*****/ ?>

<?php wp_redirect( 'http://perthreliefteachers.com.au/?page_id=1537', 302 ); exit; ?>	

<?php } elseif  (!is_user_logged_in()){ ?>
<?php } ?>
<?php } ?>		
<!-- END MODIFIED POST CONDITIONAL -->	


<?php
global $wpdb;
$pre=$wpdb->prefix;
date_default_timezone_set('Australia/Perth'); // Put your PHP supported timezone in place of America/New York
$script_tz = date_default_timezone_get();
$date=date("Y-m-d H:i:s",strtotime("-16 days"));
$userid=get_current_user_id();
$sql="SELECT p.ID FROM ".$pre."posts as p WHERE p.post_modified >= '".$date."' AND  p.post_author='".$userid."' AND p.post_type='teacher'";
$modpost=$wpdb->query($sql);
if($modpost){ ?>
<!-- thanks for being updated! -->
<?php } else { ?>			
<?php /* wp_redirect( 'http://perthreliefteachers.com.au/?page_id=1537', 302 ); exit; */ ?>	
<?php if ( is_user_logged_in() && (current_user_can('teacher-cap'))) { ?>
<?php wp_redirect( 'http://perthreliefteachers.com.au/please-update-your-availability', 302 ); exit; ?>

<?php } elseif  (!is_user_logged_in()){ ?>
<?php } ?>
<?php } ?>	

	</header><!-- .entry-header -->	
	<?php } else { ?>	
	<?php } ?>			

<?php if (( 0 == count_user_posts( get_current_user_id(), "teacher" ) && is_user_logged_in() && current_user_can('teacher-cap')) && !current_user_can('admin-cap') ) :?>		
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article update2">
		<p>You need to update your <a href="http://perthreliefteachers.com.au/teacher-profile"><strong>Availability</strong></a> before you can view school jobs. This is <strong>very</strong> (very) important!</p>
	</div>
</article>
<?php elseif (( 0 !== count_user_posts( get_current_user_id(), "teacher" ) && is_user_logged_in() && current_user_can('teacher-cap')) || (current_user_can('admin-cap') ) ) :?>	
		
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

<?php /* <div <?php post_class( 0 === ++$GLOBALS['wpdb']->current_post % 2 ? 'second' : '' ); ?>> */ ?>	

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
<?php } elseif ( post_is_in_descendant_category( 997 ) ) { ?>
<span class="private-primary">
<?php } else { ?>
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
	<?php foreach((get_the_category()) as $category) {echo $category->cat_name . ''; } ?>
<?php } ?><?php
add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
$timelimit=6.5 * 86400; // 6.5 days * seconds per day
$post_age = date('U') - get_the_modified_date('U');
if ($post_age < $timelimit) : ?>
<?php elseif ($post_age > $timelimit) : ?>
.
<?php /*****
$to = get_the_author_meta( 'user_email' );
$subject = 'A teacher wants to know your relief work status';
$message = '<img src="http://perthreliefteachers.com.au/wp-content/uploads/PerthReliefTeachers-logo-800.jpg" alt="PerthReliefTeachers.com.au Alert" /><br /><br /><br />Hi there, another teacher wants to know your relief work status - please login to <a href="http://perthreliefteachers.com.au/teacher-profile">PerthReliefTeachers.com.au</a> and update your relief work needs for the current week. If you like you can set your <a href="http://perthreliefteachers.com.au/school-job-list">relief work status</a> as "No Days" for the current week (It takes less than a minute to update). Schools are listed according to how recently they have updated their profile.<br /><br />Regards,<br /><a href="http://perthreliefteachers.com.au/">PerthReliefTeachers.com.au</a>'; 
$headers[] = 'From: Perth Relief Teachers <contact@perthreliefteachers.com.au>';
wp_mail( $to, $subject, $message, $headers );
remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' ); *****/ ?>
<?php endif; ?>		
</p>
		</header><!-- .entry-header -->
		<?php do_action( 'XXXgenerate_after_entry_header'); ?>	
		<?php do_action( 'XXXgenerate_after_entry_content'); ?>
		<?php do_action( 'XXXgenerate_after_content'); ?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
		</a>

</span>

<?php } // end admin author post ?>
			
<?php /* </div> */ ?>

			<?php endwhile; ?>

			<?php generate_content_nav( 'nav-below' ); ?>
			
<?php elseif ( is_user_logged_in() && (current_user_can('school-cap'))) : ?>
<?php wp_redirect( 'http://perthreliefteachers.com.au/teacher', 302 ); exit; ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
				<div class="inside-article">
	<h2 style="padding:10px;font-size:1.5em;">It is important you keep your <a href="http://perthreliefteachers.com.au/post-a-job"><strong>job profile</strong></a> up-to-date <strong>each day</strong>. Schools rely on the accuracy of your <a href="http://perthreliefteachers.com.au/post-a-job"><strong>job profile</strong></a>.</h2>
				</div>
		</article>
<?php endif; ?>	<!-- end of no job profile -->	

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
		<div class="inside-article">
<?php $result = count_users(); echo 'There are ', $result['total_users'], ' total members'; ?> <?php $terms = get_terms( 'category', array(
    'fields' => 'count',
) ); ?>
		</div>
</article>			
		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>

<?php /*****
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">		
		<div class="entry-content" itemprop="text">	
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
	</div>
</article>		
*****/ ?>		

		<?php do_action('generate_after_main_content'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
do_action('generate_sidebars');
get_footer();