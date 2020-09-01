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


 _________________       ___       ___        ___________       ____        ____       ___________       ____________
|                 |     |   |     |   |      |           |     |    \      /    |     |           |     |            |
|______     ______|     |   |     |   |      |    _______|     |     \    /     |     |    _______|     |    ________|
       |   |            |   |     |   |      |   |             |      \  /      |     |   |             |   |
       |   |            |   |_____|   |      |   |_______      |       \/       |     |   |_______      |   |________
       |   |            |             |      |           |     |   |\      /|   |     |           |     |            |
       |   |            |    _____    |      |    _______|     |   | \____/ |   |     |    _______|     |________    |
       |   |            |   |     |   |      |   |             |   |        |   |     |   |                      |   |
       |   |            |   |     |   |      |   |_______      |   |        |   |     |   |_______       ________|   |
       |   |            |   |     |   |      |           |     |   |        |   |     |           |     |            |
       |___|            |___|     |___|      |___________|     |___|        |___|     |___________|     |____________|

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/


//////////////////////////////////////////////////////////////////////////
//// THEME OPTIONS FILE
//////////////////////////////////////////////////////////////////////////

if ( ! class_exists( 'Redux' ) ) {
    return;
}

// Options name where all data is stored
$opt_name = "breaknews";

// All the possible arguments for Redux.
// For full documentation : https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

$theme = wp_get_theme();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get( 'Name' ),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__( 'Breaknews', 'breaknews' ),
    'page_title'           => esc_html__( 'Breaknews', 'breaknews' ),

    // Custom panel template
    'templates_path'       => get_template_directory() . '/inc/redux-templates',

    'disable_tracking'     => true,

    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => false,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => "breaknews",
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    // Show the time the page took to load, etc
    'forced_dev_mode_off'  => true,
    // To focefully disable dev mode
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority'        => '61',
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => get_template_directory_uri() . '/images/milliomola-icon.png',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'breaknews_options',
    // Page slug used to denote the panel
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => false,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    //'compiler'             => true,


    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'light',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    )
);

// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
$args['admin_bar_links'][] = array(
    'id'    => 'redux-docs',
    'href'  => 'http://docs.reduxframework.com/',
    'title' => esc_html__( 'Documentation', 'breaknews' ),
);

$args['admin_bar_links'][] = array(
    //'id'    => 'redux-support',
    'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
    'title' => esc_html__( 'Support', 'breaknews' ),
);

$args['admin_bar_links'][] = array(
    'id'    => 'redux-extensions',
    'href'  => 'reduxframework.com/extensions',
    'title' => esc_html__( 'Extensions', 'breaknews' ),
);

// Social links - in the footer of the panel.
$args['share_icons'][] = array(
    'url'   => 'https://www.facebook.com/milliomola',
    'title' => 'Like us on Facebook',
    'icon'  => 'el el-facebook'
);
$args['share_icons'][] = array(
    'url'   => 'http://twitter.com/milliomola',
    'title' => 'Follow us on Twitter',
    'icon'  => 'el el-twitter'
);

Redux::setArgs( $opt_name, $args );

// END ARGUMENTS


