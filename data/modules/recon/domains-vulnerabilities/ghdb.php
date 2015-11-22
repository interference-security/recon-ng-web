<?php
ini_set('max_execution_time',500);
//Module details
$module_name_here = "Google Hacking Database";
$module_path_here = "recon/domains-vulnerabilities/ghdb";
$allowed_actions = ["options", "info"];

//Run module
if(isset($_POST['module_option_ghdb_advisories_and_vulnerabilities']) && strlen($_POST['module_option_ghdb_advisories_and_vulnerabilities'])>0 && isset($_POST['module_option_ghdb_error_messages']) && strlen($_POST['module_option_ghdb_error_messages'])>0 && isset($_POST['module_option_ghdb_files_containing_juciy_info']) && strlen($_POST['module_option_ghdb_files_containing_juciy_info'])>0 && isset($_POST['module_option_ghdb_files_containing_passwords']) && strlen($_POST['module_option_ghdb_files_containing_passwords'])>0 && isset($_POST['module_option_ghdb_files_containing_usernames']) && strlen($_POST['module_option_ghdb_files_containing_usernames'])>0 && isset($_POST['module_option_ghdb_footholds']) && strlen($_POST['module_option_ghdb_footholds'])>0 && isset($_POST['module_option_ghdb_network_or_vulnerability_data']) && strlen($_POST['module_option_ghdb_network_or_vulnerability_data'])>0 && isset($_POST['module_option_ghdb_pages_containing_login_portals']) && strlen($_POST['module_option_ghdb_pages_containing_login_portals'])>0 && isset($_POST['module_option_ghdb_sensitive_directories']) && strlen($_POST['module_option_ghdb_sensitive_directories'])>0 && isset($_POST['module_option_ghdb_sensitive_online_shopping_info']) && strlen($_POST['module_option_ghdb_sensitive_online_shopping_info'])>0 && isset($_POST['module_option_ghdb_various_online_devices']) && strlen($_POST['module_option_ghdb_various_online_devices'])>0 && isset($_POST['module_option_ghdb_vulnerable_files']) && strlen($_POST['module_option_ghdb_vulnerable_files'])>0 && isset($_POST['module_option_ghdb_vulnerable_servers']) && strlen($_POST['module_option_ghdb_vulnerable_servers'])>0 && isset($_POST['module_option_ghdb_web_server_detection']) && strlen($_POST['module_option_ghdb_web_server_detection'])>0 && isset($_POST['module_option_source']) && strlen($_POST['module_option_source'])>0)
{
    //Configuration & Functions
    require_once("../../../../includes/config.php");
    require_once("../../../../includes/functions.php");
    $module_ghdb_advisories_and_vulnerabilities = urldecode($_POST['module_option_ghdb_advisories_and_vulnerabilities']);
    $module_ghdb_error_messages = urldecode($_POST['module_option_ghdb_error_messages']);
    $module_ghdb_files_containing_juciy_info = urldecode($_POST['module_option_ghdb_files_containing_juciy_info']);
    $module_ghdb_files_containing_passwords = urldecode($_POST['module_option_ghdb_files_containing_passwords']);
    $module_ghdb_files_containing_usernames = urldecode($_POST['module_option_ghdb_files_containing_usernames']);
    $module_ghdb_footholds = urldecode($_POST['module_option_ghdb_footholds']);
    $module_ghdb_network_or_vulnerability_data = urldecode($_POST['module_option_ghdb_network_or_vulnerability_data']);
    $module_ghdb_pages_containing_login_portals = urldecode($_POST['module_option_ghdb_pages_containing_login_portals']);
    $module_ghdb_sensitive_directories = urldecode($_POST['module_option_ghdb_sensitive_directories']);
    $module_ghdb_sensitive_online_shopping_info = urldecode($_POST['module_option_ghdb_sensitive_online_shopping_info']);
    $module_ghdb_various_online_devices = urldecode($_POST['module_option_ghdb_various_online_devices']);
    $module_ghdb_vulnerable_files = urldecode($_POST['module_option_ghdb_vulnerable_files']);
    $module_ghdb_vulnerable_servers = urldecode($_POST['module_option_ghdb_vulnerable_servers']);
    $module_ghdb_web_server_detection = urldecode($_POST['module_option_ghdb_web_server_detection']);
    $module_source = urldecode($_POST['module_option_source']);
    $sid = manager_recon("init", NULL);
    $use_module = manager_recon("use", array($module_path_here, $sid));
    $set_module_ghdb_advisories_and_vulnerabilities = manager_recon("set", array('GHDB_ADVISORIES_AND_VULNERABILITIES', $module_ghdb_, $sid));
    $set_module_ghdb_error_messages = manager_recon("set", array('GHDB_ERROR_MESSAGES', $module_ghdb_, $sid));
    $set_module_ghdb_files_containing_juciy_info = manager_recon("set", array('GHDB_FILES_CONTAINING_JUICY_INFO', $module_ghdb_, $sid));
    $set_module_ghdb_files_containing_passwords = manager_recon("set", array('GHDB_FILES_CONTAINING_PASSWORDS', $module_ghdb_, $sid));
    $set_module_ghdb_files_containing_usernames = manager_recon("set", array('GHDB_FILES_CONTAINING_USERNAMES', $module_ghdb_, $sid));
    $set_module_ghdb_footholds = manager_recon("set", array('GHDB_FOOTHOLDS', $module_ghdb_, $sid));
    $set_module_ghdb_network_or_vulnerability_data = manager_recon("set", array('GHDB_NETWORK_OR_VULNERABILITY_DATA', $module_ghdb_, $sid));
    $set_module_ghdb_pages_containing_login_portals = manager_recon("set", array('GHDB_PAGES_CONTAINING_LOGIN_PORTALS', $module_ghdb_, $sid));
    $set_module_ghdb_sensitive_directories = manager_recon("set", array('GHDB_SENSITIVE_DIRECTORIES', $module_ghdb_, $sid));
    $set_module_ghdb_sensitive_online_shopping_info = manager_recon("set", array('GHDB_SENSITIVE_ONLINE_SHOPPING_INFO', $module_ghdb_, $sid));
    $set_module_ghdb_various_online_devices = manager_recon("set", array('GHDB_VARIOUS_ONLINE_DEVICES', $module_ghdb_, $sid));
    $set_module_ghdb_vulnerable_files = manager_recon("set", array('GHDB_VULNERABLE_FILES', $module_ghdb_, $sid));
    $set_module_ghdb_vulnerable_servers = manager_recon("set", array('GHDB_VULNERABLE_SERVERS', $module_ghdb_, $sid));
    $set_module_ghdb_web_server_detection = manager_recon("set", array('GHDB_WEB_SERVER_DETECTION', $module_ghdb_, $sid));
    $set_module_source = manager_recon("set", array('SOURCE', $module_source, $sid));
    if(isset($_POST['module_option_dorks']) && strlen($_POST['module_option_dorks'])>0)
    {
        $module_dorks = urldecode($_POST['module_dorks']);
        $set_module_dorks = manager_recon("set", array('DORKS', $module_dorks, $sid));
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
        DORKS: <input type='text' name='module_option_dorks' value="" class='form-control'><br>
        GHDB_ADVISORIES_AND_VULNERABILITIES: <input type='text' name='module_option_ghdb_advisories_and_vulnerabilities' value="False" class='form-control'><br>
        GHDB_ERROR_MESSAGES: <input type='text' name='module_option_ghdb_error_messages' value="False" class='form-control'><br>
        GHDB_FILES_CONTAINING_JUICY_INFO: <input type='text' name='module_option_ghdb_files_containing_juciy_info' value="False" class='form-control'><br>
        GHDB_FILES_CONTAINING_PASSWORDS: <input type='text' name='module_option_ghdb_files_containing_passwords' value="False" class='form-control'><br>
        GHDB_FILES_CONTAINING_USERNAMES: <input type='text' name='module_option_ghdb_files_containing_usernames' value="False" class='form-control'><br>
        GHDB_FOOTHOLDS: <input type='text' name='module_option_ghdb_footholds' value="False" class='form-control'><br>
        GHDB_NETWORK_OR_VULNERABILITY_DATA: <input type='text' name='module_option_ghdb_network_or_vulnerability_data' value="False" class='form-control'><br>
        GHDB_PAGES_CONTAINING_LOGIN_PORTALS: <input type='text' name='module_option_ghdb_pages_containing_login_portals' value="False" class='form-control'><br>
        GHDB_SENSITIVE_DIRECTORIES: <input type='text' name='module_option_ghdb_sensitive_directories' value="False" class='form-control'><br>
        GHDB_SENSITIVE_ONLINE_SHOPPING_INFO: <input type='text' name='module_option_ghdb_sensitive_online_shopping_info' value="False" class='form-control'><br>
        GHDB_VARIOUS_ONLINE_DEVICES: <input type='text' name='module_option_ghdb_various_online_devices' value="False" class='form-control'><br>
        GHDB_VULNERABLE_FILES: <input type='text' name='module_option_ghdb_vulnerable_files' value="False" class='form-control'><br>
        GHDB_VULNERABLE_SERVERS: <input type='text' name='module_option_ghdb_vulnerable_servers' value="False" class='form-control'><br>
        GHDB_WEB_SERVER_DETECTION: <input type='text' name='module_option_ghdb_web_server_detection' value="False" class='form-control'><br>
        SOURCE: <input type='text' name='module_option_source' value="default" class='form-control'>
        <br>
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
        Description:<br>Searches for possible vulnerabilites in a domain by leveraging the Google Hacking Database (GHDB) and the 'site' search operator. Updates the 'vulnerabilities' table with the results.<br>
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
                    <td>DORKS</td>
                    <td></td>
                    <td>no</td>
                    <td>file containing an alternate list of Google dorks</td>
                </tr>
                <tr>
                    <td>GHDB_ADVISORIES_AND_VULNERABILITIES</td>
                    <td>False</td>
                    <td>yes</td>
                    <td>enable/disable the 1985 dorks in this category</td>
                </tr>
                <tr>
                    <td>GHDB_ERROR_MESSAGES</td>
                    <td>False</td>
                    <td>yes</td>
                    <td>enable/disable the 82 dorks in this category</td>
                </tr>
                <tr>
                    <td>GHDB_FILES_CONTAINING_JUICY_INFO</td>
                    <td>False</td>
                    <td>yes</td>
                    <td>enable/disable the 343 dorks in this category</td>
                </tr>
                <tr>
                    <td>GHDB_FILES_CONTAINING_PASSWORDS</td>
                    <td>False</td>
                    <td>yes</td>
                    <td>enable/disable the 189 dorks in this category</td>
                </tr>
                <tr>
                    <td>GHDB_FILES_CONTAINING_USERNAMES</td>
                    <td>False</td>
                    <td>yes</td>
                    <td>enable/disable the 17 dorks in this category</td>
                </tr>
                <tr>
                    <td>GHDB_FOOTHOLDS</td>
                    <td>False</td>
                    <td>yes</td>
                    <td>enable/disable the 34 dorks in this category</td>
                </tr>
                <tr>
                    <td>GHDB_NETWORK_OR_VULNERABILITY_DATA</td>
                    <td>False</td>
                    <td>yes</td>
                    <td>enable/disable the 63 dorks in this category</td>
                </tr>
                <tr>
                    <td>GHDB_PAGES_CONTAINING_LOGIN_PORTALS</td>
                    <td>False</td>
                    <td>yes</td>
                    <td>enable/disable the 313 dorks in this category</td>
                </tr>
                <tr>
                    <td>GHDB_SENSITIVE_DIRECTORIES</td>
                    <td>False</td>
                    <td>yes</td>
                    <td>enable/disable the 110 dorks in this category</td>
                </tr>
                <tr>
                    <td>GHDB_SENSITIVE_ONLINE_SHOPPING_INFO</td>
                    <td>False</td>
                    <td>yes</td>
                    <td>enable/disable the 10 dorks in this category</td>
                </tr>
                <tr>
                    <td>GHDB_VARIOUS_ONLINE_DEVICES</td>
                    <td>False</td>
                    <td>yes</td>
                    <td>enable/disable the 270 dorks in this category</td>
                </tr>
                <tr>
                    <td>GHDB_VULNERABLE_FILES</td>
                    <td>False</td>
                    <td>yes</td>
                    <td>enable/disable the 61 dorks in this category</td>
                </tr>
                <tr>
                    <td>GHDB_VULNERABLE_SERVERS</td>
                    <td>False</td>
                    <td>yes</td>
                    <td>enable/disable the 83 dorks in this category</td>
                </tr>
                <tr>
                    <td>GHDB_WEB_SERVER_DETECTION</td>
                    <td>False</td>
                    <td>yes</td>
                    <td>enable/disable the 74 dorks in this category</td>
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
        * Special thanks to the Offensive Security crew for maintaining the GHDB and making it available to open source projects like Recon-ng. Thanks Muts!<br>
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
