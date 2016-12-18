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
		
<?php if ( is_user_logged_in() && (current_user_can('school-cap') || (current_user_can('admin-cap')))) { ?>			
		
		<?php if ( have_posts() ) : ?>
		
			<header class="page-header<?php if ( is_author() ) echo ' clearfix';?>">
				<h1 class="page-title">
					<?php single_term_title(); ?><br />Education Assistants
				</h1>

<p>These education assistants have a <?php single_term_title(); ?> qualification.</p>
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

<?php if (( 0 == count_user_posts( get_current_user_id(), "post" ) && is_user_logged_in() && current_user_can('school-cap') && !current_user_can('admin-cap')) ) :?>		
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article update">
		<p>You need to update your <a href="http://perthreliefteachers.com.au/teacher-profile"><strong>Availability</strong></a> before you can view school jobs. This is <strong>very</strong> (very) important!</p>
	</div>
</article>
<?php elseif (( 0 !== count_user_posts( get_current_user_id(), "post" ) && is_user_logged_in() && current_user_can('school-cap')) || (current_user_can('admin-cap')) ) :?>			
			
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

<div <?php post_class( 0 === ++$GLOBALS['wpdb']->current_post % 2 ? 'second' : '' ); ?>>
<?php /* <span class="rural-primary"> */ ?>	
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
		<?php /* do_action( 'generate_after_entry_content'); */ ?>
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
	
		<h2 style="text-align:center;">No Schools</h2><p>Please search again using different criteria.</p>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
		<?php endif; ?>
		<?php do_action('generate_after_main_content'); ?>
		
<?php } elseif  (!is_user_logged_in() || current_user_can('teacher-cap') || current_user_can('ea-cap')){ ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php do_action( 'generate_before_content'); ?>
		<header class="entry-header">
		<!-- <h1 style="text-align:center;"><i class="fa fa-lock fa-5x" aria-hidden="true"></i>
</h1> -->
				<h1 class="page-title">
					<?php single_term_title(); ?><br />Education Assistants
</h1>
<?php if(!is_user_logged_in()) { ?>
<p>If you are a school relief co-ordinator you can <a href="http://perthreliefteachers.com.au/login-school">Login</a> and <a href="http://perthreliefteachers.com.au/login-school">register</a> to find education assistants available to work at schools within the <?php single_term_title(); ?>. This includes primary, secondary, mainstream, special needs, ethnic and Aboriginal/Islander EAs.</p>
<?php } elseif (is_user_logged_in() && (current_user_can('teacher-cap') || current_user_can('ea-cap')) ) { ?>
<p>If you are a teacher or education assistant willing to work at schools within the <?php single_term_title(); ?> please <a href="http://perthreliefteachers.com.au/my-profile">update your availability</a> to reflect this.</p>			
<?php } ?>

<div style="padding:10px;background:#eee;margin:5px;"><iframe width="1000" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.au/maps?q=<?php single_term_title(); ?>,Western+Australia&amp;hl=en&amp;hnear=<?php single_term_title(); ?>,Western+Australia&amp;t=m&amp;ie=UTF8&amp;hq=&amp;z=12&amp;output=embed&amp;iwloc=near"></iframe></div>
		</header><!-- .entry-header -->
	</div><!-- .inside-article -->
</article><!-- #post-## -->		
<?php } ?>	

	
		
		</main><!-- #main -->
	</section><!-- #primary -->

<?php 
do_action('generate_sidebars');
get_footer();