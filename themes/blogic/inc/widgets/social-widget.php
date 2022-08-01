<?php
if ( ! class_exists( 'Blogic_Social_Widget' ) ) {
	/**
	 * Adds Blogic Social Widget.
	 */
	class Blogic_Social_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			$blogic_social_widget = array(
				'classname'   => 'widget adore-widget social-widget',
				'description' => __( 'Retrive Social Widget', 'blogic' ),
			);
			parent::__construct(
				'blogic_social_widget',
				__( 'Blogic Social Widget', 'blogic' ),
				$blogic_social_widget
			);
		}

		/**
		 * Front-end display of widget.

		 * @see WP_Widget::widget()

		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}
			$section_title      = ! empty( $instance['title'] ) ? $instance['title'] : '';
			$section_title      = apply_filters( 'widget_title', $section_title, $instance, $this->id_base );
			$open_link_new_tab  = ! empty( $instance['open_link_new_tab'] ) ? true : false;
			$target             = empty( $open_link_new_tab ) ? '' : 'target="_blank"';
			$social_link_number = isset( $instance['social_link_number'] ) ? absint( $instance['social_link_number'] ) : 3;

			echo $args['before_widget'];
			if ( ! empty( $section_title ) ) {
				echo $args['before_title'] . esc_html( $section_title ) . $args['after_title'];
			}
			?>

		<div class="adore-widget-body">
			<div class="social-widgets-wrap author-social-contacts">
				<?php
				for ( $i = 1; $i <= $social_link_number; $i++ ) {
					$link = ( ! empty( $instance[ 'link' . '-' . $i ] ) ) ? $instance[ 'link' . '-' . $i ] : '';
					if ( ! empty( $link ) ) :
						?>
						<a href="<?php echo esc_url( $link ) . '" ' . esc_attr( $target ); ?>"></a>
						<?php
					endif;
				}
				?>
			</div>
		</div>

			<?php
			echo $args['after_widget'];
		}

		/**
		 * Back-end widget form.

		 * @see WP_Widget::form()

		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			$section_title      = isset( $instance['title'] ) ? $instance['title'] : '';
			$social_link_number = isset( $instance['social_link_number'] ) ? absint( $instance['social_link_number'] ) : 3;
			$open_link_new_tab  = isset( $instance['open_link_new_tab'] ) ? $instance['open_link_new_tab'] : false;
			?>

	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Section Title:', 'blogic' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $section_title ); ?>" />
	</p>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'social_link_number' ) ); ?>"><?php esc_html_e( 'Number of links to show:', 'blogic' ); ?></label>
		<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'social_link_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'social_link_number' ) ); ?>" type="number" step="1" min="1" max="6" value="<?php echo absint( $social_link_number ); ?>" size="3" />
	</p>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'open_link_new_tab' ) ); ?>"><?php esc_html_e( 'Open Social link in New Tab', 'blogic' ); ?>:</label>
		<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'open_link_new_tab' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'open_link_new_tab' ), 'blogic' ); ?>"  <?php checked( $open_link_new_tab, true ); ?> />
	</p>
			<?php
			for ( $i = 1; $i <= $social_link_number; $i++ ) {
				$link = isset( $instance[ 'link' . '-' . $i ] ) ? $instance[ 'link' . '-' . $i ] : '';
				?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'link' . '-' . $i ) ); ?>"><?php sprintf( esc_html__( 'Link %s :', 'blogic' ), $i ); ?></label>
			<input type="url" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' . '-' . $i ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' . '-' . $i ) ); ?>" value="<?php echo esc_url( $link ); ?>"/>
		</p>
			<?php } ?>

				<?php
		}

		/**
		 * Sanitize widget form values as they are saved.

		 * @see WP_Widget::update()

		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.

		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {

			$instance                       = $old_instance;
			$instance['title']              = sanitize_text_field( $new_instance['title'] );
			$instance['social_link_number'] = absint( $new_instance['social_link_number'] );
			$instance['open_link_new_tab']  = blogic_sanitize_checkbox( $new_instance['open_link_new_tab'] );
			for ( $i = 1; $i <= $instance['social_link_number']; $i++ ) {
				$instance[ 'link' . '-' . $i ] = esc_url_raw( $new_instance[ 'link' . '-' . $i ] );
			}

			return $instance;
		}

	}
}
