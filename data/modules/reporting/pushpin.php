<?php
ini_set('max_execution_time',500);
//Module details
$module_name_here = "PushPin Report Generator";
$module_path_here = "reporting/pushpin";
$allowed_actions = ["options", "info"];

//Run module
if(isset($_POST['module_option_latitude']) && strlen($_POST['module_option_latitude'])>0 && isset($_POST['module_option_longitude']) && strlen($_POST['module_option_longitude'])>0 && isset($_POST['module_option_mapfilename']) && strlen($_POST['module_option_mapfilename'])>0 && isset($_POST['module_option_mediafilename']) && strlen($_POST['module_option_mediafilename'])>0 && isset($_POST['module_option_radius']) && strlen($_POST['module_option_radius'])>0)
{
    //Configuration & Functions
    require_once("../../../includes/config.php");
    require_once("../../../includes/functions.php");
    $module_latitude = urldecode($_POST['module_option_latitude']);
    $module_longitude = urldecode($_POST['module_option_longitude']);
    $module_mapfilename = urldecode($_POST['module_option_mapfilename']);
    $module_mediafilename = urldecode($_POST['module_option_mediafilename']);
    $module_radius = urldecode($_POST['module_option_radius']);
    $sid = manager_recon("init", NULL);
    $use_module = manager_recon("use", array($module_path_here, $sid));
    $set_module_latitude = manager_recon("set", array('LATITUDE', $module_latitude, $sid));
    $set_module_longitude = manager_recon("set", array('LONGITUDE', $module_longitude, $sid));
    $set_module_mapfilename = manager_recon("set", array('MAP_FILENAME', $module_mapfilename, $sid));
    $set_module_mediafilename = manager_recon("set", array('MEDIA_FILENAME', $module_mediafilename, $sid));
    $set_module_radius = manager_recon("set", array('RADIUS', $module_radius, $sid));
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
        LATITUDE: <input type='text' name='module_option_latitude' value="" class='form-control'><br>
        LONGITUDE: <input type='text' name='module_option_longitude' value="" class='form-control'><br>
        MAP_FILENAME: <input type='text' name='module_option_mapfilename' value="/root/.recon-ng/workspaces/default/pushpin_map.html" class='form-control'><br>
        MEDIA_FILENAME: <input type='text' name='module_option_mediafilename' value="/root/.recon-ng/workspaces/default/pushpin_media.html" class='form-control'><br>
        RADIUS: <input type='text' name='module_option_radius' value="False" class='form-control'><br>
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
        Description:<br>Creates HTML media and map reports for all of the PushPins stored in the database.<br>
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
                    <td>LATITUDE</td>
                    <td></td>
                    <td>yes</td>
                    <td>latitude of the epicenter</td>
                </tr>
                <tr>
                    <td>LONGITUDE</td>
                    <td></td>
                    <td>yes</td>
                    <td>longitude of the epicenter</td>
                </tr>
                <tr>
                    <td>MAP_FILENAME</td>
                    <td>/root/.recon-ng/workspaces/default/pushpin_map.html</td>
                    <td>yes</td>
                    <td>path and filename for pushpin map report</td>
                </tr>
                <tr>
                    <td>MEDIA_FILENAME</td>
                    <td>/root/.recon-ng/workspaces/default/pushpin_media.html</td>
                    <td>yes</td>
                    <td>path and filename for pushpin media report</td>
                </tr>
                <tr>
                    <td>RADIUS</td>
                    <td></td>
                    <td>yes</td>
                    <td>radius from the epicenter in kilometers</td>
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