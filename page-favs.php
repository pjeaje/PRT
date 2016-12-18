<?php /* Template Name: Favourites */ ?>
<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package GeneratePress
 */

get_header(); ?>

	<div id="primary" <?php generate_content_class();?>>
		<main id="main" <?php generate_main_class(); ?>>
		
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
		
	<?php /***** if ( is_user_logged_in() && (current_user_can('teacher-cap') || current_user_can('admin-cap'))) { ?>
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
	<?php } *****/ ?>	
	
	<?php if ( is_user_logged_in()) { ?>
	<?php } elseif  (!is_user_logged_in()){ ?>	
	<header class="page-header">
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
	</header>		
	<?php } ?>
	
	<?php if ( is_user_logged_in() && (current_user_can('school-cap') || current_user_can('admin-cap'))) { ?>
	<header class="page-header">
	<p>Please remember to keep your relief work profile updated for this current week.</p> 
	</header><!-- .entry-header -->	
	<?php } else { ?>	
	<?php } ?>			
		
			<?php do_action('generate_before_main_content'); ?>
			

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php do_action( 'generate_before_content'); ?>
		
		<?php if ( generate_show_title() ) : ?>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
				
			
				
			</header><!-- .entry-header -->
		<?php endif; ?>
		
		
		
		<?php do_action( 'generate_after_entry_header'); ?>
		<div class="entry-content" itemprop="text">

<? /*********** Teachers	******************/ ?>	
<h2>Teachers <i class="fa fa-user" aria-hidden="true"></i></h2>	

<?php if ( is_user_logged_in() && (current_user_can('school-plus-cap'))) { ?>
<?php } elseif ( is_user_logged_in() && (!current_user_can('school-plus-cap'))) { ?>
<h2><a href="https://perthreliefteachers.com.au/school-plus-membership" title="School-Plus member only - click to join"><i class="fa fa-user-plus" aria-hidden="true"></i></a> School-Plus members only</h2>
<?php } ?>

<?php
$favorites = get_user_favorites();
if ( $favorites ) : // This is important: if an empty array is passed into the WP_Query parameters, all posts will be returned
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; // If you want to include pagination
$favorites_query = new WP_Query(array(
	'post_type' => array( 'teacher', 'education-assistantXXX'),
	'posts_per_page' => -1,
        'orderby' => 'modified',
        'order' => 'desc',
	'ignore_sticky_posts' => true,
	'post__in' => $favorites,
	'paged' => $paged // If you want to include pagination, and have a specific posts_per_page set
));
if ( $favorites_query->have_posts() ) : while ( $favorites_query->have_posts() ) : $favorites_query->the_post(); ?>

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
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?> <?php if(has_term('', 'teacher-avail')) {?> - <?php
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
echo implode( ', ', $term_list ); }
?><?php } else { ?><?php } ?>">	
		
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
		
		<?php /**** echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ***/ ?> <?php the_title(); ?><?php /*** if(has_term('', 'teacher-qualification')) {?> - 
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
		echo implode( ', ', $term_list ); }
		?><?php } else { ?><?php } ***/ ?><?php
add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
$timelimit=6.5 * 86400; // 7 days * seconds per day
$post_age = date('U') - get_the_modified_date('U');
if ($post_age < $timelimit) : ?>
<?php elseif ($post_age > $timelimit) : ?>
 <i class="fa fa-warning"></i>
<?php /****
$to = get_the_author_meta( 'user_email' );
$subject = 'A school wants to know your availability';
$message = '<img src="https://perthreliefteachers.com.au/wp-content/uploads/Perth-Relief-Teachers-Logo-new-1.jpg" alt="PerthReliefTeachers.com.au Alert" /><br /><br /><br />Hi there, another school wants to know your availability - please login to <a href="http://perthreliefteachers.com.au/teacher-profile">PerthReliefTeachers.com.au</a> and update your Availability. If you like you can set your <a href="http://perthreliefteachers.com.au/teacher-profile">availability</a> as "No Days" for the current week (It takes less than a minute to update). Teachers are listed according to how recently they have updated their availability.<br /><br />Regards,<br /><a href="http://perthreliefteachers.com.au/">PerthReliefTeachers.com.au</a>'; 
$headers[] = 'From: Perth Relief Teachers <contact@perthreliefteachers.com.au>';
wp_mail( $to, $subject, $message, $headers );
remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );  ****/ ?>
<?php endif; ?>	

&nbsp; <i class="fa fa-phone"></i> <?php if( get_post_meta($post->ID, "teacher-contact", true) ): ?><small><?php echo get_post_meta($post->ID, "teacher-contact", true); ?></small><?php else: ?><?php endif; ?>
		
		</p>
		
		</header><!-- .entry-header -->
		<?php do_action( 'XXXgenerate_after_entry_header'); ?>	
		<?php do_action( 'generate_after_entry_content'); ?>
		<?php do_action( 'generate_after_content'); ?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
		</a>