//////////////////////////////////////////////////////////////////////////
//// THEME OPTIONS - START SECTIONS
//////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////
// GENERAL TAP
//////////////////////////////////////////////////////////////////////////
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'General', 'breaknews' ),
    'id'    => 'general-tab',
    'icon'  => 'el el-cog',
    'fields'=> array(
        array(
            'type'       => 'typography',
            'id'         => 'bn-main-font',
            'title'      => esc_html__( 'Theme Font', 'breaknews' ),
            'font-size'  => false,
            'font-style'  => false,
            'font-weight' => false,
            'line-height' => false,
            'text-align' => false,
            'color'      => false,
            'google'     => true,
            'default'    => array(
                'font-family' => 'open sans'
            )
        ),
        array(
            'type'       => 'switch',
            'id'         => 'bn-rtl-mode',
            'title'      => esc_html__( 'RTL mode', 'breaknews' ),
            'subtitle'   => esc_html__( 'Enable RTL style', 'breaknews' ),
            'on'         => esc_html__( 'on', 'breaknews' ),
            'off'        => esc_html__( 'off', 'breaknews' ),
            'default'    => false,
        ),
        array(
            'type'       => 'switch',
            'id'         => 'bn-home-sidebar',
            'title'      => esc_html__( 'Home Sidebar', 'breaknews' ),
            'subtitle'   => esc_html__( 'show or hide sidebar on homepage', 'breaknews' ),
            'on'         => esc_html__( 'on', 'breaknews' ),
            'off'        => esc_html__( 'off', 'breaknews' ),
            'default'    => true,
        ),
        array(
            'type'       => 'switch',
            'id'         => 'bn-sticky-menu',
            'title'      => esc_html__( 'Enable Sticky Menu', 'breaknews' ),
            'subtitle'   => esc_html__( 'make the nav menu fixed when scroll', 'breaknews' ),
            'on'         => esc_html__( 'on', 'breaknews' ),
            'off'        => esc_html__( 'off', 'breaknews' ),
            'default'    => false,
        ),
        array(
            'type'       => 'switch',
            'id'         => 'bn-nicescroll',
            'title'      => esc_html__( 'Use Nicescroll', 'breaknews' ),
            'on'         => esc_html__( 'on', 'breaknews' ),
            'off'        => esc_html__( 'off', 'breaknews' ),
            'default'    => false,
        ),
        array(
            'type'       => 'switch',
            'id'         => 'bn-search',
            'title'      => esc_html__( 'Enable Search', 'breaknews' ),
            'subtitle'   => esc_html__( 'show or hide search button in the nav menu', 'breaknews' ),
            'on'         => esc_html__( 'on', 'breaknews' ),
            'off'        => esc_html__( 'off', 'breaknews' ),
            'default'    => true,
        ),
        array(
            'type'       => 'switch',
            'id'         => 'bn-scroll-btn',
            'title'      => esc_html__( 'Scroll Button', 'breaknews' ),
            'subtitle'   => esc_html__( 'show "move to top" button when scroll', 'breaknews' ),
            'on'         => esc_html__( 'on', 'breaknews' ),
            'off'        => esc_html__( 'off', 'breaknews' ),
            'default'    => true,
        ),
        array(
            'type'       => 'switch',
            'id'         => 'bn-contact-btn',
            'title'      => esc_html__( 'Contact Button', 'breaknews' ),
            'subtitle'   => esc_html__( 'show "Contact Us" button', 'breaknews' ),
            'on'         => esc_html__( 'on', 'breaknews' ),
            'off'        => esc_html__( 'off', 'breaknews' ),
            'default'    => true,
        ),
        array(
            'type'       => 'text',
            'id'         => 'bn-contact-shortcode',
            'title'      => esc_html__( 'Contact7 Form Shortcode', 'breaknews' ),
            'subtitle'   => sprintf( esc_html__( 'install %1$s and create new form and get it\'s shortcode.', 'breaknews' ), '<a href="https://wordpress.org/plugins/contact-form-7/">contact form 7 Plugin</a>' ),
            'default'    => '',
        ),
        array(
            'type'       => 'switch',
            'id'         => 'bn-social-btn',
            'title'      => esc_html__( 'Social Button', 'breaknews' ),
            'subtitle'   => esc_html__( 'show or hide smart social button', 'breaknews' ),
            'on'         => esc_html__( 'on', 'breaknews' ),
            'off'        => esc_html__( 'off', 'breaknews' ),
            'default'    => true,
        ),
        array(
            'id'         => 'bn-pages-show-comments',
            'type'       => 'switch',
            'title'      => esc_html__( 'Pages Comments', 'breaknews' ),
            'subtitle'   => esc_html__( 'show comments in the pages if enabled', 'breaknews' ),
            'on'         => esc_html__( 'on', 'breaknews' ),
            'off'        => esc_html__( 'off', 'breaknews' ),
            'default'    => true,
        ),
        array(
            'type'       => 'radio',
            'id'         => 'bn-logo-type',
            'title'      => esc_html__( 'Logo Type', 'breaknews' ),
            'subtitle'   => esc_html__( 'text logo will display your blog name', 'breaknews' ),
            'options'    => array(
                '1' => esc_html__( 'Photo', 'breaknews' ),
                '2' => esc_html__( 'Text', 'breaknews' ),
            ),
            'default'    => '1',
        ),
        array(
            'type'       => 'media',
            'id'         => 'bn-main-logo',
            'title'      => esc_html__( 'main Logo', 'breaknews' ),
            'subtitle'   => esc_html__( 'you must set "logo type" to "image" to use this image', 'breaknews' ),
            'default'    => array(
                'url' => get_template_directory_uri() . '/images/breaknews-logo.png',
            ),
        ),
        array(
            'type'       => 'ace_editor',
            'mode'       => 'css',
            'id'         => 'bn-custom-css',
            'title'      => esc_html__( 'Custom Css', 'breaknews' ),
            'subtitle'   => esc_html__( 'you can easily add some css to customize any element of any page in your blog', 'breaknews' ),
            'theme'      => 'chrome',
            'default'    => ''
        ),
        array(
            'type'       => 'ace_editor',
            'mode'       => 'js',
            'id'         => 'bn-custom-js',
            'title'      => esc_html__( 'Custom Javascript', 'breaknews' ),
            'subtitle'   => esc_html__( 'you can add native javascript or jquery code', 'breaknews' ),
            'theme'      => 'chrome',
            'default'    => ''
        ),
    )
) );

