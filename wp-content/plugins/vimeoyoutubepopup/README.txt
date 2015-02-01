Wordpress Youtube or Vimeo Video Popup Plugin
========================

Description
-----------
This plugin takes a link and triggers an vimeo or youtube video popup. It allows for you to pass in the video id or video player, and a few options for width, height, and autoplay. Simply pass in your element and everything else is taken care of.

Wordpress Settings
------------------

From the Vimeo Youtube Popup Plugin admin panel, you can choose the border color for your video.

Usage
-----
This plugin has a shortcode that generates your video popup and its clickable element. See example of shortcodes.

For a text clickable element use:
[vimeoyoutubepopup_video displaytype="text" text="Activate Me" videoplayer="vimeo" videoid="21504557" width="900" height="510" autoplay="true"]

For an image clickable element use:
[vimeoyoutubepopup_video displaytype="image" path="/path/to/image.jpg" videoplayer="vimeo" videoid="21504557" width="900" height="510" autoplay="true"]

Settings
---------
***** videoid
This option allows you to set the videoid that will be used in the videopopup. There is no default for this  since this is a ** Mandatory ** setting.  

- usage -

	[vimeoyoutubepopup_video displaytype="image" text="Activate Me" videoplayer="youtube" videoid="ZAX550biM7c" width="900" height="510" autoplay="true"]

This sets the videoid for the popup to "ZAX550biM7c".

***** videoplayer
This option allows you to set the type of video. The default is set to youtube. The video player must match the video id. This means, you cant use a youtube id with a vimeo player.

- usage -
	[vimeoyoutubepopup_video videoplayer="vimeo"]
	

***** displaytype
This option allows you to set the type of clickable element. You can set it to "image" or "text".

- usage -
	[vimeoyoutubepopup_video displaytype="image"]
	
***** path or text
	Depending on if your displaytype is set to"image" or "text" you will have to specify what either a path for an "image", or text for "text".

- usage -
	[vimeoyoutubepopup_video displaytype="image" path="Activate Me"]
	
***** width
	Set the width of your video.

- usage -
	[vimeoyoutubepopup_video width="900"]
	
***** height
	Set the height of your video.

- usage -
	[vimeoyoutubepopup_video height="510"]
	
***** autoplay
	Set your video to play on load or not. By default, autoplay is on.

- usage -
	[vimeoyoutubepopup_video autoplay="true"]


Version history
---------------

Version 1.0 
+++++++++++
Initial release 


Contact Information
-------------------------------
Author: Nick Rivers
URL: http://nrivers.com
