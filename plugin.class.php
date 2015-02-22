<?php

class WCP_Options_About_Me {

	public function __construct(){
		add_action( 'admin_menu', array($this,'wcp_about_me_page_admin') );
		add_action( 'admin_init', array($this,'wcp_about_menu_init') );
		add_action( 'admin_enqueue_scripts', array($this,'wcp_enqueue_script_media_uploader') );
		add_shortcode( 'about-me', array($this, 'wcp_about_me_render_template') );
	}

	public function wcp_about_me_page_admin(){

		add_menu_page('About Me Page','About Me','manage_options',__FILE__,array($this,'display_options_page'), 'dashicons-admin-users');

	}


	public function display_options_page(){

		?>

		<div class="wrap">
			<?php settings_errors(); ?>
			<form method="post" action="options.php" enctype="multipart/form-data">
			<?php
			settings_fields( 'wcp_about_me_plugin_page' );
			do_settings_sections( 'wcp_about_me_plugin_page' );
			submit_button();
			?>
			</form>
		</div>

		<?php
	}

	public function wcp_about_menu_init(){
		register_setting( 'wcp_about_me_plugin_page', 'wcp_about_me_page_settings' );

		add_settings_section(
			'wcp_about_me_page_settings', 
			__( 'Settings for about me page', 'about-me-page' ), 
			array($this, 'wcp_about_me_page_settings_section_callback'), 
			'wcp_about_me_plugin_page'
		);

		add_settings_field( 
			'wcp_about_me_photo', 
			__( 'Your Picture', 'about-me-page' ), 
			array($this,'render_photo_url_field'), 
			'wcp_about_me_plugin_page', 
			'wcp_about_me_page_settings' 
		);

		add_settings_field( 
			'wcp_about_me_name', 
			__( 'Your Name', 'about-me-page' ), 
			array($this,'render_name_field'), 
			'wcp_about_me_plugin_page', 
			'wcp_about_me_page_settings' 
		);

		add_settings_field( 
			'wcp_about_me_bio', 
			__( 'Some words about you', 'about-me-page' ), 
			array($this,'wcp_about_me_bio_render'), 
			'wcp_about_me_plugin_page', 
			'wcp_about_me_page_settings' 
		);

		add_settings_field( 
			'wcp_about_me_services_1', 
			__( 'Service 1', 'about-me-page' ), 
			array($this,'wcp_about_me_services_1_render'), 
			'wcp_about_me_plugin_page', 
			'wcp_about_me_page_settings' 
		);

		add_settings_field( 
			'wcp_about_me_services_2', 
			__( 'Service 2', 'about-me-page' ), 
			array($this,'wcp_about_me_services_2_render' ), 
			'wcp_about_me_plugin_page', 
			'wcp_about_me_page_settings' 
		);

		add_settings_field( 
			'wcp_about_me_services_3', 
			__( 'Service 3', 'about-me-page' ), 
			array($this,'wcp_about_me_services_3_render' ), 
			'wcp_about_me_plugin_page', 
			'wcp_about_me_page_settings' 
		);

		add_settings_field( 
			'wcp_about_me_services_4', 
			__( 'Service 4', 'about-me-page' ), 
			array($this,'wcp_about_me_services_4_render' ), 
			'wcp_about_me_plugin_page', 
			'wcp_about_me_page_settings' 
		);

		add_settings_field( 
			'wcp_about_me_services_5', 
			__( 'Service 5', 'about-me-page' ), 
			array($this,'wcp_about_me_services_5_render' ), 
			'wcp_about_me_plugin_page', 
			'wcp_about_me_page_settings' 
		);

		add_settings_field( 
			'wcp_about_me_skills_1', 
			__( 'Skill 1', 'about-me-page' ), 
			array($this,'wcp_about_me_skills_1_render' ), 
			'wcp_about_me_plugin_page', 
			'wcp_about_me_page_settings' 
		);

		add_settings_field( 
			'wcp_about_me_skills_1_level', 
			__( 'Skill 1 Level', 'about-me-page' ), 
			array($this,'wcp_about_me_skills_1_level_render' ), 
			'wcp_about_me_plugin_page', 
			'wcp_about_me_page_settings' 
		);

		add_settings_field( 
			'wcp_about_me_skills_2', 
			__( 'Skill 2', 'about-me-page' ), 
			array($this,'wcp_about_me_skills_2_render' ), 
			'wcp_about_me_plugin_page', 
			'wcp_about_me_page_settings' 
		);

		add_settings_field( 
			'wcp_about_me_skills_2_level', 
			__( 'Skill 2 Level', 'about-me-page' ), 
			array($this,'wcp_about_me_skills_2_level_render' ), 
			'wcp_about_me_plugin_page', 
			'wcp_about_me_page_settings' 
		);

		add_settings_field( 
			'wcp_about_me_skills_3', 
			__( 'Skill 3', 'about-me-page' ), 
			array($this,'wcp_about_me_skills_3_render' ), 
			'wcp_about_me_plugin_page', 
			'wcp_about_me_page_settings' 
		);

		add_settings_field( 
			'wcp_about_me_skills_3_level', 
			__( 'Skill 3 Level', 'about-me-page' ), 
			array($this,'wcp_about_me_skills_3_level_render' ), 
			'wcp_about_me_plugin_page', 
			'wcp_about_me_page_settings' 
		);

		add_settings_field( 
			'wcp_about_me_skills_4', 
			__( 'Skill 4', 'about-me-page' ), 
			array($this,'wcp_about_me_skills_4_render' ), 
			'wcp_about_me_plugin_page', 
			'wcp_about_me_page_settings' 
		);

		add_settings_field( 
			'wcp_about_me_skills_4_level', 
			__( 'Skill 4 Level', 'about-me-page' ), 
			array($this,'wcp_about_me_skills_4_level_render' ), 
			'wcp_about_me_plugin_page', 
			'wcp_about_me_page_settings' 
		);

		add_settings_field( 
			'wcp_about_me_skills_5', 
			__( 'Skill 5', 'about-me-page' ), 
			array($this,'wcp_about_me_skills_5_render' ), 
			'wcp_about_me_plugin_page', 
			'wcp_about_me_page_settings' 
		);

		add_settings_field( 
			'wcp_about_me_skills_5_level', 
			__( 'Skill 5 Level', 'about-me-page' ), 
			array($this,'wcp_about_me_skills_5_level_render' ), 
			'wcp_about_me_plugin_page', 
			'wcp_about_me_page_settings' 
		);

		add_settings_field( 
			'wcp_about_me_themes', 
			__( 'Select theme', 'about-me-page' ), 
			array($this,'wcp_about_me_theme_render' ), 
			'wcp_about_me_plugin_page', 
			'wcp_about_me_page_settings' 
		);

		add_settings_field( 
			'wcp_about_me_custom_css', 
			__( 'Custom CSS', 'about-me-page' ), 
			array($this,'wcp_about_me_custom_render' ), 
			'wcp_about_me_plugin_page', 
			'wcp_about_me_page_settings' 
		);

	}


