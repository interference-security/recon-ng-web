<?php
ini_set('max_execution_time',500);
//Module details
$module_name_here = "Adobe Hash Cracker";
$module_path_here = "recon/credentials-credentials/adobe";
$allowed_actions = ["options", "info"];

//Run module
if(isset($_POST['module_option_blockdb']) && strlen($_POST['module_option_blockdb'])>0 && isset($_POST['module_option_source']) && strlen($_POST['module_option_source'])>0)
{
    //Configuration & Functions
    require_once("../../../../includes/config.php");
    require_once("../../../../includes/functions.php");
    $module_blockdb = urldecode($_POST['module_option_blockdb']);
    $module_source = urldecode($_POST['module_option_source']);
    $sid = manager_recon("init", NULL);
    $use_module = manager_recon("use", array($module_path_here, $sid));
    $set_module_blockdb = manager_recon("set", array('BLOCK_DB', $module_blockdb, $sid));
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
        BLOCK_DB: <input type='text' name='module_option_blockdb' value="/usr/share/recon-ng/data/adobe_blocks.json" class='form-control'><br>
        SOURCE: <input type='text' name='module_option_source' value="default" class='form-control'><br>
        <button type='submit' class='btn btn-success'>Run</button><br></form>
<?php
    }
    elseif($action=="info")
    {
?>
        Name: <?php echo $module_name_here; ?><br>
        Path: <?php echo "modules/$module_path_here.py"; ?><br>
        Author: Ethan Robish (@EthanRobish) and Tim Tomes (@LaNMaSteR53)<br>
        <br>
        Description:<br>Decrypts hashes leaked from the 2013 Adobe breach. First, the module cross references the leak ID to identify Adobe hashes in the 'password' column of the 'creds' table, moves the Adobe hashes to the 'hash' column, and changes the 'type' to 'Adobe'. Second, the module attempts to crack the hashes by comparing the ciphertext's decoded cipher blocks to a local block lookup table (BLOCK_DB) of known cipher block values. Finally, the module updates the 'creds' table with the results based on the level of success.<br>
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
                    <td>BLOCK_DB</td>
                    <td>/usr/share/recon-ng/data/adobe_blocks.json</td>
                    <td>yes</td>
                    <td>JSON file containing known Adobe cipher blocks and plaintext</td>
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
                <td>SELECT DISTINCT hash FROM credentials WHERE hash IS NOT NULL AND password IS NULL AND type IS 'Adobe'</td>
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
        * Hash types supported: Adobe's base64 format<br>
        * Hash database from: http://stricture-group.com/files/adobe-top100.txt<br>
        * A completely padded password indicates that the exact length is known.<br>
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
