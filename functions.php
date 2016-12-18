<?php
/**
 * Generate child theme functions and definitions
 *
 * @package Generate
 */

// change og locale
function yst_wpseo_change_og_locale( $locale ) {
return 'en_AU';
}
add_filter( 'wpseo_locale', 'yst_wpseo_change_og_locale' );

/******* add an extra user role
add_action( 'profile_update', 'wpse_assign_abc_role_to_xyz_users', 10 );
add_action( 'user_register', 'wpse_assign_abc_role_to_xyz_users', 10 );

function wpse_assign_abc_role_to_xyz_users() {
   $args = array(
        'role'         => 'school', // Set the role you want to search for here
        'role__not_in' => array( 'schoolplus' ), // If they already have abc role, we can skip them
        'number'       => '500', // Good idea to set a limit to avoid timeouts/performance bottlenecks
    ); 
    $xyz_users = get_users( $args );

    // Bail early if there aren't any to update
    if ( count( $xyz_users ) === 0 ) return;

    // get_users() returns an array of WP_User objects, meaning we can use the add_role() method of the object

    foreach ( $xyz_users as $user ) {
        $user->add_role( 'schoolplus' );
    }
}
*******/

// RCP remove role on expire
add_action('rcp_set_status', 'remove_role_to_expired', 30, 2);
function remove_role_to_expired( $status, $user_id ) {
	if ( 'expired' == $status ) { // expired status
		$member = new RCP_Member( $user_id );
		if ( $member->get_subscription_id() == 1) { // Subscription ID 
			$user_role = 'schoolplus'; // user-role to be deleted
			$member->remove_role( $user_role );
		}
	}
}



// comment privacy
// post author can only reply
add_action( 'pre_comment_on_post', 'wpq_pre_commenting' );
function wpq_pre_commenting( $pid ) {
$parent_id = filter_input( INPUT_POST, 'comment_parent', FILTER_SANITIZE_NUMBER_INT );
$post = get_post( $pid );
$cuid = get_current_user_id();
if( ! is_null( $post ) && $post->post_author == $cuid && 0 == $parent_id ) {
wp_die(	'Sorry, post author can only reply to a comment!' );
}
} 

// http://wpquestions.com/question/showChronoLoggedIn/id/10125
function restrict_comments( $comments , $post_id ){ 
global $post;
$user = wp_get_current_user();
if($post->post_author == $user->ID){
		return $comments;
}
foreach($comments as $comment){
	if(  $comment->user_id == $user->ID || $post->post_author == $comment->user_id  ){
		if($post->post_author == $comment->user_id){
			if($comment->comment_parent > 0){
				$parent_comm = get_comment( $comment->comment_parent );
				if( $parent_comm->user_id == $user->ID ){
					$new_comments_array[] = $comment;		
				}
			}else{
					$new_comments_array[] = $comment;	
			}
		}else{
			$new_comments_array[] = $comment;			
		}
	}
}
 return $new_comments_array; }
add_filter( 'comments_array' , 'restrict_comments' , 10, 2 );
//

//delete all comments from post-type older than x days
function md_scheduled_delete_comments() {
$comments = get_comments( array(
'post_type' => 'post',
'date_query' => array(
'before' => '7 days ago',
),
) );

if ( $comments ) {
foreach ( $comments as $comment ) {
wp_delete_comment( $comment );
}
}
}
// add_action( 'wp_loaded', 'md_scheduled_delete_comments' ); **** swap this to run immediately ****
add_action( 'wp_scheduled_delete', 'md_scheduled_delete_comments' );


// Trim Post title --- < ?php the_title_excerpt('', '...', true, '330'); ? >
function the_title_excerpt($before = '', $after = '', $echo = true, $length = false) 
  {
    $title = get_the_title();

    if ( $length && is_numeric($length) ) {
        $title = substr( $title, 0, $length );
    }

    if ( strlen($title)> 0 ) {
        $title = apply_filters('the_title_excerpt', $before . $title . $after, $before, $after);
        if ( $echo )
            echo $title;
        else
            return $title;
    }
}

 
// insert php in menus
if ( ! empty ( $_GET['partenaire'] ) )
    add_filter( 'wp_nav_menu_objects', 'wpse_82194_add_param' );
function wpse_82194_add_param( $items )
{
    $out = array ();
    foreach ( $items as $item )
    {
        $item->url = add_query_arg( 'partenaire', $_GET['partenaire'], $item->url );
        $out[] = $item;
    }
    return $items;
}