	/*
	 * Just for validations
	 */
	function wcp_about_me_page_settings_section_callback(  ) { 

		echo __( 'Use this shortcode to display this page [about-me]', 'about-me-page' );

	}

	/*
	 * Fields Callbacks
	 */
	function render_photo_url_field(  ) { 

		$options = get_option( 'wcp_about_me_page_settings' ); ?>
		<input type='text' class="regular-text" id="wcp-url" name='wcp_about_me_page_settings[wcp_about_me_photo]' value='<?php echo $options['wcp_about_me_photo']; ?>'>
		<button class="button upload_image_button"><?php _e( 'Media', 'about-me-page' ); ?></button>
		<p class="description"><?php _e( 'Please paste link or choose from media', 'about-me-page' ); ?></p>
		<?php

	}
	function render_name_field(  ) { 

		$options = get_option( 'wcp_about_me_page_settings' ); ?>
		<input type='text' class="regular-text" name='wcp_about_me_page_settings[wcp_about_me_name]' value='<?php echo $options['wcp_about_me_name']; ?>'>
		<?php

	}


	function wcp_about_me_bio_render(  ) { 

		$options = get_option( 'wcp_about_me_page_settings' );
		?>
		<textarea cols='40' rows='5' name='wcp_about_me_page_settings[wcp_about_me_bio]'><?php
			echo $options['wcp_about_me_bio']; 
		?></textarea>
		<p class="description"><?php _e( 'You can also use HTML here', 'about-me-page' ); ?></p>
		<?php

	}


