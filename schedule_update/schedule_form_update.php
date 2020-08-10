<?php 
require_once '../Config/config.php';
if(isset($_POST['schedule_update_btn'])){
    $timetableid = mysqli_real_escape_string($con, $_POST['timetableid']);
    $studentid = mysqli_real_escape_string($con, $_POST['studentid']);
    $subjectid = mysqli_real_escape_string($con, $_POST['subjectid']);
    $teachersid = mysqli_real_escape_string($con, $_POST['teachersid']);
    $class_id = mysqli_real_escape_string($con, $_POST['class_id']);
    $days = mysqli_real_escape_string($con, $_POST['days']);
    $starttime = mysqli_real_escape_string($con, $_POST['starttime']);
    $endtime = mysqli_real_escape_string($con, $_POST['endtime']);

    $update = "UPDATE time_table set time_table_id = '$timetableid',
    NIM= '$studentid', subjectid='$subjectid', Teacher_ID='$teachersid',
    class_id = '$class_id', day_time= '$days', start_time='$starttime',
    end_time='$endtime' WHERE time_table_id = '$timetableid' ";
    if ($con->query($update) === TRUE) {
     
       header('location: ../dashboard/admin.php');
       die();
    } else {
echo $con->error;
        // header('location: ../dashboard/admin.php');
        
    }

    $con->close();
}

?>