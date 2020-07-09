<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class wehy_we_are_section_Widget extends \Elementor\Widget_Base {

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
		return 'why-we-area';
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
		return __( 'Why We Are Area', 'plugin-name' );
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
			'common_title_content',
			[
				'label' => __( 'Common Title', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(

			'common_title', [

				'label' => __( 'Common big title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Why we are the best?',
                'label_block' => true,
                
			]

        );  
        $this->add_control( 
			'section_bg', [ 
				'label' => __( 'Section background', 'plugin-domain' ),
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

		$common_title = $this->get_settings('common_title');   
		$section_bg = $this->get_settings('section_bg');  

	?>
 
	
	<section class="why-we-area position-relative">  
          <div class="container">
          	<div class="row">
         		<div class="col-lg-12">
         			<div class="section-title text-center"> 
         				<h1 class="mb-40"><?php echo $common_title; ?></h1>
         			</div>
         		</div>
         	</div> 
          </div>

          <div class="why-we-area-bg">
          	<img src="<?php echo $section_bg['url'] ;?>" alt="">
          </div>
    </section>

<?php

	}

}