<?php session_start(); ?>
<?php require_once '../Config/config.php'; ?>
<?php if (!isset($_SESSION['admin_nim'])) { ?>
<?php  header('location: ../Login/Login.php'); ?>
<?php } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher account</title>
    <link rel="stylesheet" href="../fontawesome/fontawesome-free-5.11.2-web/css/all.min.css">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../Style/admin.css">
</head>
<body>
<nav id="header">
        <header>
            <!-- This is your ID which you login with  -->
            <button class="btn btn-primary btn-danger ">
                <?php echo $id =  $_SESSION['admin_nim'];?>
            </button>
            <button class="btn btn-danger btn-sm">
                <a href="../logout/logout.php" id="exit">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </button>
        </header>
    </nav>
    <!-- this seperate header from main -->
    <div class="clear_both"></div>
    <!-- main part -->
    <main id="main">
        <!-- first section for tables -->
        <section class="section_tables">
            <!-- =========accordion 1 =========== -->
            <div class="panel panel-default ">
                <div data-toggle="collapse" data-target="#panel1" class="panel-heading collapsed">
                    <h4 class="panel-title">
                        <i class="fas fa-user-graduate"> Teacher </i>
                    </h4>
                </div>
                <div id="panel1" class="panel-collapse collapse">
                    <div class="panel-body">
                        <table class="table table-bordered table-dark">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Last name</th>
                                    <th>Address</th>
                                    <th>Country</th>
                                    <th>Professions</th>
                                </tr>
                            </thead> <?php

            $sql = "SELECT * FROM teacher WHERE teacher.teacherid = $id";
                $query = mysqli_query($con, $sql);
                while ($result = mysqli_fetch_array($query)) {?> <tbody>
                                <tr>
                                    <td><?php echo $result['tec_id']; ?></td>
                                    <td><?php echo $result['teacherid'] ?></td>
                                    <td><?php echo $result['tname'];?></td>
                                    <td><?php echo $result['lastname'];?></td>
                                    <td><?php echo $result['address'];?></td>
                                    <td><?php echo $result['country'];?></td>
                                    <td><?php echo $result['profession'];?></td>
                                </tr>
                            </tbody>
                            <?php }?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- =========accordion 2 =========== -->
            <div class="panel panel-default">
                <div data-toggle="collapse" data-target="#panel2" class="panel-heading collapsed">
                    <h4 class="panel-title">
                        <i class="fas fa-calendar-alt"> Classes </i>
                    </h4>
                </div>
                <div id="panel2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?php $teacher_counter = 0;?>
                        <?php $years =  null;?>
                        <?php $teacher_sql = "SELECT * FROM teacher
                     INNER JOIN classes ON teacher.teacherid= classes.teacherid
					 INNER JOIN years ON classes.start_time = years.year_name
					 INNER JOIN subjects ON classes.subjectid=subjects.subjectid
                     WHERE teacher.teacherid = '$id' ORDER BY year_name 
					";?>
                        <?php $teacher_query = mysqli_query($con, $teacher_sql);?>
                        <?php $teacher_row_count = mysqli_num_rows($teacher_query);?>
                        <?php if($teacher_row_count == 0){
						echo "No class registrate yet";
					} ?>

                        <?php while($teacher_found = mysqli_fetch_array($teacher_query)){?>
                        <?php if($years !=($teacher_found['year_name'] . ' Years ' . $teacher_found['start_time'])){?>
                        <table class="table table-bordered table-dark">
                            <thead>
                                <tr>
                                    <?php $years = $teacher_found['year_name'] . ' Years ' . $teacher_found['start_time'];?>
                                    <th>Class grade</th>
                                    <th>Class code</th>
                                    <th>Years</th>
                                    <th>Subjects</th>
                                </tr>
                                <div class="grades">
                                    <ul>
                                        <span>
                                            <a href="javascript:void(0)">
                                            <?php echo $teacher_found  ['class_grade'];?>
                                            </a>
                                        </span>
                                        <span> 
                                        <a href="javascript:void(0)"><?php echo $teacher_found  ['start_time'];?>
                                     </a>
                                    </span>
                                    </ul>
                                    
                                </div>
                            </thead>
                            <?php }?>
                            <tbody>
                                <tr>
                                    <td><?php echo $teacher_found ['class_grade'];?></td>
                                    <td><?php echo $teacher_found ['class_code'];?></td>
                                    <td><?php echo $teacher_found ['start_time'];?></td>
                                    <td><?php echo $teacher_found ['subjectname'];?></td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <section class="admin_profile">
            <div class="admin_image">
                <div class="btn btn-primary" data-toggle="modal" data-target="#gradeModal">Add grade</div>
                <a href="../files_for_student/files_for_student.php" target="_blank">
                <button class="btn btn-primary ">File</button>
            </a>
            </div>
        </section>
        <!-- panel 3 -->
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="../query_ajax/query_ajax.js"></script>
    <script src="../query_ajax/data_query_ajax.js"></script>
    <?php include ('../modals/modals.php');?>

<?php 
echo "<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
";?>
</body>
</html>