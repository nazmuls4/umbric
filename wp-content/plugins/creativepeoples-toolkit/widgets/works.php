<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class works_section_Widget extends \Elementor\Widget_Base {

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
		return 'works';
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
		return __( 'Works Area', 'plugin-name' );
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
				'default' => 'How it works',
                'label_block' => true,
                
			]

        ); 

		$this->end_controls_section();



		$this->start_controls_section(
			'work_list_content',
			[
				'label' => __( 'Works List Content', 'plugin-name' ),

				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );
        
        $repeater = new \Elementor\Repeater();


        $repeater->add_control( 
			'work_icon', [

				'label' => __( 'Works Icon', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
                
			]

        ); 
        
        $repeater->add_control(
			'works_content', [

				'label' => __( 'Single Features Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Mortgage Agent contacts you within minutes and goes over file!',
				'label_block' => true,
            ]
            
        ); 
        
        
		$this->add_control(
			'works_item',
			[
				'label' => __( 'Single Works Items', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ works_content }}}',
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
		$work_icon = $this->get_settings('work_icon');  
		$works_content = $this->get_settings('works_content');
		$works_item = $this->get_settings('works_item');

?>
	 
	
	<section class="works-area position-relative">
         <div class="container">
         	<div class="row">
         		<div class="col-lg-12">
         			<div class="section-title text-center">
         				<h1 class="mb-70"><?php echo $common_title; ?></h1>
         			</div>
         		</div>
         	</div>
         	<div class="works-list-row-outer position-relative">
         		<div class="works-list-shape">
         			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape-1.png" alt="">
         		</div>
         		<div class="works-list-shape-2">
         			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape-2.png" alt="">
         		</div>
	         	<div class="row justify-content-md-center justify-content-sm-center">
	         		<?php 

	         		$cout = 0;

	         		foreach ($works_item as $key => $items): 
	         			$cout++;

	         		?>
	         			<div class="col-lg-4 col-md-6 col-sm-6">
	         				<div class="single-works-list work-items-<?php echo $cout; ?> position-relative text-center">
	         					<div class="work-list-icon">
	         						<div class="work-list-icon-inner-row">
	         							<img src="<?php echo $items['work_icon']['url']; ?>" alt="">
	         						</div> 
	         					</div>
	         					<div class="works-list-innter-content  mt-40">
	         						<h3><?php echo $items['works_content']; ?></h3>
	         					</div>
	         				</div>
	         			</div>
	         		<?php endforeach ?>
	         	</div>
         	</div>
         </div>
    </section>

<?php

	}

}