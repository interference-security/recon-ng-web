<?php
ini_set('max_execution_time',500);
//Module details
$module_name_here = "PwnedList - Leak Details Fetcher";
$module_path_here = "recon/domains-credentials/pwnedlist/leaks_dump";
$allowed_actions = ["options", "info"];

//Run module
if(strtolower($_SERVER['REQUEST_METHOD'])=="post")
{
    //Configuration & Functions
    require_once("../../../../../includes/config.php");
    require_once("../../../../../includes/functions.php");
    $sid = manager_recon("init", NULL);
    $use_module = manager_recon("use", array($module_path_here, $sid));
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
        No options available for this module.
        <br>
        <form role='form' id='runmodule' action='' method='post'>
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
        Description:<br>Queries the PwnedList API for information associated with all known leaks. Updates the 'leaks' table with the results.<br>
        <br>
        Options:<br>
        No options available for this module.<br>
        <br>
        Comments:<br>
        * API Query Cost: 1 query per request.<br>
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
