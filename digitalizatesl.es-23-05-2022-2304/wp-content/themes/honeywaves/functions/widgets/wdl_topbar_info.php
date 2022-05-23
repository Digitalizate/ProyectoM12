<?php

// Register and load the widget
function honeywaves_header_topbar_info_widget() {
    register_widget('honeywaves_header_topbar_info_widget');
}

add_action('widgets_init', 'honeywaves_header_topbar_info_widget');

// Creating the widget
class honeywaves_header_topbar_info_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'honeywaves_header_topbar_info_widget', // Base ID
                esc_html__('HoneyWaves: Header info widget', 'honeywaves'), // Widget Name
                array(
                    'classname' => 'honeywaves_header_topbar_info_widget',
                    'description' => esc_html__('Topbar header info widget.', 'honeywaves'),
                ),
                array(
                    'width' => 600,
                )
        );
            /* enqueue script  */
            add_action( 'admin_enqueue_scripts', array( $this, 'honeywaves_header_topbar_info_style' ) );
     }
    public function honeywaves_header_topbar_info_style(){?>
        <style type="text/css">
            .customize-control-widget_form .widget-control-save {
                display: block!important;
            }
        </style>
    <?php }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        ?>
        <ul class="head-contact-info">
            <li>
                <?php if (!empty($instance['fa_icon'])) { ?>
                    <i class="fa <?php echo esc_attr($instance['fa_icon']); ?>"></i>
                <?php }
                if (!empty($instance['description'])) {
                    echo esc_html($instance['description']);
                }?>
            </li>

            <li>
                <?php if (!empty($instance['honeywaves_email'])) { ?>
                    <i class="fa <?php echo esc_attr($instance['honeywaves_email']); ?>"></i>
                <?php }
                if (!empty($instance['honeywaves_email_id'])) {
                    echo '<a href="mailto:' . esc_attr($instance['honeywaves_email_id']) . '">';

                    echo esc_html($instance['honeywaves_email_id']);
                    echo '</a>';
                }?>
            </li>
        </ul>
        <?php
        echo $args['after_widget'];
    }

    // Widget Backend
    public function form($instance) {

        if (isset($instance['fa_icon'])) {
            $fa_icon = $instance['fa_icon'];
        } else {
            $fa_icon = 'fa fa-phone';
        }

        if (isset($instance['description'])) {
            $description = $instance['description'];
        } else {
            $description = esc_html__('+99 999-999-9999', 'honeywaves');
        }

        if (isset($instance['honeywaves_email'])) {
            $honeywaves_email = $instance['honeywaves_email'];
        } else {
            $honeywaves_email = 'fa fa-envelope-o';
        }

        if (isset($instance['honeywaves_email_id'])) {
            $honeywaves_email_id = $instance['honeywaves_email_id'];
        } else {
            $honeywaves_email_id = esc_html__('abc@example.com', 'honeywaves');
        }

        // Widget admin form
        ?>

        <label for="<?php echo esc_attr($this->get_field_id('fa_icon')); ?>"><?php esc_html_e('Font Awesome icon', 'honeywaves'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('fa_icon')); ?>" name="<?php echo esc_attr($this->get_field_name('fa_icon')); ?>" type="text" value="<?php
        if ($fa_icon)
            echo esc_attr($fa_icon);
        ?>" />
        <span><?php esc_html_e('Link to get Font Awesome icons', 'honeywaves'); ?><a href="<?php echo esc_url('http://fortawesome.github.io/Font-Awesome/icons/', 'honeywaves'); ?>" target="_blank" ><?php esc_html_e('fa-icon', 'honeywaves'); ?></a></span>
        <br><br>

        <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php esc_html_e('Phone', 'honeywaves'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>" type="text" value="<?php
        if ($description)
            echo esc_attr(htmlspecialchars_decode($description)); ?>" /><br><br>

        <label for="<?php echo esc_attr($this->get_field_id('honeywaves_email')); ?>"><?php esc_html_e('Font Awesome icon', 'honeywaves'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('honeywaves_email')); ?>" name="<?php echo esc_attr($this->get_field_name('honeywaves_email')); ?>" type="text" value="<?php
        if ($honeywaves_email)
            echo esc_attr($honeywaves_email);
        ?>" />
        <span><?php esc_html_e('Link to get Font Awesome icons', 'honeywaves'); ?><a href="<?php echo esc_url('http://fortawesome.github.io/Font-Awesome/icons/', 'honeywaves'); ?>" target="_blank" ><?php esc_html_e('fa-icon', 'honeywaves'); ?></a></span><br><br>

        <label for="<?php echo esc_attr($this->get_field_id('honeywaves_email_id')); ?>"><?php esc_html_e('Email', 'honeywaves'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('honeywaves_email_id')); ?>" name="<?php echo esc_attr($this->get_field_name('honeywaves_email_id')); ?>" type="text" value="<?php
               if ($honeywaves_email_id)
                   echo esc_attr(htmlspecialchars_decode($honeywaves_email_id));
               ?>" /><br><br>

        <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {

        $instance = array();
        $instance['fa_icon'] = (!empty($new_instance['fa_icon']) ) ? honeywaves_sanitize_text($new_instance['fa_icon']) : '';
        $instance['description'] = (!empty($new_instance['description']) ) ? honeywaves_sanitize_text($new_instance['description']) : '';
        $instance['honeywaves_email'] = (!empty($new_instance['honeywaves_email']) ) ? honeywaves_sanitize_text($new_instance['honeywaves_email']) : '';
        $instance['honeywaves_email_id'] = (!empty($new_instance['honeywaves_email_id']) ) ? honeywaves_sanitize_text($new_instance['honeywaves_email_id']) : '';

        return $instance;
    }

}
