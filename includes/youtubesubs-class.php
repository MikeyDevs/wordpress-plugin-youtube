<?php 
/**
 * Adds YouTube_Subs_Widget widget.
 */

class YouTube_Subs_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'youtubesubs_widget', // Base ID
			esc_html__( 'YouTube Subs', 'yts_domain' ), // Name
			array( 'description' => esc_html__( 'Widget to display YouTube subscriptions', 'yts_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see YouTube_Subs_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
        echo $args['before_widget']; //What you want to display before widget
        
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        
        //Widget content
        echo '<div class="g-ytsubscribe" data-channel="'.$instance['channel'].'" data-layout="'.$instance['layout'].'" data-count="'.$instance['count'].'"></div>';
        
		echo $args['after_widget']; //What you want to display after widget
	}

	/**
	 * Back-end widget form.
	 *
	 * @see YouTube_Subs_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'YouTube Subs', 'yts_domain' );
        $channel = ! empty( $instance['channel'] ) ? $instance['channel'] : esc_html__( 'TEDEducation', 'yts_domain' );
        $layout = ! empty( $instance['layout'] ) ? $instance['layout'] : esc_html__( 'default', 'yts_domain' );
        $count = ! empty( $instance['count'] ) ? $instance['count'] : esc_html__( 'default', 'yts_domain' );
        
        ?>

      <!-- TITLE -->
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
          <?php esc_attr_e( 'Title:', 'yts_domain' ); ?>
        </label> 

        <input 
          class="widefat" 
          id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
          name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
          type="text" 
          value="<?php echo esc_attr( $title ); ?>">
      </p>

      <!-- CHANNEL -->
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>">
          <?php esc_attr_e( 'Channel:', 'yts_domain' ); ?>
        </label> 

        <input 
          class="widefat" 
          id="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>" 
          name="<?php echo esc_attr( $this->get_field_name( 'channel' ) ); ?>" 
          type="text" 
          value="<?php echo esc_attr( $channel ); ?>">
      </p>

      <!-- LAYOUT -->
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>">
          <?php esc_attr_e( 'Layout:', 'yts_domain' ); ?>
        </label> 

        <select 
          class="widefat" 
          id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" 
          name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>">
          <option value="default" <?php echo ($layout == 'default') ? 'selected' : ''; ?>>
            Default
          </option>
          <option value="full" <?php echo ($layout == 'full') ? 'selected' : ''; ?>>
            Full
          </option>
        </select>
      </p>

      <!-- COUNT -->
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>">
          <?php esc_attr_e( 'Count:', 'yts_domain' ); ?>
        </label> 

        <select 
          class="widefat" 
          id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" 
          name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>">
          <option value="default" <?php echo ($count == 'default') ? 'selected' : ''; ?>>
            Default
          </option>
          <option value="hidden" <?php echo ($count == 'hidden') ? 'selected' : ''; ?>>
            Hidden
          </option>
        </select>
      </p>

	<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see YouTube_Subs_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['channel'] = ( ! empty( $new_instance['channel'] ) ) ? sanitize_text_field( $new_instance['channel'] ) : '';
        $instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? sanitize_text_field( $new_instance['layout'] ) : '';
        $instance['count'] = ( ! empty( $new_instance['count'] ) ) ? sanitize_text_field( $new_instance['count'] ) : '';

		return $instance;
	}

} // class YouTube_Subs_Widget