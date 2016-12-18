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
		
<?php if ( is_mobile() && (is_iphone() || is_android()) ) { ?>

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
		
<?php } else { ?>
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
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
				<div class="inside-article" style="text-align:center" >
					<small><strong><a href="http://darrengreen.com.au" title="Darren Green Home Loan Mortgage Advisor">Darren Green Home Loan Mortgage Advisor</a></strong><br />Helping school teachers buy their first home</small>
				</div>
		</article>			
<?php } ?>
	

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
				<h1 class="page-title">All the latest WA Government School Teacher and Education Assistant Jobs</h1>

	<?php if ( is_user_logged_in() && (current_user_can('school-cap') || current_user_can('teacher-cap') || current_user_can('admin-cap'))) { ?>
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
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?><?php if(has_term('', 'teacher-qualification')) {?> - <?php
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
		?><?php } else { ?><?php } ?>">	
		
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article teacher-list">
		<?php do_action( 'generate_before_content'); ?>
		<header class="entry-header">

		<p>		
		<?php /**** echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ***/ ?> <?php the_title(); ?> - <?php the_modified_date('D M j, Y'); ?><?php /*** if(has_term('', 'teacher-qualification')) {?> - 
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
<!-- something here -->
<?php /*****
$to = get_the_author_meta( 'user_email' );
$subject = 'A school wants to know your availability';
$message = '<img src="http://perthreliefteachers.com.au/wp-content/uploads/PerthReliefTeachers-logo-800.jpg" alt="PerthReliefTeachers.com.au Alert" /><br /><br /><br />Hi there, another school wants to know your availability - please login to <a href="http://perthreliefteachers.com.au/teacher-profile">PerthReliefTeachers.com.au</a> and update your Availability. If you like you can set your <a href="http://perthreliefteachers.com.au/teacher-profile">availability</a> as "No Days" for the current week (It takes less than a minute to update). Teachers are listed according to how recently they have updated their availability.<br /><br />Regards,<br /><a href="http://perthreliefteachers.com.au/">PerthReliefTeachers.com.au</a>'; 
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

		<?php else : ?> <!-- if no posts -->
<?php if ( is_mobile() && (is_iphone() || is_android()) ) { ?>
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
<?php } else { ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article" style="text-align:center;font-weight:700;" >
<small>
<a href="http://darrengreen.com.au" title="Darren Green Home Loan Mortgage Advisor">Darren Green Home Loan Mortgage Advisor</a>
<br />Find your right fit home loan without the hassle
</small>
	</div>
</article>		
<?php } ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
		<div class="inside-article" style="text-align:center" >
			<h2>No Jobs yet, but there should be some tomorrow.</h2>
		</div>
</article>	
		<?php endif; ?> <!-- end of if no posts -->

	
		<?php do_action('generate_after_main_content'); ?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php 
do_action('generate_sidebars');
get_footer();