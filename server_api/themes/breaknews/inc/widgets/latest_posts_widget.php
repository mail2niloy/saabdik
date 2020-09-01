<?php 

class milliomola_latest_posts_widget extends WP_Widget {

	// Widget Setup
	function __construct() {
		parent::__construct(
			// widget ID
			'milliomola_latest_posts_widget',

			// widget name
			esc_html__( 'milliomola latest posts widget', 'breaknews' ),

			// widget options
			array( 'description' => esc_html__( 'Show Your Latest Posts' , 'breaknews' ) ),

			// control options
			array( 'id_base' => 'milliomola_latest_posts_widget', 'width' => 250, 'height' => 350 )
		);
	}

	// widget frontend
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Latest Posts', 'breaknews' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		// Posts Query
		$posts = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );

		if ($posts->have_posts()) :
		
			echo $args['before_widget'];

			if ( $title ) {
				echo $args['before_title'] . $title . $args['after_title'];
			} ?>
			<div class="widget_breaknews_posts">
			<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
				<div class="sm-post">
					<?php if(has_post_thumbnail()) : ?>
						<a class="sm-post-img img-light" href="<?php echo esc_url( get_permalink() ); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
					<?php endif; ?>
					<a href="<?php the_permalink(); ?>" class="sm-post-title"><?php get_the_title() ? the_title() : the_ID(); ?></a>
				<?php if ( $show_date ) : ?>
					<div class="sm-post-date"><?php echo get_the_date(); ?></div>
				<?php endif; ?>
				</div>
			<?php endwhile; ?>
			</div>

			<?php echo $args['after_widget'];

			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();

		endif;

	}

	// widget backend
	public function form( $instance ) {

		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;

		// admin form
		?>

		<div class="mm-widget">

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'breaknews' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of posts to show:', 'breaknews' ); ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php esc_html_e( 'Display post date?', 'breaknews' ); ?></label></p>

		</div>

		<?php
	}

	// update widget information
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		return $instance;
	}
}


function milliomola_load_latest_posts_widget() {
	register_widget( 'milliomola_latest_posts_widget' );
}

add_action( 'widgets_init', 'milliomola_load_latest_posts_widget' );