//////////////////////////////////////////////////////////////////////////
// COLORS
//////////////////////////////////////////////////////////////////////////
Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Colors', 'breaknews' ),
    'id'         => 'colors-tab',
    'icon'       => 'el el-brush',
    'fields'     => array(
        array(
            'type'      => 'color',
            'id'        => 'bn-main-color',
            'title'     => esc_html__( 'Main Color', 'breaknews' ),
            'default'   => '#f46279',
            'transparent' => false,
        ),
        array(
            'type'      => 'color',
            'id'        => 'bn-main-bg',
            'title'     => esc_html__( 'Main Background', 'breaknews' ),
            'default'   => '#f3f3f3',
            'transparent' => false,
        ),
        array(
            'type'      => 'color',
            'id'        => 'bn-nav-color',
            'title'     => esc_html__( 'Nav Menu Color', 'breaknews' ),
            'default'   => '#555',
            'transparent' => false,
        ),
        array(
            'type'      => 'color',
            'id'        => 'bn-nav-bg',
            'title'     => esc_html__( 'Nav Menu BG', 'breaknews' ),
            'default'   => '#f3f3f3',
            'transparent' => false,
        ),
        array(
            'type'      => 'color',
            'id'        => 'bn-nav-hover-bg',
            'title'     => esc_html__( 'Nav Menu Hover BG', 'breaknews' ),
            'default'   => '#fafafa',
            'transparent' => false,
        ),
        array(
            'type'      => 'color',
            'id'        => 'bn-nav-border-bottom',
            'title'     => esc_html__( 'Nav Menu Border Bottom Color', 'breaknews' ),
            'default'   => '#eee',
            'transparent' => false,
        ),
        array(
            'type'      => 'color',
            'id'        => 'bn-dropdown-color',
            'title'     => esc_html__( 'Dropdown Color', 'breaknews' ),
            'default'   => '#555',
            'transparent' => false,
        ),
        array(
            'type'      => 'color',
            'id'        => 'bn-dropdown-bg',
            'title'     => esc_html__( 'Dropdown BG', 'breaknews' ),
            'default'   => '#f3f3f3',
            'transparent' => false,
        ),
        array(
            'type'      => 'color',
            'id'        => 'bn-dropdown-hover-color',
            'title'     => esc_html__( 'Dropdown Hover Color', 'breaknews' ),
            'default'   => '#555',
            'transparent' => false,
        ),
        array(
            'type'      => 'color',
            'id'        => 'bn-dropdown-hover-bg',
            'title'     => esc_html__( 'Dropdown Hover BG', 'breaknews' ),
            'default'   => '#fafafa',
            'transparent' => false,
        ),
        array(
            'type'      => 'color',
            'id'        => 'bn-dropdown-border-color',
            'title'     => esc_html__( 'Dropdown Border Color', 'breaknews' ),
            'default'   => '#eee',
            'transparent' => false,
        ),
        array(
            'type'      => 'color',
            'id'        => 'bn-nav-btn-color',
            'title'     => esc_html__( 'Navbar Buttons Color', 'breaknews' ),
            'default'   => '#777',
            'transparent' => false,
        ),
        array(
            'type'      => 'color',
            'id'        => 'bn-nav-btn-bg',
            'title'     => esc_html__( 'Navbar Buttons BG', 'breaknews' ),
            'default'   => '#eee',
            'transparent' => false,
        ),
        array(
            'type'      => 'color',
            'id'        => 'bn-nav-btn-hover-bg',
            'title'     => esc_html__( 'Navbar Buttons Hover BG', 'breaknews' ),
            'default'   => '#e5e5e5',
            'transparent' => false,
        ),
        array(
            'type'      => 'color',
            'id'        => 'bn-widget-color',
            'title'     => esc_html__( 'Widget Title Color', 'breaknews' ),
            'default'   => '#000',
            'transparent' => false,
        ),
        array(
            'type'      => 'color',
            'id'        => 'bn-widget-bg',
            'title'     => esc_html__( 'Widget Title BG', 'breaknews' ),
            'default'   => '#f3f3f3',
            'transparent' => false,
        ),
        array(
            'type'      => 'color',
            'id'        => 'bn-footer-bg',
            'title'     => esc_html__( 'Footer BG', 'breaknews' ),
            'default'   => '#1e1e1e',
            'transparent' => false,
        ),
        array(
            'type'      => 'color',
            'id'        => 'bn-footer-headings-color',
            'title'     => esc_html__( 'Footer Headings Color', 'breaknews' ),
            'default'   => '#fff',
            'transparent' => false,
        ),
        array(
            'type'      => 'color',
            'id'        => 'bn-small-footer-bg',
            'title'     => esc_html__( 'Small Footer BG', 'breaknews' ),
            'default'   => '#101010',
            'transparent' => false,
        ),
        array(
            'type'      => 'color',
            'id'        => 'bn-scroll-btn-color',
            'title'     => esc_html__( 'Scroll Button Color', 'breaknews' ),
            'default'   => '#f4b062',
            'transparent' => false,
        ),
        array(
            'type'      => 'color',
            'id'        => 'bn-contact-btn-color',
            'title'     => esc_html__( 'Contact Button Color', 'breaknews' ),
            'default'   => '#d56a6a',
            'transparent' => false,
        ),
        array(
            'type'      => 'color',
            'id'        => 'bn-social-btn-color',
            'title'     => esc_html__( 'Social Button Color', 'breaknews' ),
            'default'   => '#333',
            'transparent' => false,
        ),
    )
) );

