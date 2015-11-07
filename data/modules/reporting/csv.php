<?php
ini_set('max_execution_time',500);
//Module details
$module_name_here = "CSV File Creator";
$module_path_here = "reporting/csv";
$allowed_actions = ["options", "info"];

//Run module
if(isset($_POST['module_option_filename']) && strlen($_POST['module_option_filename'])>0 && isset($_POST['module_option_table']) && strlen($_POST['module_option_table'])>0)
{
    //Configuration & Functions
    require_once("../../../includes/config.php");
    require_once("../../../includes/functions.php");
    $module_filename = urldecode($_POST['module_option_filename']);
    $module_table = urldecode($_POST['module_option_table']);
    $sid = manager_recon("init", NULL);
    $use_module = manager_recon("use", array($module_path_here, $sid));
    $set_module_filename = manager_recon("set", array('FILENAME', $module_filename, $sid));
    $set_module_table = manager_recon("set", array('TABLE', $module_table, $sid));
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
        FILENAME: <input type='text' name='module_option_filename' value="/root/.recon-ng/workspaces/default/results.csv" class='form-control'><br>
        TABLE: <input type='text' name='module_option_table' value="hosts" class='form-control'><br>
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
        Description:<br>Creates a CSV file containing the specified harvested data.<br>
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
                    <td>FILENAME</td>
                    <td>/root/.recon-ng/workspaces/default/results.csv</td>
                    <td>yes</td>
                    <td>path and filename for csv input</td>
                </tr>
                <tr>
                    <td>TABLE</td>
                    <td>hosts</td>
                    <td>yes</td>
                    <td>source table of data to export</td>
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