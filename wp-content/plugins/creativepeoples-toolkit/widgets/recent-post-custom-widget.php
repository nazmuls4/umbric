<?php

// Adds widget: Haribo Recent Blog Posts
class Hariborecentblogpost_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'hariborecentblogpost_widget',
			esc_html__( 'Manulife Recent Blog Posts', 'haribo' ),
			array( 'description' => esc_html__( 'Recent Blog posts for haribo theme with thumbnails', 'haribo' ), ) // Args
		);
	}

	private $widget_fields = array(
		array(
			'label' => 'Posts Per Page',
			'id' => 'rp_post_per_page',
			'type' => 'text',
		),
		array(
			'label' => 'Show Thumbnail',
			'id' => 'rp_show_thumbnail',
			'type' => 'checkbox',
		),
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
?>

        <?php  
            $haribo_rp_query = new WP_Query(array(
                'posts_per_page' => $instance['rp_post_per_page'],
                'post_type' => 'post',
                'orderby' => 'date',
                'order' => 'DESC',
                'post_status' => 'publish',
                'ignore_sticky_posts' => true
            ));
        ?>

        <div class="hrpt_widget_wrapper">
            <?php while($haribo_rp_query->have_posts()) : $haribo_rp_query->the_post(); ?>
            <div class="media">
                <?php if("1" == $instance['rp_show_thumbnail']) : ?>
                <?php if(has_post_thumbnail()) : ?>
                <div class="rcp_thumbnail mr-4" style="background-image:url(<?php echo esc_url(the_post_thumbnail_url()); ?>);"></div>
                <?php else : ?>
                <div class="rcp_thumbnail mr-4 rcp_empty_thumbnail">
                    <span><i class="fa fa-image"></i></span>
                </div>
                <?php endif; ?>
                <?php endif; ?>
                <div class="media-body">
                	<div class="cp_post_date">
                		<p><i class="fa fa-calendar"></i> <?php echo get_the_date( 'd-m-Y' ); ?></p>
                	</div>
                    <h5 class="mt-0 rcp_title"><a href="<?php echo esc_url(the_permalink()); ?>"><?php echo wp_trim_words(get_the_title(), 6, '...'); ?></a></h5> 
                </div>
            </div>
            <?php endwhile; wp_reset_query(); ?>
        </div>
<?php
		
		echo $args['after_widget'];
	}

	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->widget_fields as $widget_field ) {
			$default = '';
			if ( isset($widget_field['default']) ) {
				$default = $widget_field['default'];
			}
			$widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'haribo' );
			switch ( $widget_field['type'] ) {
				case 'checkbox':
					$output .= '<p>';
					$output .= '<input class="checkbox" type="checkbox" '.checked( $widget_value, true, false ).' id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" value="1">';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'haribo' ).'</label>';
					$output .= '</p>';
					break;
				default:
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'haribo' ).':</label> ';
					$output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
					$output .= '</p>';
			}
		}
		echo $output;
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'haribo' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'haribo' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		$this->field_generator( $instance );
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		foreach ( $this->widget_fields as $widget_field ) {
			switch ( $widget_field['type'] ) {
				default:
					$instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
			}
		}
		return $instance;
	}
}

function register_hariborecentblogpost_widget() {
	register_widget( 'Hariborecentblogpost_Widget' );
}
add_action( 'widgets_init', 'register_hariborecentblogpost_widget' );