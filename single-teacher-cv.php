<?php
/**
 * The Template for displaying all teacher resume posts.
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
$timelimit=6 * 86400; // 7 days * seconds per day
$post_age = date('U') - get_the_modified_date('U');
if ($post_age < $timelimit) : ?>

<?php elseif ($post_age > $timelimit) : ?>
<p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> This teacher hasn't updated their availability for this week.<br />
<i class="fa fa-envelope" aria-hidden="true"></i> An email has been sent asking them to update their availability.</p>
<?php
$to = get_the_author_meta( 'user_email' );
$subject = 'A school wants to know your availability';
$message = '<img src="http://perthreliefteachers.com.au/wp-content/uploads/PerthReliefTeachers-logo-800.jpg" alt="PerthReliefTeachers.com.au Alert" /><br /><br /><br />Hi there, another school wants to know your availability - please login to <a href="http://perthreliefteachers.com.au/teacher-profile">PerthReliefTeachers.com.au</a> and update your Availability. If you like you can set your <a href="http://perthreliefteachers.com.au/teacher-profile">availability</a> as "No Days" for the current week (It takes less than a minute to update). Teachers are listed according to how recently they have updated their availability.<br /><br />Regards,<br /><a href="http://perthreliefteachers.com.au/">PerthReliefTeachers.com.au</a>'; 
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
					<h2><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please Update Your Job Profile</h2>
				</div>
			</a>
		</article>
<?php elseif (( 0 !== count_user_posts( get_current_user_id(), "post" ) && is_user_logged_in() && current_user_can('school-cap')) || current_user_can('admin-cap') ) :?>			
		<div class="entry-content" itemprop="text">	
		<div style="text-align:left;">
<h2 class="teacher-cv-name">
<?php the_title(); ?>
</h2>

<p style="text-align:center;">
<?php if( get_post_meta($post->ID, "teacher-cv-address", true) ): ?>
<?php echo get_post_meta($post->ID, "teacher-cv-address", true); ?>
<?php else: ?>
<?php endif; ?>
<br />
<?php if( get_post_meta($post->ID, "teacher-cv-phone", true) ): ?>
<?php echo get_post_meta($post->ID, "teacher-cv-phone", true); ?>
<?php else: ?>
<?php endif; ?>
<br />
<?php if( get_post_meta($post->ID, "teacher-cv-email", true) ): ?>
<?php echo get_post_meta($post->ID, "teacher-cv-email", true); ?>
<?php else: ?>
<?php endif; ?>
</p>

<h2>Summary</h2>			
<p class="white-space"><?php if( get_post_meta($post->ID, "teacher-cv-summary", true) ): ?><i class="fa fa-quote-left" aria-hidden="true"></i> <?php echo get_post_meta($post->ID, "teacher-cv-summary", true); ?> <i class="fa fa-quote-right" aria-hidden="true"></i><?php else: ?>
<?php endif; ?></p>

<h2>Employment</h2>	
<p class="white-space2" style="padding:10px;"><?php if( get_post_meta($post->ID, "teacher-cv-employment-1", true) ): ?><?php echo get_post_meta($post->ID, "teacher-cv-employment-1", true); ?><?php else: ?><?php endif; ?></p>

<p class="white-space2" style="padding:10px;"><?php if( get_post_meta($post->ID, "teacher-cv-employment-2", true) ): ?><?php echo get_post_meta($post->ID, "teacher-cv-employment-2", true); ?><?php else: ?><?php endif; ?></p>

<p class="white-space2" style="padding:10px;"><?php if( get_post_meta($post->ID, "teacher-cv-employment-3", true) ): ?><?php echo get_post_meta($post->ID, "teacher-cv-employment-3", true); ?><?php else: ?><?php endif; ?>
</p>	

<h2>Qualification</h2>	
<p class="white-space2" style="padding:10px;"><?php if( get_post_meta($post->ID, "teacher-cv-qualification-1", true) ): ?>
#1: <?php echo get_post_meta($post->ID, "teacher-cv-qualification-1", true); ?>
<?php else: ?>
<?php endif; ?>
</p>	

<p class="white-space2" style="padding:10px;"><?php if( get_post_meta($post->ID, "teacher-cv-qualification-2", true) ): ?>
#2: <?php echo get_post_meta($post->ID, "teacher-cv-qualification-2", true); ?>
<?php else: ?>
<?php endif; ?>
</p>	

<p class="white-space2" style="padding:10px;"><?php if( get_post_meta($post->ID, "teacher-cv-qualification-3", true) ): ?>
#3+: <?php echo get_post_meta($post->ID, "teacher-cv-qualification-3", true); ?>
<?php else: ?>
<?php endif; ?>
</p>	

<h2>TRBWA</h2>		
<p class="text-center">
<?php if( get_post_meta($post->ID, "teacher-cv-trbwa", true) ): ?>
<span class="font25"><?php echo get_post_meta($post->ID, "teacher-cv-trbwa", true); ?></span>
<?php else: ?>
<?php endif; ?>
</p>	

<h2>Professional Associations</h2>		
<p class="white-space"><?php if( get_post_meta($post->ID, "teacher-cv-assoc", true) ): ?><?php echo get_post_meta($post->ID, "teacher-cv-assoc", true); ?><?php else: ?><?php endif; ?></p>	

<h2>WWCC</h2>		
<p class="text-center">
<?php if( get_post_meta($post->ID, "teacher-cv-wwcc", true) ): ?>
<?php echo get_post_meta($post->ID, "teacher-cv-wwcc", true); ?>
<?php else: ?>
<?php endif; ?>

<?php if( get_post_meta($post->ID, "teacher-cv-wwcc-date", true) ): ?>
 expires <?php $date = get_post_meta($post->ID, 'teacher-cv-wwcc-date', true); if($date != ''){echo date("jS F Y", strtotime($date));} ?>
<?php else: ?>
<?php endif; ?>
</p>

<h2>Other Skills</h2>
<p class="white-space"><?php if( get_post_meta($post->ID, "teacher-cv-skills", true) ): ?><?php echo get_post_meta($post->ID, "teacher-cv-skills", true); ?><?php else: ?><?php endif; ?></p>

		</div>

		</div><!-- .entry-content -->	

		<?php do_action( 'generate_after_entry_content'); ?>

		<footer class="entry-meta">
	
		</footer><!-- .entry-meta -->			
		
		<?php do_action( 'generate_after_content'); ?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->

<?php endif; ?>	<!-- end of no job profile -->	

		<?php endwhile; // end of the loop. ?>

		
<?php } elseif  (!is_user_logged_in() || ((current_user_can('teacher-cap')) && (!$current_user->ID == $post->post_author))  || current_user_can('ea-cap')){ ?>
<?php wp_redirect( 'http://perthreliefteachers.com.au/', 302 ); exit; ?>
<?php } ?>

	
		<?php do_action('generate_after_main_content'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
do_action('generate_sidebars');
get_footer();