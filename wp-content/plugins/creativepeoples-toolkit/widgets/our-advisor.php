<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class our_advisor_section_Widget extends \Elementor\Widget_Base {

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
		return 'advisor-area';
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
		return __( 'Advisor Area', 'plugin-name' );
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
				'default' => 'Our Advisors',
			]
		);
        
        $this->add_control(
			'section_small_title',
			[
				'label' => __( 'Section Small Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'our leadership',
			]
		); 
        $this->add_control(
			'section_top_bg', [
				'label' => __( 'Section top shape', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA, 
				'label_block' => true,
			]
		); 
        $this->add_control(
			'section_bottom_bg', [
				'label' => __( 'Section bottom shape', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA, 
				'label_block' => true,
			]
		);
		$this->end_controls_section();



		$this->start_controls_section(
			'advisor_area_content',
			[
				'label' => __( 'Advisor Area', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'advisor_image', [
				'label' => __( 'Advisor thumbnail', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA, 
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'advisor_name', [
				'label' => __( 'Advisor name', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Rosalina D. William' , 'plugin-domain' ),
				'label_block' => true,
			]
		);
		 
		$repeater->add_control(
			'advisor_designation', [
				'label' => __( 'Advisor designation', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'founder' , 'plugin-domain' ),
				'label_block' => true,
			]
		);
		 
		 
		$this->add_control(
			'list',
			[
				'label' => __( 'Advisor List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(), 
				'title_field' => '{{{ advisor_name }}}',
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
		$section_top_bg = $this->get_settings('section_top_bg');  
		$section_bottom_bg = $this->get_settings('section_bottom_bg');  
		$list = $this->get_settings('list');  
		

?>
	
<section class="advisor-area">
	<div class="advisor-top-shape">
		<img src="<?php echo $section_top_bg['url'] ?>" alt="">
	</div>
	 <div class="container">
	 	<div class="row">
	 		<div class="col-lg-12">
				<div class="section-title">
					<h1><?php echo $section_big_title; ?></h1>
					<h3><?php echo $section_small_title; ?></h3>
				</div>
			</div>
	 	</div>
	 	<div class="row">
	 		<div class="col-lg-12">
	 			<div class="advisor-area-wrapper"> 

	 				<?php foreach ($list as $key => $listitems): ?>
	 					<div class="single-advisor-area">
		 					<div class="advisor-image">
		 						<img src="<?php echo $listitems['advisor_image']['url']; ?>" alt="">
		 					</div>	
		 					<div class="adviros-item-inner-content text-center">
		 						<h3><?php echo $listitems['advisor_name']; ?></h3>
		 						<p class="text-uppercase"><?php echo $listitems['advisor_designation']; ?></p>
		 					</div>
		 				</div> 
	 				<?php endforeach ;?>


	 			</div>
	 		</div>
	 	</div>
	 </div>
	 <div class="advisor-bottom-shape">
		<img src="<?php echo $section_bottom_bg['url'] ?>" alt="">
	</div>
	
</section>
<?php

	}

}