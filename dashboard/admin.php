<?php session_start();?>
<?php require_once '../Config/config.php'; ?>
<?php  
if (!isset($_SESSION['admin_nim'])) {
   header('location:../Login/Login.php');
   
}
?>
<!-- Get the ID of login -->
<?php $id;?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.css" />
    <link rel="stylesheet" href="../fontawesome/fontawesome-free-5.11.2-web/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="../Style/admin.css">
</head>
<body>
    <nav id="header">
        <header>
            <!-- This is your ID which you login with  -->
            <button type="button" class="btn btn-danger btn-sm " onclick="show_side()">x</button>
            <?php  $id =  $_SESSION['admin_nim'];?>           
            <button class="btn btn-danger btn-sm">
                <a href="../logout/logout.php" id="exit">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </button>
        </header>
    </nav>
    <!-- this is side bar ection-side_bar -->
    <div class="section_side_bar" id="side_bar">
        <div class="content">
            <ul>
                <li><a href="javascript:void(0)" onclick="newTab()">Settings</a></li>
            </ul>
            <ul>
                <li onclick="users();"><a href="javascript:avoid(0)">User</a></li>
                <script>
                function users() {
                    window.open('../Users/users.php');
                }
                </script>
            </ul>
            <ul>
            </ul>

        </div>
    </div>
    <!-- this seperate header from main -->
    <div class="clear_both"></div>
    <!-- main part -->
    <main id="main">
        <!-- first section for tables -->
        <section class="section_tables">
            <!-- admin table -->
            <div class="contentes">
                <!-- panel one -->
                <div class="panel panel-default">
                    <div data-toggle="collapse" data-target="#panel1" class="panel-heading collapsed">
                        <h4 class="panel-title">
                            <i class="fas fa-user"> Users </i>
                        </h4>
                    </div>
                    <div id="panel1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <!-- table start -->
                            <table class="table table-bordered table-dark">
                                <thead>
                                    <tr>
                                        <th>Admin ID </th>
                                        <th>Admin nam </th>
                                        <th>Admin email </th>
                                    </tr>
                                <tbody>
                                    <?php
						$sql = "SELECT * FROM login ";
						$query = mysqli_query($con, $sql);
						while ($LoginResult = mysqli_fetch_array($query))
						{?>
                                    <tr>
                                        <td>
                                            <?php echo $LoginResult['admin_nim']; ?>
                                        </td>
                                        <td>
                                            <?php echo ucfirst($LoginResult['admin_name']); ?>
                                        </td>
                                        <td>
                                            <?php echo $LoginResult['admin_email']; ?>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                                </thead>
                            </table>
                            <!-- table end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- student table -->
            <div class="contentes">
                <div class="panel panel-default">
                    <div data-toggle="collapse" data-target="#panel2" class="panel-heading collapsed">
                        <h4 class="panel-title">
                            <i class="fas fa-user-graduate"> Students </i>
                        </h4>
                    </div>
                    <div id="panel2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <!-- start panel -->
                            <table class="table table-bordered table-dark" id="tblData">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID </th>
                                        <th>Name </th>
                                        <th>Last Name </th>
                                        <th>Address </th>
                                        <th>Email </th>
                                        <th>Age </th>
                                        <th>Country </th>
                                        <th style="width: 20px"> insert </th>
                                        <th style="width: 20px"> edit </th>
                                        <th style="width: 20px"> delete </th>
                                        <th style="width: 15px"> view </th>
                                        <th style="width: 15px"> export </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                $sql = "SELECT * FROM student";
                                $query = mysqli_query($con, $sql);
                                while ($result1 = mysqli_fetch_array($query))
                            {?>
                                    <tr>
                                        <td>
                                            <?php echo  $result1['id']; ?>
                                        </td>
                                        <td>
                                            <a href="../select_data/student.php?nim_load=
									<?php echo $result1["nim"];?>" class="load_student" target='_blank'>
                                                <?php echo $result1["nim"];   ;?>
                                            </a>
                                        </td>
                                        <td>
                                            <?php echo ucfirst($result1['name']); ?>
                                        </td>
                                        <td>
                                            <?php echo $result1['lastname']; ?>
                                        </td>
                                        <td>
                                            <?php echo $result1['address']; ?>
                                        </td>
                                        <td>
                                            <?php echo $result1['email']; ?>
                                        </td>
                                        <td>
                                            <?php echo $result1['age']; ?>
                                        </td>
                                        <td>
                                            <?php echo $result1['country']; ?>
                                        </td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#add_data_Modal"
                                                class="btn btn-primary btn-xs">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-xs updateBtn" id="
																	<?php echo $result1['id']?>" data-toggle="modal" data-target="#updateModal">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <button class='delete_student btn btn-danger btn-xs' id='del_
																	<?php echo $result1['id']; ?>'>
                                                <i class="fas fa-user-times"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <button id="
																	<?php echo $result1['id'];?>" class="btn btn-primary btn-xs edit_data_student">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- start teacher table -->
            <div class="contents">
                <div class="panel panel-default">
                    <div data-toggle="collapse" data-target="#panel3" class="panel-heading collapsed">
                        <h4 class="panel-title">
                            <i class="fas fa-user-tie"> Teachers </i>
                        </h4>
                    </div>
                    <div id="panel3" class="panel-collapse collapse">
                        <div class="panel-body">
                            <!-- start table  -->
                            <table class="table table-bordered table-dark">
                                <thead>
                                    <tr>
                                        <th>No </th>
                                        <th>ID </th>
                                        <th>Name</th>
                                        <th>Last Name</th>
                                        <th>Address</th>
                                        <th>Country</th>
                                        <th>Profession</th>
                                        <th style="width: 20px"> edit </th>
                                        <th style="width: 20px"> delete </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                $sql = "SELECT * FROM teacher ";
                                $query = mysqli_query($con, $sql);
                                while ($TeacherResult = mysqli_fetch_array($query))
                                    {?>
                                    <tr>
                                        <td>
                                            <?php echo $teacherid = $TeacherResult['tec_id']; ?>
                                        </td>
                                        <td>
                                            <a href="../teacher_account/teacher.php?load_teacher=
																	<?php echo $TeacherResult["teacherid"];?>" class="load_teacher" target='_blank'>
                                                <?php echo $TeacherResult["teacherid"];   ;?>
                                            </a>
                                        </td>
                                        <td>
                                            <?php echo ucfirst($TeacherResult['tname']); ?>
                                        </td>
                                        <td>
                                            <?php echo $TeacherResult['lastname']; ?>
                                        </td>
                                        <td>
                                            <?php echo $TeacherResult['address']; ?>
                                        </td>
                                        <td>
                                            <?php echo $TeacherResult['country']; ?>
                                        </td>
                                        <td>
                                            <?php echo $TeacherResult['profession']; ?>
                                        </td>
                                        <!-- this is edit button -->
                                        <td>
                                            <button id="
																	<?php echo $TeacherResult['tec_id'];?>" class="btn btn-primary btn-xs teacher-btn" data-toggle="modal"
                                                data-target="#teachermodal">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <button class='delete_teacher btn btn-danger btn-xs' id='del_
																	<?php echo $TeacherResult['tec_id']; ?>'>
                                                <i class="fas fa-user-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- End of delete button -->
                                    <?php }?>
                                </tbody>
                            </table>
                            <!-- end table -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- start time table  -->
            <div class="contents">
                <div class="panel panel-default">
                    <div data-toggle="collapse" data-target="#panel4" class="panel-heading collapsed">
                        <h4 class="panel-title">
                            <i class="fas fa-calendar-alt"> Schedules </i>
                        </h4>
                    </div>
                    <div id="panel4" class="panel-collapse collapse">
                        <div class="panel-body">
                            <!-- start table -->
                            <table class="table table-bordered table-dark">
                                <thead>
                                    <tr>
                                        <th>No </th>
                                        <th>Subject Code</th>
                                        <th>Grade</th>
                                        <th>Day</th>
                                        <th>Start Time </th>
                                        <th>End Time </th>
                                        <th style="width: 20px"> edit </th>
                                        <th style="width: 20px"> delete </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                $sql = " SELECT  *   FROM time_table  ";
                                $query = mysqli_query($con, $sql);
                                while ($timetable = mysqli_fetch_array($query))
                                    {?>
                                    <tr>
                                        <td>
                                            <?php echo $timetable['time_table_id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $timetable['subjectid']; ?>
                                        </td>
                                        <td>
                                            <?php echo $timetable['class_grade']; ?>
                                        </td>
                                        <td>
                                            <?php echo $timetable['day_time']; ?>
                                        </td>
                                        <td>
                                            <?php echo $timetable['start_time']; ?>
                                        </td>
                                        <td>
                                            <?php echo $timetable['end_time']; ?>
                                        </td>
                                        <!-- this is edit button -->
                                        <td>
                                            <button class="btn btn-primary btn-xs schedule-btn" id="
																	<?php echo $timetable['time_table_id']?>" data-toggle="modal" data-target="#schedulemodal">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                        <!-- end of edit button -->
                                        <!-- this is delete button -->
                                        <td>
                                            <button class='delete_time_table btn btn-danger btn-xs' id='taime_del
																	<?php echo $timetable['time_table_id']; ?>'>
                                                <i class="fas fa-user-times"></i>
                                            </button>
                                        </td>
                                        <!-- End of delete button -->
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- end table -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- start family -->
            <div class="contents">
                <div class="panel panel-default">
                    <div data-toggle="collapse" data-target="#panel5" class="panel-heading collapsed">
                        <h4 class="panel-title">
                            <i class="fas fa-database"> Family data </i>
                        </h4>
                    </div>
                    <div id="panel5" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table table-bordered table-dark">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Family ID </th>
                                        <th>Family Name</th>
                                        <th>Family Job</th>
                                        <th style="width: 20px"> delete </th>
                                        <!-- <th style="width: 20px"> edit </th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                        $sql = "SELECT * FROM family";
                        $query = mysqli_query($con, $sql);
                        while ($timetable = mysqli_fetch_array($query))
                    {?>
                                    <tr>
                                        <td>
                                            <?php echo $timetable['family_id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $timetable['familyname']; ?>
                                        </td>
                                        <td>
                                            <?php echo $timetable['familyjob']; ?>
                                        </td>
                                        <td>
                                            <?php echo $timetable['familyincome']; ?>
                                        </td>
                                        <!-- this is edit button -->
                                        <td>
                                            <button class="btn btn-primary btn-xs family-btn" id="
																	<?php echo $timetable['family_id']?>" data-toggle="modal" data-target="#familymodal">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- end table -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- start parent -->
            <div class="contents">
                <div class="panel panel-default">
                    <div data-toggle="collapse" data-target="#panel6" class="panel-heading collapsed">
                        <h4 class="panel-title">
                            <i class="fas fa-database"> Parents data </i>
                        </h4>
                    </div>
                    <div id="panel6" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table table-bordered table-dark">
                                <thead></thead>
                                <tr>
                                    <th>No</th>
                                    <th>Student ID </th>
                                    <th>Family ID </th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                        $sql = "SELECT * FROM parent";
                        $query = mysqli_query($con, $sql);
                        while ($parentreuslt = mysqli_fetch_array($query))
					  {?>
                                    <tr>
                                        <td>
                                            <?php echo $parentreuslt['parent_id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $parentreuslt['nim']; ?>
                                        </td>
                                        <td>
                                            <?php echo $parentreuslt['family_id']; ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- start subjects -->
            <div class="contents">
                <div class="panel panel-default">
                    <div data-toggle="collapse" data-target="#panel7" class="panel-heading collapsed">
                        <h4 class="panel-title">
                            <i class="fa fa-book"> Subjects </i>
                        </h4>
                    </div>
                    <div id="panel7" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table table-bordered table-dark">
                                <thead></thead>
                                <tr>
                                    <th>Subject ID </th>
                                    <th>Subject Name </th>
                                    <th>Subject Code </th>
                                    <th style="width: 15px">Insert</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                        $sql = "SELECT * FROM subjects";
                        $query = mysqli_query($con, $sql);
                        while ($subjectresult = mysqli_fetch_array($query))
                    {?>
                                    <tr>
                                        <td>
                                            <?php echo $subjectresult['subjectid']; ?>
                                        </td>
                                        <td>
                                            <?php echo $subjectresult['subjectname']; ?>
                                        </td>
                                        <td>
                                            <?php echo $subjectresult['subjectcode']; ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs " data-toggle="modal"
                                                data-target="#subjectmodal">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- start classes -->
            <div class="contents">
                <div class="panel panel-default">
                    <div data-toggle="collapse" data-target="#panel8" class="panel-heading collapsed">
                        <h4 class="panel-title">
                            <i class="fa fa-book"> All Classes</i>
                        </h4>
                    </div>
                    <div id="panel8" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table table-bordered table-dark">
                                <thead></thead>
                                <tr>
                                    <th>No</th>
                                    <th>Class grade </th>
                                    <th>Class code </th>
                                    <th>Class name</th>
                                    <th>Days</th>
                                    <th>start time</th>
                                    <th>End time </th>
                                    <th>Subject ID</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                        $sql = "SELECT * FROM classes ORDER BY id";
                        $query = mysqli_query($con, $sql);
                        while ($subjectresult = mysqli_fetch_array($query))
                    {?>
                                    <tr>
                                        <td>
                                            <?php echo $subjectresult['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $subjectresult['class_grade']; ?>
                                        </td>
                                        <td>
                                            <?php echo $subjectresult['class_code']; ?>
                                        </td>
                                        <td>
                                            <?php echo $subjectresult['class_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $subjectresult['days']; ?>
                                        </td>
                                        <td>
                                            <?php echo $subjectresult['start_time']; ?>
                                        </td>
                                        <td>
                                            <?php echo $subjectresult['end_time']; ?>
                                        </td>
                                        <td>
                                            <?php echo $subjectresult['subjectid']; ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- second section for showing profile -->
        <section class="admin_profile">
            <div class="admin_image">
                <?php $sqlimage = "SELECT * FROM login where `admin_nim` = '$id'  limit 1";?>
                <?php $imageresult1 = mysqli_query($con,$sqlimage); ?>
                <?php while($rows = mysqli_fetch_assoc($imageresult1)){ ?>
                <span>
                    <img src="../upload/
								<?php echo $rows['admin_image'];?>" width="250px" alt="">
                </span>
                <?php }?>
                <nav class="admin_details">
                    <?php $admin_nim = "SELECT * FROM login WHERE admin_nim = '$id' LIMIT 1";?>
                    <?php $admin_query = mysqli_query($con, $admin_nim);?>
                    <?php $check_admin_exists = mysqli_num_rows($admin_query);?>
                    <?php if($check_admin_exists == 0){ ?>
                    <?php echo 'NO ADMIN AVAILABLE'; ?>
                    <?php }?>
                </nav>
                <?php while($amdin_found = mysqli_fetch_array($admin_query)){?>
                <nav class="admin_card_body">
                    <h4 class="admin_name">
                        <?php echo $amdin_found['admin_name'];?>
                    </h4>
                    <h4 class="admin_name">
                        <?php echo $amdin_found['admin_nim'];?>
                    </h4>
                    <h4 class="admin_name admin_email">
                        <?php echo $amdin_found['admin_email'];?>
                    </h4>
                </nav>
                <?php }?>
            </div>
        </section>
    </main>
</body>

</html>
<!-- this is footer -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="../query_ajax/query_ajax.js"></script>
<script src="../query_ajax/data_query_ajax.js"></script>
<?php include ('../update_student/update_student.php'); ?>
<?php include ('../add_modal/view_modal_student.php'); ?>
<?php include ('../modals/modals.php'); ?>

<?php 
echo "<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
";?>



<script>

</script>