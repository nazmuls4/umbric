<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Umbric
 */

?>
 
<footer class="footer-area">
	<div class="footer-top-area">
		<div class="container">
			<div class="footer-row-outer-area">
				<div class="row justify-content-center align-items-center">
					<div class="col-lg-10">
						<div class="row justify-content-end align-items-center">
							<div class="footer-top-thumbanail">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-top.png" alt="Footer thumb">
							</div>
							<div class="col-lg-6">
								<div class="footer-top-area-inner-content">
									<h1>Crush Your Target <br> With Better Leads</h1>
									<p>Time for your sales team to get an edge? Maximize your sales and boost your growth with better leads.</p>
									<div class="site-btn">
										<a href="#" class="btn-primary text-capitalize">Get Started</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom  mt-140">
		<div class="container">
			<div class="row">

				<div class="col-lg-3">
					<div class="footer-widget footer-site-info">
						<a class="navbar-brand footer-brand" href="<?php echo get_site_url( ); ?>"><img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Umbric"></a> 
						
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'footer-menu',
									'menu_id'        => 'footer-menu',
								)
							);
						?>
					</div>
				</div>

			 	<?php  dynamic_sidebar( 'footer-sidebar' ); ?>

				<div class="col-lg-3">
					<div class="footer-widget">
						<h3 class="mb-30">Subscribe Now</h3>
						<p>We will reach out by a call</p>
						 <?php echo do_shortcode( '[contact-form-7 id="13" title="footer subscribe"]' ); ?>
					</div>
				</div>


			</div>
		</div>
	</div>
	<div class="footer-copyright-area">
		<div class="container">
			<div class="row-footer-copy-text-outer">
				<div class="row">
					<div class="col-lg-6">
						<div class="copytext">
							<p>Copyright © 2020 umbric. All rights reserved.</p>
						</div>
					</div>
					<div class="col-lg-6 text-right">
						<div class="back-to-top">
							<a href="#" class="backto-top text-uppercase">BACK TO TOP  <i class="fa fa-angle-up">	</i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>



</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