	function wcp_about_me_services_1_render(  ) { 

		$options = get_option( 'wcp_about_me_page_settings' );
		?>
		<input type='text' class="regular-text" name='wcp_about_me_page_settings[wcp_about_me_services_1]' value='<?php echo $options['wcp_about_me_services_1']; ?>'>
		<p class="description"><?php _e( 'Leaving blank this field will hide whole services block.', 'about-me-page' ); ?></p>
		<?php

	}


	function wcp_about_me_services_2_render(  ) { 

		$options = get_option( 'wcp_about_me_page_settings' );
		?>
		<input type='text' class="regular-text" name='wcp_about_me_page_settings[wcp_about_me_services_2]' value='<?php echo $options['wcp_about_me_services_2']; ?>'>
		<?php

	}


	function wcp_about_me_services_3_render(  ) { 

		$options = get_option( 'wcp_about_me_page_settings' );
		?>
		<input type='text' class="regular-text" name='wcp_about_me_page_settings[wcp_about_me_services_3]' value='<?php echo $options['wcp_about_me_services_3']; ?>'>
		<?php

	}


	function wcp_about_me_services_4_render(  ) { 

		$options = get_option( 'wcp_about_me_page_settings' );
		?>
		<input type='text' class="regular-text" name='wcp_about_me_page_settings[wcp_about_me_services_4]' value='<?php echo $options['wcp_about_me_services_4']; ?>'>
		<?php

	}

	function wcp_about_me_services_5_render(  ) { 

		$options = get_option( 'wcp_about_me_page_settings' );
		?>
		<input type='text' class="regular-text" name='wcp_about_me_page_settings[wcp_about_me_services_5]' value='<?php echo $options['wcp_about_me_services_5']; ?>'>
		<?php

	}

	function wcp_about_me_skills_1_render(  ) { 

		$options = get_option( 'wcp_about_me_page_settings' );
		?>
		<input type='text' class="regular-text" name='wcp_about_me_page_settings[wcp_about_me_skills_1]' value='<?php echo $options['wcp_about_me_skills_1']; ?>'>
		<p class="description"><?php _e( 'Leaving blank this field will hide whole skills block.', 'about-me-page' ); ?></p>
		<?php

	}

	function wcp_about_me_skills_1_level_render(  ) { 

		$options = get_option( 'wcp_about_me_page_settings' );
		?>
		<input type="number" min="1" step="1" max="100" name='wcp_about_me_page_settings[wcp_about_me_skills_1_level]' value='<?php echo $options['wcp_about_me_skills_1_level']; ?>'>%
		<?php

	}

	function wcp_about_me_skills_2_render(  ) { 

		$options = get_option( 'wcp_about_me_page_settings' );
		?>
		<input type='text' class="regular-text" name='wcp_about_me_page_settings[wcp_about_me_skills_2]' value='<?php echo $options['wcp_about_me_skills_2']; ?>'>
		<?php

	}

	function wcp_about_me_skills_2_level_render(  ) { 

		$options = get_option( 'wcp_about_me_page_settings' );
		?>
		<input type="number" min="1" step="1" max="100" name='wcp_about_me_page_settings[wcp_about_me_skills_2_level]' value='<?php echo $options['wcp_about_me_skills_2_level']; ?>'>%
		<?php

	}

	function wcp_about_me_skills_3_render(  ) { 

		$options = get_option( 'wcp_about_me_page_settings' );
		?>
		<input type='text' class="regular-text" name='wcp_about_me_page_settings[wcp_about_me_skills_3]' value='<?php echo $options['wcp_about_me_skills_3']; ?>'>
		<?php

	}

	function wcp_about_me_skills_3_level_render(  ) { 

		$options = get_option( 'wcp_about_me_page_settings' );
		?>
		<input type="number" min="1" step="1" max="100" name='wcp_about_me_page_settings[wcp_about_me_skills_3_level]' value='<?php echo $options['wcp_about_me_skills_3_level']; ?>'>%
		<?php

	}

	function wcp_about_me_skills_4_render(  ) { 

		$options = get_option( 'wcp_about_me_page_settings' );
		?>
		<input type='text' class="regular-text" name='wcp_about_me_page_settings[wcp_about_me_skills_4]' value='<?php echo $options['wcp_about_me_skills_4']; ?>'>
		<?php

	}

	function wcp_about_me_skills_4_level_render(  ) { 

		$options = get_option( 'wcp_about_me_page_settings' );
		?>
		<input type="number" min="1" step="1" max="100" name='wcp_about_me_page_settings[wcp_about_me_skills_4_level]' value='<?php echo $options['wcp_about_me_skills_4_level']; ?>'>%
		<?php

	}

