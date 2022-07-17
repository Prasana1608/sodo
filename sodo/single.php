<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sodo
 */

get_header();
?>
	
	<main id="primary" class="site-main">
		<div class="container">
			<div class="hero-section container">
				<figure class="page-hero-image">
						<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('thumbnail_large');
					} elseif (my_image_display('thumbnail_large')) { ?>
						<img src="<?php echo my_image_display('thumbnail_large'); ?>" alt="Post-Image" >
					<?php } else{ ?>
						<img src="<?php print IMAGES; ?>/no-image.png" alt="No-Image" class="img-fluid">
			<?php } ?>	
				</figure>
			</div>
			<div class="content-container">
				<h1><?php the_title() ?></h1>
				<?php
		while ( have_posts() ) :
			the_post();

			// get_template_part( 'template-parts/content', get_post_type() );
			 the_content();?>
		<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
			</div>
		</div>
	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
