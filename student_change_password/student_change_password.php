<?php  require_once '../Config/config.php';?>
<!-- <?php  session_start();?> -->
<?php
  $password_error = "";
  $id = $_SESSION['admin_nim'];
  if(!empty($_POST)){
    $old_student_password = mysqli_real_escape_string($con, $_POST['old_student_password']);
    $new_student_password = mysqli_real_escape_string($con, $_POST['new_student_password']);
    $new_student_conpassword =mysqli_real_escape_string($con, $_POST['new_student_conpassword']);
    $sql = "SELECT * FROM student WHERE nim = '$id' AND password = '$old_student_password'";
    $db_check = $con->query($sql);
    $count = mysqli_num_rows($db_check);
   if(mysqli_fetch_array($db_check)){
    if($count == 1){
    $fetch_db=$con->query("UPDATE student set password = '$new_student_conpassword' WHERE nim = '$id'");
    }

        
    
}
 
  
   
  }
 
?>