
<?php require_once '../Config/config.php'; ?>
<?php session_start();?>
<?php 

if(!empty($_POST)){
    
    $class_grade_number_1 = $con->real_escape_string (trim($_POST['class_grade_number_1']));
    $class_code_number_2   = $con->real_escape_string (trim($_POST['class_code_number_2']));
    $class_name_number_3 = $con->real_escape_string (trim($_POST['class_name_number_3']));
    $days_class =$con->real_escape_string (trim($_POST['days_class']));
    $class_start_time = $con->real_escape_string (trim($_POST['class_start_time']));
    $class_end_time = $con->real_escape_string (trim($_POST['class_end_time']));
    $class_subject_id = $con->real_escape_string (trim($_POST['class_subject_id']));
    $class_teacher_id = $con->real_escape_string (trim($_POST['class_teacher_id']));
    $class_student_id = $con->real_escape_string (trim($_POST['class_student_id']));
    $query = "INSERT INTO classes(class_grade, class_code,class_name,days,start_time,end_time,subjectid, teacherid, nim) 
    VALUES('$class_grade_number_1','$class_code_number_2', '$class_name_number_3', '$days_class','$class_start_time','$class_end_time',
    '$class_subject_id', '$class_teacher_id', '$class_student_id')";
    if(!$con->query($query)){
        echo "<script>alert('successfull');</script>";
        echo mysqli_error($con);
    }
    $con -> close();
}