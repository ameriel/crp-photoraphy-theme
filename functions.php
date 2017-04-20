<?php

add_action( 'wp_enqueue_scripts', 'cherierenaephotography_enqueue_scripts' );
function cherierenaephotography_enqueue_scripts() {
	
	wp_deregister_script('jquery');
	wp_register_script( 'jquery', 'https://code.jquery.com/jquery-2.2.3.js',2.2,true );
    wp_enqueue_script('jquery');
	
	wp_deregister_script('masonry');
	wp_register_script( 'masonry', 'https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.js', array('jquery'),4.0,true );
    wp_enqueue_script('masonry');
	
	wp_register_script( 'imagesloaded', 'https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js', array('masonry'),4.1,true );
    wp_enqueue_script('imagesloaded');
	
	wp_register_script( 'colorbox', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.3/jquery.colorbox-min.js', array('jquery'),1.6,true);
	wp_enqueue_script('colorbox');
	
    wp_register_script( 'my-script', '/wp-content/themes/cherierenaephotography/script.js', array('masonry','imagesloaded'),1.0,true );
    wp_enqueue_script('my-script');
	
	wp_enqueue_style('colorbox', '/wp-content/themes/cherierenaephotography/colorbox.css');

}

function remove_cssjs_ver( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );

add_filter( 'tiny_mce_before_init', 'cherierenaephotography_format_tinymce' );
function cherierenaephotography_format_tinymce( $in ) {
	$in['wordpress_adv_hidden'] = FALSE;
	return $in;
}

/* MENU REGIONS */
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
	  'footer-menu' => __('Footer Menu'),
    )
  );
}
add_action( 'init', 'register_my_menus' );

/* CUSTOM THEME SETTINGS */
function cherierenaephotography_theme_customizer( $wp_customize ) {
	//Logo image
    $wp_customize->add_section( 'cherierenaephotography_logo_section' , array(
		'title'       => __( 'Logo', 'cherierenaephotography' ),
		'priority'    => 30,
		'description' => 'Upload a logo to display in the header',
	) );
	$wp_customize->add_setting( 'cherierenaephotography_logo' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cherierenaephotography_logo', array(
		'label'    => __( 'Logo', 'cherierenaephotography' ),
		'section'  => 'cherierenaephotography_logo_section',
		'settings' => 'cherierenaephotography_logo',
	) ) );
	
	$wp_customize->add_setting('cherierenaephotography_logo_as_title');
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'cherierenaephotography_logo_as_title',
			array(
				'label'     => __('Use logo instead of text for site title', 'cherierenaephotography'),
				'section'   => 'cherierenaephotography_logo_section',
				'settings'  => 'cherierenaephotography_logo_as_title',
				'type'      => 'checkbox',
				'default'	=> '0',
			)
		)
	);
	
	$wp_customize->add_setting( 'cherierenaephotography_favicon' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cherierenaephotography_favicon', array(
		'label'    => __( 'Bookmark/Favorite Icon', 'cherierenaephotography' ),
		'section'  => 'cherierenaephotography_logo_section',
		'settings' => 'cherierenaephotography_favicon',
	) ) );
	
	//Theme colors
    $wp_customize->add_section( 'cherierenaephotography_colors_section' , array(
		'title'       => __( 'Theme Colors', 'cherierenaephotography' ),
		'priority'	  => 30,
	) );
	$wp_customize->add_setting( 'cherierenaephotography_header_color' );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cherierenaephotography_header_color', array(
		'label'    => __( 'Header Background Color', 'cherierenaephotography' ),
		'default'  => '#444444',
		'section'  => 'cherierenaephotography_colors_section',
		'settings' => 'cherierenaephotography_header_color',
	) ) );
	
	$wp_customize->add_setting( 'cherierenaephotography_header_font' );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cherierenaephotography_header_font', array(
		'label'    => __( 'Header Font Color', 'cherierenaephotography' ),
		'default'  => '#1CA0BA',
		'section'  => 'cherierenaephotography_colors_section',
		'settings' => 'cherierenaephotography_header_font',
	) ) );
	
	$wp_customize->add_setting( 'cherierenaephotography_footer_color' );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cherierenaephotography_footer_color', array(
		'label'    => __( 'Footer Background Color', 'cherierenaephotography' ),
		'default'  => '#333333',
		'section'  => 'cherierenaephotography_colors_section',
		'settings' => 'cherierenaephotography_footer_color',
	) ) );
	
	$wp_customize->add_setting( 'cherierenaephotography_footer_font' );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cherierenaephotography_footer_font', array(
		'label'    => __( 'Footer Font Color', 'cherierenaephotography' ),
		'default'  => '#000000',
		'section'  => 'cherierenaephotography_colors_section',
		'settings' => 'cherierenaephotography_footer_font',
	) ) );
	
	$wp_customize->add_setting( 'cherierenaephotography_highlight_color' );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cherierenaephotography_highlight_color', array(
		'label'    => __( 'Highlight Color', 'cherierenaephotography' ),
		'default'  => '#1CA0BA',
		'section'  => 'cherierenaephotography_colors_section',
		'settings' => 'cherierenaephotography_highlight_color',
	) ) );
}

add_action( 'customize_register', 'cherierenaephotography_theme_customizer' );

