<?php
    // require_once '../Config/config.php';
    // session_start();
   
    //     if(!empty($_POST)){
    //     $schedule_student_id =(int) $_POST['schedule_student_id'] ;
    //     $choose_subject = (int)   $_POST['choose_subject'];
    //     $choose_teacher = (int)  $_POST['choose_teacher'];
    //     $class_id = $_POST['class_id'];
    //     $choose_day =  $_POST['choose_day'];
    //     $start_time =   $_POST['start_time'];
    //     $end_time =  $_POST['end_time'];
    //     $sql = ("INSERT INTO time_table(nim, subjectid, teacherid, class_grade, day_time, start_time, end_time)
    //     VALUES (?,?,?,?,?,?,?)") or die(mysqli_errno($con));
    //     $stmt = $con->prepare($sql);
    //     $stmt->bind_param('sssssss',$schedule_student_id, $choose_subject, $choose_teacher,
    //     $class_id, $choose_day, $start_time, $end_time);
    //     if($stmt->execute()){
    //         $super = $con->insert_id;
    //         $_SESSION['schedule_student_id'] =$schedule_student_id;
    //         $_SESSION['choose_subject'] =$choose_subject;
    //         $_SESSION['choose_teacher'] =$choose_teacher;
    //         $_SESSION['class_id'] =$class_id;
    //         $_SESSION['choose_day'] =$choose_day;
    //         $_SESSION['start_time'] =$start_time;
    //         $_SESSION['end_time'] =$end_time;
    //         header('location: ../time_table/insert_schedule.php');
    //     }else{
    //         echo $con->error;
    //         echo json_decode($con);
    //     }  
        
    // }


   