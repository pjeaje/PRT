<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package GeneratePress
 */
?>

<section class="no-results not-found">
	<div class="inside-article">
		<?php do_action( 'generate_before_content'); ?>
		<header class="entry-header">
			<h1 class="entry-title">No Jobs... Yet</h1>
		</header><!-- .entry-header -->
		<?php do_action( 'generate_after_entry_header'); ?>
		<div class="entry-content">
		
				<?php if ( is_home() && (current_user_can( 'school-cap' ) || current_user_can( 'admin-cap' ))) : ?>

					<p>Please update your <a href="http://perthreliefteachers.com.au/post-a-job"><strong>Job Profile</strong></a>. This is <strong>very</strong> (very) important!</p>
				<?php elseif ( is_search() ) : ?>
					<p>It seems your search results didn't bring any results up?</p>
					<p>Try doing another search with different words or options.</p>
				<?php elseif ( is_home() && (current_user_can( 'teacher-cap' ) || current_user_can( 'admin-cap' ))) : ?>
					<p>No school has has updated their Job Profile yet... please ask your school/s to keep their Job Profile updated each day so you know when jobs are available.</p>
				<?php else : ?>				
					<p>No school has has updated their Job Profile yet... please ask your school/s to keep their Job Profile updated each day so you know when jobs are available.</p>
					<?php if (!is_user_logged_in()) : ?>
					<h2>Login</h2>
					<p><?php echo do_shortcode( '[wppb-login lostpassword_url="perthreliefteachers.com.au/recover-password" redirect_url="perthreliefteachers.com.au"]' ); ?>
					</p>	
					<?php endif; ?>				
				<?php endif; ?>
			
		</div><!-- .entry-content -->
		<?php do_action( 'generate_after_content'); ?>
	</div><!-- .inside-article -->
</section><!-- .no-results -->
