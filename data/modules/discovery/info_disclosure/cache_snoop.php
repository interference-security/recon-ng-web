<?php
ini_set('max_execution_time',500);
//Module details
$module_name_here = "DNS Cache Snooper";
$module_path_here = "discovery/info_disclosure/cache_snoop";
$allowed_actions = ["options", "info"];

//Run module
if(isset($_POST['module_option_domains']) && strlen($_POST['module_option_domains'])>0 && isset($_POST['module_option_nameserver']) && strlen($_POST['module_option_nameserver'])>0)
{
    //Configuration & Functions
    require_once("../../../../includes/config.php");
    require_once("../../../../includes/functions.php");
    $module_domains = urldecode($_POST['module_option_domains']);
    $module_nameserver = urldecode($_POST['module_option_nameserver']);
    $sid = manager_recon("init", NULL);
    $use_module = manager_recon("use", array($module_path_here, $sid));
    $set_module_domains = manager_recon("set", array('DOMAINS', $module_domains, $sid));
    $set_module_nameserver = manager_recon("set", array('NAMESERVER', $module_nameserver, $sid));
    $run_module = manager_recon("run", $sid);
    echo "<pre>";
    print_r($run_module);
    echo "</pre>";
    return;
}

//Show data based on action
if(strlen($action)>0 && in_array($action, $allowed_actions))
{
    if($action=="options")
    {
?>
        Module Name: <b><?php echo $module_name_here; ?></b><br>
        Module path: <b><?php echo $module_path_here; ?></b><br>
        <br><br>
        <form role='form' id='runmodule' action='' method='post'>
        DOMAINS: <input type='text' name='module_option_domains' value="/usr/share/recon-ng/data/av_domains.lst" class='form-control'><br>
        NAMESERVER: <input type='text' name='module_option_nameserver' value="" class='form-control'><br>
        <button type='submit' class='btn btn-success'>Run</button><br></form>
<?php
    }
    elseif($action=="info")
    {
?>
        Name: <?php echo $module_name_here; ?><br>
        Path: <?php echo "modules/$module_path_here.py"; ?><br>
        Author: thrapt (thrapt@gmail.com)<br>
        <br>
        Description:<br>Uses the DNS cache snooping technique to check for visited domains<br>
        <br>
        Options:<br>
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
                    <td>DOMAINS</td>
                    <td>/usr/share/recon-ng/data/av_domains.lst</td>
                    <td>yes</td>
                    <td>file containing the list of domains to snoop for</td>
                </tr>
                <tr>
                    <td>NAMESERVER</td>
                    <td></td>
                    <td>yes</td>
                    <td>IP address of authoritative nameserver</td>
                </tr>
            </tbody>
        </table>
        <br>
        Comments:<br>
        * Nameserver must be in IP form.<br>
        * http://304geeks.blogspot.com/2013/01/dns-scraping-for-corporate-av-detection.html<br>
        <script>
        $("#runmodule").submit(function(e){    
                e.preventDefault();  
                $( "#result" ).empty().append( "" );
                $( "#loading" ).empty().append( '<img src="img/loading64.gif" alt="Loading..." width="" height="">' );
                $.post("<?php echo "data/modules/$module_path_here.php"; ?>", $("#runmodule").serialize(),
                function(data){
                    $( "#loading" ).empty().append( "" );
                    $( "#result" ).empty().append( data );
                    var mydata = $("#result").html();
                });
        });
        </script>
<?php
    }
    else
    {
        echo "Invalid action";
    }
}
else
{
    echo "Invalid action";
}
?>
