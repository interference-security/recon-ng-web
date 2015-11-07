<?php
// include files
@require_once("includes/check-authorize.php");
@require_once("includes/db-con.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>OTF TITLE</title>
	<?php @require_once("includes/head-section.php"); ?>
	<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
	<script type="text/javascript" src="jquery.form.js"></script>
	<style>
	#progressOverlay .progress {
    position:relative;
    width:80%;
    top:50%;
    margin:0 auto;
	}
	 
	#progressOverlay {
		position:relative;
		height:100%;
	}
	</style>
</head>

<body>
<div class="container">
	<?php @require_once("includes/navbar.php"); ?>
	<div class="row clearfix">
		<form id="imageform" method="post" enctype="multipart/form-data" action="upload.php">
			<div id="uploadBox" class="well" onClick="$('#photoimg').click();">
				<H2>Click to Upload</H2>
			</div>
			<input type="file" class="hide" name="photoimg" id="photoimg" onchange="$(this.form).submit();"/>
		</form>
	</div>
</div>

<script>
$('#imageform').ajaxForm( {
    dataType : 'json',
    beforeSubmit: function() {
        $(this).addClass('loading');
        $('#uploadBox').html('<div id="progressOverlay"><div class="progress progress-striped"><div class="bar" id="progressBar" style="width: 0%;">0%</div></div></div>');
    },
    uploadProgress: function ( event, position, total, percentComplete ) {
        if (percentComplete == 100) {
            $('#progressBar').css('width',percentComplete+'%').html('Processing...');
        } else {
            $('#progressBar').css('width',percentComplete+'%').html(percentComplete+'%');
        }
    },
    success : function ( json ) {
        //Your Custom JS Code Here
    }
});
</script>
</body>
</html>
