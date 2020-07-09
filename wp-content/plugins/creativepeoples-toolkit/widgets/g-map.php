<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class gmap_section_Widget extends \Elementor\Widget_Base {

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
		return 'gmap-area';
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
		return __( 'Gmap Area', 'plugin-name' );
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
			'G_map_content',
			[
				'label' => __( 'Custom google map', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
		$gallery = $this->get_settings('gallery');  
		

?>
<style>
	.map{
		height: 655px;
	}
</style>
<script>
	 jQuery(window).load(function() {
 			 // Gmap 3 Active
        jQuery('.map')
            .gmap3({
                center: [23.626891, 90.507916],
                zoom: 13,
                scrollwheel: false,
            })
            .marker([
                { position: [23.626891, 90.507916] },
                { address: "86000 Poitiers, France" },
                { address: "66000 Perpignan, France", icon: "https://maps.google.com/mapfiles/marker_grey.png" }
            ])
            .on('click', function(marker) {
                marker.setIcon('https://maps.google.com/mapfiles/marker_green.png');
            });

    });
</script>

 <div class="contact-us-map position-relative" >
    <div class="container-fluid">
        <div class="row mapp-row">
            <div class="col-lg-12">
                <div class="map-wrapper">
                	<div class="map"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

	}

}