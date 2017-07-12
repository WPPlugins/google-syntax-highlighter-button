tinyMCEPopup.requireLangPack();

var GshDialog = {

	init : function() {
		var f = document.forms[0], ed = tinyMCEPopup.editor;

		if (e = ed.dom.getParent(ed.selection.getNode(), 'pre')) {
			str = ed.dom.getAttrib(e, 'class').split(":");
			f.gshb_lang.value = str[0];
			if(str[1]){
				f.gshb_linenumber.value = str[1].replace("firstline[", "").replace("]","");
			}
			if(ed.dom.getAttrib(e, 'class').match(/nogutter/)){
				f.gshb_nogutter.checked = true;
			}
			if(ed.dom.getAttrib(e, 'class').match(/nocontrols/)){
				f.gshb_nocontrols.checked = true;
			}
			if(ed.dom.getAttrib(e, 'class').match(/collapse/)){
				f.gshb_collapse.checked = true;
			}
			if(ed.dom.getAttrib(e, 'class').match(/showcolumns/)){
				f.gshb_showcolumns.checked = true;
			}
			f.insert.value="Update";
		}
	},
};

tinyMCEPopup.onInit.add(GshDialog.init, GshDialog);
