<?php
if(isset($_POST['global_debug']) && strlen($_POST['global_debug'])>0 && isset($_POST['global_nameserver']) && strlen($_POST['global_nameserver'])>0 && isset($_POST['global_threads']) && strlen($_POST['global_threads'])>0 && isset($_POST['global_timeout']) && strlen($_POST['global_timeout'])>0 && isset($_POST['global_useragent']) && strlen($_POST['global_useragent'])>0 && isset($_POST['global_verbose']) && strlen($_POST['global_verbose'])>0)
{
    try
    {
        //Configuration & Functions
        require_once("includes/config.php");
        require_once("includes/functions.php");
        $global_debug = urldecode($_POST['global_debug']);
        $global_nameserver = urldecode($_POST['global_nameserver']);
        $global_threads = urldecode($_POST['global_threads']);
        $global_timeout = urldecode($_POST['global_timeout']);
        $global_useragent = html_entity_decode(urldecode($_POST['global_useragent']));
        $global_verbose = urldecode($_POST['global_verbose']);
        $global_proxy = "";
        $sid = manager_recon("init", NULL);
        $set_global_debug = manager_recon("global_set", array('DEBUG', $global_debug, $sid));
        $set_global_namerserver = manager_recon("global_set", array('NAMESERVER', $global_nameserver, $sid));
        $set_global_threads = manager_recon("global_set", array('THREADS', $global_threads, $sid));
        $set_global_timeout = manager_recon("global_set", array('TIMEOUT', $global_timeout, $sid));
        $set_global_useragent = manager_recon("global_set", array('USER-AGENT', $global_useragent, $sid));
        $set_global_verbose = manager_recon("global_set", array('VERBOSE', $global_verbose, $sid));
        if(isset($_POST['global_proxy']))
        {
            $global_proxy = urldecode($_POST['global_proxy']);
            if(strlen($global_proxy)==0)
            {
                $set_global_proxy = manager_recon("global_set", array('PROXY', '""', $sid));
            }
            else
            {
                $set_global_proxy = manager_recon("global_set", array('PROXY', $global_proxy, $sid));
            }
        }
        @session_start();
        $_SESSION['recon_global_debug'] = $global_debug;
        $_SESSION['recon_global_nameserver'] = $global_nameserver;
        $_SESSION['recon_global_threads'] = $global_threads;
        $_SESSION['recon_global_timeout'] = $global_timeout;
        $_SESSION['recon_global_useragent'] = $global_useragent;
        $_SESSION['recon_global_verbose'] = $global_verbose;
        if(isset($_POST['global_proxy']))
        {
            $_SESSION['recon_global_proxy'] = $global_proxy;
        }
        echo '<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Recon-ng global options configured successfully.</div>';
        return;
    }
    catch(Exception $e)
    {
        echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> Setting Recon-ng global options failed. Try again or contact administrator</div>';
    }
    return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Recon-ng Web: Global Options</title>
	<?php @require_once("includes/head-section.php"); ?>
</head>
<body>
<div class="container">
	<?php @require_once("includes/navbar.php"); ?>
	<div class="row clearfix">
		<div class="col-md-12">
            <h1>Recon-ng Global Options</h1><br>
			<ul id="myTab" class="nav nav-tabs">
				<li class="active" style="width:50%">
					<a style="outline:none" href="#global-options" data-toggle="tab" class="module-options"> Global Options</a>
				</li>
				<li style="width:50%">
					<a style="outline:none" href="#update-global-options" data-toggle="tab" class="module-info"> Update Global Options</a>
			</ul>
			<div id="myTabContent" class="tab-content">
				<div class="tab-pane fade in active" id="global-options">
					<p><br>
						<div class="col-md-12">
                            <?php @session_start(); ?>
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Current Value</th>
                                        <th>Required</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>DEBUG</td>
                                        <td><?php echo (isset($_SESSION['recon_global_debug']) && strlen($_SESSION['recon_global_debug'])>0) ? htmlentities($_SESSION['recon_global_debug']) : htmlentities("False"); ?></td>
                                        <td>yes</td>
                                        <td>enable debugging output</td>
                                    </tr>
                                    <tr>
                                        <td>NAMESERVER</td>
                                        <td><?php echo (isset($_SESSION['recon_global_nameserver']) && strlen($_SESSION['recon_global_nameserver'])>0) ? htmlentities($_SESSION['recon_global_nameserver']) : htmlentities("8.8.8.8"); ?></td>
                                        <td>yes</td>
                                        <td>nameserver for DNS interrogation</td>
                                    </tr>
                                    <tr>
                                        <td>PROXY</td>
                                        <td><?php echo (isset($_SESSION['recon_global_proxy']) && strlen($_SESSION['recon_global_proxy'])>0) ? htmlentities($_SESSION['recon_global_proxy']) : htmlentities(""); ?></td>
                                        <td>no</td>
                                        <td>proxy server (address:port)</td>
                                    </tr>
                                    <tr>
                                        <td>THREADS</td>
                                        <td><?php echo (isset($_SESSION['recon_global_threads']) && strlen($_SESSION['recon_global_threads'])>0) ? htmlentities($_SESSION['recon_global_threads']) : htmlentities("10"); ?></td>
                                        <td>yes</td>
                                        <td>number of threads (where applicable)</td>
                                    </tr>
                                    <tr>
                                        <td>TIMEOUT</td>
                                        <td><?php echo (isset($_SESSION['recon_global_timeout']) && strlen($_SESSION['recon_global_timeout'])>0) ? htmlentities($_SESSION['recon_global_timeout']) : htmlentities("10"); ?></td>
                                        <td>yes</td>
                                        <td>socket timeout (seconds)</td>
                                    </tr>
                                    <tr>
                                        <td>USER-AGENT</td>
                                        <td><?php echo (isset($_SESSION['recon_global_useragent']) && strlen($_SESSION['recon_global_useragent'])>0) ? htmlentities($_SESSION['recon_global_useragent']) : htmlentities("Recon-ng/v4"); ?></td>
                                        <td>yes</td>
                                        <td>user-agent string</td>
                                    </tr>
                                    <tr>
                                        <td>VERBOSE</td>
                                        <td><?php echo (isset($_SESSION['recon_global_verbose']) && strlen($_SESSION['recon_global_verbose'])>0) ? htmlentities($_SESSION['recon_global_verbose']) : htmlentities("True"); ?></td>
                                        <td>yes</td>
                                        <td>enable verbose output</td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                            /*session_start();
                            if(isset($_SESSION['recon_workspace']) && strlen($_SESSION['recon_workspace'])>0)
                            {
                                $current_recon_workspace = htmlentities($_SESSION['recon_workspace']);
                                echo "<b>Current Recon-ng Workspace:</b> <font color='green'>$current_recon_workspace</font><br>";
                            }
                            else
                            {
                                echo "<b>Current Recon-ng Workspace:</b> <font color='red'>default</font><br>";
                            }*/
                            ?>
                        </div>
					</p>
				</div>
				<div class="tab-pane fade" id="update-global-options">
					<p><br>
                        <div class="col-md-12">
                            <form role="form" id="configureglobal" method="post" action="">
                                <?php @session_start(); ?>
                                <div class="form-group">
                                    DEBUG:
                                    <input type="text" name="global_debug" value="<?php echo (isset($_SESSION['recon_global_debug']) && strlen($_SESSION['recon_global_debug'])>0) ? htmlentities($_SESSION['recon_global_debug']) : htmlentities("False"); ?>" id="global_debug" class='form-control'><br>
                                    NAMESERVER:
                                    <input type="text" name="global_nameserver" value="<?php echo (isset($_SESSION['recon_global_nameserver']) && strlen($_SESSION['recon_global_nameserver'])>0) ? htmlentities($_SESSION['recon_global_nameserver']) : htmlentities("8.8.8.8"); ?>" id="global_nameserver" class='form-control'><br>
                                    PROXY:
                                    <input type="text" name="global_proxy" value="<?php echo (isset($_SESSION['recon_global_proxy']) && strlen($_SESSION['recon_global_proxy'])>0) ? htmlentities($_SESSION['recon_global_proxy']) : htmlentities(""); ?>" id="global_proxy" class='form-control'><br>
                                    THREADS:
                                    <input type="text" name="global_threads" value="<?php echo (isset($_SESSION['recon_global_threads']) && strlen($_SESSION['recon_global_threads'])>0) ? htmlentities($_SESSION['recon_global_threads']) : htmlentities("10"); ?>" id="global_threads" class='form-control'><br>
                                    TIMEOUT:
                                    <input type="text" name="global_timeout" value="<?php echo (isset($_SESSION['recon_global_timeout']) && strlen($_SESSION['recon_global_timeout'])>0) ? htmlentities($_SESSION['recon_global_timeout']) : htmlentities("10"); ?>" id="global_timeout" class='form-control'><br>
                                    USER-AGENT:
                                    <input type="text" name="global_useragent" value="<?php echo (isset($_SESSION['recon_global_useragent']) && strlen($_SESSION['recon_global_useragent'])>0) ? htmlentities($_SESSION['recon_global_useragent']) : htmlentities("Recon-ng/v4"); ?>" id="global_useragent" class='form-control'><br>
                                    VERBOSE:
                                    <input type="text" name="global_verbose" value="<?php echo (isset($_SESSION['recon_global_verbose']) && strlen($_SESSION['recon_global_verbose'])>0) ? htmlentities($_SESSION['recon_global_verbose']) : htmlentities("True"); ?>" id="global_verbose" class='form-control'><br>
                                </div>
                                <button type="submit" class="btn btn-success">Configure</button>
                            </form><br>
                        </div>
                    </p>
                </div>
            </div>
            <div id="loading"></div>
            <div id="result"></div>
		</div>
	</div>
</div>
<script>
        $("#configureglobal").submit(function(e){    
                e.preventDefault();  
                $( "#result" ).empty().append( "" );
                $( "#loading" ).empty().append( '<img src="img/loading64.gif" alt="Loading..." width="" height="">' );
                $.post("global-options.php", $("#configureglobal").serialize(),
                function(data){
                    $( "#loading" ).empty().append( "" );
                    $( "#result" ).empty().append( data );
                    var mydata = $("#result").html();
                });
        });
        </script>
</body>
</html>
