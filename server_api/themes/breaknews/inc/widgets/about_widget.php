<?php 

class milliomola_about_widget extends WP_Widget {

	// Widget Setup
	function __construct() {
		parent::__construct(
			// widget ID
			'milliomola_about_widget',

			// widget name
			esc_html__( 'milliomola about widget', 'breaknews' ),

			// widget options
			array( 'description' => esc_html__( 'About Section With Picture And Description' , 'breaknews' ) ),

			// control options
			array( 'id_base' => 'milliomola_about_widget', 'width' => 250, 'height' => 350 )
		);
	}

	// widget frontend
	function widget( $args, $instance ) {

		// widget settings variables
		$title =  apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'] );
		$image = ! empty( $instance['image'] ) ? $instance['image'] : '';
		$round = ! empty( $instance['round'] ) ? '1' : '0';
		$description = ! empty( $instance['description'] ) ? $instance['description'] : '';

		echo $args['before_widget'];
		if( !empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
			?>

			<div class="widget_about">

				<?php if( $image ) : ?>
					<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_html($title); ?>" <?php if( $round ) : ?>class="round50"<?php endif; ?>>
				<?php endif; ?>
				<?php if( $description ) : ?>
					<p><?php echo wp_kses_post( $description ) ; ?></p>
				<?php endif; ?>

			</div>

			<?php
		}
		echo $args['after_widget'];
	}

	// widget backend
	function form( $instance ) {

		// Widget default values
		$defaults = array( 'title' => 'About Me', 'image' => '', 'round' => '', 'description' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults );

		// Widget settings values
		$title = $instance['title'];
		$image = $instance['image'];
		$round = $instance['round'];
		$description = $instance['description'];

		// admin form
		?>

		<div class="mm-widget">

		<!-- Widget Title -->
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title :', 'breaknews'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>">
		</p>

		<!-- Image URL -->
		<p>
			<label for="<?php echo $this->get_field_id('image'); ?>"><?php esc_html_e('Image URL :', 'breaknews'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" value="<?php echo esc_url($image) ?>">
		</p>

		<!-- Image Round -->
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Make Image Circle :', 'breaknews'); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id('round'); ?>" name="<?php echo $this->get_field_name('round'); ?>" <?php checked( (bool) $round, true ); ?>>
		</p>

		<!-- Description -->
		<p>
			<label for="<?php echo $this->get_field_id('description'); ?>"><?php esc_html_e('Description :', 'breaknews'); ?></label>
			<textarea id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>"><?php echo $description; ?></textarea>
		</p>

		</div>

		<?php
	}

	// update widget information
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title']       =  strip_tags( $new_instance['title'] );
		$instance['image']       =  strip_tags( $new_instance['image'] );
		$instance['round']       =  $new_instance['round'];
		$instance['description'] =  $new_instance['description'];

		return $instance;
	}
}


function milliomola_load_about_widget() {
	register_widget( 'milliomola_about_widget' );
}

add_action( 'widgets_init', 'milliomola_load_about_widget' );