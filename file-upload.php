<?php
if(strtolower($_SERVER['REQUEST_METHOD'])=="post")
{
    try
    {
        if(isset($_FILES['recon_file_upload']))
        {
            $file_name = $_FILES['recon_file_upload']['name'];
            $file_size =$_FILES['recon_file_upload']['size'];
            $file_tmp =$_FILES['recon_file_upload']['tmp_name'];
            $file_type=$_FILES['recon_file_upload']['type'];
            if(strtolower($file_name)=='.htaccess')
                die('<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> Uploading this file is not allowed.</div>');
            $upload_path = "uploads/$file_name";
            move_uploaded_file($file_tmp, $upload_path);
            $final_full_path = htmlentities(realpath($upload_path));
            $upload_error_val = $_FILES['recon_file_upload']['error'];
            if($upload_error_val==0)
            {
                echo '<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> File has been uploaded successfully.</div>';
                echo '<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Full path of file: <b>'.$final_full_path.'</b></div>';
            }
            elseif($upload_error_val==1)
                echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> The uploaded file exceeds the upload_max_filesize directive in php.ini</div>';
            elseif($upload_error_val==2)
                echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.</div>';
            elseif($upload_error_val==3)
                echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> The uploaded file was only partially uploaded.</div>';
            elseif($upload_error_val==4)
                echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> No file was uploaded.</div>';
            elseif($upload_error_val==6)
                echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> Missing a temporary folder.</div>';
            elseif($upload_error_val==7)
                echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> Failed to write file to disk.</div>';
            elseif($upload_error_val==8)
                echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> A PHP extension stopped the file upload.</div>';
            else
                echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> File upload failed. Try again or contact administrator</div>';
            return;
        }
        else
        {
            echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> File upload failed. Try again or contact administrator</div>';
            return;
        }
    }
    catch(Exception $e)
    {
        echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> File upload failed. Try again or contact administrator</div>';
    }
    return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Recon-ng Web: File Upload</title>
	<?php @require_once("includes/head-section.php"); ?>
    <style>
        .progress { position:relative; width:100%; height:30px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
        .bar { background-color: #B4F5B4; width:0%; height:30px; border-radius: 3px; }
        .percent { position:absolute; display:inline-block; top:3px; left:48%; }
    </style>
</head>
<body>
<div class="container">
	<?php @require_once("includes/navbar.php"); ?>
	<div class="row clearfix">
		<div class="col-md-12">
			<form role="form" id="reconupload" enctype="multipart/form-data" method="post" action="">
				<div class="form-group">
                    <h1>File Uploading</h1><br>
                    <br>
                    This feature allows you to upload files on this server. Then it can be used in Recon-ng fields like SOURCE and others which accept file path as input.<br>
                    <br>
                    <font color='red'>Note: To use this feature in modules "Recon-ng Web" and Recon-ng (i.e. recon-rpc) should be running on the same server.</font><br>
                    <br>
                    <label for="recon_file_upload">Select file to upload:</label>
					<input type="file" name="recon_file_upload" id="recon_file_upload" class='form-control'>
				</div>
				<button type="submit" class="btn btn-success">Upload</button>
			</form><br>
            <div class="progress">
                <div class="bar"></div >
                <div class="percent">0%</div >
            </div>
            <div id="status"></div>
		</div>
	</div>
</div>
<script src="js/jquery.form.js"></script>
<script>
(function() {
    
var bar = $('.bar');
var percent = $('.percent');
var status = $('#status');
   
$('form').ajaxForm({
    beforeSend: function() {
        status.empty();
        var percentVal = '0%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    success: function() {
        var percentVal = '100%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
	complete: function(xhr) {
		status.html(xhr.responseText);
	}
}); 

})();       
</script>
</body>
</html>