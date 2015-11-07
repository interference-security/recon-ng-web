<?php
if(isset($_POST['set_rpc_url']) && strlen($_POST['set_rpc_url'])>0)
{
    try
    {
        $set_rpc_url = urldecode($_POST['set_rpc_url']);
        session_start();
        $_SESSION['recon_rpc_url'] = $set_rpc_url;
        echo '<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Recon-ng RPC URL has been configured.</div>';
    }
    catch(Exception $e)
    {
        echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> Setting RPC URL failed. Try again or contact administrator</div>';
    }
    return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Recon-ng Web: RPC Settings</title>
	<?php @require_once("includes/head-section.php"); ?>
</head>
<body>
<div class="container">
	<?php @require_once("includes/navbar.php"); ?>
	<div class="row clearfix">
		<div class="col-md-12">
			<form role="form" id="configurerpc" method="post" action="">
				<div class="form-group">
                    <h1>Recon-ng RPC Settings</h1><br>
					<?php
                    session_start();
                    if(isset($_SESSION['recon_rpc_url']) && strlen($_SESSION['recon_rpc_url'])>0)
                    {
                        $current_rpc_url = htmlentities($_SESSION['recon_rpc_url']);
                        echo "<b>Current Recon-ng XMLRPC URL:</b> <font color='green'>$current_rpc_url</font><br>";
                    }
                    else
                    {
                        echo "<b>Current Recon-ng XMLRPC URL:</b> <font color='red'>NOT CONFIGURED</font><br>";
                    }
                    ?>
                    <br><br>
                    <label for="set_rpc_url">Configure Recon-ng XMLRPC URL:</label>
					<input type="text" name="set_rpc_url" value="" id="set_rpc_url" class='form-control'>
				</div>
				<button type="submit" class="btn btn-success">Configure</button>
			</form><br>
            <div id="loading"></div>
            <div id="result"></div>
		</div>
	</div>
</div>
<script>
        $("#configurerpc").submit(function(e){    
                e.preventDefault();  
                $( "#result" ).empty().append( "" );
                $( "#loading" ).empty().append( '<img src="img/loading64.gif" alt="Loading..." width="" height="">' );
                $.post("rpc-settings.php", $("#configurerpc").serialize(),
                function(data){
                    $( "#loading" ).empty().append( "" );
                    $( "#result" ).empty().append( data );
                    var mydata = $("#result").html();
                });
        });
        </script>
</body>
</html>