//////////////////////////////////////////////////////////////////////////
// TOP BAR
//////////////////////////////////////////////////////////////////////////
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Top Bar', 'breaknews' ),
    'id'    => 'top-bar-tab',
    'icon'  => 'el el-credit-card',
    'fields'=> array(
        array(
            'type'       => 'switch',
            'id'         => 'bn-top-bar',
            'title'      => esc_html__( 'Show Top Bar', 'breaknews' ),
            'on'         => esc_html__( 'on', 'breaknews' ),
            'off'        => esc_html__( 'off', 'breaknews' ),
            'default'    => true,
        ),
        array(
            'type'       => 'switch',
            'id'         => 'bn-top-bar-social',
            'title'      => esc_html__( 'Top Bar Social', 'breaknews' ),
            'on'         => esc_html__( 'on', 'breaknews' ),
            'off'        => esc_html__( 'off', 'breaknews' ),
            'default'    => true,
            'required'  => array( 'bn-top-bar', 'equals', true ),
        ),
        array(
            'type'       => 'switch',
            'id'         => 'bn-top-bar-email',
            'title'      => esc_html__( 'Show Email', 'breaknews' ),
            'on'         => esc_html__( 'on', 'breaknews' ),
            'off'        => esc_html__( 'off', 'breaknews' ),
            'default'    => true,
            'required'  => array( 'bn-top-bar', 'equals', true ),
        ),
        array(
            'type'       => 'text',
            'id'         => 'bn-email',
            'title'      => esc_html__( 'Email', 'breaknews' ),
            'default'    => 'milliomola@gmail.com',
            'required'  => array( 'bn-top-bar-email', 'equals', true ),
        ),
        array(
            'type'       => 'switch',
            'id'         => 'bn-top-bar-phone',
            'title'      => esc_html__( 'Show Phone Number', 'breaknews' ),
            'on'         => esc_html__( 'on', 'breaknews' ),
            'off'        => esc_html__( 'off', 'breaknews' ),
            'default'    => true,
            'required'  => array( 'bn-top-bar', 'equals', true ),
        ),
        array(
            'type'       => 'text',
            'id'         => 'bn-phone',
            'title'      => esc_html__( 'Phone Number', 'breaknews' ),
            'default'    => '+201286834511',
            'required'  => array( 'bn-top-bar-phone', 'equals', true ),
        ),
        array(
            'type'       => 'switch',
            'id'         => 'bn-top-bar-address',
            'title'      => esc_html__( 'Show Address', 'breaknews' ),
            'default'    => false,
            'required'  => array( 'bn-top-bar', 'equals', true ),
        ),
        array(
            'type'       => 'text',
            'id'         => 'bn-address',
            'title'      => esc_html__( 'Address', 'breaknews' ),
            'default'    => 'Egypt, Cairo',
            'required'  => array( 'bn-top-bar-address', 'equals', true ),
        ),
    )
) );

