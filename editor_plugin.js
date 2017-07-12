// Docu : http://wiki.moxiecode.com/index.php/TinyMCE:Create_plugin/3.x#Creating_your_own_plugins

(function() {
	// Load plugin specific language pack
	tinymce.PluginManager.requireLangPack('gshb');
	 
	tinymce.create('tinymce.plugins.gshb', {
		
		init : function(ed, url) {
		// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceExample');

			ed.addCommand('gshb', function() {
				var se = ed.selection;
				ed.windowManager.open({
					file : url + '/window.php',
					width : 360,
					height : 220,
					inline : 1
				}, {
					plugin_url : url // Plugin absolute URL
				});

			});

			// Register example button
			ed.addButton('gshb', {
				title : 'Google Syntax Highlighter button',
				cmd : 'gshb',
				image : url + '/gsh_img.png'
			});
			
			// Add a node change handler, selects the button in the UI when a image is selected
			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('gshb', n.nodeName == 'pre');
			});
		},

		createControl : function(n, cm) {
			return null;
		},
		getInfo : function() {
			return {
					longname  : 'gshb',
					author 	  : 'Kazuki Shibata',
					authorurl : 'http://revolve.mods.jp/blog/',
					infourl   : 'http://revolve.mods.jp/blog/archives/221',
					version   : "0.1 beta"
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('gshb', tinymce.plugins.gshb);
})();


