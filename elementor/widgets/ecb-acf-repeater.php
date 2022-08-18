<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor ACF Text
 *
 * Elementor widget for ACF Text.
 *
 * @since 1.0.0
 */
class Ecb_Acf_Repeater extends Widget_Base {


    /**
	 * ACF Repeater Field Variable Name
	 *
	 */
	private $repeaterName = 'ecb_repeater';
	private $imageName = 'ecb_image';
	private $descriptionName = 'ecb_description';

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */

	public function get_name() {
		return 'acf-repeater';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'ACF Repeater', 'elementor-acf-repeater' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'elementor-acf-repeater' ];
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {

        $output = '';

        // Check rows exists.
        if( have_rows($this->repeaterName) ):
            // Loop through rows.
            $output .= '<ul>';
            while( have_rows($this->repeaterName) ) : the_row();
                // Load sub field value.
                $output .= '<li>';

                    // Get Image from ACF Field
                    $image = get_sub_field($this->imageName);
                    // Get Description from ACF Field
                    $description = get_sub_field($this->descriptionName);

                    $output .= '<div class="image-holder"><img src="' . $image . '"/></div>';
                    $output .= '<div class="description-holder">' . $description . '</div>';

                $output .= '</li>';
            // End loop.
            endwhile;
            $output .= '</ul>';

            // Display Output
            echo 
            '<div class="' . $this->get_name() . '">' 
            . $output . 
            '</div>';

        else :
            // Display if no value
            echo 'No Value on ACF Repeater Widgets';
            // Do something...
        endif;

       

	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function content_template() {
		?>
		<div class="title">
			{{{ settings.title }}}
		</div>
		<?php
	}
}
