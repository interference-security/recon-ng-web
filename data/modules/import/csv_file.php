<?php
ini_set('max_execution_time',500);
//Module details
$module_name_here = "Advanced CSV File Importer";
$module_path_here = "import/csv_file";
$allowed_actions = ["options", "info"];

//Run module
if(isset($_POST['module_option_columnseparator']) && strlen($_POST['module_option_columnseparator'])>0 && isset($_POST['module_option_filename']) && strlen($_POST['module_option_filename'])>0 && isset($_POST['module_option_hasheader']) && strlen($_POST['module_option_hasheader'])>0 && isset($_POST['module_option_table']) && strlen($_POST['module_option_table'])>0)
{
    //Configuration & Functions
    require_once("../../../includes/config.php");
    require_once("../../../includes/functions.php");
    $module_columnseparator = urldecode($_POST['module_option_columnseparator']);
    $module_filename = urldecode($_POST['module_option_filename']);
    $module_hasheader = urldecode($_POST['module_option_hasheader']);
    $module_table = urldecode($_POST['module_option_table']);
    $sid = manager_recon("init", NULL);
    $use_module = manager_recon("use", array($module_path_here, $sid));
    $set_module_columnseparator = manager_recon("set", array('COLUMN_SEPARATOR', $module_columnseparator, $sid));
    $set_module_filename = manager_recon("set", array('FILENAME', $module_filename, $sid));
    $set_module_hasheader = manager_recon("set", array('HAS_HEADER', $module_hasheader, $sid));
    $set_module_table = manager_recon("set", array('TABLE', $module_table, $sid));
    if(isset($_POST['module_option_quotecharacter']) && strlen($_POST['module_option_quotecharacter'])>0)
    {
        $set_module_basicpass = manager_recon("set", array('QUOTE_CHARACTER', urldecode($_POST['module_option_quotecharacter']), $sid));
    }
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
        COLUMN_SEPARATOR: <input type='text' name='module_option_columnseparator' value="" class='form-control'><br>
        FILENAME: <input type='text' name='module_option_filename' value="" class='form-control'><br>
        HAS_HEADER: <input type='text' name='module_option_hasheader' value="True" class='form-control'><br>
        QUOTE_CHARACTER: <input type='text' name='module_option_quotecharacter' value="" class='form-control'><br>
        TABLE: <input type='text' name='module_option_table' value="" class='form-control'><br>
        <button type='submit' class='btn btn-success'>Run</button><br></form>
<?php
    }
    elseif($action=="info")
    {
?>
        Name: <?php echo $module_name_here; ?><br>
        Path: <?php echo "modules/$module_path_here.py"; ?><br>
        Author: Ethan Robish (@EthanRobish)<br>
        <br>
        Description:<br>Imports values from a CSV file into a database table.<br>
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
                    <td>COLUMN_SEPARATOR</td>
                    <td>,</td>
                    <td>yes</td>
                    <td>character that separates each column value</td>
                </tr>
                <tr>
                    <td>FILENAME</td>
                    <td></td>
                    <td>yes</td>
                    <td>path and filename for csv input</td>
                </tr>
                <tr>
                    <td>HAS_HEADER</td>
                    <td>True</td>
                    <td>yes</td>
                    <td>whether or not the first row in the csv file should be interpreted as column names</td>
                </tr>
                <tr>
                    <td>QUOTE_CHARACTER</td>
                    <td></td>
                    <td>no</td>
                    <td>character that surrounds each column value</td>
                </tr>
                <tr>
                    <td>TABLE</td>
                    <td></td>
                    <td>yes</td>
                    <td>table to import the csv values</td>
                </tr>
            </tbody>
        </table>
        <br>
        Comments:<br>
        * Only a few options are available until a valid filename is set. Then, the file is analyzed and more options become available for configuring where each CSV entry is imported.<br>
        * This module is very powerful and can seriously pollute a database. Backing up the database before importing is encouraged.<br>
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