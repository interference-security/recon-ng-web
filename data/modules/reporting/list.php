<?php
ini_set('max_execution_time',500);
//Module details
$module_name_here = "List Creator";
$module_path_here = "reporting/list";
$allowed_actions = ["options", "info"];

//Run module
if(isset($_POST['module_option_column']) && strlen($_POST['module_option_column'])>0 && isset($_POST['module_option_filename']) && strlen($_POST['module_option_filename'])>0 && isset($_POST['module_option_nulls']) && strlen($_POST['module_option_nulls'])>0 && isset($_POST['module_option_table']) && strlen($_POST['module_option_table'])>0 && isset($_POST['module_option_unique']) && strlen($_POST['module_option_unique'])>0)
{
    //Configuration & Functions
    require_once("../../../includes/config.php");
    require_once("../../../includes/functions.php");
    $module_column = urldecode($_POST['module_option_column']);
    $module_filename = urldecode($_POST['module_option_filename']);
    $module_nulls = urldecode($_POST['module_option_nulls']);
    $module_table = urldecode($_POST['module_option_table']);
    $module_unique = urldecode($_POST['module_option_unique']);
    $sid = manager_recon("init", NULL);
    $use_module = manager_recon("use", array($module_path_here, $sid));
    $set_module_column = manager_recon("set", array('COLUMN', $module_column, $sid));
    $set_module_filename = manager_recon("set", array('FILENAME', $module_filename, $sid));
    $set_module_nulls = manager_recon("set", array('NULLS', $module_nulls, $sid));
    $set_module_table = manager_recon("set", array('TABLE', $module_table, $sid));
    $set_module_unique = manager_recon("set", array('UNIQUE', $module_unique, $sid));
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
        COLUMN: <input type='text' name='module_option_column' value="ip_address" class='form-control'><br>
        FILENAME: <input type='text' name='module_option_filename' value="/root/.recon-ng/workspaces/default/list.txt" class='form-control'><br>
        NULLS: <input type='text' name='module_option_table' value="False" class='form-control'><br>
        TABLE: <input type='text' name='module_option_table' value="hosts" class='form-control'><br>
        UNIQUE: <input type='text' name='module_option_table' value="True" class='form-control'><br>
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
        Description:<br>Creates a file containing a list of records from the database.<br>
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
                    <td>COLUMN</td>
                    <td>ip_address</td>
                    <td>yes</td>
                    <td>source column of data for the list</td>
                </tr>
                <tr>
                    <td>FILENAME</td>
                    <td>/root/.recon-ng/workspaces/default/list.txt</td>
                    <td>yes</td>
                    <td>path and filename for report output</td>
                </tr>
                <tr>
                    <td>NULLS</td>
                    <td>False</td>
                    <td>yes</td>
                    <td>include nulls in the dataset</td>
                </tr>
                <tr>
                    <td>TABLE</td>
                    <td>hosts</td>
                    <td>yes</td>
                    <td>source table of data for the list</td>
                </tr>
                <tr>
                    <td>UNIQUE</td>
                    <td>True</td>
                    <td>yes</td>
                    <td>only return unique items from the dataset</td>
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