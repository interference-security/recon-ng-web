<?php
//Configuration
ini_set('max_execution_time',500);
?>
<?php
$module_disk_path = "";
if(isset($_GET['module_name']) && strlen($_GET['module_name'])>0)
{
    $module_name = urldecode($_GET['module_name']);
    $module_name = preg_replace('/[^a-zA-Z0-9\/\-\_]/s', '', $module_name);
    $module_disk_path = "data/modules/$module_name.php";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Recon-ng Web: Module</title>
	<?php @require_once("includes/head-section.php"); ?>
</head>
<body>
<div class="container">
	<?php @require_once("includes/navbar.php"); ?>
	<div class="row clearfix">
		<div class="col-md-12">
            <ul id="myTab" class="nav nav-tabs">
				<li class="active" style="width:50%">
					<a style="outline:none" href="#module-options" data-toggle="tab" class="module-options"> Module Options</a>
				</li>
				<li style="width:50%">
					<a style="outline:none" href="#module-info" data-toggle="tab" class="module-info"> Module Information</a>
			</ul>
			<div id="myTabContent" class="tab-content">
				<div class="tab-pane fade in active" id="module-options">
					<p><br>
						<div class="col-md-12">
                            <?php $action="options"; require("$module_disk_path"); ?>
                        </div>
					</p>
				</div>
				<div class="tab-pane fade" id="module-info">
					<p><br>
                        <div class="col-md-12">
                            <?php $action="info"; require("$module_disk_path"); ?>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="col-md-12">
                <div id="loading"></div>
                <div id="result"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>