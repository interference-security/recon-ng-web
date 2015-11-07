<?php
if(isset($_POST['set_workspace']) && strlen($_POST['set_workspace'])>0)
{
    try
    {
        $set_workspace = urldecode($_POST['set_workspace']);
        require_once("includes/config.php");
        require_once("includes/functions.php");
        $sid = manager_recon("init", NULL);
        $set_recon_workspace = manager_recon("workspace", array($set_workspace, $sid));
        echo '<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Recon-ng workspace configured to "'.htmlentities($set_workspace).'"</div>';
        @session_start();
        $_SESSION['recon_workspace'] = $set_workspace;
        return;
    }
    catch(Exception $e)
    {
        echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> Setting Recon-ng workspace failed. Try again or contact administrator</div>';
    }
    return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Recon-ng Web</title>
	<?php @require_once("includes/head-section.php"); ?>
</head>
<body>
<div class="container">
	<?php @require_once("includes/navbar.php"); ?>
	<div class="row clearfix">
		<div class="col-md-12">
			<form role="form" id="configureworkspace" method="post" action="">
				<div class="form-group">
                    <h1>Create/Change Recon-ng Workspace</h1><br>
                    <?php
                    session_start();
                    if(isset($_SESSION['recon_workspace']) && strlen($_SESSION['recon_workspace'])>0)
                    {
                        $current_recon_workspace = htmlentities($_SESSION['recon_workspace']);
                        echo "<b>Current Recon-ng Workspace:</b> <font color='green'>$current_recon_workspace</font><br>";
                    }
                    else
                    {
                        echo "<b>Current Recon-ng Workspace:</b> <font color='red'>default</font><br>";
                    }
                    ?>
                    <br><br>
                    <label for="set_workspace">Configure Recon-ng Workspace:</label>
					<input type="text" name="set_workspace" value="" id="set_workspace" class='form-control'>
				</div>
				<button type="submit" class="btn btn-success">Configure</button>
			</form><br>
            <div id="loading"></div>
            <div id="result"></div>
		</div>
	</div>
</div>
<script>
        $("#configureworkspace").submit(function(e){    
                e.preventDefault();  
                $( "#result" ).empty().append( "" );
                $( "#loading" ).empty().append( '<img src="img/loading64.gif" alt="Loading..." width="" height="">' );
                $.post("workspace.php", $("#configureworkspace").serialize(),
                function(data){
                    $( "#loading" ).empty().append( "" );
                    $( "#result" ).empty().append( data );
                    var mydata = $("#result").html();
                });
        });
        </script>
</body>
</html>
