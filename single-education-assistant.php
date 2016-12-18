<?php
/**
 * The Template for displaying all ea posts.
 *
 * @package GeneratePress
 */

get_header(); ?>

	<div id="primary" <?php generate_content_class();?>>
		<main id="main" <?php generate_main_class(); ?>>
		<?php do_action('generate_before_main_content'); ?>
		
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
		
	<?php /***** if ( is_user_logged_in() && (current_user_can('school-cap'))) { ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
			<a href="http://perthreliefteachers.com.au/school-job-list">
				<div class="inside-article update"  style="padding:10px;margin:0px;">
					<h2><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please Update Your Job Profile</h2>
				</div>
			</a>
		</article>
	<?php } *****/ ?>

<?php if ( is_mobile() && (is_iphone() || is_android()) ) { ?>
		<?php /**** /><article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
				<div class="inside-article" style="text-align:center" >
					<small><strong><a href="http://shockwave.net.au" title="Shockwave Electrical - Commercial School Electricians">Shockwave Electrical - Commercial Electricians</a></strong><br />Electrical contractors for schools</small>
				</div>
		</article><?php ****/ ?>	

<?php } else { ?>
		
<?php } ?>
	
		
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
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
				<div class="inside-article" style="text-align:center" >
				<small>Thanks for keeping your profile updated</small>
				</div>
		</article>
<?php } else { ?>			
<?php if ( is_user_logged_in() && (current_user_can('school-cap'))) { ?>
<?php wp_redirect( 'https://perthreliefteachers.com.au/school-job-list', 302 ); exit; ?>	
<?php } elseif  (!is_user_logged_in()){ ?>
<?php } ?>
<?php } ?>		
<!-- END MODIFIED POST CONDITIONAL -->		
		
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php do_action( 'XXXgenerate_before_content'); ?>
	
		<header class="entry-header">
			
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
add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
$timelimit=6 * 86400; // 7 days * seconds per day
$post_age = date('U') - get_the_modified_date('U');
if ($post_age < $timelimit) : ?>

<?php elseif ($post_age > $timelimit) : ?>
<!-- <p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> This EA hasn't updated their availability for this week.<br />
<i class="fa fa-envelope" aria-hidden="true"></i> An email has been sent asking them to update their availability.</p> -->
<?php
$to = get_the_author_meta( 'user_email' );
$subject = 'A school wants to know your availability';
$message = '<img src="http://perthreliefteachers.com.au/wp-content/uploads/PerthReliefTeachers-logo-800.jpg" alt="PerthReliefTeachers.com.au Alert" /><br /><br /><br />Hi there, another school wants to know your availability - please login to <a href="http://perthreliefteachers.com.au/ea-profile">PerthReliefTeachers.com.au</a> and update your <a href="http://perthreliefteachers.com.au/ea-profile">availability</a>. 
<br /><br />Your availability needs updating <strong>at least once a week, OR each day you are unavailable</strong>. Schools rely on the accuracy of your availability.<br /><br />
If you like you can set your <a href="http://perthreliefteachers.com.au/ea-profile">availability</a> as "No Days" for the current week (It takes less than a minute to update).  EAs are listed according to how recently they have updated their availability.<br /><br />Regards,<br /><a href="http://perthreliefteachers.com.au/">PerthReliefTeachers.com.au</a>'; 
$headers[] = 'From: Perth Relief Teachers <contact@perthreliefteachers.com.au>';
wp_mail( $to, $subject, $message, $headers );
remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' ); ?>
<?php endif; ?>
	
		</header><!-- .entry-header -->
		
		<?php do_action( 'generate_after_entry_header'); ?>				
<?php if (( 0 == count_user_posts( get_current_user_id(), "post" ) && is_user_logged_in() && current_user_can('school-cap')) && !current_user_can('admin-cap') ) :?>	

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
			<a href="http://perthreliefteachers.com.au/post-a-job">
				<div class="inside-article update" style="padding:20px;margin:0px;">
					<h2><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please Post Your Job Profile</h2>
				</div>
			</a>
		</article>

