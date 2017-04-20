<!DOCTYPE html>
<html>
<head>
	<title><?php 
		$page_title = get_the_title();
		if ($page_title == "") {
			$page_title = "Blog";
		} 
		print $page_title;
		print ' | '; 
		print bloginfo('name'); 
	?></title>
	<link rel="shortcut icon" type="image/png" href="<?php echo esc_url( get_theme_mod( 'cherierenaephotography_favicon' ) ); ?>" />
	<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<?php wp_head(); ?>
</head>
<body>
	<a class="skip-main" href="#main">Skip to content</a>
	<div id="wrapper">
	<header>
	<div class="header-wrapper">
		<div class="branding">
			<?php if ( get_theme_mod( 'cherierenaephotography_logo_as_title' ) == '1') : ?>
				<div class='site-logo' style="text-align: left">
					&nbsp;
					<a href='<?php echo esc_url( home_url( '/' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'cherierenaephotography_logo' ) ); ?>' alt='<?php print bloginfo('name'); ?>' /></a>
				</div>
				<p style="text-align: left;"><?php print bloginfo('description'); ?></p>
			<?php else: ?>
				<h1><a href="<?php print bloginfo('url'); ?>" rel="home"><?php print bloginfo('name'); ?></a></h1>
				<p><?php print bloginfo('description'); ?></p>
				<?php if ( get_theme_mod( 'cherierenaephotography_logo' ) ) : ?>
					<div class='site-logo'>
						<a href='<?php echo esc_url( home_url( '/' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'cherierenaephotography_logo' ) ); ?>' alt='' /></a>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<nav>
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
		</nav>
	</div>
	</header>