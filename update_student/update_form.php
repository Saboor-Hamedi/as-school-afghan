<?php
require '../Config/config.php';


        if(isset($_POST['student_update_btn'])){
            $id = $_POST['updateidnim'];
            $updatenim = $_POST['updatenim'];
            $updatename = $_POST['updatename'];
            $updatelname = $_POST['updatelname'];
            $updateaddress = $_POST['updateaddress'];
            $updateemail = $_POST['updateemail'];
            $updateage = $_POST['updateage'];
            $updatecountrystudent = $_POST['updatecountrystudent'];
            $updatepassword = $_POST['updatepassword'];
            $sql = "UPDATE student SET nim = '$updatenim', name = '$updatename', lastname = '$updatelname',
            address='$updateaddress',email='$updateemail',age='$updateage',
            country='$updatecountrystudent',  password='$updatepassword' WHERE id='$id'";
            if ($con->query($sql) === TRUE) {
               header('location: ../dashboard/admin.php');
            } else {
                
                echo "Gagal Melakukan Perubahan: " . $con->error;
            }

            $con->close();
        }





