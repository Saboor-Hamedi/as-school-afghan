        <?php
        require '../Config/config.php';
        if(!empty($_POST)){
        $number_grade =  mysqli_real_escape_string($con, $_POST['number_grade']);
        // $select_grade_number = mysqli_real_escape_string($con,$_POST['select_grade_number']);
        $grade_student_id = mysqli_real_escape_string($con, $_POST['grade_student_id']);
        $grade_teacher_id = mysqli_real_escape_string($con, $_POST['grade_teacher_id']);
        $grade_subject = mysqli_real_escape_string($con, $_POST['select_grade_subjects']);
        $class_grade = mysqli_real_escape_string($con, $_POST['select_grade_student']);
            $sql = "INSERT INTO grades(grade_number, nim, teacherid, subjectid,class_grade_id) 
            VALUES('$number_grade', '$grade_student_id',
            '$grade_teacher_id',$grade_subject, '$class_grade')";
            if(mysqli_query($con,$sql)){
               
            }else{
            echo 'Error: '.$con->error;
        }
        
    }
