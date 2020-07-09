<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class office_overview_Section_Widget extends \Elementor\Widget_Base {

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
		return 'offic-overview';
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
		return __( 'Office about area', 'plugin-name' );
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
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => 'A Great Office Overview',
			]
		);
        
        $this->add_control(
			'section_small_title',
			[
				'label' => __( 'Section Small Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => 'VIDEO',
			]
		); 
        
         $this->add_control(
			'play_btn_link',
			[
				'label' => __( 'Play btn Link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'label_block' => true,
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

 
		$this->end_controls_section();


		$this->start_controls_section(
			'offfice_image',
			[
				'label' => __( 'Office overview image', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'big_image',
			[
				'label' => __( 'Big image', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true, 
			]
		); 
		$this->add_control(
			'small_left',
			[
				'label' => __( 'Small left image', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true, 
			]
		); 

		$this->add_control(
			'small_right',
			[
				'label' => __( 'Small right image', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true, 
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
		$section_small_title = $this->get_settings('section_small_title');    
		$play_btn_link = $this->get_settings('play_btn_link'); 

		$big_image = $this->get_settings('big_image');    
		$small_left = $this->get_settings('small_left');    
		$small_right = $this->get_settings('small_right');    
   
?>
	
	<section class="office-overview-area position-relative">
		 <div class="officeoverview-before-image">
		 	<img src="<?php echo $small_left['url'] ?>" alt="">
		 </div>
		 <div class="container">
		 	<div class="outer-row-office-overview">
		 		<div class="row justify-content-center">
		 			<div class="col-lg-8">
		 				<div class="office-overview-inner-content">
		 					<div class="section-title text-center">
		 						<div class="office-pay-btn">
		 							<a href="<?php echo $play_btn_link['url'] ?>" class="pop-up image-link mfp-iframe">
		 								<span class="span-1"></span>
		 								<span class="span-2"></span>
		 								<i class="fa fa-play"></i>
		 							</a>
		 						</div>
		         				<h1><?php echo $section_big_title; ?></h1>
		         				<h3><?php echo $section_small_title; ?></h3>
		         			</div>
		         			<div class="offive-overview-big-image">
		         				<img src="<?php echo $big_image['url'] ?>" alt="">
		         			</div>
		 				</div>
		 			</div>
		 		</div>
		 	</div>
		 </div>
		 <div class="officeoverview-after-image">
		 	<img src="<?php echo $small_right['url'] ?>" alt="">
		 </div>
	 
    </section>

<?php

	}

}