<?php
/**
 * The Template for displaying all single posts.
 *
 * @package GeneratePress
 */

get_header(); ?>

<?php /***** RCPro conditional
<?php if( rcp_is_active() && 2 == rcp_get_subscription_id() ) : ?>
if they are a member
<?php elseif(rcp_is_active() && 2 !== rcp_get_subscription_id()) : ?>
if they are not a member
<?php endif; ?>
*****/ ?>

	<div id="primary" <?php generate_content_class();?>>
		<main id="main" <?php generate_main_class(); ?>>
		<?php do_action('generate_before_main_content'); ?>
		
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
		
		<?php while ( have_posts() ) : the_post(); ?>
	
<?php setPostViews(get_the_ID()); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">	
	
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
<!-- thanks for being updated! -->
<?php } else { ?>			
<?php /* wp_redirect( 'https://perthreliefteachers.com.au/my-profile', 302 ); exit; */ ?>	
<?php if ( is_user_logged_in() && (current_user_can('teacher-cap'))) { ?>

<?php /*****
<center><img src="https://cdn.meme.am/instances/64773813.jpg"></center>
<h2 style="text-align:center;">Psst! Please update your profile</h2>
<p style="margin:20px;">Your <a href="http://perthreliefteachers.com.au/my-profile"><strong>availability</strong></a> needs updating <strong>at least once a week, OR each day you are unavailable</strong>. Schools rely on the accuracy of your <a href="http://perthreliefteachers.com.au/my-profile"><strong>availability</strong></a>.<br /><br />
If you like you can set your <a href="http://perthreliefteachers.com.au/my-profile"><strong>availability</strong></a> as "No Days" for the current week (It takes less than a minute to update). Teachers are listed according to how recently they have updated their availability.</p>
*****/ ?>

<?php wp_redirect( 'https://perthreliefteachers.com.au/my-profile', 302 ); exit; ?>	

<?php } elseif  (!is_user_logged_in()){ ?>
<?php } ?>
<?php } ?>	
	
<?php global $current_user;	if ((is_user_logged_in() && $current_user->ID == $post->post_author)) { ?>
<?php /**** You are the post author ****/ ?>
<?php } else { ?>	
<?php /**** You are the post author ****/ ?>
<?php } ?>
	
		<?php do_action( 'generate_before_content'); ?>

	
		<header class="entry-header">
			<?php if ( generate_show_title() ) : ?>
			<h1 class="page-title">
			<?php
				$cats = wp_get_post_categories($post->ID);
				if($cats) : foreach($cats as $cat) : $category = get_category($cat);
				?>
				<a href="<?php echo get_category_link($category->cat_ID); ?>"><?php echo $category->name ?></a>
				<?php
				endforeach;endif;
			?>				
			</h1>
			<?php endif; ?>
	
		

<?php if ( is_user_logged_in() ) { ?>
<?php
add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
$timelimit=6 * 86400; // 7 days * seconds per day
$post_age = date('U') - get_the_modified_date('U');
if ($post_age < $timelimit) : ?>

<?php elseif ($post_age > $timelimit) : ?>
<!-- <p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> This school hasn't updated their job availability for this week.<br />
<i class="fa fa-envelope" aria-hidden="true"></i> An email has been sent asking them to update their relief job status.</p> -->
<?php
$to = get_the_author_meta( 'user_email' );
$subject = 'A teacher wants to know your school\'s relief work status';
$message = '<img src="http://perthreliefteachers.com.au/wp-content/uploads/PerthReliefTeachers-logo-800.jpg" alt="PerthReliefTeachers.com.au Alert" /><br /><br /><br />Hi there,<br /><br />A teacher wants to know your school\'s relief work availability for this week - please login to <a href="http://perthreliefteachers.com.au/school-job-list">PerthReliefTeachers.com.au</a> and update your Job Profile.<br /><br />If you like you can set your job status as "No Jobs" for the current week (It takes less than a minute to update).<br /><br />Schools are listed according to how recently they have updated their Job Profile.<br /><br />Regards,<br /><a href="http://perthreliefteachers.com.au/">PerthReliefTeachers.com.au</a>'; 
$headers[] = 'From: Perth Relief Teachers <contact@perthreliefteachers.com.au>';
wp_mail( $to, $subject, $message, $headers );
remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' ); ?>
<?php endif; ?>
<?php } ?>

			<div class="bold">
			<p>				
