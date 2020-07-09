<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class home_easy_section_Widget extends \Elementor\Widget_Base {

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
		return 'home-easy';
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
		return __( 'Home easy Area', 'plugin-name' );
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
				'default' => 'Having a HOME easy…',
                'label_block' => true,
                
			]

        ); 
        $this->add_control(

			'common_small_title', [

				'label' => __( 'Common small title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'How we make',
                'label_block' => true,
                
			]

        ); 

		$this->end_controls_section(); 

		$this->start_controls_section(
			'Hone_easy_list',
			[
				'label' => __( 'Home Easy list', 'plugin-name' ),

				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new \Elementor\Repeater(); 
 
        
        $repeater->add_control(
			'homw_easy_list_title', [

				'label' => __( 'Home easy list title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Buying a Property',
				'label_block' => true,
            ]
            
        ); 
        $repeater->add_control(
			'homw_easy_list_content', [

				'label' => __( 'Home easy list content', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '',
				'label_block' => true,
            ]
            
        ); 
        
        
		$this->add_control(
			'home_easy_items',
			[
				'label' => __( 'Home easy items', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ homw_easy_list_title }}}',
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
		$common_small_title = $this->get_settings('common_small_title');  
		$home_easy_items = $this->get_settings('home_easy_items');  

?>
 
	
	<section class="home-easy-area position-relative">
		
		 
          <div class="container">
          	<div class="row">
         		<div class="col-lg-12">
         			<div class="section-title text-center">
         				<h3 class="mb-25"><?php echo $common_small_title; ?></h3>
         				<h1 class="mb-70"><?php echo $common_title; ?></h1>
         			</div>
         		</div>
         	</div>

          	<div class="row">
				<?php foreach ($home_easy_items as $key => $homelist): ?>
					 <div class="col-lg-6 col-md-6">
	          		 	<div class="single-home-easy-item-wrapper">
	          		 		<h3 class="mb-40"><?php echo $homelist['homw_easy_list_title'] ;?></h3> 
	          		 		<div class="home-easy-inner-content">
	          		 			<?php echo $homelist['homw_easy_list_content'] ;?>
	          		 		</div>
	          		 	</div>
	          		 </div>
				<?php endforeach; ?> 

          	</div>
          </div>
    </section>

<?php

	}

}