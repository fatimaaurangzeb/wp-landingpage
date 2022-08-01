<?php
/**
 * Adore Themes Customizer
 *
 * @package Blogic
 *
 * Custom Controller
 */

class Blogic_Toggle_Checkbox_Custom_control extends WP_Customize_Control {
	public $type = 'toogle_checkbox';

	public function render_content() {
		?>
		<div class="checkbox_switch">
			<div class="onoffswitch">
				<input type="checkbox" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" class="onoffswitch-checkbox" value="<?php echo esc_attr( $this->value() ); ?>" 
													  <?php
														$this->link();
														checked( $this->value() );
														?>
				>
				<label class="onoffswitch-label" for="<?php echo esc_attr( $this->id ); ?>"></label>
			</div>
			<span class="customize-control-title onoffswitch_label"><?php echo esc_html( $this->label ); ?></span>
			<p><?php echo wp_kses_post( $this->description ); ?></p>
		</div>
		<?php
	}
}

class Blogic_Customize_Control_Sort_Sections extends WP_Customize_Control {

	/**
	 * Control Type
	 */
	public $type = 'sortable';

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		$choices               = $this->choices;
		$choices               = array_filter( array_merge( array_flip( $this->value() ), $choices ) );
		$this->json['choices'] = $choices;
		$this->json['link']    = $this->get_link();
		$this->json['value']   = $this->value();
		$this->json['id']      = $this->id;
	}

	/**
	 * Render Settings
	 */
	public function content_template() {
		?>
		  <# if ( ! data.choices ) {
			  return;
		  } #>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul class="blogic-sortable-list">

			  <# _.each( data.choices, function( args, choice ) { #>

			<li>
				<input class="blogic-sortable-input sortable-hideme" name="{{choice}}" type="hidden"  value="{{ choice }}" />
				<span class ="menu-item-handle sortable-span">{{args.name}}</span>
			  <i title="<?php esc_attr_e( 'Drag and Move', 'blogic' ); ?>" class="dashicons dashicons-menu blogic-drag-handle"></i>
			  <i title="<?php esc_attr_e( 'Edit', 'blogic' ); ?>" class="dashicons dashicons-edit blogic-edit" data-jump="{{args.section_id}}"></i>
			</li>

			<# } ) #>

			<li class="sortable-hideme">
			  <input class="blogic-sortable-value" {{{ data.link }}} value="{{data.value}}" />
			</li>

		</ul>
		<?php
	}
}

$wp_customize->register_control_type( 'Blogic_Customize_Control_Sort_Sections' );
