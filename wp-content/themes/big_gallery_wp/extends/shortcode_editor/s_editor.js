(function() {
	tinymce.create('tinymce.plugins.shortcode_editor', {
		init : function(ed, url) {

			ed.addCommand('mceshortcode_editor', function() {
				ed.windowManager.open({
					file : url + '/shortcode_form.php',
					width : 290 + ed.getLang('shortcode_editor.delta_width', 0),
					height : 150 + ed.getLang('shortcode_editor.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url
				});
			});

			
			ed.addButton('shortcode_editor', {
				title : 'Click to add a shortcode',
				cmd : 'mceshortcode_editor',
				image : url + '/shortcode_icon.png'
			});

			
			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('shortcode_editor', n.nodeName == 'IMG');
			});
		},
		
		createControl : function(n, cm) {
			return null;
		},
		getInfo : function() {
			return {
					longname  : 'shortcode_editor',
					author 	  : 'johnnychaos',
					authorurl : '',
					infourl   : '',
					version   : "1.0"
			};
		}
	});
	tinymce.PluginManager.add('shortcode_editor', tinymce.plugins.shortcode_editor);
})();


