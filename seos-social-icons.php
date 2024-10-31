<?php
/**
 * Plugin Name: Seos Social Icons
 * Plugin URI: https://www.seosthemes.com/seos-social-icons/
 * Contributors: seosbg
 * Author: seosbg
 * Description: Seos Social Icons WordPress plugin add Social Icons in your theme.
 * Version: 1.0
 * License: GPL2
 */

add_action('admin_menu', 'ssi_menu');
function ssi_menu() {
    add_menu_page('Seos Social Icons', 'Seos Social Icons', 'administrator', 'ssi', 'ssi_settings_page', plugins_url('seos-social-icons/images/icon.png')
    );

    add_action('admin_init', 'ssi_register_settings');
}

function ssi_register_settings() {
    register_setting('ssi', 'ssi_fb');
    register_setting('ssi', 'ssi_twitter');
    register_setting('ssi', 'ssi_gplus');
    register_setting('ssi', 'ssi_linkedin');
    register_setting('ssi', 'ssi_pinterest');
    register_setting('ssi', 'ssi_youtube');
    register_setting('ssi', 'ssi_vimeo ');
    register_setting('ssi', 'ssi_tumblr');
}

add_action('wp_enqueue_scripts', 'ssi_wp_scripts');

function ssi_wp_scripts(){

	wp_register_style('ssi-include', plugin_dir_url(__FILE__) . '/css/include.css');
	wp_enqueue_style('ssi-include');
}

add_action('admin_enqueue_scripts', 'ssi_admin_scripts');

function ssi_admin_scripts(){
	
	wp_register_style('ssi_style', plugin_dir_url(__FILE__) . '/css/style.css');
	wp_enqueue_style('ssi_style');

}
			
