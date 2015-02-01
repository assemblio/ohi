<?php
/*
* File Name: vimeoyoutubepopup
* Author: N. Rivers
*
* Version: 2.2
* Author URI: http://nrivers.com
*/
?>

<?php
	if($_POST){
		if($_POST['wpcpup_hidden'] == 'Y') {
			// Post View
			$wpcpupcolor = $_POST['vpcpup_color'];
			update_option('vpcpup_color', $wpcpupcolor);
		
			?>
			<div class="updated"><p><strong><?php _e('Options saved.', 'Options saved.'); ?></strong></p></div>
			<?php
			
		}
	} else {
		$wpcpupcolor = get_option('vpcpup_color');
	}	
?>

<div class="wrap vimeoyoutubepopup_wrap">
	<h2 style="margin-bottom: 5px;">Settings</h2>
	<img src="<?php echo site_url(); ?>/wp-content/plugins/vimeoyoutubepopup/code/css/images/inline.jpg">
 
	<div class="vimeoyoutubepopup_opts">
		<form method="post">
			<input type="hidden" name="wpcpup_hidden" value="Y">
			<p>Manage your settings using the options below.</p>
			
			<br />
			<div class="vimeoyoutubepopup_section">
				<div class="vimeoyoutubepopup_title">
					<h3 class="inactive">
						<img alt="" class="inactive" src="<?php echo site_url(); ?>/wp-content/plugins/vimeoyoutubepopup/code/admin/images/trans.png">
						Interface Settings
					</h3>
					<span class="submit">
						<input type="submit" value="Save changes" name="save1">
					</span>
					<div class="clearfix"></div>
				</div>
				
				<div class="vimeoyoutubepopup_options" style="display: block;">
					<div class="vimeoyoutubepopup_input vimeoyoutubepopup_text">
						<label for="vpcpup_color">Popup Background Color:</label>
						<input id="vpcpup_color" name="vpcpup_color" type="text" value="<?php echo $wpcpupcolor; ?>" />
						<small>Select a color.</small><div class="clearfix"></div>
					</div>
				</div>
			</div>
			
			<br>
			<input type="hidden" value="save" name="action">
		</form>
		
		<form method="post">
			<p class="submit">
				<input type="submit" value="Reset" name="reset">
				<input type="hidden" value="reset" name="action">
			</p>
		</form>
	</div> 
	<div class="clear"></div>
</div>
