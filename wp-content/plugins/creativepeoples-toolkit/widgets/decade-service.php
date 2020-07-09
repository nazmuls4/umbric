<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class decare_service_Section_Widget extends \Elementor\Widget_Base {

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
		return 'decare-service';
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
		return __( 'Decare service', 'plugin-name' );
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
				'default' => 'Decades of Service',
			]
		);
        
        $this->add_control(
			'section_small_title',
			[
				'label' => __( 'Section Small Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'FROM OUR CLIENTS',
			]
		); 

		$this->add_control(
			'section_bg', [
				'label' => __( 'Secction background', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA, 
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		// service list
		$this->start_controls_section(
			'decare_servicce',
			[
				'label' => __( 'Decare service list', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_thumbnail', [
				'label' => __( 'List thumbnail', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA, 
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'decre_Service_name', [
				'label' => __( 'Service name', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Marty Shwartz' , 'plugin-domain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'decare_service_designation', [
				'label' => __( 'Decare service designation', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Founder, Lemonade co.' , 'plugin-domain' ),
				'label_block' => true,
			]
		); 
		$repeater->add_control(
			'decare_service_description', [
				'label' => __( 'Decare service designation', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat in out team & plus.' , 'plugin-domain' ),
				'label_block' => true,
			]
		); 
		 
		$this->add_control(
			'list',
			[
				'label' => __( 'Decare service List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(), 
				'title_field' => '{{{ decre_Service_name }}}',
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
		$section_bg = $this->get_settings('section_bg');    
		$list = $this->get_settings('list');    
?>
	
	<section class="decare-service-area position-relative" data-background="<?php echo $section_bg['url'] ?>"> 
		<div class="decare-service-area-overlay"></div> 
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
 					<div class="decare-servicelist-wrapper">

 						<?php foreach ($list as $key => $listitems): ?>
 							<div class="single-decare-service"> 
 							<div class="singledecore-service-meta d-flex align-items-start">
 								<div class="single-decre-service-img">
 									<img src="<?php echo $listitems['list_thumbnail']['url'] ?>" alt="">
 								</div>
 								<div class="decare-service-meta-content">
 									<h3><?php echo $listitems['decre_Service_name'] ?></h3>
 									<p><?php echo $listitems['decare_service_designation'] ?></p>
 								</div>
 							</div>
 							<div class="single-decare-service-content">
 								<?php echo $listitems['decare_service_description'] ?>
 							</div> 
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