// over ride featured image size
set_post_thumbnail_size( 150, 150, array( 'center', 'top')  );

 
// gravatar url
function my_gravatar_url() { // Get user email
$user_email = get_the_author_meta( 'user_email' );
// Convert email into md5 hash and set image size to 80 px
$user_gravatar_url = 'http://www.gravatar.com/avatar/' . md5($user_email) . '?s=512';
echo $user_gravatar_url; } 

// add class to gravatar
add_filter('get_avatar','add_gravatar_class');
function add_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='avatar pic-2", $class);
    return $class;
}

// page views //
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "<!-- 0 View -->";
    }
    return $count.'<!-- Views -->';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
 
 
// rank pages by date in admin
function set_post_order_in_admin( $wp_query ) {
global $pagenow;
  if ( is_admin() && 'edit.php' == $pagenow && !isset($_GET['orderby'])) {
    $wp_query->set( 'orderby', 'date' );
    $wp_query->set( 'order', 'DSC' );
  }
}
add_filter('pre_get_posts', 'set_post_order_in_admin' );
 
//
//
//
// prevent users adding terms 
add_action('create_term','undo_create_term',10, 3);

function undo_create_term ($term_id, $tt_id, $taxonomy) {
    if ( !current_user_can( 'administrator' ) )  {
        if($taxonomy == 'teacher-avail') {
        wp_delete_term($term_id,$taxonomy);
        }
    }
}

// same as above
function disallow_insert_term($term, $taxonomy) {
    $user = wp_get_current_user();
    if ( $taxonomy === 'teacher-avail' && in_array('teacher', $user->roles) ) {
        return new WP_Error(
            'disallow_insert_term', 
            __('Your role does not have permission to add terms to this taxonomy')
        );
    }
}
add_action( 'pre_insert_term', 'disallow_insert_term', 10, 2);

// prevent extra teacher-??? terms being created
add_action( 'pre_insert_term', function ( $term, $taxonomy )
{
    return ( 'teacher-lga' === $taxonomy )
        ? new WP_Error( 'term_addition_blocked', __( 'You cannot add terms to this taxonomy' ) )
        : $term;
}, 0, 2 );
add_action( 'pre_insert_term', function ( $term, $taxonomy )
{
    return ( 'teacher-la' === $taxonomy )
        ? new WP_Error( 'term_addition_blocked', __( 'You cannot add terms to this taxonomy' ) )
        : $term;
}, 0, 2 );
add_action( 'pre_insert_term', function ( $term, $taxonomy )
{
    return ( 'teacher-avail' === $taxonomy )
        ? new WP_Error( 'term_addition_blocked', __( 'You cannot add terms to this taxonomy' ) )
        : $term;
}, 0, 2 );
add_action( 'pre_insert_term', function ( $term, $taxonomy )
{
    return ( 'teacher-years' === $taxonomy )
        ? new WP_Error( 'term_addition_blocked', __( 'You cannot add terms to this taxonomy' ) )
        : $term;
}, 0, 2 );
add_action( 'pre_insert_term', function ( $term, $taxonomy )
{
    return ( 'teacher-level' === $taxonomy )
        ? new WP_Error( 'term_addition_blocked', __( 'You cannot add terms to this taxonomy' ) )
        : $term;
}, 0, 2 );
add_action( 'pre_insert_term', function ( $term, $taxonomy )
{
    return ( 'teacher-statearea' === $taxonomy )
        ? new WP_Error( 'term_addition_blocked', __( 'You cannot add terms to this taxonomy' ) )
        : $term;
}, 0, 2 );
add_action( 'pre_insert_term', function ( $term, $taxonomy )
{
    return ( 'teacher-qualification' === $taxonomy )
        ? new WP_Error( 'term_addition_blocked', __( 'You cannot add terms to this taxonomy' ) )
        : $term;
}, 0, 2 );
add_action( 'pre_insert_term', function ( $term, $taxonomy )
{
    return ( 'teacher-rural' === $taxonomy )
        ? new WP_Error( 'term_addition_blocked', __( 'You cannot add terms to this taxonomy' ) )
        : $term;
}, 0, 2 );
//
//
//

 
// GP blog customiser thingy
add_filter( 'generate_show_categories','generate_remove_cats' );
function generate_remove_cats()
{
    return false;
} 
 
