<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class custom_blockqoute_Widget extends \Elementor\Widget_Base {

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
		return 'custom-blockqoute';
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
		return __( 'Custom blockqoute', 'plugin-name' );
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
			'user_name',
			[
				'label' => __( 'Blockqout name', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Rosalina D. William',
			]
		);
        
        $this->add_control(
			'blockqoute_description',
			[
				'label' => __( 'Blockqout description', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation with ullamco laboris nisi ut aliquip ex ea commodo consequat.',
			]
		); 
        $this->add_control(
			'blockqoute_media',
			[
				'label' => __( 'Blockqoute media', 'plugin-name' ),
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

		$user_name = $this->get_settings('user_name'); 
		$blockqoute_description = $this->get_settings('blockqoute_description'); 
		$blockqoute_media = $this->get_settings('blockqoute_media'); 
?>
	
	<div class="custom-blockqoute">
         <div class="custom-blockqoute-inner-content">
         	<p><?php echo $blockqoute_description ?></p>
         	<div class="block-qoute-metaarea d-flex align-items-center">
         		<div class="block-qoute-metaarea-left">
         			<img src="<?php echo $blockqoute_media['url'] ;?>" alt="">
         		</div>
         		<div class="block-qoute-metaarea-right">
         			<p><?php echo $user_name ?></p>
         		</div>
         	</div>
         </div>
    </div>

<?php

	}

}