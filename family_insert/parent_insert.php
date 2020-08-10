<?php
// insert studeent
require '../Config/config.php';
session_start();
    if(!empty($_POST)){
        $parentnim =(int) mysqli_real_escape_string($con, $_POST['parentnim']);
        $parentid = (int) mysqli_real_escape_string($con, $_POST['parent_insert_id']);
        $query = "INSERT INTO parent(nim, family_id )
        VALUES('$parentnim', '$parentid')";
        if(mysqli_query($con, $query)){
        }else{
            echo "Error: ". $con->error;
    }      
  
}