<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class lenders_section_Widget extends \Elementor\Widget_Base {

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
		return 'lenders';
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
		return __( 'Lenders Area', 'plugin-name' );
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
			'common_title_content',
			[
				'label' => __( 'Common Title', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(

			'common_title', [

				'label' => __( 'Common big title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'We have access',
                'label_block' => true,
                
			]

        ); 
        $this->add_control(

			'common_small_title', [

				'label' => __( 'Common small title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'We have access',
                'label_block' => true,
                
			]

        ); 
        $this->add_control(

			'section_bottom_thumbnail', [

				'label' => __( 'Section bottom thumbanail', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA, 
                'label_block' => true,
                
			]

        ); 
        $this->add_control(

			'section_bacckground_image', [

				'label' => __( 'Section bottom thumbanail', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA, 
                'label_block' => true,
                
			]

        ); 

		$this->end_controls_section();



		$this->start_controls_section(
			'lenders_gallery_content',
			[
				'label' => __( 'Landers gallery.', 'plugin-name' ),

				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );
        
        $this->add_control(
			'gallery',
			[
				'label' => __( 'Add Images', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
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
		$common_title = $this->get_settings('common_title'); 
		$common_small_title = $this->get_settings('common_small_title'); 
		$section_bottom_thumbnail = $this->get_settings('section_bottom_thumbnail'); 
		$section_bacckground_image = $this->get_settings('section_bacckground_image'); 
		$gallery = $this->get_settings('gallery'); 

?>
 
	
	<section class="lenders-area position-relative" data-background="<?php echo $section_bacckground_image['url']; ?>">
		
		<div class="lender-area-bottom-thumbnail">
			<img src="<?php echo $section_bottom_thumbnail['url'] ;?> " alt="Bottom thumbnail">
		</div>
          <div class="container">
          	<div class="row">
         		<div class="col-lg-12">
         			<div class="section-title text-center">
         				<h3 class="mb-25"><?php echo $common_small_title; ?></h3>
         				<h1 class="mb-70"><?php echo $common_title; ?></h1>
         			</div>
         		</div>
         	</div>

          	<div class="row ">
          		<div class="col-lg-12">
          			<div class="lender-area-gallery-wrapper d-flex align-items-center">
          				<?php foreach ($gallery as $key => $gallerys): ?>
          					<div class="lender-area-gallery-item">
          						<img src="<?php echo $gallerys['url'] ?>" alt="">
          					</div>
          				<?php endforeach ;?>
          			</div>
          		</div>
          	</div>
          </div>
    </section>

<?php

	}

}