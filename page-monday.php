<?php /* Template Name: Monday Jobs */ ?>
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
			<?php do_action('generate_before_main_content'); ?>
			<?php while ( have_posts() ) : the_post(); ?>

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
			<?php the_content(); ?>			
<?php 	
date_default_timezone_set('Australia/Perth'); // Put your PHP supported timezone in place of America/New York
$script_tz = date_default_timezone_get();
// get current day:
$currentday = date('l'); ?>
<?php if ($currentday == Monday){ ?>
<div class="monday">Monday</div>

<?php $args = array (
	'post_type' => array( 'post' ),
	'post_status' => array( 'publish' ),
	'order' => 'DESC',
	'orderby' => 'modified',
	'tax_query' => array(
		array(
			'taxonomy' => 'school-job-days',
			'field'    => 'slug',
			'terms'    => '01-monday',
		),
	),	
); ?>
<?php $query = new WP_Query( $args ); ?>
<?php if ( $query->have_posts() ) { ?>
	<?php while ( $query->have_posts() ) { ?>
		<?php $query->the_post(); ?>
<?php if ( post_is_in_descendant_category( 91 ) ) { ?>
<span class="primary">
<?php } elseif ( post_is_in_descendant_category( 1 ) ) { ?>
<span class="secondary">
<?php } elseif ( post_is_in_descendant_category( 494 ) ) { ?>
<span class="rural-primary">
<?php } elseif ( post_is_in_descendant_category( 721 ) ) { ?>
<span class="rural-dhs">
<?php } elseif ( post_is_in_descendant_category( 685 ) ) { ?>
<span class="rural-secondary">
<?php } elseif ( post_is_in_descendant_category( 776 ) ) { ?>
<span class="rural-other">
<?php } elseif ( post_is_in_descendant_category( 9999999999 ) ) { ?>
<span class="9999999999">
<?php } ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?> style="padding:0px;">
	<div class="inside-article" style="padding:0px;">
<p style="padding:10px;">
	<?php if ( in_category( 'school' )) { ?>
	 an unknown school
	<?php } else { ?>
	<?php foreach((get_the_category()) as $category) {echo $category->cat_name . ' '; } ?>
	<?php } ?>
	<?php if( get_post_meta($post->ID, "days", true) ): ?>for <?php echo get_post_meta($post->ID, "days", true); ?>
	<?php else: ?><?php endif; ?>
</p>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
		</a>
</span>
<?php 	} ?>
<?php } else { ?>
	no posts found
<?php } ?>
<?php wp_reset_postdata(); ?>

<?php } elseif ($currentday == Tuesday){ ?>
<div class="tuesday">Tuesday</div>
<?php $args = array (
	'post_type' => array( 'post' ),
	'post_status' => array( 'publish' ),
	'order' => 'DESC',
	'orderby' => 'modified',
	'tax_query' => array(
		array(
			'taxonomy' => 'school-job-days',
			'field'    => 'slug',
			'terms'    => '01-tuesday',
		),
	),	
); ?>
<?php $query = new WP_Query( $args ); ?>
<?php if ( $query->have_posts() ) { ?>
	<?php while ( $query->have_posts() ) { ?>
		<?php $query->the_post(); ?>
<?php if ( post_is_in_descendant_category( 91 ) ) { ?>
<span class="primary">
<?php } elseif ( post_is_in_descendant_category( 1 ) ) { ?>
<span class="secondary">
<?php } elseif ( post_is_in_descendant_category( 494 ) ) { ?>
<span class="rural-primary">
<?php } elseif ( post_is_in_descendant_category( 721 ) ) { ?>
<span class="rural-dhs">
<?php } elseif ( post_is_in_descendant_category( 685 ) ) { ?>
<span class="rural-secondary">
<?php } elseif ( post_is_in_descendant_category( 776 ) ) { ?>
<span class="rural-other">
<?php } elseif ( post_is_in_descendant_category( 9999999999 ) ) { ?>
<span class="9999999999">
<?php } ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?> style="padding:0px;">
	<div class="inside-article" style="padding:0px;">
<p style="padding:10px;">
	<?php if ( in_category( 'school' )) { ?>
	 an unknown school
	<?php } else { ?>
	<?php foreach((get_the_category()) as $category) {echo $category->cat_name . ' '; } ?>
	<?php } ?>
	<?php if( get_post_meta($post->ID, "days", true) ): ?>for <?php echo get_post_meta($post->ID, "days", true); ?>
	<?php else: ?><?php endif; ?>
</p>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
		</a>
</span>
<?php 	} ?>
<?php } else { ?>
	no posts found
<?php } ?>
<?php wp_reset_postdata(); ?>
<?php } elseif ($currentday == Wednesday){ ?>
<div class="wednesday">Wednesday</div>
<?php } elseif ($currentday == Thursday){ ?>
<div class="thursday">Thursday</div>
<?php } elseif ($currentday == Friday){ ?>
<div class="friday">Friday</div>
<?php } elseif ($currentday == Saturday){ ?>
<div class="saturday">Saturday</div>
<?php } elseif ($currentday == Sunday){ ?>
<div class="sunday">Sunday</div>
<?php } else { ?>
<?php } ?>			
			
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

			<?php endwhile; // end of the loop. ?>
			<?php do_action('generate_after_main_content'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
do_action('generate_sidebars');
get_footer();