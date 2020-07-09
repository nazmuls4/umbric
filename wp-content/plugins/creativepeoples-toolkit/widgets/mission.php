<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class mission_Section_Widget extends \Elementor\Widget_Base {

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
		return 'mission';
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
		return __( 'Mission area', 'plugin-name' );
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
			'section_bg', [
				'label' => __( 'Secction background', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA, 
				'label_block' => true,
			]
		);

        $this->add_control(
			'section_big_title',
			[
				'label' => __( 'Section Big Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Decades of Service',
			]
		);
        
        $this->add_control(
			'section_decription',
			[
				'label' => __( 'Section description', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => 'Were passionate about helping you curate a lifestyle that fits your unique needs, and creating financial solutions for every stage of life. We combine our services using an integrative approach to help you realize your financial dream.',
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
		$section_decription = $this->get_settings('section_decription');    
		$section_bg = $this->get_settings('section_bg');     
?>
	
	<section class="mission-area position-relative" data-background="<?php echo $section_bg['url'] ?>"> 
        <div class="container-fluid">
			<div class="row justify-content-end">
				<div class="col-lg-6">
					<div class="section-title text-center">
						<h1><?php echo $section_big_title; ?></h1>
						<div class="section-description">
							<?php echo $section_decription ?>
						</div>
					</div>
				</div>
			</div> 
		</div>
    </section>

<?php

	}

}