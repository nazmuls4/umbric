<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Service_list_Section_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'service-list';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Service list', 'plugin-name' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-banner';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'creative-peoples' ];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'section_big_title',
			[
				'label' => __( 'Section Big Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Let’s equip you for every stage of your life:',
			]
		);
         
		$this->end_controls_section();

		 

	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$section_big_title = $this->get_settings('section_big_title');         
		$list = $this->get_settings('list');    
		$dynamic_number = rand(87486545,49674968);
?>
 <script>
    jQuery(document).ready(function($){
        $(".service-list-shorting-ul li").click(function(){
            $(".service-list-shorting-ul li").removeClass("active");
            $(this).addClass("active");

            var selector = $(this).attr("data-filter");
            $(".project-list-item").isotope({
                filter: selector 
            });
            return false;
		});
    });
    jQuery(window).load(function(){
        jQuery(".project-list-item").isotope();  
    });
</script>
	
	<section class="service-page-area position-relative">
        <div class="container service-container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title text-center">
						<h1><?php echo $section_big_title; ?></h1> 
					</div>
					<div class="row justify-content-center">
						<div class="col-lg-5">
							<div class="service-search-form">
								<?php echo get_search_form(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="service-list-shorting">
						<?php 
						$terms = get_terms( 'service_category' );
						if (! empty( $terms ) && ! is_wp_error( $terms )): ?>
							<ul class="service-list-shorting-ul">
								<li class="active" data-filter="*">All Solutions</li>
								<?php foreach ($terms as $key => $term): ?>
									<li data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></li>
								<?php endforeach ;?>
							</ul>
						<?php endif ;?>
					</div>
				</div>
			</div>
			<div class="row service-lister-row project-list-item">
				<?php 
					$args = array( 
						'post_type' => 'service', 
						'posts_per_page' => -1,
						'post_status' => 'publish'
					);
					$search_query = trim(get_query_var('s'));
					if(!empty($search_query)) {
						$args['s'] = $search_query;
					}

					// $posts = get_posts($args);

					// if( !empty($search_query) ) {	
					// 	unset($args['s']);
					// 	$args['tag'] = $search_query;
					// 	$posts2 = get_posts($args);	
					// 	$posts = array_merge($posts, $posts2);
					// }

					$service = new WP_Query( $args ); 
				?>
				<?php 
					$count = 0;
					while($service -> have_posts())  : $service-> the_post(); 
					$count++;
					$btn_icon = cs_get_option('btn_icon'); 
					$btn_label = cs_get_option('btn_label'); 
					$btn_link = cs_get_option('btn_link'); 

					$postterms = get_the_terms( $service->ID, 'service_category' );

					if ( $postterms && ! is_wp_error( $postterms ) ) :  
					$draught_links = array(); 
					foreach ( $postterms as $postterm ) {
						$draught_links[] = $postterm->slug;
					}				
					$on_draught = join( " ", $draught_links );
				?> 

				<?php endif; ?> 
					<div class="col-lg-3 col-md-4 col-sm-6 <?php echo esc_html( $on_draught ) ?>">
						<div class="single-servicel-list">
							<!-- Modal -->
							<div class="modal fade single-service-modal-area" id="modal<?php echo $count ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-centered" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h1 class="modal-title" id="exampleModalLabel"><?php the_title(); ?></h1>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							       	<div class="servicce-feature-modal-image">
							       		<img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="">
							       	</div>
							       	<div class="servicce-feature-feature-modal-content">
							       		<?php the_content(); ?>
							       	</div>
									<div class="service-tags">
										<?php the_tags(); ?>
									</div>
							      </div>
							      <div class="modal-footer text-center">
							         <div class="site-btn service-modal-button hero-btn text-center">
						  				<a  href="<?php echo $btn_link; ?>" class="primary-btn filled-btn text-uppercase"> <i class="<?php echo $btn_icon ?>"></i><?php echo $btn_label; ?></a>
						  			</div>
							      </div>
							    </div>
							  </div>
							</div>
							<!-- modal -->
							<a href="#" data-toggle="modal" data-target="#modal<?php echo $count ?>">
								<div class="service-box-thumbnail" style="background-image:url(<?php the_post_thumbnail_url(); ?>);"></div>
							</a>
							<a href="#" data-toggle="modal" data-target="#modal<?php echo $count; ?>"><h4 class="service-box-title"><?php the_title(); ?></h4></a>
							<?php the_tags(); ?>
						</div>
					</div> 
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</div>
		</div>
    </section>

<?php

	}

}