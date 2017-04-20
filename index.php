<?php get_header(); ?>
<div id="main">
	<div id="content">
		<?php
			if( is_home() && get_option('page_for_posts') ) {
				/*Special Template for Blog Landing Page*/
				$blog_page_id = get_option('page_for_posts');
				$blog_page = get_post($blog_page_id);
				echo '<div class="page">';
				echo '<h1 class="page-title">'.$blog_page->post_title.'</h1>';
				if(is_user_logged_in()) {
					echo '<div class="edit-link"><a href="'.get_edit_post_link($blog_page->ID).'">edit</a></div>';
				}
				$content = $blog_page->post_content;
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]&gt;', $content);
				echo $content;
				echo '</div>';
				echo '<nav class="grid blog">';
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post(); 
						$special_class = "";
						if (!get_the_post_thumbnail($post->ID)) {
							$special_class .= " no-img";
						}
						echo '<div class="submenu-item grid-item'. $special_class . '">';
							echo '<a href="' . get_permalink($post->ID) . '">';
								echo get_the_post_thumbnail($post->ID);
								echo '<div class="submenu-item-content">';
									echo '<p>';
										echo get_the_title();
										echo '<br />';
										echo '<span class="post-date">';
											echo get_the_time('F jS, Y');
										echo '</span>';
									echo '</p>';
								echo '</div>';
							echo '</a>';
						echo '</div>';
					}
				}
				echo '</nav>';
				echo '<nav class="pager">';
				echo paginate_links(array(
					'prev_text' => __('« Newer'),
					'next_text' => __('Older »'),
				));
				echo '</nav>';
			} else {
				/*Regular Pages*/
				if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="<?php if (is_page()) {print "page";} else {print "post";} if(is_front_page()) {print " home";} ?>">
						<h1 class="page-title"><?php echo get_the_title(); ?></h1>
						<?php if (!is_page()) : ?>
							<h4>Posted on <?php the_time('F jS, Y') ?></h4>
						<?php endif; ?>
						<?php if (is_user_logged_in()): ?>
							<div class="edit-link">
								<a href="<?php print get_edit_post_link($post->ID)?>">edit</a>
							</div>
						<?php endif; ?>
						<?php the_content(__('(more...)')); ?>
					</div>
				<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif;
				cherierenaephotography_list_child_pages(); 
			}
			comments_template();
		?>
	</div>
</div>
<div id="delimiter"></div>
<?php get_footer(); ?>