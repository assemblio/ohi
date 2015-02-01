/***********************
Big Gallery
Author: Jan Skwara
version: 01.08.2013
***********************/
"use strict";

var hovered = false;
var menu_hovered = false;
var left = false;
var right = true;
var thumb_shown = false;

var initialHide = 0;

//variables
var w_width = jQuery(window).width();
var w_height = jQuery(window).height();
var $loader;
var $gallery_img;
var $gallery;
var $logo;
var $logo_sr;
var $logo_sq;
var $menu_show;
var $menu_hide;
var $menu;
var $page;
var $body;
var $gallery_show;
var $gallery_hide;
var $mini_cont;
var $mini_prev;
var $mini_next;
var $thumbnails;
var $left;
var $right;
var $desc_info;
var $video_desc_info;
var $fullscreen;
var $play;
var $sound;
var $video_play;
var $video_sound;
var $myPlayer;
var ie8;
var $background_img;
var $shadow_reverse;

var deviceAgent = navigator.userAgent.toLowerCase();
var agentID = deviceAgent.match(/(iphone|ipod|ipad|android|blackberry|webos|windows phone)/);


jQuery(document).ready(function($) {
	


/***** INITIALIZATION *****/



	$body = $("body");
  	var ie8 = ($body.css('z-index')=='1')?true:false;

	//SET CONFIG 
	if( typeof homePage !== 'undefined' && homePage== true )
	{
		autoplay  = autoplayHome;
		slideSize = slideSizeHome;
		soundplay = soundplayHome;
	}
	
	$loader          = $("#loader");
	$gallery         = $("#gallery");
	$logo            = $("#logo");
	$logo_sr         = $("#logo_sr");
	$logo_sq         = $("#logo_sq");
	$menu_show       = $("#menu-show");
	$menu_hide       = $("#menu-hide");
	$menu            = $("#menu");
	$page            = $("#page");
	$gallery_show    = $("#gallery-show");
	$mini_cont       = $("#mini_cont");
	$gallery_hide    = $("#gallery_hide");
	$mini_prev       = $("#mini_prev");
	$mini_next       = $("#mini_next");
	$thumbnails      = $("#thumbnails");
	$left            = $("#left");
	$right           = $("#right");
	$desc_info       = $("#desc_info");
	$video_desc_info = $("#video_desc_info");
	$fullscreen      = $("#fullscreen");
	$play            = $("#play");
	$sound           = $("#sound");
	$video_play      = $("#video_play");
	$video_sound     = $("#video_sound");
	$background_img  = $("#background img");
	$gallery_img     = $("#gallery img");	
		
	if(agentID) { 
		logoHide=0; 
		videopattern=false; 
		imgpattern=false; 
		if($page.length) { 
			$("html").css('overflow','visible'); 
			$body.css('overflow','visible');
		}
	}
 
	//POSITIONING LOGO AND MENU
	
	$('html').BGresponsive_menu();
	   	
	//PATTERNS
		
	if(videopattern=="1") {
		$("#video-pattern").css("visibility","visible");
	}
	if(imgpattern=="1") {
		$("#img-pattern").css("visibility","visible");
	}
	
	
		
/***** SHOW / HIDE MENU *****/


		
	if( $page.length || menuShown == true ) {	
		$menu.fadeIn('fast');
	} else {
		if(!agentID) {
			$menu.hover(function() {
				hovered = true; 
				menu_hovered = true;
			},
			function() {  
				window.setTimeout(function() {
					if(menu_hovered == false) {
						if($(window).width()>=760) $menu.fadeOut('slow');
						$menu_hide.fadeOut('slow');
					}
				},300);
				hovered = false;
				menu_hovered = false;	
			});  
			$menu_show.hover(function() {  
				hovered = true;
				$menu.stop().fadeIn('slow');
				$menu_hide.stop().fadeIn('slow');
			}, function() { hovered = false});  
		} else {
			$menu_show.click(function() {  
				$menu.stop().fadeIn('slow');
				$menu_hide.stop().fadeIn('slow');
			});  
			$menu_hide.click(function() {  
				$menu.stop().fadeOut('slow');
				$menu_show.stop().fadeIn('slow');
				$menu_hide.fadeOut('slow');
			});  
		}
	}
	if( menuShown == true ) {
		$menu_show.remove();
		$menu_hide.children("div").remove();
		if($(window).width()>=760) $menu_hide.fadeTo('fast',1);
	}
	

	
/***** SUPERFISH MENU *****/


	
	$("ul.sf-menu").superfish({ 
		animation: {height:'show'},   // slide-down effect without fade-in 
		delay:     200,               // .2 second delay on mouseout 
		autoArrows:  false,
		dropShadows:   false
       }); 
});



