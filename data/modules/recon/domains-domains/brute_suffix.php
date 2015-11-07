<?php
ini_set('max_execution_time',500);
//Module details
$module_name_here = "DNS Public Suffix Brute Forcer";
$module_path_here = "recon/domains-domains/brute_suffix";
$allowed_actions = ["options", "info"];

//Run module
if(isset($_POST['module_option_suffixes']) && strlen($_POST['module_option_suffixes'])>0 && isset($_POST['module_option_source']) && strlen($_POST['module_option_source'])>0)
{
    //Configuration & Functions
    require_once("../../../../includes/config.php");
    require_once("../../../../includes/functions.php");
    $module_source = urldecode($_POST['module_option_source']);
    $module_suffixes = urldecode($_POST['module_option_suffixes']);
    $sid = manager_recon("init", NULL);
    $use_module = manager_recon("use", array($module_path_here, $sid));
    $set_module_source = manager_recon("set", array('SOURCE', $module_source, $sid));
    $set_module_suffixes = manager_recon("set", array('BLOCK_DB', $module_suffixes, $sid));
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
        SOURCE: <input type='text' name='module_option_source' value="default" class='form-control'><br>
        SUFFIXES: <input type='text' name='module_option_suffixes' value="/usr/share/recon-ng/data/suffixes.txt" class='form-control'><br>
        <button type='submit' class='btn btn-success'>Run</button><br></form>
<?php
    }
    elseif($action=="info")
    {
?>
        Name: <?php echo $module_name_here; ?><br>
        Path: <?php echo "modules/$module_path_here.py"; ?><br>
        Author: Marcus Watson (@BranMacMuffin)<br>
        <br>
        Description:<br>Brute forces TLDs and SLDs using DNS. Updates the 'domains' table with the results.<br>
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
                    <td>SOURCE</td>
                    <td>default</td>
                    <td>yes</td>
                    <td>source of input (see 'show info' for details)</td>
                </tr>
                <tr>
                    <td>SUFFIXES</td>
                    <td>/usr/share/recon-ng/data/suffixes.txt</td>
                    <td>yes</td>
                    <td>path to public suffix wordlist</td>
                </tr>
            </tbody>
        </table>
        <br>
        Source Options:<br>
        <table class='table table-condensed'>
            <tr>
                <td>default</td>
                <td>SELECT DISTINCT domain FROM domains WHERE domain IS NOT NULL</td>
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
        * TLDs: https://data.iana.org/TLD/tlds-alpha-by-domain.txt<br>
        * SLDs: https://raw.github.com/gavingmiller/second-level-domains/master/SLDs.csv<br>
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
