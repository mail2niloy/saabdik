<?php

//////////////////////////////////////////////////////////////////////////
//// CUSTOM CSS & JS
//////////////////////////////////////////////////////////////////////////

function breaknews_custom_css() {

	global $breaknews;

	// Colors
    $main_color                   = $breaknews['bn-main-color'];
    $main_background              = $breaknews['bn-main-bg'];
    $nav_color                    = $breaknews['bn-nav-color'];
    $nav_background               = $breaknews['bn-nav-bg'];
    $nav_hover_background         = $breaknews['bn-nav-hover-bg'];
    $nav_border_bottom_color      = $breaknews['bn-nav-border-bottom'];
    $dropdown_color               = $breaknews['bn-dropdown-color'];
    $dropdown_background          = $breaknews['bn-dropdown-bg'];
    $dropdown_hover_color         = $breaknews['bn-dropdown-hover-color'];
    $dropdown_hover_background    = $breaknews['bn-dropdown-hover-bg'];
    $dropdown_border_color        = $breaknews['bn-dropdown-border-color'];
    $nav_buttons_color            = $breaknews['bn-nav-btn-color'];
    $nav_buttons_background       = $breaknews['bn-nav-btn-bg'];
    $nav_buttons_hover_background = $breaknews['bn-nav-btn-hover-bg'];
    $widget_title_color           = $breaknews['bn-widget-color'];
    $widget_title_background      = $breaknews['bn-widget-bg'];
    $footer_background            = $breaknews['bn-footer-bg'];
    $footer_headings_color        = $breaknews['bn-footer-headings-color'];
    $small_footer_background      = $breaknews['bn-small-footer-bg'];
    $scroll_btn_color             = $breaknews['bn-scroll-btn-color'];
    $social_btn_color             = $breaknews['bn-social-btn-color'];
    $contact_btn_color            = $breaknews['bn-contact-btn-color'];


    $custom_css = "
    	a, .top-address span, .top-email span, .top-phone span, .top-social a, .post-entry ul li:before, #respond h3 small a,
    	.widget a:hover, .widget_social.square a, .widget_social.circle a:hover, #footer .widget a:hover, .small-footer .menu li a:hover,
    	.page-header .fa, .post-cat-o, .post-cat-o a , .full-two-small .feat-header, .contact-popup .header, #wp-calendar tbody td a,
    	.widget_categories ul li, .widget_archive ul li, #wp-calendar thead th
    	{ color: $main_color }

    	.search_footer, .feat-header a, .post-header .post-cat a, .read-more-link:hover, .post-password-form p > input:hover,
    	.comment-navigation .nav-links a:hover, #respond #submit:hover , .pagination.numeric a.page-numbers:hover,
		.pagination.numeric span.current, .widget_social.square a:hover, .widget_social.circle a , p.clear a:hover,
		.social-icons a, #footer .widget-title:after, .page-links a, .page-links .page-links-title > span,
		p.clear a:hover, .contact-popup form input[type='submit'], .contact-popup form button, .loader > div:before,
		#wp-calendar tbody td a:hover, .widget .searchform .search-submit
    	{ background-color: $main_color }

    	#nav-wrapper .menu > li.current-menu-item > a, #nav-wrapper .menu > li.current_page_item > a,
		#nav-wrapper .menu > li:hover > a, #nav-wrapper .menu > ul > li:hover > a, .post-entry blockquote,
		#respond h3 small a, .widget-title, .widgettitle, .widget_social.square a, .widget_social.circle a:hover, 
		#wp-calendar caption, p.clear a, #footer, .small-footer .menu li span
		{ border-color: $main_color }

		.widget_calendar .calendar_wrap
		{ border-bottom-color: $main_color !important }

		@media only screen and (max-width: 992px) {
			#nav-wrapper.fixed h1 {
				color: $main_color
			}
		}
		/* Nav Menu */
		#nav-wrapper
		{border-bottom-color: $nav_border_bottom_color!important}
		#nav-wrapper .menu li a
		{color: $nav_color}
		#nav-wrapper
		{background-color: $nav_background}
		@media only screen and (max-width: 992px) {
			#nav-wrapper .menu
			{background-color: $nav_background}
		}
		#nav-wrapper .menu > li.current-menu-item > a, #nav-wrapper .menu > li.current_page_item > a,
		#nav-wrapper .menu > li:hover > a
		{background-color: $nav_hover_background}

		/* Dropdown */
		#nav-wrapper ul.menu ul a, #nav-wrapper .menu ul ul a
		{color: $dropdown_color}
		#nav-wrapper .menu .sub-menu, #nav-wrapper .menu .children,
		#nav-wrapper .menu .sub-menu li a, #nav-wrapper .menu .children  li a
		{background-color: $dropdown_background}
		#nav-wrapper ul.menu ul a:hover, #nav-wrapper .menu ul ul a:hover,
		#nav-wrapper ul.menu ul a:hover, #nav-wrapper .menu ul ul a:hover
		{background-color: $dropdown_hover_background!important;color: $dropdown_hover_color}
		#nav-wrapper .menu .sub-menu, #nav-wrapper .menu .children, #nav-wrapper ul.menu ul a, #nav-wrapper .menu ul ul a,
		#nav-wrapper .menu .sub-menu li, #nav-wrapper .menu .children  li
		{border-color: $dropdown_border_color}

		/* Nav Menu Buttons */
		.li-toggle, .toggle-btn
		{color: $nav_buttons_color;background-color: $nav_buttons_background}
		.li-toggle:hover, .toggle-btn:hover
		{background-color: $nav_buttons_hover_background}

		/* Widgets Title */
		.widget-title
		{background-color: $widget_title_background;color: $widget_title_color}

		/* Footer */
		#footer
		{background-color: $footer_background}
		#footer .widget-title
		{color: $footer_headings_color}
		.small-footer
		{background-color: $small_footer_background }

		/* buttons */
		.scroll-up-btn { background-color: $scroll_btn_color !important }
		.contact-btn { background-color: $contact_btn_color }
		.social-btn { background-color: $social_btn_color }

		/* media /
		@media only screen and (max-width: 992px) {
			#nav-wrapper, #nav-wrapper .menu
			{background-color: $nav_background}
			#nav-wrapper .menu li
			{border-color: $dropdown_border_color}
		}

	";

	if( $breaknews['bn-main-font'] ) {
	    $main_font   = $breaknews['bn-main-font']['font-family'];
		$custom_css .= "
			body {
				font-family: $main_font!important
			}
		";
	}

	if( $breaknews['bn-custom-css'] ) {

		$custom_css .= $breaknews['bn-custom-css'];

	}

	$js_config = 'var main_color = "'.$main_color.'";';

    wp_add_inline_style( 'breaknews-style', $custom_css );

    wp_add_inline_script( 'breaknews-script', $breaknews['bn-custom-js'] );

    wp_add_inline_script( 'breaknews-script', $js_config);
}

add_action( 'wp_enqueue_scripts', 'breaknews_custom_css' );