<?php elseif (( 0 !== count_user_posts( get_current_user_id(), "post" ) && is_user_logged_in() && current_user_can('school-cap')) || current_user_can('admin-cap') ) :?>			
		<div class="entry-content" itemprop="text">	
		<div style="text-align:left;">
		<h2 style="text-align:center;margin-bottom:5px;font-weight:500;"><?php the_title(); ?></h2>
		
<p style="text-align:center;">
<?php if ( has_post_thumbnail() ) { ?>
<a href="<?php the_post_thumbnail_url('full'); ?>"><?php the_post_thumbnail('full'); ?></a><i class="fa fa-search-plus" aria-hidden="true" ></i> 
<?php } else { ?>
<a href="<?php my_gravatar_url() ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 96 ); ?><i class="fa fa-search-plus" aria-hidden="true" ></i></a>
<?php } ?>
<br />
<small><?php the_author_meta('user_firstname'); ?> <?php the_author_meta('user_lastname'); ?></small>		
</p>	
				
		
	<?php /***
	<p style="text-align:center;font-size:12px;color:#999;">Member since <?php echo get_the_date('j\<\s\u\p\>S\<\/\s\u\p\> M Y'); ?></p>
	**/ ?>
	<p style="text-align:center;font-size:12px;">Last updated <?php /* the_modified_date('j\<\s\u\p\>S\<\/\s\u\p\> M Y'); ?> at <?php the_modified_date('g:i a'); */ ?> <?php echo human_time_diff(get_the_modified_date('U'), current_time('timestamp')) . ' ago'; ?><br />member since: <?php the_date('j\<\s\u\p\>S\<\/\s\u\p\> M Y'); ?></p>
	
	<?php /**** $users = get_users(); foreach( $users as $user ) { $udata = get_userdata( $user->ID ); $registered = $udata->user_registered;
 printf( '%s member since %s<br>', $udata->data->display_name, date( "M Y", strtotime( $registered ) ) ); } ; ***/ ?>
 
