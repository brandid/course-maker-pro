<?php
/**
 * Adds a custom On/Off Toggle Switch Control to the Customizer.
 *
 * @package Course Maker Pro
 * @author  thebrandiD
 * @license GPL-2.0+
 * @link    https://thebrandidthemes.com/
 */

if ( class_exists( 'WP_Customize_Control' ) ) {

	/**
	 * Course_Maker_Toggle_Control creates a custom On/Off toggle switch to replace HTML checkboxes.
	 *
	 * @package Course Maker Pro
	 * @var string $type The type of colors to use - light or dark.
	 * @access public
	 */
	class Course_Maker_Toggle_Control extends WP_Customize_Control {
		/**
		 * Determine which color scheme to use.
		 *
		 * @var string $type The type of colors to use - light or dark.
		 */

		public $type = 'light';

		/**
		 * Enqueues the necessary CSS styles for the control.
		 */
		public function enqueue() {
			wp_enqueue_style( genesis_get_theme_handle() . '-toggle-control-css', CHILD_THEME_URI . '/includes/course-maker-toggle-control.css', array(), genesis_get_theme_version() );
			$css = '
    			.disabled-control-title {
    				color: #a0a5aa;
    			}
    			input[type=checkbox].tgl-light:checked + .tgl-btn {
    				background: #0085ba;
    			}
    			input[type=checkbox].tgl-light + .tgl-btn {
    			  background: #a0a5aa;
    			}
    			input[type=checkbox].tgl-light + .tgl-btn:after {
    			  background: #f7f7f7;
    			}
    		';
			wp_add_inline_style( genesis_get_theme_handle() . '-toggle-control-inline-css', $css );
		}

		/**
		 * Enqueues the necessary CSS styles for the control.
		 */
		public function render_content() {
			?>
			<label class="customize-control-title">
				<div style="height: 4px; margin: 0;"></div>
				<div style="display:flex;flex-direction: row;justify-content: flex-start;">
					<span class="customize-control-title" style="flex: 2 0 0; vertical-align: middle;"><?php echo esc_html( $this->label ); ?></span>
					<input id="cb<?php echo esc_attr( $this->instance_number ); ?>" type="checkbox" class="tgl tgl-<?php echo esc_attr( $this->type ); ?>" value="<?php echo esc_attr( $this->value() ); ?>"
											<?php
											$this->link();
											checked( $this->value() );
											?>
					/>
					<label for="cb<?php echo esc_attr( $this->instance_number ); ?>" class="tgl-btn"></label>
				</div>
				<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description" style="margin-top: 6px;"><?php echo esc_attr( $this->description ); ?></span>
				<?php endif; ?>
				<div style="height: 4px; margin: 0;"></div>
				<hr>
			</label>
			<?php
		}

	}

}
