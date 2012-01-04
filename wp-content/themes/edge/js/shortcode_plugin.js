/* Adapted from http://brettterpstra.com/adding-a-tinymce-button/ */

(function() {
	tinymce.create('tinymce.plugins.UniSphereShortcode', {
		init : function(ed, url) {
			ed.addButton('unisphereshortcode', {
				title : 'Theme Shortcodes',
				image : url+'/shortcode.png',
				onclick : function() {
					ed.windowManager.open({
						file : url + '/shortcode_tinymce_window.php',
						width : 320,
						height : 240,
						inline : 1
					});
				}

			});
		},
		createControl : function(n, cm) {
			return null;
		},
		getInfo : function() {
			return {
				longname : "Shortcodes",
				author : 'UniSphere',
				version : "1.0"
			};
		}
	});
	tinymce.PluginManager.add('unisphereshortcode', tinymce.plugins.UniSphereShortcode);
})();