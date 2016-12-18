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
		
		
		

		
			<header class="page-header<?php if ( is_author() ) echo ' clearfix';?>">
				<h1 class="page-title">
					<a href="<?php echo esc_url( $category_link ); ?>" title="Category Name"></a>
					<?php single_cat_title(); ?>					
				</h1>
	<?php if ( is_user_logged_in() && (current_user_can('school-cap') || current_user_can('admin-cap'))) { ?>
	<?php } elseif  (!is_user_logged_in()){ ?>			
		<?php if( !is_mobile()) { ?>	
			<p class="mobilebest">
			<span class="fa-stack fa-lg">
			  <i class="fa fa-mobile fa-3x fa-stack-1x"></i>
			  <i class="fa fa-check fa-2x fa-stack-1x"></i>
			</span><br />
			This website is mobile friendly
			</p>			
		<?php } else { ?>			
		<?php } ?>	
	<?php } ?>			
	
	<?php if ( is_user_logged_in() && !is_category ( array( 1,91,776,997,998,494,685 ))) { ?>
			<?php $description  =  get_queried_object()->description; if ( ! empty( $description ) ) : ?>
					<p style="text-align:center;width:100%;overflow:hidden;margin-top:20px;">					
					<a href="https://www.google.com.au/search?q=<?php single_cat_title(); ?>+western+australia" target="_blank"><i class="fa fa-globe fa-4x" style="float:left;"></i></a> 
					<a href="https://www.google.com.au/maps/place/<?php single_cat_title(); ?>+western+australia" target="_blank"><i class="fa fa-map-marker fa-4x"></i></a> 
					<a href="http://www.whitepages.com.au/searchBus.action?name=<?php single_cat_title(); ?>&location=" target="_blank"><i class="fa fa-phone fa-4x" style="float:right;"></i></a>				
					</p>		
			<p><?php echo $description; ?></p>
			<?php else: ?>
					<p style="text-align:center;width:100%;overflow:hidden;margin-top:20px;">					
					<a href="https://www.google.com.au/search?q=<?php single_cat_title(); ?>+western+australia" target="_blank"><i class="fa fa-globe fa-4x" style="float:left;"></i></a> 
					<a href="https://www.google.com.au/maps/place/<?php single_cat_title(); ?>+western+australia" target="_blank"><i class="fa fa-map-marker fa-4x"></i></a> 
					<a href="https://www.google.com.au/search?q=<?php single_cat_title(); ?>+western+australia" target="_blank"><i class="fa fa-phone fa-4x" style="float:right;"></i></a>				
					</p>
					<p>Ask <?php single_cat_title(); ?> to register with PerthReliefTeachers.com.au so they can find you for teacher relief work at their school.</p>
			<?php endif; ?>		
	<?php } ?>
		
<?php if (is_category ( array( 1,91,776,997,998,494,685 ))) { ?>
<br />
<?php echo do_shortcode( '[su_spoiler title="List of Schools" style="fancy" icon="folder-2" class="school-expand"]
[do_widget id=enhancedtextwidget-12]
[/su_spoiler]' ); ?>
<?php } else { ?>
<?php } ?>
				
			</header><!-- .page-header -->
			

<?php if (is_category ( array( 1,91,776,997,998,494,685 ))) { ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">	
	<h2>Schools seeking relief teachers</h2>	
	</div>
</article>
<?php } else { ?>
<?php } ?>

		
			
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>	
			
<?php /* <div <?php post_class( 0 === ++$GLOBALS['wpdb']->current_post % 2 ? 'second' : '' ); ?>> */ ?>	

<?php if ( 'PerthReliefTeachers.com.au' == get_the_author() ) { ?>
<?php } elseif (!is_user_logged_in()) { ?>
<!-- not logged in -->
<?php } elseif (is_user_logged_in()) { ?>

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
<?php } elseif ( post_is_in_descendant_category( 997 ) ) { ?>
<span class="rural-other">
<?php } elseif ( post_is_in_descendant_category( 998 ) ) { ?>
<span class="rural-other">
<?php } ?>

		<a href="<?php the_permalink(); ?>" title="<?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' ';} ?>">	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php do_action( 'generate_before_content'); ?>
		<header class="entry-header">
<?php if (is_category ( array( 1,91,776,997,998,494,685 ))) { ?>
<p style="text-align:center;"><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' ';} ?></p>
<?php } else { ?>
<p style="text-align:center;">Click to see available relief work at<br /><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' ';} ?></p>
<?php } ?>		
		</header><!-- .entry-header -->
		
		<?php do_action( 'generate_after_entry_header'); ?>	
		<?php do_action( 'generate_after_entry_content'); ?>
		<?php do_action( 'generate_after_content'); ?>
		
	</div><!-- .inside-article -->
</article><!-- #post-## -->
		</a>
</span>
<?php } // end admin author post ?>	
	
<?php /* </div> */ ?>

			<?php endwhile; ?>			
			
			<?php generate_content_nav( 'nav-below' ); ?>
		
<?php if (!is_category ( array( 1,91,776,494,685,997,998 )) && is_user_logged_in()) { ?>
		
	<header class="page-header<?php if ( is_author() ) echo ' clearfix';?>">
	
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
			
<div style="padding:10px;background:#eee;margin:5px;"><iframe width="1000" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.au/maps?q=<?php single_cat_title(); ?>,western+Australia &amp;hl=en&amp;hnear=<?php single_cat_title(); ?>,western+australia&amp;t=m&amp;ie=UTF8&amp;hq=&amp;z=12&amp;output=embed&amp;iwloc=near"></iframe></div>			
	</header>

<?php } elseif (!is_category ( array( 1,91,776,494,685,997,998 )) && (!is_user_logged_in())) { ?>
	<header class="page-header<?php if ( is_author() ) echo ' clearfix';?>">		
					<p style="margin:20px;">If you are a <a href="http://perthreliefteachers.com.au/login-teacher"><strong>teacher</strong></a> or an <a href="http://perthreliefteachers.com.au/ea-login"><strong>education assistant</strong></a> you can register and login to find available relief work at <?php single_cat_title(); ?>.<br /><br />
					
					If you are the relief co-ordinator of <?php single_cat_title(); ?> you can <a href="http://perthreliefteachers.com.au/login-school"><strong>register</strong></a> and find relief staff for your school as well as list your relief work availability.<br /><br />
					<a href="http://perthreliefteachers.com.au"><strong>PerthReliefTeachers.com.au</strong></a> is 100% free for schools and teachers.</p>
	</header>
	
<header class="page-header<?php if ( is_author() ) echo ' clearfix';?>">	

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

<div style="padding:10px;background:#eee;margin:5px;"><iframe width="1000" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.au/maps?q=<?php single_cat_title(); ?>,western+Australia &amp;hl=en&amp;hnear=<?php single_cat_title(); ?>,western+australia&amp;t=m&amp;ie=UTF8&amp;hq=&amp;z=12&amp;output=embed&amp;iwloc=near"></iframe></div>			
</header>	
	
<?php } ?>		
	

		
		<?php do_action('generate_after_main_content'); ?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php 
do_action('generate_sidebars');
get_footer();