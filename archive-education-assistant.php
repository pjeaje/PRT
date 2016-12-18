<?php
/**
 * The template for displaying EA Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package GeneratePress
 */

get_header(); ?>

	<section id="primary" <?php generate_content_class(); ?>>
		<main id="main" <?php generate_main_class(); ?>>
		<?php do_action('generate_before_main_content'); ?>
		
<?php if ( is_mobile() && (is_iphone() || is_android()) ) { ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
				<div class="inside-article" style="text-align:center" >
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
		
<?php } else { ?>

		<?php /**** ?><article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
				<div class="inside-article" style="text-align:center" >
					<small><strong><a href="http://shockwave.net.au" title="Shockwave Electrical - Commercial School Electricians">Shockwave Electrical - Commercial Electricians</a></strong><br />Electrical contractors for schools</small>
				</div>
		</article><?php ****/ ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
				<div class="inside-article" style="text-align:center" >
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
		
<?php } ?>		
		
<?php if ( is_user_logged_in() && (current_user_can('school-cap') || current_user_can('admin-cap'))) { ?>
		
		<?php if ( have_posts() ) : ?>

		<?php /******* 
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
			<a href="http://perthreliefteachers.com.au/school-job-list">
				<div class="inside-article update">
					<h2><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please Update Your Job Profile</h2>
				</div>
			</a>
		</article>
		*******/ ?>	
		
			<header class="page-header<?php if ( is_author() ) echo ' clearfix';?>">
				<h1 class="page-title">			
<?php
$result = count_users();
$show = array('ea', '');
echo ' ';
foreach($result['avail_roles'] as $role => $count){
if( in_array($role, $show)) {
echo '
', $count;
}
}
?> Education Assistants</h1>
<p style="text-align:center;"><?php 	
date_default_timezone_set('Australia/Perth'); // Put your PHP supported timezone
$script_tz = date_default_timezone_get();
// get current day:
echo date('g:ia e'); ?></p>

	<?php if ( is_user_logged_in() && (current_user_can('school-cap') || current_user_can('ea-cap') || current_user_can('teacher-cap') || current_user_can('admin-cap'))) { ?>
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
				
			</header><!-- .page-header -->			

<?php if (( 0 == count_user_posts( get_current_user_id(), "post" ) && is_user_logged_in() && current_user_can('school-cap')) && !current_user_can('admin-cap') ) :?>		
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<p style="margin:10px;">You need to update your <a href="http://perthreliefteachers.com.au/post-a-job"><strong>Job Profile</strong></a> before you can contact EAs.</p>
	</div>
</article>
<?php elseif (( 0 !== count_user_posts( get_current_user_id(), "post" ) && is_user_logged_in() && current_user_can('school-cap')) || current_user_can('admin-cap') ) :?>	


		<a href="http://perthreliefteachers.com.au/eas-available-today" title="Today's Available Education Assistants">	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article eatoday" >
		<header class="entry-header">
		<p>Today - <?php 
date_default_timezone_set('Australia/Perth'); // Put your PHP supported timezone
$script_tz = date_default_timezone_get();		
echo date('l j\<\s\u\p\>S\<\/\s\u\p\> M'); ?></p>
		</header><!-- .entry-header -->
	</div><!-- .inside-article -->
</article><!-- #post-## -->
		</a>

		<a href="http://perthreliefteachers.com.au/eas-available-tomorrow" title="Tomorrow's Available Education Assistants">	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article eatomorrow" >
		<header class="entry-header">
		<p>Tomorrow - <?php 
date_default_timezone_set('Australia/Perth'); // Put your PHP supported timezone
$script_tz = date_default_timezone_get();		
echo date('l j\<\s\u\p\>S\<\/\s\u\p\> M',strtotime('+24 hours')); ?></p>
		</header><!-- .entry-header -->
	</div><!-- .inside-article -->
</article><!-- #post-## -->
		</a>

		<a href="http://perthreliefteachers.com.au/favs#eafavs" title="Favourite teachers">	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article favourite" >
		<header class="entry-header">
		<p>Your EA Relief List <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></p>
		</header><!-- .entry-header -->
	</div><!-- .inside-article -->
</article><!-- #post-## -->
		</a>	
		
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
<h2 style="margin:0px;text-align:center;">
EA Availability<br>
<a href="http://perthreliefteachers.com.au/ea-days/01-monday">Mon</a>&bull;<a href="http://perthreliefteachers.com.au/ea-days/02-tuesday">Tue</a>&bull;<a href="http://perthreliefteachers.com.au/ea-days/03-wednesday">Wed</a>&bull;<a href="http://perthreliefteachers.com.au/ea-days/04-thursday">Thu</a>&bull;<a href="http://perthreliefteachers.com.au/ea-days/05-friday">Fri</a>
</h2>
<?php echo do_shortcode(' [do_widget id=enhancedtextwidget-33]'); ?>
	</div>
</article>


			
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

<div <?php post_class( 0 === ++$GLOBALS['wpdb']->current_post % 2 ? 'second' : '' ); ?>>

<?php /* <span class="rural-primary"> */ ?>	

		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article teacher-list">
		<?php do_action( 'generate_before_content'); ?>
		<header class="entry-header">

		<p>
<?php if ( has_post_thumbnail() ) { ?>
<?php the_post_thumbnail(); ?> 
<?php } else { ?>
<?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
<?php } ?> 
		<?php the_title(); ?><?php
add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
$timelimit=6.5 * 86400; // 7 days * seconds per day
$post_age = date('U') - get_the_modified_date('U');
if ($post_age < $timelimit) : ?>
<?php elseif ($post_age > $timelimit) : ?>
.
<?php /*****
$to = get_the_author_meta( 'user_email' );
$subject = 'A school wants to know your availability';
$message = '<img src="http://perthreliefteachers.com.au/wp-content/uploads/PerthReliefTeachers-logo-800.jpg" alt="PerthReliefTeachers.com.au Alert" /><br /><br /><br />Hi there, another school wants to know your availability - please login to <a href="http://perthreliefteachers.com.au/ea-profile">PerthReliefTeachers.com.au</a> and update your Availability. If you like you can set your <a href="http://perthreliefteachers.com.au/ea-profile">availability</a> as "No Days" for the current week (It takes less than a minute to update). Teachers are listed according to how recently they have updated their availability.<br /><br />Regards,<br /><a href="http://perthreliefteachers.com.au/">PerthReliefTeachers.com.au</a>'; 
$headers[] = 'From: Perth Relief Teachers <contact@perthreliefteachers.com.au>';
wp_mail( $to, $subject, $message, $headers );
remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' ); *****/ ?>
<?php endif; ?>				
		
		
		</p>
		</header><!-- .entry-header -->
		<?php do_action( 'xxxgenerate_after_entry_header'); ?>	
		<?php do_action( 'generate_after_entry_content'); ?>
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

<?php } elseif  (!is_user_logged_in() || current_user_can('teacher-cap') || current_user_can('ea-cap')){ ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php do_action( 'generate_before_content'); ?>
		<header class="entry-header">
		<h1 style="text-align:center;"><i class="fa fa-lock fa-5x" aria-hidden="true"></i>
</h1>
<?php wp_redirect( 'http://perthreliefteachers.com.au', 302 ); exit; ?>
		</header><!-- .entry-header -->
	</div><!-- .inside-article -->
</article><!-- #post-## -->		
<?php } ?>	

<?php /*
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article" style="padding:20px;" >		
		<div class="entry-content" style="padding:0px;text-align:center;" itemprop="text">	
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
*/ ?>
	
		<?php do_action('generate_after_main_content'); ?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php 
do_action('generate_sidebars');
get_footer();