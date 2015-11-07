<?php
session_start();
//$recon_rpc_url = 'http://10.0.0.9:4141/';
$recon_rpc_url = '';
if(isset($_SESSION['recon_rpc_url']) && strlen($_SESSION['recon_rpc_url'])>0)
{
    $recon_rpc_url = $_SESSION['recon_rpc_url'];
}
else
{
    die('<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> Recon-ng RPC URL has not been set. Please set the RPC URL from "RPC Settings" page</div>');
}
?>