// check all boxes
function init_be_javascripts() {
    if (is_admin()) {
        wp_register_script('extra_be-script', get_template_directory_uri() . '/js/be-scripts.js', 'jquery', 0.1, true );
        wp_enqueue_script('extra_be-script');
    }
}    
add_action('init', 'init_be_javascripts'); 
 
// add current user role to body css
 add_filter( 'body_class', function( $classes )
{
    if( is_user_logged_in() )
    {       
        $classes = array_merge( 
            (array) $classes,
            array_map( 
                function( $class )
                {
                    return 'role-' . $class;    // Here we prepend the 'role-' string
                }, 
                (array) wp_get_current_user()->roles 
            )
        );
    }
    return $classes;
} );

// Add logged out to body class
add_filter('body_class','my_class_names');
function my_class_names($classes) {
    if (! ( is_user_logged_in() ) ) {
        $classes[] = 'logged-out';
    }
    return $classes;
}

// remove comment rss
function remove_comment_feeds( $for_comments ){
    if( $for_comments ){
        remove_action( 'do_feed_rss2', 'do_feed_rss2', 10, 1 );
        remove_action( 'do_feed_atom', 'do_feed_atom', 10, 1 );
    }
}
add_action( 'do_feed_rss2', 'remove_comment_feeds', 9, 1 );
add_action( 'do_feed_atom', 'remove_comment_feeds', 9, 1 );

//order home posts by modified
function order_home_asc($query) {
  if ($query->is_home() && $query->is_main_query()) {
    $query->set('orderby', 'modified');
	$query->set('order', 'DESC');
	$query->set( 'post__not_in', array( 889, 738, 1008, 808) );
	$query->set('post_status', 'future,publish');	
  }
}
add_action('pre_get_posts', 'order_home_asc');

//order archive posts by date
function order_archive_asc($query) {
  if ($query->is_archive() && $query->is_main_query()) {
    $query->set('orderby', 'modified');
	$query->set('order', 'DESC');
	$query->set('post_status', 'future,publish');
	$query->set( 'post__not_in', array( 889, 738, 1008, 808) );	
  }
}
add_action('pre_get_posts', 'order_archive_asc');

// exclude post from archives
add_action( 'pre_get_posts', 'remove_posts_from_archives' );
function remove_posts_from_archives( $query ) {
    if( $query->is_main_query() && $query->is_archive() ) {
        $query->set( 'post__not_in', array( 889, 738, 1008, 808) );
    }
}

//order taxonomies posts by date
function order_tax_asc($query) {
  if ($query->is_tax() && $query->is_main_query()) {
    $query->set('orderby', 'date');
	$query->set('order', 'ASC');
	$query->set( 'post__not_in', array( 889, 738, 1008, 808) );
	$query->set('post_status', 'future,publish');		
  }
}
add_action('pre_get_posts', 'order_tax_asc');

//order search posts by date
function order_search_asc($query) {
  if ($query->is_search() && $query->is_main_query()) {
    $query->set('orderby', 'date');
	$query->set('order', 'DESC');
	$query->set( 'post__not_in', array( 889, 738, 1008, 808) );
	$query->set('post_status', 'future,publish');		
  }
}
add_action('pre_get_posts', 'order_search_asc');

//order archive-teacher posts by date
function order_teacher_asc($query) {
  if ($query->is_post_type_archive('teacher') && $query->is_main_query()) {
    $query->set('orderby', 'modified');
	$query->set('order', 'DESC');
	$query->set( 'post__not_in', array( 889, 738, 1008, 808) );
	$query->set('post_status', 'future,publish');		
  }
}
add_action('pre_get_posts', 'order_teacher_asc');

//order taxonomies posts by date
function order_teachertax($query) {
  if ($query->is_tax() && $query->is_main_query()) {
    $query->set('orderby', 'modified');
	$query->set('order', 'DESC');
	$query->set( 'post__not_in', array( 889, 738, 1008, 808) );
	$query->set('post_status', 'publish');		
  }
}
add_action('pre_get_posts', 'order_teachertax');

//order archive-ea posts by modified date
function order_ea_asc($query) {
  if ($query->is_post_type_archive('education-assistant') && $query->is_main_query()) {
    $query->set('orderby', 'modified');
	$query->set('order', 'DESC');
	$query->set( 'post__not_in', array( 889, 738, 1008, 808) );
	$query->set('post_status', 'future,publish');		
  }
}
add_action('pre_get_posts', 'order_ea_asc');


