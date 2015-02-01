/*
* Plugin Name: Vimeo Youtube Popup Plugin Stylesheet
*
* Plugin URI: http://nrivers.com
* Description: This plugin will take a video ID and load it in a popup.
* Author: N. Rivers
*
* Version: 1.0
* Author URI: http://nrivers.com
*/

jQuery(function(){
	var cur = cur;
	var a=jQuery(document).height();
 	var b=jQuery(window).width();
});

function centerS(cur) {
	cur = cur;	
    cur.css("position","absolute");
    cur.css("top", ( jQuery(window).height() - cur.height() ) / 2+jQuery(window).scrollTop() + "px");
    cur.css("left", ( jQuery(window).width() - cur.width() ) / 2+jQuery(window).scrollLeft() + "px");
    return this;
}

function getwidthheight() {
	a=jQuery(document).height();
    b=jQuery(window).width();
	jQuery("#dvGlobalMask").css({width:b,height:a});
}

function centervert(cur) {
    cur.stop().animate({"top": (jQuery(window).scrollTop() + 100) + "px"}, "slow" );
    return this;
}

jQuery.fn.videopopup = function (options) {	
	
	function centerS(cur) {
		
		var cur = cur;
		
	    cur.css("position","absolute");
	    cur.css("top", ( jQuery(window).height() - cur.height() ) / 2+jQuery(window).scrollTop() + "px");
	    cur.css("left", ( jQuery(window).width() - cur.width() ) / 2+jQuery(window).scrollLeft() + "px");
	    return this;
	}
	
	jQuery(this).click(function(event){
		event.preventDefault();
		
		// Data
		var videoid = jQuery(this).data('videoid');
		var videoplayer = jQuery(this).data('videoplayer');
		var width = jQuery(this).data('width');
		var height = jQuery(this).data('height');
		var theautoplay = jQuery(this).data('autoplay');
		var path = jQuery(this).data('path');
		var text = jQuery(this).data('text');
		var borcolor = jQuery(this).data('color');
		
		console.log(borcolor);
		
		
		var a=jQuery(document).height();
	    var b=jQuery(window).width();
		var popuphtml = '<div id="dvGlobalMask"></div><div id="videopopup" style="border-color:'+borcolor+'"><div class="modalnav"></div><div id="videocontent"></div></div>';
		jQuery('body').append(popuphtml);
	    jQuery("#dvGlobalMask").css({width:b,height:a});
	    jQuery("#dvGlobalMask").fadeTo("fast",0.7);
		
		jQuery('#videopopup').css('width' , width);
		jQuery('#videopopup').css('height' , height);
		centerS(jQuery("#videopopup"));
		
		var autoplay = 0;
		if (theautoplay == true) {
			autoplay = 1;
		} else {
			autoplay = 0;
		}

		
		// Checks for the type of video that is being pulled.
		youtubestr = '<iframe width="' + width + '" height="' + height + '" src="http://www.youtube.com/embed/' + videoid + '?rel=0&autoplay=' + autoplay + '&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>';
		vimeostr = '<iframe src="http://player.vimeo.com/video/' + videoid + '?color=00adef&amp;show_title=0&amp;show_portrait=0&amp;autoplay=' + autoplay + '" width="' + width + '" height="' + height + '" frameborder="0"></iframe>';
		
		switch (videoplayer) {
			case 'youtube' :
				jQuery("#videocontent").html(jQuery(youtubestr));
			break;
			case 'vimeo' :
				jQuery("#videocontent").html(jQuery(vimeostr));
			break;
		}
		
		jQuery("#videopopup").fadeIn();
		jQuery('.modalnav').show();
		
		jQuery("body").on("click", ".modalnav", function(event){
			jQuery('#dvGlobalMask').remove();
			jQuery('#videopopup').remove();
			jQuery('.modalnav').remove();
			jQuery('#videocontent').remove('');
		});
    });

}

// Init Plugin
jQuery(function(){
	jQuery(".vimeoyoutubepopup_video").videopopup();
});

jQuery(window).resize(function() {
	centerS(jQuery("#videopopup"));
	getwidthheight();
});

jQuery(window).scroll(function() {
	centervert(jQuery("#videopopup"));
});
