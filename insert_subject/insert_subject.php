

<?php require_once '../Config/config.php';?>
<?php session_start();?>
<?php 

if(!empty($_POST)){
    $select_subject_all = $con->real_escape_string (trim($_POST['select_subject_all']));
    $all_subjectname = $con->real_escape_string (trim($_POST['all_subjectname']));
    $all_subject_id = $con->real_escape_string (trim($_POST['all_subject_id']));
    $sql = "INSERT INTO subjects (subjectid,subjectname,subjectcode) 
    VALUES(' $select_subject_all','$all_subjectname', '$all_subject_id')";
    if(!$con->query($sql)){
    }
    $con -> close();
}

