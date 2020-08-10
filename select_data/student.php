<?php require_once '../Config/config.php'; ?>
<?php

if (isset($_GET['nim_load'])) {
    $id = $_GET['nim_load']; 
 }else{
     echo 'Not';
 }
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student account</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.css" />
    <link rel="stylesheet" href="../fontawesome/fontawesome-free-5.11.2-web/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="../Style/admin.css">

</head>


<body>
  
    <!-- collapse tab -->
   
    <section class="section_tables account_view">

        <!-- =========accordion 1 =========== -->
        <div class="panel panel-default ">
            <div data-toggle="collapse" data-target="#panel1" class="panel-heading collapsed">
                <h4 class="panel-title">
                    <i class="fas fa-user-graduate"> Students </i>
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
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>Country</th>
                                <th>Email</th>
                                <th>Age</th>
                            </tr>
                        </thead>
                        <?php
                        $sql = "SELECT * FROM student WHERE student.NIM = $id";
                            $query = mysqli_query($con, $sql);
                            while ($result = mysqli_fetch_array($query)) {?>
                        <tbody>
                            <tr>
                                <!-- <td><?php echo $countr ++; ?></td> -->
                                <td><?php echo $result['id']; ?></td>
                                <td><?php echo $result['nim']; ?></td>
                                <td><?php echo $result['name'] ?></td>
                                <td><?php echo $result['lastname'];?></td>
                                <td><?php echo $result['address'];?></td>
                                <td><?php echo $result['country'];?></td>
                                <td><?php echo $result['email'];?></td>
                                <td><?php echo $result['age'];?></td>
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
                    <?php
                     $counter = 0;
                     $year = null;
                     $sql = "SELECT * FROM student
                     INNER JOIN classes ON student.nim=classes.nim
                     INNER JOIN subjects ON classes.subjectid= subjects.subjectid
                     INNER JOIN teacher ON classes.teacherid=teacher.teacherid
                     WHERE student.nim = '$id' ORDER BY classes.class_grade ";
                     ?>
                    <?php $query = mysqli_query($con, $sql);
                     $num_rows = mysqli_num_rows($query);
                     if($num_rows == 0){
                      echo "No classes available";
                     }?>
                    <?php while ($result = mysqli_fetch_array($query)) {?>


                    <?php if($year !=($result['class_grade'] . ' Grade ' . $result['class_grade'])){?>

                    <table class="table table-bordered table-dark">
                        <div class="grades">
                            <ul>
                              
                        <span>
                        <a href="javascript:void(0)"><?php echo $result  ['class_grade'];?> </a>

                        </span>
                            
                            </ul>
              
                        </div>

                        <thead>
                            <tr>
                                <?php  $year = $result['class_grade'] . ' Grade ' . $result['class_grade'];?>

                                <th>No</th>
                                <th>Days</th>
                                <th>Class grade</th>
                                <th>Teacher Name</th>
                                <th>Teacher ID</th>
                                <th>Course</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                            </tr>
                        </thead>
                        <?php } ?>
                        <tbody>
                            <tr bgcolor="gray">
                                <td><?php echo $result['id']; ?></td>
                                <td><?php echo $result['days']; ?></td>
                                <td><?php echo $result['class_grade'] ?></td>
                                <td><?php echo $result['tname'];?></td>
                                <td><?php echo $result['teacherid'];?></td>
                                <td><?php echo $result['subjectname'];?></td>
                                <td><?php echo $result['start_time'];?></td>
                                <td><?php echo $result['end_time'];?></td>
                            </tr>
                        </tbody>
                        <?php }?>
                    </table>
                </div>
            </div>
        </div>
        <!-- =========accordion 3 =========== -->
        <div class="panel panel-default">
            <div data-toggle="collapse" data-target="#panel3" class="panel-heading collapsed">
                <h4 class="panel-title">
                    <i class="fas fa-database"> Grades </i>
                </h4>
            </div>
            <div id="panel3" class="panel-collapse collapse">
                <div class="panel-body">

             
                <?php
                $sql = "SELECT * FROM student
                INNER JOIN grades  ON student.nim=grades.nim
                INNER JOIN subjects ON grades.subjectid=subjects.subjectid
                WHERE student.nim= '$id' ORDER BY grades.nim";
                ?>
                <?php $query = mysqli_query($con, $sql);
                while ($result = mysqli_fetch_array($query)) {?> 
                <?php if( $year != ($result['nim'] . ' ' . $result['class_grade_id'])){?>
                   <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <!-- <?php echo $year = $result['nim'] . ' ' . $result['class_grade_id'];?> -->
                            <th>ID</th>
                            <th>Subject</th>
                            <th>Total Grade</th>
                        </tr>
                        <div class="grades">
                    <ul>
                        <span>
                            <a href="javascript:void(0)"><?php echo $result['class_grade_id'] ;?></a>
                        </span>
                    </ul>
                </div>
                    </thead>
                    <?php } ?>
               
                <tbody>
                <tr bgcolor="gray">
                    <td><?php echo $result['grade_id'];?></td>
                    <td><?php echo $result['subjectname'];?></td>
                    <td><?php echo $result['grade_number'];?></td>
                    </tr>
                </tbody>
                <?php }?>
                </table>
            </div>
        </div>
    </div>
        <!-- =========accordion 4 =========== -->
        <div class="panel panel-default">
            <div data-toggle="collapse" data-target="#panel4" class="panel-heading collapsed">
                <h4 class="panel-title">
                    <i class="fas fa-database"> Family data </i>
                </h4>
            </div>
            <div id="panel4" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table table-bordered table-dark">
                        <thead>
                            <th>No</th>
                            <th>Family ID</th>
                            <th>Name</th>
                            <th>Job</th>
                            <th>Income</th>
                        </thead>
                        <tbody>
                            <?php
            $sql ="SELECT * FROM student
                  INNER JOIN family on student.nim=family.nim where student.nim = '$id'";
               $query = mysqli_query($con, $sql);
               while ($result = mysqli_fetch_array($query)) {?> <tr>
                                <!-- <td><?php echo $countr ++; ?></td> -->
                                <td><?php echo $result['id'];?></td>
                                <td><?php echo $result['family_id'];?></td>
                                <td><?php echo $result['familyname'];?></td>
                                <td><?php echo $result['familyjob'];?></td>
                                <td><?php echo $result['familyincome'];?></td>
                            </tr> <?php } ?> </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- =========accordion 5 =========== -->
        <div class="panel panel-default">
            <div data-toggle="collapse" data-target="#panel5" class="panel-heading collapsed">
                <h4 class="panel-title">
                    <i class="fas fa-database"> Parents </i>
                </h4>
            </div>
            <div id="panel5" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table table-bordered table-dark">
                        <thead>
                            <th>No</th>
                            <th>ID</th>
                            <th>family_id</th>
                        </thead>
                        <tbody>
                     <?php
                $sql ="SELECT * FROM student
                LEFT JOIN family on student.nim = family.nim
                LEFT JOIN parent on student.nim = parent.nim
                WHERE student.nim= '$id'";
            
                    $query = mysqli_query($con, $sql);
                    while ($result = mysqli_fetch_array($query)) {?> <tr>
                    <!-- <td><?php echo $countr ++; ?></td> -->
                    <tr bgcolor="gray">
                    <td><?php echo $result['parent_id'];?></td>
                    <td><?php echo $result['nim'];?></td>
                    <td><?php echo $result['family_id'];?></td>
                    </> <?php } ?>
                        </tbody>
            </table>
        </div>
    </div>
        </div>
        </div>
    </section>
 
    <!-- end footer -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="../query_ajax/query_ajax.js"></script>

</body>
</html>