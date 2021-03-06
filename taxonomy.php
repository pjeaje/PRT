<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package GeneratePress
 */

get_header(); ?>

	<section id="primary" <?php generate_content_class(); ?>>
		<main id="main" <?php generate_main_class(); ?>>
		<?php do_action('generate_before_main_content'); ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article" style="text-align:center" >
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
				</div>
		</article>		
		
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
		
<?php if ( is_user_logged_in() && (current_user_can('school-cap') || current_user_can('admin-cap'))) { ?>			
		
		<?php if ( have_posts() ) : ?>
		
			<header class="page-header<?php if ( is_author() ) echo ' clearfix';?>">
				<h1 class="page-title">
					<?php single_term_title(); ?> relief teachers
				</h1>
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
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

<?php if (( 0 == count_user_posts( get_current_user_id(), "post" ) && is_user_logged_in() && current_user_can('school-cap')) && !current_user_can('admin-cap') ) :?>		
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<p>You need to update your <a href="http://perthreliefteachers.com.au/post-a-job"><strong>Job Profile</strong></a> before you can contact teachers.</p>
	</div>
</article>
<?php elseif (( 0 !== count_user_posts( get_current_user_id(), "post" ) && is_user_logged_in() && current_user_can('school-cap')) || current_user_can('admin-cap') ) :?>			
			
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

<div <?php post_class( 0 === ++$GLOBALS['wpdb']->current_post % 2 ? 'second' : '' ); ?>>
<?php /* 
<?php if( has_term( '01-early-childhood', 'teacher-qualification' ) ) { ?>
<span class="rural-primary">
<?php } elseif ( has_term( '02-primary', 'teacher-qualification' ) ) { ?>
<span class="primary">
<?php } elseif ( has_term( '03-middle', 'teacher-qualification' ) ) { ?>
<span class="rural-dhs">
<?php } elseif ( has_term( '04-secondary', 'teacher-qualification' ) ) { ?>
<span class="secondary">
<?php } elseif ( has_term( '05-education-support', 'teacher-qualification' ) ) { ?>
<span class="rural-secondary">
<?php } elseif ( has_term( '06-music', 'teacher-qualification' ) || has_term( '07-language', 'teacher-qualification' ) || has_term( '08-other-specialist', 'teacher-qualification' ) ) { ?>
<span class="rural-other">
<?php } ?>
 */ ?>	
		<a href="<?php the_permalink(); ?>" title="<?php if ( is_user_logged_in() && (current_user_can('school-plus-cap'))) { ?>			
		<?php the_title_attribute(); ?><?php if(has_term('', 'teacher-qualification')) {?> - <?php
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
		echo implode( ', ', $term_list ); }
		?><?php } else { ?><?php } ?><?php } elseif ( is_user_logged_in() && (!current_user_can('school-plus-cap'))) { ?>photo only available to School-Plus member only<?php } ?>">	
		
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article teacher-list">
		<?php do_action( 'generate_before_content'); ?>
		<header class="entry-header">
		
		<p>		
		
<?php if ( is_user_logged_in() && (current_user_can('school-plus-cap'))) { ?>	
<?php if ( has_post_thumbnail() ) { ?>
<?php the_post_thumbnail(); ?> 
<?php } else { ?>
<?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
<?php } ?>  
<?php } elseif ( is_user_logged_in() && (!current_user_can('school-plus-cap'))) { ?>
<img alt="" src="https://secure.gravatar.com/avatar/43c973225a8215ee6dfa1618b42cffb6?s=40&amp;d=mm&amp;r=pg" srcset="https://secure.gravatar.com/avatar/43c973225a8215ee6dfa1618b42cffb6?s=80&amp;d=mm&amp;r=pg 2x" class="avatar pic-2 avatar-40 photo" width="40" height="40"> 
<?php } ?>	
		<?php the_title(); ?><?php
add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
$timelimit=6.5 * 86400; // 7 days * seconds per day
$post_age = date('U') - get_the_modified_date('U');
if ($post_age < $timelimit) : ?>
<?php elseif ($post_age > $timelimit) : ?>
.
<?php endif; ?></p>
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
		
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
	
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
	
		<h2 style="text-align:center;">No Teachers</h2><p>Please search again using different criteria.</p>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
		<?php endif; ?>
		<?php do_action('generate_after_main_content'); ?>
		
<?php } elseif  (!is_user_logged_in() || (current_user_can('teacher-cap') || current_user_can('teacher-cap')) && !current_user_can('admin-cap') ){ ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php do_action( 'generate_before_content'); ?>
		<header class="entry-header">
		<h1 style="text-align:center;">
		<?php wp_redirect( 'http://perthreliefteachers.com.au', 302 ); exit; ?>
</h1>
		</header><!-- .entry-header -->
	</div><!-- .inside-article -->
</article><!-- #post-## -->		
<?php } ?>	

		
		
		</main><!-- #main -->
	</section><!-- #primary -->

<?php 
do_action('generate_sidebars');
get_footer();