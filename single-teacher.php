<?php
/**
 * The Template for displaying all teacher posts.
 *
 * @package GeneratePress
 */

get_header(); ?>

	<div id="primary" <?php generate_content_class();?>>
		<main id="main" <?php generate_main_class(); ?>>
		<?php do_action('generate_before_main_content'); ?>

<?php if( is_user_logged_in() && rcp_is_active() && 1 == rcp_get_subscription_id() ) : ?>
<?php elseif(is_user_logged_in() && !rcp_is_active() && 1 !== rcp_get_subscription_id()) : ?>
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
<?php endif; ?>			
		


		
<?php if ( is_user_logged_in() && (current_user_can('school-cap') || current_user_can('admin-cap'))) { ?>		
		
		<?php while ( have_posts() ) : the_post(); ?>

<?php setPostViews(get_the_ID()); ?>		


<!-- START MODIFIED POST CONDITIONAL -->	
<?php
global $wpdb;
$pre=$wpdb->prefix;
date_default_timezone_set('Australia/Perth'); // Put your PHP supported timezone in place of America/New York
$script_tz = date_default_timezone_get();
$date=date("Y-m-d H:i:s",strtotime("-9 days"));
$userid=get_current_user_id();
$sql="SELECT p.ID FROM ".$pre."posts as p WHERE p.post_modified >= '".$date."' AND  p.post_author='".$userid."' AND p.post_type='post'";
$modpost=$wpdb->query($sql);
if($modpost){ ?>
<!--
<p>Thanks for keeping your relief profile up to date</p>
-->	


<?php } else { ?>	

<?php if( is_user_logged_in() && !rcp_is_active() && (1 != rcp_get_subscription_id() || 2 != rcp_get_subscription_id()) ) : ?>
<?php /* wp_redirect( 'https://perthreliefteachers.com.au/?page_id=1705', 302 ); exit; */ ?>
<?php endif; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article" style="padding:10px" >
	<h2 style="text-align:center;">Psst! Please update your school relief profile</h2>
	<p class="center"><strong><?php date_default_timezone_set('Australia/Perth'); $current_dayname = date("l"); echo $date = date("l jS M",strtotime('monday this week')).' to '.date("l jS M",strtotime("sunday this week")); ?></strong></p>
		<p>Hi there, your school hasn't updated their <a href="https://perthreliefteachers.com.au/school-job-list">relief profile</a> for over a week. Your <a href="https://perthreliefteachers.com.au/school-job-list">relief work profile</a> is only current from <?php date_default_timezone_set('Australia/Perth'); $current_dayname = date("l"); echo $date = date("l jS F",strtotime('monday this week')).' to '.date("l jS F",strtotime("sunday this week")); ?> <strong>this week</strong> so you need to update your profile at least once a week to keep it up-to-date for the teachers. Teachers rely on the accuracy of your <a href="https://perthreliefteachers.com.au/school-job-list">relief work profile</a>.</p>

		</p>If you like you can set your <a href="https://perthreliefteachers.com.au/school-job-list">relief profile</a> as "No Days" for the current <?php date_default_timezone_set('Australia/Perth'); $current_dayname = date("l"); echo $date = date("jS M",strtotime('monday this week')).' to '.date("jS M",strtotime("sunday this week")); ?> week (It takes less than a minute to update).</p>

		</p>Schools are listed according to how recently they have updated their <a href="https://perthreliefteachers.com.au/school-job-list">relief profile</a>.</p>
		
	</div>
</article>

		<?php $monday = date( 'Y-m-d', strtotime( 'monday this week' ) ); ?>
		<?php $friday = date( 'Y-m-d', strtotime( 'friday this week' ) ); ?>


<?php } ?>		
<!-- END MODIFIED POST CONDITIONAL -->	
		
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php do_action( 'XXXXXgenerate_before_contentXXXXX'); ?>
	
		<header class="entry-header">
		

<?php
add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
$timelimit=6 * 86400; // 7 days * seconds per day
$post_age = date('U') - get_the_modified_date('U');
if ($post_age < $timelimit) : ?>

<?php elseif ($post_age > $timelimit) : ?>
<!-- <p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> This teacher hasn't updated their availability for this week.<br />
<i class="fa fa-envelope" aria-hidden="true"></i> An email has been sent asking them to update their availability.</p> -->
<?php
$to = get_the_author_meta( 'user_email' );
$subject = 'A school wants to know your availability';
$message = '<img src="http://perthreliefteachers.com.au/wp-content/uploads/PerthReliefTeachers-logo-800.jpg" alt="PerthReliefTeachers.com.au Alert" /><br /><br /><br />Hi there,<br /><br />A school wants to know your availability - please login to <a href="http://perthreliefteachers.com.au/teacher-profile">PerthReliefTeachers.com.au</a> and update your <a href="http://perthreliefteachers.com.au/teacher-profile">availability</a> for this week. If you like you can set your <a href="http://perthreliefteachers.com.au/teacher-profile">availability</a> as "No Days" for the current week (It takes less than a minute to update). Teachers are listed according to how recently they have updated their availability.<br /><br />
Your availability is only for the <strong>current week</strong>, so you need to update your availability each week (or each day if it changes).
<br /><br />
Regards,<br /><a href="http://perthreliefteachers.com.au/">PerthReliefTeachers.com.au</a>'; 
$headers[] = 'From: Perth Relief Teachers <contact@perthreliefteachers.com.au>';
wp_mail( $to, $subject, $message, $headers );
remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' ); ?>
<?php endif; ?>

		</header><!-- .entry-header -->
	
		<?php do_action( 'generate_after_entry_header'); ?>				
<?php if (( 0 == count_user_posts( get_current_user_id(), "post" ) && is_user_logged_in() && current_user_can('school-cap') && !current_user_can('admin-cap'))) :?>		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
			<a href="http://perthreliefteachers.com.au/school-job-list">
				<div class="inside-article update">
					<h2><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please Post Your Job Profile</h2>
				</div>
			</a>
		</article>


<?php elseif (( 1 == count_user_posts( get_current_user_id(), "post" ) && is_user_logged_in() && current_user_can('school-cap')) || current_user_can('admin-cap') ) :?>			
		<div class="entry-content" itemprop="text">	
		<div style="text-align:left;">
		<h2 style="text-align:center;margin-bottom:5px;">
		<?php /* the_title_excerpt('', '...', true, '3'); */?>
		<?php the_title(); ?>

<?php if( get_post_meta($post->ID, "linkedin", true) ): ?>
<a href="<?php echo get_post_meta($post->ID, "linkedin", true); ?>" > <i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
<?php else: ?><?php endif; ?>
		</h2> 

<p class="center">
<?php if( rcp_is_active() && 1 == rcp_get_subscription_id() ) : ?><!-- start sp photo -->

<?php if ( has_post_thumbnail() ) { ?>
<a href="<?php the_post_thumbnail_url('full'); ?>"><span style="max-width:200px;"><?php the_post_thumbnail('full'); ?></span></a><i class="fa fa-search-plus" aria-hidden="true" ></i> 
<?php } else { ?>
<a href="<?php my_gravatar_url() ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 96 ); ?><i class="fa fa-search-plus" aria-hidden="true" ></i></a>
<?php } ?>

<?php elseif(rcp_is_active() && 1 !== rcp_get_subscription_id()) : ?>
<a href="https://perthreliefteachers.com.au/school-plus-membership" title="School-Plus member only - click to join">
<i class="fa fa-user-plus fa-5x" aria-hidden="true"></i></a>
<div class="clear"></div>
<?php endif; ?><!-- end sp photo -->
<br />				
<center><?php the_author_meta('user_firstname'); ?> <?php the_author_meta('user_lastname'); ?></center>
</p>		
	<?php /***
	<p style="text-align:center;font-size:12px;color:#999;">Member since <?php echo get_the_date('j\<\s\u\p\>S\<\/\s\u\p\> M Y'); ?></p>
	**/ ?>
	<p style="text-align:center;font-size:12px;">Last updated 
	<?php if( rcp_is_active() && 1 == rcp_get_subscription_id() ) : ?>
	<?php /* the_modified_date('j\<\s\u\p\>S\<\/\s\u\p\> M Y'); ?> at <?php the_modified_date('g:i a'); */ ?> <?php date_default_timezone_set('Australia/Perth'); echo human_time_diff(get_the_modified_date('U'), current_time('timestamp')) . ' ago'; ?>
	<?php elseif(rcp_is_active() && 1 !== rcp_get_subscription_id()) : ?>
	<a href="https://perthreliefteachers.com.au/school-plus-membership" title="School-Plus member only - click to join"><i class="fa fa-user-plus" aria-hidden="true"></i></a> days ago
	<?php endif; ?>	
	<br />member since: <?php the_date('j\<\s\u\p\>S\<\/\s\u\p\> M Y'); ?></p>
	
	
<?php if ( current_user_can( 'manage_options' ) ) { ?>
<p><strong>Username</strong>: <?php the_author_meta('user_login'); ?></p>
<?php } else { ?>
<?php } ?>


	<p><strong>Rating</strong>: 
	<?php if (is_user_logged_in() && ((current_user_can('school-plus-cap')) || (rcp_is_active() && 1 == rcp_get_subscription_id())) ) { ?>
	<?php echo do_shortcode( '[mrp_rating_result rating_form_id="1" no_rating_results_text="No ratings yet" show_rich_snippets="false" before_count="(" after_count=" votes)"]' ); ?></p>
	<?php } elseif (is_user_logged_in() && ((!current_user_can('school-plus-cap')) && (!rcp_is_active() && 1 !== rcp_get_subscription_id()) ) ) { ?>
	<a href="https://perthreliefteachers.com.au/school-plus-membership" title="School-Plus member only - click to join"><i class="fa fa-user-plus" aria-hidden="true"></i></a> School-Plus members only
	<?php } ?>
	
	
	<?php if(has_term('', 'teacher-avail')) {?>
	<p><strong>Availability</strong>: 
	<?php
		$product_terms = get_the_terms( get_the_ID(), 'teacher-avail' );
		// Make sure we have terms and also check for WP_Error object
		if (    $product_terms
		&& !is_wp_error( $product_terms )
		) {
		@usort( $product_terms, function ( $a, $b )
		{
		return strcasecmp( 
		$a->slug,
		$b->slug
		);
		});
		// Display your terms as normal
		$term_list = [];
		foreach ( $product_terms as $term ) 
		//$term_list[] = esc_html( $term->name );
		$term_list[] = '<a href="' . get_term_link( $term ) . '">' . esc_html( $term->name ) . '</a>';
		echo implode( ', ', $term_list );
		}
	?>
<?php if(has_term('06-no-days', 'teacher-avail')) {?>
 - check back tomorrow
<?php } else { ?>
<?php } ?>	
	<?php } else { ?><?php }?></p>	
	<?php if(has_term('', 'teacher-qualification')) {?><p><strong>Qualification</strong>: 
	<?php
		$product_terms = get_the_terms( get_the_ID(), 'teacher-qualification' );
		// Make sure we have terms and also check for WP_Error object
		if (    $product_terms
		&& !is_wp_error( $product_terms )
		) {
		@usort( $product_terms, function ( $a, $b )
		{
		return strcasecmp( 
		$a->slug,
		$b->slug
		);
		});
		// Display your terms as normal
		$term_list = [];
		foreach ( $product_terms as $term ) 
		//$term_list[] = esc_html( $term->name );
		$term_list[] = '<a href="' . get_term_link( $term ) . '">' . esc_html( $term->name ) . '</a>';
		echo implode( ', ', $term_list );
		}
	?>						
	<?php } else { ?><?php }?></p>
	<?php if(has_term('', 'teacher-la')) {?>
	<p><strong>Learning Areas</strong>: <?php echo get_the_term_list( $post->ID, 'teacher-la', ' ',', '); ?><?php } else { ?><?php }?>
	</p>
	<?php if(has_term('', 'teacher-lga')) {?>
	<p><strong>Working Areas</strong>: <?php echo get_the_term_list( $post->ID, 'teacher-lga', ' ',', '); ?><?php } else { ?><?php }?><?php if(has_term('', 'teacher-rural')) {?> - <?php echo get_the_term_list( $post->ID, 'teacher-rural', ' ',', '); ?><?php } else { ?><?php }?>
	</p>
	<?php if( get_post_meta($post->ID, "teacher-contact", true) ): ?>
	<p><strong>Phone</strong>: 
	<?php if( rcp_is_active() && 1 == rcp_get_subscription_id() ) : ?>
	<a href="tel:<?php echo get_post_meta($post->ID, "teacher-contact", true); ?>" ><?php echo get_post_meta($post->ID, "teacher-contact", true); ?></a>
	<?php elseif(rcp_is_active() && 1 !== rcp_get_subscription_id()) : ?>
	<a href="https://perthreliefteachers.com.au/school-plus-membership" title="School-Plus member only - click to join"><i class="fa fa-user-plus" aria-hidden="true"></i></a> School-Plus members only
	<?php endif; ?>
	</p>	
	<?php else: ?><?php endif; ?>
	<p><strong>Email</strong>: <a href="mailto:<?php the_author_meta('user_email'); ?>">
	<?php the_author_meta('user_email'); ?></a>
	</p>
<p><strong>Facebook</strong>: 
<?php if( get_post_meta($post->ID, "teacher-facebook", true) ): ?>
<?php if( rcp_is_active() && 1 == rcp_get_subscription_id() ) : ?>
<i class="fa fa-facebook-square" aria-hidden="true"></i> <a href="<?php echo get_post_meta($post->ID, "teacher-facebook", true); ?>"> message <?php the_title(); ?></a>
<?php elseif(rcp_is_active() && 1 !== rcp_get_subscription_id()) : ?>
<a href="https://perthreliefteachers.com.au/school-plus-membership" title="School-Plus member only - click to join"><i class="fa fa-user-plus" aria-hidden="true"></i></a> School-Plus members only
<?php endif; ?>
<?php else: ?>
<?php if( rcp_is_active() && 1 == rcp_get_subscription_id() ) : ?>
<a href="http://www.facebook.com/search/people/?q=<?php the_title(); ?>"><i class="fa fa-facebook-square" aria-hidden="true"></i> search <?php the_author_meta('user_firstname'); ?></a>
<?php elseif(rcp_is_active() && 1 !== rcp_get_subscription_id()) : ?>
<a href="https://perthreliefteachers.com.au/school-plus-membership" title="School-Plus member only - click to join"><i class="fa fa-user-plus" aria-hidden="true"></i></a> School-Plus members only
<?php endif; ?>
<?php endif; ?>
</p>	
						


<p><strong>Resume</strong>: 
<?php if( get_post_meta($post->ID, "teacher-resume-upload", true) ): ?>
<?php if( rcp_is_active() && 1 == rcp_get_subscription_id() ) : ?>
<i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?php $file= get_post_meta( $post->ID, 'teacher-resume-upload' );
if ( $file) {
    foreach ( $file as $attachment_id ) {
        $full_size = wp_get_attachment_url( $attachment_id );
        printf( '<a href="%s">download</a>', $full_size);
    }
}
?>
<?php elseif(rcp_is_active() && 1 !== rcp_get_subscription_id()) : ?>
<a href="https://perthreliefteachers.com.au/school-plus-membership" title="School-Plus member only - click to join"><i class="fa fa-user-plus" aria-hidden="true"></i></a> School-Plus members only
<?php endif; ?>
<?php else: ?>
<?php if( rcp_is_active() && 1 == rcp_get_subscription_id() ) : ?>
none
<?php elseif(rcp_is_active() && 1 !== rcp_get_subscription_id()) : ?>
<a href="https://perthreliefteachers.com.au/school-plus-membership" title="School-Plus member only - click to join"><i class="fa fa-user-plus" aria-hidden="true"></i></a> School-Plus members only
<?php endif; ?>
<?php endif; ?>
</p>


	<hr style="margin:10px 0px 10px 0px;" />
	<p style="text-align:center;">WWCC: 
	<?php $value = get_post_meta($post->ID, 'teacher-wwcc', true); ?>
	<?php if($value == 'Yes') { ?>
	<i class="fa fa-check" aria-hidden="true"></i>
	<?php } elseif($value == 'No') { ?>
	<i class="fa fa-times" aria-hidden="true"></i>
	<?php } else { ?>
	<i class="fa fa-question-circle" aria-hidden="true"></i>
	<?php } ?>
	&nbsp;&nbsp;&nbsp;&nbsp;TRBWA: 
	<?php $value = get_post_meta($post->ID, 'teacher-trbwa', true); ?>
	<?php if($value == 'Yes') { ?>
	<i class="fa fa-check" aria-hidden="true"></i>
	<?php } elseif($value == 'No') { ?>
	<i class="fa fa-times" aria-hidden="true"></i>
	<?php } else { ?>
	<i class="fa fa-question-circle" aria-hidden="true"></i>
	<?php } ?>
	</p>
	
	<p style="text-align:center;">SCN: 
	<?php $value = get_post_meta($post->ID, 'teacher-scn', true); ?>
	<?php if($value == 'Yes') { ?>
	<i class="fa fa-check" aria-hidden="true"></i>
	<?php } elseif($value == 'No') { ?>
	<i class="fa fa-times" aria-hidden="true"></i>
	<?php } else { ?>
	<i class="fa fa-question-circle" aria-hidden="true"></i>
	<?php } ?>
	&nbsp;&nbsp;&nbsp;&nbsp;E Number: <?php $value = get_post_meta($post->ID, 'teacher-enumber', true); ?>
	<?php if($value == 'Yes') { ?>
	<i class="fa fa-check" aria-hidden="true"></i>
	<?php } elseif($value == 'No') { ?>
	<i class="fa fa-times" aria-hidden="true"></i>
	<?php } else { ?>
	<i class="fa fa-question-circle" aria-hidden="true"></i>
	<?php } ?></p>	
	
	<br />
	<?php if( rcp_is_active() && 1 == rcp_get_subscription_id() ) : ?>
	<em><?php echo nl2br(the_content()); ?></em></p>
	<?php elseif(rcp_is_active() && 1 !== rcp_get_subscription_id()) : ?>
	<p><em>This teacher may have included a message regarding their availability. This message is available to <a href="https://perthreliefteachers.com.au/school-plus-membership" title="School-Plus member only - click to join"><i class="fa fa-user-plus" aria-hidden="true"></i></a> School-Plus members only</em></p>
	<?php endif; ?>

	
	<br />
<p class="favs" >
<?php if( rcp_is_active() && 1 == rcp_get_subscription_id() ) : ?>
<?php the_favorites_button($post_id, $site_id); ?>
<?php elseif(rcp_is_active() && 1 !== rcp_get_subscription_id()) : ?>
	Add to your  preferred teacher list. <a href="https://perthreliefteachers.com.au/school-plus-membership" title="School-Plus member only - click to join"><i class="fa fa-user-plus" aria-hidden="true"></i></a> School-Plus members only
	<?php endif; ?>
</p>
	
		</div>

<?php if (is_mobile()) { ?>		
		<?php if( get_post_meta($post->ID, "teacher-contact", true) ): ?>	
		<a href="tel:<?php echo get_post_meta($post->ID, "teacher-contact", true); ?>" target="_blank" >
		<p class="contact-apply">					
		Phone <i class="fa fa-mobile"></i>
		</p>
		</a>					
		<?php else: ?>	
		<?php endif; ?>
<?php } else { ?>			
<?php } ?>

<?php if (is_mobile() && is_android()) { ?>		
		<?php if( get_post_meta($post->ID, "teacher-contact", true) ): ?>	
		<a href="sms:<?php echo get_post_meta($post->ID, "teacher-contact", true); ?>?body=Please ring this number regarding relief teaching work at ">
		<p class="contact-android">					
		SMS <i class="fa fa-android"></i>
		</p>
		</a>					
		<?php else: ?>	
		<?php endif; ?>
<?php } else { ?>			
<?php } ?>

<?php if (is_mobile() && is_ios() && is_iphone()) { ?>
		<?php if( get_post_meta($post->ID, "teacher-contact", true) ): ?>	
		<a href="sms:<?php echo get_post_meta($post->ID, "teacher-contact", true); ?>&body=Please ring this number regarding relief teaching work at ">
		<p class="contact-apple">					
		SMS <i class="fa fa-apple"></i>
		</p>
		</a>					
		<?php else: ?>	
		<?php endif; ?>		
<?php } else { ?>			
<?php } ?>

		<?php if( get_post_meta($post->ID, "teacher-contact", true) ): ?>	
		<a href="mailto:<?php the_author_meta('user_email'); ?>">
		<p class="contact-email">					
		Email <i class="fa fa-envelope"></i>
		</p>
		</a>					
		<?php else: ?>	
		<?php endif; ?>		
		
		</div><!-- .entry-content -->	

		<?php do_action( 'generate_after_entry_content'); ?>

		<footer class="entry-meta">
	<div style="padding:5px 10px 5px 10px;margin:20px;text-align:left;">
	<?php echo do_shortcode( '[mrp_rating_form title="Rate This Teacher" user_can_update_delete="true" submit_button_text="Submit" before_title="<h2>" after_title="</h2>"]' ); ?>	
	<span style="font-size:15px;"><em>&bull; More stars = better rating<br />&bull; All ratings are anonymous and are not visible to teachers<br />&bull; Other schools will see the average rating, not your individual rating<br />&bull; You can update or delete your rating at any time</em></span>	
	</div>	 
<small><?php echo getPostViews(get_the_ID()); ?></small>	
		</footer><!-- .entry-meta -->			
		
		<?php do_action( 'generate_after_content'); ?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->

<?php endif; ?>	<!-- end of no job profile -->	


			<?php /*****
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) : ?>
					<div class="comments-area">
						<?php comments_template(); ?>
					</div>
			<?php endif; *****/ ?>

		<?php endwhile; // end of the loop. ?>

		
<?php } elseif  (!is_user_logged_in() || ((current_user_can('teacher-cap')) && (!$current_user->ID == $post->post_author))  || current_user_can('ea-cap')){ ?>
<?php wp_redirect( 'http://perthreliefteachers.com.au/', 302 ); exit; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php do_action( 'generate_before_content'); ?>
		<header class="entry-header">
		<h1 style="text-align:center;"><i class="fa fa-lock fa-5x" aria-hidden="true"></i>
</h1>
<p style="text-align:center;">You need to be a <a href="http://perthreliefteachers.com.au/login-school">registered school</a> to view this page.</p>
		</header><!-- .entry-header -->
	</div><!-- .inside-article -->
</article><!-- #post-## -->		
<?php } ?>		

