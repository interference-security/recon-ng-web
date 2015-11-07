<?php
if(strtolower($_SERVER['REQUEST_METHOD'])=="post")
{
    try
    {
        require_once("includes/config.php");
        require_once("includes/functions.php");
        $sid = manager_recon("init", NULL);
        $set_global_debug = manager_recon("global_set", array('DEBUG', "False", $sid));
        $set_global_namerserver = manager_recon("global_set", array('NAMESERVER', "8.8.8.8", $sid));
        $set_global_threads = manager_recon("global_set", array('THREADS', "10", $sid));
        $set_global_timeout = manager_recon("global_set", array('TIMEOUT', "10", $sid));
        $set_global_useragent = manager_recon("global_set", array('USER-AGENT', "Recon-ng/v4", $sid));
        $set_global_verbose = manager_recon("global_set", array('VERBOSE', "True", $sid));
        $set_global_proxy = manager_recon("global_set", array('PROXY', '""', $sid));
        $set_recon_workspace = manager_recon("workspace", array("default", $sid));
        @session_start();
        $_SESSION = array();
        if (ini_get("session.use_cookies"))
        {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
        }
        @session_destroy();
        echo '<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Recon-ng configuration has been reset to default."</div>';
        return;
    }
    catch(Exception $e)
    {
        echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> Resetting Recon-ng failed. Try again or contact administrator</div>';
    }
    return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Recon-ng Web: Reset</title>
	<?php @require_once("includes/head-section.php"); ?>
</head>
<body>
<div class="container">
	<?php @require_once("includes/navbar.php"); ?>
	<div class="row clearfix">
		<div class="col-md-12">
			<form role="form" id="resetrecon" method="post" action="">
				<div class="form-group">
                    <h1>Reset Recon-ng Configuration</h1><br>
                    <br>
                    This will reset recon-ng settings (RPC URL, Global Options and Current Workspace) to default. Are you sure you want to continue?<br>
				</div>
				<button type="submit" class="btn btn-danger">Reset Configuration</button>
			</form><br>
            <div id="loading"></div>
            <div id="result"></div>
		</div>
	</div>
</div>
<script>
        $("#resetrecon").submit(function(e){    
                e.preventDefault();  
                $( "#result" ).empty().append( "" );
                $( "#loading" ).empty().append( '<img src="img/loading64.gif" alt="Loading..." width="" height="">' );
                $.post("reset.php", $("#resetrecon").serialize(),
                function(data){
                    $( "#loading" ).empty().append( "" );
                    $( "#result" ).empty().append( data );
                    var mydata = $("#result").html();
                });
        });
        </script>
</body>
</html>