<?php if ( current_user_can( 'manage_options' ) ) { ?>
<p><strong>Username</strong>: <?php the_author_meta('user_login'); ?></p>
<?php } else { ?>
<?php } ?>
	
	<p><strong>Rating</strong>: <?php echo do_shortcode( '[mrp_rating_result rating_form_id="4" no_rating_results_text="No ratings yet" show_rich_snippets="false" before_count="(" after_count=" votes)"]' ); ?></p>		

	<?php if(has_term('', 'ea-days')) {?><p><strong>Availability</strong>: 
	<?php
		$product_terms = get_the_terms( get_the_ID(), 'ea-days' );
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
<?php if(has_term('06-no-days', 'ea-days')) {?>
 - check back tomorrow
<?php } else { ?>
<?php } ?>						
	</p>	
	<?php } else { ?><?php }?></p>
	
	<?php if(has_term('', 'ea-qual')) {?><p><strong>Qualification</strong>: 
	<?php
		$product_terms = get_the_terms( get_the_ID(), 'ea-qual' );
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
	<?php if(has_term('', 'ea-experience')) {?><p><strong>Experience</strong>: 
	<?php
		$product_terms = get_the_terms( get_the_ID(), 'ea-experience' );
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
	?>		<?php } else { ?><?php }?></p>


<?php if(has_term('', 'ea-lga')) {?>
<p>
<strong>Working Areas</strong>: <?php echo get_the_term_list( $post->ID, 'ea-lga', ' ',', '); ?>
<?php } else { ?><?php } ?>
<?php if(has_term('', 'ea-rural-remote')) {?> - <?php echo get_the_term_list( $post->ID, 'ea-rural-remote', ' ',', '); ?><?php } else { ?><?php } ?>
</p>

	<?php if( get_post_meta($post->ID, "ea-phone", true) ): ?>
<p><strong>Phone</strong>: <a href="tel:<?php echo get_post_meta($post->ID, "ea-phone", true); ?>" ><?php echo get_post_meta($post->ID, "ea-phone", true); ?></a></p>	
	<?php else: ?><?php endif; ?>

<p><strong>Email</strong>: <a href="mailto:<?php the_author_meta('user_email'); ?>">
	<?php the_author_meta('user_email'); ?></a>
	</p>

		<hr style="margin:10px 0px 10px 0px;" />
	<p style="text-align:center;">WWCC: <?php $value = get_post_meta($post->ID, 'ea-wwcc', true); ?>
	<?php if($value == 'Yes') { ?>
	<i class="fa fa-check" aria-hidden="true"></i>
	<?php } elseif($value == 'No') { ?>
	<i class="fa fa-times" aria-hidden="true"></i>
	<?php } else { ?>
	<i class="fa fa-question-circle" aria-hidden="true"></i>
	<?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;SCN: <?php $value = get_post_meta($post->ID, 'ea-scn', true); ?>
	<?php if($value == 'Yes') { ?>
	<i class="fa fa-check" aria-hidden="true"></i>
	<?php } elseif($value == 'No') { ?>
	<i class="fa fa-times" aria-hidden="true"></i>
	<?php } else { ?>
	<i class="fa fa-question-circle" aria-hidden="true"></i>
	<?php } ?>	
	</p>
	<p style="text-align:center;">
	&nbsp;&nbsp;eNumber: <?php $value = get_post_meta($post->ID, 'ea-enumber', true); ?>
	<?php if($value == 'Yes') { ?>
	<i class="fa fa-check" aria-hidden="true"></i>
	<?php } elseif($value == 'No') { ?>
	<i class="fa fa-times" aria-hidden="true"></i>
	<?php } else { ?>
	<i class="fa fa-question-circle" aria-hidden="true"></i>
	<?php } ?></p>	
	
	<br /><em><?php the_content(); ?></em></p>

<p class="favs" ><?php the_favorites_button($post_id, $site_id); ?></p>	
		</div>

<?php if (is_mobile()) { ?>		
		<?php if( get_post_meta($post->ID, "ea-phone", true) ): ?>	
		<a href="tel:<?php echo get_post_meta($post->ID, "ea-phone", true); ?>" target="_blank" >
		<p class="contact-apply">					
		Phone <i class="fa fa-mobile"></i>
		</p>
		</a>					
		<?php else: ?>	
		<?php endif; ?>
<?php } else { ?>			
<?php } ?>

<?php if (is_mobile() && is_android()) { ?>		
		<?php if( get_post_meta($post->ID, "ea-phone", true) ): ?>	
		<a href="sms:<?php echo get_post_meta($post->ID, "ea-phone", true); ?>?body=Please ring this number regarding relief teaching work at ">
		<p class="contact-android">					
		SMS <i class="fa fa-android"></i>
		</p>
		</a>					
		<?php else: ?>	
		<?php endif; ?>
<?php } else { ?>			
<?php } ?>

<?php if (is_mobile() && is_ios() && is_iphone()) { ?>
		<?php if( get_post_meta($post->ID, "ea-phone", true) ): ?>	
		<a href="sms:<?php echo get_post_meta($post->ID, "ea-phone", true); ?>&body=Please ring this number regarding relief teaching work at ">
		<p class="contact-apple">					
		SMS <i class="fa fa-apple"></i>
		</p>
		</a>					
		<?php else: ?>	
		<?php endif; ?>		
<?php } else { ?>			
<?php } ?>

		<?php if( get_post_meta($post->ID, "ea-phone", true) ): ?>	
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
	<?php echo do_shortcode( '[mrp_rating_form rating_form_id="4" title="Rate This EA" user_can_update_delete="true" submit_button_text="Submit" before_title="<h2>" after_title="</h2>"]' ); ?>	
	<span style="font-size:15px;"><em>&bull; More stars = better rating<br />&bull; All ratings are anonymous and are not visible to EAs<br />&bull; Other schools will see the average rating, not your individual rating<br />&bull; You can update or delete your rating at any time</em></span>	
	</div>	 
<small><?php echo getPostViews(get_the_ID()); ?></small>	
		</footer><!-- .entry-meta -->			
		
		<?php do_action( 'generate_after_content'); ?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->

<?php endif; ?>	<!-- end of no job profile -->	



			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) : ?>
					<div class="comments-area">
						<?php comments_template(); ?>
					</div>
			<?php endif; ?>

		<?php endwhile; // end of the loop. ?>
		
<?php } elseif  (!is_user_logged_in() || current_user_can('teacher-cap')  || ( current_user_can('ea-cap') && (!$current_user->ID == $post->post_author)) ){ ?>
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

<?php	global $current_user;	if ((is_user_logged_in() && $current_user->ID == $post->post_author))  { ?>
	<div class="inside-article">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="entry-content" itemprop="text">	
	
<h2 style="text-align:center;"><?php the_title(); ?> &middot; <a href="http://perthreliefteachers.com.au/ea-profile">edit</a><br />
		<a href="<?php my_gravatar_url() ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 96 ); ?><i class="fa fa-search-plus" aria-hidden="true" ></i></a>			
</h2>
<small><i>Profiles with photos get 3 times more calls from schools than profiles without a photo</i>.</small><br />

	<?php if(has_term('', 'ea-days')) {?><p><strong>Availability</strong>: 
	<?php
		$product_terms = get_the_terms( get_the_ID(), 'ea-days' );
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
<?php if(has_term('06-no-days', 'ea-days')) {?>
 - check back tomorrow
<?php } else { ?>
<?php } ?>						
	</p>	
	<?php } else { ?><?php }?></p>
	
	<?php if(has_term('', 'ea-qual')) {?><p><strong>Qualification</strong>: 
	<?php
		$product_terms = get_the_terms( get_the_ID(), 'ea-qual' );
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
	<?php if(has_term('', 'ea-experience')) {?><p><strong>Experience</strong>: 
	<?php
		$product_terms = get_the_terms( get_the_ID(), 'ea-experience' );
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
	?>		<?php } else { ?><?php }?></p>

	<?php if(has_term('', 'ea-lga')) {?><p><strong>Working Areas</strong>: <?php echo strip_tags(get_the_term_list( $post->ID, 'ea-lga', ' ',', ')); ?><?php } else { ?><?php }?><?php if(has_term('', 'ea-rural-remote')) {?> - <?php echo strip_tags(get_the_term_list( $post->ID, 'ea-rural-remote', ' ',', ')); ?><?php } else { ?><?php }?></p>
	<?php if( get_post_meta($post->ID, "ea-phone", true) ): ?><p><strong>Phone</strong>: <?php echo get_post_meta($post->ID, "ea-phone", true); ?></p>	
	<?php else: ?><?php endif; ?>

	<hr style="margin:0px;" />
	<p style="text-align:center;">WWCC: <?php $value = get_post_meta($post->ID, 'ea-wwcc', true); ?>
	<?php if($value == 'Yes') { ?>
	<i class="fa fa-check" aria-hidden="true"></i>
	<?php } elseif($value == 'No') { ?>
	<i class="fa fa-times" aria-hidden="true"></i>
	<?php } else { ?>
	<i class="fa fa-question-circle" aria-hidden="true"></i>
	<?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;SCN: <?php $value = get_post_meta($post->ID, 'ea-scn', true); ?>
	<?php if($value == 'Yes') { ?>
	<i class="fa fa-check" aria-hidden="true"></i>
	<?php } elseif($value == 'No') { ?>
	<i class="fa fa-times" aria-hidden="true"></i>
	<?php } else { ?>
	<i class="fa fa-question-circle" aria-hidden="true"></i>
	<?php } ?>
	</p>
	<p style="text-align:center;">	
	&nbsp;&nbsp;eNumber: <?php $value = get_post_meta($post->ID, 'ea-enumber', true); ?>
	<?php if($value == 'Yes') { ?>
	<i class="fa fa-check" aria-hidden="true"></i>
	<?php } elseif($value == 'No') { ?>
	<i class="fa fa-times" aria-hidden="true"></i>
	<?php } else { ?>
	<i class="fa fa-question-circle" aria-hidden="true"></i>
	<?php } ?></p>	
	
	<br /><em><?php the_content(); ?></em></p><br />
	<h2 style="text-align:center;font-weight:600;"><a href="http://perthreliefteachers.com.au/ea-profile">edit your profile</a></h2>
	</div>
	</article>
	</div>
<?php } ?>
	
		<?php do_action('generate_after_main_content'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
do_action('generate_sidebars');
get_footer();