<?php
foreach((get_the_category()) as $childcat) {
	$parentcat = $childcat->category_parent;
	if( $parentcat != 0 ) echo '<a href="' . get_category_link($parentcat) .'">' .get_cat_name($parentcat) .'</a>';
	else echo '<a href="' . get_category_link($childcat) .'">' .$childcat->cat_name .'</a>';
}
?>
			</p>
			</div>
			
<?php global $current_user;	if ((is_user_logged_in() && $current_user->ID == $post->post_author)) { ?>

	<p style="text-align:center;font-size:12px;">

Last updated <?php /* the_modified_date('j\<\s\u\p\>S\<\/\s\u\p\> M Y'); ?> at <?php the_modified_date('g:i a'); */ ?> <?php echo human_time_diff(get_the_modified_date('U'), current_time('timestamp')) . ' ago'; ?><br />member since: <?php the_date('j\<\s\u\p\>S\<\/\s\u\p\> M Y'); ?></p>	
<?php if(has_term('', 'school-job-days')) {?>
	<p style="text-align:left;"><strong>Work available</strong>: 
		<?php
			$tax_1 = get_the_terms( get_the_ID(), 'school-job-days' );
			// Make sure we have terms and also check for WP_Error object
			if (    $tax_1
			&& !is_wp_error( $tax_1 )
			) {
			@usort( $tax_1, function ( $a, $b )
			{
			return strcasecmp( 
			$a->slug,
			$b->slug
			);
			});
			// Display your terms as normal
			$term_list = [];
			foreach ( $tax_1 as $term ) 
			$term_list[] = esc_html( $term->name );
			//$term_list[] = '<a href="' . get_term_link( $term ) . '">' . esc_html( $term->name ) . '</a>';
			echo implode( ', ', $term_list );
			}
		?>
<?php if(has_term('06-no-days', 'school-job-days')) {?>
 - check back tomorrow
<?php } else { ?>
<?php } ?>						

<?php } else { ?>
-----
<?php } ?>
<br />			
<strong>Contact</strong>: <?php the_title(); ?>
	<?php if( get_post_meta($post->ID, "alternate_number", true) ): ?>
<br />
<strong>Phone</strong>: <?php echo get_post_meta($post->ID, "alternate_number", true); ?></p>
		<?php else: ?>
		<?php endif; ?>
	
		<?php if( get_post_meta($post->ID, "short_message", true) ): ?>
		<p class="short_message" style="font-weight:400;text-align:left;">
		<?php echo nl2br(get_post_meta($post->ID, 'short_message', true)); ?>
		</p>
	<?php else: ?><?php endif; ?>	
			
<?php } elseif ( is_user_logged_in() && (current_user_can('school-cap') && !current_user_can('admin-cap')) ){ ?>	
<h2 style="margin:20px;padding:0px;">Schools are not permitted to view other school's profiles.</h2>
<?php } ?>				
			
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
		
		<?php do_action( 'generate_after_entry_header'); ?>	

			<hr style="margin:10px;"/>
		
		<div class="entry-content" itemprop="text">	
		
