function insert_shortcode() {
	
	var shortcode;
	var style = document.getElementById('shortcodes');
	

	if (style.className.indexOf('current') != -1) {
		var shortcode_select = document.getElementById('shortcode_select').value;
		
		
		
/*-----------------------------------------------------------------------------------*/
/* HIGHLIGHTS
/*-----------------------------------------------------------------------------------*/



if (shortcode_select == 'default_highlight'){
	shortcode = "[default_highlight]highlighted text goes here[/default_highlight]";	
}

if (shortcode_select == 'default_highlight2'){
	shortcode = "[default_highlight2]highlighted text goes here[/default_highlight2]";	
}

if (shortcode_select == 'custom_highlight'){
	shortcode = '[custom_highlight color="" background=""]highlighted text goes here[/custom_highlight]';	
}



/*-----------------------------------------------------------------------------------*/
/* COLUMNS
/*-----------------------------------------------------------------------------------*/



if (shortcode_select == '2-columns'){
	shortcode = "[two_columns_first]<br/>first column<br/>[/two_columns_first][two_columns_last]<br/>second column<br/>[/two_columns_last]";	
}

if (shortcode_select == '3-columns'){
	shortcode = "[three_columns_first]<br/>first column<br/>[/three_columns_first][three_columns]<br/>second column<br/>[/three_columns][three_columns_last]<br/>third column<br/>[/three_columns_last]";	
}

if (shortcode_select == '4-columns'){
	shortcode = "[four_columns_first]<br/>first column<br/>[/four_columns_first][four_columns]<br/>second column<br/>[/four_columns][four_columns]<br/>third column<br/>[/four_columns][four_columns_last]<br/>fourth column<br/>[/four_columns_last]";	
}

if (shortcode_select == '1_3_2_3-columns'){
	shortcode = "[three_columns_first]<br/>first column<br/>[/three_columns_first][two_third_columns_last]<br/>second column<br/>[/two_third_columns_last]";	
}

if (shortcode_select == '2_3_1_3-columns'){
	shortcode = "[two_third_columns_first]<br/>first column<br/>[/two_third_columns_first][three_columns_last]<br/>second column<br/>[/three_columns_last]";	
}

if (shortcode_select == '1_4_3_4-columns'){
	shortcode = "[four_columns_first]<br/>first column<br/>[/four_columns_first][three_fourth_columns_last]<br/>second column<br/>[/three_fourth_columns_last]";	
}

if (shortcode_select == '3_4_1_4-columns'){
	shortcode = "[three_fourth_columns_first]<br/>first column<br/>[/three_fourth_columns_first][four_columns_last]<br/>fourth column<br/>[/four_columns_last]";	
}

if (shortcode_select == '1_2_1_4_1_4-columns'){
	shortcode = "[two_columns_first]<br/>first column<br/>[/two_columns_first][four_columns]<br/>second column<br/>[/four_columns][four_columns_last]<br/>third column<br/>[/four_columns_last]";	
}

if (shortcode_select == '1_4_1_2_1_4-columns'){
	shortcode = "[four_columns_first]<br/>first column<br/>[/four_columns_first][two_columns]<br/>second column<br/>[/two_columns][four_columns_last]<br/>third column<br/>[/four_columns_last]";	
}

if (shortcode_select == '1_4_1_4_1_2-columns'){
	shortcode = "[four_columns_first]<br/>first column<br/>[/four_columns_first][four_columns]<br/>second column<br/>[/four_columns][two_columns_last]<br/>third column<br/>[/two_columns_last]";	
}



/*-----------------------------------------------------------------------------------*/
/* DIVIDERS
/*-----------------------------------------------------------------------------------*/



if (shortcode_select == 'hr'){
	shortcode = "[hr]";	
}

if (shortcode_select == 'clearfix'){
	 shortcode = "[clearfix]";	
}

if (shortcode_select == 'margin_1line'){
	shortcode = "[margin_1line]";	
}

if (shortcode_select == 'margin_1_2line'){
	 shortcode = "[margin_1_2line]";	
}



/*-----------------------------------------------------------------------------------*/
/* INFO BOXES
/*-----------------------------------------------------------------------------------*/



if (shortcode_select == 'infobox'){
	shortcode = "[infobox]box content goes here[/infobox]";	
}

if (shortcode_select == 'errorbox'){
	shortcode = "[errorbox]box content goes here[/errorbox]";	
}

if (shortcode_select == 'warningbox'){
	shortcode = "[warningbox]box content goes here[/warningbox]";	
}

if (shortcode_select == 'successbox'){
	shortcode = "[successbox]box content goes here[/successbox]";	
}



/*-----------------------------------------------------------------------------------*/
/* BUTTONS
/*-----------------------------------------------------------------------------------*/


if (shortcode_select == 'default_button'){
	shortcode = '[default_button url=""]button text[/default_button]';	
}

if (shortcode_select == 'custom_button'){
	shortcode = '[custom_button color="" background="" url=""]button text[/custom_button]';	
}



/*-----------------------------------------------------------------------------------*/
/* OTHER
/*-----------------------------------------------------------------------------------*/


if (shortcode_select == 'fancybox'){
	shortcode = '[fancybox float="left or right or center" title="photo title" thumbnail="path to thumbnail" large="path to large photo"]';	
}

if (shortcode_select == 'img_loupe'){
	shortcode = '[img_loupe float="left or right or center" title="photo title" thumbnail="path to thumbnail" link="paste url here"]';	
}

if (shortcode_select == 'qtip'){
	shortcode = '[qtip title="qtip title"]content[/qtip]';	
}




if ( shortcode_select == 0 ){
	tinyMCEPopup.close();
}
}
if(window.tinyMCE) {
		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, shortcode);
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();
}
return;
}