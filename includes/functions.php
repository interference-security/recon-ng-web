<?php
ini_set('default_socket_timeout',500);
function manager_recon($methodName, $data)
{
    global $recon_rpc_url;
    if($methodName=="init")
    {
        @session_start();
        if(isset($_SESSION['recon_sid']) && strlen($_SESSION['recon_sid'])>0)
        {
            return $_SESSION['recon_sid'];
        }
    }
    $request = xmlrpc_encode_request($methodName, $data);
    $context = stream_context_create(array('http' => array('method' => "POST", 'header' => "Content-Type: text/xml", 'content' => $request)));
    $file = file_get_contents($recon_rpc_url, false, $context);
    $response = xmlrpc_decode($file);
    if($methodName=="init")
    {
        @session_start();
        $_SESSION['recon_sid'] = $response;
    }
    return $response;
}
?>