<?php if ( is_user_logged_in() && (current_user_can('school-cap') || current_user_can('admin-cap'))) { ?>

<?php } elseif  (!is_user_logged_in()){ ?>	
	<p style="margin:20px;">If you are a <a href="http://perthreliefteachers.com.au/login-teacher"><strong>teacher</strong></a> or an <a href="http://perthreliefteachers.com.au/ea-login"><strong>education assistant</strong></a> you can register and login to find available relief work at <?php foreach((get_the_category()) as $category) { echo $category->cat_name . ''; } ?>.<br />If you are the <a href="http://perthreliefteachers.com.au/login-school"><strong>relief co-ordinator</strong></a> of <?php foreach((get_the_category()) as $category) { echo $category->cat_name . ''; } ?> you can register and login to list your relief work and search for relief staff.</p>
		
	<div style="padding:10px;background:#eee;margin:5px;"><iframe width="1000" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.au/maps?q=<?php foreach((get_the_category()) as $category) {echo $category->cat_name . ''; } ?>&amp;hl=en&amp;hnear=<?php foreach((get_the_category()) as $category) {echo $category->cat_name . ''; } ?>&amp;t=m&amp;ie=UTF8&amp;hq=&amp;z=14&amp;output=embed&amp;iwloc=near"></iframe></div>		
<?php } ?>	
			
<?php if ( ( 0 == count_user_posts( get_current_user_id(), "teacher" ) && is_user_logged_in() && current_user_can('teacher-cap') && !current_user_can('admin-cap')) ) :?>		
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article update">
		<p>You need to post your <a href="http://perthreliefteachers.com.au/teacher-profile"><strong>Availability</strong></a> before you can view school jobs.</p>
	</div>
</article>
<?php elseif (( current_user_can('ea-cap') || current_user_can('school-cap')) && !current_user_can('admin-cap') ) :?>

	<div style="text-align:center;">
<?php if( get_post_meta($post->ID, "alternate_number", true) ): ?>
			
	<?php if (is_mobile()) { ?>		
		<?php if( get_post_meta($post->ID, "alternate_number", true) ): ?>	
		<a href="tel:<?php echo get_post_meta($post->ID, "alternate_number", true); ?>" target="_blank" >
		<p class="contact-apply">					
		Phone <i class="fa fa-mobile"></i>
		</p>
		</a>					
		<?php else: ?>	
		<?php endif; ?>
	<?php } else { ?>			
	<?php } ?>
				
	<?php if (is_mobile() && is_android()) { ?>		
		<?php if( get_post_meta($post->ID, "alternate_number", true) ): ?>	
		<a href="sms:<?php echo get_post_meta($post->ID, "alternate_number", true); ?>?body=I am interested in relief work at your school.  Please contact me. %0a%0aSent via PerthReliefTeachers.com.au ">
		<p class="contact-android">					
		SMS <i class="fa fa-android"></i>
		</p>
		</a>					
		<?php else: ?>	
		<?php endif; ?>
	<?php } else { ?>			
	<?php } ?>

	<?php if (is_mobile() && is_ios() && is_iphone()) { ?>
		<?php if( get_post_meta($post->ID, "alternate_number", true) ): ?>	
		<a href="sms:<?php echo get_post_meta($post->ID, "alternate_number", true); ?>&body=I am interested in relief work at your school.  Please contact me. %0a%0aSent via PerthReliefTeachers.com.au ">
		<p class="contact-apple">					
		SMS <i class="fa fa-apple"></i>
		</p>
		</a>					
		<?php else: ?>	
		<?php endif; ?>	
	<?php } else { ?>			
	<?php } ?>			
	
		<a href="https://www.google.com.au/search?q=<?php foreach((get_the_category()) as $category) {echo $category->cat_name . ''; } ?>+western+australia" target="_blank">
		<p class="contact">					
		School Info <i class="fa fa-phone"></i>&nbsp;<i class="fa fa-globe"></i>&nbsp;<i class="fa fa-map-marker"></i>
		</p>
		</a>	
			
<?php else: ?>
		<a href="https://www.google.com.au/search?q=<?php foreach((get_the_category()) as $category) {echo $category->cat_name . ''; } ?>+western+australia" target="_blank">
		<p class="contact-apply">					
		Contact <i class="fa fa-globe"></i> <i class="fa fa-map-marker"></i> <i class="fa fa-phone"></i>				
		</p>					
		</a>					 
