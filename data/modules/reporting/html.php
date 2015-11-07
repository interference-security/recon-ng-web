<?php
ini_set('max_execution_time',500);
//Module details
$module_name_here = "HTML Report Generator";
$module_path_here = "reporting/html";
$allowed_actions = ["options", "info"];

//Run module
if(isset($_POST['module_option_creator']) && strlen($_POST['module_option_creator'])>0 && isset($_POST['module_option_customer']) && strlen($_POST['module_option_customer'])>0 && isset($_POST['module_option_filename']) && strlen($_POST['module_option_filename'])>0 && isset($_POST['module_option_sanitize']) && strlen($_POST['module_option_sanitize'])>0)
{
    //Configuration & Functions
    require_once("../../../includes/config.php");
    require_once("../../../includes/functions.php");
    $module_creator = urldecode($_POST['module_option_creator']);
    $module_customer = urldecode($_POST['module_option_customer']);
    $module_filename = urldecode($_POST['module_option_filename']);
    $module_sanitize = urldecode($_POST['module_option_sanitize']);
    $sid = manager_recon("init", NULL);
    $use_module = manager_recon("use", array($module_path_here, $sid));
    $set_module_creator = manager_recon("set", array('CREATOR', $module_creator, $sid));
    $set_module_customer = manager_recon("set", array('CUSTOMER', $module_customer, $sid));
    $set_module_filename = manager_recon("set", array('FILENAME', $module_filename, $sid));
    $set_module_sanitize = manager_recon("set", array('SANITIZE', $module_sanitize, $sid));
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
        CREATOR: <input type='text' name='module_option_creator' value="" class='form-control'><br>
        CUSTOMER: <input type='text' name='module_option_customer' value="" class='form-control'><br>
        FILENAME: <input type='text' name='module_option_filename' value="/root/.recon-ng/workspaces/default/results.html" class='form-control'><br>
        SANITIZE: <input type='text' name='module_option_sanitize' value="True" class='form-control'><br>
        <button type='submit' class='btn btn-success'>Run</button><br></form>
<?php
    }
    elseif($action=="info")
    {
?>
        Name: <?php echo $module_name_here; ?><br>
        Path: <?php echo "modules/$module_path_here.py"; ?><br>
        Author: Tim Tomes (@LaNMaSteR53)<br>
        <br>
        Description:<br>Creates a HTML report.<br>
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
                    <td>CREATOR</td>
                    <td></td>
                    <td>yes</td>
                    <td>creator name for the report footer</td>
                </tr>
                <tr>
                    <td>CUSTOMER</td>
                    <td></td>
                    <td>yes</td>
                    <td>customer name for the report header</td>
                </tr>
                <tr>
                    <td>FILENAME</td>
                    <td>/root/.recon-ng/workspaces/default/results.html</td>
                    <td>yes</td>
                    <td>path and filename for report output</td>
                </tr>
                <tr>
                    <td>SANITIZE</td>
                    <td>True</td>
                    <td>yes</td>
                    <td>mask sensitive data in the report</td>
                </tr>
            </tbody>
        </table>
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