//////////////////////////////////////////////////////////////////////////
// FEATURED POSTS
//////////////////////////////////////////////////////////////////////////
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Featured Posts', 'breaknews' ),
    'id'    => 'featured-posts-tab',
    'icon'       => 'el el-fire',
    'fields'     => array(
        array(
            'type'      => 'switch',
            'id'        => 'bn-featured',
            'title'     => esc_html__( 'Enable Featured Posts', 'breaknews' ),
            'on'        => esc_html__( 'on', 'breaknews' ),
            'off'       => esc_html__( 'off', 'breaknews' ),
            'default'   => true,
        ),
        array(
            'id'        => 'bn-featured-layout',
            'type'      => 'image_select',
            'title'     => esc_html__( 'Featured Layout', 'breaknews' ),
            'options'   => array(
                "slider"  => array (
                     'alt'  => 'breaknews',
                     'img'  => get_template_directory_uri() . '/images/theme-options/featured-layout-1.png',
                ),
                "slider-two-small"  => array (
                     'alt'  => 'breaknews',
                     'img'  => get_template_directory_uri() . '/images/theme-options/featured-layout-2.png',
                ),
                "slider-four-small"  => array (
                     'alt'  => 'breaknews',
                     'img'  => get_template_directory_uri() . '/images/theme-options/featured-layout-3.png',
                ),
                "full-two-small"  => array (
                     'alt'  => 'breaknews',
                     'img'  => get_template_directory_uri() . '/images/theme-options/featured-layout-4.png',
                ),
                "three-big"  => array (
                     'alt'  => 'breaknews',
                     'img'  => get_template_directory_uri() . '/images/theme-options/featured-layout-5.png',
                ),
            ),
            'default'   => 'full-two-small',
        ),
        array(
            'id'        => 'bn-featured-query-type',
            'type'      => 'radio',
            'title'     => esc_html__( 'Query Type', 'breaknews' ),
            'options'   => array(
                'recent' => esc_html__( 'Recent Posts', 'breaknews' ),
                'popular' => esc_html__( 'Popular Posts', 'breaknews' ),
                'trending' => esc_html__( 'Trending Posts', 'breaknews' ),
                'random' => esc_html__( 'Random Posts', 'breaknews' ),
            ),
            'default'   => 'recent',
        ),
        array(
            'id'        => 'bn-featured-hover-effect',
            'type'      => 'radio',
            'title'     => esc_html__( 'Image Hover Effect', 'breaknews' ),
            'options'      => array(
                '1' => esc_html__( 'Image Zoom', 'breaknews' ),
                '2' => esc_html__( 'Image Light', 'breaknews' ),
                '3' => esc_html__( 'Image Dark', 'breaknews' ),
            ),
            'default'   => 1,
        ),
        array(
            'id'        => 'bn-featured-excluded-formats',
            'type'      => 'checkbox',
            'title'     => esc_html__( 'Featured Excluded Formats', 'breaknews' ),
            'subtitle'  => esc_html__( 'choose the post formats that you don\'t want to display in the featured area', 'breaknews' ),
            'options'      => array(
                '1' => esc_html__( 'Video', 'breaknews' ),
                '2' => esc_html__( 'Audio', 'breaknews' ),
                '3' => esc_html__( 'Gallery', 'breaknews' ),
                '4' => esc_html__( 'Image', 'breaknews' ),
            ),
            'default'   => array(
                '1' => '0',
                '2' => '0',
                '3' => '0',
                '4' => '0',
            ),
        ),
        array(
            'id'       => 'bn-featured-categories',
            'type'     => 'text',
            'title'    => esc_html__( 'Featured Posts Categories', 'breaknews' ),
            'subtitle'  => esc_html__( 'specify some categories to be displayed in the featured area, enter the categories IDs separated by comma, if this field is empty, all categories will be available in the featured area', 'breaknews' ),
            'default'  => '',
        ),
        array(
            'id'       => 'bn-featured-count',
            'type'     => 'text',
            'validate'     => 'numeric',
            'title'    => esc_html__( 'Featured Slides Count', 'breaknews' ),
            'subtitle'  => esc_html__( 'specify a number of posts to be displayd in the slider in the featured area, this works only if you choose a layout that have a slider', 'breaknews' ),
            'default' => '5'
        ),
    )
) );