<?php endif; ?>


 
<div style="padding:10px;background:#eee;margin:5px;"><iframe width="1000" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.au/maps?q=<?php foreach((get_the_category()) as $category) {echo $category->cat_name . ''; } ?>&amp;hl=en&amp;hnear=<?php foreach((get_the_category()) as $category) {echo $category->cat_name . ''; } ?>&amp;t=m&amp;ie=UTF8&amp;hq=&amp;z=14&amp;output=embed&amp;iwloc=near"></iframe></div>
	</div>			
		</div><!-- .entry-content -->


<?php elseif (( 0 !== count_user_posts( get_current_user_id(), "teacher" ) && is_user_logged_in()  && current_user_can('teacher-cap') ) || 
 ( current_user_can('admin-cap') || current_user_can('school-cap') ) ) :?>

<?php if( rcp_is_active() && 2 == rcp_get_subscription_id() ) : ?>
	<p style="text-align:center;font-size:12px;">
<?php the_author_meta('user_login'); ?><br />
Last updated <?php /* the_modified_date('j\<\s\u\p\>S\<\/\s\u\p\> M Y'); ?> at <?php the_modified_date('g:i a'); */ ?> <?php echo human_time_diff(get_the_modified_date('U'), current_time('timestamp')) . ' ago'; ?>
<?php elseif(rcp_is_active() && 2 !== rcp_get_subscription_id()) : ?>
	<p style="text-align:center;font-size:12px;">Last updated: <i class="fa fa-user-plus" aria-hidden="true"></i> Teacher-Plus members only
<?php endif; ?>


<br /> 
member since: <?php the_date('j\<\s\u\p\>S\<\/\s\u\p\> M Y'); ?></p>	
<?php if(has_term('', 'school-job-days')) {?>
	<p><strong>Work available</strong>: 
		<?php
			$tax_1 = get_the_terms( get_the_ID(), 'school-job-days' );
			// Make sure we have terms and also check for WP_Error object
			if (    $tax_1
			&& !is_wp_error( $tax_1 )
			) {
			@usort( $tax_1, function ( $a, $b )
			{
			return strcasecmp( 
			$a->slug,
			$b->slug
			);
			});
			// Display your terms as normal
			$term_list = [];
			foreach ( $tax_1 as $term ) 
			//$term_list[] = esc_html( $term->name );
			$term_list[] = '<a href="' . get_term_link( $term ) . '">' . esc_html( $term->name ) . '</a>';
			echo implode( ', ', $term_list );
			}
		?>
<?php if(has_term('06-no-days', 'school-job-days')) {?>
 - check back tomorrow
<?php } else { ?>
<?php } ?>						
	</p>
<?php } else { ?>
vvv
<?php } ?>

			
	<p><strong>Contact</strong>: <?php the_title(); ?></p>
	<?php if( get_post_meta($post->ID, "alternate_number", true) ): ?>
		<p><strong>Phone</strong>: <?php echo get_post_meta($post->ID, "alternate_number", true); ?></p>
		<?php else: ?>
		<?php endif; ?>
	
		<?php if( get_post_meta($post->ID, "short_message", true) ): ?>
		<p style="font-weight:400;text-align:left;" class="short_message">
		<?php echo nl2br( get_post_meta( $post->ID, 'short_message', true ) ); ?>
		</p>
	<?php else: ?><?php endif; ?>	
	
	<div style="text-align:center;">
