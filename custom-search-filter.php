<?php
/**
 * Plugin Name: Custom Search Filter
 * Plugin URI: https://www.seosthemes.com/custom-search-filter/
 * Contributors: seosbg
 * Author: seosbg
 * Description: Custom Search Filter WordPress plugin allows you to search products or custom text.
 * Version: 1.0
 * License: GPL2
 */

add_action('admin_menu', 'csf_menu');
function csf_menu() {
    add_menu_page('Custom Search Filter', 'Custom Search Filter', 'administrator', 'csf', 'csf_settings_page', plugins_url('custom-search-filter/images/icon.png')
    );

    add_action('admin_init', 'csf_register_settings');
}

/*********************************************************************************************************
* Admin Enqueue Scripts
**********************************************************************************************************/	

function csf_admin_styles() {
	wp_register_style( 'csf_admin', plugin_dir_url(__FILE__) . 'css/admin.css' );
	wp_enqueue_style( 'csf_admin');
}
	
	add_action( 'admin_enqueue_scripts', 'csf_admin_styles' );
	
function csf_register_settings() {
    register_setting('csf', 'csf_title');
    register_setting('csf', 'search_text_1');
    register_setting('csf', 'search_text_2');
    register_setting('csf', 'search_text_3');
    register_setting('csf', 'search_text_4');
    register_setting('csf', 'search_text_5');
    register_setting('csf', 'search_text_6');
    register_setting('csf', 'search_text_7');
    register_setting('csf', 'search_text_8');
    register_setting('csf', 'search_text_9');
    register_setting('csf', 'search_text_10');

}
			
/*********************************************************************************************************
* Search Form
**********************************************************************************************************/

		function custom_search_filter() { ?>

			<form role="search" method="get" class="custom-search-form" action="<?php echo home_url( '/' ); ?>">
				<label>	
					<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
				</label>
				<label>	
					<?php if(get_option('csf_title')){echo get_option('csf_title');} else {echo _e( 'Search Filter:', 'label' );} ?>
				</label>

				<select name="s" >
					<option value=""></option>
					<?php if(get_option( 'search_text_1')): ?><option value="<?php echo get_option( 'search_text_1'); ?>"><?php echo get_option( 'search_text_1'); ?></option><?php endif; ?>
					<?php if(get_option( 'search_text_2')): ?><option value="<?php echo get_option( 'search_text_2'); ?>"><?php echo get_option( 'search_text_2'); ?></option><?php endif; ?>
					<?php if(get_option( 'search_text_3')): ?><option value="<?php echo get_option( 'search_text_3'); ?>"><?php echo get_option( 'search_text_3'); ?></option><?php endif; ?>
					<?php if(get_option( 'search_text_4')): ?><option value="<?php echo get_option( 'search_text_4'); ?>"><?php echo get_option( 'search_text_4'); ?></option><?php endif; ?>
					<?php if(get_option( 'search_text_5')): ?><option value="<?php echo get_option( 'search_text_5'); ?>"><?php echo get_option( 'search_text_5'); ?></option><?php endif; ?>
					<?php if(get_option( 'search_text_6')): ?><option value="<?php echo get_option( 'search_text_6'); ?>"><?php echo get_option( 'search_text_6'); ?></option><?php endif; ?>
					<?php if(get_option( 'search_text_7')): ?><option value="<?php echo get_option( 'search_text_7'); ?>"><?php echo get_option( 'search_text_7'); ?></option><?php endif; ?>
					<?php if(get_option( 'search_text_8')): ?><option value="<?php echo get_option( 'search_text_8'); ?>"><?php echo get_option( 'search_text_8'); ?></option><?php endif; ?>
					<?php if(get_option( 'search_text_9')): ?><option value="<?php echo get_option( 'search_text_9'); ?>"><?php echo get_option( 'search_text_9'); ?></option><?php endif; ?>
					<?php if(get_option( 'search_text_10')): ?><option value="<?php echo get_option( 'search_text_10'); ?>"><?php echo get_option( 'search_text_10'); ?></option><?php endif; ?>
				</select>
				<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
			</form>
		
		<?php }

		add_filter( 'get_search_form', 'custom_search_filter' );
		
		function custom_search_filter_shortcode( ) {
			ob_start();
				get_search_form();
			return ob_get_clean();    
    
}

