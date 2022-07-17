<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sodo
 */

get_header();
?>
<section class="section-posts">
	<div class="container">
		<div class="hero-article">
		<?php
					$category_ID = get_all_category_ids();
					$args = array(
					'posts_per_page' => 1, // we need only the latest post, so get that post onl
					'cat' => $category_ID,
					'post__not_in' => array( $post->ID ) // Use the category id, can also replace with category_name which uses category slug
						);
						$recent_posts = new WP_Query( $args);
	
						if ( $recent_posts->have_posts() ) {
							while ( $recent_posts->have_posts() ) {
							$recent_posts->the_post();        
								//Your template tags and markup like:
								?>
								<a href="<?php echo esc_url( get_permalink()); ?>">
									<div class="hero-article">
										<div class="title-div">
											<h2><?php the_title() ?></h2>
											<p class="trim">
												<?php 
													$content = get_the_content(); 
													$content = preg_replace("/\[(.*?)\]/i", '', $content);
													$content = strip_tags($content);
													echo wp_trim_words($content,15, '...'); 
												?>
											</p>
										</div>
										<div>
											<figure class="hero-featureimage">
												<?php 
													if ( has_post_thumbnail() ) {
														the_post_thumbnail('thumbnail_xsmall');
													} elseif (my_image_display('thumbnail_xsmall')) { ?>
														<img src="<?php echo my_image_display('thumbnail_xsmall'); ?>" alt="Post-Image" >
													<?php } else{ ?>
														<img src="<?php print IMAGES; ?>/no-image.png" alt="No-Image" class="img-fluid">
												<?php } ?>	
											</figure>
										</div>
									</div>
								</a>
							<?php
							}
							wp_reset_postdata();
						} ?>
		</div>
		<div class="flex">
	<?php 
		$paged = get_query_var('paged')? get_query_var('paged') : 1;
		$args = [
			'post_type' => 'post',
			'posts_per_page' => 5, 
			'paged' => $paged,
		];
		$wp_query = new WP_Query($args);

		while ( have_posts() ) : the_post(); ?>
			<div class="article">
			<figure class="feature-image">
										<?php 
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('thumbnail_xsmall');
                                    } elseif (my_image_display('thumbnail_xsmall')) { ?>
                                        <img src="<?php echo my_image_display('thumbnail_xsmall'); ?>" alt="Post-Image" >
                                    <?php } else{ ?>
                                        <img src="<?php print IMAGES; ?>/no-image.png" alt="No-Image" class="img-fluid">
                                <?php } ?>	
											
										</figure>
				<h2><?php the_title() ?></h2>
				<p class="trim">
					<?php 
						$content = get_the_content(); 
						$content = preg_replace("/\[(.*?)\]/i", '', $content);
						$content = strip_tags($content);
						echo wp_trim_words($content,13, '...'); 
					?>
				</p>
				<a class="view-post" href="<?php echo esc_url( get_permalink()); ?>">View Posts</a>
			</div>

	<?php endwhile; ?>
	</div>
	<!-- then the pagination links -->
<div class="pagination">
	<?php previous_posts_link( '<' ); ?>
	<?php next_posts_link( '>', $wp_query ->max_num_pages); ?>
</div>
	</div><!-- #main -->
	</section>
<?php
get_footer();
