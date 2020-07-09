<?php

/**

 * Elementor oEmbed Widget.

 *

 * Elementor widget that inserts an embbedable content into the page, from any given URL.

 *

 * @since 1.0.0

 */

class service_Section_Widget extends \Elementor\Widget_Base {



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

		return 'services';

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

		return __( 'Our service', 'plugin-name' );

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

				'type' => \Elementor\Controls_Manager::TEXT,

				'label_block' => true,

				'default' => 'A Better Tomorrow',

			]

		);

        

        $this->add_control(

			'section_small_title',

			[

				'label' => __( 'Section Small Title', 'plugin-name' ),

				'type' => \Elementor\Controls_Manager::TEXT,

				'label_block' => true,

				'default' => 'OUR SERVICES',

			]

		); 



		$this->end_controls_section();



		// service list

		$this->start_controls_section(

			'servicce_list',

			[

				'label' => __( 'Service list', 'plugin-name' ),

				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,

			]

		);

		$repeater = new \Elementor\Repeater();



		$repeater->add_control(

			'list_thumbnail', [

				'label' => __( 'List thumbnail', 'plugin-domain' ),

				'type' => \Elementor\Controls_Manager::MEDIA, 

				'label_block' => true,

			]

		);

		$repeater->add_control(

			'list_title', [

				'label' => __( 'Title', 'plugin-domain' ),

				'type' => \Elementor\Controls_Manager::TEXTAREA,

				'default' => __( 'Short-Term & Medium-Term Goals' , 'plugin-domain' ),

				'label_block' => true,

			]

		);



		$repeater->add_control(

			'list_content', [

				'label' => __( 'Content', 'plugin-domain' ),

				'type' => \Elementor\Controls_Manager::WYSIWYG,

				'default' => __( 'This is where we look for solutions on how to improve your current financial life. This includes debt reduction, tax reduction, purchasing a home, family related expenses, starting a...' , 'plugin-domain' ),

				'show_label' => false,

			]

		);

		$repeater->add_control(

			'btn_label', [

				'label' => __( 'Button label', 'plugin-domain' ),

				'type' => \Elementor\Controls_Manager::TEXT,

				'default' => __( 'read more' , 'plugin-domain' ),

				'show_label' => false,

			]

		);

		$repeater->add_control(

			'btn_link',

			[

				'label' => __( 'Button Link', 'plugin-domain' ),

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

			'list',

			[

				'label' => __( 'Service List', 'plugin-domain' ),

				'type' => \Elementor\Controls_Manager::REPEATER,

				'fields' => $repeater->get_controls(), 

				'title_field' => '{{{ list_title }}}',

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

		$list = $this->get_settings('list');    

?>

	

	<section class="brands-area">

        <div class="container">

			<div class="row">

				<div class="col-lg-12">

					<div class="section-title text-center">

						<h1><?php echo $section_big_title; ?></h1>

						<h3><?php echo $section_small_title; ?></h3>

					</div>

				</div>

			</div>

			<div class="row justify-content-center">



				<?php foreach ($list as $key => $listitems): 

					$targett = $listitems['btn_link']['is_external'] ? ' target="_blank"' : '';

					$nofolloww = $listitems['btn_link']['nofollow'] ? ' rel="nofollow"' : '';	

				?> 

				<div class="col-lg-4 col-md-6">

					<div class="our-single-service-list text-center position-relative">

						<div class="service-icon">

							<img src="<?php echo $listitems['list_thumbnail']['url']; ?>" alt="">

						</div>

						<div class="service-desc-title">

							<h3><?php echo $listitems['list_title']; ?></h3>

						</div>

						<div class="service-desc-short">

							<?php echo $listitems['list_content']; ?>

						</div>

						<div class="service-readmore-btn">

							<a <?php echo $targett ?> <?php echo $nofolloww ?> href="<?php echo $listitems['btn_link']['url']; ?>"><?php echo $listitems['btn_label']; ?></a>

						</div>

					</div>

				</div>

				<?php endforeach ;?>



			</div>



		</div>

    </section>



<?php



	}



}