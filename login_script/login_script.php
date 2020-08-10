<?php require_once('../Config/config.php');?>
<?php
session_start();
error_reporting(E_ALL); // check all type of errors
$admin_nim    = '';
$admin_pass   = '';
$user_message = "";
$Error        = array();

if (isset($_POST['submit'])) {
    $admin_nim  = mysqli_real_escape_string($con, trim($_POST['admin_nim']));
    $admin_pass = mysqli_real_escape_string($con, trim($_POST['admin_pass']));
}
if (!empty($_POST['admin_nim']) && !empty($_POST['admin_pass'])) {
    $admin        = "SELECT * FROM login WHERE admin_nim = '$admin_nim'  limit 1";
    $admin_result = mysqli_query($con, $admin);
    $row          = mysqli_num_rows($admin_result);
    $fetch        = mysqli_fetch_array($admin_result);
    if ($row === 1) {
        $user_password = $fetch['admin_pass'];
        $checkHash     = password_verify($admin_pass, $user_password);
        if (!$checkHash) {
            $user_message = 'Please check your ID <br> <strong>Or</strong> Password...';
        } elseif ($checkHash === true) {
            if ($fetch['admin_level'] == 'admin') {
                $_SESSION['admin_nim']  = $fetch['admin_nim'];
                $_SESSION['admin_pass'] = $fetch['admin_pass'];
              
                header('location: ../dashboard/admin.php');
                die();
            }
        }
    } elseif ($row === 1) {
        throw new Exception('Multiple user entry...');
    } else {
        $student        = "SELECT * FROM student WHERE nim = '$admin_nim' AND password = '$admin_pass' limit 1";
        $student_result = mysqli_query($con, $student);
        $student_row    = mysqli_num_rows($student_result);
        $student_fetch  = mysqli_fetch_array($student_result);
        if ($student_row == 0) {
            $user_message = 'Please check your ID <br> <strong>Or</strong> Password...';
        } elseif ($student_row === 1) {
            if ($student_fetch['student_level'] === 'student') {
                $_SESSION['admin_nim']  = $student_fetch['nim'];
                $_SESSION['admin_pass'] = $student_fetch['password'];
                header('location: ../student_account/student_account.php');
                exit();
            }
        }
        if ($row === 1) {
        } else {
            $student        = "SELECT * FROM teacher WHERE teacherid = '$admin_nim' AND pass = '$admin_pass' limit 1";
            $student_result = mysqli_query($con, $student);
            $student_row    = mysqli_num_rows($student_result);
            $student_fetch  = mysqli_fetch_array($student_result);
            if ($student_row == 0) {
                $user_message = 'Please check your ID <br> <strong>Or</strong> Password...';
            } elseif ($student_row === 1) {
                $_SESSION['admin_nim']  = $student_fetch['teacherid'];
                $_SESSION['admin_pass'] = $student_fetch['pass'];
                header('location: ../teacher_account/teacher_account.php');
                exit();
                
            }
            
       }
    }
}