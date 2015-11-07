<?php
ini_set('max_execution_time',500);
//Module details
$module_name_here = "Interesting File Finder";
$module_path_here = "discovery/info_disclosure/interesting_files";
$allowed_actions = ["options", "info"];

//Run module
if(isset($_POST['module_option_download']) && strlen($_POST['module_option_download'])>0 && isset($_POST['module_option_port']) && strlen($_POST['module_option_port'])>0 && isset($_POST['module_option_protocol']) && strlen($_POST['module_option_protocol'])>0 && isset($_POST['module_option_source']) && strlen($_POST['module_option_source'])>0)
{
    //Configuration & Functions
    require_once("../../../../includes/config.php");
    require_once("../../../../includes/functions.php");
    $module_download = urldecode($_POST['module_option_download']);
    $module_port = urldecode($_POST['module_option_port']);
    $module_protocol = urldecode($_POST['module_option_protocol']);
    $module_source = urldecode($_POST['module_option_source']);
    $sid = manager_recon("init", NULL);
    $use_module = manager_recon("use", array($module_path_here, $sid));
    $set_module_download = manager_recon("set", array('DOWNLOAD', $module_download, $sid));
    $set_module_port = manager_recon("set", array('PORT', $module_port, $sid));
    $set_module_protocol = manager_recon("set", array('PROTOCOL', $module_protocol, $sid));
    $set_module_source = manager_recon("set", array('SOURCE', $module_source, $sid));
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
        DOWNLOAD: <input type='text' name='module_option_download' value="True" class='form-control'><br>
        PORT: <input type='text' name='module_option_port' value="80" class='form-control'><br>
        PROTOCOL: <input type='text' name='module_option_protocol' value="http" class='form-control'><br>
        SOURCE: <input type='text' name='module_option_source' value="default" class='form-control'><br>
        <button type='submit' class='btn btn-success'>Run</button><br></form>
<?php
    }
    elseif($action=="info")
    {
?>
        Name: <?php echo $module_name_here; ?><br>
        Path: <?php echo "modules/$module_path_here.py"; ?><br>
        Author: Tim Tomes (@LaNMaSteR53), thrapt (thrapt@gmail.com), Jay Turla (@shipcod3), and Mark Jeffery<br>
        <br>
        Description:<br>Checks hosts for interesting files in predictable locations.<br>
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
                    <td>DOWNLOAD</td>
                    <td>True</td>
                    <td>yes</td>
                    <td>download discovered files</td>
                </tr>
                <tr>
                    <td>PORT</td>
                    <td>80</td>
                    <td>yes</td>
                    <td>request port</td>
                </tr>
                <tr>
                    <td>PROTOCOL</td>
                    <td>http</td>
                    <td>yes</td>
                    <td>request protocol</td>
                </tr>
                <tr>
                    <td>SOURCE</td>
                    <td>default</td>
                    <td>yes</td>
                    <td>source of input (see 'show info' for details)</td>
                </tr>
            </tbody>
        </table>
        <br>
        Source Options:<br>
        <table class='table table-condensed'>
            <tr>
                <td>default</td>
                <td>SELECT DISTINCT host FROM hosts WHERE host IS NOT NULL ORDER BY host</td>
            </tr>
            <tr>
                <td>&lt;string&gt;</td>
                <td>string representing a single input</td>
            </tr>
            <tr>
                <td>&lt;path&gt;</td>
                <td>path to a file containing a list of inputs</td>
            </tr>
            <tr>
                <td>query &lt;sql&gt;</td>
                <td>database query returning one column of inputs</td>
            </tr>
        </table>
        <br>
        Comments:<br>
        * Files: robots.txt, sitemap.xml, sitemap.xml.gz, crossdomain.xml, phpinfo.php, test.php, elmah.axd, server-status, jmx-console/, admin-console/, web-console/<br>
        * Google Dorks:<br>
            &nbsp;&nbsp;&nbsp;&nbsp;- inurl:robots.txt ext:txt<br>
            &nbsp;&nbsp;&nbsp;&nbsp;- inurl:elmah.axd ext:axd intitle:"Error log for"<br>
            &nbsp;&nbsp;&nbsp;&nbsp;- inurl:server-status "Apache Status"<br>
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
