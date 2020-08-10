<?php
include ('../db_define/defines.php');
$con =  mysqli_connect (DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(is_resource($con)){
    $hasDB = false;
    die('Connot access to the server');
    
}else{
    $hasDB = true;

}