(function($) {
	$(window).load(function() {



/***** SAFARI & CHROME POSITIONING FIX *****/				
				
				
				
	window.setTimeout(function() { $menu_hide.css("top",$logo.innerHeight() + $menu.innerHeight() +"px"); if($page.length) {if($(window).width()>=760)  $menu_hide.fadeTo('fast',1);} },100);			
	window.setTimeout(function() { $menu_hide.css("top",$logo.innerHeight() + $menu.innerHeight() +"px");  },600);

	window.setTimeout(function() { $menu_hide.css("top",$logo_sr.innerHeight() + $menu.innerHeight() +"px"); if($page.length) {if($(window).width()>=760)  $menu_hide.fadeTo('fast',1);} },100);			
	window.setTimeout(function() { $menu_hide.css("top",$logo_sr.innerHeight() + $menu.innerHeight() +"px");  },600);	

	window.setTimeout(function() { $menu_hide.css("top",$logo_sq.innerHeight() + $menu.innerHeight() +"px"); if($page.length) {if($(window).width()>=760)  $menu_hide.fadeTo('fast',1);} },100);			
	window.setTimeout(function() { $menu_hide.css("top",$logo_sq.innerHeight() + $menu.innerHeight() +"px");  },600);	

	var $page_block = $('.page_block');
	window.setTimeout(function() {	$shadow_reverse.css("top", $page_block.innerHeight() -$shadow_reverse.innerHeight()+ 'px'); },1000);



/***** SETTING WIDTH AND HEIGHT OF BACKGROUND *****/



	var img_prop = $background_img.width() / $background_img.height();
	var browser_prop = w_width/w_height;
	if( img_prop < browser_prop ) {
		$background_img.css("width",w_width + "px");
		$background_img.css("margin-top",-($background_img.height() - w_height)/2 + "px");
		$background_img.css("margin-left","0px");
	} else {
		$background_img.css("height",w_height + "px");
		$background_img.css("margin-left",-($background_img.width() - w_width)/2 + "px");
		$background_img.css("margin-top","0px");
	}
	$background_img.css("visibility","visible");
	
	

/***** SETTING WIDTH AND HEIGHT OF GALLERY *****/
	
	

	if( $gallery_img.length ) {
		$('html').BGresponsive_gallery();
	}


	
/***** HIDE / SHOW ITEMS *****/



	$loader.fadeOut('slow');
	$fullscreen.css('visibility','visible');
	$play.css('visibility','visible');
	$sound.css('visibility','visible');
	$video_play.css('visibility','visible');
	$video_sound.css('visibility','visible');
	if( ! $page.length ) {	
		$("#thumbnails_bg").css('visibility','visible');
		$gallery_show.css('visibility','visible');
		$desc_info.attr('class','item_1');
		if($('#desc_item_1').html()) {$desc_info.css('visibility','visible');} else {$desc_info.css('visibility','hidden');}
		$gallery_img.css('visibility','visible');
		
	
	
/***** MAIN CAROUSEL *****/



		if( $gallery.length ) {
			var cfs = $gallery.carouFredSel({
				padding: 0,
				width: 8000,
				height: w_height,
				auto: {
					play: autoplay,
					pauseDuration: autoplaySpeed
				},
				scroll: {
					items: 1,
					duration:11,
					onBefore: function(oldItems,newItems) {
							
						w_width = $(window).width();
						w_height = $(window).height();
						var $caroufredsel_wrapper = $('#slider').find('div.caroufredsel_wrapper');
						var old_margin = parseInt($caroufredsel_wrapper.css('margin-left'));
						var margin = -$(newItems.get(0)).innerWidth() -$(newItems.get(1)).innerWidth() - $(newItems.get(2)).innerWidth()/2 + w_width/2;
						$caroufredsel_wrapper.animate({marginLeft:margin},11);
						$(newItems.get(1)).stop().fadeTo(0,0.1);
						$(oldItems.get(2)).stop().fadeTo(0,0.1);
							
						var margin_top = ( ( w_height - $(newItems.get(2)).innerHeight() ) / 2 );
						$caroufredsel_wrapper.css({'margin-top':margin_top+'px'});
						$gallery.css("height",w_height - margin_top + "px");
						$(newItems.get(2)).stop().fadeTo((($.browser.webkit)?600:1500),0.99);
						$caroufredsel_wrapper.css("height",w_height - margin_top +'px');
						$desc_info.attr('class',$(newItems.get(2)).attr('id'));
						if( ! $('#desc_' + $(newItems.get(2)).attr('id')).html() ) {
							$desc_info.css('visibility','hidden');
						} else {
							$desc_info.css('visibility','visible');
						}
					}
				},
				items: {
					visible: 4,
					start: -2,
					width: "variable"
				},
				prev: {	
					button: "#scroll_left",
					key: "left"
				},
				next: { 
					button: "#scroll_right",
					key: "right"
				}
			});
		
		
		
	/***** THUMBNAIL CAROUSEL *****/



		if( agentID || w_width < 980 ) { 
			if( w_width >= 760 ) {
				var vis = 3; 
				var wid = 342; 
				var item_width = 104;
				$mini_cont.css("width","520px");
				$thumbnails.css("width","446px");
				$("#thumbnails_cont").css("width","347px");
				$("#bottom-line").css("width","520px");
			} else {
				var vis = 3; 
				var wid = 192;	
				var item_width = 54;
				$mini_cont.css("width","350px");
				$thumbnails.css("width","206px");
				$("#thumbnails_cont").css("width","207px");
				$("#bottom-line").css("width","350px");
			}
		} else { 
			var vis = 7; 
			var wid = 960; 
			var item_width = 104;
		}

		var cfs2 = $thumbnails.carouFredSel({
			width: wid,
			padding: 5,
			auto : false,
			infinite:false,
			circular: false,
			items: {
				width: item_width,
				visible: vis,
				height:"auto"
			},
			scroll: {
				items: 1,
				duration: 200,
				start:-2,
				easing: "linear"
			},
			prev : { 
				onAfter : function() {
					$mini_next.fadeIn();
					right = true;
					if(scroll_prev&&!agentID) setTimeout(function() { $thumbnails.trigger("prev"); }, 10);
				},
				onEnd: function() {
					$mini_prev.fadeOut();
					left = false;
				}
			},
			next : { 
				onAfter : function() {
				 //alert('next');
					$mini_prev.fadeIn();
					left = true;
					if(scroll_next&&!agentID) setTimeout(function() { $thumbnails.trigger("next"); }, 10);
				},
				onEnd: function() {
					$mini_next.fadeOut();
					right = false;
				}
			}
		});

		
			
	/***** POSITIONING THUMBANILS GALLERY *****/
		

		$mini_cont.css("left",(w_width - $mini_cont.innerWidth())/2 + "px");
		$gallery_hide.css({bottom:-w_height- $gallery_hide.innerHeight() + 'px'});
		$mini_prev.css("bottom",($mini_cont.innerHeight() - $mini_prev.innerHeight() )/2 + $("#bottom-line").innerHeight()/2);
		$mini_next.css("bottom",($mini_cont.innerHeight() - $mini_prev.innerHeight() )/2 + $("#bottom-line").innerHeight()/2);
		$mini_cont.css({bottom:-w_height- $mini_cont.innerHeight()-$gallery_hide.innerHeight() + 'px'});
		
		//INITIAZING SMALL ARROWS FOR THUMBNAILS SCROLL
		
		var scroll_prev;
		var scroll_next;
		
		if( !agentID ) {
			$mini_prev.hover(
				function() { 
					scroll_prev = true;
					$thumbnails.trigger("prev"); 
				},
				function() { 
					scroll_prev = false;
				}
			).click(
				function() {
					return false;
			});
			$mini_next.hover(
				function() { 
					scroll_next = true;
					$thumbnails.trigger("next"); 
				},
				function() {
					scroll_next = false;
				}
			).click(
				function() {
					return false;
			});
		} else {
			$mini_prev.click(
				function() { 
					scroll_prev = true;
					$thumbnails.trigger("prev"); 
				});
			$mini_next.click(
				function() { 
					scroll_next = true;
					$thumbnails.trigger("next"); 
				});
		}
	 
		$thumbnails.children("a").hover(
			function() { 
				$(this).children("img").fadeTo("medium",1);
			},
			function() { 
				$(this).children("img").fadeTo("medium",0.7);
			}
		);
		
		
		
	/***** POSITIONING MAIN GALLERY ITEMS *****/
		
		
		
		var obj = $("#gallery img");
		var l = obj.length;
		var $slider_wrapper = $('#slider div.caroufredsel_wrapper');
		
		// slide width
		var slide  = $(obj.get(2)).innerWidth();
		var slide2 = $(obj.get(1)).innerWidth();
		var slide3 = $(obj.get(0)).innerWidth()
		
		// negative margin to apply
		var margin = ( ( w_width - slide ) / 2 ) - slide3 - slide2;
		var margin_top = ( ( w_height - $(obj.get(2)).innerHeight() ) / 2 );
		
		// apply negative margin
		$slider_wrapper.css({'overflow':'hidden'});
		$slider_wrapper.css({'margin-left':margin+'px'});
		$slider_wrapper.css({'height':w_height - margin_top+'px'});
		$gallery.css("height",w_height - margin_top + "px");
		//alert($slider_wrapper.css('height'));
		$slider_wrapper.css({'margin-top':margin_top+'px'});
		$(obj.get(2)).fadeTo('fast',1);
		
		
		
	/***** SHOW / HIDE THUMBNAILS*****/
		
		
		
		if( ! agentID ) {
			$("#thumbnails_bg").hover(
				function()  {},
				function() {  
					thumb_shown = false;
					$($gallery_hide, this).stop().animate({bottom:-w_height - $gallery_hide.innerHeight() + 'px'},{queue:false,duration:1500});
					$gallery_show.fadeIn('slow');
					$($mini_cont, this).stop().animate({bottom:-w_height - $mini_cont.innerHeight() - $gallery_hide.innerHeight() + 'px'},{queue:false,duration:1500}, function() {}); 	
			});  
			 
			$gallery_show.hover(function() {  
				thumb_shown = true;
				hovered = true;
				$gallery_show.fadeOut('slow');
				$($gallery_hide, this).stop().animate({bottom:  $mini_cont.innerHeight() +'px'},500,"linear");
				$mini_cont.stop().animate({bottom: '0px'},500,"linear", function() {
					if(left) $mini_prev.fadeTo('slow',0.8);
					if(right) $mini_next.fadeTo('slow',0.8);
				});
			}, 
			function() {
				hovered = false
			});  
		} else {
			$gallery_hide.click(function() {  
				thumb_shown = false;
				$($gallery_hide, this).stop().animate({bottom:-w_height - $gallery_hide.innerHeight() + 'px'},{queue:false,duration:1500});
				$gallery_show.fadeIn('slow');
				$($mini_cont, this).stop().animate({bottom:-w_height - $mini_cont.innerHeight() - $gallery_hide.innerHeight() + 'px'},{queue:false,duration:1500}, function() {}); 	
			});  
			 
			$gallery_show.click(function()  {  
				thumb_shown = true;
				hovered = true;
				$gallery_show.fadeOut('slow');
				$($gallery_hide, this).stop().animate({bottom:  $mini_cont.innerHeight() +'px'},500,"linear");
				$mini_cont.stop().animate({bottom: '0px'},500,"linear", function() {
					if( left ) $mini_prev.fadeTo('slow',0.8);
					if( right ) $mini_next.fadeTo('slow',0.8);
				});
			});  
		} 
			
			
			
	/***** PHOTO DESCRIPTION  *****/  
		

		
		$desc_info.click(function (e) {
			var this_wrapper_h = $slider_wrapper.css('height');
			var this_gallery_h = $gallery.css('height');
			var slideshow = cfs.configuration("auto.play");
			if($('#desc_'+ $(this).attr('class')).html()) {
				$('#desc_'+ $(this).attr('class')).modal({
					close: true,
					opacity: 0,
					overlayClose: true,
					onShow: function() {
						if( slideshow==true ) {
							cfs.configuration("auto.play", false);
							$gallery.trigger("play", true);
						}
						var $simplemodal_container = $('#simplemodal-container');
						$simplemodal_container.css('height', 'auto');
						$simplemodal_container.css('top', ((w_height -$simplemodal_container.innerHeight())/2)+'px');
						$("#modal_shadow").css('top',(w_height -$simplemodal_container.innerHeight())/2 + $simplemodal_container.innerHeight() - 1 +'px');
						$("#modal_shadow").css('left',$simplemodal_container.css('left'));
						$("#modal_shadow").css('margin-left',$simplemodal_container.css('margin-left'));
						$("#modal_shadow").css('display','block');
						$('.simplemodal-wrap').css('max-height', w_height*0.8 + 'px');
						$slider_wrapper.css({'height':this_wrapper_h});
						$gallery.css({'height':this_gallery_h});
					},
					onClose: function() {
						$("#modal_shadow").css('display','none');
						if( slideshow==true ) {
							cfs.configuration("auto.play", true);
							$gallery.trigger("play", true);
						}
						$.modal.close();
						$slider_wrapper.css({'height':this_wrapper_h});
						$gallery.css({'height':this_gallery_h});
					} 
				});
				return false;
			}
		});


		
	/***** START / STOP AUTOPLAY  *****/ 



		if( autoplay == true ) { 
			$("#play #play_icon").addClass("play_on");
		} else {
			$("#play #play_icon").addClass("play_off");
		}
		
		$play.click(function() {
			if($("#play_icon").hasClass("play_on")) {
				var this_wrapper_h = $slider_wrapper.css('height');
				var this_gallery_h = $gallery.css('height');
				cfs.configuration("auto.play", false);
				$gallery.trigger("play", true);
				$slider_wrapper.css({'height':this_wrapper_h});
				$gallery.css({'height':this_gallery_h});
				$("#play_icon").removeClass("play_on");
				$("#play_icon").addClass("play_off");
			} else {
				cfs.configuration("auto.play", true);
				$gallery.trigger("play", true).trigger("next");
				$("#play_icon").removeClass("play_off");
				$("#play_icon").addClass("play_on");		
			}
		});
	}
} else {
	$page.css('visibility','visible');
}
	
	
	
/*****MUSIC  *****/ 



var commend = "play";
if( soundplay==true ) { 
	$("#sound_icon").addClass("sound_on"); 
} else {
	$("#sound_icon").addClass("sound_off"); 
	commend = "pause";
}

if( sound_mp3 ) {
	$("#jquery_jplayer_1").jPlayer({
        ready: function () {
          $(this).jPlayer("setMedia", {
            mp3: sound_mp3
          }).jPlayer(commend);
        },
		ended: function() { // The $.jPlayer.event.ended event
			if ( audio_loop ) {
				$(this).jPlayer("play"); // Repeat the media
			}
		},
        swfPath: uri+"/js/jPlayer",
		supplied: "mp3",
		wmode:"window"
	});
	
	$sound.click(function() {
		if($("#sound_icon").hasClass("sound_on")) {
			$("#jquery_jplayer_1").jPlayer("pause");
			$("#sound_icon").removeClass("sound_on");
			$("#sound_icon").addClass("sound_off");
		} else {
			$("#jquery_jplayer_1").jPlayer("play");
			$("#sound_icon").removeClass("sound_off");
			$("#sound_icon").addClass("sound_on");		
		}
	});	
} else {
	$sound.css('visibility','hidden');
}
	


/***** FULLSCREEN BUTTON  *****/ 



$("#fullscreen_icon").addClass("full_on");
var fullscreen_on = false;
$fullscreen.click(function() {
	if( $("#fullscreen_icon").hasClass("full_on") ) {
		fullscreen_on = true;
		$menu_show.fadeOut("fast");
		$gallery_show.fadeOut("fast");
		$left.fadeOut("fast");
		$right.fadeOut("fast");
		$desc_info.fadeOut("fast");
		$video_desc_info.fadeOut("fast");
		$play.fadeOut("fast");
		$sound.fadeOut("fast");
		$logo.fadeOut("fast");
		$logo_sr.fadeOut("fast");
		$video_sound.fadeOut("fast");
		$video_play.fadeOut("fast");
		$page.fadeOut("fast");
		$menu.fadeOut("fast");
		$menu_hide.fadeOut("fast");
		if(agentID) $mini_cont.fadeOut("fast");
		$("#fullscreen_icon").removeClass("full_on");
		$("#fullscreen_icon").addClass("full_off");
	} else {
		fullscreen_on = false;
		$logo.stop(true,true);
		$logo.fadeIn('fast');
		$logo_sr.stop(true,true);
		$logo_sr.fadeIn('fast');
		$logo_sq.stop(true,true);
		$logo_sq.fadeIn('fast');
		$menu_show.stop(true,true);
		if( $(window).width() >= 760 ) {
			$menu_show.fadeIn('fast');
		}
		if( ! thumb_shown ) {
			$gallery_show.stop(true,true);
			$gallery_show.fadeIn('fast');
		}
		if( menuShown || $(window).width() < 760 ) {
			$menu.stop(true,true);
			$menu.fadeIn('fast');
			$menu_hide.stop(true,true);
			if( $(window).width() >= 760 ) {
				$menu_hide.fadeIn('fast');
			}
		}
		if( agentID ) {
			$mini_cont.fadeIn('fast');
		}
		$left.stop(true,true);
		$left.fadeIn('fast');
		$right.stop(true,true);
		$right.fadeIn('fast');
		$desc_info.stop(true,true);
		$desc_info.fadeIn('fast');
		$video_desc_info.stop(true,true);
		$video_desc_info.fadeIn('fast');
		$fullscreen.stop(true,true);
		$play.stop(true,true);
		$play.fadeIn('fast');
		$sound.stop(true,true);
		$sound.fadeIn('fast');
		$video_play.stop(true,true);
		$video_play.fadeIn('fast');
		$video_sound.stop(true,true);
		$video_sound.fadeIn('fast');
		if( $page.length ) {
			$page.stop(true,true);
			$page.fadeIn('fast');
			$menu.stop(true,true);
			$menu.fadeIn('fast');
			$menu_hide.stop(true,true);
			if( $(window).width() >= 760 ) {
				$menu_hide.fadeIn('fast');
			}
			$(window).trigger("debouncedresize");
		}
		$("#fullscreen_icon").removeClass("full_off");
		$("#fullscreen_icon").addClass("full_on");		
	}
});
		
		
		
/***** SHOW / HIDE LOGO, ARROWS, ETC. *****/



if( ! $page.length && logoHide != 0 ) {
	var i = 0;
	$mini_cont.hover(function()  {hovered=true;},function()  {hovered=false;});
	$logo.hover(function()  {hovered=true;},function()  {hovered=false;});
	$logo_sr.hover(function()  {hovered=true;},function()  {hovered=false;});
	$logo_sq.hover(function()  {hovered=true;},function()  {hovered=false;});
	$left.hover(function()  {hovered=true;},function()  {hovered=false;});
	$right.hover(function()  {hovered=true;},function()  {hovered=false;});
	$desc_info.hover(function()  {hovered=true;},function()  {hovered=false;});
	$video_desc_info.hover(function()  {hovered=true;},function()  {hovered=false;});
	$fullscreen.hover(function()  {hovered=true;},function()  {hovered=false;});
	$play.hover(function()  {hovered=true;},function()  {hovered=false;});
	$sound.hover(function()  {hovered=true;},function()  {hovered=false;});
	$video_play.hover(function()  {hovered=true;},function()  {hovered=false;});
	$video_sound.hover(function()  {hovered=true;},function()  {hovered=false;});
	$(window).everyTime(1000,function() {
		i = i + 1;
		if( i==logoHide && hovered==false && fullscreen_on==false && $(window).width() >= 760 ) {
			$menu_show.fadeOut(3000);
			$menu_hide.fadeOut(3000);
			$menu.fadeOut(3000);
			$gallery_show.fadeOut(3000);
			$left.fadeOut(3000);
			$right.fadeOut(3000);
			$desc_info.fadeOut(3000);
			$video_desc_info.fadeOut(3000);
			$play.fadeOut(3000);
			$sound.fadeOut(3000);
			$video_play.fadeOut(3000);
			$video_sound.fadeOut(3000);
			$logo.fadeOut(3000, function() { 
				if (!$.browser.webkit ) { 
					$body.css({cursor: 'none'}); 
				}
			});
			$logo_sr.fadeOut(3000, function() { 
				if (!$.browser.webkit ) { 
					$body.css({cursor: 'none'}); 
				}
			});
			$logo_sq.fadeOut(3000, function() { 
				if (!$.browser.webkit ) { 
					$body.css({cursor: 'none'}); 
				}
			});
		}
		if( i==logoHide && hovered==false && $(window).width() >= 760 )  {
			$fullscreen.fadeOut(3000);
			if( ! $.browser.webkit ) { 
				$body.css({cursor: 'none'});
			}
		}
	});
		
	$(document).mousemove(function(event) {
		i = 0;
		if( fullscreen_on == false ) {
			i = 0;
			$logo.stop(true,true);
			$logo.fadeIn('slow');
			$logo_sr.stop(true,true);
			$logo_sr.fadeIn('slow');
			$logo_sq.stop(true,true);
			$logo_sq.fadeIn('slow');
			$menu_show.stop(true,true);
			if( $(window).width() >= 760 ) {
				$menu_show.fadeIn('slow');
			}
			if( !thumb_shown ) {
				$gallery_show.stop(true,true);
				$gallery_show.fadeIn(1000);
			}
			if( menuShown ) {
				$menu.stop(true,true);
				$menu.fadeIn(1000);
				$menu_hide.stop(true,true);
				if( $(window).width() >= 760 ) {
					$menu_hide.fadeIn(1000);
				}
			}
			$left.stop(true,true);
			$left.fadeIn('slow');
			$right.stop(true,true);
			$right.fadeIn('slow');
			$desc_info.stop(true,true);
			$desc_info.fadeIn('fast');
			$video_desc_info.stop(true,true);
			$video_desc_info.fadeIn('fast');
			$play.stop(true,true);
			$play.fadeIn('fast');
			$sound.stop(true,true);
			$sound.fadeIn('fast');
			$video_play.stop(true,true);
			$video_play.fadeIn('fast');
			$video_sound.stop(true,true);
			$video_sound.fadeIn('fast');				
		}
		$fullscreen.stop(true,true);
		$fullscreen.fadeIn('fast');
		if ( ! $.browser.webkit ) {
			$body.css({cursor: 'default'});
		}
	});
}
	
	
		
/***** QTIP *****/



var $qtip = $('.qtip');
if( ($qtip).length && ! agentID ) {
	if(skin == 'dark') {
		var qtip_bg='#0c0c0c'; 
		var qtip_color='#c0c0c0'; 
	} else {
		var qtip_bg='#ffffff'; 
		var qtip_color='#4f4f4f'; 
	}
	$qtip.qtip({
		position: { target: 'mouse', adjust: { x: 5, y:25} },
		hide: { effect: { type: 'slide', length: 0 } },
		show: { effect: { type: 'slide', length: 0 } },
		style: {	 
			'padding': '6px',
			'background': qtip_bg,
			'color': qtip_color,
			'textAlign': 'center',
			width: { min: 100 },
			border: {
				width: 0,
				color: '#333333'
			},
			tip: { 
				corner: 'topLeft', // We declare our corner within the object using the corner sub-option
				color: qtip_bg,
				size: {
					x: 15, // Be careful that the x and y values refer to coordinates on screen, not height or width.
					y : 10 // Depending on which corner your tooltip is at, x and y could mean either height or width!
				}
			}, 
			name: 'dark' // Inherit the rest of the attributes from the preset dark style
		}	 
	});
}

			
			
/***** JSCROLLPANE  *****/  
			
			
			
if( $page.length ) {			
	if( $(window).width() < 760 )  {
		$('.scroll-pane','#page').css('height',w_height-$('.big_header','#page').outerHeight()-$('.submenu','#page').outerHeight()-$page.css('margin-top').replace('px', '') -$('#page_top').outerHeight() - $menu.outerHeight()+'px');
	} else {
		$('.scroll-pane','#page').css('height',w_height-$('.big_header','#page').outerHeight()-$('.submenu','#page').outerHeight()-$page.css('margin-top').replace('px', '') -$('#page_top').outerHeight() +'px');
	}
	var settings = {
		hijackInternalLinks: true
	};
		
	var pane = $('.scroll-pane')
	pane.jScrollPane(settings);
	var api = pane.data('jsp');
	window.api = api;
	$('.submenu a','#page').click(function() {
		$shadow_reverse.css("display", "none"); 
		window.setTimeout(function() {
			api.reinitialise(); 
			$shadow_reverse.css("top", $page_block.innerHeight() -$shadow_reverse.innerHeight()+ 'px'); 
			$shadow_reverse.css("display", "block"); 
			window.setTimeout(function() {
				api.reinitialise();
				$shadow_reverse.css("top", $page_block.innerHeight() -$shadow_reverse.innerHeight()+ 'px'); 
	},1000)},1000) });
	
	var $page_item=$('#page').find('.item');
	var max_w = 0;
	var max_h = 0;
	$page_item.each(
		function(index) {
			var $this_img = $(this).find('img');
			if($this_img.innerHeight()>max_h)  {max_h=$this_img.innerHeight(); }
			if($this_img.innerWidth()>max_w) { max_w=$this_img.innerWidth(); }
			$(this).css({'height':$this_img.innerHeight() + 'px','width':$this_img.innerWidth() + 'px'});
			var $loupe = $(this).find(".loupe");
			$loupe.css({"top":$(this).innerHeight()/2-$loupe.innerHeight()/2 + "px", 'left':$(this).innerWidth()/2-$loupe.innerWidth()/2 + "px"});
			$(this).find(".shadow").css({"width":$(this).innerWidth(),"top":$(this).innerHeight() + 1 +'px'});
	});
	$page_item.css({"visibility":"visible"});	
	api.reinitialise();			
			
	$(".loupe").click(function() {
		var $loupelink = $(this).parent().find('a').not(".butt");
		 if($loupelink.hasClass('fancybox') || $loupelink.hasClass('gallery_group')) {
			$loupelink.click();
		} else {
			window.location =$loupelink.attr("href");
		}
	});
		
	$('.blogitem','#page').each(
		function(index) {
			var $this_img = $(this).find('img');
			$(this).css({'height':$this_img.innerHeight() + 'px','width':$this_img.innerWidth() + 'px'});
			$(this).find(".mblogfooter").css('left',$(this).innerWidth()/2-$(this).children(".mblogfooter").innerWidth()/2 + "px");
			$(this).append('<img src="'+uri+'/img/'+skin+'/shadow.png" class="shadow" alt=""/>');
			$(this).find(".shadow").css({"width":$(this).innerWidth(),"top":$(this).innerHeight() + 1 +'px'});
		}
	);
	$('.blogitem','#page').css('visibility','visible');
	api.reinitialise();			
}


	
/***** FILTERABLE  *****/  



	$('.submenu').append('<img src="'+uri+'/img/'+skin+'/shadow.png" class="shadow" alt=""/>');
	$('.submenu').find(".shadow").css("width",$('.submenu').innerWidth());
	$('.submenu').find(".shadow").css("top",$('div.big_header').innerHeight() + $('.submenu').innerHeight() + 'px');
	
	if( !agentID ) {
		$('.page-footer').append('<img src="'+uri+'/img/'+skin+'/shadow_reverse.png" class="shadow-reverse" alt=""/>');
		$shadow_reverse=$('.page-footer').find(".shadow-reverse");
		$shadow_reverse.css("width",$('.page-footer').innerWidth());
		$shadow_reverse.css("top", $page_block.innerHeight() -$shadow_reverse.innerHeight()+ 'px'); 
	
		$('input:not([type=submit]):not([type=button]):not([type=hidden]):not([type=checkbox])').each(
			function(index) {
				var position = $(this).position();
				$(this).after('<img src="'+uri+'/img/'+skin+'/shadow.png" class="shadow" />');
				$(this).next(".shadow").css("width",$(this).innerWidth());
				$(this).next(".shadow").css("top",position.top + $(this).innerHeight() -7);
				$(this).next(".shadow").css("left",position.left);
			}
		);
		$('#sidebar input').next('img.shadow').css('display','none');

		$('textarea').each(
			function(index) {
				var position = $(this).position();
				$(this).after('<img src="'+uri+'/img/'+skin+'/shadow.png" class="shadow" />');
				$(this).next(".shadow").css("width",$(this).innerWidth());
				$(this).next(".shadow").css("top",position.top + $(this).innerHeight() -7);
				$(this).next(".shadow").css("left",position.left);
			}
		);
			
		$('#sidebar textarea').next('img.shadow').css('display','none');
		
		//comments form
		$('.comment-reply-link,#cancel-comment-reply-link').click(function() {
			window.setTimeout(function() {
				$('input:not([type=submit]):not([type=button]):not([type=checkbox])').each(
					function(index) {
						var position = $(this).position();
						$(this).next(".shadow").css("top",position.top + $(this).innerHeight() -7);
						$(this).next(".shadow").css("left",position.left);
					}
				);
					$('textarea').each(
					function(index) {
						var position = $(this).position();
						$(this).next(".shadow").css("top",position.top + $(this).innerHeight() -7);
						$(this).next(".shadow").css("left",position.left);
					}
				);
			},100);
		});
	}
	
	$('.submenu a').click(function() {
		var rel = $(this).attr('rel');
		if( rel == 'all' ) {
			$('.item a').attr('rel','gallery_group');
		} else {
			$('.item a').each(function() {
				if( $(this).parent().parent().hasClass(rel) ) {
					$(this).attr('rel','gallery_group');
				} else {
					$(this).attr('rel','');
				}
			});
		}
	});
	
	
	
/***** FANCYBOX  *****/  

	function formatTitle(title, currentArray, currentIndex, currentOpts) {
		
		if( ( title && title.length ) || $('.' +ul_class).length  ) {
			var output = '<div id="fancybox-title-over">' + (title && title.length ? title : '' );
			var offset = $(this).attr('href').indexOf('uploads') + 7;
			var ul_class = (($(this).attr('href').substr(offset))).replace(/http:\/\//g,'').replace(/\//g,'').replace(/\./g,'').replace(/ /gi,'').replace(/\(/g,'').replace(/\)/g,'');
			if( $('.' +ul_class).length ) {
				output += '<ul class="gallery-share">' + $('.' + ul_class).html() + '</ul>';
			}
			output += '</div>';
		} else {
			var output = '';
		}
		return output;
	}
	
	$("a[rel=gallery_group]").fancybox({
		'transitionIn'  : 'fade',
		'transitionOut' : 'elastic',
		'titlePosition' : 'over',
		'titleFormat'   : formatTitle,
		onComplete: function() {
			if( ipro ) {
				$("#fancybox-img").bind("contextmenu",function(e){
					return false;
				});
				$("#fancybox-img").bind("mousedown",function(e){
					return false;
				});
			}
		}
	});
			
	$("a.fancybox").fancybox({
		'transitionIn'	: 'fade',
		'transitionOut'	: 'elastic',
		'titlePosition'	: 'over',
		'titleFormat'   : formatTitle,
		onComplete: function() {
			if( ipro ) {
				$("#fancybox-img").bind("contextmenu",function(e){
					return false;
				});
				$("#fancybox-img").bind("mousedown",function(e){
					return false;
				});
			}
		}
	});

	var $mosaic_block = $(".mosaic-block");
	if( ($mosaic_block).length ) {
		$mosaic_block.each(function( num ) {
			alert($(this).find('img').css('width'));
			$(this).css('width',$(this).find('img').innerWidth());
			$(this).css('height',$(this).find('img').innerHeight());
		});
	}			



/***** IMAGE PROTECTION  *****/  


	
	if( ipro ) {
        $('img').bind("contextmenu",function(e){
            return false;
        });
 
        $('img').bind("mousedown",function(e){
            return false;
        });
	}
	
		
	
	/***** VIDEO BACKGROUND  *****/  
	
	
	
	$("#video_play #play_icon").addClass("play_on");
	if( imgpattern == true ) {
		$("#img-pattern").css("visibility","visible");
	}
	if( $("#example_video").length ) {
		if( videopattern == true ) {
			$("#video-pattern").css("visibility","visible");
		}
		var myPlayer;
		var play = true;
		var contrl = false;
		if(deviceAgent.match(/(ipad)/)) {
			contrl=true;
		}
		if( ! ( deviceAgent.match(/(iphone|ipod|android|blackberry|webos|windows phone)/) && bigg_video ) ) {
			_V_("example_video", { "controls": contrl}).ready(function(){
				myPlayer = this;
				var player_width= myPlayer.width()
				var player_height = myPlayer.height();
				var pw; 
				var ph;
				if( player_width/player_height >= w_width/w_height ) {
					myPlayer.size(player_width*w_height/player_height,w_height);
					pw=player_width*w_height/player_height;
					ph=w_height;
				} else {
					myPlayer.size(w_width,player_height*w_width/player_width);
					pw=w_width;
					ph=player_height*w_width/player_width;
				}	
				$("#example_video").css('margin-left',(w_width - pw)/2+'px');
				$("#example_video").css('margin-top', (w_height - ph)/2 +'px');
				$('video').css('visibility', 'visible');
				myPlayer.play();
				if( $("#sound_icon").hasClass("sound_off") )  {
					myPlayer.volume(0);  
				}	
			});

			$video_sound.click(function() {
				if( $("#sound_icon").hasClass("sound_on") ) {
					myPlayer.volume(0);
					$("#sound_icon").removeClass("sound_on");
					$("#sound_icon").addClass("sound_off");
				} else {
					myPlayer.volume(1);
					$("#sound_icon").removeClass("sound_off");
					$("#sound_icon").addClass("sound_on");		
				}
			});
		
			$video_play.click(function() {
				if( $("#play_icon").hasClass("play_on") ) {
					myPlayer.pause();
					play=false;
					$("#play_icon").removeClass("play_on");
					$("#play_icon").addClass("play_off");
				} else {
					myPlayer.play();
					play=true;
					$("#play_icon").removeClass("play_off");
					$("#play_icon").addClass("play_on");		
				}
			});
			if( $('#video_desc').html() ) {
				$video_desc_info.css('visibility','visible');
			}
			$video_desc_info.click(function (e) {
				if($('#video_desc').html()) {
					$('#video_desc').modal({
						close: true,
						opacity: 0,
						overlayClose: true,
						onShow: function() {
							var $simplemodal_container=$('#simplemodal-container');
							$simplemodal_container.css('height', 'auto');
							$simplemodal_container.css('top', ((w_height -$simplemodal_container.innerHeight())/2)+'px');
							$("#modal_shadow").css('top',(w_height -$simplemodal_container.innerHeight())/2 + $simplemodal_container.innerHeight() - 1 +'px');
							$("#modal_shadow").css('left',$simplemodal_container.css('left'));
							$("#modal_shadow").css('margin-left',$simplemodal_container.css('margin-left'));
							$("#modal_shadow").css('display','block');
						},
						onClose: function() {
							$("#modal_shadow").css('display','none');
							$.modal.close();
						} 
					});
					return false;
				}
			});
		} else {
			$("#example_video").css('display','none');
			if($("#background").length) {
				$("#background").removeClass("hidden");
			}
		}
	}
	
	
	
/***** TINYNAV   *****/  	
	
	
	
	$(function () {
		$("#menu > .sf-menu").tinyNav({
			active: 'selected', // String: Set the "active" class
			header: '--- MENU ---', // String: Specify text for "header" and show header instead of the active item
			label: '' // String: Sets the <label> text for the <select> (if not set, no label will be added)
		});
	});
	
	
	
	/***** LAZY LOAD   *****/ 

	
	
	$("#gallery img").lazyload({ 
		skip_invisible : false,
		failure_limit : 10,
		container: $("#gallery")
	});
	
	$("img.lazyload").lazyload();
	
	
	
/***** RESIZEING   *****/  
	
	
	
	$(window).on("debouncedresize", function( event ) {	
	
		$('html').BGresponsive_gallery();
		$('html').BGresponsive_menu();
		w_width = $(window).width();
		w_height = $(window).height();
		
		
		//POSITIONING MAIN GALLERY ITEMS
		
		var obj = $("#gallery img");
		var l = obj.length;
		var $slider_wrapper = $('#slider div.caroufredsel_wrapper');
	
		// slide width
		var slide = $(obj.get(2)).innerWidth();
		var slide2 = $(obj.get(1)).innerWidth();
		var slide3 = $(obj.get(0)).innerWidth()
		
		// negative margin to apply
		var margin = ( ( w_width - slide ) / 2 ) - slide3 - slide2;
		var margin_top = ( ( w_height - $(obj.get(2)).innerHeight() ) / 2 );
		
		// apply negative margin
		$slider_wrapper.css({'overflow':'hidden'});
		$slider_wrapper.css({'margin-left':margin+'px'});
		$slider_wrapper.css({'height':w_height - margin_top+'px'});
		$gallery.css("height",w_height - margin_top + "px");
		$slider_wrapper.css({'margin-top':margin_top+'px'});
		$(obj.get(2)).fadeTo('fast',1);
		
		if($('#slider').length) cfs.configuration("height", w_height);
		$('#slider div.caroufredsel_wrapper').css("height",w_height - margin_top +'px');
		$('#slider').css('width',w_width);
		$('#slider').css('height',w_height);
		$gallery.css("height",w_height - margin_top + "px");		
		$('html').css('width',w_width);
		$('html').css('height',w_height);
		$('body').css('width',w_width);
		$('body').css('height',w_height);
		
		$('.simplemodal-wrap').css('max-height', w_height*0.8 + 'px');
	
		
		if( w_width <= 480 ) {
			var vis = 3; 
			var wid = 192;	
			if($thumbnails.length) {
				cfs2.configuration("items.width", 54);
				cfs2.configuration("items.height", "auto");
				cfs2.configuration("width", wid);
				cfs2.configuration("visible", vis);
			}

			$mini_cont.css("width","350px");
			$thumbnails.css("width","206px");
			$("#thumbnails_cont").css("width","207px");
			$("#bottom-line").css("width","350px");

			if( $page.length ) {
				$('.scroll-pane','#page').css('height',w_height-$('.big_header','#page').outerHeight()-$('.submenu','#page').outerHeight()-$page.css('margin-top').replace('px', '') -$('#page_top').	outerHeight() - $menu.outerHeight()+'px');
				api.reinitialise();
				window.setTimeout(function() {
					api.reinitialise();
					$shadow_reverse.css("top", $page_block.innerHeight() -$shadow_reverse.innerHeight()+ 'px'); 
				},1000);
			} //end if
		}
		
		if( w_width > 480 && w_width < 760 ) {
			var vis = 3; 
			var wid = 192;	
			if($thumbnails.length) {
				cfs2.configuration("items.width", 54);
				cfs2.configuration("items.height", "auto");
				cfs2.configuration("width", wid);
				cfs2.configuration("visible", vis);
			}
			
			$mini_cont.css("width","350px");
			$thumbnails.css("width","206px");
			$("#thumbnails_cont").css("width","207px");
			$("#bottom-line").css("width","350px");
		
			if( $page.length ) {
				$('.scroll-pane','#page').css('height',w_height-$('.big_header','#page').outerHeight()-$('.submenu','#page').outerHeight()-$page.css('margin-top').replace('px', '') -$('#page_top').outerHeight() - $menu.outerHeight()+'px');
				api.reinitialise();
				window.setTimeout(function() {
					api.reinitialise();
					$shadow_reverse.css("top", $page_block.innerHeight() -$shadow_reverse.innerHeight()+ 'px'); 
				},1000);
			} //end if
		}
		
		if( w_width >= 760 & w_width < 980 ) {
			var vis = 3; 
			var wid = 342;	
			if($thumbnails.length) 	{
				cfs2.configuration("width", wid);
				cfs2.configuration("visible", vis);
			}
			$mini_cont.css("width","520px");
			$thumbnails.css("width","446px");
			$("#thumbnails_cont").css("width","347px");
			$("#bottom-line").css("width","520px");
		
			if( $page.length ) {
				$('.scroll-pane','#page').css('height',w_height-$('.big_header','#page').outerHeight()-$('.submenu','#page').outerHeight()-$page.css('margin-top').replace('px', '') -$('#page_top').outerHeight() +'px');
				api.reinitialise();
				window.setTimeout(function() {
					api.reinitialise();
					$shadow_reverse.css("top", $page_block.innerHeight() -$shadow_reverse.innerHeight()+ 'px'); 
				},1000);
			} 
		}
		
		else if( w_width >= 980 ) { 
			$mini_cont.css("width","960px");
			$thumbnails.css("width","798px");
			$("#thumbnails_cont").css("width","800px");
			$("#bottom-line").css("width","960px");
			var vis = 7; 
			var wid = 960;
			if($thumbnails.length) {
				cfs2.configuration("width", wid);
				cfs2.configuration("visible", vis);
			}
		
			if( $page.length ) {
				$('.scroll-pane','#page').css('height',w_height-$('.big_header','#page').outerHeight()-$('.submenu','#page').outerHeight()-$page.css('margin-top').replace('px', '') -$('#page_top').outerHeight() +'px');
				api.reinitialise();
				window.setTimeout(function() {
					api.reinitialise();
					$shadow_reverse.css("top", $page_block.innerHeight() -$shadow_reverse.innerHeight()+ 'px'); 
				},1000);
			}
		}
		var $page_item = $('#page').find('.item');
		var max_w = 0;
		var max_h = 0;
		$page_item.each(
			function(index) {
				var $this_img = $(this).find('img');
				if($this_img.innerHeight()>max_h) {max_h=$this_img.innerHeight();}
				if($this_img.innerWidth()>max_w) {max_w=$this_img.innerWidth();}
				$(this).css({'height':$this_img.innerHeight() + 'px','width':$this_img.innerWidth() + 'px'});
				var $loupe = $(this).find(".loupe");
				$loupe.css("top",$(this).innerHeight()/2-$loupe.innerHeight()/2 + "px").css('left',$(this).innerWidth()/2-$loupe.innerWidth()/2 + "px");
				$(this).find(".shadow").css({"width":$(this).innerWidth(),"top":$(this).innerHeight() + 1 +'px'});
			});
		if( typeof myPlayer != 'undefined' ) {
			var player_width = myPlayer.width();
			var player_height = myPlayer.height();
			var pw; 
			var ph;
			if( player_width/player_height >= w_width/w_height ) {
				myPlayer.size(player_width*w_height/player_height,w_height);
				pw = player_width*w_height/player_height;
				ph = w_height;
			} else {
				myPlayer.size(w_width,player_height*w_width/player_width);
				pw = w_width;
				ph = player_height*w_width/player_width;
			}	
			$("#example_video").css('margin-left',(w_width - pw)/2+'px');
			$("#example_video").css('margin-top', (w_height - ph)/2 +'px');
		}
		if( typeof $simplemodal_container != 'undefined' ) {
			$("#modal_shadow").css('top',(w_height -$simplemodal_container.innerHeight())/2 + $simplemodal_container.innerHeight() - 1 +'px');
			$("#modal_shadow").css('left',$simplemodal_container.css('left'));
			$("#modal_shadow").css('margin-left',$simplemodal_container.css('margin-left'));
		}

		$gallery_hide.css({bottom:-w_height- $gallery_hide.innerHeight() + 'px'});
		$mini_cont.css("left",(w_width - $mini_cont.innerWidth())/2 + "px");
		$mini_prev.css("bottom",($mini_cont.innerHeight() - $mini_prev.innerHeight() )/2 + $("#bottom-line").innerHeight()/2);
		$mini_next.css("bottom",($mini_cont.innerHeight() - $mini_prev.innerHeight() )/2 + $("#bottom-line").innerHeight()/2);
		$mini_cont.css({bottom:-w_height- $mini_cont.innerHeight()-$gallery_hide.innerHeight() + 'px'});

		if( $page.length ) {
			$('.submenu').children(".shadow").css("width",$('.submenu').innerWidth());
			$('.submenu').children(".shadow").css("top",$('div.big_header').innerHeight() + $('.submenu').innerHeight()  +'px');
			$shadow_reverse.css("width",$('.page-footer').innerWidth());
			$shadow_reverse.css("top", $page_block.innerHeight() -$shadow_reverse.innerHeight()+ 'px');

			api.reinitialise();
		
			$('input:not([type=submit]):not([type=button]):not([type=checkbox])').each(
				function(index) {
					var position = $(this).position();
					$(this).next(".shadow").css("width",$(this).innerWidth());
					$(this).next(".shadow").css("top",position.top + $(this).innerHeight() -7);
					$(this).next(".shadow").css("left",position.left);
				}
			);

			$('textarea').each(
				function(index) {
					var position = $(this).position();
					$(this).next(".shadow").css("width",$(this).innerWidth());
					$(this).next(".shadow").css("top",position.top + $(this).innerHeight() -7);
					$(this).next(".shadow").css("left",position.left);
				}
			);
		}
		var img_prop = $background_img.width()/$background_img.height();
		var browser_prop = w_width/w_height;
		if( img_prop < browser_prop ) {
			$background_img.css("width",w_width + "px");
			$background_img.css("margin-top",-($background_img.height() - w_height)/2 + "px");
			$background_img.css("margin-left","0px");
		} else {
			$background_img.css("height",w_height + "px");
			$background_img.css("margin-left",-($background_img.width() - w_width)/2 + "px");
			$background_img.css("margin-top","0px");
		}
		if( thumb_shown == true ) {
			$gallery_hide.trigger('click');
		}
	});
	
		

/***** END OF RESIZEING   *****/ 


		
	if($page.length) {
		window.setTimeout(function() {$(window).trigger("debouncedresize");},1500);
	}
		
	$('.jspPane').css('left','0px');

});

})(jQuery);



(function( $ ){
	$.fn.BGresponsive_gallery = function() {
		w_width = $(window).width();
		w_height = $(window).height();
		if( slideSize == 'width' ) {  
			$gallery_img.each(function() {
				var gallery_w = $(this).innerWidth();
				var gallery_h = $(this).innerHeight();
				$(this).css("width",w_width + "px"); 
				$(this).css("height",gallery_h*w_width/gallery_w +"px");
			});
		} else if( slideSize == 'height' ) {	
			$gallery_img.each(function() {
				var gallery_w = $(this).innerWidth();
				var gallery_h = $(this).innerHeight();
				$(this).css("height",w_height + "px"); 
				$(this).css("width",gallery_w*w_height/gallery_h +"px");
			});
		} else if( slideSize == 'fill' ) {
			var browser_prop = w_width/w_height;
			$gallery_img.each(function()  {
				var img_prop =  $(this).innerWidth()/$(this).innerHeight();
				if( img_prop < browser_prop ) {
					$(this).css("width",w_width + "px"); 
					$(this).css("height",w_width/img_prop +"px");
				} else {
					$(this).css("height",w_height + "px"); 
					$(this).css("width",w_height*img_prop +"px");
				}
			});
		} else if( slideSize == 'uncut' ) {
			var browser_prop = w_width/w_height;
			$gallery_img.each(function() {
				var img_prop =  $(this).innerWidth()/$(this).innerHeight();
				if( img_prop > browser_prop ) {
					$(this).css("width",w_width + "px"); 
					$(this).css("height",w_width/img_prop +"px");
				} else {
					$(this).css("height",w_height + "px"); 
					$(this).css("width",w_height*img_prop +"px");
				}
			});
		} else {
			$gallery_img.css("height",(slideSize + "px")); 
		}
	};
})( jQuery );

(function( $ ){
	$.fn.BGresponsive_menu = function() {
		if( w_width <= 480 && !ie8 ) {

			$logo.css("margin-left",0 + "px");
			$logo_sr.css("margin-left",0 + "px");
			$logo_sq.css("margin-left",0 + "px");

			$desc_info.css('left',$logo.innerWidth() +  10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($play.innerWidth() ? (10+$play.innerWidth()) : 0) + ($sound.innerWidth() ? (10+$sound.innerWidth()) : 0)  +'px'); 
			$video_desc_info.css('left',$logo.innerWidth() +  10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($video_play.innerWidth() ? (10+$video_play.innerWidth()) : 0) + ($video_sound.innerWidth() ? (10+$video_sound.innerWidth()) : 0)  +'px'); 
			$fullscreen.css('left', $logo.innerWidth() + 10 +'px');
			$play.css('left',$logo.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10 +'px');
			$sound.css('left',$logo.innerWidth()  + 10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($play.innerWidth() ? (10+$play.innerWidth()) : 0) +'px');
			$video_play.css('left',$logo.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10  +'px');
			$video_sound.css('left',$logo.innerWidth() +  10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($video_play.innerWidth() ? (10+$video_play.innerWidth()) : 0) +'px'); 

			$desc_info.css('left',$logo_sr.innerWidth() +  10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($play.innerWidth() ? (10+$play.innerWidth()) : 0) + ($sound.innerWidth() ? (10+$sound.innerWidth()) : 0)  +'px'); 
			$video_desc_info.css('left',$logo_sr.innerWidth() +  10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($video_play.innerWidth() ? (10+$video_play.innerWidth()) : 0) + ($video_sound.innerWidth() ? (10+$video_sound.innerWidth()) : 0)  +'px'); 
			$fullscreen.css('left', $logo_sr.innerWidth() + 10 +'px');
			$play.css('left',$logo_sr.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10 +'px');
			$sound.css('left',$logo_sr.innerWidth()  + 10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($play.innerWidth() ? (10+$play.innerWidth()) : 0) +'px');
			$video_play.css('left',$logo_sr.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10  +'px');
			$video_sound.css('left',$logo_sr.innerWidth() +  10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($video_play.innerWidth() ? (10+$video_play.innerWidth()) : 0) +'px'); 
	
			$desc_info.css('left',$logo_sq.innerWidth() +  10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($play.innerWidth() ? (10+$play.innerWidth()) : 0) + ($sound.innerWidth() ? (10+$sound.innerWidth()) : 0)  +'px'); 
			$video_desc_info.css('left',$logo_sq.innerWidth() +  10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($video_play.innerWidth() ? (10+$video_play.innerWidth()) : 0) + ($video_sound.innerWidth() ? (10+$video_sound.innerWidth()) : 0)  +'px'); 
			$fullscreen.css('left', $logo_sq.innerWidth() + 10 +'px');
			$play.css('left',$logo_sq.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10 +'px');
			$sound.css('left',$logo_sq.innerWidth()  + 10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($play.innerWidth() ? (10+$play.innerWidth()) : 0) +'px');
			$video_play.css('left',$logo_sq.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10  +'px');
			$video_sound.css('left',$logo_sq.innerWidth() +  10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($video_play.innerWidth() ? (10+$video_play.innerWidth()) : 0) +'px'); 
	

			$logo.css("margin-left",0 + "px");
			$logo_sr.css("margin-left",0 + "px");
			$logo_sq.css("margin-left",0 + "px");

			$menu_show.fadeOut(0);
			$menu_hide.fadeOut(0);
			$left.css("left","-25px");
			$right.css("right","-25px");
			$("#arrow_left").css("left","35px");
			$("#arrow_right").css("left","20px");
			$menu.css("width", w_width - $logo.innerWidth() +"px");
			$menu.css("width", w_width - $logo_sr.innerWidth() +"px");
			$menu.css("width", w_width - $logo_sq.innerWidth() +"px");
			$menu.fadeIn('fast');
			if($page.length)  {
				$page.css("left",(w_width - $page.innerWidth())/2  + "px");
			}
			$gallery_show.css("margin-left",(w_width - $gallery_show.innerWidth())/2 + "px");
			$gallery_hide.css("left",(w_width - $gallery_hide.innerWidth())/2 + "px");
		}
		if( w_width > 480 && w_width < 760  && !ie8 ){
			$logo.css("margin-left",0 + "px");
			$logo_sr.css("margin-left",0 + "px");
			$logo_sq.css("margin-left",0 + "px");

			$desc_info.css('left','auto');
			$desc_info.css('right',10 +'px');
			$video_desc_info.css('left','auto');
			$video_desc_info.css('right',10 +'px');

			$fullscreen.css('left', $logo.innerWidth() + 10 +'px');
			$play.css('left',$logo.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10 +'px');
			$sound.css('left',$logo.innerWidth()  + 10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($play.innerWidth() ? (10+$play.innerWidth()) : 0) +'px');
			$video_play.css('left',$logo.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10  +'px');
			$video_sound.css('left',$logo.innerWidth() +  10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($video_play.innerWidth() ? (10+$video_play.innerWidth()) : 0) +'px'); 
		
			$fullscreen.css('left', $logo_sr.innerWidth() + 10 +'px');
			$play.css('left',$logo_sr.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10 +'px');
			$sound.css('left',$logo_sr.innerWidth()  + 10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($play.innerWidth() ? (10+$play.innerWidth()) : 0) +'px');
			$video_play.css('left',$logo_sr.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10  +'px');
			$video_sound.css('left',$logo_sr.innerWidth() +  10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($video_play.innerWidth() ? (10+$video_play.innerWidth()) : 0) +'px'); 

			$fullscreen.css('left', $logo_sq.innerWidth() + 10 +'px');
			$play.css('left',$logo_sq.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10 +'px');
			$sound.css('left',$logo_sq.innerWidth()  + 10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($play.innerWidth() ? (10+$play.innerWidth()) : 0) +'px');
			$video_play.css('left',$logo_sq.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10  +'px');
			$video_sound.css('left',$logo_sq.innerWidth() +  10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($video_play.innerWidth() ? (10+$video_play.innerWidth()) : 0) +'px'); 

			$menu_show.fadeOut(0);
			$menu_hide.fadeOut(0);
			$left.css("left","-25px");
			$right.css("right","-25px");
			$("#arrow_left").css("left","35px");
			$("#arrow_right").css("left","20px");

			$menu.css("width", w_width - $logo.innerWidth() +"px");	$menu.css("width", w_width - $logo.innerWidth() +"px");
			$menu.css("width", w_width - $logo_sr.innerWidth() +"px");	$menu.css("width", w_width - $logo_sr.innerWidth() +"px");
			$menu.css("width", w_width - $logo_sq.innerWidth() +"px");	$menu.css("width", w_width - $logo_sq.innerWidth() +"px");
			
			$menu.fadeIn('fast');
			if($page.length) {
				$page.css("left",(w_width - $page.innerWidth())/2  + "px");
			}
			$gallery_show.css("margin-left",(w_width - $gallery_show.innerWidth())/2 + "px");
			$gallery_hide.css("left",(w_width - $gallery_hide.innerWidth())/2 + "px");
		}
		if( w_width >=760 && w_width < 980 ) {
			
			$logo.css("margin-left",(w_width- 730)/2 + "px");
			$logo_sr.css("margin-left",(w_width- 730)/2 + "px");
			$logo_sq.css("margin-left",(w_width- 730)/2 + "px");
			
			$menu_show.css("margin-left",(w_width - 730)/2 + "px");
			$menu_hide.css("margin-left",(w_width - 730)/2 + "px");
			$menu.css("margin-left",(w_width - 730)/2 + "px");
			$menu.css("width","207px");
			$desc_info.css('left',(w_width - 730)/2 + 730 - $desc_info.innerWidth() +'px');
			$video_desc_info.css('left',(w_width - 730)/2 + 730 - $video_desc_info.innerWidth() +'px');

			$fullscreen.css('left',(w_width - 730)/2  + $logo.innerWidth() + 10 +'px');
			$play.css('left',(w_width - 730)/2  + $logo.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10 +'px');
			$sound.css('left',(w_width - 730)/2  + $logo.innerWidth()  + 10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($play.innerWidth() ? (10+$play.innerWidth()) : 0) +'px');
			$video_play.css('left',(w_width - 730)/2  + $logo.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10  +'px');
			$video_sound.css('left',(w_width - 730)/2  + $logo.innerWidth() +  10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($video_play.innerWidth() ? (10+$video_play.innerWidth()) : 0) +'px');
			
			$fullscreen.css('left',(w_width - 730)/2  + $logo_sr.innerWidth() + 10 +'px');
			$play.css('left',(w_width - 730)/2  + $logo_sr.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10 +'px');
			$sound.css('left',(w_width - 730)/2  + $logo_sr.innerWidth()  + 10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($play.innerWidth() ? (10+$play.innerWidth()) : 0) +'px');
			$video_play.css('left',(w_width - 730)/2  + $logo_sr.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10  +'px');
			$video_sound.css('left',(w_width - 730)/2  + $logo_sr.innerWidth() +  10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($video_play.innerWidth() ? (10+$video_play.innerWidth()) : 0) +'px');
			
			$fullscreen.css('left',(w_width - 730)/2  + $logo_sq.innerWidth() + 10 +'px');
			$play.css('left',(w_width - 730)/2  + $logo_sq.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10 +'px');
			$sound.css('left',(w_width - 730)/2  + $logo_sq.innerWidth()  + 10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($play.innerWidth() ? (10+$play.innerWidth()) : 0) +'px');
			$video_play.css('left',(w_width - 730)/2  + $logo_sq.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10  +'px');
			$video_sound.css('left',(w_width - 730)/2  + $logo_sq.innerWidth() +  10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($video_play.innerWidth() ? (10+$video_play.innerWidth()) : 0) +'px');

			$menu_hide.css("margin-left",(w_width - 730)/2 + "px")

			$menu_hide.css("top",$logo.innerHeight() + $menu.innerHeight() +"px");
			$menu_hide.css("top",$logo_sr.innerHeight() + $menu.innerHeight() +"px");
			$menu_hide.css("top",$logo_sq.innerHeight() + $menu.innerHeight() +"px");

			$menu_show.fadeTo('fast',1);
			$left.css("left","-25px");
			$right.css("right","-25px");
			$("#arrow_left").css("left","35px");
			$("#arrow_right").css("left","20px");
	
			if( $page.length ) {

				$page.css("left",((w_width - 730)/2 + $logo.innerWidth() + 10)  + "px");
				$page.css("left",((w_width - 730)/2 + $logo_sr.innerWidth() + 10)  + "px");
				$page.css("left",((w_width - 730)/2 + $logo_sq.innerWidth() + 10)  + "px");
			}
			if( menuShown || $page.length ) {
				$menu.fadeTo('fast',1);
				$menu_hide.fadeTo('fast',1);
			} else {
				$menu.fadeOut('fast');
				$menu_hide.fadeOut('fast');
				$menu_show.fadeIn('fast');
			}
			$mini_cont.css("width","520px");
			$gallery_show.css("margin-left",(w_width - $mini_cont.innerWidth())/2 + "px");
			$gallery_hide.css("left",(w_width - $mini_cont.innerWidth())/2 + "px");
		}
		else if( w_width >= 980 && w_width < 1040 ) {

			$logo.css("margin-left",(w_width- 960)/2 + "px");
			$logo_sr.css("margin-left",(w_width- 960)/2 + "px");
			$logo_sq.css("margin-left",(w_width- 960)/2 + "px");

			$menu_show.css("margin-left",(w_width - 960)/2 + "px")
			$menu.css("margin-left",(w_width - 960)/2 + "px")
			$menu.css("width","207px");
			$desc_info.css('left',(w_width - 960)/2 + 960 - $desc_info.innerWidth() +'px');
			$video_desc_info.css('left',(w_width - 960)/2 + 960 - $video_desc_info.innerWidth() +'px');

			$fullscreen.css('left',(w_width - 960)/2  + $logo.innerWidth() + 10 +'px');
			$play.css('left',(w_width - 960)/2  + $logo.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10 +'px');
			$sound.css('left',(w_width - 960)/2  + $logo.innerWidth()  + 10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($play.innerWidth() ? (10+$play.innerWidth()) : 0) +'px');
			$video_play.css('left',(w_width - 960)/2  + $logo.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10  +'px');
			$video_sound.css('left',(w_width - 960)/2  + $logo.innerWidth() +  10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($video_play.innerWidth() ? (10+$video_play.innerWidth()) : 0) +'px');
			
			$fullscreen.css('left',(w_width - 960)/2  + $logo_sr.innerWidth() + 10 +'px');
			$play.css('left',(w_width - 960)/2  + $logo_sr.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10 +'px');
			$sound.css('left',(w_width - 960)/2  + $logo_sr.innerWidth()  + 10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($play.innerWidth() ? (10+$play.innerWidth()) : 0) +'px');
			$video_play.css('left',(w_width - 960)/2  + $logo_sr.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10  +'px');
			$video_sound.css('left',(w_width - 960)/2  + $logo_sr.innerWidth() +  10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($video_play.innerWidth() ? (10+$video_play.innerWidth()) : 0) +'px');
			
			$fullscreen.css('left',(w_width - 960)/2  + $logo_sq.innerWidth() + 10 +'px');
			$play.css('left',(w_width - 960)/2  + $logo_sq.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10 +'px');
			$sound.css('left',(w_width - 960)/2  + $logo_sq.innerWidth()  + 10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($play.innerWidth() ? (10+$play.innerWidth()) : 0) +'px');
			$video_play.css('left',(w_width - 960)/2  + $logo_sq.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 10  +'px');
			$video_sound.css('left',(w_width - 960)/2  + $logo_sq.innerWidth() +  10 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($video_play.innerWidth() ? (10+$video_play.innerWidth()) : 0) +'px');

			$menu_hide.css("margin-left",(w_width - 960)/2 + "px")
			$menu_hide.css("top",$logo.innerHeight() + $menu.innerHeight() +"px");
			$menu_show.fadeTo('fast',1);
			$left.css("left",0);
			$right.css("right",0);
			$("#arrow_left").css("left","20px");
			$("#arrow_right").css("left","35px");
	
			if( $page.length ) {
				$page.css("left",((w_width - 960)/2 + $logo.innerWidth() + 10)  + "px");
				$page.css("left",((w_width - 960)/2 + $logo_sr.innerWidth() + 10)  + "px");
				$page.css("left",((w_width - 960)/2 + $logo_sq.innerWidth() + 10)  + "px");
			} //end if
			if( menuShown || $page.length ) {
				$menu.fadeTo('fast',1);
				$menu_hide.fadeTo('fast',1);
			} else {
				$menu.fadeOut('fast');
				$menu_hide.fadeOut('fast');
				$menu_show.fadeIn('fast');
			}
			$mini_cont.css("width","960px");
			$gallery_show.css("margin-left",(w_width - $mini_cont.innerWidth())/2 + "px");
			$gallery_hide.css("left",(w_width - $mini_cont.innerWidth())/2 + "px");
		}
	
		else if( w_width >= 1040 ) { 		
			$logo.css("margin-left",(w_width- 960)/2 + "px");
			$logo_sr.css("margin-left",(w_width- 960)/2 + "px");

			$menu_show.css("margin-left",(w_width - 960)/2 + "px")
			$menu.css("margin-left",(w_width - 960)/2 + "px")
			$menu.css("width","207px");
			$desc_info.css('left',(w_width - 960)/2 + 960 - $desc_info.innerWidth() +'px');
			$video_desc_info.css('left',(w_width - 960)/2 + 960 - $video_desc_info.innerWidth() +'px');

			$fullscreen.css('left',(w_width - 960)/2  + $logo.innerWidth() + 30 +'px');
			$play.css('left',(w_width - 960)/2  + $logo.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 30 +'px');
			$sound.css('left',(w_width - 960)/2  + $logo.innerWidth()  + 30 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($play.innerWidth() ? (10+$play.innerWidth()) : 0) +'px');
			$video_play.css('left',(w_width - 960)/2  + $logo.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 30  +'px');
			$video_sound.css('left',(w_width - 960)/2  + $logo.innerWidth() +  30 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($video_play.innerWidth() ? (10+$video_play.innerWidth()) : 0) +'px');
			
			$fullscreen.css('left',(w_width - 960)/2  + $logo_sr.innerWidth() + 30 +'px');
			$play.css('left',(w_width - 960)/2  + $logo_sr.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 30 +'px');
			$sound.css('left',(w_width - 960)/2  + $logo_sr.innerWidth()  + 30 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($play.innerWidth() ? (10+$play.innerWidth()) : 0) +'px');
			$video_play.css('left',(w_width - 960)/2  + $logo_sr.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 30  +'px');
			$video_sound.css('left',(w_width - 960)/2  + $logo_sr.innerWidth() +  30 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($video_play.innerWidth() ? (10+$video_play.innerWidth()) : 0) +'px');
			
			$fullscreen.css('left',(w_width - 960)/2  + $logo_sq.innerWidth() + 30 +'px');
			$play.css('left',(w_width - 960)/2  + $logo_sq.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 30 +'px');
			$sound.css('left',(w_width - 960)/2  + $logo_sq.innerWidth()  + 30 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($play.innerWidth() ? (10+$play.innerWidth()) : 0) +'px');
			$video_play.css('left',(w_width - 960)/2  + $logo_sq.innerWidth() + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0) + 30  +'px');
			$video_sound.css('left',(w_width - 960)/2  + $logo_sq.innerWidth() +  30 + ($fullscreen.innerWidth() ? (10 + $fullscreen.innerWidth()): 0)  + ($video_play.innerWidth() ? (10+$video_play.innerWidth()) : 0) +'px');

			$menu_hide.css("margin-left",(w_width - 960)/2 + "px")

			$menu_hide.css("top",$logo.innerHeight() + $menu.innerHeight() +"px");
			$menu_hide.css("top",$logo_sr.innerHeight() + $menu.innerHeight() +"px");
			$menu_hide.css("top",$logo_sq.innerHeight() + $menu.innerHeight() +"px");

			$menu_show.fadeTo('fast',1);
			$left.css("left",0);
			$right.css("right",0);
			$("#arrow_left").css("left","20px");
			$("#arrow_right").css("left","35px");
	
			if($page.length) {
				$page.css("left",((w_width - 960)/2 + $logo.innerWidth() + 30)  + "px");
				$page.css("left",((w_width - 960)/2 + $logo_sr.innerWidth() + 30)  + "px");
				$page.css("left",((w_width - 960)/2 + $logo_sq.innerWidth() + 30)  + "px");
			} //end if
			if( menuShown || $page.length ) {
				$menu.fadeTo('fast',1);
				$menu_hide.fadeTo('fast',1);
			} else {
				$menu.fadeOut('fast');
				$menu_hide.fadeOut('fast');
				$menu_show.fadeIn('fast');
			}
			$mini_cont.css("width","960px");
			$gallery_show.css("margin-left",(w_width - $mini_cont.innerWidth())/2 + "px");
			$gallery_hide.css("left",(w_width - $mini_cont.innerWidth())/2 + "px");
		}
		$logo.fadeTo('fast',1);
		$logo_sr.fadeTo('fast',1);
		$logo_sq.fadeTo('fast',1);

		$left.css("top",(w_height - $left.innerHeight() )/2);
		$right.css("top",(w_height - $right.innerHeight() )/2);
	};
})( jQuery );

