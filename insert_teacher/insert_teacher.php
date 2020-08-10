<?php
require '../Config/config.php';
if(!empty($_POST)){
 $teacher_add_nim = mysqli_real_escape_string($con, $_POST['teacher_add_nim']);
 $teacher_add_name = mysqli_real_escape_string($con,$_POST['teacher_add_name']);
 $teacher_add_lname = mysqli_real_escape_string($con, $_POST['teacher_add_lname']);
 $teacher_add_address = mysqli_real_escape_string($con, $_POST['teacher_add_address']);
 $teacher_add_email = mysqli_real_escape_string($con, $_POST['teacher_add_email']);
 $teacher_add_profession = mysqli_real_escape_string($con, $_POST['teacher_add_profession']);
 $teacher_add_pass = mysqli_real_escape_string($con, $_POST['teacher_add_pass']);
    $sql = "INSERT INTO teacher(teacherid,tname, lastname,address,country,profession,pass) 
    VALUES('$teacher_add_nim', '$teacher_add_name', '$teacher_add_lname',
     '$teacher_add_address', '$teacher_add_email', '$teacher_add_profession', '$teacher_add_pass')";
     if(mysqli_query($con,$sql)){
        header('location: ../dashboard/admin.php');
     }else{
         echo 'Error: '.$con->error;
     }
    
}
