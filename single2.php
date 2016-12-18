<?php
/**
 * The Template for displaying all single posts.
 *
 * @package GeneratePress
 */

get_header(); ?>

	<div id="primary" <?php generate_content_class();?>>
		<main id="main" <?php generate_main_class(); ?>>
		<?php do_action('generate_before_main_content'); ?>
		<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php do_action( 'generate_before_content'); ?>
	
		<header class="entry-header">
			<?php if ( generate_show_title() ) : ?>
				<h1 class="page-title">
				<?php
					foreach((get_the_category()) as $category) {
					echo $category->cat_name . ' ';
					}
				?>
				</h1>
			<?php endif; ?>

<?php if ( is_user_logged_in() ) { ?>
<?php
  add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );

  $timelimit=8 * 86400; // 8 days * seconds per day
  $post_age = date('U') - get_the_modified_date('U');
  $email = ''; //add function to get the school's email address and add the address to this variable

  if ($post_age < $timelimit) { ?>
    <p>This school is up-to-date.</p> <?php }
  else if ($post_age > $timelimit) { ?>
    <p>This school hasn't updated their availability for this week.</p>
    <center><button id="send-email">Ask them to update</button></center>
    <input type="hidden" id="email" value="<?php echo $email; ?>" />
  <?php } ?>
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
	<p style="margin:20px;">If you are a <a href="http://perthreliefteachers.com.au/login-teacher"><strong>teacher</strong></a> or an <a href="http://perthreliefteachers.com.au/ea-login"><strong>education assistant</strong></a> you can register and login to find available relief work at <?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?>.<br />
		
	<div style="padding:10px;background:#eee;margin:5px;"><iframe width="1000" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.au/maps?q=<?php foreach((get_the_category()) as $category) {echo $category->cat_name . ''; } ?>&amp;hl=en&amp;hnear=<?php foreach((get_the_category()) as $category) {echo $category->cat_name . ''; } ?>&amp;t=m&amp;ie=UTF8&amp;hq=&amp;z=14&amp;output=embed&amp;iwloc=near"></iframe></div>		
<?php } ?>	
			
<?php if ( ( 0 == count_user_posts( get_current_user_id(), "teacher" ) && is_user_logged_in() && current_user_can('teacher-cap') && !current_user_can('admin-cap')) ) :?>		
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article update">
		<p>You need to update your <a href="http://perthreliefteachers.com.au/teacher-profile"><strong>Availability</strong></a> before you can view school jobs.</p>
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


<?php elseif (( 0 !== count_user_posts( get_current_user_id(), "teacher" ) && is_user_logged_in() && current_user_can('teacher-cap')) || (current_user_can('admin-cap') || current_user_can('school-cap'))) :?>
	
	<p style="text-align:center;font-size:12px;">Last updated <?php /* the_modified_date('j\<\s\u\p\>S\<\/\s\u\p\> M Y'); ?> at <?php the_modified_date('g:i a'); */ ?> <?php echo human_time_diff(get_the_modified_date('U'), current_time('timestamp')) . ' ago'; ?><br />member since: <?php the_date('j\<\s\u\p\>S\<\/\s\u\p\> M Y'); ?></p>	
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
<?php } ?>


			
	<p><strong>Contact</strong>: <?php the_title(); ?></p>
	<?php if( get_post_meta($post->ID, "alternate_number", true) ): ?>
		<p><strong>Phone</strong>: <?php echo get_post_meta($post->ID, "alternate_number", true); ?></p>
		<?php else: ?>
		<?php endif; ?>
	
		<?php if( get_post_meta($post->ID, "short_message", true) ): ?>
		<p style="font-weight:400;text-align:left;">
		<?php echo get_post_meta($post->ID, "short_message", true); ?>
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