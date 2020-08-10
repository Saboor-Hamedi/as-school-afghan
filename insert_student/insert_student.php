<?php

// insert studeent
require_once '../Config/config.php';
session_start();
if(!empty($_POST)){
    $output ='';
    $nim = mysqli_real_escape_string($con, trim($_POST['nim']));
    $name = mysqli_real_escape_string($con, trim($_POST['name']));
    $lname = mysqli_real_escape_string($con, trim($_POST['lname']));
    $address = mysqli_real_escape_string($con, trim($_POST['address']));
    $email_student = mysqli_real_escape_string($con, trim($_POST['email_student']));
    $age = mysqli_real_escape_string($con, trim($_POST['age']));
    $country_student = mysqli_real_escape_string($con, trim($_POST['country_student']));
    $student_password = mysqli_real_escape_string($con, trim($_POST['student_password']));
    // $student_password=  password_hash($_POST['student_password'], PASSWORD_BCRYPT );
    $sql = "INSERT INTO student(nim, name, lastname,address,email,age, country, password) 
    VALUES('$nim', '$name', '$lname',
    '$address', '$email_student', '$age', '$country_student','$student_password')";
    if(mysqli_query($con,$sql)){
        header('location: ../dashboard/admin.php');
    }else{
        echo 'Error: '.$con->error;
    }
        
        

}
