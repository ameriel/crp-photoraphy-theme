		<footer>
			<?php if ( is_active_sidebar( 'footer' ) ) : ?>
				<?php dynamic_sidebar( 'footer' ); ?>
			<?php endif; ?>
			<?php if(wp_nav_menu( array( 'theme_location' => 'footer-menu', 'fallback_cb' => 'false') )) : ?>
				<nav>
					<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'fallback_cb' => false ) ); ?>
				</nav>
			<?php endif; ?>
		</footer>
	</div>
	<?php wp_footer(); ?>
</body>
</html>