function cherierenaephotography_customize_css()
{
    ?>
         <style type="text/css">
            header { 
				background: <?php echo get_theme_mod('cherierenaephotography_header_color', '#F7F7F7'); ?>;
				color: <?php echo get_theme_mod('cherierenaephotography_header_font', '#444444'); ?>; 				
			}
			header h1 a { color: <?php echo get_theme_mod('cherierenaephotography_header_font', '#444444'); ?>; }
			footer { 
				background: <?php echo get_theme_mod('cherierenaephotography_footer_color', '#333333'); ?>;
				color: <?php echo get_theme_mod('cherierenaephotography_footer_font', '#000000'); ?>;
			}
			a, header nav ul li a { color: <?php echo get_theme_mod('cherierenaephotography_highlight_color', '#1CA0BA'); ?>; }
			#main nav .submenu-item .submenu-item-content,
			#main .gallery-container .gallery-item .gallery-item-title,
			#main nav .submenu-item .submenu-item-content:hover, 
			#main nav .submenu-item.active .submenu-item-content,
			#main .gallery-container .gallery-item .gallery-item-title:hover,
			#main nav .submenu-item a:focus .submenu-item-content, 
			#main .gallery-container .gallery-item a:focus .gallery-item-title {
				background-color: <?php echo get_theme_mod('cherierenaephotography_highlight_color', '#1CA0BA'); ?>;
			}
			input[type=submit]:hover, input[type=submit]:focus {
				-webkit-box-shadow: 0px 0px 3px <?php echo get_theme_mod('cherierenaephotography_highlight_color', '#1CA0BA'); ?>;
				box-shadow: 0px 0px 3px <?php echo get_theme_mod('cherierenaephotography_highlight_color', '#1CA0BA'); ?>;
			}
			a.skip-main:focus, a.skip-main:{
				border:4px solid <?php echo get_theme_mod('cherierenaephotography_highlight_color', '#1CA0BA'); ?>;
			}      
		</style>
    <?php
}
add_action( 'wp_head', 'cherierenaephotography_customize_css');

/* CUSTOM FOOTER WIDGET */
function cherierenaephotography_widgets_init() {

	register_sidebar( array(
		'name'          => 'Footer',
		'id'            => 'footer',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'cherierenaephotography_widgets_init' );

/* FEATURED IMAGES */
add_theme_support( 'post-thumbnails' );

function cherierenaephotography_list_child_pages() {
	global $post;
	if ($post->ID) {
		$subs = new WP_Query( array( 
			'post_parent' => $post->ID, 
			'post_type' => 'page', 
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'nopaging' => TRUE,
			'posts_per_page' => -1,
			'posts_per_archive_page' => -1,
		));
		if( $subs->have_posts() ) {
			cherierenaephotography_display_grid($subs, $post->ID, "children");
		} elseif ($post->post_parent > 0) {
			$subs = new WP_Query( array( 
				'post_parent' => $post->post_parent, 
				'post_type' => 'page', 
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'nopaging' => TRUE,
				'posts_per_page' => -1,
				'posts_per_archive_page' => -1,
			));
			if ($subs->have_posts()) {
				cherierenaephotography_display_grid($subs, $post->ID, "siblings");
			}
		}
		wp_reset_postdata();
	}
}

function cherierenaephotography_display_grid($subs, $current_id=0, $grid_class="") {
	echo '<nav class="grid '. $grid_class .'">';
	while( $subs->have_posts() ) {
		$subs->the_post();
		$special_class="";
		if (get_the_title() == "Dare to be Red") {
			$special_class .= " red-feature";
		}
		if (!get_the_post_thumbnail($post->ID)) {
			$special_class .= " no-img";
		}
		if(get_the_id() == $current_id) {
			$special_class .= " active";
		}
		echo '<div class="submenu-item grid-item'. $special_class . '">';
			echo '<a href="' . get_permalink($post->ID) . '">';
				echo get_the_post_thumbnail($post->ID);
				echo '<div class="submenu-item-content">';
					echo '<p>';
						echo get_the_title();
					echo '</p>';
				echo '</div>';
			echo '</a>';
		echo '</div>';
	}
	echo '</nav>';
}

function cherierenaephotography_add_excerpt_support_for_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'cherierenaephotography_add_excerpt_support_for_pages' );

function cherierenaephotography_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
		echo '<nav class="navigation comment-navigation" role="navigation">';
		echo '<h2 class="screen-reader-text">'.  _e( 'Comment navigation', 'cherierenaephotography' ) . '</h2>';
		echo '<div class="nav-links">';
		if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'cherierenaephotography' ) ) ) {
			printf( '<div class="nav-previous">%s</div>', $prev_link );
			}
		if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'cherierenaephotography' ) ) ) {
			printf( '<div class="nav-next">%s</div>', $next_link );
		}
		echo '</div><!-- .nav-links -->';
		echo '</nav><!-- .comment-navigation -->';
	}
}

add_filter('post_gallery','cherierenaephotography_custom_gallery_format',10,2);

function cherierenaephotography_custom_gallery_format($string,$attr){
    $output = "<div class=\"gallery-container grid\">";
    $posts = get_posts(array('include' => $attr['ids'],'post_type' => 'attachment','orderby'=>$attr['orderby']));

    foreach($posts as $imagePost){
        $output .= "<div class=\"gallery-item grid-item\">
					<a href=\"".wp_get_attachment_image_src($imagePost->ID, 'default')[0]."\"><img src='".wp_get_attachment_image_src($imagePost->ID, $attr['size'])[0]."'>
					<div class=\"gallery-item-title\"><p>". $imagePost->post_title ."</p></div></a>
				</div>";
	}

    $output .= "</div>";

    return $output;
}
