<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class how_to_work_Section_Widget extends \Elementor\Widget_Base {

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
		return 'vhow-to-work';
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
		return __( 'How to work', 'plugin-name' );
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
				'default' => 'How it Works',
			]
		);
        
        $this->add_control(
			'section_small_title',
			[
				'label' => __( 'Section Small Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'THE PROCESS',
			]
		); 

		$this->end_controls_section();

		// service list
		$this->start_controls_section(
			'How_to_work_list',
			[
				'label' => __( 'How to Work list', 'plugin-name' ),
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
			'list_title', [
				'label' => __( 'Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'A True Partnership' , 'plugin-domain' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_sub_title', [
				'label' => __( 'Sub Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Discuss with user' , 'plugin-domain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content', [
				'label' => __( 'Content', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'We don’t sell you financial products, instead we partner with you in order to figure out the financial solution that works best for you. We also have partnerships and affiliations with accountants, lawyers and tax specialists who can aid us in providing you with an integrated financial approach.' , 'plugin-domain' ),
				'label_block' => true,
			]
		); 
		 
		$this->add_control(
			'list',
			[
				'label' => __( 'Service List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(), 
				'title_field' => '{{{ list_title }}}',
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
		$list = $this->get_settings('list');    
?>
	
	<section class="brands-area value-permission-area how-to-work position-relative pt-100 pb-70">
        <div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title text-center">
						<h1><?php echo $section_big_title; ?></h1>
						<h3><?php echo $section_small_title; ?></h3>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">

				<?php foreach ($list as $key => $listitems): 
					 
				?> 
				<div class="col-lg-4 col-md-6">
					<div class="our-single-service-list value-permission-list text-center position-relative">
						<div class="service-icon">
							<img src="<?php echo $listitems['list_thumbnail']['url']; ?>" alt="">
						</div>
						<div class="service-desc-title">
							<p><?php echo $listitems['list_sub_title']; ?></p>
							<h3><?php echo $listitems['list_title']; ?></h3>
						</div>
						<div class="service-desc-short">
							<?php echo $listitems['list_content']; ?>
						</div> 
					</div>
				</div>
				<?php endforeach ;?>

			</div>

		</div>
    </section>

<?php

	}

}