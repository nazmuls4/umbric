<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class About_more_Section_Widget extends \Elementor\Widget_Base {

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
		return 'about-more';
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
		return __( 'About Lern more', 'plugin-name' );
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
				'default' => 'Best Practices From Cool Advisors.',
			]
		);
        
        $this->add_control(
			'section_small_title',
			[
				'label' => __( 'Section Small Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Where here for you',
			]
		); 
        $this->add_control(
			'section_desc',
			[
				'label' => __( 'Section description', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => 'Business contents insurance is a type of business insurance that can protect the possessions and equipment in your work premises. A typical business contents insurance policy will cover damage.',
			]
		); 
 
		$this->end_controls_section();


		$this->start_controls_section(
			'about_lern_moresection',
			[
				'label' => __( 'About learn more', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'lrn_desc_right',
			[
				'label' => __( 'About lern more right side', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => 'Equipment in your work premises. A typical business contents insurance policy will cover damage or loss to furniture, tools & equipment as a result of a fire, flood or theft. This type of cover is not mandatory under UX law.',
			]
		); 
		$this->add_control(
			'lrn_about_name',
			[
				'label' => __( 'About name', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Ray Dalio',
			]
		); 

		$this->add_control(
			'lrn_about_designation',
			[
				'label' => __( 'About Designation', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Founder',
			]
		); 
		$this->add_control(
			'lrn_about_icon',
			[
				'label' => __( 'About icon', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true, 
			]
		); 

		$this->add_control(
			'lrn_about_image',
			[
				'label' => __( 'About Image', 'plugin-name' ),
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
		$section_desc = $this->get_settings('section_desc');   
		$lrn_desc_right = $this->get_settings('lrn_desc_right');     
		$lrn_about_name = $this->get_settings('lrn_about_name');   
		$lrn_about_designation = $this->get_settings('lrn_about_designation');   
		$lrn_about_image = $this->get_settings('lrn_about_image');   
		$lrn_about_icon = $this->get_settings('lrn_about_icon');   
?>
	
	<section class="iabout-lern-more-area position-relative">
		<div class="container">
			<div class="row align-items-center justify-content-between">
				<div class="col-lg-5">
					<div class="about-more-left-side-image">
						<img src="<?php echo $lrn_about_image['url'] ?>" alt="">
					</div>
				</div>
				<div class="col-lg-7">
					<div class="about-more-right-side-content">
						<div class="section-title text-center">
							<h1><?php echo $section_big_title; ?></h1>
							<h3><?php echo $section_small_title; ?></h3>
							<div class="about-lern-more-description">
								<?php echo $section_desc; ?>
							</div>
						</div>
					</div>

					<div class="about-learn-more-box-content position-relative"> 
						<div class="about-learn-more-icon">
							<img src="<?php echo $lrn_about_icon['url'] ?>" alt="">
						</div>
						<div class="about-learn-more-box-content-desc">
							<?php echo $lrn_desc_right; ?>
						</div>
						<h2><?php echo $lrn_about_name; ?></h2>
						<p><?php echo $lrn_about_designation ; ?></p>
					</div>
				</div>
			</div>
		</div>
	 
    </section>

<?php

	}

}