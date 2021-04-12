<?php
/*
QUOTE
 */
class VH_Quote_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct('vh_widget_quote', 'Custom quote with link', [
            'classname' => 'widget-quote',
            'description' => 'Custom quote with link',
        ]);
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];

        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        ?>

        <div class="c-widget-quote">
            <div class="c-widget-quote__content">
                <div class="c-widget-quote__text">
                    <?php echo $instance['quote']; ?>
                </div>

                <a href="<?php echo $instance['link']; ?>" class="c-widget-quote__link" target="_blank">
                    Read more
                </a>
            </div>
        </div>

        <?php
        echo $args['after_widget'];
    }

    public function form($instance) {
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">Title:</label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'quote' ) ); ?>">Quote:</label>
            <textarea rows="5" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'quote' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'quote' ) ); ?>"><?php echo esc_attr( $instance['quote'] ); ?></textarea>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>">Link:</label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['link'] ); ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = [];
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['quote'] = ( ! empty( $new_instance['quote'] ) ) ? strip_tags( $new_instance['quote'] ) : '';
        $instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';

        return $instance;
    }
}

add_action('widgets_init', function() {
    register_widget('VH_Quote_Widget');
});