<?php /* </span> */ ?>
			
</div>
		
		
<?php endwhile; ?>
<?php next_posts_link( 'Older Favourites', $favorites_query->max_num_pages );
previous_posts_link( 'Newer Favourites' ); ?>
<?php endif; wp_reset_postdata();
else : ?>
	<p>No Teachers in your preferred relief teacher list</p>
<?php endif; ?>	

<a name="eafavs"></a>
<hr />
<? /*********** EAs	******************/ ?>
<h2>Education Assistants <i class="fa fa-smile-o" aria-hidden="true"></i></h2>	

<?php if ( is_user_logged_in() && (current_user_can('school-plus-cap'))) { ?>
<?php } elseif ( is_user_logged_in() && (!current_user_can('school-plus-cap'))) { ?>
<h2><a href="https://perthreliefteachers.com.au/school-plus-membership" title="School-Plus member only - click to join"><i class="fa fa-user-plus" aria-hidden="true"></i></a> School-Plus members only</h2>
<?php } ?>

<?php
$favorites = get_user_favorites();
if ( $favorites ) : // This is important: if an empty array is passed into the WP_Query parameters, all posts will be returned
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; // If you want to include pagination
$favorites_query = new WP_Query(array(
	'post_type' => array( 'teacherXXX', 'education-assistant'),
	'posts_per_page' => -1,
        'orderby' => 'modified',
        'order' => 'desc',
	'ignore_sticky_posts' => true,
	'post__in' => $favorites,
	'paged' => $paged // If you want to include pagination, and have a specific posts_per_page set
));
if ( $favorites_query->have_posts() ) : while ( $favorites_query->have_posts() ) : $favorites_query->the_post(); ?>

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
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?> <?php if(has_term('', 'ea-avail')) {?> - <?php
$product_terms = get_the_terms( get_the_ID(), 'ea-avail' );
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
?><?php } else { ?><?php } ?>">	
		
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
		
		<?php /**** echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ***/ ?> <?php the_title(); ?><?php /*** if(has_term('', 'teacher-qualification')) {?> - 
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
		echo implode( ', ', $term_list ); }
		?><?php } else { ?><?php } ***/ ?><?php
add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
$timelimit=6.5 * 86400; // 7 days * seconds per day
$post_age = date('U') - get_the_modified_date('U');
if ($post_age < $timelimit) : ?>
<?php elseif ($post_age > $timelimit) : ?>
 <i class="fa fa-warning"></i>
<?php /****
$to = get_the_author_meta( 'user_email' );
$subject = 'A school wants to know your availability';
$message = '<img src="https://perthreliefteachers.com.au/wp-content/uploads/Perth-Relief-Teachers-Logo-new-1.jpg" alt="PerthReliefTeachers.com.au Alert" /><br /><br /><br />Hi there, another school wants to know your availability - please login to <a href="http://perthreliefteachers.com.au/teacher-profile">PerthReliefTeachers.com.au</a> and update your Availability. If you like you can set your <a href="http://perthreliefteachers.com.au/teacher-profile">availability</a> as "No Days" for the current week (It takes less than a minute to update). Teachers are listed according to how recently they have updated their availability.<br /><br />Regards,<br /><a href="http://perthreliefteachers.com.au/">PerthReliefTeachers.com.au</a>'; 
$headers[] = 'From: Perth Relief Teachers <contact@perthreliefteachers.com.au>';
wp_mail( $to, $subject, $message, $headers );
remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );  ****/ ?>
<?php endif; ?>	

&nbsp;<i class="fa fa-phone"></i> <?php if( get_post_meta($post->ID, "ea-phone", true) ): ?><small><?php echo get_post_meta($post->ID, "ea-phone", true); ?></small><?php else: ?><?php endif; ?>
		
		</p>
		
		</header><!-- .entry-header -->
		<?php do_action( 'XXXgenerate_after_entry_header'); ?>	
		<?php do_action( 'generate_after_entry_content'); ?>
		<?php do_action( 'generate_after_content'); ?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
		</a>
<?php /* </span> */ ?>
			
</div>
		
		
<?php endwhile; ?>
<?php next_posts_link( 'Older Favourites', $favorites_query->max_num_pages );
previous_posts_link( 'Newer Favourites' ); ?>
<?php endif; wp_reset_postdata();
else : ?>
	<p>No EAs in your preferred EA relief list</p>
<?php endif; ?>		

			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'generatepress' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
		<?php do_action( 'generate_after_content'); ?>
		<?php edit_post_link( __( 'Edit', 'generatepress' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->

				<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) : ?>
					<div class="comments-area">
						<?php comments_template(); ?>
					</div>
				<?php endif; ?>

			
			<?php do_action('generate_after_main_content'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
do_action('generate_sidebars');
get_footer();