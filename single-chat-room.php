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
		
<?php if ( is_user_logged_in() && (current_user_can('school-cap') || current_user_can('admin-cap'))) { ?>		
		
		<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php do_action( 'generate_before_content'); ?>
	
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
$timelimit=8 * 86400; // 7 days * seconds per day
$post_age = date('U') - get_the_modified_date('U');
if ($post_age < $timelimit) : ?>

<?php elseif ($post_age > $timelimit) : ?>
<p>This teacher hasn't updated their availability for this week.<br />
An email has been sent asking them to update their availability.</p>
<?php
$to = get_the_author_meta( 'user_email' );
$subject = 'A school wants to know your availability';
$message = '<img src="http://perthreliefteachers.com.au/wp-content/uploads/PerthReliefTeachers-logo-800.jpg" alt="PerthReliefTeachers.com.au Alert" /><br /><br /><br />Hi there, another school wants to know your availability for this week - please login to <a href="http://perthreliefteachers.com.au/teacher-profile">PerthReliefTeachers.com.au</a> and update your Availability. If you like you can set your <a href="http://perthreliefteachers.com.au/teacher-profile">availability</a> as "No Days" for the current week (It takes less than a minute to update).<br /><br />Regards,<br /><a href="http://perthreliefteachers.com.au/">PerthReliefTeachers.com.au</a>'; 
$headers[] = 'From: Perth Relief Teachers <contact@perthreliefteachers.com.au>';
wp_mail( $to, $subject, $message, $headers );
remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' ); ?>

<?php endif; ?>
	
		</header><!-- .entry-header -->
		
					
<?php if (( 0 == count_user_posts( get_current_user_id(), "post" ) && is_user_logged_in() && current_user_can('school-cap')) || current_user_can('admin-cap') ) :?>		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
			<a href="http://perthreliefteachers.com.au/school-job-list">
				<div class="inside-article update">
					<h2><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please Update Your Job Profile</h2>
				</div>
			</a>
		</article>
<?php elseif (( 0 !== count_user_posts( get_current_user_id(), "post" ) && is_user_logged_in() && current_user_can('school-cap')) || current_user_can('admin-cap') ) :?>			
		<div class="entry-content" itemprop="text">	
		<div style="text-align:left;">
		<h2><?php the_title(); ?></h2>	
		
	
		
	<?php /***
	<p style="text-align:center;font-size:12px;color:#999;">Member since <?php echo get_the_date('j\<\s\u\p\>S\<\/\s\u\p\> M Y'); ?></p>
	**/ ?>
	<p style="text-align:center;font-size:12px;">Last updated <?php /* the_modified_date('j\<\s\u\p\>S\<\/\s\u\p\> M Y'); ?> at <?php the_modified_date('g:i a'); */ ?> <?php echo human_time_diff(get_the_modified_date('U'), current_time('timestamp')) . ' ago'; ?></p>
	
	<p><strong>Rating</strong>: <?php echo do_shortcode( '[mrp_rating_result rating_form_id="1" no_rating_results_text="No ratings yet" show_rich_snippets="false" before_count="(" after_count=" votes)"]' ); ?></p>	
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
		//$term_list[] = esc_html( $term->name );
		$term_list[] = '<a href="' . get_term_link( $term ) . '">' . esc_html( $term->name ) . '</a>';
		echo implode( ', ', $term_list );
		}
	?>							
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
	<?php if(has_term('', 'teacher-la')) {?><p><strong>Learning Areas</strong>: <?php echo get_the_term_list( $post->ID, 'teacher-la', ' ',', '); ?><?php } else { ?><?php }?></p>
	<?php if(has_term('', 'teacher-lga')) {?><p><strong>Working Areas</strong>: <?php echo get_the_term_list( $post->ID, 'teacher-lga', ' ',', '); ?><?php } else { ?><?php }?><?php if(has_term('', 'teacher-rural')) {?> - <?php echo get_the_term_list( $post->ID, 'teacher-rural', ' ',', '); ?><?php } else { ?><?php }?></p>
	<?php if( get_post_meta($post->ID, "teacher-contact", true) ): ?><p><strong>Phone</strong>: <a href="tel:<?php echo get_post_meta($post->ID, "teacher-contact", true); ?>" ><?php echo get_post_meta($post->ID, "teacher-contact", true); ?></a></p>	
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
	<span style="font-size:15px;"><em>&bull; More stars = better rating<br />&bull; All ratings are anonymous and are not visible to teachers<br />&bull; Other schools will see the average rating, not your individual rating<br />&bull; You can update or delete your rating at any time.</em></span>	
	</div>	 
	
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
		
<?php } elseif  (!is_user_logged_in() || current_user_can('teacher-cap')  || current_user_can('ea-cap')){ ?>
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


	
		<?php do_action('generate_after_main_content'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
do_action('generate_sidebars');
get_footer();