<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Hero_Area_Widget extends \Elementor\Widget_Base {

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
		return 'hero-area';
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
		return __( 'Hero Area', 'plugin-name' );
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
			'hero_area_content_section',
			[
				'label' => __( 'Hero Area Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'hero_area_background',
			[
				'label' => __( 'Hero area background', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);


		$this->add_control(
			'hero_title',
			[
				'label' => __( 'Hero Title', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'Do you want to know the secret to a better tomorrow?',
				'label_block' => true, 
			]
		);

		$this->add_control(
			'hero_area_content',
			[
				'label' => __( 'Hero content', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'We are here to help you navigate all the moving parts of your financial life from financial planning to helping you invest wisely for the future. We do this by first assessing your short and long-term goals before creating a financial plan uniquely tailored to your needs. Let us help you realize your financial dreams.',
				'label_block' => true, 
			]
		);
		
		$this->add_control(
			'btn_lebel',
			[
				'label' => __( 'Btn lebel', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'CLICK HERE',
				'label_block' => true, 
			]
		);
		$this->add_control(
			'btn_links',
			[
				'label' => __( 'Btn Link', 'plugin-domain' ),
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

		 $hero_title = $this->get_settings('hero_title');  
		 $hero_area_content = $this->get_settings('hero_area_content');  
		 $hero_area_background = $this->get_settings('hero_area_background');  
		 $btn_lebel = $this->get_settings('btn_lebel');  
		 $btn_links = $this->get_settings('btn_links');   
		 $target = $settings['btn_links']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_links']['nofollow'] ? ' rel="nofollow"' : '';
		

?>
	
<section class="hero-area position-relative d-flex align-items-center" style="background-image:url(<?php echo $hero_area_background['url']; ?>)">

	  <div class="container">
	  	<div class="row align-items-center">
	  		<div class="col-lg-8">
	  			<div class="hero-area-title">
	  				<?php echo $hero_title; ?>
	  			</div>
	  			<div class="hero-area-description text-center">
	  				<?php echo $hero_area_content; ?>
	  			</div>
	  			<div class="site-btn hero-btn text-center">
	  				<a <?php echo $target ?> <?php echo $nofollow ?> href="<?php echo $btn_links['url'] ?>" class="primary-btn filled-btn text-uppercase"> <span><?php echo $btn_lebel ?> </span>TO FIND OUT HOW</a>
	  			</div>
	  		</div>
	  	</div>
	  </div> 
</section>
<?php

	}

}