// child cat
if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
    function post_is_in_descendant_category( $cats, $_post = null ) {
        foreach ( (array) $cats as $cat ) {
            // get_term_children() accepts integer ID only
            $descendants = get_term_children( (int) $cat, 'category' );
            if ( $descendants && in_category( $descendants, $_post ) )
                return true;
        }
        return false;
    }
}

/******************************************* Template for comments and pingbacks. */

if ( ! function_exists( 'generate_comment' ) ) :
function generate_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	$args['avatar_size'] = apply_filters( 'generate_comment_avatar_size', 50 );

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'generatepress' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'generatepress' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				<div class="comment-author-info">
					<div class="comment-author vcard">
<?php if ($comment->user_id) {
$user=get_userdata($comment->user_id);
echo $user->user_firstname; 
echo "&nbsp;";
echo $user->user_lastname;
} else { comment_author_link(); } ?>			 						 
					</div><!-- .comment-author -->

					<div class="entry-meta comment-metadata">
							<time datetime="<?php comment_time( 'c' ); ?>">
								<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'generatepress' ), get_comment_date(), get_comment_time() ); ?>
							</time>
						<?php
						comment_reply_link( array_merge( $args, array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<span class="reply">| ',
							'after'     => '</span>',
						) ) );
						?>
					</div><!-- .comment-metadata -->
				</div><!-- .comment-author-info -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'generatepress' ); ?></p>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for generate_comment()


// profile builder recover password page
function change_lost_password_link( $LostPassURL){
    $LostPassURL = home_url('/recover-password');
    return $LostPassURL;
}
add_filter('wppb_pre_login_url_filter','change_lost_password_link', 2);

// hide logo
function my_custom_login_logo() {
    echo '<style type="text/css">
    h1 a {background-image:url(https://perthreliefteachers.com.au/wp-content/uploads/cropped-swan-logo2.png) !important; margin:0 auto;}
    </style>';
}
add_filter( 'login_head', 'my_custom_login_logo' );

// list all cats
// List categories with descriptions

// Create a modified output of wp_list_categories where the categories description
// is added inside a span tag within the link like so:
//<li><a title="Category Description" href="#">Category Name<span>Category Description</span></a></li>

function list_cats_with_desc() {
$base = wp_list_categories('echo=0&hide_empty=0&exclude=99999999&orderby=slug&order=asc&show_count=0&title_li='); 
// wp_list_categories adds a "cat-item-[category_id]" class to the <li> so let's make use of that!
// Shouldn't really use regexp to parse HTML, but oh well.
// (for the curious, here's why: http://stackoverflow.com/questions/1732348/regex-match-open-tags-except-xhtml-self-contained-tags/1732454#1732454 )

$get_cat_id = '/cat-item-[0-9]+/';
preg_match_all($get_cat_id, $base, $cat_id); 

$inject_desc = array();
$i = 0;
foreach($cat_id[0] as $id) {
$id = trim($id,'cat-item-');
$id = trim($id,'"');
$desc = trim(strip_tags(category_description($id)),"\n");   

if($desc=="") $desc = " ";
$inject_desc[$i] = '</a><br /><span class="cat-desc">' . $desc . '</span>';
$i++;
}
$base_arr = explode("\n", $base);
$base_i = 0;
foreach($inject_desc as $desc) { 
while(strpos($base_arr[$base_i], "</a>") === false) {
$base_i++;
} 
$base_arr[$base_i] = str_replace("</a>", $desc, $base_arr[$base_i]);
$base_i++;
}
$base = implode("\n", $base_arr);
echo $base;
}

// no content needed
add_filter('pre_post_content', 'wpse28021_mask_empty');
function wpse28021_mask_empty($value)
{
    if ( empty($value) ) {
        return ' ';
    }
    return $value;
}

add_filter('wp_insert_post_data', 'wpse28021_unmask_empty');
function wpse28021_unmask_empty($data)
{
    if ( ' ' == $data['post_content'] ) {
        $data['post_content'] = '';
    }
    return $data;
}

// next previous links
if ( ! function_exists( 'generate_paging_nav' ) ) :
	function generate_paging_nav() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => apply_filters( 'generate_pagination_mid_size', 1 ),
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => __( ' &laquo; ', 'generatepress' ),
			'next_text' => __( ' &raquo; ', 'generatepress' ),
		) );

		if ( $links ) :

			echo $links; 

		endif;
	}
endif;

