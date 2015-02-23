<?php
# db_admin_getPending.php
# php file to retrieve pending requests
require_once __DIR__ .'/db_connect.php';
$db=new DB_CONNECT();

$response=$db->retrieve_requested();
echo $response;
?>