<?php if( get_post_meta($post->ID, "alternate_number", true) ): ?>
			
	<?php if (is_mobile()) { ?>		
		<?php if( get_post_meta($post->ID, "alternate_number", true) ): ?>	
		<a href="tel:<?php echo get_post_meta($post->ID, "alternate_number", true); ?>" target="_blank" >
		<p class="contact-apply">					
		Phone <i class="fa fa-mobile"></i>
		</p>
		</a>					
		<?php else: ?>	
		<?php endif; ?>
	<?php } else { ?>			
	<?php } ?>
				
	<?php if (is_mobile() && is_android()) { ?>		
		<?php if( get_post_meta($post->ID, "alternate_number", true) ): ?>	
		<a href="sms:<?php echo get_post_meta($post->ID, "alternate_number", true); ?>?body=I am interested in relief work at your school.  Please contact me. %0a%0aSent via PerthReliefTeachers.com.au ">
		<p class="contact-android">					
		SMS <i class="fa fa-android"></i>
		</p>
		</a>					
		<?php else: ?>	
		<?php endif; ?>
	<?php } else { ?>			
	<?php } ?>

	<?php if (is_mobile() && is_ios() && is_iphone()) { ?>
		<?php if( get_post_meta($post->ID, "alternate_number", true) ): ?>	
		<a href="sms:<?php echo get_post_meta($post->ID, "alternate_number", true); ?>&body=I am interested in relief work at your school.  Please contact me. %0a%0aSent via PerthReliefTeachers.com.au ">
		<p class="contact-apple">					
		SMS <i class="fa fa-apple"></i>
		</p>
		</a>					
		<?php else: ?>	
		<?php endif; ?>		
	<?php } else { ?>			
	<?php } ?>	

	<?php /**** if ( is_user_logged_in() && (current_user_can('teacher-cap') || current_user_can('admin-cap')) ) { ?>
		<a href="https://chat.whatsapp.com/DlVdcqFKFCt7aGqa7HgxR9">
		<p class="contact-apple">					
		WhatsApp <i class="fa fa-whatsapp"></i>
		</p>
		</a>		
	<?php } else { ?>			
	<?php } ****/ ?>	
	
		<a href="https://www.google.com.au/search?q=<?php foreach((get_the_category()) as $category) {echo $category->cat_name . ''; } ?>+western+australia" target="_blank">
		<p class="contact">					
		School Info <i class="fa fa-phone"></i>&nbsp;<i class="fa fa-globe"></i>&nbsp;<i class="fa fa-map-marker"></i>
		</p>
		</a>	
		
			
			
<?php else: ?>
		<a href="https://www.google.com.au/search?q=<?php foreach((get_the_category()) as $category) {echo $category->cat_name . ''; } ?>+western+australia" target="_blank">
		<p class="contact-apply">					
		Contact <i class="fa fa-globe"></i> <i class="fa fa-map-marker"></i> <i class="fa fa-phone"></i>				
		</p>					
		</a>					 
<?php endif; ?>

 
<div style="padding:10px;background:#eee;margin:5px;"><iframe width="1000" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.au/maps?q=<?php foreach((get_the_category()) as $category) {echo $category->cat_name . ''; } ?>&amp;hl=en&amp;hnear=<?php foreach((get_the_category()) as $category) {echo $category->cat_name . ''; } ?>&amp;t=m&amp;ie=UTF8&amp;hq=&amp;z=11&amp;output=embed&amp;iwloc=near"></iframe></div>

<small><?php echo getPostViews(get_the_ID()); ?></small>

	</div>			
		</div><!-- .entry-content -->	

		<?php /* do_action( 'generate_after_entry_content'); */ ?>
		
<?php endif; ?>	<!-- end of no job profile -->			

		<?php /* 
		<footer class="entry-meta">
			Posted by the_author();
			<br />
		*/ ?>

<?php /* if (strtotime($post->post_date) > strtotime('-3 hours')): ?>
<b>NEW</b>
<?php endif; */ ?>

<?php /* if (strtotime($post->post_date) > strtotime('-2 hours')) { ?>#1
<?php } elseif  (strtotime($post->post_date) > strtotime('+2 hours')){ ?>#2
<?php } elseif  (strtotime($post->post_date) < strtotime('-2 hours')){ ?>#3
<?php } elseif  (strtotime($post->post_date) < strtotime('+2 hours')){ ?>#4
<?php } elseif  (strtotime($post->post_date) > strtotime('0 hours')){ ?>#5
<?php } */ ?>


		</footer><!-- .entry-meta -->		
		
		<?php do_action( 'generate_after_content'); ?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->



			<?php if ( comments_open() || '0' != get_comments_number() ) : ?>
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