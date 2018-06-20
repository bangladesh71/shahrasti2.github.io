
<script type="text/javascript" src="<?php echo $this->webroot . 'jscripts/tiny_mce/tiny_mce.js'?>"></script>
<script type="text/javascript" src="<?php echo $this->webroot . 'jscripts/tiny_mce/custom.js'?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot . 'jscripts/tiny_mce/custom.css'?>" />
<script type="text/javascript">
function ajaxfilemanager(field_name, url, type, win) {
	var ajaxfilemanagerurl = "<?php echo $this->webroot . 'jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php' ?>";
	switch (type) {
		case "image":
			break;
		case "media":
			break;
		case "flash": 
			break;
		case "file":
			break;
		default:
			return false;
	}
    tinyMCE.activeEditor.windowManager.open({
        url: "<?php echo $this->webroot . 'jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php' ?>",
        width: 780,
        height: 500,
        inline : "yes",
        close_previous : "no"
    },{
        window : win,
        input : field_name
    });
    
}
</script>