//CPTs
//CPTs
add_action( 'init', 'cptui_register_my_cpts' );
function cptui_register_my_cpts() {
	$labels = array(
		"name" => __( 'Teacher', '' ),
		"singular_name" => __( 'Teacher', '' ),
		);

	$args = array(
		"label" => __( 'Teacher', '' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,

		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "teacher", "with_front" => true ),
		"query_var" => true,
				
		"supports" => array( "title", "editor", "custom-fields" ),		
		"taxonomies" => array( "teacher-lga", "teacher-la", "teacher-avail", "teacher-years", "teacher-level", "teacher-statearea", "teacher-qualification", "teacher-rural" ),		
	);
	register_post_type( "teacher", $args );	

	$labels = array(
		"name" => __( 'Education Assistants', '' ),
		"singular_name" => __( 'Education Assistant', '' ),
		);

	$args = array(
		"label" => __( 'Education Assistants', '' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,

		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "education-assistant", "with_front" => true ),
		"query_var" => true,
				
		"supports" => array( "title", "editor", "thumbnail","custom-fields"  ),		
		"taxonomies" => array( "ea-lga", "ea-avail", "ea-days", "ea-qual", "ea-experience", "ea-rural-remote" ),				
	);
	register_post_type( "education-assistant", $args );
	
	$labels = array(
		"name" => __( 'Information', '' ),
		"singular_name" => __( 'Information', '' ),
		);

	$args = array(
		"label" => __( 'Information', '' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,

		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "info", "with_front" => true ),
		"query_var" => true,
				
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields", "comments", "revisions", "author" ),		
		"taxonomies" => array( "resources", "policy", "news" ),		
	);
	register_post_type( "info", $args );	
	
	$labels = array(
		"name" => __( 'WA Gov Jobs', '' ),
		"singular_name" => __( 'WA Gov Jobs', '' ),
		);

	$args = array(
		"label" => __( 'WA Gov Jobs', '' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,

		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "wagovjobs", "with_front" => true ),
		"query_var" => true,
				
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields", "comments", "revisions", "author" ),		
		"taxonomies" => array( "resources", "policy", "news" ),		
	);
	register_post_type( "wagovjobs", $args );		
	

// End of cptui_register_my_cpts()
}


