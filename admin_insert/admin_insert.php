<?php
require_once '../Config/config.php';
session_start();
if(!empty($_POST)){
    $admin_nim = mysqli_real_escape_string($con, trim($_POST['admin_nim']));
    $admin_name = mysqli_real_escape_string($con, trim($_POST['admin_name']));
    $admin_email = mysqli_real_escape_string($con, trim($_POST['admin_email']));
    $admin_pass = mysqli_real_escape_string($con, trim($_POST['admin_pass']));
    $admin_pass = password_hash($_POST['admin_pass'], PASSWORD_BCRYPT );
    $admin_conpass = mysqli_real_escape_string($con, trim($_POST['admin_conpass']));
     $profileimage = time() . '_' .$_FILES['file']['name'];
     $target = "../upload/" .$profileimage;
     if(move_uploaded_file($_FILES['file']['tmp_name'], $target)){
     $sql = $con ->prepare("INSERT INTO login(admin_nim, admin_name, admin_email, admin_pass, admin_conpass, admin_image)
         values(?,?,?,?,?,?)");
         $sql ->bind_param("ssssss", $admin_nim, $admin_name, $admin_email, $admin_pass, $admin_conpass, $profileimage);
     if($sql ->execute()){
          echo 'Data inserted';
     }else{
          echo json_encode($sql);
     }
     }else{
         echo 'Data and image not uploaded';
     }
    
}

