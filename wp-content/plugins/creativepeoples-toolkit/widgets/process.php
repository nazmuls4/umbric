<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class process_section_Widget extends \Elementor\Widget_Base {

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
		return 'process';
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
		return __( 'Process Area', 'plugin-name' );
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
				'default' => 'Get’s for all 3 types of clients were service…',
                'label_block' => true,
                
			]

        ); 
        $this->add_control(

			'common_small_title', [ 
				'label' => __( 'Common small title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'We at Revise make it very simple!',
                'label_block' => true,
                
			]

        ); 
         

		$this->end_controls_section(); 



		$this->start_controls_section(
			'process_list_content',
			[
				'label' => __( 'Process List Content', 'plugin-name' ),

				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );
        
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'process_style',
			[
				'label' => __( 'Process Style', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'  => __( 'Style 1', 'plugin-domain' ), 
					'2'  => __( 'Style 2', 'plugin-domain' ), 
				],
			]
		);



        $repeater->add_control( 
			'process_list_image', [

				'label' => __( 'Process link', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
                
			]

        ); 
        
        $repeater->add_control(
			'peocess_small_title', [

				'label' => __( 'Process small title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Step  1',
				'label_block' => true,
            ]
            
        ); 
        
        $repeater->add_control(
			'peocess_big_title', [

				'label' => __( 'Process big title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Completing our online application',
				'label_block' => true,
            ]
            
        ); 
        
        $repeater->add_control(
			'process_description', [

				'label' => __( 'Process description', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'It can take as few as 3 minutes and can save you a ton of money and time doing it elsewhere.',
				'label_block' => true,
            ]
            
        ); 
        
        
		$this->add_control(
			'item',
			[
				'label' => __( 'Process list', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ peocess_small_title }}}',
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
		$item = $this->get_settings('item'); 

?>
	 
	
	<section class="process-area position-relative">
         <div class="container">

         	<div class="row">
         		<div class="col-lg-12">
         			<div class="section-title text-center">
         				<h3 class="mb-25"><?php echo $common_small_title; ?></h3>
         				<h1 class="mb-70"><?php echo $common_title; ?></h1>
         			</div>
         		</div>
         	</div>

         	<?php foreach ($item as $key => $items): ?>
         		   <?php if ($items['process_style'] == '1'): ?>
		         		<div class="process-outer-row"> 
			         		<div class="row align-items-center"> 
				         		<div class="col-lg-6 col-md-6 order-lg-1 order-md-1">
				         			<div class="process-image">
				         				<img src="<?php echo $items['process_list_image']['url']; ?>" alt="">
				         			</div>
				         		</div>
				         		<div class="col-lg-6 col-md-6 order-lg-2 oder-md-2">
				         			<div class="process-inner-content">
				         				<h4 class="mb-25"><?php echo $items['peocess_small_title'] ?></h4>
				         				<h1><?php echo $items['peocess_big_title'] ?></h1>
				         				<div class="process-description">
				         					<?php echo $items['process_description'] ?>
				         				</div>
				         			</div> 
				         		</div> 
				         	</div>
			         	</div>

		         	<?php else: ?>
		         		<div class="process-outer-row">
			         		<div class="row align-items-center"> 
				         		<div class="col-lg-6 col-md-6 order-lg-2 order-md-2">
				         			<div class="process-image">
				         				<img src="<?php echo $items['process_list_image']['url']; ?>" alt="">
				         			</div>
				         		</div>
				         		<div class="col-lg-6 col-md-6 order-lg-1 order-md-1">
				         			<div class="process-inner-content">
				         				<h4 class="mb-25"><?php echo $items['peocess_small_title'] ?></h4>
				         				<h1><?php echo $items['peocess_big_title'] ?></h1>
				         				<div class="process-description">
				         					<?php echo $items['process_description'] ?>
				         				</div>
				         			</div> 
				         		</div> 
				         	</div>
			         	</div>
		         	<?php endif ;?> 
         	<?php endforeach ;?>

      

         </div>
    </section>

<?php

	}

}