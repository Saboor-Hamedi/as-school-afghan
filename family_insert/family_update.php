
<?php 

require_once '../Config/config.php';
session_start();
if(isset($_POST['family_update_btn'])){
    $family_id_auto = mysqli_real_escape_string($con, $_POST['family_id_auto']);
    $familyfatherid = mysqli_real_escape_string($con, $_POST['familyfatherid']);
    // $familystudentid = mysqli_real_escape_string($con, $_POST['familystudentid']);
    $familyfathername = mysqli_real_escape_string($con, $_POST['familyfathername']);
    $familyfatherjob = mysqli_real_escape_string($con, $_POST['familyfatherjob']);
    $update = "UPDATE `family` SET `family_id`= '$familyfatherid',`family_name`='$familyfathername', family_job ='$familyfatherjob' 
    WHERE `family_id_auto`= '$family_id_auto'";
    if ($con->query($update) === TRUE) {
       header('location: ../dashboard/admin.php');
       die();
    } else {
      
        header('location: ../dashboard/admin.php');
    }

    $con->close();

}