	function wcp_about_me_skills_5_render(  ) { 

		$options = get_option( 'wcp_about_me_page_settings' );
		?>
		<input type='text' class="regular-text" name='wcp_about_me_page_settings[wcp_about_me_skills_5]' value='<?php echo $options['wcp_about_me_skills_5']; ?>'>
		<?php

	}

	function wcp_about_me_skills_5_level_render(  ) { 

		$options = get_option( 'wcp_about_me_page_settings' );
		?>
		<input type="number" min="1" step="1" max="100" name='wcp_about_me_page_settings[wcp_about_me_skills_5_level]' value='<?php echo $options['wcp_about_me_skills_5_level']; ?>'>%
		<?php

	}

	function wcp_about_me_theme_render(  ) { 

		$options = get_option( 'wcp_about_me_page_settings' );
		?>
		<select name='wcp_about_me_page_settings[wcp_about_me_themes]'>
			<option value='default' <?php selected( $options['wcp_about_me_themes'], 'default' ); ?>><?php _e( 'Default', 'about-me-page' ); ?></option>
			<option value='primary' <?php selected( $options['wcp_about_me_themes'], 'primary' ); ?>><?php _e( 'Dark blue', 'about-me-page' ); ?></option>
			<option value='info' <?php selected( $options['wcp_about_me_themes'], 'info' ); ?>><?php _e( 'Light blue', 'about-me-page' ); ?></option>
			<option value='warning' <?php selected( $options['wcp_about_me_themes'], 'warning' ); ?>><?php _e( 'Orange', 'about-me-page' ); ?></option>
			<option value='danger' <?php selected( $options['wcp_about_me_themes'], 'danger' ); ?>><?php _e( 'Red', 'about-me-page' ); ?></option>
			<option value='success' <?php selected( $options['wcp_about_me_themes'], 'success' ); ?>><?php _e( 'Green', 'about-me-page' ); ?></option>
		</select>		
		<?php

	}
	function wcp_about_me_custom_render(  ) { 

		$options = get_option( 'wcp_about_me_page_settings' );
		?>
		<textarea name="wcp_about_me_page_settings[wcp_about_me_custom_css]" id="custom_css" cols="50" rows="10"><?php echo $options['wcp_about_me_custom_css']; ?></textarea>				
		<?php

	}
	

	/*
	*	Script for Media uploader
	 */
	function wcp_enqueue_script_media_uploader($hook){
	    // if ( __FILE__ != $hook ) {
	    //     return;
	    // }
	    wp_enqueue_media();
	    wp_enqueue_script( 'wcp_uploader', plugin_dir_url( __FILE__ ) . 'js/admin.js', array('jquery') );
	}

