<?php 
$wp_include = "../wp-load.php";
$i = 0;
while (!file_exists($wp_include) && $i++ < 10) {$wp_include = "../$wp_include";}
require($wp_include);
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) wp_die(__('You are not allowed to be here','biggallery')); ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Shortcode Editor</title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri() ?>/extends/shortcode_editor/shortcode_editor.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<base target="_self" />
</head>
<body onLoad="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';" style="display: none" id="link">
<form name="shortcode_form" action="#">

	
<div class="shortcode_wrap" style="height:120px;width:260px;margin:0 auto;margin-top:30px;text-align:center;" >
<div id="shortcodes" class="current" style="height:50px;">
<select id="shortcode_select" name="shortcode_select" style="width:220px">

<option value="0"><?php _e('Select a Shortcode:','biggallery'); ?></option>
<option value="0" style="font-weight:bold!important;font-style:italic;border-top:1px dotted #e1e1e1;background:#e1e1e1;"><?php _e('Highlights:','biggallery'); ?></option>
     <option value="default_highlight"><?php _e('Default 1','biggallery'); ?></option> 
	 <option value="default_highlight2"><?php _e('Default 2','biggallery'); ?></option> 
     <option value="custom_highlight"><?php _e('Custom','biggallery'); ?></option> 
	 
<option value="0" style="font-weight:bold!important;font-style:italic;border-top:1px dotted #e1e1e1;background:#e1e1e1;"><?php _e('Columns:','biggallery'); ?></option>
     <option value="2-columns"><?php _e('2 columns','biggallery'); ?></option> 
     <option value="3-columns"><?php _e('3 columns','biggallery'); ?></option> 
     <option value="4-columns"><?php _e('4 columns','biggallery'); ?></option> 
	 
	 <option value="1_3_2_3-columns"><?php _e('1/3 column + 2/3 column','biggallery'); ?></option> 
	 <option value="2_3_1_3-columns"><?php _e('2/3 column + 1/3 column','biggallery'); ?></option> 
	 
	 <option value="1_4_3_4-columns"><?php _e('1/4 column + 3/4 column','biggallery'); ?></option> 
	 <option value="3_4_1_4-columns"><?php _e('3/4 column + 1/4 column','biggallery'); ?></option> 

	 <option value="1_2_1_4_1_4-columns"><?php _e('1/2 column + 1/4 column + 1/4 column','biggallery'); ?></option> 
	 <option value="1_4_1_2_1_4-columns"><?php _e('1/4 column + 1/2 column + 1/4 column','biggallery'); ?></option> 
	 <option value="1_4_1_4_1_2-columns"><?php _e('1/4 column + 1/4 column + 1/2 column','biggallery'); ?></option> 
	 
<option value="0" style="font-weight:bold!important;font-style:italic;border-top:1px dotted #e1e1e1;background:#e1e1e1;"><?php _e('Dividers:','biggallery'); ?></option>
     <option value="hr"><?php _e('Line','biggallery'); ?></option> 
     <option value="clearfix"><?php _e('Clearfix','biggallery'); ?></option> 
     <option value="margin_1line"><?php _e('margin 1 line','biggallery'); ?></option> 
	 <option value="margin_1_2line"><?php _e('margin 1/2 line','biggallery'); ?></option> 
	 
<option value="0" style="font-weight:bold!important;font-style:italic;border-top:1px dotted #e1e1e1;background:#e1e1e1;"><?php _e('Info boxes:','biggallery'); ?></option>
     <option value="infobox"><?php _e('Info box','biggallery'); ?></option> 
     <option value="errorbox"><?php _e('Error box','biggallery'); ?></option> 
     <option value="warningbox"><?php _e('Warning box','biggallery'); ?></option> 
	 <option value="successbox"><?php _e('Success box','biggallery'); ?></option> 

<option value="0" style="font-weight:bold!important;font-style:italic;border-top:1px dotted #e1e1e1;background:#e1e1e1;"><?php _e('Buttons:','biggallery'); ?></option>
     <option value="default_button"><?php _e('Default button','biggallery'); ?></option> 
     <option value="custom_button"><?php _e('Custom button','biggallery'); ?></option> 
	 
<option value="0" style="font-weight:bold!important;font-style:italic;border-top:1px dotted #e1e1e1;background:#e1e1e1;"><?php _e('Other:','biggallery'); ?></option>
     <option value="fancybox"><?php _e('Fancybox image','biggallery'); ?></option> 
	 <option value="img_loupe"><?php _e('Image with link and loupe icon','biggallery'); ?></option> 
     <option value="qtip"><?php _e('Qtip description','biggallery'); ?></option> 
	 
</select>

</div>
<div class="submitbox">
<div style="float:left"><input type="button" id="cancel" name="cancel" value="Close" onClick="tinyMCEPopup.close();" class="submitdelete deletion"/></div>
<div style="float:right"><input type="submit" id="insert" name="insert" value="Insert" onClick="insert_shortcode();"  class="button-primary button" /></div>
</div>
<div style="clear:both;"></div>
</div><!-- end shortcode_wrap -->




</form>
</body>
</html>