//////////////////////////////////////////////////////////////////////////
// POSTS TAB
//////////////////////////////////////////////////////////////////////////
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Posts Style', 'breaknews' ),
    'id'    => 'posts-style-tab',
    'icon'  => 'el el-picture',
    'fields'    => array(
        array(
            'id'       => 'bn-post-meta-author',
            'type'     => 'switch',
            'title'    => esc_html__( 'Post Meta - Author', 'breaknews' ),
            'on'       => esc_html__( 'on', 'breaknews' ),
            'off'      => esc_html__( 'off', 'breaknews' ),
            'default'  => true, 
        ),
        array(
            'id'       => 'bn-post-meta-date',
            'type'     => 'switch',
            'title'    => esc_html__( 'Post Meta - Date', 'breaknews' ),
            'on'       => esc_html__( 'on', 'breaknews' ),
            'off'      => esc_html__( 'off', 'breaknews' ),
            'default'  => true, 
        ),
        array(
            'id'       => 'bn-post-meta-comments',
            'type'     => 'switch',
            'title'    => esc_html__( 'Post Meta - Comments', 'breaknews' ),
            'on'       => esc_html__( 'on', 'breaknews' ),
            'off'      => esc_html__( 'off', 'breaknews' ),
            'default'  => true, 
        ),
        array(
            'id'       => 'bn-post-meta-tags',
            'type'     => 'switch',
            'title'    => esc_html__( 'Post Meta - Tags', 'breaknews' ),
            'on'       => esc_html__( 'on', 'breaknews' ),
            'off'      => esc_html__( 'off', 'breaknews' ),
            'default'  => true, 
        ),
        array(
            'id'       => 'bn-post-meta-cat',
            'type'     => 'switch',
            'title'    => esc_html__( 'Post Categories', 'breaknews' ),
            'on'       => esc_html__( 'on', 'breaknews' ),
            'off'      => esc_html__( 'off', 'breaknews' ),
            'default'  => true, 
        ),
        array(
            'id'       => 'bn-cat-style',
            'type'     => 'radio',
            'title'    => esc_html__( 'Category Position', 'breaknews' ),
            'options'  => array(
                'on'    => esc_html__( 'On Image', 'breaknews' ),
                'under' => esc_html__( 'Under Image', 'breaknews' ),
            ),
            'default'  => 'on',
            'required' => array('bn-post-meta-cat', 'equals', true),
        ),
        array(
            'id'       => 'bn-home-posts-layout',
            'type'     => 'image_select',
            'title'     => esc_html__( 'Home Posts Layout', 'breaknews' ),
            'options'  => array(
                "grid" => array (
                     'alt'  => 'breaknews',
                     'img'  => get_template_directory_uri() . '/images/theme-options/posts-layout-1.png',
                ),
                "grid-three" => array (
                     'alt'  => 'breaknews',
                     'img'  => get_template_directory_uri() . '/images/theme-options/posts-layout-2.png',
                ),
                "full" => array (
                     'alt'  => 'breaknews',
                     'img'  => get_template_directory_uri() . '/images/theme-options/posts-layout-3.png',
                ),
                "list" => array (
                     'alt'  => 'breaknews',
                     'img'  => get_template_directory_uri() . '/images/theme-options/posts-layout-4.png',
                ),
            ),
            'default'  => 'grid'
        ),
        array(
            'id'       => 'bn-home-posts-count',
            'type'     => 'text',
            'title'    => esc_html__( 'Home Posts Count', 'breaknews' ),
            'validate' => 'numeric',
            'default'  => '10'
        ),
        array(
            'id'         => 'bn-home-pagination',
            'type'       => 'select',
            'title'      => esc_html__( 'Home Pagination Style', 'breaknews' ),
            'options'    => array(
                '1'    => esc_html__( 'Numbers', 'breaknews' ),
                '2'    => esc_html__( 'Next / Prev', 'breaknews' ),
            ),
            'default'    => '1'
        ),
        array(
            'id'       => 'bn-archive-posts-layout',
            'type'     => 'image_select',
            'title'     => esc_html__( 'Archive Posts Layout', 'breaknews' ),
            'options'  => array(
                "grid" => array (
                     'alt'  => 'breaknews',
                     'img'  => get_template_directory_uri() . '/images/theme-options/posts-layout-1.png',
                ),
                "grid-three" => array (
                     'alt'  => 'breaknews',
                     'img'  => get_template_directory_uri() . '/images/theme-options/posts-layout-2.png',
                ),
                "full" => array (
                     'alt'  => 'breaknews',
                     'img'  => get_template_directory_uri() . '/images/theme-options/posts-layout-3.png',
                ),
                "list" => array (
                     'alt'  => 'breaknews',
                     'img'  => get_template_directory_uri() . '/images/theme-options/posts-layout-4.png',
                ),
            ),
            'default'  => 'grid',
        ),
        array(
            'id'         => 'bn-archive-pagination',
            'type'       => 'select',
            'title'      => esc_html__( 'Archive Pagination Style', 'breaknews' ),
            'options'    => array(
                '1'    => esc_html__( 'Numbers', 'breaknews' ),
                '2'    => esc_html__( 'Next / Prev', 'breaknews' ),
            ),
            'default'    => '1',
        ),
        array(
            'id'       => 'bn-search-posts-layout',
            'type'     => 'image_select',
            'title'     => esc_html__( 'Search Posts Layout', 'breaknews' ),
            'options'  => array(
                "grid" => array (
                     'alt'  => 'breaknews',
                     'img'  => get_template_directory_uri() . '/images/theme-options/posts-layout-1.png',
                ),
                "grid-three" => array (
                     'alt'  => 'breaknews',
                     'img'  => get_template_directory_uri() . '/images/theme-options/posts-layout-2.png',
                ),
                "full" => array (
                     'alt'  => 'breaknews',
                     'img'  => get_template_directory_uri() . '/images/theme-options/posts-layout-3.png',
                ),
                "list" => array (
                     'alt'  => 'breaknews',
                     'img'  => get_template_directory_uri() . '/images/theme-options/posts-layout-4.png',
                ),
            ),
            'default'  => 'grid',
        ),
        array(
            'id'         => 'bn-search-pagination',
            'type'       => 'select',
            'title'      => esc_html__( 'Search Pagination Style', 'breaknews' ),
            'options'    => array(
                '1'    => esc_html__( 'Numbers', 'breaknews' ),
                '2'    => esc_html__( 'Next / Prev', 'breaknews' ),
            ),
            'default'    => '1',
        ),
    )
) );

