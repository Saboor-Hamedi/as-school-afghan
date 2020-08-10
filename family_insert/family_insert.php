<?php

require '../Config/config.php';
session_start();
if(!empty($_POST)){
    header('location: ../family_insert/family_insert.php');
    echo 'Hello';
    $familyid = mysqli_real_escape_string($con, $_POST['familyid']);
    $familyname = mysqli_real_escape_string($con, $_POST['familyname']);
    $familyjob = mysqli_real_escape_string($con, $_POST['familyjob']);
    $familyincome = mysqli_real_escape_string($con, $_POST['familyincome']);
    $query = "INSERT INTO family (nim, familyname,  familyjob, familyincome )
    VALUES('$familyid', '$familyname', '$familyjob', '$familyincome')";
    if(mysqli_query($con, $query)){
        

    }else{
      
     echo "Error: ". $con->error;

    }

}