function ssi_settings_page() {
?>

    <div class="wrap ssi">
        <form action="options.php" method="post" role="form" name="ssi">
		
			<?php settings_fields( 'ssi' ); ?>
			<?php do_settings_sections( 'ssi' ); ?>
		
			<div>
				<a target="_blank" href="http://seosthemes.com/">
					<div class="btn s-red">
						 <?php _e('SEOS', 'ssi'); echo ' <img class="ss-logo" src="' . plugins_url( 'images/logo.png' , __FILE__ ) . '" alt="logo" />';  _e(' THEMES', 'ssi'); ?>
					</div>
				</a>
			</div>
			<h1><?php _e('Seos Social Icons', 'ssi'); ?></h1>

				<strong><?php _e('Include Social:', 'ssi'); ?></strong>
				<textarea rows="1" cols="25" readonly><?php echo "<?php ssi_include(); ?>" ?></textarea>
				<p>
					<strong><?php _e('Add Shortcode:', 'ssi'); ?></strong>
					<textarea rows="1" cols="4" readonly><?php echo "[ssi]" ?></textarea>
				</p>
				
			<!-- ------------------- Icon Facebook ------------------ -->
			
			<div class="form-group">
				<label><?php _e('Your Facebook URL: ', 'ssi'); ?></label>
				<input class="form-control" style="width: 410px;" type="text" name="ssi_fb" value="<?php if (esc_url(get_option( 'ssi_fb'))) : echo esc_url(get_option( 'ssi_fb')); endif; ?>"/>
			</div>

			<!-- ------------------- Icon Twitter ------------------ -->
			
			<div class="form-group">
				<label><?php _e('Your Twitter  URL: ', 'ssi'); ?></label>
				<input class="form-control" style="width: 410px;" type="text" name="ssi_twitter" value="<?php if (esc_url(get_option( 'ssi_twitter'))) : echo esc_url(get_option( 'ssi_twitter')); endif; ?>"/>
			</div>	

			<!-- ------------------- Icon Google+ ------------------ -->
			
			<div class="form-group">
				<label><?php _e('Your Google+  URL: ', 'ssi'); ?></label>
				<input class="form-control" style="width: 410px;" type="text" name="ssi_gplus" value="<?php if (esc_url(get_option( 'ssi_gplus'))) : echo esc_url(get_option( 'ssi_gplus')); endif; ?>"/>
			</div>	

			<!-- ------------------- Icon Linkedin  ------------------ -->
			
			<div class="form-group">
				<label><?php _e('Your Linkedin   URL: ', 'ssi'); ?></label>
				<input class="form-control" style="width: 410px;" type="text" name="ssi_linkedin" value="<?php if (esc_url(get_option( 'ssi_linkedin'))) : echo esc_url(get_option( 'ssi_linkedin')); endif; ?>"/>
			</div>	

			<!-- ------------------- Icon Pinterest  ------------------ -->
			
			<div class="form-group">
				<label><?php _e('Your Pinterest URL: ', 'ssi'); ?></label>
				<input class="form-control" style="width: 410px;" type="text" name="ssi_pinterest" value="<?php if (esc_url(get_option( 'ssi_pinterest'))) : echo esc_url(get_option( 'ssi_pinterest')); endif; ?>"/>
			</div>	

			<!-- ------------------- Icon YouTube  ------------------ -->
			
			<div class="form-group">
				<label><?php _e('Your YouTube URL: ', 'ssi'); ?></label>
				<input class="form-control" style="width: 410px;" type="text" name="ssi_youtube" value="<?php if (esc_url(get_option( 'ssi_youtube'))) : echo esc_url(get_option( 'ssi_youtube')); endif; ?>"/>
			</div>	

			<!-- ------------------- Icon Vimeo  ------------------ -->
			
			<div class="form-group">
				<label><?php _e('Your Vimeo URL: ', 'ssi'); ?></label>
				<input class="form-control" style="width: 410px;" type="text" name="ssi_vimeo" value="<?php if (esc_url(get_option( 'ssi_vimeo'))) : echo esc_url(get_option( 'ssi_vimeo')); endif; ?>"/>
			</div>	

			<!-- ------------------- Icon Tumblr  ------------------ -->
			
			<div class="form-group">
				<label><?php _e('Your Tumblr URL: ', 'ssi'); ?></label>
				<input class="form-control" style="width: 410px;" type="text" name="ssi_tumblr" value="<?php if (esc_url(get_option( 'ssi_tumblr'))) : echo esc_url(get_option( 'ssi_tumblr')); endif; ?>"/>
			</div>	

		<div style="margin-top: 20px;"><?php submit_button(); ?></div>
			
		</form>	
	</div>
	
	<?php } 
	
	function ssi_language_load() {
		load_plugin_textdomain('ssi_language_load', FALSE, basename(dirname(__FILE__)) . '/languages');
	}
	add_action('init', 'ssi_language_load');
	
	
	function ssi_include () { ?>
		<div class="ssi-include">
		
			<?php if (esc_url(get_option( 'ssi_fb'))) : ?>
				<a href="<?php echo esc_url(get_option( 'ssi_fb')); ?>"><img src="<?php echo plugin_dir_url(__FILE__) . '/images/fb.png'?>" alt="fb"></a>
			<?php endif; ?>
			
			<?php if (esc_url(get_option( 'ssi_twitter'))) : ?>
				<a href="<?php echo esc_url(get_option( 'ssi_twitter')); ?>"><img src="<?php echo plugin_dir_url(__FILE__) . '/images/twitter.png'?>" alt="twitter"></a>
			<?php endif; ?>
						
			<?php if (esc_url(get_option( 'ssi_gplus'))) : ?>
				<a href="<?php echo esc_url(get_option( 'ssi_gplus')); ?>"><img src="<?php echo plugin_dir_url(__FILE__) . '/images/gplus.png'?>" alt="gplus"></a>
			<?php endif; ?>
			
			<?php if (esc_url(get_option( 'ssi_linkedin'))) : ?>
				<a href="<?php echo esc_url(get_option( 'ssi_linkedin')); ?>"><img src="<?php echo plugin_dir_url(__FILE__) . '/images/linkedin.png'?>" alt="linkedin"></a>
			<?php endif; ?>
						
			<?php if (esc_url(get_option( 'ssi_pinterest'))) : ?>
				<a href="<?php echo esc_url(get_option( 'ssi_pinterest')); ?>"><img src="<?php echo plugin_dir_url(__FILE__) . '/images/pinterest.png'?>" alt="pinterest"></a>
			<?php endif; ?>
									
			<?php if (esc_url(get_option( 'ssi_youtube'))) : ?>
				<a href="<?php echo esc_url(get_option( 'ssi_youtube')); ?>"><img src="<?php echo plugin_dir_url(__FILE__) . '/images/youtube.png'?>" alt="youtube"></a>
			<?php endif; ?>
												
			<?php if (esc_url(get_option( 'ssi_vimeo'))) : ?>
				<a href="<?php echo esc_url(get_option( 'ssi_vimeo')); ?>"><img src="<?php echo plugin_dir_url(__FILE__) . '/images/vimeo.png'?>" alt="vimeo"></a>
			<?php endif; ?>
															
			<?php if (esc_url(get_option( 'ssi_tumblr'))) : ?>
				<a href="<?php echo esc_url(get_option( 'ssi_tumblr')); ?>"><img src="<?php echo plugin_dir_url(__FILE__) . '/images/tumblr.png'?>" alt="tumblr"></a>
			<?php endif; ?>
			
		</div>
	<?php }
	
	function ssi_shortcode() {
	ob_start();
	ssi_include();
	return ob_get_clean();
}

add_shortcode( 'ssi', 'ssi_shortcode' );

	
