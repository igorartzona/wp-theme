<?php
/*------------------------------Custom Class for Customizer--------------------------*/


function az_customize_register( $wp_customize ) {

	 class azinputselect extends WP_Customize_Control {
			public $type = 'inputselect';			
			public function render_content() {
			?>	
			
			<label>
			<?php if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif;
				if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>
				<table>
					<tr>
						<td>
							<input type="<?php echo esc_attr( $this->type ); ?>" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
						</td>
						<td>
							<select name="az-unit">
								<?php
								foreach ( $this->choices as $value => $label )
								echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . $label . '</option>';
								?>
							</select>
						</td>
					</tr>				
				</table>
			</label>
				
								
			<?php
			}
	}
	
			$wp_customize->add_setting('sidebarwidth',
				array('sanitize_callback' => 'az_custom_check',) 
			);
			
			$wp_customize->add_control(
				new azinputselect( $wp_customize, 'sidebarwidth',
					array( 
						'label' => __('Sidebar width','wp-demo'),					
						'section' => 'layout',
						'type' => 'azinputselect',
						'choices'    => array(
							'%' => '%',
							'px' => 'px',            
							),
					)		
				)
			);
			
			
			
			function az_custom_check($input){				
				return $input;
			}

	
}

add_action( 'customize_register', 'az_customize_register' );


?>