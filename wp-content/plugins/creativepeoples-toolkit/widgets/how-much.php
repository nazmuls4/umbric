<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class how_much_Section_Widget extends \Elementor\Widget_Base {

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
		return 'how-much';
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
		return __( 'How much', 'plugin-name' );
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
				'default' => 'How much do you need to reach your financial goals?',
			]
		);
        
        $this->add_control(
			'section_small_title',
			[
				'label' => __( 'Section Small Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => 'MEASURING WHAT MATTERS',
			]
		); 

		$this->end_controls_section();

		 
		$this->start_controls_section(
			'section_btn',
			[
				'label' => __( 'Section button', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
 
		$this->add_control(
			'btn_label', [
				'label' => __( 'Button label', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'SEE YOUR RESULTS' , 'plugin-domain' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label' => __( 'Button Link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				'show_external' => true,
				'label_block' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		 
		$this->end_controls_section();
 


		$this->start_controls_section(
			'why_list_section',
			[
				'label' => __( 'Why list content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'why_status', [
				'label' => __( 'Why status', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'I’m' , 'plugin-domain' ),
				'label_block' => true,
			]
		);	

		$repeater->add_control(
			'why_icon', [
				'label' => __( 'Why icon', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA, 
				'label_block' => true,
			]
		);	

		$repeater->add_control(
			'why_count', [
				'label' => __( 'Why count', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '40' , 'plugin-domain' ),
				'label_block' => true,
			]
		);	
		$repeater->add_control(
			'why_desc', [
				'label' => __( 'Why description', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Years Old' , 'plugin-domain' ),
				'label_block' => true,
			]
		);	

		$this->add_control(
			'list',
			[
				'label' => __( 'WHY List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(), 
				'title_field' => '{{{ why_status }}}',
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
		$btn_label = $this->get_settings('btn_label');     
		$btn_link = $this->get_settings('btn_link');  
		$list = $this->get_settings('list');  

		$targett = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofolloww = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';    
?>
	
	<section class="how-much-area position-relative">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title text-center">
						<h1><?php echo $section_big_title; ?></h1>
						<h3><?php echo $section_small_title; ?></h3>
					</div>
				</div>
			</div>
			<div class="row">


				<?php foreach ($list as $key => $listitem): ?>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="single-why-item">
							<div class="single-item-title">
								<h2><?php echo $listitem['why_status'] ;?></h2>
							</div>
							<div class="single-why-item-meta d-flex align-items-center">
								<div class="single-why-item-icon">
									<img src="<?php echo $listitem['why_icon']['url'] ;?>" alt="">
								</div>
								<div class="single-why-item-meta-right">
									<h1><?php echo $listitem['why_count'] ;?></h1>
									<p><?php echo $listitem['why_desc'] ;?></p>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach ?> 
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="why-section-learnmore-area  text-center">
						<div class="site-btn">
			  				<a  <?php echo $targett; ?> <?php echo $nofolloww ?> href="<?php echo $btn_link['url']; ?>" class="primary-btn filled-btn text-uppercase"><?php echo $btn_label ?></a>
			  			</div>
					</div>
				</div>
			</div>



		</div>
		 
    </section>

<?php

	}

}