<?php global $current_user;	if ((is_user_logged_in() && $current_user->ID == $post->post_author)) { ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>	
	<div class="inside-article">
	<div class="entry-content" itemprop="text">	
	
<h2 style="text-align:center;"><?php the_title(); ?>  
<?php if( get_post_meta($post->ID, "linkedin", true) ): ?> 
<a href="<?php echo get_post_meta($post->ID, "linkedin", true); ?>" > <i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
<?php else: ?><?php endif; ?> &middot; <a href="http://perthreliefteachers.com.au/my-profile">edit</a></h2> 

<?php if ( has_post_thumbnail() ) { ?>
<a href="<?php the_post_thumbnail_url('full'); ?>"><span style="max-width:200px;"><?php the_post_thumbnail('full'); ?></span></a>
<?php } else { ?>
<a href="<?php my_gravatar_url() ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 96 ); ?><i class="fa fa-search-plus" aria-hidden="true" ></i></a>
<?php } ?>
					



	
	<?php if(has_term('', 'teacher-avail')) {?><p><strong>Availability</strong>: 
	<?php
		$product_terms = get_the_terms( get_the_ID(), 'teacher-avail' );
		// Make sure we have terms and also check for WP_Error object
		if (    $product_terms
		&& !is_wp_error( $product_terms )
		) {
		@usort( $product_terms, function ( $a, $b )
		{
		return strcasecmp( 
		$a->slug,
		$b->slug
		);
		});
		// Display your terms as normal
		$term_list = [];
		foreach ( $product_terms as $term ) 
		$term_list[] = esc_html( $term->name );
		//$term_list[] = '<a href="' . get_term_link( $term ) . '">' . esc_html( $term->name ) . '</a>';
		echo implode( ', ', $term_list );
		}
	?>
<?php if(has_term('06-no-days', 'teacher-avail')) {?>
 - check back tomorrow
<?php } else { ?>
<?php } ?>	
	<?php } else { ?><?php }?></p>	
	<?php if(has_term('', 'teacher-qualification')) {?><p><strong>Qualification</strong>: 
	<?php
		$product_terms = get_the_terms( get_the_ID(), 'teacher-qualification' );
		// Make sure we have terms and also check for WP_Error object
		if (    $product_terms
		&& !is_wp_error( $product_terms )
		) {
		@usort( $product_terms, function ( $a, $b )
		{
		return strcasecmp( 
		$a->slug,
		$b->slug
		);
		});
		// Display your terms as normal
		$term_list = [];
		foreach ( $product_terms as $term ) 
		$term_list[] = esc_html( $term->name );
		//$term_list[] = '<a href="' . get_term_link( $term ) . '">' . esc_html( $term->name ) . '</a>';
		echo implode( ', ', $term_list );
		}
	?>						
	<?php } else { ?><?php }?></p>
	<?php if(has_term('', 'teacher-la')) {?><p><strong>Learning Areas</strong>: <?php echo strip_tags(get_the_term_list( $post->ID, 'teacher-la', ' ',', ')); ?><?php } else { ?><?php }?></p>
	<?php if(has_term('', 'teacher-lga')) {?><p><strong>Working Areas</strong>: <?php echo strip_tags(get_the_term_list( $post->ID, 'teacher-lga', ' ',', ')); ?><?php } else { ?><?php }?><?php if(has_term('', 'teacher-rural')) {?> - <?php echo strip_tags(get_the_term_list( $post->ID, 'teacher-rural', ' ',', ')); ?><?php } else { ?><?php }?></p>
	<?php if( get_post_meta($post->ID, "teacher-contact", true) ): ?><p><strong>Phone</strong>: <?php echo get_post_meta($post->ID, "teacher-contact", true); ?></p>	
	<?php else: ?><?php endif; ?>

	<hr style="margin:0px;" />
	<p style="text-align:center;">WWCC: <?php $value = get_post_meta($post->ID, 'teacher-wwcc', true); ?>
	<?php if($value == 'Yes') { ?>
	<i class="fa fa-check" aria-hidden="true"></i>
	<?php } elseif($value == 'No') { ?>
	<i class="fa fa-times" aria-hidden="true"></i>
	<?php } else { ?>
	<i class="fa fa-question-circle" aria-hidden="true"></i>
	<?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;TRBWA: <?php $value = get_post_meta($post->ID, 'teacher-trbwa', true); ?>
	<?php if($value == 'Yes') { ?>
	<i class="fa fa-check" aria-hidden="true"></i>
	<?php } elseif($value == 'No') { ?>
	<i class="fa fa-times" aria-hidden="true"></i>
	<?php } else { ?>
	<i class="fa fa-question-circle" aria-hidden="true"></i>
	<?php } ?></p>
	
	<p style="text-align:center;">SCN: <?php $value = get_post_meta($post->ID, 'teacher-scn', true); ?>
	<?php if($value == 'Yes') { ?>
	<i class="fa fa-check" aria-hidden="true"></i>
	<?php } elseif($value == 'No') { ?>
	<i class="fa fa-times" aria-hidden="true"></i>
	<?php } else { ?>
	<i class="fa fa-question-circle" aria-hidden="true"></i>
	<?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;E Number: <?php $value = get_post_meta($post->ID, 'teacher-enumber', true); ?>
	<?php if($value == 'Yes') { ?>
	<i class="fa fa-check" aria-hidden="true"></i>
	<?php } elseif($value == 'No') { ?>
	<i class="fa fa-times" aria-hidden="true"></i>
	<?php } else { ?>
	<i class="fa fa-question-circle" aria-hidden="true"></i>
	<?php } ?></p>	
	
	<br /><em><?php the_content(); ?></em></p>
	</div>
	
	</div>
	</article>
<?php } elseif ( is_user_logged_in() && !current_user_can('school-cap')){ ?>	
	<div class="inside-article">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
<h2 style="margin:20px;padding:0px;">Teachers and Education Assistants are not permitted to view each other's profiles.</h2>
</article>
</div>
<?php } ?>
		<?php do_action('generate_after_main_content'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
do_action('generate_sidebars');
get_footer();