//////////////////////////////////////////////////////////////////////////
// SINGLE POST
//////////////////////////////////////////////////////////////////////////
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Single Post', 'breaknews' ),
    'id'    => 'single-post-tab',
    'icon'  => 'el el-website',
    'fields'    => array(
        array(
            'type'     => 'switch',
            'id'       => 'bn-single-sidebar',
            'title'    => esc_html__( 'Sidebar', 'breaknews' ),
            'subtitle' => esc_html__( 'show or hide sidebar on the single page', 'breaknews' ),
            'on'       => esc_html__( 'on', 'breaknews' ),
            'off'      => esc_html__( 'off', 'breaknews' ),
            'default'  => true,
        ),
        array(
            'id'       => 'bn-post-tags',
            'type'     => 'switch',
            'title'    => esc_html__( 'Post Tags', 'breaknews' ),
            'subtitle' => esc_html__( 'show or hide post tags if have tags', 'breaknews' ),
            'on'       => esc_html__( 'on', 'breaknews' ),
            'off'      => esc_html__( 'off', 'breaknews' ),
            'default'  => true,
        ),
        array(
            'id'       => 'bn-post-share-btns',
            'type'     => 'switch',
            'title'    => esc_html__( 'Share Buttons', 'breaknews' ),
            'subtitle' => esc_html__( 'show or hide social media share buttons', 'breaknews' ),
            'on'       => esc_html__( 'on', 'breaknews' ),
            'off'      => esc_html__( 'off', 'breaknews' ),
            'default'  => true,
        ),
        array(
            'id'       => 'bn-post-author-box',
            'type'     => 'switch',
            'title'    => esc_html__( 'Post Author Info', 'breaknews' ),
            'subtitle' => esc_html__( 'show or hide post author box', 'breaknews' ),
            'on'       => esc_html__( 'on', 'breaknews' ),
            'off'      => esc_html__( 'off', 'breaknews' ),
            'default'  => true,
        ),
        array(
            'id'       => 'bn-post-comments',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Comments', 'breaknews' ),
            'on'       => esc_html__( 'on', 'breaknews' ),
            'off'      => esc_html__( 'off', 'breaknews' ),
            'default'  => true,
        ),
        array(
            'id'       => 'bn-related-posts',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Related Posts', 'breaknews' ),
            'on'       => esc_html__( 'on', 'breaknews' ),
            'off'      => esc_html__( 'off', 'breaknews' ),
            'default'  => true,
        ),
        array(
            'id'       => 'bn-related-posts-in',
            'type'     => 'select',
            'title'    => esc_html__( 'Related Posts In', 'breaknews' ),
            'subtitle' => esc_html__( 'choose to display related posts depending on categories or tags', 'breaknews' ),
            'options'      => array(
                '1' => esc_html__( 'same categories', 'breaknews' ),
                '2' => esc_html__( 'same tags', 'breaknews' ),
            ),
            'default'  => '1'
        ),
        array(
            'id'       => 'bn-related-posts-order',
            'type'     => 'select',
            'title'    => esc_html__( 'Related Posts Order', 'breaknews' ),
            'options'      => array(
                '1' => esc_html__( 'date', 'breaknews' ),
                '2' => esc_html__( 'random', 'breaknews' ),
            ),
            'default'  => '1'
        ),
    )
) );

//////////////////////////////////////////////////////////////////////////
// FOOTER TAB
//////////////////////////////////////////////////////////////////////////
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Footer', 'breaknews' ),
    'id'    => 'footer-tab',
    'icon'  => 'el el-credit-card',
    'fields'    => array(
        array(
            'id'       => 'bn-show-small-footer',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show small footer', 'breaknews' ),
            'on'       => esc_html__( 'on', 'breaknews' ),
            'off'      => esc_html__( 'off', 'breaknews' ),
            'default'  => true,
        ),
        array(
            'id'       => 'bn-show-footer-menu',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show footer menu', 'breaknews' ),
            'on'       => esc_html__( 'on', 'breaknews' ),
            'off'      => esc_html__( 'off', 'breaknews' ),
            'default'  => true,
        ),
        array(
            'id'       => 'bn-copyright',
            'type'     => 'text',
            'subtitle' => esc_html__( 'You may need this &copy;', 'breaknews' ),
            'title'    => esc_html__( 'Copyright text', 'breaknews' ),
            'default'  => ''
        ),
    )
) );