// CTs
add_action( 'init', 'cptui_register_my_taxes' );
function cptui_register_my_taxes() {

	$labels = array(
		"name" => __( 'Teacher resume 1', '' ),
		"singular_name" => __( 'Teacher resume 1', '' ),
		);

	$args = array(
		"label" => __( 'Teacher resume 1', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "teacher resume 1",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'teacher-resume1', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "teacher-resume1", array( "teacher-resume" ), $args );


	$labels = array(
		"name" => __( 'LGA', '' ),
		"singular_name" => __( 'Local Area', '' ),
		);

	$args = array(
		"label" => __( 'LGA', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "LGA",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'teacher-lga', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "teacher-lga", array( "teacher" ), $args );

	$labels = array(
		"name" => __( 'LA', '' ),
		"singular_name" => __( 'Learning Areas', '' ),
		);

	$args = array(
		"label" => __( 'LA', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "LA",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'teacher-la', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "teacher-la", array( "teacher" ), $args );

	$labels = array(
		"name" => __( 'Days', '' ),
		"singular_name" => __( 'Availability', '' ),
		);

	$args = array(
		"label" => __( 'Days', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Days",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'teacher-avail', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "teacher-avail", array( "teacher" ), $args );

	$labels = array(
		"name" => __( 'Years', '' ),
		"singular_name" => __( 'Years', '' ),
		);

	$args = array(
		"label" => __( 'Years', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Years",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'teacher-years', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "teacher-years", array( "teacher" ), $args );

	$labels = array(
		"name" => __( 'Teacher Level', '' ),
		"singular_name" => __( 'Level', '' ),
		);

	$args = array(
		"label" => __( 'Teacher Level', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Teacher Level",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'teacher-level', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "teacher-level", array( "teacher" ), $args );

	$labels = array(
		"name" => __( 'Metro or Rural', '' ),
		"singular_name" => __( 'Metro/Rural', '' ),
		);

	$args = array(
		"label" => __( 'Metro or Rural', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Metro or Rural",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'teacher-statearea', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "teacher-statearea", array( "teacher" ), $args );

	$labels = array(
		"name" => __( 'Teacher Qualification', '' ),
		"singular_name" => __( 'Qualification', '' ),
		);

	$args = array(
		"label" => __( 'Teacher Qualification', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Teacher Qualification",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'teacher-qualification', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "teacher-qualification", array( "teacher" ), $args );

	$labels = array(
		"name" => __( 'Rural Areas', '' ),
		"singular_name" => __( 'Rural Areas', '' ),
		);

	$args = array(
		"label" => __( 'Rural Areas', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Rural Areas",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'teacher-rural', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "teacher-rural", array( "teacher" ), $args );

	$labels = array(
		"name" => __( 'EA Days', '' ),
		"singular_name" => __( 'EA Days', '' ),
		);

	$args = array(
		"label" => __( 'EA Days', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "EA Days",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'ea-days', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "ea-days", array( "education-assistant" ), $args );

	$labels = array(
		"name" => __( 'EA Qualification', '' ),
		"singular_name" => __( 'EA Qualification', '' ),
		);

	$args = array(
		"label" => __( 'EA Qualification', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "EA Qualification",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'ea-qual', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "ea-qual", array( "education-assistant" ), $args );

	$labels = array(
		"name" => __( 'EA Local Area', '' ),
		"singular_name" => __( 'EA Local Area', '' ),
		);

	$args = array(
		"label" => __( 'EA Local Area', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "EA Local Area",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'ea-lga', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "ea-lga", array( "education-assistant" ), $args );

	$labels = array(
		"name" => __( 'EA Experience', '' ),
		"singular_name" => __( 'EA Experience', '' ),
		);

	$args = array(
		"label" => __( 'EA Experience', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "EA Role",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'ea-experience', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "ea-experience", array( "education-assistant" ), $args );

	$labels = array(
		"name" => __( 'EA Rural Remote', '' ),
		"singular_name" => __( 'EA Rural Remote', '' ),
		);

	$args = array(
		"label" => __( 'EA Rural Remote', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "EA Rural Remote",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'ea-rural-remote', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "ea-rural-remote", array( "education-assistant" ), $args );

	$labels = array(
		"name" => __( 'EA Days', '' ),
		"singular_name" => __( 'EA Days', '' ),
		);

	$args = array(
		"label" => __( 'EA Days', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "EA DOB",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'school-ea-days', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "school-ea-days", array( "post" ), $args );

	$labels = array(
		"name" => __( 'Teacher WWCC', '' ),
		"singular_name" => __( 'Teacher WWCC', '' ),
		);

	$args = array(
		"label" => __( 'Teacher WWCC', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Teacher WWCC",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'teacher-wwcc', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "teacher-wwcc", array( "teacher" ), $args );

	$labels = array(
		"name" => __( 'Teacher E Number', '' ),
		"singular_name" => __( 'Teacher E Number', '' ),
		);

	$args = array(
		"label" => __( 'Teacher E Number', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Teacher E Number",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'teacher-e-number', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "teacher-e-number", array( "teacher" ), $args );

	$labels = array(
		"name" => __( 'Teacher TRBWA', '' ),
		"singular_name" => __( 'Teacher TRBWA', '' ),
		);

	$args = array(
		"label" => __( 'Teacher TRBWA', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Teacher TRBWA",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'teacher-trbwa', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "teacher-trbwa", array( "teacher" ), $args );

	$labels = array(
		"name" => __( 'Teacher NPHC', '' ),
		"singular_name" => __( 'Teacher NPHC', '' ),
		);

	$args = array(
		"label" => __( 'Teacher NPHC', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Teacher NPHC",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'teacher-nphc', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "teacher-nphc", array( "teacher" ), $args );

	$labels = array(
		"name" => __( 'Teacher SCN', '' ),
		"singular_name" => __( 'Teacher SCN', '' ),
		);

	$args = array(
		"label" => __( 'Teacher SCN', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Teacher SCN",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'teacher-scn', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "teacher-scn", array( "teacher" ), $args );

	$labels = array(
		"name" => __( 'School Job Days', '' ),
		"singular_name" => __( 'School Job Days', '' ),
		);

	$args = array(
		"label" => __( 'School Job Days', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "School Job Days",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'school-job-days', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "school-job-days", array( "post" ), $args );

	$labels = array(
		"name" => __( 'School Area', '' ),
		"singular_name" => __( 'School Area', '' ),
		);

	$args = array(
		"label" => __( 'School Area', '' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "School Area",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'school-lga', 'with_front' => true ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "school-lga", array( "post" ), $args );

// End cptui_register_my_taxes()
}
