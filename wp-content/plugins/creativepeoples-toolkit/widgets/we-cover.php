<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class we_cover_section_Widget extends \Elementor\Widget_Base {

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
		return 'we-cover';
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
		return __( 'We Cover Area', 'plugin-name' );
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
				'default' => 'Areas we Cover',
                'label_block' => true,
                
			]

        );  
		$this->end_controls_section();  


		$this->start_controls_section(
			'we_cover_left_list',
			[
				'label' => __( 'We cover left list content', 'plugin-name' ),

				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        ); 

        $this->add_control( 
			'we_cover_left_image', [

				'label' => __( 'We cover list thumbnail', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
                
			]

        ); 
        
        $this->add_control(
			'we_cover_list_list_title', [

				'label' => __( 'We cover list title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Alberta',
				'label_block' => true,
            ]
            
        ); 
        
        $this->add_control(
			'we_cover_left_content', [

				'label' => __( 'We cover content', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',
				'label_block' => true,
            ]
            
        ); 

        $this->add_control(
			'we_cover_left_btn_label', [

				'label' => __( 'We cover btn labek', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Read More',
				'label_block' => true,
            ]
            
        ); 

        $this->add_control(
			'we_cover_left_btn_link',
			[
				'label' => __( 'Link', 'plugin-domain' ),
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



		$this->start_controls_section(
			'we_cover_list',
			[
				'label' => __( 'We cover list content', 'plugin-name' ),

				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );
        
        $repeater = new \Elementor\Repeater();


        $repeater->add_control( 
			'we_cover_right_image', [

				'label' => __( 'We cover list thumbnail', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
                
			]

        ); 
        
        $repeater->add_control(
			'we_cover_right_list_title', [

				'label' => __( 'We cover list title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Alberta',
				'label_block' => true,
            ]
            
        ); 
        
        $repeater->add_control(
			'we_cover_right_content', [

				'label' => __( 'We cover content', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna',
				'label_block' => true,
            ]
            
        ); 

        $repeater->add_control(
			'we_cover_right_btn_label', [

				'label' => __( 'We cover btn labek', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Read More',
				'label_block' => true,
            ]
            
        ); 

        $repeater->add_control(
			'we_cover_right_btn_link',
			[
				'label' => __( 'Link', 'plugin-domain' ),
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
        
        
        
		$this->add_control(
			'we_cover_right_list',
			[
				'label' => __( 'Single Works Items', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ we_cover_right_list_title }}}',
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
		$we_cover_right_list = $this->get_settings('we_cover_right_list');    
		$we_cover_left_image = $this->get_settings('we_cover_left_image');    
		$we_cover_list_list_title = $this->get_settings('we_cover_list_list_title');    
		$we_cover_left_content = $this->get_settings('we_cover_left_content');    
		$we_cover_left_btn_label = $this->get_settings('we_cover_left_btn_label');    
		$we_cover_left_btn_link = $this->get_settings('we_cover_left_btn_link');    

		$targett = $settings['we_cover_left_btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofolloww = $settings['we_cover_left_btn_link']['nofollow'] ? ' rel="nofollow"' : '';

	?>
 
	
	<section class="home-easy-area position-relative pt-160 pb-150">  
          <div class="container">
          	<div class="row align-items-center">
          		<div class="col-lg-6 col-md-6">
          			<div class="section-title">
         				<h1 class="mb-140"><?php echo $common_title; ?></h1>
         			</div>

         			<div class="single-why-list">
          				<div class="single-why-list-image mb-30">
          					<img src="<?php echo $we_cover_left_image['url'] ?>" alt="">
          				</div>
          				<h3 class="mb-20"><?php echo $we_cover_list_list_title; ?></h3>
          				<div class="why-cover-list-inner-content">
          					<p><?php echo $we_cover_left_content ?></p>
          				</div>
          				<div class="why-cover-btn">
          					<a <?php echo $targett ?> <?php echo $nofolloww ?> href="<?php echo $we_cover_left_btn_link['url'] ?>"><?php echo $we_cover_left_btn_label ?></a>
          				</div>
          			</div>

          		</div>
          		<div class="col-lg-6 col-md-6">

          			<?php foreach ($we_cover_right_list as $key => $wecoverrightlist): 

          				$target = $wecoverrightlist['we_cover_right_btn_link']['is_external'] ? ' target="_blank"' : '';
						$nofollow = $wecoverrightlist['we_cover_right_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
						

          			?>
          				<div class="single-why-list">
	          				<div class="single-why-list-image mb-30">
	          					<img src="<?php echo $wecoverrightlist['we_cover_right_image']['url'] ?>" alt="">
	          				</div>
	          				<h3 class="mb-20"><?php echo $wecoverrightlist['we_cover_right_list_title'] ;?></h3>
	          				<div class="why-cover-list-inner-content">
	          					<p><?php echo $wecoverrightlist['we_cover_right_content'] ;?></p>
	          				</div>
	          				<div class="why-cover-btn">
	          					<a <?php echo $target; ?> <?php echo $nofollow; ?>  href="<?php echo $wecoverrightlist['we_cover_right_btn_link']['url'] ;?>"><?php echo $wecoverrightlist['we_cover_right_btn_label'] ;?></a>
	          				</div>
	          			</div>
          			<?php endforeach ;?>

          			

          		</div>
          	</div>
          </div>
    </section>

<?php

	}

}