//////////////////////////////////////////////////////////////////////////
// SOCIAL LINKS TAB
//////////////////////////////////////////////////////////////////////////
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Social Links', 'breaknews' ),
    'id'    => 'social-links-tab',
    'icon'  => 'el el-share-alt',
    'fields'     => array(
        array(
            'id'    => 'bn-facebook-link',
            'type'  => 'text',
            'title' => esc_html__( 'Facebook', 'breaknews' ),
            'placeholder' => esc_html__( 'Facebook url', 'breaknews' ),
            'validate' => 'url',
            'default'  => 'http://www.facebook.com/'
        ),
        array(
            'id'    => 'bn-twitter-link',
            'type'  => 'text',
            'title' => esc_html__( 'Twitter', 'breaknews' ),
            'placeholder' => esc_html__( 'Twitter url', 'breaknews' ),
            'validate' => 'url',
            'default'  => 'http://www.twitter.com/'
        ),
        array(
            'id'    => 'bn-google-plus-link',
            'type'  => 'text',
            'title' => esc_html__( 'Google+', 'breaknews' ),
            'placeholder' => esc_html__( 'Google+ url', 'breaknews' ),
            'validate' => 'url',
            'default'  => 'http://plus.google.com/'
        ),
        array(
            'id'    => 'bn-linked-in-link',
            'type'  => 'text',
            'title' => esc_html__( 'LinkedIn', 'breaknews' ),
            'placeholder' => esc_html__( 'LinkedIn url', 'breaknews' ),
            'validate' => 'url',
            'default'  => ''
        ),
        array(
            'id'    => 'bn-pinterest-link',
            'type'  => 'text',
            'title' => esc_html__( 'Pinterest', 'breaknews' ),
            'placeholder' => esc_html__( 'Pinterest url', 'breaknews' ),
            'validate' => 'url',
            'default'  => 'http://www.pinterest.com/'
        ),
        array(
            'id'    => 'bn-instagram-link',
            'type'  => 'text',
            'title' => esc_html__( 'Instagram', 'breaknews' ),
            'placeholder' => esc_html__( 'Instagram url', 'breaknews' ),
            'validate' => 'url',
            'default'  => 'http://www.instagram.com/'
        ),
        array(
            'id'    => 'bn-tumblr-link',
            'type'  => 'text',
            'title' => esc_html__( 'Tumblr', 'breaknews' ),
            'placeholder' => esc_html__( 'Tumblr url', 'breaknews' ),
            'validate' => 'url',
            'default'  => ''
        ),
        array(
            'id'    => 'bn-youtube-link',
            'type'  => 'text',
            'title' => esc_html__( 'Youtube', 'breaknews' ),
            'placeholder' => esc_html__( 'Youtube url', 'breaknews' ),
            'validate' => 'url',
            'default'  => ''
        ),
        array(
            'id'    => 'bn-vimeo-link',
            'type'  => 'text',
            'title' => esc_html__( 'Vimeo', 'breaknews' ),
            'placeholder' => esc_html__( 'Vimeo url', 'breaknews' ),
            'validate' => 'url',
            'default'  => ''
        ),
        array(
            'id'    => 'bn-soundcloud-link',
            'type'  => 'text',
            'title' => esc_html__( 'Soundcloud', 'breaknews' ),
            'placeholder' => esc_html__( 'Soundcloud url', 'breaknews' ),
            'validate' => 'url',
            'default'  => ''
        ),
        array(
            'id'    => 'bn-dribbble-link',
            'type'  => 'text',
            'title' => esc_html__( 'Dribbble', 'breaknews' ),
            'placeholder' => esc_html__( 'Dribbble url', 'breaknews' ),
            'validate' => 'url',
            'default'  => ''
        ),
        array(
            'id'    => 'bn-reddit-link',
            'type'  => 'text',
            'title' => esc_html__( 'Reddit', 'breaknews' ),
            'placeholder' => esc_html__( 'Reddit url', 'breaknews' ),
            'validate' => 'url',
            'default'  => ''
        ),
        array(
            'id'    => 'bn-rss-link',
            'type'  => 'text',
            'title' => esc_html__( 'RSS', 'breaknews' ),
            'placeholder' => esc_html__( 'RSS url', 'breaknews' ),
            'validate' => 'url',
            'default'  => ''
        ),
    )
) );

//////////////////////////////////////////////////////////////////////////
//POST SHARING TAB
//////////////////////////////////////////////////////////////////////////
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Sharing', 'breaknews' ),
    'id'    => 'sharing-tab',
    'desc' => esc_html__( 'more sharing methods coming soon ..', 'breaknews' ),
    'icon'  => 'el el-share',
    'fields'     => array(
        array(
            'id'       => 'bn-sharing-facebook-btn',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show FaceBook Share button', 'breaknews' ),
            'on'       => esc_html__( 'on', 'breaknews' ),
            'off'      => esc_html__( 'off', 'breaknews' ),
            'default'  => true,
        ),
        array(
            'id'       => 'bn-sharing-twitter-btn',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Twitter Share Button', 'breaknews' ),
            'on'       => esc_html__( 'on', 'breaknews' ),
            'off'      => esc_html__( 'off', 'breaknews' ),
            'default'  => true,
        ),
        array(
            'id'       => 'bn-sharing-google-plus-btn',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Google+ Share button', 'breaknews' ),
            'on'       => esc_html__( 'on', 'breaknews' ),
            'off'      => esc_html__( 'off', 'breaknews' ),
            'default'  => true,
        ),
        array(
            'id'       => 'bn-sharing-pinterest-btn',
            'type'     => 'switch',
            'title'    => esc_html__( 'Show Pinterest Share button', 'breaknews' ),
            'on'       => esc_html__( 'on', 'breaknews' ),
            'off'      => esc_html__( 'off', 'breaknews' ),
            'default'  => true,
        ),
    )
) );

// END SECTIONS
