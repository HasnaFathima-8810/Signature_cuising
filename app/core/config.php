<?php

//database name
define('DB_NAME', "Signature");
define('DB_HOST', "Localhost");
define('DB_USER', "root");
define('DB_PASS', "");
define('DB_TYPE', "mysql");

define('BASE_URL', "/Signature_cuising");


ini_set('date.timezone','Asia/Colombo');
date_default_timezone_set('Asia/Colombo');


define('DEBUG', true);
if(DEBUG){
    ini_set('display_errors', 1);
}else{
    ini_set('display_errors', 0);
}