	function wcp_about_me_render_template(){
		
		// load_template( plugin_dir_url( __FILE__ ) .'render_template.php' );
		wp_enqueue_style( 'bs-styles', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css' );
		$options = get_option( 'wcp_about_me_page_settings' );
		?>
		<style>
			<?php echo $options['wcp_about_me_custom_css']; ?>
		</style>
		<div class="row about-me-page-container">
			<div class="col-sm-4">
				<div class="thumbnail about-me-page-thumb">
					<img src="<?php echo $options['wcp_about_me_photo'] ?>" alt="<?php echo $options['wcp_about_me_name'] ?>">
				</div>
			</div>
			<div class="col-sm-8">
				<div class="panel panel-<?php echo $options['wcp_about_me_themes'] ?>">
				  <div class="panel-heading">
				    <h3 class="panel-title about-me-page-title"><?php echo $options['wcp_about_me_name'] ?></h3>
				  </div>
				  <div class="panel-body about-me-page-bio">
					<p><?php echo $options['wcp_about_me_bio'] ?></p>
				  </div>
				</div>	
			</div>
		</div>
		<div class="row">
			<?php if ($options['wcp_about_me_services_1'] != '') { ?>
			<div class="col-sm-6">
				<div class="panel panel-<?php echo $options['wcp_about_me_themes'] ?>">
				  <div class="panel-heading">
				    <h3 class="panel-title">Services</h3>
				  </div>
				  <div class="panel-body">
					<ul class="list-group" style="margin-left: 0 !important;">
						<?php if ($options['wcp_about_me_services_1'] != '') { ?>
							<li class="list-group-item text-<?php echo $options['wcp_about_me_themes'] ?>"><?php echo $options['wcp_about_me_services_1']; ?></li>		
						<?php } ?>
						<?php if ($options['wcp_about_me_services_2'] != '') { ?>
							<li class="list-group-item text-<?php echo $options['wcp_about_me_themes'] ?>"><?php echo $options['wcp_about_me_services_2']; ?></li>		
						<?php } ?>
						<?php if ($options['wcp_about_me_services_3'] != '') { ?>
							<li class="list-group-item text-<?php echo $options['wcp_about_me_themes'] ?>"><?php echo $options['wcp_about_me_services_3']; ?></li>		
						<?php } ?>
						<?php if ($options['wcp_about_me_services_4'] != '') { ?>
							<li class="list-group-item text-<?php echo $options['wcp_about_me_themes'] ?>"><?php echo $options['wcp_about_me_services_4']; ?></li>		
						<?php } ?>
						<?php if ($options['wcp_about_me_services_5'] != '') { ?>
							<li class="list-group-item text-<?php echo $options['wcp_about_me_themes'] ?>"><?php echo $options['wcp_about_me_services_5']; ?></li>		
						<?php } ?>
					</ul>				    
				  </div>
				</div>				
			</div>
			<?php } ?>
			<?php if ($options['wcp_about_me_skills_1'] != '') { ?>
			<div class="col-sm-6">
				<div class="panel panel-<?php echo $options['wcp_about_me_themes'] ?>">
				  <div class="panel-heading">
				    <h3 class="panel-title">Skills</h3>
				  </div>
				  <div class="panel-body">
				  	<?php if ($options['wcp_about_me_skills_1'] != '') { ?>
				  		<div class="progress">
						  <div class="progress-bar progress-bar-striped progress-bar-<?php echo $options['wcp_about_me_themes'] ?>" style="width: <?php echo $options['wcp_about_me_skills_1_level'] ?>%;">
						    <?php echo $options['wcp_about_me_skills_1'] ?> - <?php echo $options['wcp_about_me_skills_1_level'] ?>%
						  </div>
						</div>
				  	<?php } ?>
					
				  	<?php if ($options['wcp_about_me_skills_2'] != '') { ?>
				  		<div class="progress">
						  <div class="progress-bar progress-bar-striped progress-bar-<?php echo $options['wcp_about_me_themes'] ?>" style="width: <?php echo $options['wcp_about_me_skills_2_level'] ?>%;">
						    <?php echo $options['wcp_about_me_skills_2'] ?> - <?php echo $options['wcp_about_me_skills_2_level'] ?>%
						  </div>
						</div>
				  	<?php } ?>
					
				  	<?php if ($options['wcp_about_me_skills_3'] != '') { ?>
				  		<div class="progress">
						  <div class="progress-bar progress-bar-striped progress-bar-<?php echo $options['wcp_about_me_themes'] ?>" style="width: <?php echo $options['wcp_about_me_skills_3_level'] ?>%;">
						    <?php echo $options['wcp_about_me_skills_3'] ?> - <?php echo $options['wcp_about_me_skills_3_level'] ?>%
						  </div>
						</div>
				  	<?php } ?>
					
				  	<?php if ($options['wcp_about_me_skills_4'] != '') { ?>
				  		<div class="progress">
						  <div class="progress-bar progress-bar-striped progress-bar-<?php echo $options['wcp_about_me_themes'] ?>" style="width: <?php echo $options['wcp_about_me_skills_4_level'] ?>%;">
						    <?php echo $options['wcp_about_me_skills_4'] ?> - <?php echo $options['wcp_about_me_skills_4_level'] ?>%
						  </div>
						</div>
				  	<?php } ?>
					
				  	<?php if ($options['wcp_about_me_skills_5'] != '') { ?>
				  		<div class="progress">
						  <div class="progress-bar progress-bar-striped progress-bar-<?php echo $options['wcp_about_me_themes'] ?>" style="width: <?php echo $options['wcp_about_me_skills_5_level'] ?>%;">
						    <?php echo $options['wcp_about_me_skills_5'] ?> - <?php echo $options['wcp_about_me_skills_5_level'] ?>%
						  </div>
						</div>
				  	<?php } ?>
									    
				  </div>
				</div>				
			</div>
			<?php } ?>
		</div>
		<?php
	}

}

?>