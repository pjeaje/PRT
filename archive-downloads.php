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
		
<?php if ( is_user_logged_in() && (current_user_can('teacher-cap') || current_user_can('admin-cap') || current_user_can('ea-cap'))) { ?>
		
		<?php if ( have_posts() ) : ?>
		
			<header class="page-header<?php if ( is_author() ) echo ' clearfix';?>">
				<h1 class="page-title">Downloads</h1>
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

<?php /* <div <?php post_class( 0 === ++$GLOBALS['wpdb']->current_post % 2 ? 'second' : '' ); ?>> */ ?>	


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

		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php do_action( 'generate_before_contentXXX'); ?>
		<header class="entry-header">

		<p><?php the_title(); ?><?php if(has_term('', 'teacher-qualification')) {?> - 
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
		</header><!-- .entry-header -->
		<?php do_action( 'generate_after_entry_header'); ?>	
		<?php do_action( 'generate_after_entry_content'); ?>
		<?php do_action( 'generate_after_content'); ?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
		</a>
</span>
			
<?php /* </div> */ ?>

			<?php endwhile; ?>

			<?php generate_content_nav( 'nav-below' ); ?>

		<?php else : ?>
	<header class="page-header<?php if ( is_author() ) echo ' clearfix';?>">
		<h1 class="page-title"><?php single_cat_title(); ?></h1>
		<p>
			<?php $description  =  get_queried_object()->description; if ( ! empty( $description ) ) : ?>
					<p style="text-align:center;width:100%;overflow:hidden;">					
					<a href="https://www.google.com.au/search?q=<?php single_cat_title(); ?>+western+australia" target="_blank"><i class="fa fa-globe fa-4x" style="float:left;"></i></a> 
					<a href="https://www.google.com.au/maps/place/<?php single_cat_title(); ?>+western+australia" target="_blank"><i class="fa fa-map-marker fa-4x"></i></a> 
					<a href="http://www.whitepages.com.au/searchBus.action?name=<?php single_cat_title(); ?>&location=" target="_blank"><i class="fa fa-phone fa-4x" style="float:right;"></i></a>				
					</p>		
			<p><?php echo $description; ?></p>
			<?php else: ?>
					<p style="text-align:center;width:100%;overflow:hidden;">					
					<a href="https://www.google.com.au/search?q=<?php single_cat_title(); ?>+western+australia" target="_blank"><i class="fa fa-globe fa-4x" style="float:left;"></i></a> 
					<a href="https://www.google.com.au/maps/place/<?php single_cat_title(); ?>+western+australia" target="_blank"><i class="fa fa-map-marker fa-4x"></i></a> 
					<a href="https://www.google.com.au/search?q=<?php single_cat_title(); ?>+western+australia" target="_blank"><i class="fa fa-phone fa-4x" style="float:right;"></i></a>				
					</p>
					<p><?php single_cat_title(); ?> seeking relief teachers to work at their school.</p>
			<?php endif; ?>		
		</p>
	</header>
		<?php endif; ?>

<?php } elseif  (!is_user_logged_in() || current_user_can('school-cap') ){ ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php do_action( 'generate_before_content'); ?>
		<header class="entry-header">
		<h1 style="text-align:center;"><i class="fa fa-lock fa-5x" aria-hidden="true"></i>
</h1>
<p style="text-align:center;">You need to be a <a href="http://perthreliefteachers.com.au">registered</a> to view this page.</p>
		</header><!-- .entry-header -->
	</div><!-- .inside-article -->
</article><!-- #post-## -->		
<?php } ?>	
	
		<?php do_action('generate_after_main_content'); ?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php 
do_action('generate_sidebars');
get_footer();