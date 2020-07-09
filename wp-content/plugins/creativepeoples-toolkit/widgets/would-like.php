<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class would_like_section_Widget extends \Elementor\Widget_Base {

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
		return 'would-like';
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
		return __( 'Would like Area', 'plugin-name' );
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
				'default' => 'you’d like us to help you with…',
                'label_block' => true,
                
			]

        ); 
        $this->add_control(

			'common_small_title', [ 
				'label' => __( 'Common small title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Please tell us which option',
                'label_block' => true,
                
			]

        ); 
        $this->add_control( 
			'section_bg', [
				'label' => __( 'Section bg', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA, 
                'label_block' => true,
                
			]

        ); 
        $this->add_control( 
			'section_shape', [
				'label' => __( 'Section shape', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA, 
                'label_block' => true,
                
			]

        ); 

		$this->end_controls_section(); 


		$this->start_controls_section(
			'would_like_list',
			[
				'label' => __( 'Would like list', 'plugin-name' ), 
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new \Elementor\Repeater(); 
 
        
        $repeater->add_control(
			'woule_like_list_icon', [

				'label' => __( 'Would like list icon', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA, 
				'label_block' => true,
            ]
            
        ); 
        
        $repeater->add_control(
			'woule_like_list_title', [

				'label' => __( 'Would like list title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'LOWERING MY RATE',
				'label_block' => true,
            ]
            
        ); 
        
        
		$this->add_control(
			'items',
			[
				'label' => __( 'Would like items', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ woule_like_list_title }}}',
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
		$section_bg = $this->get_settings('section_bg');   
		$section_shape = $this->get_settings('section_shape');   
		$items = $this->get_settings('items');   

?>
 
	
	<section class="would-like-area position-relative pb-180 pt-200" data-background="<?php echo $section_bg['url'] ?>">
		   
		 <div class="would-like-shape"><img src="<?php echo $section_shape['url'] ?>" alt=""></div>	

          <div class="container">
          	<div class="row">
         		<div class="col-lg-12">
         			<div class="section-title text-center">
         				<h3 class="mb-25"><?php echo $common_small_title; ?></h3>
         				<h1 class="mb-70"><?php echo $common_title; ?></h1>
         			</div>
         		</div>
         	</div>
         	<div class="row justify-content-md-center">

         		<?php $count = 0 ;foreach ($items as $key => $item): $count++;?>
						<div class="col-lg-4 col-md-6">
		         			<div class="single-would-like-items position-relative single-like-<?php echo $count ?> text-center">
		         				
		         				<div class="would-like-icon position-relative">
		         					<div class="single-would-like-overlay" data-background="<?php echo get_template_directory_uri(); ?>/assets/img/Ellipse-like.png">
			         					 
			         				</div>
		         					<img src="<?php echo $item['woule_like_list_icon']['url'] ?>" alt="">
		         				</div>
		         				<h1><?php echo $item['woule_like_list_title'] ?></h1>
		         			</div>
		         		</div>         			
         		<?php endforeach ?>

         	</div>
 
          </div>
    </section>

<?php

	}

}