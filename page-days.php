<?php /* Template Name: Days Jobs */ ?>
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
			
	<?php if ( is_user_logged_in() && (current_user_can('teacher-cap') || current_user_can('admin-cap'))) { ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
			<a href="http://perthreliefteachers.com.au/teacher-profile">
				<div class="inside-article update">
					<h2><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Please Update Your Availability</h2>
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
	<?php } ?>				
			
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
<p class="days">The following schools are looking for staff</p>

<?php if (( 0 == count_user_posts( get_current_user_id(), "teacher" ) && is_user_logged_in() && current_user_can('teacher-cap')) || current_user_can('admin-cap') ) :?>		
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article update2">
		<p>You need to update your <a href="http://perthreliefteachers.com.au/teacher-profile"><strong>Availability</strong></a> before you can view school jobs. This is <strong>very</strong> (very) important!</p>
	</div>
</article>
<?php elseif (( 0 !== count_user_posts( get_current_user_id(), "teacher" ) && is_user_logged_in() && current_user_can('teacher-cap')) || (current_user_can('admin-cap') || current_user_can('school-cap'))) :?>
		
<?php 	
date_default_timezone_set('Australia/Perth'); // Put your PHP supported timezone in place of America/New York
$script_tz = date_default_timezone_get();
// get current day:
$currentday = date('+1 day'); ?>
<?php if ($currentday == Monday){ ?>
<div class="day-title">Monday</div>
<p class="date-today"><?php echo date('j\<\s\u\p\>S\<\/\s\u\p\> M Y'); ?></p>
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
		<a href="<?php the_permalink(); ?>" title="<?php foreach((get_the_category()) as $category) {echo $category->cat_name . ' '; } ?>">	
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
<div class="day-title">Tuesday</div>
<p class="date-today"><?php echo date('j\<\s\u\p\>S\<\/\s\u\p\> M Y'); ?></p>
<?php $args = array (
	'post_type' => array( 'post' ),
	'post_status' => array( 'publish' ),
	'order' => 'DESC',
	'orderby' => 'modified',
	'tax_query' => array(
		array(
			'taxonomy' => 'school-job-days',
			'field'    => 'slug',
			'terms'    => '02-tuesday',
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
		<a href="<?php the_permalink(); ?>" title="<?php foreach((get_the_category()) as $category) {echo $category->cat_name . ' '; } ?>">	
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
<div class="day-title">Wednesday</div>
<p class="date-today"><?php echo date('j\<\s\u\p\>S\<\/\s\u\p\> M Y'); ?></p>
<?php $args = array (
	'post_type' => array( 'post' ),
	'post_status' => array( 'publish' ),
	'order' => 'DESC',
	'orderby' => 'modified',
	'tax_query' => array(
		array(
			'taxonomy' => 'school-job-days',
			'field'    => 'slug',
			'terms'    => '03-wednesday',
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
		<a href="<?php the_permalink(); ?>" title="<?php foreach((get_the_category()) as $category) {echo $category->cat_name . ' '; } ?>">	
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
<?php } elseif ($currentday == Thursday){ ?>
<div class="day-title">Thursday</div>
<p class="date-today"><?php echo date('j\<\s\u\p\>S\<\/\s\u\p\> M Y'); ?></p>
<?php $args = array (
	'post_type' => array( 'post' ),
	'post_status' => array( 'publish' ),
	'order' => 'DESC',
	'orderby' => 'modified',
	'tax_query' => array(
		array(
			'taxonomy' => 'school-job-days',
			'field'    => 'slug',
			'terms'    => '04-thursday',
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
		<a href="<?php the_permalink(); ?>" title="<?php foreach((get_the_category()) as $category) {echo $category->cat_name . ' '; } ?>">	
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
<?php } elseif ($currentday == Friday){ ?>
<div class="day-title">Friday</div>
<p class="date-today"><?php echo date('j\<\s\u\p\>S\<\/\s\u\p\> M Y'); ?></p>
<?php $args = array (
	'post_type' => array( 'post' ),
	'post_status' => array( 'publish' ),
	'order' => 'DESC',
	'orderby' => 'modified',
	'tax_query' => array(
		array(
			'taxonomy' => 'school-job-days',
			'field'    => 'slug',
			'terms'    => '05-friday',
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
		<a href="<?php the_permalink(); ?>" title="<?php foreach((get_the_category()) as $category) {echo $category->cat_name . ' '; } ?>">	
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
<?php } elseif ($currentday == Saturday){ ?>
<div class="day-title">Saturday</div>
<?php } elseif ($currentday == Sunday){ ?>
<div class="day-title">Sunday</div>
<?php } else { ?>
<?php } ?>	

<?php endif; ?>	<!-- end of no job profile -->		
			
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'generatepress' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
		<?php do_action( 'generate_after_content'); ?>
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