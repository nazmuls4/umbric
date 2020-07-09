<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Send_Message_Section_Widget extends \Elementor\Widget_Base {

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
		return 'sen-message';
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
		return __( 'Send message area', 'plugin-name' );
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
				'default' => 'Send Us a Message',
			]
		);
        
        $this->add_control(
			'section_small_title',
			[
				'label' => __( 'Section Small Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'CONCACT',
			]
		);  
 
		$this->end_controls_section();


		$this->start_controls_section(
			'contact_form_area',
			[
				'label' => __( 'Contact form area', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		 
		$this->add_control(
			'contact_form_shortcode',
			[
				'label' => __( 'Contact form shortcode', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
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
		$contact_form_shortcode = $this->get_settings('contact_form_shortcode');     
?>
	
	<section class="send-message-area position-relative">
		 <div class="container">
		 	<div class="row">
		 		<div class="col-lg-12">
		 			<div class="section-title text-center">
						<h1><?php echo $section_big_title; ?></h1>
						<h3><?php echo $section_small_title; ?></h3> 
					</div>
		 		</div>
		 	</div>
		 	<div class="row">
		 		<div class="col-lg-12">
		 			  <?php echo do_shortcode( $contact_form_shortcode ); ?>
		 		</div>
		 	</div>
		 </div>
	 
    </section>

<?php

	}

}