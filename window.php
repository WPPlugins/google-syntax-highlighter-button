<?php
$wpconfig = realpath("../../../wp-config.php");
if (!file_exists($wpconfig))  {
	echo "Could not found wp-config.php. Error in path :\n\n".$wpconfig ;	
	die;	
}
require_once($wpconfig);
require_once(ABSPATH.'/wp-admin/admin.php');
global $gshb;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>WP-Google Syntax Highlighter</title>
<!-- 	<meta http-equiv="Content-Type" content="<?php// bloginfo('html_type'); ?>; charset=<?php //echo get_option('blog_charset'); ?>" /> -->
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-content/plugins/wp-gsh-button/tinymce.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-content/plugins/wp-gsh-button/gsh.js"></script>
	<base target="_self" />
</head>
		<body id="link" onload="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';" style="display: none">
<!-- <form onsubmit="insertLink();return false;" action="#"> -->
	<form name="gshb" action="#">
		<table border="0" cellpadding="4" cellspacing="0">
         <tr>
			<td nowrap="nowrap"><label for="gshb_lang"><?php _e("Select Language", 'gshb_main'); ?></label></td>
			<td><select id="gshb_lang" name="gshb_lang" style="width: 200px">
			<option value="c">C++</option><option value="csharp">C#</option>
			<option value="css">CSS</option><option value="delphi">Delphi</option>
			<option value="java">Java</option><option value="js">JavaScript</option>
			<option value="php">PHP</option><option value="py">Python</option>
			<option value="ruby">Ruby</option><option value="sql">SQL</option>
			<option value="vb">Visual Basic</option><option value="xml">XML</option>
            </select></td>
          </tr>
          <tr>
			<td nowrap="nowrap" valign="top"><label for="gshb_linenumber"><?php _e("Line Number", 'gshb_main'); ?></label></td>
            <td><input type="text" name="gshb_linenumber" id="gshb_linenumber" size="3" value="1"/></td>
          </tr>
          <tr>
			<td nowrap="nowrap"><label for="gshb_nogutter"><?php _e("No Gutter", 'gshb_main'); ?></label></td>
            <td><input type="checkbox" name="gshb_nogutter" id="gshb_nogutter" /></td>
          </tr>
          <tr>
			<td nowrap="nowrap"><label for="gshb_nocontrols"><?php _e("No Controls", 'gshb_main'); ?></label></td>
            <td><input type="checkbox" name="gshb_nocontrols" id="gshb_nocontrols" /></td>
          </tr>
          <tr>
			<td nowrap="nowrap"><label for="gshb_collapse"><?php _e("Collapse", 'gshb_main'); ?></label></td>
            <td><input type="checkbox" name="gshb_collapse" id="gshb_collapse" /></td>
          </tr>
          <tr>
			<td nowrap="nowrap"><label for="gshb_showcolumns"><?php _e("Show Columns", 'gshb_main'); ?></label></td>
            <td><input type="checkbox" name="gshb_showcolumns" id="gshb_showcolumns" /></td>
          </tr>
        </table>
	<div class="mceActionPanel">
		<div style="float: left">
			    <input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", 'gshb_main'); ?>" onclick="tinyMCEPopup.close();" />
		</div>

		<div style="float: right">
				<input type="submit" id="insert" name="insert" value="<?php _e("Insert", 'gshb_main'); ?>" onclick="insertGshbCode();" />
		</div>
	</div>
</form>
</body>
</html>