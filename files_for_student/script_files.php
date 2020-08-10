
<?php 
require_once '../Config/config.php';
session_start();
$file_msg = array();
$student_nim = '';
$teacher_nim = '';
$book_title = '';
$file_description = '';
?>
<?php if(isset($_POST['insert_files'])){
        $student_nim = $_POST['student_nim'];
        $teacher_nim = $_POST['teacher_nim'];
        $book_title = $_POST['book_title'];
        $file_description = $_POST['file_description'];
    if(empty($_POST['student_nim'])){
        $file_msg ['student_nim']= "Enter Student ID";
    }else{
        $student_nim = input_validate($_POST['student_nim']);
    }
    if(empty($_POST['teacher_nim'])){
        $file_msg ['teacher_nim'] = "Enter Your ID";
    }else{
        $teacher_nim = input_validate($_POST['teacher_nim']);
    }
    if(empty($_POST['book_title'])){
        $file_msg['book_title'] = "What is the book title ? ";
    }else{
        $teacher_nim = input_validate($_POST['teacher_nim']);
    }
    if(empty($_POST['file_description'])){
        $file_msg['file_description'] = "Add Description ? ";
    }else{
        $teacher_nim = input_validate($_POST['teacher_nim']);
    }
    $file = $_FILES['file'];
    $filename = $_FILES['file']['name'];
    $filetmpname = $_FILES['file']['tmp_name'];
    $filesize = $_FILES['file']['size'];
    $fileerror = $_FILES['file']['error'];
    $filetype = $_FILES['file']['type'];
    $fileext = explode('.', $filename);
    // this peace of code will change the extention to lowercase
    $fileactualex = strtolower(end($fileext));
    $allow = array('jpg', 'jpeg', 'png', 'txt', 'pdf', 'doc', 'docx', 'xmls', 'java', 'gif', 'ex');
    // check if the file is allowed
    if(in_array($fileactualex, $allow)){
        if($fileerror === 0){
            if($_FILES['file']['size'] < 8388608){
                $fileDes = '../docs/';
                if(move_uploaded_file($filetmpname, $fileDes . $filename)){
                    $sql = "INSERT INTO files (nim,teacherid, file_title, file_description, file_attachment) VALUES('$student_nim', '$teacher_nim', '$book_title', '$file_description', '$filename' )";
                    if($con->query($sql)){
                        array_push($file_msg, 'File uploaded');
                    }else{
                        array_push($file_msg, 'File did not upload');
                    }
                }else{
                    array_push($file_msg, 'Upload failed');
                }
              
            }else{
                array_push($file_msg, "It's too large file. ");
            }
        }else{
            array_push($file_msg, 'There was an error during uploading the file.');
        }
    }else{
        array_push($file_msg, 'This file is not supporting  by system.');
    }
   
   
    }
    
    ?>

    <?php echo "<script>
    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
    </script>"; 
    ?>
  
<!-- 83789553791438 -->
<!-- 43632372818789 -->
<?php 
function input_validate($data){
    $data= trim($data);
    $data= stripcslashes($data);
    $data= htmlspecialchars($data);
    return $data;
}
?>


