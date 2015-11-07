<?php
ini_set('max_execution_time',500);
//Module details
$module_name_here = "Jigsaw - Single Contact Retriever";
$module_path_here = "recon/companies-contacts/jigsaw/purchase_contact";
$allowed_actions = ["options", "info"];

//Run module
if(isset($_POST['module_option_contact']) && strlen($_POST['module_option_contact'])>0)
{
    //Configuration & Functions
    require_once("../../../../../includes/config.php");
    require_once("../../../../../includes/functions.php");
    $module_source = urldecode($_POST['module_option_contact']);
    $sid = manager_recon("init", NULL);
    $use_module = manager_recon("use", array($module_path_here, $sid));
    $set_module_source = manager_recon("set", array('CONTACT', $module_source, $sid));
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
        Contact: <input type='text' name='module_option_contact' value="" class='form-control'><br>
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
        Description:<br>Retrieves a single complete contact from the Jigsaw.com API using points from the given account.<br>
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
                    <td>CONTACT</td>
                    <td></td>
                    <td>yes</td>
                    <td>jigsaw contact id</td>
                </tr>
            </tbody>
        </table>
        <br>
        Comments:<br>
          * Account Point Cost: 5 points per request.<br>
          * This module is typically used to validate email address naming conventions and gather alternative social engineering information.<br>
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
