function init() {
	tinyMCEPopup.resizeToInnerSize();
}

function getCheckedValue(radioObj) {
	if(!radioObj)
		return "";
	var radioLength = radioObj.length;
	if(radioLength == undefined)
		if(radioObj.checked)
			return radioObj.value;
		else
			return "";
	for(var i = 0; i < radioLength; i++) {
		if(radioObj[i].checked) {
			return radioObj[i].value;
		}
	}
	return "";
}

function insertGshbCode() {

	ed = tinyMCEPopup.editor
	var tagtext;
	var langname_ddb = document.getElementById('gshb_lang');
	var langname = langname_ddb.value;
	var linenumber = document.getElementById('gshb_linenumber').value;
	var nogutter = document.getElementById('gshb_nogutter').checked;
	var nocontrols = document.getElementById('gshb_nocontrols').checked;
	var collapse = document.getElementById('gshb_collapse').checked;
	var showcolumns = document.getElementById('gshb_showcolumns').checked;
	var inst = tinyMCE.getInstanceById('content');
	var html = inst.selection.getContent();
	html = html.replace(/<p>/g,"").replace(/<\/p>/g,"<br \/>"); //pタグをbrタグに変換
	if(!html){
		html = "<br />";
	}
	tagtext = '<pre name="code" class="';
	classAttribs = langname;
	if (linenumber) {
		classAttribs = classAttribs + ':firstline[' + linenumber + ']';
	}
	if (nogutter) {
		classAttribs = classAttribs + ':nogutter';
	}
	if (nocontrols) {
		classAttribs = classAttribs + ':nocontrols';
	}
	if (collapse) {
		classAttribs = classAttribs + ':collapse';
	}
	if (showcolumns) {
		classAttribs = classAttribs + ':showcolumns';
	}

	if(linenumber.match(/[^0-9]+/)){
			alert("please input the half-size number to the 'Line Number' column");
			return;
	} else if(e = ed.dom.getParent(ed.selection.getNode(), 'pre')){
		ed.dom.setAttribs(e, {
			name : "code",
			class : classAttribs
		});
	} else {
		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext+classAttribs+'">'+html+'</pre>');
		tinyMCEPopup.editor.execCommand('mceRepaint');
	}
	tinyMCEPopup.close();
	return;
}
