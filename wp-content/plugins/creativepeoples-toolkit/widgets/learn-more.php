<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class learn_more_Section_Widget extends \Elementor\Widget_Base {

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
		return 'learn-more';
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
		return __( 'Lern more', 'plugin-name' );
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
			'Philosophy_left_side',
			[
				'label' => __( 'lern more Left Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'section_big_title',
			[
				'label' => __( 'Section Big Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Let Us Work For You!',
			]
		);
        
        $this->add_control(
			'section_small_title',
			[
				'label' => __( 'Section Small Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'ABOUT US',
			]
		); 


		$this->add_control(
			'Philosophy_left_side_desctiotion',
			[
				'label' => __( 'lern more Left side description', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => 'We only recommend investments that are tailored to your unique financial goals. We don’t follow the herd, jump on bandwagons or invest in speculative businesses with large environmental risks and liabilities. Our investments are fundamentally sound, possess a strong margin of safety and have a track record of success.S',
			]
		);
		$this->add_control(
			'btn_label', [
				'label' => __( 'Button label', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'read more' , 'plugin-domain' ),
				'show_label' => false,
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label' => __( 'Button Link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::URL,
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
			'Philosophy_right_side',
			[
				'label' => __( 'lern more Right Side Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'Philosophy_right_side_big_image',
			[
				'label' => __( 'lern more Right side big thumbnail', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true, 
			]
		);
		$this->add_control(
			'Philosophy_right_side_small_image',
			[
				'label' => __( 'lern more Left side small thumbnail', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true, 
			]
		);
		$this->add_control(
			'Philosophy_right_side_small_image_class',
			[
				'label' => __( 'Small Image Class', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
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
     
		$Philosophy_left_side_desctiotion = $this->get_settings('Philosophy_left_side_desctiotion');     
		$btn_label = $this->get_settings('btn_label');     
		$btn_link = $this->get_settings('btn_link');     
		$Philosophy_right_side_big_image = $this->get_settings('Philosophy_right_side_big_image');     
		$Philosophy_right_side_small_image = $this->get_settings('Philosophy_right_side_small_image');

		$targett = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofolloww = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';    
?>
	
	<section class="investment-phylo-area learn-more-area position-relative pt-100 pb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title text-center">
						<h1><?php echo $section_big_title; ?></h1>
						<h3><?php echo $section_small_title; ?></h3>
					</div>
				</div>
			</div>
			<div class="row justify-content-lg-center">
				<div class="col-lg-5 order-xl-1 order-lg-1 order-md-2 order-last">
					<div class="left-side-Philosophy-wrapper"> 
						<div class="Philosophy-left-side-description">
							<?php echo $Philosophy_left_side_desctiotion; ?>
						</div>
						<div class="site-btn text-center">
			  				<a  href="<?php echo $btn_link['url'] ?>" class="primary-btn filled-btn text-uppercase"><?php echo $btn_label ?></a>
			  			</div>
					</div>
				</div>
				<div class="col-lg-5 order-xl-2 order-lg-2 order-md-1 order-first">
					<div class="Philosophy-right-side-description position-relative">
						<img src="<?php echo $Philosophy_right_side_big_image['url'] ?>" alt="">
						<div class="Philosophy-right-side-small-img <?php echo $settings['Philosophy_right_side_small_image_class']; ?>">
							<img  src="<?php echo $Philosophy_right_side_small_image['url'] ?>" alt="">
						</div>
					</div>
				</div>
			</div>
		</div> 
    </section>

<?php

	}

}