add_shortcode('csf_form', 'custom_search_filter_shortcode');
		
			
function csf_settings_page() {
?>

    <div class="wrap custom-search-filter">
		<h1><?php _e('Custom Search Filter', 'csf'); ?></h1>
        <form action="options.php" method="post" role="form" name="custom-search-filter">
		
			<?php settings_fields( 'csf' ); ?>
			<?php do_settings_sections( 'csf' ); ?>
		
			<div>
				<a target="_blank" href="http://seosthemes.com/">
					<div class="btn s-red">
						 <?php _e('SEOS', 'csf'); echo ' <img class="ss-logo" src="' . plugins_url( 'images/logo.png' , __FILE__ ) . '" alt="logo" />';  _e(' THEMES', 'csf'); ?>
					</div>
				</a>
			</div>

			<div class="form-group">
					<strong><?php _e('Add Shortcode:', 'csf'); ?></strong>
					<textarea rows="1" cols="10" readonly><?php echo "[csf_form]" ?></textarea>
			</div>			
			<hr />
				
			<!-- ------------------- Search Filter Title ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Search Filter Title: ', 'csf'); ?></label>
				<input type="text" name="csf_title" value="<?php echo esc_html(get_option( 'csf_title')); ?>"/>
			</div>			
			<hr />
			
			<!-- ------------------- Search Text 1 ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Search Text 1: ', 'csf'); ?></label>
				<input placeholder="Custom Text" type="text" name="search_text_1" value="<?php echo esc_html(get_option( 'search_text_1')); ?>"/>
			</div>			
			<hr />
						
			<!-- ------------------- Search Text 2 ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Search Text 2: ', 'csf'); ?></label>
				<input placeholder="Custom Text" type="text" name="search_text_2" value="<?php echo esc_html(get_option( 'search_text_2')); ?>"/>
			</div>			
			<hr />
						
			<!-- ------------------- Search Text 3 ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Search Text 3: ', 'csf'); ?></label>
				<input placeholder="Custom Text" type="text" name="search_text_3" value="<?php echo esc_html(get_option( 'search_text_3')); ?>"/>
			</div>			
			<hr />
						
			<!-- ------------------- Search Text 4 ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Search Text 4: ', 'csf'); ?></label>
				<input placeholder="Custom Text" type="text" name="search_text_4" value="<?php echo esc_html(get_option( 'search_text_4')); ?>"/>
			</div>			
			<hr />
						
			<!-- ------------------- Search Text 5 ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Search Text 5: ', 'csf'); ?></label>
				<input placeholder="Custom Text" type="text" name="search_text_5" value="<?php echo esc_html(get_option( 'search_text_5')); ?>"/>
			</div>			
			<hr />
						
			<!-- ------------------- Search Text 6 ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Search Text 6: ', 'csf'); ?></label>
				<input placeholder="Custom Text" type="text" name="search_text_6" value="<?php echo esc_html(get_option( 'search_text_6')); ?>"/>
			</div>			
			<hr />
						
			<!-- ------------------- Search Text 7 ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Search Text 7: ', 'csf'); ?></label>
				<input placeholder="Custom Text" type="text" name="search_text_7" value="<?php echo esc_html(get_option( 'search_text_7')); ?>"/>
			</div>			
			<hr />
						
			<!-- ------------------- Search Text 8 ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Search Text 8: ', 'csf'); ?></label>
				<input placeholder="Custom Text" type="text" name="search_text_8" value="<?php echo esc_html(get_option( 'search_text_8')); ?>"/>
			</div>			
			<hr />
						
			<!-- ------------------- Search Text 9 ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Search Text 9: ', 'csf'); ?></label>
				<input placeholder="Custom Text" type="text" name="search_text_9" value="<?php echo esc_html(get_option( 'search_text_9')); ?>"/>
			</div>			
			<hr />
						
			<!-- ------------------- Search Text 10 ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Search Text 10: ', 'csf'); ?></label>
				<input placeholder="Custom Text" type="text" name="search_text_10" value="<?php echo esc_html(get_option( 'search_text_10')); ?>"/>
			</div>			
			<hr />
			
				<div style="margin-top: 20px;"><?php submit_button(); ?></div>	
		</form>	
	</div>
	
	<?php } 
	
	function csf_language_load() {
		load_plugin_textdomain('csf_language', FALSE, basename(dirname(__FILE__)) . '/languages');
	}
	add_action('init', 'csf_language_load');
	