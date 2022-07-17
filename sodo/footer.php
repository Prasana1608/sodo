<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sodo
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container flex">
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png">
				<div class="flex">
					<img src="<?php echo get_template_directory_uri(); ?>/images/Facebook.png">
					<img src="<?php echo get_template_directory_uri(); ?>/images/Instagram.png">
					<img src="<?php echo get_template_directory_uri(); ?>/images/Twitter.png">
					<img src="<?php echo get_template_directory_uri(); ?>/images/YouTube.png">
				</div>
			</div>
			<div class="company-links">
				<h6>Company</h6>
				<a href="#">About us</a>
				<a href="#">Meet the team</a>
				<a href="#">Careers</a>
				<a href="#">Blog</a>
			</div>
			<div class="company-links">
				<h6>Product</h6>
				<a href="#">Product</a>
				<a href="#">Product</a>
				<a href="#">Product</a>
				<a href="#">Product</a>
			</div>
			<div class="company-links">
				<h6>Company</h6>
				<a href="#">Product</a>
				<a href="#">Product</a>
				<a href="#">Product</a>
				<a href="#">Product</a>
			</div>
			<div class="news-letter company-links">
				<h6>Sign up to our newsletter</h6>
				<div>
					<input class="email-input" placeholder="name@email.com"type="email" id="email" name="email">
					<input class="submit-button" type="submit" value="Subscribe">
				</div>
			</div>
		</div>
		<script>
			$('#comment-submit ').on('click',function(e){
				console.log("done");
		if ( true != $('#wp-comment-cookies-consent').is(":checked") ) {
			alert('You must agree with Privacy Policy.');
			e.preventDefault();
		}
});
		</script>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
